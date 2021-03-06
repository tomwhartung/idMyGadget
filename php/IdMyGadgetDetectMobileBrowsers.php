<?php
require_once 'IdMyGadget.php';

/**
 * Determines whether device is a mobile phone
 */
class IdMyGadgetDetectMobileBrowsers extends IdMyGadget
{
	/**
	 * boolean indicating whether user is using a phone
	 */
	protected $usingMobilePhone = null;

	/**
	 * Constructor: initialize essential data members
	 */
	public function __construct( $debugging=FALSE, $allowOverridesInUrl=FALSE, $usingMobilePhone=null )
	{
		parent::__construct( $debugging, $allowOverridesInUrl );
		$this->detectorUsed = parent::GADGET_DETECTOR_DETECT_MOBILE_BROWSERS;
		$this->usingMobilePhone = $usingMobilePhone;
	}

	/**
	 * Get all of the data we can about the device
	 * @return associative array of device data
	 */
	public function getDeviceData()
	{
		if ( $this->deviceDataAreSet !== TRUE )
		{
			$this->setGadgetType();
			$this->setGadgetBrand();
			$this->setGadgetModel();
			$this->deviceData['gadgetType']  = $this->gadgetType;
			$this->deviceData['gadgetBrand'] = $this->gadgetBrand;
			$this->deviceData['gadgetModel'] = $this->gadgetModel;
			$this->deviceDataAreSet = TRUE;
		}

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
		global $usingMobilePhone;

		parent::setGadgetType();

		if ( $this->debugging )
		{
			print '<ul class="debugging">';
			print '<li>usingMobilePhone (global): ' . $usingMobilePhone . '</li>';
			print '<li>this->usingMobilePhone: ' . $this->usingMobilePhone . '</li>';
			print '<li>this->gadgetType: ' . $this->gadgetType . '</li>';
			print '</ul>';
		}

		if ( $this->gadgetType == parent::GADGET_TYPE_UNKNOWN )
		{
			if ( $this->usingMobilePhone === null )
			{
				$this->usingMobilePhone = $usingMobilePhone;   // use global value
			}
			if ( isset($this->usingMobilePhone) && $this->usingMobilePhone )
			{
				$this->gadgetType = parent::GADGET_TYPE_PHONE;
			}
			else
			{
				$this->gadgetType = parent::GADGET_TYPE_DESKTOP;
			}
		}
	
		return $this->gadgetType;
	}
	/**
	 * Set the gadget brand (in this case it is unknown)
	 * @return gadgetBrand
	 */
	protected function setGadgetBrand()
	{
		parent::setGadgetBrand();
	
		return $this->gadgetBrand;
	}
	/**
	 * Set the gadget model (in this case it is unknown)
	 * @return gadgetModel
	 */
	protected function setGadgetModel()
	{
		parent::setGadgetModel();
	
		return $this->gadgetModel;
	}
}
