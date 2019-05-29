<?php
// this config file is for both the web GUI and The AirScan/eSCL server interface to the scanner. Some items affect both such as $root, $defaultresolution, etc

// some server options. These may depend on your server configuration
//path from admin or default scans folder to webroot (full linux path from root)
//you should now configuure the following in scans/index.php aund usertemplate/index.php BEFORE creating users
// with trailing slash
//full linux path from systemroot to webroot for this installation WITH TRAILING SLASH /
$root='/var/www/html/';


// set hostnname below for Bonjour advertising the s400w scanner only to make it AirScan/eSCL compatible
$hostname=gethostname();
// no trailing . 


//name for php session
//this was moved to phppagestart.php
//$sessionname='airscan';

// niceness is for making PDFs with "nice" command otherwise CPU goes to 100%
// set niceness value here

$niceness=19;


// if this is the free version set to yes



//default resolution can be 300 or 600 only . changes radio button . Leave at 300 for scanners with firmware that do not support 600DPI
$defaultresolution='300';

 // Leave as-is for 
$scanner='s400w'; 




//Start Options for s400w

//if your host IP and port are different, set them below
// this is IP and port of scanner once  wifi connection is made
$host='192.168.18.33';
$port='23';

// full path and filename of s400w
$s400w='/var/www/html/s400w';

//to establish the frequency at which the scanner is pinged to determine conecctivity  "the scanner is connected"
// this seems to be the optomal setting as seting much lower may seem to cause problems
// may interact with other embedded settings. best not to change.
$ping=4000; //miliseconds
// may not apply leave as-is

//this is the frequency that the scanner will be queried , once online to see if it has a page inserted "Page inserted, 
// ready to scan", once the ping determines it it online. You need not wait for this update interval you can scan without 
//the interface recognizing there is a page inserted, so you can set it high if you like
// this seems to be the optimal setting as seting much lower may seem to cause problems
// may interact with other embedded settings. best not to change.
$refresh =8000; //6000 miliseconds 6 seconds
// may not apply leave as-is

//when enabled shows scan command text results at scan time. with escl clients connecting to s400w, 
//produces files of received exml in eSCL/Scans.
// s400w scanner only saves debug files in /eSCL/Scans and on screen display while scanning
$scandebug='no';

/// end s400w scanner config


//imagemagick options.

//path and filename to "convert" or "magick" newer versions apparently use "magick"

$imagemagicklocation='/usr/bin/convert';


// is imnagemagick installed? This enables autocrop
// leave at no for free version
// $imagemagick='yes';
// Version 10 and Up leave at 'yes' as this option in the process of being removed. Imagemagick now required.
$imagemagick='yes';




//This sets the page size used in the css and for pdf creation USE ONLY 'A4', 'letter', 'legal', 'AB', 'ISOB5' or 'JISB5'- CASE SENSITIVE!
$printsize='letter';



//page orientation must be portrait or landscape for css 
//Since the scanner scans only at portrait mode this setting should be portrait
$orientation='portrait';



// important 2.54 cm = 1 inch, in case you had forgotten.
// end copy-print functions


//for escl scanning clients if no all files  deleted, if yes, all saved
// the following option no longer works but some references may remain in code so leave it as-is
$saveallesclfiles='yes';
?>
