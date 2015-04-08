
## Introduction:

The following instructions show how I installed idMyGadget and
the wurfl-dbapi (Tera-Wurfl) code in the /var/www directory on
a PC running Ubuntu 14.04 .  My server is running Apache and
DocumentRoot is set to /var/www .

If you are using a different operating system or installing
into a different directory, you may need to adjust these
instructions accordingly.

## Requirements:

Installing and using this code requires a computer running a
LAMP (Linux, Apache, MySql, and PHP) server.  It will probably work
on a MAMP, WAMP, or XAMP server, but I have not tried it.

If you are using Windows, you will need a terminal application,
such as Cygwin, to run these commands.

## Installation and Setup:

Install (git clone) idMyGadget source:
```
cd /var/www
git clone git://github.com:tomwhartung/idMyGadget.git
cd idMyGadget
```

Visit http://sourceforge.net/projects/wurfl/files/WURFL%20Database/ and 
download the latest version of the Wurfl Database source tar file,
wurfl-dbapi-a.b.c.d.tar.gz (e.g., wurfl-dbapi-1.5.1.1.tar.gz)

Create subdirectory for Tera-Wurfl code and install it, by
unzipping and unpacking wurfl-dbapi-a.b.c.d.tar.gz file in
/var/www/idMyGadget/Tera-Wurfl :
```
cd /var/www/idMyGadget
mkdir Tera-Wurfl
cd Tera-Wurfl
cp ~/Downloads/wurfl-php-a.b.c.d.tar.gz .
gunzip wurfl-php-a.b.c.d.tar.gz
tar -xvf wurfl-php-a.b.c.d.tar
rm wurfl-php-a.b.c.d.tar
```

Link wurfl-dbapi-a.b.c.d directory to the generic directory name
wurfl-dbapi.  This allows for easily upgrading to a new version,
then possibly backing out of the upgrade, by simply changing the
link:
```
cd /var/www/idMyGadget/Tera-Wurfl
ln -s wurfl-dbapi-a.b.c.d wurfl-dbapi
```

Copy the example configuration file:
```
cp TeraWurflConfig.php.example TeraWurflConfig.php
```

The following db setup instructions use MySql and the other default
values in TeraWurflConfig.php, so you do not need to edit that file.
For complete information about all options for installing and
initializing the Tera-Wurfl database, refer to the
Tera-Wurfl/wurfl-dbapi/README.txt file.

----------------------------------------------------
**NOTE: Using these values is NOT recommended for production!**
----------------------------------------------------

Using MySql5 console interface, enter the following commands:
```
create database tera_wurfl_demo;
create user 'terawurfluser'@'localhost' identified by 'wurfl';
grant all on tera_wurfl_demo.* to 'terawurfluser'@'localhost';
```

----------------------------------------------------
**Again, for best results you should modify one or
more of the values in the preceding commands, and
update the TeraWurflConfig.php file accordingly.***
----------------------------------------------------

Create a data directory and 
```
cd /var/www/idMyGadget/Tera-Wurfl/wurfl-dbapi
mkdir data    # may already be present
sudo chgrp -R www-data data/
sudo chmod -R g+rw data/
```

To verify that you have the database and data directory set up properly,
access the following file in your web browser:
	http://example.com/idMyGadget/Tera-Wurfl/wurfl-dbapi/admin/install.php
For example, if you are setting this up on your localhost, go to
	http://localhost/idMyGadget/Tera-Wurfl/wurfl-dbapi/admin/install.php
Note that there is a link to this file in the idMyGadget/index.html and
idMyGadget/index.php files.

If everything looks OK on the install page, populate the database by
clicking on one of the links (I use the "Your local WURFL file" link)
at the bottom of that page.

You should see a new page saying the database was updated OK.  You
should remove the Tera-Wurfl/wurfl-dbapi/admin/install.php file, but I
recommend renaming it in case you want to reinstall again later (e.g.,
using a different database name):
```
cd /var/www/idMyGadget/Tera-Wurfl/wurfl-dbapi/admin
mv install.php install.php-save_for_possible_reinstall
```

Run the demos to see:

* All of the capabilities that Tera-Wurfl can identify in the device
* The short list of key capabilities that idMyGadget uses to find the essential device data
* The essential device data

## Conclusion:

IdMyGadget currently identifies only the following devices:

* iPhone
* Android Phone
* Android tablet
* Kindle (Fire/HD?)
* Desktop Browser

I picked these because they are the gadgets I own.  :-)  It should be
possible to test it for many other devices (e.g., using emulators)
but for now anyway, I am trying to keep it as simple as possible.

If you find it necessary or desireable, it is my hope that it will
be easy to extend idMyGadget to use some of the additional capabilities
identified by Wurfl to set additional device data parameters, for
finer-grained control of what content to serve.

## References:

If you have any questions about idMyGadget, please contact me
at https://github.com/tomwhartung or tomwhartung.com .

If you have any questions about Wurfl, refer to the following:
http://sourceforge.net/projects/wurfl/files/WURFL%20Database/
http://wurfl.sourceforge.net/wurfl.php
http://dbapi.scientiamobile.com/wiki/index.php/Installation
Tera-Wurfl/wurfl-dbapi/README.txt

