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

$rmAllDevicesCss = filter_input( INPUT_GET, 'rmAllDevicesCss', FILTER_SANITIZE_NUMBER_INT );
$rmStyleSheetCss = filter_input( INPUT_GET, 'rmStyleSheetCss', FILTER_SANITIZE_NUMBER_INT );
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="" />
  <?php
    if ( $rmAllDevicesCss )
    {
      $rmAllDevicesCssChecked = 'checked';
    }
    else
    {
      print '<link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />';
    }
    if ( $rmStyleSheetCss )
    {
      $rmStyleSheetCssChecked = 'checked';
    }
    else
    {
      print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" />';
    }
  ?>
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
  <?php
    print "<div class='output'>";
    print "<h4>detectorUsed:" . "</h4>";
    print "<p>" . $idMyGadget->detectorUsed . "</p>";
    print "<h4>deviceData:</h4>";
    print "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";
    print "</div> <!-- .output -->";
  ?>
  <div class="options">
    <hr />
    <form action="#" method="GET">
      <fieldset>
        <label for="rmAllDevicesCss">
          <input type="checkbox" id="rmAllDevicesCss" name="rmAllDevicesCss" value="1"
             <?php print $rmAllDevicesCssChecked ?> />
          Remove allDevices.css
        </label>
        <label for="rmStyleSheetCss">
          <input type="checkbox" id="rmStyleSheetCss" name="rmStyleSheetCss" value="1"
             <?php print $rmStyleSheetCssChecked ?> />
          Remove <?php print basename($styleSheetFile) ?>
        </label>
        <div class="centered">
          <input type="submit" value="Remove Css" />
        </div> <!-- .centered !>
      </fieldset>
    </form>
  </div> <!-- .options -->
    <hr />
    <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
    <hr />
  </div> <!-- .options -->
</div> <!-- #content -->
</div> <!-- #container -->
</body>
</html>
