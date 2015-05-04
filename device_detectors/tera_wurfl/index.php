<!DOCTYPE html>
<html lang='en'>
<?php
$detectorName = 'tera_wurfl';

if ( file_exists('Tera-Wurfl/wurfl-dbapi/TeraWurflConfig.php') )
{
	$detectorInstalled = TRUE;
	$demoDisabledClass = '';
}
else
{
	$detectorInstalled = FALSE;
	$demoDisabledClass = 'class="disabled"';
}
?>

<head>
  <title><?php print $detectorName; ?></title>
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
print "<h1>$detectorName</h1>";
print "<div id='content'>";
print "<h2></h2>";
?>

<div id="idMyGadget">
  <h3>Installation and Administration:</h3>
  <dl>
    <dt><a href="README.md" target="_blank">README.md</a></dt>
    <dd>The idMyGadget Tera-Wurfl README file contains instructions on how to set up Tera-Wurfl.
      <a href="https://github.com/tomwhartung/idMyGadget/blob/master/device_detectors/tera_wurfl/README.md"
         target="_blank">The formatted version on github</a>
      is more readable.</dd>
    <dt><a href="Tera-Wurfl/wurfl-dbapi/README.txt">Tera-Wurfl/wurfl-dbapi/README.txt</a></dt>
    <dd>Tera-Wurfl README file contains detailed installation instructions</dd>
    <dt><a href="Tera-Wurfl/wurfl-dbapi/admin/install.php">Tera-Wurfl/wurfl-dbapi/admin/install.php</a></dt>
    <dd>Use to install and initialize the database; for more information, see the README file</dd>
  </dl>
  <?php
    if ( ! $detectorInstalled )
    {
      print '<dl class="warning">';
      print '<dt>Warning:</dt>';
      print '<dd>The ' . $detectorName . ' device detector software is not installed, so demos will not work.  ';
      print 'To install ' . $detectorName . ', follow the instructions in the ';
      print '<a href="https://github.com/tomwhartung/idMyGadget/blob/master/device_detectors/tera_wurfl/README.md" ';
      print   'target="_blank">README.md file</a> ';
      print 'and try again.</dd>';
      print '</div><!-- .warning -->';
      print '</dl>';
    }
   ?>
  <h3>Tera-Wurfl Demos</h3>
  <dl>
    <dt><a href="verySimpleExample.php" <?php print $demoDisabledClass; ?> target="_blank">verySimpleExample.php</a></dt>
    <dd>A Tera-Wurfl "EXAMPLE" demo program from the
      <a href="Tera-Wurfl/wurfl-dbapi/README.txt" target="_blank">Tera-Wurfl/wurfl-dbapi/README.txt</a> file.
      <br />
      Expected results:
      <ul>
        <li>If accessed in a desktop browser, expect to see "You should not be here."</li>
        <li>If accessed in a mobile browser, expect to see the markup version and resolution.
          You may have to pinch to zoom into the display so you can read the values.</li>
      </ul>
    </dd>
    <dt><a href="rawDemo.php" <?php print $demoDisabledClass; ?> >rawDemo.php</a></dt>
    <dd>Demonstrates <?php print  $detectorName; ?> device detection, <strong>without</strong> using the IdMyGadget Adapter API.</dd>
    <dt><a href="idMyGadgetDemo.php" <?php print $demoDisabledClass; ?> >idMyGadgetDemo.php</a></dt>
    <dd>Demonstrates mobile_detect device detection, using the IdMyGadget Adapter API.</dd>
    <dt><a href=""></a></dt>
    <dd></dd>
  </dl>
  <h3>Wurfl Reference</h3>
  <dl>
    <dt><a href="http://sourceforge.net/projects/wurfl/" target="_blank">
     sourceforge.net/projects/wurfl/</a></dt>
    <dd>WURFL Home Page at sourceforge.net</dd>
    <dt><a href="http://sourceforge.net/projects/wurfl/files/WURFL%20Database/" target="_blank">
     sourceforge.net/projects/wurfl/files/WURFL Database/</a></dt>
    <dd>WURFL Database Download Page at sourceforge.net</dd>
    <dt><a href="http://dbapi.scientiamobile.com/wiki/demoTeraWurfl.php/Installation" target="_blank">
     dbapi.scientiamobile.com/wiki/demoTeraWurfl.php/Installation</a></dt>
    <dd>Tera Wurfl Installation</dd>
    <dt><a href=""></a></dt><dd></dd>
  </dl>
  <hr />
  <p class="centered"><a href="..">Back</a></dt>
  <hr />
</div> <!-- idMyGadget-->

</div> <!-- content -->
</div> <!-- container -->
</body>
</html>
