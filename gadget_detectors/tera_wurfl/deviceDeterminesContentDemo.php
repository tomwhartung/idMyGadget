<!DOCTYPE html>
<html lang='en'>
<?php
/**
 * Instantiate an IdMyGadget object and use it to display a page with links that allow
 * the user to see information about the device making the request in various forms.
 * These "various forms" include raw WURFL information, key capabilities, and
 * summary device data based on key WURFL device capabilities.
 */
$pageTitle = 'deviceDeterminesContentDemo';

require_once 'Tera-Wurfl/wurfl-dbapi/TeraWurfl.php';
require_once '../../php/IdMyGadgetTeraWurfl.php';
require_once '../all_detectors/getGadgetString.php';
require_once '../all_detectors/getStyleSheetFile.php';
require_once '../all_detectors/printSampleContent.php';
//
// debugging: displays verbose information; we don't need to use this very often
// allowOverridesInUrl: Allow testing with overrides as GET variables, TRUE is OK 
//    for example:
//       <a href="http://localhost/resume/?gadgetType=phone&gadgetModel=iPhone&gadgetBrand=Apple">
//
$debugging = FALSE;
$allowOverridesInUrl = TRUE;
$idMyGadget = new IdMyGadgetTeraWurfl( $debugging, $allowOverridesInUrl );

$deviceData = $idMyGadget->getDeviceData();
$gadgetString = getGadgetString( $deviceData );
$styleSheetFile = getStyleSheetFile( $deviceData );
$gadgetType = $deviceData["gadgetType"];

?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../../css/device/explorer.css" media="all" />
  <![endif]-->
<?php
//
// Print a link tag to include the desired style sheet.
//
if ( $styleSheetFile === STYLE_SHEET_DESKTOP )
{
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="screen and (min-width: 481px)" ' .
			'/>';
}
elseif ( $styleSheetFile === STYLE_SHEET_APPLE_PHONE )
{
	print '<meta name="viewport" content="user-scalable=no, width=device-width" />' . "\n";
	print '<meta name="apple-mobile-web-app-capable" content="yes" />' . "\n";
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="only screen and (max-width: 480px)" ' .  // comment out to test (set allowOverridesInUrl = true)
			'/>';
}
elseif ( $styleSheetFile === STYLE_SHEET_ANDROID_PHONE )
{
	print '<meta name="viewport" content="user-scalable=no, width=device-width" />' . "\n";
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" ' .
			'media="only screen and (max-width: 600px)" ' .  // comment out to test (set allowOverridesInUrl = true)
			'/>';
}
else   // Unknown but probably a tablet (?)
{
	print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" />';
}
// Useful for debugging sometimes:
// print '<link rel="stylesheet" type="text/css" href="../css/showBorders.css" />';
?>
</head>

<body>
<div id="container">
<?php
  if ( $gadgetType !== IdMyGadget::GADGET_TYPE_PHONE )
  {
    print '<h1>' . $pageTitle . '</h1>';
  }
?>
<div id='content'>
<h3><?php print get_class($idMyGadget); ?></h3>
<h4><?php print 'gadgetString = ' . $gadgetString; ?></h4>
<h4><?php print 'styleSheetFile = ' . $styleSheetFile; ?></h4>
<div id="idMyGadget">
 <?php
  printSampleContent( $deviceData );
 ?>
 <hr />
 <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
 <hr />
</div> <!-- #idMyGadget-->
</div> <!-- #content -->
</div> <!-- #container -->
</body>
</html>
