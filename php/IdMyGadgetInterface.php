<?php
/**
 * Defines methods and gadget types, etc.
 */

interface IdMyGadgetInterface
{
	/**
	 * Get data about the device
	 * @return associative array of device data
	 */
	public function getDeviceData();
	/**
	 * Get the key capabilities of the device
	 * @return associative array of the capabilities
	 */
	public function getKeyCapabilities();

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
}

?>
