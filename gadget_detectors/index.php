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
  <dt><a href="detect_mobile_browsers">detect_mobile_browsers</a></dt>
  <dd>A script available from the site <a href="http://detectmobilebrowsers.com" target="_blank">detectmobilebrowsers.com</a>
   is simple to install but can tell only whether the visitor is using a browser on a phone.</dd>
  <dt><a href="mobile_detect" target="_blank">mobile_detect</a></dt>
  <dd>The Mobile Detect device detection package is lightweight, fully open source, and returns several parameters for each device.
  <dt><a href="tera_wurfl">tera_wurfl</a></dt>
  <dd>The Tera-Wurfl device detection package requires a MySql database and is released under a modified GNU licence so it is not fully open source.
   It returns hundreds of parameters for each device.</dd>
  <dt><a href=""></a></dt>
  <dd></dd>
  <dt><a href="ua_parser" class="disabled">ua_parser</a></dt>
  <dd>TBD.  The repositories at
   <a href="https://github.com/ua-parser/uap-core">github.com/ua-parser/uap-core</a> and
   <a href="https://github.com/ua-parser/uap-php">github.com/ua-parser/uap-php</a>
   look promising, but I was unable to quickly get them to work, and so far the others are good enough.</dd>
 </dl>
</div> <!-- idMyGadget-->

 </div> <!-- content -->
</div> <!-- container -->
</body>
</html>
