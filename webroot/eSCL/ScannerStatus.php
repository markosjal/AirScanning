<?php
header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: no-cache, no-store, must-revalidate');
//error_reporting( -1 );
//ini_set( 'display_errors', 1 );
include_once '../checkstatusescl.php';
include_once '../config.inc.php';
if ($scanneronline=='yes')
{
	$version = "$s400w $host $port version";
	$versionoutput = shell_exec("$version");
	$string = $versionoutput;
	$last_word_start = strrpos($string, ' ') + 1; // +1 so we don't include the space in our result
	$last_word = substr($string, $last_word_start); // $last_word = PHP.
	$lastwordb=preg_replace('/\s+/', '', $last_word);
}
else
{
}

if ((trim($lastwordb) !="") && (trim($lastwordb) !=NULL)) 
{
$lastwordc='on '.$lastwordb;
 }
else 
{
$lastwordc='';
}

$xml='<scan:ScannerStatus xmlns:scan="http://schemas.hp.com/imaging/escl/2011/05/03" xmlns:pwg="http://www.pwg.org/schemas/2010/12/sm" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://schemas.hp.com/imaging/escl/2011/05/03 ../../schemas/eSCL-1_90.xsd">
<pwg:Version>2.63</pwg:Version>
<pwg:State>'.$statusmessagetxt.'</pwg:State> 
</scan:ScannerStatus>';  //Processing /Idle//$statusmessagetxt //$lastword $lastword //2.0

$scannercapabilities='<?xml version="1.0" encoding="UTF-8"?>
<!-- THIS DATA SUBJECT TO DISCLAIMER(S) INCLUDED WITH THE PRODUCT OF ORIGIN. -->
<scan:ScannerCapabilities xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:scan="http://schemas.hp.com/imaging/escl/2011/05/03" xmlns:pwg="http://www.pwg.org/schemas/2010/12/sm" xsi:schemaLocation="http://schemas.hp.com/imaging/escl/2011/05/03 eSCL.xsd">
        <pwg:Version>2.63</pwg:Version>
	<pwg:MakeAndModel>AirScanning '.$lastwordc.'</pwg:MakeAndModel>
        <!--<pwg:SerialNumber>VNC3K44877</pwg:SerialNumber>
        <scan:UUID>564E4333-4B34-3438-3737-84A93E4FA59A</scan:UUID>-->
        <scan:AdminURI>http://'.gethostname().'./airscan.php</scan:AdminURI>
	<scan:IconURI>http://'.gethostname().'/images/AirScanIcon2.png</scan:IconURI>
        <scan:Platen>
                <scan:PlatenInputCaps>
                        <scan:MinWidth>300</scan:MinWidth>
                        <scan:MaxWidth>2550</scan:MaxWidth>
                        <scan:MinHeight>300</scan:MinHeight>
                        <scan:MaxHeight>4780</scan:MaxHeight>
                        <scan:MaxScanRegions>1</scan:MaxScanRegions>
                        <scan:SettingProfiles>
                                <scan:SettingProfile>
                                        <scan:ColorModes>
                                                <scan:ColorMode>RGB24</scan:ColorMode>
                                                <scan:ColorMode>Grayscale8</scan:ColorMode>
                                                <scan:ColorMode>Binary</scan:ColorMode>
                                        </scan:ColorModes>
                                        <scan:ContentTypes>
                                                <pwg:ContentType>TextAndPhoto</pwg:ContentType>
                                        </scan:ContentTypes>
                                        <scan:DocumentFormats>
                                                <pwg:DocumentFormat>image/jpeg</pwg:DocumentFormat>
                                                <pwg:DocumentFormat>application/pdf</pwg:DocumentFormat>
                                                <pwg:DocumentFormat>application/octet-stream</pwg:DocumentFormat>
                                                <scan:DocumentFormatExt>image/jpeg</scan:DocumentFormatExt>
                                                <scan:DocumentFormatExt>application/pdf</scan:DocumentFormatExt>
                                                <scan:DocumentFormatExt>application/octet-stream</scan:DocumentFormatExt>
                                        </scan:DocumentFormats>
                                        <scan:SupportedResolutions>
                                                <scan:DiscreteResolutions>
                                                        <scan:DiscreteResolution>
                                                                <scan:XResolution>300</scan:XResolution>
                                                                <scan:YResolution>300</scan:YResolution>
                                                        </scan:DiscreteResolution>
                                                        <scan:DiscreteResolution>
                                                                <scan:XResolution>600</scan:XResolution>
                                                                <scan:YResolution>600</scan:YResolution>
                                                        </scan:DiscreteResolution>
                                                </scan:DiscreteResolutions>
                                        </scan:SupportedResolutions>
                                        <scan:ColorSpaces>
                                                <scan:ColorSpace>sRGB</scan:ColorSpace>
                                        </scan:ColorSpaces>
                                </scan:SettingProfile>
                        </scan:SettingProfiles>
                        <scan:SupportedIntents>
                                <scan:Intent>Preview</scan:Intent>
                                <scan:Intent>TextAndGraphic</scan:Intent>
                        </scan:SupportedIntents>
                        <scan:MaxOpticalXResolution>600</scan:MaxOpticalXResolution>
                        <scan:MaxOpticalYResolution>600</scan:MaxOpticalYResolution>
                </scan:PlatenInputCaps>
        </scan:Platen>
        <scan:eSCLConfigCap>
                <scan:StateSupport>
                        <scan:State>disabled</scan:State>
                        <scan:State>enabled</scan:State>
                </scan:StateSupport>
                <scan:ScannerAdminCredentialsSupport>true</scan:ScannerAdminCredentialsSupport>
        </scan:eSCLConfigCap>
</scan:ScannerCapabilities>';
//                                <scan:Intent>Document</scan:Intent>
//                                <scan:Intent>Photo</scan:Intent>

if ($scanneronline=='yes')
{
	/*$version = "$s400w $host $port version";
	$versionoutput = shell_exec("$version");
	$string = $versionoutput;
	$last_word_start = strrpos($string, ' ') + 1; // +1 so we don't include the space in our result
	$last_word = substr($string, $last_word_start); // $last_word = PHP.
	$lastword=preg_replace('/\s+/', '', $last_word);
         */
//file_put_contents('ScannerCapabilities.xml', $scannercapabilities);
}
else 
{
//$xml='';
//$scannercapabilities='';
//file_put_contents('ScannerCapabilities.xml', $scannercapabilities);
}


echo $xml;
file_put_contents('ScannerCapabilities.xml', $scannercapabilities);
?>




