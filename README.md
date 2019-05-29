# AirScanning
AirScanning for Ion AirCopy, Halo Magic Scanner(+ ePost),  Mustek iScan Air(Orignal), iScan Fly. Century CPS-A4WF, Transcription Patri Kun A4 Wi-Fi Portable Scanner 転写パットリくん A4 Wi-Fiポータブルスキャナー, and possibly others. heretofore referred to as s400w based or s400w compatible.

This allows the aforementioned s400w based scanners to connect to a host machine over a dedicated WiFi interface. The same host should have a wired ethernet inteface dedicated to the network with a FIXED IP (DHCP may cause issues once the WiFi Connects to the scanner) . The WiFi MUST use DHCP to connect to the scanner or scanning may fail. The host machine will then respond to Apple AirScan/eSCL scan requests and forward them on to the scanner, over the dedicated WiFi connection to the scanner. YOU DO NOT NEED SANE , this is NOT SANE compatible, other than if SANE ever produces an AppleAirScan/eSCL backend this scanner might then work with SANE using this code as a go-between, or bridge.

This code is tested only on Apache server and PHP 7 on x86_64 under Ubunti 16.04. It will likely run on other web servers however some rewrite mods must be activated for it to work, and it is untested. Ultimately, it would be nice to work this into the CUPS web server if that is possible. It would save from running a second web server. 

Currently the scanner will work fine with VueScan in eSCL mode (autodetected) with this software.  Tested with VueScan on Windows 7 and Ubuntu 16.04.

There are currenly issues with Apple AirScan as well as Mopria on Android. I hope to have these resolved soon.

<b>In addition to an Apache/PHP install, you will need:</b><br/>
the binary file at http://bastel.duckdns.org/~public/s400w/ source and 32 bit binary for download there.<br/>
Avahi-daemon<br/>
Mod rewrite activated on Apache as well as some custom rules.<br/>

<b>Notes for using with VueScan:</b><br/>
As this is a sheetfeed scanner there is no real "preview" It is recommended to set the "Scan from Preview" option on the scan Page.

<b>Notes for Scanning in OSX Mojave:</b><br/>
Imaging app seems to always want to make a preview. For now, please use the Preview app. (this version however still has issues with scanning from either of these.)

<b>Additional notes:</b><br/>
I use this mostly with a TP-Link TL-WN722N wireless USB adapter. This gives me faster connection, and better range than most internal wifi cards tested so far aside from one Intel integrated on an HP Laptop. 
There is an untested possibility of using this scanner with a WiFi extender. This means that a WiFi extender , far from the host would connect to the scanner , passing all data to/from scanner/host.


<b>Web GUI:</b><br/>
For scannining from a Web GUI, we also offer this bundled with a full web gui that allows scanning from eSCL clients as well as the web interface, as a commercial product.  The web interface has features like Crop, Autocrop, Grayscale, flip , mirror, etc. The upcoming version 10 release will have a web based GUI inage editor, and also offer compatibility with eSCL scanners as well, not just s400w based scanners. More information at http://airscan.teknogeekz.com . This new version 10 GUI version with Web interface will make scanning to these modern AirScan/eSCL scanners easy without the use of SANE, on any device from most any modern browser on your network, except Internet Explorer




