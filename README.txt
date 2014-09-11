
 References:
=============
o	http://sourceforge.net/projects/wurfl/files/WURFL%20PHP/
o	http://wurfl.sourceforge.net/wurfl.php
o	http://dbapi.scientiamobile.com/wiki/index.php/Installation
o	Tera-Wurfl/wurfl-dbapi/README.txt

 Setup:
========
Create project directory and subdirectories for idGadget and Tera-Wurfl:
o	Create directory for idMyGadget code (e.g., in /var/www):
	cd /var/www
	mkdir idMyGadget
	cd idMyGadget
o	Create subdirectory for Tera-Wurfl code
	mkdir Tera-Wurfl
o	Visit http://sourceforge.net/projects/wurfl/files/WURFL%20PHP/ and 
	download the latest version of this file ....
	-	wurfl-dbapi-a.b.c.d.tar.gz (e.g., wurfl-dbapi-1.5.1.1.tar.gz)
Install idMyGadget source:
o	TBD (use github)
Install Tera-Wurfl source:
o	Unzip and unpack wurfl-dbapi-a.b.c.d.tar.gz file in /var/www/idMyGadget/Tera-Wurfl
	cd /var/www/Tera-Wurfl
	cp ~/Downloads/wurfl-php-a.b.c.d.tar.gz .
	gunzip wurfl-php-a.b.c.d.tar.gz
	tar -xvf wurfl-php-a.b.c.d.tar
o	Link wurfl-dbapi-a.b.c.d directory to wurfl-dbapi
	ln -s wurfl-dbapi-a.b.c.d wurfl-dbapi
	cp TeraWurflConfig.php.example TeraWurflConfig.php

For full information about all options for installing and initializing the
Tera-Wurfl database, refer to the Tera-Wurfl/wurfl-dbapi/README.txt file.
The following db setup instructions use MySql and the other default values
in TeraWurflConfig.php, so you do not need to edit that file.
NOTE: Using these values is NOT recommended for production!
o	Using MySql5 console interface, enter the following commands:
	create database tera_wurfl_demo;
	create user 'terawurfluser'@'localhost' identified by 'wurfl';
	grant all on tera_wurfl_demo.* to 'terawurfluser'@'localhost';
o	To populate the database access the following file in your web browser:
	http://yourserver.com/idMyGadget/Tera-Wurfl/admin/install.php
	For example, if you are setting this up on your localhost, go to
	http://localhost/idMyGadget/Tera-Wurfl/admin/install.php
	There is also a link to this file in the idMyGadget/index.html file

o	To run demos:

o	To run idGadget:
	cd /var/www/wurfl/idGadget
	mkdir -p resources/storage/cache
	mkdir -p resources/storage/persistence
	cp ../downloads/wurfl-2.3.5.zip resources
	cd resources
	ln -s wurfl-2.3.5.zip wurfl.zip
	cd ..
	chmod 755 resources resources/storage resources/storage/* 
	chmod 644 resources/wurfl-2.3.5.zip 
	sudo chown -R www-data:www-data resources

 Customizations:
=================
idGadget - combines elements of wurfl demo example and info from book.

Identifies the following based on the criteria listed:
o	iPhone: 
o	Android Phone:
o	Android tablet:
o	Kindle (Fire/HD?):
o	Desktop Browser:

