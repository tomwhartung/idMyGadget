
## Introduction:

Once you have installed idMyGadget, as described in the
[gadget_detectors README.md file](https://github.com/tomwhartung/idMyGadget/blob/master/gadget_detectors/README.md)
file, follow these steps to install the Mobile-Detect PHP device detection script.

## Installation and Setup:

This option requires downloading (cloning) the Mobile-Detect code from github.

1. Access this URL: https://github.com/serbanghita/Mobile-Detect

1. If you are accustomed to using github, you may want to clone the code:


```
cd idMyGadget/gadget_detectors/mobile_detect
git clone git@github.com:serbanghita/Mobile-Detect.git
```

1. If you are more comfortable downloading the zip file, unpack it in the mobile_detect directory and rename the new directory to Mobile-Detect

```
cd idMyGadget/gadget_detectors/mobile_detect
mv ~/Downloads/Mobile-Detect-master.zip .
unzip Mobile-Detect-master.zip 
mv Mobile-Detect-master Mobile-Detect
rm Mobile-Detect-master.zip 

```

1. Whether you clone or unzip the code into the `idMyGadget/gadget_detectors/mobile_detect` directory, this should result in the `idMyGadget/gadget_detectors/mobile_detect/Mobile-Detect' directory containing all of the Mobile-Detect code.

## Updating the Installation 

* If you installed the code by cloning it, run the git pull command to update the source.

  ```
  git pull
  ```

* If you installed the code by downloading the zip file, download a new file and unzip it to update the source.

## Running the Demos

Verify that you have set this up properly, access the following file in your web browser:
[http://example.com/idMyGadget/gadget_detectors/mobile_detect/rawDemo.php](http://example.com/idMyGadget/gadget_detectors/mobile_detect/rawDemo.php)

For example, if you are setting this up on your localhost, go to
[http://localhost/idMyGadget/gadget_detectors/mobile_detect/rawDemo.php](http://localhost/idMyGadget/gadget_detectors/mobile_detect/rawDemo.php)

There is a link to this file in the index.php file in this directory.

Run the demos to see:

* Whether the device is a phone

## Troubleshooting:

If you get a blank screen, it is probably because you did not rename the detectmobilebrowser.php.txt file to detectmobilebrowser.php .  To be sure, check your web server's log file.

If you are redirected to the detectmobilebrowsers.com site, it is because you did not edit the detectmobilebrowser.php as described in the Updating the Installation section.


## Conclusion:

The best way to see the capabilities of this detector is to run the Mobile-Detect examples/demo.php program:

* Mobile-Detect/examples/demo.php

The index.php file in the mobile_detect directory contains a link to this and the other demo programs.

## References:

If you have any questions about idMyGadget, please contact me
at https://github.com/tomwhartung or tomwhartung.com .

