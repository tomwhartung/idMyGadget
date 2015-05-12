<!DOCTYPE html>
<html lang='en'>
<?php
/**
 * Instantiate an IdMyGadget object and use it to display a page with links that allow
 * the user to see information about the device making the request in various forms.
 * These "various forms" include raw WURFL information, key capabilities, and
 * summary device data based on key WURFL device capabilities.
 */
$pageTitle = 'idMyGadgetDemo';

require_once 'Tera-Wurfl/wurfl-dbapi/TeraWurfl.php';
require_once '../../php/IdMyGadgetTeraWurfl.php';
require_once '../all_detectors/deviceDependantContent.php';

define( "STYLE_SHEET_DESKTOP",       "../../css/device/desktop.css" );
define( "STYLE_SHEET_TABLET",        "../../css/device/tablet.css" );
define( "STYLE_SHEET_ANDROID_PHONE", "../../css/device/androidPhone.css" );
define( "STYLE_SHEET_APPLE_PHONE",   "../../css/device/iPhone.css" );
//
// debugging: displays verbose information; we don't need to use this very often
// allowOverridesInUrl: Allow testing with overrides as GET variables, TRUE is OK 
//    for example:
//       <a href="http://localhost/resume/?gadgetType=phone&gadgetModel=iPhone&gadgetBrand=Apple">
//
// $debugging = TRUE;
// $allowOverridesInUrl = FALSE;
$debugging = FALSE;
$allowOverridesInUrl = TRUE;
$idMyGadget = new IdMyGadgetTeraWurfl( $debugging, $allowOverridesInUrl );

$deviceData = $idMyGadget->getDeviceData();
$gadgetType = $deviceData["gadgetType"];
$gadgetModel = $deviceData["gadgetModel"];
$gadgetBrand = $deviceData["gadgetBrand"];

if ( $gadgetType == IdMyGadget::GADGET_TYPE_DESKTOP_BROWSER )
{
	$gadgetString = "Desktop";
	$styleSheetFile = STYLE_SHEET_DESKTOP;
}
else if ( $gadgetType == IdMyGadget::GADGET_TYPE_TABLET )
{
	$gadgetString = "Tablet";
	$styleSheetFile = STYLE_SHEET_TABLET;
}
else if ( $gadgetType == IdMyGadget::GADGET_TYPE_PHONE )
{
	if ( $gadgetModel == IdMyGadget::GADGET_MODEL_APPLE_PHONE )
	{
		$gadgetString = "iPhone";
		$styleSheetFile = STYLE_SHEET_APPLE_PHONE;
	}
	else
	{
		$gadgetString = "Android Phone";
		$styleSheetFile = STYLE_SHEET_ANDROID_PHONE;
	}
}
//
// CSS link tags to consider thinking about - specifically the media attributes:
// Android version:
//   <link rel="stylesheet" type="text/css" href="css/androidPhone.css" media="only screen and (max-width: 600px)" />
//   <link rel="stylesheet" type="text/css" href="css/desktop.css" media="screen and (min-width: 601px)" />
// iPhone version:
//   <link rel="stylesheet" type="text/css" href="css/iPhone.css" media="only screen and (max-width: 480px)" />
//   <link rel="stylesheet" type="text/css" href="css/desktop.css" media="screen and (min-width: 481px)" />
// --> The thing is, these look like crap when we exceed the max-widths!
// --> And that is why I did the WURFL thing!
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />
  <link rel="stylesheet" type="text/css" href="../../css/basicMediaQueries.css" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../../css/device/explorer.css" media="all" />
  <![endif]-->
<?php
//
// Print a link tag to include the desired style sheet.
//
if ( $styleSheetFile == STYLE_SHEET_DESKTOP )
{
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="screen and (min-width: 481px)" ' .
			'/>';
}
elseif ( $styleSheetFile == STYLE_SHEET_APPLE_PHONE )
{
	print '<meta name="viewport" content="user-scalable=no, width=device-width" />' . "\n";
	print '<meta name="apple-mobile-web-app-capable" content="yes" />' . "\n";
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="only screen and (max-width: 480px)" ' .  // comment out to test (set allowOverridesInUrl = true)
			'/>';
}
elseif ( $styleSheetFile == STYLE_SHEET_ANDROID_PHONE )
{
	print '<meta name="viewport" content="user-scalable=no, width=device-width" />' . "\n";
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="only screen and (max-width: 600px)" ' .  // comment out to test (set allowOverridesInUrl = true)
			'/>';
}
else   // Probably a tablet
{
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" />';
	print '<link rel="stylesheet" type="text/css" href="../../css/reverseColors.css" />';
}
// Useful for debugging sometimes:
// print '<link rel="stylesheet" type="text/css" href="../css/showBorders.css" />';
?>
</head>

<body>
<div id="container">
<h1><?php print $pageTitle; ?></h1>
<div id='content'>
<h3><?php print get_class($idMyGadget); ?></h3>
<div id="idMyGadget">
 <?php
  $deviceData = $idMyGadget->getDeviceData();
  deviceDependantContent( $deviceData );
 ?>
 <hr />
 <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
 <hr />
</div> <!-- #idMyGadget-->
</div> <!-- #content -->
</div> <!-- #container -->
</body>
</html>
