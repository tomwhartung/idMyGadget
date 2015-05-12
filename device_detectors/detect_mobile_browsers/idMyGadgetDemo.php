<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'idMyGadget detect_mobile_browsers demo';

require_once( 'php/detectmobilebrowser.php' );
require_once( '../../php/IdMyGadgetDetectMobileBrowsers.php' );
require_once( '../deviceDependantContent.php' );
$debugging = FALSE;
$allowOverridesInUrl = FALSE;
$usingMoblePhone = FALSE;
$idMyGadget = new IdMyGadgetDetectMobileBrowsers( $debugging, $allowOverridesInUrl, $usingMoblePhone );
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
 <?php
  $deviceData = $idMyGadget->getDeviceData();
  print "<div class='output'>";
  print "<h3>Device Data</h3>";
  print "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";
  print "</div> <!-- .output -->";
 ?>

<?php
  deviceDependantContent( $deviceData );
?>

 <hr />
 <p class="centered">|&nbsp;<a href="index.php">Back</a>&nbsp;|</p>
 <hr />
</div> <!-- idMyGadget-->

</div> <!-- content -->
</div> <!-- container -->
</body>
</html>
