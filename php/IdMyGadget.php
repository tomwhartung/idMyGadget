<?php
/**
 * Base class for classes that detect device characteristics
 */
abstract class IdMyGadget
{
	const GADGET_TYPE_UNRECOGNIZED = "unrecognized";
	const GADGET_TYPE_DESKTOP_BROWSER = "desktop";
	const GADGET_TYPE_TABLET = "tablet";
	const GADGET_TYPE_PHONE = "phone";

	const GADGET_MODEL_UNRECOGNIZED = "unrecognized";
	const GADGET_MODEL_NAME_NOT_SET = "model_name_not_set";
	const GADGET_MODEL_ANDROID_TABLET = "androidTablet";
	const GADGET_MODEL_APPLE_TABLET = "iPad";

	const GADGET_MODEL_ANDROID_PHONE = "androidPhone";
	const GADGET_MODEL_APPLE_PHONE = "iPhone";

	const GADGET_BRAND_UNRECOGNIZED = "unrecognized";
	const GADGET_BRAND_NAME_NOT_SET = "brand_name_not_set";
	const GADGET_BRAND_ANDROID = "Android";
	const GADGET_BRAND_APPLE = "Apple";

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
	public $allowOverridesInUrl = TRUE;

	//
	// Device Data Fields are: gadgetType, gadgetModel, and gadgetBrand
	//
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

	//
	// The Key Capabilities are: gadgetType, gadgetModel, and gadgetBrand
	//
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
	 * Constructor: initialize essential data members
	 */
	public function __construct( $debugging=FALSE, $allowOverridesInUrl=FALSE )
	{
		$this->debugging = $debugging;
		$this->allowOverridesInUrl = $allowOverridesInUrl;
	}

	/**
	 * Display the device data
	 * @return string of <li> tags listing the device data
	 */
	public function displayDeviceData()
	{
		$output = "";

		foreach( $this->deviceData as $key => $value )
		{
			$output .= "<li>" . $key . ":&nbsp;'" . $value . "'</li>";
		}

		return $output;
	}
	/**
	 * Display the key capabilities
	 * @return string of <li> tags listing the key capabilities
	 */
	public function displayKeyCapabilities()
	{
		$output = "";

		foreach( $this->keyCapabilities as $key => $value )
		{
			$output .= "<li>" . $key . ":&nbsp;'" . $value . "'</li>";
		}

		return $output;
	}

	/**
	 * Supports setting the gadget type as a get variable in the request
	 * @return gadgetType
	 */
	protected function setGadgetType( $pointing_method, $is_tablet )
	{
		$this->gadgetType = null;
		$gadgetType = filter_input( INPUT_GET, 'gadgetType', FILTER_SANITIZE_STRING );

		if ( $this->allowOverridesInUrl && isset($gadgetType) )
		{
				$this->gadgetType  = $gadgetType;
		}
	
		return $this->gadgetType;
	}
	/**
	 * Supports setting the gadget model as a get variable in the request
	 * Note that it does not necessarily equal one of the constants defined in deviceData.php
	 * @return gadgetModel
	 */
	protected function setGadgetModel( $model_name )
	{
		$this->gadgetModel = null;
		$gadgetModel = filter_input( INPUT_GET, 'gadgetModel', FILTER_SANITIZE_STRING );

		if ( $this->allowOverridesInUrl && isset($gadgetModel) )
		{
			$this->gadgetModel = $gadgetModel;
		}
	
		return $this->gadgetModel;
	}
	/**
	 * Supports setting the gadget brand as a get variable in the request
	 * Note that it does not necessarily equal one of the constants defined in deviceData.php
	 * @return gadgetBrand
	 */
	protected function setGadgetBrand( $brand_name )
	{
		$this->gadgetBrand = null;
		$gadgetBrand = filter_input( INPUT_GET, 'gadgetBrand', FILTER_SANITIZE_STRING );

		if ( $this->allowOverridesInUrl && isset($gadgetBrand) )
		{
			$this->gadgetBrand = $gadgetBrand;
		}
	
		return $this->gadgetBrand;
	}
}
