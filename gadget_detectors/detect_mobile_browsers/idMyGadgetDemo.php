<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = basename( $_SERVER['PHP_SELF'], '.php' );
//
// This one require statement "does all the work" by setting $usingMobilePhone
//
require_once( 'php/detectmobilebrowser.php' );  // sets $usingMobilePhone global variable
require_once( '../../php/IdMyGadgetDetectMobileBrowsers.php' );
require_once '../all_detectors/getGadgetString.php';
require_once '../all_detectors/getStyleSheetFile.php';
$debugging = FALSE;
$allowOverridesInUrl = FALSE;
$idMyGadget = new IdMyGadgetDetectMobileBrowsers( $debugging, $allowOverridesInUrl );
$deviceData = $idMyGadget->getDeviceData();
$gadgetString = getGadgetString( $deviceData );
$styleSheetFile = getStyleSheetFile( $deviceData );
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />
  <link rel="stylesheet" type="text/css" href="<?php print $styleSheetFile; ?>" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../../css/device/explorer.css" media="all" />
  <![endif]-->
</head>

<body>
<div id="container">
<?php
  if ( $deviceData["gadgetType"] !== IdMyGadget::GADGET_TYPE_PHONE )
  {
    print '<h1>' . $pageTitle . '</h1>';
  }
?>
<div id="content">
<h3><?php print get_class($idMyGadget); ?></h3>
<h3><?php print $gadgetString; ?></h3>
<div id="idMyGadget">
 <?php
  print "<div class='output'>";
  print "<h4>detectorUsed:" . "</h4>";
  print "<p>" . $idMyGadget->detectorUsed . "</p>";

  print "<h4>deviceData:</h4>";
  print "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";
  print "</div> <!-- .output -->";
 ?>

 <hr />
 <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
 <hr />
</div> <!-- #idMyGadget-->
</div> <!-- #content -->
</div> <!-- #container -->
</body>
</html>
