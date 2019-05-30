# AirScanning

This is new and my first project on GitHub. Because I have had to sepatrate this from the scanning GUI for the same scanner, it is possible I am missing something. If you install this and can not get it to work please create a new issue. 

AirScanning for Ion AirCopy, Halo Magic Scanner(+ ePost),  Mustek iScan Air(Orignal), iScan Fly. Century CPS-A4WF, Transcription Patri Kun A4 Wi-Fi Portable Scanner 転写パットリくん A4 Wi-Fiポータブルスキャナー, and possibly others. heretofore referred to as s400w based or s400w compatible. 

These are great small portable, wireless, rechargable scanners that at one time were supported on Windows, Mac , iOS, and Android. In my opinion these scanners were at the forefront of a new wave of small wireless portable scanners. They are still available on eBay at a fraction of the cost of comparable scanners. These scanners are now somewhat orphaned as the manufacturers have not updated drivers making them incompatible with many newer operating systems. Airscanning will extend scanner functionality to your entire network without manufacturers drivers, by way of a Linux host.

This allows the aforementioned s400w based scanners to connect to a host machine over a dedicated WiFi interface. The same host should have a wired ethernet inteface dedicated to the network with a FIXED IP (DHCP may cause issues once the WiFi Connects to the scanner) . The WiFi MUST use DHCP to connect to the scanner or scanning may fail. The host machine will then respond to Apple AirScan/eSCL scan requests and forward them on to the scanner, over the dedicated WiFi connection to the scanner. YOU DO NOT NEED SANE , this is NOT SANE compatible, other than if SANE ever produces an AppleAirScan/eSCL backend (long overdue), this scanner might then work with SANE using this code as a go-between, or bridge.

This code is tested only on Apache server and PHP 7 on x86_64 under Ubuntu 16.04. It will likely run on other web servers however some rewrite mods must be activated for it to work, and it is untested. Ultimately, it would be nice to work this into the CUPS web server if that is possible. It would save from running a second web server. 

Currently the scanner will work fine with VueScan in eSCL mode (autodetected) with this software.  Tested with VueScan on Windows 7 and Ubuntu 16.04.

There are currenly issues with Apple AirScan as well as Mopria on Android. I hope to have these resolved soon. For the time being it works very well with VueScan.

<b>In addition to an Apache/PHP install, you will need:</b><br/>
the binary file at http://bastel.duckdns.org/~public/s400w/ source and 32 bit binary for download there.<br/>
Avahi-daemon<br/>
Mod rewrite activated on Apache as well as some custom rules.<br/>
Imagemagick if you want Grayscale8, Binary, or PDF output. .<br/>

<b>Notes for using with VueScan:</b><br/>
VUESCAN IS HIGHLY RECOMMENDED FOR NOW. It is available for OSX, Linux and Windows. You can always test with the free version of VueScan.<br/>
As this is a sheetfeed scanner there is no real "preview" It is recommended to set the "Scan from Preview" option on the scan Page.

<b>Notes for Scanning in OSX Mojave:</b><br/>
Imaging app seems to always want to make a preview. For now, please use the Preview app. (this version however still has issues with scanning from either of these.). Once Apple compatibility is fixed , Imagemagick will be required in order to offer PDF output.

<b>Additional notes:</b><br/>
I use this mostly with a TP-Link TL-WN722N wireless USB adapter. This gives me faster connection, and better range than most internal wifi cards tested so far aside from one Intel integrated on an HP Laptop.<br/>
It seems that using 2 wifi cards (one to network and one to scanner),  for some reson,causes a substantial performance hit regardless of the channels used.  I do not know if this is because of the scanner or something in my test configuations thus far. <br/>
There is an untested possibility of using this scanner with a WiFi extender. This means that a WiFi extender , far from the host would connect to the scanner as a client, passing all data to/from scanner/host. Some (bridge) devices may even allow this to go from WiFi to Ethernet in much the same way allowing the DHCP to pass through the WiFi Device on to a separate network card on the host. In this later case this would be that the scanner is connected to an ethernet device on the host or the wifi device on the host meaning that if not in range of one device, it is available on the other. This may be beneficial in a large home or office. 

<b>Web GUI:</b><br/>
For scannining from a Web GUI, we also offer this bundled with a full web gui that allows scanning from eSCL clients as well as the web interface, as a commercial product.  The web interface has features like Multi-page PDF creation, Crop, Autocrop, Grayscale, flip , mirror, etc. The upcoming version 10 release will have a web based GUI image editor, and also offer compatibility with eSCL scanners as well, not just s400w based scanners. More information at http://airscan.teknogeekz.com . This new version 10 GUI version with Web interface will make scanning to these modern AirScan/eSCL scanners easy without the use of SANE, on any device from most any modern browser on your network, except Internet Explorer


<b>INSTALLING:</b><br/>

By default on Ubuntu, once Apache was installed I had /var/www/ as web root with a virtual hostname of /html/. These instructions worked on that config but may need tweaking on your system 

Install the /etc/apache2/apache2.conf.add file. This is an adendum to your existing file at that location on your system. DO NOT DELETE, NOR OVERWRITE the original file, you add this to it.

Install all files in webroot to your webroot, preserving filenames and fixing permissions appropriate to your system. On most debian systems the owner:group should be www-data:www-data

if you have a 32 bit system you can download the bastel binary here http://bastel.duckdns.org/~public/s400w/release/ . This 32 bit binary will also work on 64 it systems if you install 32 bit support. Otherwise go back to the bastel site s400w page http://bastel.duckdns.org/~public/s400w/ for source to compile a 64 bit binary.

Install the binary to your webroot for now. You can change this later by editing config.inc.php in the webroot.

activate mod rewrite
sudo a2enmod rewrite

restart apache

Test to see if you can load this URL changing the IP to host machines IP 

http://IP/eSCL/ScannerStatus
You should see an XML file or something is wrong. 

connect the scanner ,  via wifi, load a page, cd to webroot and complete a test scan using the binary like this

s400w 192.168.18.33 23 scan 300 XYZ.jpg

this should write XYZ.jpg to webroot folder.


install the avahi service file. You will need to edit this file with the hostname of your system leaving the trailing "." in Pace of HOSTNAME yourhostname.lan or yourhostname.local


Restart avahi

run avahi-browse -a -t 
In the avahi browse result you should see the scanner advertisement as _uscan._tcp

if all is successful you should be able to connect with VueScan and scan successfully


Genuine Apache software by an Apache for Apache2, 

Suuprt our effort and support us for on-gong projects

[![paypal](https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=DJAMBBLA84JA8


