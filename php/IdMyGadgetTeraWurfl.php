<?php
require_once 'deviceData.php';
require_once 'IdMyGadget.php';
// require_once '../lib/Tera-Wurfl/wurfl-dbapi/TeraWurfl.php';

/**
 * Gets summary device data based on key WURFL device capabilities
 */
class IdMyGadgetTeraWurfl extends IdMyGadget // implements IdMyGadgetInterface
{
	/**
	 * The TeraWURFL object
	 * @var TeraWurfl
	 */
	public $teraWurflObject = null;

	/**
	 * Constructor: initialize essential data members
	 */
	public function __construct( $debugging=FALSE, $allowOverridesInUrl=FALSE )
	{
		parent::__construct( $debugging, $allowOverridesInUrl );
		$this->teraWurflObject = new TeraWurfl();    // Instantiate the TeraWURFL object
	}

	/**
	 * Get data about the device
	 * @return associative array of device data
	 */
	public function getDeviceData()
	{
		if ( ! $this->deviceDataAreSet )
		{
			$this->keyCapabilities = $this->getKeyCapabilities();
			//
			// We don't *need* to pass in the key capabilities values but doing so makes it clear
			// which device data items depend on which key capabilities.
			//
			$this->setGadgetType( $this->keyCapabilities['pointing_method'],
					$this->keyCapabilities['is_tablet'] );
			$this->setGadgetModel( $this->keyCapabilities['model_name'] );
			$this->setGadgetBrand( $this->keyCapabilities['brand_name'] );
			$this->deviceData['gadgetType']  = $this->gadgetType;
			$this->deviceData['gadgetModel'] = $this->gadgetModel;
			$this->deviceData['gadgetBrand'] = $this->gadgetBrand;
			$this->deviceDataAreSet =TRUE;
		}

		if ( $this->debugging )
		{
			print "<ul class='debugging'>debugging with keyCapabilities:" .
					$this->displayKeyCapabilities() . "</ul>";
			print "<ul class='debugging'>debugging with deviceData:" .
					$this->displayDeviceData() . "</ul>";
		}

		return $this->deviceData;
	}
	/**
	 * Get the key capabilities of the device
	 * @return associative array of the capabilities
	 */
	public function getKeyCapabilities()
	{
		if ( ! $this->keyCapabilitiesAreSet )
		{
			if ( $this->teraWurflObject->getDeviceCapabilitiesFromAgent() )
			{
				foreach ( $this->keyCapabilities as $key => $value )
				{
					$this->keyCapabilities[$key] = $this->teraWurflObject->getDeviceCapability($key);
				}
			}
			$this->keyCapabilitiesAreSet = TRUE;
		}

		return $this->keyCapabilities;
	}

	/**
	 * Set the gadget type to one of the GADGET_TYPE_* constants: desktop, phone, etc.
	 * @return gadgetType
	 */
	protected function setGadgetType( $pointing_method, $is_tablet )
	{
		parent::setGadgetType( $pointing_method, $is_tablet );

		if ( $this->gadgetType === null )
		{
			$this->gadgetType  = GADGET_TYPE_UNRECOGNIZED;
			if ( isset($pointing_method) )
			{
				if ( $pointing_method == "mouse" )
				{
					$this->gadgetType = GADGET_TYPE_DESKTOP_BROWSER;
				}
				else if ( $pointing_method == "touchscreen" )
				{
					if ( isset($is_tablet) && $is_tablet == "true" )
					{
						$this->gadgetType = GADGET_TYPE_TABLET;
					}
					else
					{
						$this->gadgetType = GADGET_TYPE_PHONE;
					}
				}
			}
		}
	
		return $this->gadgetType;
	}
	/**
	 * Set the gadget model based on the gadget type and model name
	 * Note that it does not necessarily equal one of the constants defined in deviceData.php
	 * @return gadgetModel
	 */
	protected function setGadgetModel( $model_name )
	{
		parent::setGadgetModel( $model_name );

		if ( $this->gadgetModel === null )
		{
			$this->gadgetModel = GADGET_MODEL_UNRECOGNIZED;
			if ( isset($model_name) )
			{
				if ( $this->gadgetType == GADGET_TYPE_DESKTOP_BROWSER )
				{
					$this->gadgetModel = $model_name;
				}
				else if ( $this->gadgetType == GADGET_TYPE_TABLET )
				{
					if ( stristr($model_name,GADGET_BRAND_ANDROID) === FALSE )
					{
						$this->gadgetModel = $model_name;
					}
					else
					{
						$this->gadgetModel = GADGET_MODEL_ANDROID_TABLET;
					}
				}
				else if ( $this->gadgetType == GADGET_TYPE_PHONE )
				{
					if ( $model_name == GADGET_MODEL_APPLE_PHONE )
					{
						$this->gadgetModel = GADGET_MODEL_APPLE_PHONE;
					}
					else if ( stristr($model_name,GADGET_BRAND_ANDROID) === FALSE )
					{
						$this->gadgetModel = $model_name;
					}
					else
					{
						$this->gadgetModel = GADGET_MODEL_ANDROID_PHONE;
					}
				}
				else
				{
					$this->gadgetModel = "Unknown Gadget Type (" . $this->gadgetType . "); model_name: " . $model_name;
				}
			}
			else
			{
				$this->gadgetModel = GADGET_MODEL_NAME_NOT_SET;
			}
		}
	
		return $this->gadgetModel;
	}
	/**
	 * Set the gadget brand based on the gadget type and brand name
	 * Note that it does not necessarily equal one of the constants defined in deviceData.php
	 * @return gadgetBrand
	 */
	protected function setGadgetBrand( $brand_name )
	{
		parent::setGadgetBrand( $brand_name );

		if ( $this->gadgetBrand === null )
		{
			$this->gadgetBrand = GADGET_BRAND_UNRECOGNIZED;
			if ( isset($brand_name) )
			{
				if ( $this->gadgetType == GADGET_TYPE_DESKTOP_BROWSER )
				{
					$this->gadgetBrand = $brand_name;
				}
				else if ( $this->gadgetType == GADGET_TYPE_TABLET )
				{
					if ( $brand_name == GADGET_BRAND_APPLE )
					{
						$this->gadgetBrand = GADGET_BRAND_APPLE;
					}
					else
					{
						$this->gadgetBrand = $brand_name;
					}
				}
				else if ( $this->gadgetType == GADGET_TYPE_PHONE )
				{
					if ( $brand_name == GADGET_BRAND_APPLE )
					{
						$this->gadgetBrand = GADGET_BRAND_APPLE;
					}
					else
					{
						$this->gadgetBrand = $brand_name;
					}
				}
				else
				{
					$this->gadgetBrand = "Unknown Gadget Type " .
							"(" .$this->gadgetType . "); brand_name: " . $brand_name;
				}
			}
			else
			{
				$this->gadgetBrand = GADGET_BRAND_NAME_NOT_SET;
			}
		}
	
		return $this->gadgetBrand;
	}
}
