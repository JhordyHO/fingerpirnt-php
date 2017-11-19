<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
set_time_limit(0);

include 'php_serial.class.php';
$comPort = "/dev/ttyACM3"; //The com port address. This is a debian address
$serial = new phpSerial;

$serial->deviceSet($comPort);
$serial->confBaudRate(9600);
$serial->deviceOpen();
//$serial->sendMessage("light"); 
$done = false;
$line = "";
	while (!$done){
		echo ".";
	$read = $serial->readPort();
		for ($i = 0; $i < strlen($read); $i++) 	
		{
			if ($read[$i] == "\n") 
			{
			
			echo $line;
			if((explode('10',$line)>0))
			$line = "";
		     $done = true;
			} 
			else 
			{
			$line .= $read[$i];
			}
		}
		

		usleep(1 * 1000000);
	}
$serial->deviceClose(); 
?>