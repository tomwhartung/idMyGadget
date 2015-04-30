<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'idMyGadget detect_mobile_browsers demo';

$usingAPhone = FALSE;
require_once( 'php/detectmobilebrowser.php' );
require_once( '../../php/IdMyGadgetDetectMobileBrowsers.php' );
$debugging = FALSE;
$allowOverridesInUrl = FALSE;
$idMyGadget = new IdMyGadgetDetectMobileBrowsers( $debugging, $allowOverridesInUrl, $usingAPhone );
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../../css/allDevices.css" />
  <link rel="stylesheet" type="text/css" href="../../css/basicMediaQueries.css" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../../css/device/explorer.css" media="all" />
  <![endif]-->
</head>

<body>

<div id="container">
<h2><?php print $pageTitle; ?></h2>
<div id="content">

<div id="idMyGadget">
 <h3>IdMyGadget Demo Results:</h3>
 <p class="centered">
 <?php
  print "usingAPhone = '$usingAPhone'";
 ?>
 </p>
 <ul>
 <?php
	$output = '';
	$idMyGadget->getDeviceData();
	$output .= "<h3>Device Data</h3>";
	$output .= "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";

	print "<div id='output'>";
	print $output;
	print "</div> <!-- output -->";
 ?>
 <hr />
 <p class="centered"><a href="index.php">Back</a></dt>
 <hr />
</div> <!-- idMyGadget-->

</div> <!-- content -->
</div> <!-- container -->
</body>
</html>
