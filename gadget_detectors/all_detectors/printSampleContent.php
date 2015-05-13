 <?php
function printSampleContent( $deviceData )
{
  print "<h3>Sample Content</h3>";
  //
  // Note that content does not necessarily have to be "print"ed.
  // ------------------------------------------------------------
?>
<p>This page contains some device-dependent content.
  To see the device-dependent content, you will need to access this page
  on an actual device, as opposed to just shrinking the browser window.</p>
<p>I for one feel the potential for using device detection to increase user experience is
  much greater than we can do with just media queries.
  For example, it is easy enough to use a media query to just hide an element;
  with device we can prevent the content from being downloaded in the first place.</p>
<p>Moreover, I believe it is best to use both methods.</p>
<?php
  print '<p>';
  print '<hr />';
  if ( $deviceData['gadgetType'] === IdMyGadget::GADGET_TYPE_PHONE )
  {
    print '<h4>Content for phones only.</h4>';
    print '<p>Obviously you would want to limit the size of images and amount of content ';
    print 'delivered to phones to help them conserve bandwidth.  ';
    print 'This will also help your web site load more quickly.  ';
    print 'Unfortunately, Wifi is not quite yet ubiquitous!.</p>';
    print '<p>Also you might want to change certain content when it is on a phone;';
    print 'For example, you might want the content delivered to phones to link to ';
    print '<a href="https://en.wikipedia.org/wiki/Mobile_security" target="_blank">';
    print 'a page about mobile security</a>, ';
    print 'while linking to a more relevant site on desktops and tablets would be appropriate.</p>';
  }
  else if ( $deviceData['gadgetType'] === IdMyGadget::GADGET_TYPE_TABLET )
  {
    print '<h4>Content for tablets only.</h4>';
    print '<p>Obviously, in many cases a page will display equally well on a tablet ';
    print 'and in a browser.  ';
    print 'But there are significant differences between the two, such as battery life ';
    print 'or specific applications.</p>';
    print '<p>And surely there are times when you may want to have different content.  ';
    print 'You might want this content to link to ';
    print '<a href="https://en.wikipedia.org/wiki/Computer_security" target="_blank">';
    print 'a page about computer security</a>, ';
    print 'in general, for example, while the desktop version might ';
    print 'link to one about computer viruses in particular.</p>';
  }
  else
  {
    print '<h4>Content for desktop browsers only.</h4>';
    print '<p>Obviously, in many cases a page will display equally well on a desktop browser ';
    print 'and in a tablet.  ';
    print 'But there are significant differences between the two, such as  ';
    print 'specific applications or battery life.</p>';
    print '<p>So you may want to plug your company\'s screen saver in the desktop version, ';
    print 'and plug the battery saver in the tablet version.  ';
    print 'And you may not want to run all that javascript in the tablet version, ';
    print 'so that it doesn\'t drain your users\' batteries.</p>';
    print '<p>Note that using device detection, it is a simple matter to deliver ';
    print 'the same content to all devices, changing only the href attribute of a link,';
    print 'should you want to do that for some reason.  ';
    print 'For example you might want the desktop content to link to your blog post about ';
    print '<a href="https://facebook.com" target="_blank">social networking sites</a>, ';
    print 'while the tablet version links to your post about ';
    print '<a href="http://www.informationweek.com/mobile/mobile-devices/10-tablet-battery-tips-more-power/d/d-id/1110858?" ';
    print ' target="_blank">conditioning tablet batteries.</a></p>';
  }
  print '<hr />';
  print '<p>We are back to seeing content delivered to all browsers, regardless of the device.  ';
  print 'Do you now agree that the potential for using device detection is unlimited?</p>';
}
 ?>
