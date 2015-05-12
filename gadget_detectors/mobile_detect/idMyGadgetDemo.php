<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'idMyGadgetDemo';

$usingMoblePhone = FALSE;
require_once( 'Mobile-Detect/Mobile_Detect.php' );
require_once( '../../php/IdMyGadgetMobileDetect.php' );
$debugging = FALSE;
$allowOverridesInUrl = FALSE;
$idMyGadget = new IdMyGadgetMobileDetect( $debugging, $allowOverridesInUrl );
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
<h3><?php print get_class($idMyGadget); ?></h3>
<div id="idMyGadget">
 <?php
  $deviceData = $idMyGadget->getDeviceData();
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
