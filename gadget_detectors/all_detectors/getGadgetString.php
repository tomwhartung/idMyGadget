 <?php
 /**
  * Return a short string describing the device, based on the device data passed in
  *
  * @param type $deviceData
  */
function getGadgetString( $deviceData )
{
	global $gadgetString;
	$gadgetString = "Unknown Device";

	$gadgetType = $deviceData["gadgetType"];
	$gadgetModel = $deviceData["gadgetModel"];
	$gadgetBrand = $deviceData["gadgetBrand"];

	if ( $gadgetType === IdMyGadget::GADGET_TYPE_DESKTOP_BROWSER )
	{
		$gadgetString = "Desktop";
	}
	else if ( $gadgetType === IdMyGadget::GADGET_TYPE_TABLET )
	{
		$gadgetString = "Tablet";
	}
	else if ( $gadgetType === IdMyGadget::GADGET_TYPE_PHONE )
	{
		if ( $gadgetModel === IdMyGadget::GADGET_MODEL_APPLE_PHONE )
		{
			$gadgetString = "iPhone";
		}
		else
		{
			$gadgetString = "Android Phone";
		}
	}
	return $gadgetString;
}