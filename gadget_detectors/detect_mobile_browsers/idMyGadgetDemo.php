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
$allowOverridesInUrl = TRUE;
$idMyGadget = new IdMyGadgetDetectMobileBrowsers( $debugging, $allowOverridesInUrl );
$deviceData = $idMyGadget->getDeviceData();
$gadgetString = getGadgetString( $deviceData );
$styleSheetFile = getStyleSheetFile( $deviceData );
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php
    $rmAllDevicesCss = filter_input( INPUT_GET, 'rmAllDevicesCss', FILTER_SANITIZE_NUMBER_INT );
    $rmStyleSheetCss = filter_input( INPUT_GET, 'rmStyleSheetCss', FILTER_SANITIZE_NUMBER_INT );
    if ( $rmAllDevicesCss )
    {
      $rmAllDevicesCssChecked = 'checked';
    }
    else
    {
      $rmAllDevicesCssChecked = '';
      print '<link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />';
    }
    if ( $rmStyleSheetCss )
    {
      $rmStyleSheetCssChecked = 'checked';
    }
    else
    {
      $rmStyleSheetCssChecked = '';
      print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" />';
    }
    $gadgetType = filter_input( INPUT_GET, 'gadgetType', FILTER_SANITIZE_STRING );
    if ( ! isset($gadgetType ) )
    {
      $gadgetType = $deviceData['gadgetType'];
    }
    $gadgetTypeDesktopChecked = $gadgetType == IdMyGadget::GADGET_TYPE_DESKTOP_BROWSER ?
            'checked' : '';
    $gadgetTypeTabletChecked = $gadgetType == IdMyGadget::GADGET_TYPE_TABLET ?
            'checked' : '';
    $gadgetTypePhoneChecked = $gadgetType == IdMyGadget::GADGET_TYPE_PHONE ?
            'checked' : '';
    $gadgetTypeUnrecognizedChecked = $gadgetType == IdMyGadget::GADGET_TYPE_UNRECOGNIZED ?
            'checked' : '';
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
</div> <!-- #content -->
<footer>
  <hr />
  <form action="" method="GET">
    <div id="rmCssForm">
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
        </div> <!-- .centered -->
      </fieldset>
    </div> <!-- #rmCssForm -->
    <div id="gadgetTypeForm">
      <fieldset>
        <label for="gadgetTypeDesktop">
          <input type="radio" id="gadgetTypeDesktop" name="gadgetType"
             value="<?php print IdMyGadget::GADGET_TYPE_DESKTOP_BROWSER; ?>"
             <?php print $gadgetTypeDesktopChecked ?> />
          Emulate Desktop
        </label>
        <label for="gadgetTypeTablet">
          <input type="radio" id="gadgetTypeTablet" name="gadgetType"
             value="<?php print IdMyGadget::GADGET_TYPE_TABLET; ?>"
             <?php print $gadgetTypeTabletChecked; ?> />
          Emulate Tablet
        </label>
        <label for="gadgetTypePhone">
          <input type="radio" id="gadgetTypePhone" name="gadgetType"
             value="<?php echo IdMyGadget::GADGET_TYPE_PHONE; ?>"
             <?php print $gadgetTypePhoneChecked; ?> />
          Emulate Phone
        </label>
        <label for="gadgetTypeUnrecognized">
          <input type="radio" id="gadgetTypeUnrecognized" name="gadgetType"
             value="<?php echo IdMyGadget::GADGET_TYPE_UNRECOGNIZED; ?>"
             <?php print $gadgetTypeUnrecognizedChecked; ?> />
          Emulate Unrecognized Device
        </label>
        <div class="centered">
          <input type="submit" value="Force Gadget Type" />
        </div> <!-- .centered -->
      </fieldset>
    </div> <!-- #gadgetTypeForm -->
  </form>
  <hr />
  <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
  <hr />
</footer>
</div> <!-- #container -->
</body>
</html>
