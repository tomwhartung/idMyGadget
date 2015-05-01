<?php
require_once 'IdMyGadget.php';

/**
 * Gets summary device data based on key WURFL device capabilities
 */
class IdMyGadgetMobileDetect extends IdMyGadget
{
	/**
	 * The Mobile Detect object
	 * @var 
	 */
	public $mobileDetectObject = null;

	/**
	 * Constructor: initialize essential data members
	 */
	public function __construct( $debugging=FALSE, $allowOverridesInUrl=FALSE )
	{
		parent::__construct( $debugging, $allowOverridesInUrl );
		$this->mobileDetectObject = new Mobile_Detect();
	}

	/**
	 * Get all of the data we can about the device
	 * @return associative array of device data
	 */
	public function getDeviceData()
	{
		$this->setGadgetType();
		$this->setGadgetModel();
		$this->setGadgetBrand();

		$this->deviceData['gadgetType']  = $this->gadgetType;
		$this->deviceData['gadgetModel'] = $this->gadgetModel;
		$this->deviceData['gadgetBrand'] = $this->gadgetBrand;
		$this->deviceDataAreSet = TRUE;

		if ( $this->debugging )
		{
			print "<ul class='debugging'>debugging with deviceData:" .
					$this->displayDeviceData() . "</ul>";
		}

		return $this->deviceData;
	}

	/**
	 * Set the gadget type to one of the GADGET_TYPE_* constants: desktop, phone, etc.
	 * @return gadgetType
	 */
	protected function setGadgetType()
	{
		parent::setGadgetType();

		if ( $this->gadgetType == parent::GADGET_TYPE_UNKNOWN )
		{
			if ( $this->mobileDetectObject->isMobile() )
			{
				$this->gadgetType = parent::GADGET_TYPE_PHONE;
			}
			else if ( $this->mobileDetectObject->isTablet() )
			{
				$this->gadgetType = parent::GADGET_TYPE_PHONE;
			}
			else
			{
				$this->gadgetType = parent::GADGET_TYPE_DESKTOP_BROWSER;
			}
		}
	
		return $this->gadgetType;
	}
	/**
	 * Set the gadget model (in this case it is unknown)
	 * @return gadgetModel
	 */
	protected function setGadgetModel()
	{
		parent::setGadgetModel();

		if ( $this->gadgetModel === null )
		{
			$this->gadgetModel = parent::GADGET_MODEL_UNKNOWN;
		}
	
		return $this->gadgetModel;
	}
	/**
	 * Set the gadget brand (in this case it is unknown)
	 * @return gadgetBrand
	 */
	protected function setGadgetBrand()
	{
		parent::setGadgetBrand();

		if ( $this->gadgetBrand === null )
		{
			$this->gadgetBrand = parent::GADGET_BRAND_UNKNOWN;
		}
	
		return $this->gadgetBrand;
	}
}
