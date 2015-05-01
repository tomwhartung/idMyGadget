<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'detect_mobile_browsers';
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
<?php
print "<h1>$pageTitle</h1>";
print "<div id='content'>";
print "<h2></h2>";
?>

<div id="idMyGadget">
 <h3>detect_mobile_browsers demos:</h3>
 <dl>
  <dt><a href="README.md" target="_blank">README.md</a></dt>
  <dd>Contains instructions on how to enable this option.
    <a href="https://github.com/tomwhartung/idMyGadget/blob/master/device_detectors/detect_mobile_browsers/README.md"
       target="_blank">The formatted version on github</a>
    is more readable.</dd>
  <dt><a href="rawDemo.php">rawDemo.php</a></dt>
  <dd>Demonstrates detect_mobile_browsers device detection, <strong>without</strong> using the IdMyGadget Adapter API.</dd>
  <dt><a href="idMyGadgetDemo.php">idMyGadgetDemo.php</a></dt>
  <dd>Demonstrates detect_mobile_browsers device detection, using the IdMyGadget Adapter API.</dd>
 </dl>
 <hr />
 <p class="centered"><a href="..">Back</a></dt>
 <hr />
</div> <!-- idMyGadget-->

 </div> <!-- content -->
</div> <!-- container -->
</body>
</html>
