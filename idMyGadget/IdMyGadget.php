<?php
require_once 'deviceData.php';
// require_once '../Tera-Wurfl/wurfl-dbapi/TeraWurfl.php';

/**
 * Gets summary device data based on key WURFL device capabilities
 */
class IdMyGadget
{
	/**
	 * Displays debugging output
	 * @var boolean
	 */
	public $debugging = FALSE;
	/**
	 * Allows overriding of all gadget* values in the URL
	 * Allows testing in browser instead of device
	 * @var boolean
	 */
	public $allowOverridesInUrl = FALSE;
	/**
	 * The TeraWURFL object
	 * @var TeraWurfl
	 */
	public $teraWurflObject = null;

	/**
	 * One of the GADGET_TYPE_* constants: desktop, phone, etc.
	 * @var string
	 */
	protected $gadgetType = '';
	/**
	 * One of the GADGET_MODEL_* constants: iPad, androidTablet, iPhone, etc.
	 * @var string
	 */
	protected $gadgetModel = '';
	/**
	 * One of the GADGET_BRAND_* constants: apple, etc.
	 * @var string
	 */
	protected $gadgetBrand = '';

	/**
	 * Whether the key capabilities have been set
	 * @var boolean
	 */
	protected $keyCapabilitiesAreSet = FALSE;
	/**
	 * These are the key capabilities we use to set the gadget types
	 * @var array
	 */
	protected $keyCapabilities = array (
		"pointing_method" => '',
		"is_tablet" => '',
		"model_name" => '',
		"brand_name" => '',
	//	"device_os" => '',             // currently unused but keep for easy future reference
	//	"is_wireless_device" => '',    // currently unused but keep for easy future reference
	//	"dual_orientation" => '',      // currently unused but keep for easy future reference
	);

	/**
	 * Whether the device data have been set
	 * @var boolean
	 */
	protected $deviceDataAreSet = FALSE;
	/**
	 * The gadget types array is set based on the key capabilities
	 * @var array
	 */
	protected $deviceData = array (
			"gadgetType" => '',
			"gadgetModel" => '',
			"gadgetBrand" => '',
	);

	/**
	 * Constructor: initialize essential data members
	 */
	public function __construct( $debugging=FALSE, $overridesInUrl=FALSE )
	{
		$this->debugging = $debugging;
		$this->overridesInUrl = $overridesInUrl;
		$this->teraWurflObject = new TeraWurfl();    // Instantiate the TeraWURFL object
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
			$this->setGadgetType( $this->keyCapabilities['pointing_method'], $this->keyCapabilities['is_tablet'] );
			$this->setGadgetModel( $this->keyCapabilities['model_name'] );
			$this->setGadgetBrand( $this->keyCapabilities['brand_name'] );
			$this->deviceData['gadgetType']  = $this->gadgetType;
			$this->deviceData['gadgetModel'] = $this->gadgetModel;
			$this->deviceData['gadgetBrand'] = $this->gadgetBrand;
	
			if ( $this->debugging )
			{
				$this->displayKeyCapabilities();
				$this->displayDeviceData();
			}
		}
	
		return $this->deviceData;
	}
	/**
	 * Set the gadget type to one of the GADGET_TYPE_* constants: desktop, phone, etc.
	 * @return gadgetType
	 */
	protected function setGadgetType( $pointing_method, $is_tablet )
	{
		if ( $this->allowOverridesInUrl )
		{
			$gadgetType = filter_input( INPUT_GET, 'gadgetType', FILTER_SANITIZE_STRING );
			if ( isset($gadgetType) )
			{
				$this->gadgetType  = $gadgetType;
			}
		}
		else
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
		if ( $this->allowOverridesInUrl )
		{
			$gadgetModel = filter_input( INPUT_GET, 'gadgetModel', FILTER_SANITIZE_STRING );
			if ( isset($gadgetModel) )
			{
				$this->gadgetModel = $gadgetModel;
			}
		}
		else
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
		if ( $this->allowOverridesInUrl )
		{
			$gadgetBrand = filter_input( INPUT_GET, 'gadgetBrand', FILTER_SANITIZE_STRING );
			if ( isset($gadgetBrand) )
			{
				$this->gadgetModel = $gadgetBrand;
			}
		}
		else
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
