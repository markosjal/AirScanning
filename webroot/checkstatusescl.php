<?php
include_once 'config.inc.php';
include_once 'checkpingescl.php';
// Generates staus messages to pass to eSCL Protocol XML ScannerStatus(.xml). Only "Stopped" , "Idle" and "Processing" apply to eSCL. 
//Any other result may show unpredictable or "unknown" status, but here they are anyway.
if ($scanneronline=='yes')
{
//usleep(500000);
$status = "$s400w $host $port status";
//usleep(500000);
$string = shell_exec("$status");
//$string = $statusoutput;
	if (($string!='') && ($string!=NULL) && (isset($string)))
	{
	$last_word_start = strrpos($string, ' ') + 1; // +1 so we don't include the space in our result
	$last_word = substr($string, $last_word_start); // $last_word = PHP.
	$lastword=preg_replace('/\s+/', '', $last_word);
	$now=time();
	// apparently no session support at least on mopria so we save to file
       	$expiration=file_get_contents($root.'eSCL/lastscan.txt'); //if we just did a scan this has an valid expiration to keep it from showing "No Page" when we should see "processing"	
	//echo $expiration-$now;	
		if ($expiration>=$now) //(($expiration-$now <= 0) && ($expiration-$now >= 15))
		{
		$statusmessagetxt='Processing'; // need proper response here! ScanReady ???? ReadyToUpload?? Ready??
		}		


		//elseif ((trim($lastword)=='nopaper') && ($expiration>=$now)) {  //online but no page loaded , but compled scan recently -nested if
       		//$statusmessagetxt='Processing';
       		//}
		elseif ((trim($lastword)=='nopaper') && ($expiration<=$now)) 
		{  //online but no page loaded  -nested if
       		$statusmessagetxt='Idle';
       		}
       		//elseif (trim($lastword)=='scango') {      //(trim($lastword)==''))  online scanning  -nested if //getting '' while scanning on halo magic scanner
       		//$statusmessagetxt='Processing';
       		//}

       		//elseif ((trim($lastword)=='') || (trim($lastword)==NULL) || (!isset($lastword))) 
		//{ //(trim($lastword)=='')) {  //online scanning  -nested if //getting '' while scanning on halo magic scanner
       		//$statusmessagetxt='Processing';
       		//}

       		elseif (trim($lastword=='devbusy'))
		{  //online device is busy  -nested if
       		$statusmessagetxt='Processing';
       		}
       		elseif (trim($lastword=='battlow'))
		{  //online but battery low  -nested if
       		$statusmessagetxt='Stopped';
       		}
       		elseif (trim($lastword=='scanready'))
		{   //online with page loaded  -nested elseif
     		$statusmessagetxt='Idle';
		}
       		elseif (trim($lastword)=='calgo')
		{   //online calibrating  -nested elseif
		$statusmessagetxt='Calibrating';
		}
        	elseif (trim($lastword)=='cleango')
		{   //online cleaning  -nested elseif
       		$statusmessagetxt='Cleaning';
		}
        	elseif (trim($lastword)=='calibrate')
		{   //online calibration complete  -nested elseif
       		$statusmessagetxt='CalibrationComplete';
		}
 	       	elseif (trim($lastword)=='cleanend')
		{   //online cleaning complete  -nested elseif
       		$statusmessagetxt='CleaningComplete';
		}
        	elseif (trim($lastword)=='dpifine')
		{   //600dpi calibrating  -nested elseif
       		$statusmessagetxt='60DPI';
		}
	        elseif (trim($lastword)=='dpistd')
		{   //300dpi  -nested elseif
       		$statusmessagetxt='300DPI';
		}
		else {    //other- unknown paper condition -nested else
	        $statusmessagetxt= 'Stopped';
		}

	}
	else
	{
	$statusmessagetxt= 'Idle';
	}
}	
elseif ($scanneronline=='no')
{    						//offline -nested else
$statusmessagetxt= 'Stopped';  //found "Stopped" in PWG document. Makes red dot on Mopria , so seems to work! //
}                               //So when scanner off we still generate ScannerStatus.xml. 
				//This shows Red Dot and "Stopped" in Mopria instad of yellow dot and "unknown"
				//Coincides with indicators on scanner 
/*
echo $expiration;
echo '<br>';
echo $now;
*/
/*

$key = false;

    while($key){
        sleep(1);
	$now2=time();
        if($expiration <= $nowagain) $key = true;
    }
echo '<br>Exp'.$expiration;
echo '<br>now'.$now2;
echo '<br>dif'.$expiration - $nowagain;
*/
?>

