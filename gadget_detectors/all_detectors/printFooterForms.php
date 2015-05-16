<?php
function printFooterForms( $styleSheetFile, $deviceData )
{
    $rmAllDevicesCss = filter_input( INPUT_GET, 'rmAllDevicesCss', FILTER_SANITIZE_NUMBER_INT );
    if ( $rmAllDevicesCss )
    {
      $rmAllDevicesCssChecked = 'checked';
    }
    else
    {
      $rmAllDevicesCssChecked = '';
      print '<link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />';
    }

    $rmStyleSheetCss = filter_input( INPUT_GET, 'rmStyleSheetCss', FILTER_SANITIZE_NUMBER_INT );
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
  <div class="footerForms">
  <form action="" method="GET">
    <div class="rmCssForm">
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
    </div> <!-- .rmCssForm -->
    <div class="gadgetTypeForm">
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
    </div> <!-- .gadgetTypeForm -->
  </form>
  </div><!-- .footerForms -->
<?php
}
