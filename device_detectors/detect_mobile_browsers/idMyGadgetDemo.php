<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'idMyGadget detect_mobile_browsers demo';

$usingMoblePhone = FALSE;
require_once( 'php/detectmobilebrowser.php' );
require_once( '../../php/IdMyGadgetDetectMobileBrowsers.php' );
$debugging = FALSE;
$allowOverridesInUrl = FALSE;
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
  print '<p class="centered">';
  print "usingMoblePhone = '$usingMoblePhone'";
  print '</p>';
	$deviceData = $idMyGadget->getDeviceData();
  print "<div id='output'>";
	print "<h3>Device Data</h3>";
	print "<ul class='no-bullets'>" . $idMyGadget->displayDeviceData() . "</ul>";
	print "</div> <!-- output -->";
 ?>

 <?php
  print "<h3>Using the Results</h3>";
  if ( $deviceData['gadgetType'] === IdMyGadget::GADGET_TYPE_PHONE )
  {
    print '<p>';
    print 'This is content for phones only.  ';
    print '</p>';
    print '<p>';
    print 'You might want this content to link to ';
    print '<a href="https://en.wikipedia.org/wiki/Mobile_security">a page about mobile security</a>, ';
    print 'for example.';
    print '</p>';
  }
  else
  {
    print '<p>';
    print 'This is content for browsers that are not on a phone.  ';
    print '</p>';
    print '<p>';
    print 'You might want this content to link to ';
    print '<a href="https://en.wikipedia.org/wiki/Computer_virus">a page about computer viruses</a>, ';
    print 'for example.';   
    print '</p>';
  }
  print '<hr />';
  print '<p>';
  print "This is content delivered to all browsers, regardless of the device.";
  print '</p>';
 ?>

 <hr />
 <p class="centered"><a href="index.php">Back</a></dt>
 <hr />
</div> <!-- idMyGadget-->

</div> <!-- content -->
</div> <!-- container -->
</body>
</html>
