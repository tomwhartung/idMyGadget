 <?php
function deviceDependantContent( $deviceData )
{
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
  else if ( $deviceData['gadgetType'] === IdMyGadget::GADGET_TYPE_TABLET )
  {
    print '<p>';
    print 'This is content for tablets only.  ';
    print '</p>';
    print '<p>';
    print 'You might want this content to link to ';
    print '<a href="https://en.wikipedia.org/wiki/Computer_security">a page about computer security</a>, ';
    print 'for example.';
    print '</p>';
  }
  else
  {
    print '<p>';
    print 'This is content for browsers that are not on a mobile device.  ';
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
}
 ?>
