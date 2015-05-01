<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'IdMyGadget Mobile-Detect Demos';
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
 <h3>IdMyGadget Mobile-Detect Demos:</h3>
 <dl>
  <dt><a href="README.md" target="_blank">README.md</a></dt>
  <dd>The idMyGadget Mobile-Detect README file contains instructions on how to set up Mobile-Detect.
    <a href="https://github.com/tomwhartung/idMyGadget/blob/master/device_detectors/mobile_detect/README.md"
       target="_blank">The formatted version on github</a>
    is more readable.</dd>
  <dt><a href="Mobile-Detect/examples/demo.php" target="_blank">Mobile-Detect/examples/demo.php</a></dt>
  <dd>The Mobile-Detect example demo program</dd>
  <dt><a href="rawDemo.php">rawDemo.php</a></dt>
  <dd>Demonstrates mobile_detect device detection, <strong>without</strong> using the IdMyGadget Adapter API.</dd>
  <dt><a href="idMyGadgetDemo.php">idMyGadgetDemo.php</a></dt>
  <dd>Demonstrates mobile_detect device detection, using the IdMyGadget Adapter API.</dd>
  <dt><a href=""></a></dt>
  <dd></dd>
 </dl>
</div> <!-- idMyGadget-->

 </div> <!-- content -->
</div> <!-- container -->
</body>
</html>
