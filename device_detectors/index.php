<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'IdMyGadget Demos';
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="../css/allDevices.css" />
  <link rel="stylesheet" type="text/css" href="../css/basicMediaQueries.css" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../css/device/explorer.css" media="all" />
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
 <h3>IdMyGadget Demos:</h3>
 <dl>
  <dt><a href="mobile_detect" target="_blank">mobile_detect</a></dt>
  <dd>The Mobile Detect device detection package is lightweight, fully open source, and returns several parameters for each device.
  <dt><a href="tera_wurfl">tera_wurfl</a></dt>
  <dd>The Tera-Wurfl device detection package is released under a modified GNU licence so it is not fully open source.
   It returns hundreds of parameters for each device.</dd>
  <dt><a href=""></a></dt>
  <dd></dd>
 </dl>
</div> <!-- idMyGadget-->

 </div> <!-- content -->
</div> <!-- container -->
</body>
</html>
