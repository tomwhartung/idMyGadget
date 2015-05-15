 <?php
 /**
  * Return a stylesheet file name, based on the device data passed in
  *
  * @param type $deviceData
  */
require_once 'getGadgetString.php';

define( "STYLE_SHEET_DESKTOP",       "../../css/device/desktop.css" );
define( "STYLE_SHEET_TABLET",        "../../css/device/tablet.css" );
define( "STYLE_SHEET_ANDROID_PHONE", "../../css/device/androidPhone.css" );
define( "STYLE_SHEET_APPLE_PHONE",   "../../css/device/iPhone.css" );
define( "STYLE_SHEET_MEDIA_QUERIES", "../../css/basicMediaQueries.css" );

function getStyleSheetFile( $deviceData )
{
	global $gadgetString;
	global $styleSheetFile;

	$styleSheetFile = STYLE_SHEET_MEDIA_QUERIES;  // by default, fall back on media queries

	if ( ! isset($gadgetString) )
	{
		$gadgetString = getGadgetString( $deviceData );
	}

	if ( $gadgetString = "Desktop" )
	{
		$styleSheetFile === STYLE_SHEET_DESKTOP;
	}
	else if ( $gadgetString === "Tablet" )
	{
		$styleSheetFile = STYLE_SHEET_TABLET;
	}
	else if ( $gadgetString === "iPhone" )
	{
		$styleSheetFile = STYLE_SHEET_APPLE_PHONE;
	}
	else if ( $gadgetString === "Android Phone" )
	{
		$styleSheetFile = STYLE_SHEET_ANDROID_PHONE;
	}

	return $styleSheetFile;
}
 ?>
