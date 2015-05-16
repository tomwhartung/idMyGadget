<?php
require_once 'getStyleSheetFile.php';

function printStyleSheetLinkTags( $deviceData )
{
	$styleSheetFile = getStyleSheetFile( $deviceData );

    $rmAllDevicesCss = filter_input( INPUT_GET, 'rmAllDevicesCss', FILTER_SANITIZE_NUMBER_INT );
    if ( ! $rmAllDevicesCss )
    {
      print '<link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />';
    }

    $rmStyleSheetCss = filter_input( INPUT_GET, 'rmStyleSheetCss', FILTER_SANITIZE_NUMBER_INT );
    if ( ! $rmStyleSheetCss )
    {
      $rmStyleSheetCssChecked = '';
      print '<link rel="stylesheet" type="text/css" href="' . $styleSheetFile . '" />';
    }

	return $styleSheetFile;
}
