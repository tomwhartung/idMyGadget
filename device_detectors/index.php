<!DOCTYPE html>
<html lang='en'>
<?php
$pageTitle = 'IdMyGadget Demos';
?>

<head>
  <title><?php print $pageTitle; ?></title>
  <link rel="stylesheet" type="text/css" href="../css/allDevices.css" />
  <link rel="stylesheet" type="text/css" href="../css/basicMediaQueries.css" />
  <!--[if IE]>
    <link rel="stylesheet" type="text/css" href="../css/device/explorer.css" media="all" />
  <![endif]-->
</head>

<body>
  <div id="container">
<?php
//
// Produce and display any demo output that may be desired
//
print "<h1>$pageTitle</h1>";
print "<div id='content'>";
print "<h2></h2>";
?>

<div id="idMyGadget">
 <h3>IdMyGadget Demos:</h3>
 <dl>
  <dt><a href="README.md" target="_blank">README.md</a></dt>
  <dd>The idMyGadget README file contains instructions on how to set up Tera-Wurfl.
    The formatted <a href="https://github.com/tomwhartung/idMyGadget/blob/master/README.md">version on github</a> is preferable.</dd>
  <dt><a href="index.php?displayDeviceData=true">index.php?displayDeviceData=true</a></dt>
  <dd>Displays the gadget types that idMyGadget has deduced from the key capabilities obtained from Tera-Wurfl</dd>
  <dt><a href=""></a></dt>
  <dd></dd>
 </dl>
</div> <!-- idMyGadget-->

 </div> <!-- content -->
</div> <!-- container -->
</body>
</html>
