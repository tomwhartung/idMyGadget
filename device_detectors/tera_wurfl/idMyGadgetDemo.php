<!DOCTYPE html>
<html lang='en'>
<?php
/**
 * Instantiate an IdMyGadget object and use it to display a page with links that allow
 * the user to see information about the device making the request in various forms.
 * These "various forms" include raw WURFL information, key capabilities, and
 * summary device data based on key WURFL device capabilities.
 */
$pageTitle = 'idMyGadget tera_wurfl demo';

require_once 'Tera-Wurfl/wurfl-dbapi/TeraWurfl.php';
require_once '../../php/IdMyGadgetTeraWurfl.php';
require_once 'DemoTeraWurfl.php';

define( "STYLE_SHEET_DESKTOP",       "../../css/device/desktop.css" );
define( "STYLE_SHEET_MEDIA_QUERIES", "../../css/basicMediaQueries.css" );
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
	$pageTitle = "IdMyGadget: Simple Wrapper for Tera-Wurfl";
}
else if ( $gadgetType == IdMyGadget::GADGET_TYPE_TABLET )
{
	$gadgetString = "Tablet";
	$styleSheetFile = STYLE_SHEET_TABLET;
	$pageTitle = "IdMyGadget - Wurfl Wrapper";
}
else if ( $gadgetType == IdMyGadget::GADGET_TYPE_PHONE )
{
	$pageTitle = "IdMyGadget";
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
else
{
	$gadgetString = "Unknown";
	$styleSheetFile = STYLE_SHEET_MEDIA_QUERIES;
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
<div id="idMyGadget">
 <h3>IdMyGadget Demos:</h3>
 <dl>
  <dt><a href="idMyGadgetDemo.php?displayDeviceData=true">idMyGadgetDemo.php?displayDeviceData=true</a></dt>
  <dd>Displays the gadget types that idMyGadget has deduced from the key capabilities obtained from Tera-Wurfl</dd>
  <dt><a href="idMyGadgetDemo.php?displayKeyCapabilities=true">idMyGadgetDemo.php?displayKeyCapabilities=true</a></dt>
  <dd>Displays all the key capabilities that idMyGadget uses to determine what type of device the user is using</dd>
  <dt><a href="idMyGadgetDemo.php?displayCapabilityArrays=true">idMyGadgetDemo.php?displayCapabilityArrays=true</a></dt>
  <dd>Displays the capability arrays that Tera-Wurfl can identify</dd>
  <dt><a href="idMyGadgetDemo.php?displayAllCapabilities=true">idMyGadgetDemo.php?displayAllCapabilities=true</a></dt>
  <dd>Displays all of the capabilities that Tera-Wurfl can identify</dd>
  <dt><a href="idMyGadgetDemo.php?displaySortedCapabilities=true">idMyGadgetDemo.php?displaySortedCapabilities=true</a></dt>
  <dd>Displays a sorted list of the capabilities that Tera-Wurfl can identify</dd>
  <dt><a href=""></a></dt><dd></dd>
 </dl>

  <hr />
  <p class="centered"><a href="index.php">Back</a></p>
  <hr />
</div> <!-- idMyGadget-->

<?php
//
// Produce and display any demo output that may be desired
//
print "<h2>$gadgetString</h2>";

$demoTeraWurfl = new DemoTeraWurfl( $idMyGadget );
$displayCapabilityArrays = filter_input( INPUT_GET, 'displayCapabilityArrays', FILTER_VALIDATE_BOOLEAN );
$displayAllCapabilities  = filter_input( INPUT_GET, 'displayAllCapabilities', FILTER_VALIDATE_BOOLEAN );
$displaySortedCapabilities = filter_input( INPUT_GET, 'displaySortedCapabilities', FILTER_VALIDATE_BOOLEAN );
$displayKeyCapabilities = filter_input( INPUT_GET, 'displayKeyCapabilities', FILTER_VALIDATE_BOOLEAN );
$displayDeviceData = filter_input( INPUT_GET, 'displayDeviceData', FILTER_VALIDATE_BOOLEAN );
$output = "";

if ( isset($displayCapabilityArrays) )
{
	$output .= "<h3>Capability Arrays for This Device</h3>";
	$output .= $demoTeraWurfl->displayCapabilityArrays();
}
if ( isset($displayAllCapabilities) )
{
	$output .= "<h3>Flat List of Capabilities</h3>";
	$output .= "<ul class='no-bullets'>" . $demoTeraWurfl->displayAllCapabilities() . "</ul>";
}
if ( isset($displaySortedCapabilities) )
{
	$output .= "<h3>Sorted List of Capabilities</h3>";
	$output .= "<ul class='no-bullets'>" . $demoTeraWurfl->displaySortedCapabilities() . "</ul>";
}
if ( isset($displayKeyCapabilities) )
{
	$idMyGadget->getKeyCapabilities();
	$output .= "<h3>Key Capabilities</h3>";
	$output .= "<ul class='no-bullets'>" . $idMyGadget->displayKeyCapabilities() . "</ul>";
}
if ( isset($displayDeviceData) )
{
	$idMyGadget->getDeviceData();
	$output .= "<h3>Device Data</h3>";
	$output .= "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";
}

if ( strlen($output) > 0 )
{
	print "<div id='output'>";
	print $output;
	print "</div> <!-- output -->";
}
?>

  <hr />
  <p class="centered">
  	|&nbsp;<a href="#container">Top</a>
  	&nbsp;|&nbsp;
  	<a href="index.php">Back</a>&nbsp;|</p>
  <hr />

</div> <!-- content -->
</div> <!-- container -->
</body>
</html>
