
## Introduction:

IdMyGadget is a Device Detection PHP Adapter API.

When the third party device detection tools are properly installed, IdMyGadget provides a common interface to all of them.  This means that the webmaster can switch between these device detectors without having to change any code.

## Supported Device Detectors:

At this time IdMyGadget supports using the following third party device detectors:

* [detect_mobile_browsers](https://github.com/tomwhartung/idMyGadget/blob/master/gadget_detectors/detect_mobile_browsers/README.md): comes already installed, but does not recognize tablets
* [mobile_detect](https://github.com/tomwhartung/idMyGadget/blob/master/gadget_detectors/mobile_detect/README.md): easily installed from github and is a great "middle option"
* [tera_wurfl](https://github.com/tomwhartung/idMyGadget/blob/master/gadget_detectors/tera_wurfl/README.md): requires initializing a database and returns specific information about hundreds of capabilities present in modern devices

The `gadget_detectors` directory contains a subdirectory for each of these detectors, and each of these directories contains a `README.md` file with instructions on how to install (if necessary), upgrade, and test the detector.

Additionally, the `php` directory contains a php class for each of these detectors, and each of these classes inherits common functionality from their shared base class.

Note that each of these detectors has different functionality and is released under a different license.

## Installation and Setup:

Install (git clone) idMyGadget source:
```
cd /var/www
git clone git://github.com:tomwhartung/idMyGadget.git
cd idMyGadget
ls -al gadget_detectors php
```

Alternatively, github makes a zip file available at [the project's main page](https://github.com/tomwhartung/idMyGadget).  Note however that using the git clone command makes it easy to keep the code up-to-date, by simply running `git pull` on occasion.

The detect_mobile_browser device detector is the only one that comes pre-installed.

Refer to the individual README.md files for instructions on how to install one or all of the other device detectors.  A list of links to these README.md files appears above under "Supported Device Detectors."

## Run Demos to Test the Installation:

IdMyGadget comes with a few to several demo programs for each device detector.  Start by loading the following file into your browser:

* http://localhost/idMyGadget/index.html

Of course, you may need to modify this URL slightly, depending on the configuration of your web server.

After taking a quick look at the brief introductory text on this page, click on one of the links at the top or the bottom of that page (e.g., the "| Next |" link in the footer) to advance to the next page, which is:

* http://localhost/idMyGadget/gadget_detectors/index.php

The gadget_detectors/index.php page contains a link to each of the index.php files in the detectors' subdirectories, and each of those files contains links to the demos for each detector.

## Troubleshooting:

For more information about the device detectors, see each of the individual, detector-specific README.md files.  If they do not have the information you seek, try [google](http://google.com).

## Conclusion:

I am using this repo as-is for my resume, which is also available on github

* My online interactive resume is viewable here: http://tomwhartung.com/resume
* The source for this resume is on github here: https://github.com/tomwhartung/resume

## What's Next?

I have made a separate copy of this repo for integration with joomla and wordpress, and am starting to think about yet another version for drupal.

For more information about the status of those projects see http://joomoowebsites.com .

## References:

If you have any questions about idMyGadget, please contact me at https://github.com/tomwhartung or http://tomwhartung.com .

