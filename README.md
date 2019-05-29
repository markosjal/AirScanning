# AirScanning
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
VUESCAN IS HIGHLY RECOMMENDED FOR NOW. It is available for OSX, Linux and Windows. You can often buy a VueScan License on eBay for $2 USD , and a single License as of this writing is for up to 4 devices.<br/>
As this is a sheetfeed scanner there is no real "preview" It is recommended to set the "Scan from Preview" option on the scan Page.

<b>Notes for Scanning in OSX Mojave:</b><br/>
Imaging app seems to always want to make a preview. For now, please use the Preview app. (this version however still has issues with scanning from either of these.). Once Apple compatibility is fixed , Imagemagick will be required in order to offer PDF output.

<b>Additional notes:</b><br/>
I use this mostly with a TP-Link TL-WN722N wireless USB adapter. This gives me faster connection, and better range than most internal wifi cards tested so far aside from one Intel integrated on an HP Laptop.<br/>
It seems that using 2 wifi cards (one to network and one to scanner),  for some reson,causes a substantial performance hit regardless of the channels used.  I do not know if this is because of the scanner or something in my test configuations thus far. <br/>
There is an untested possibility of using this scanner with a WiFi extender. This means that a WiFi extender , far from the host would connect to the scanner as a client, passing all data to/from scanner/host. Some (bridge) devices may even allow this to go from WiFi to Ethernet in much the same way allowing the DHCP to pass through the WiFi Device on to a separate network card on the host. In this later case this would be that the scanner is connected to an ethernet device on the host or the wifi device on the host meaning that if not in range of one device, it is available on the other. This may be beneficial in a large home or office. 

<b>Web GUI:</b><br/>
For scannining from a Web GUI, we also offer this bundled with a full web gui that allows scanning from eSCL clients as well as the web interface, as a commercial product.  The web interface has features like Crop, Autocrop, Grayscale, flip , mirror, etc. The upcoming version 10 release will have a web based GUI inage editor, and also offer compatibility with eSCL scanners as well, not just s400w based scanners. More information at http://airscan.teknogeekz.com . This new version 10 GUI version with Web interface will make scanning to these modern AirScan/eSCL scanners easy without the use of SANE, on any device from most any modern browser on your network, except Internet Explorer




