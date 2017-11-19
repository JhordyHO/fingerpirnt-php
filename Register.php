<?php
require 'vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
set_time_limit(0);

include 'php_serial.class.php';
$config = include('config.php');
$comPort = $config['device']; //The com port address. This is a debian address
$serial = new phpSerial;

$serial->deviceSet($comPort);
$serial->confBaudRate(9600);
$serial->deviceOpen();
$serial->sendMessage("L"); 
$done = false;
$getId = 0;
$line = "";
	while (!$done){
	$read = $serial->readPort();
		for ($i = 0; $i < strlen($read); $i++) 	
		{
			if ($read[$i] == "\n") 
			{
			
			if($line === 'SUCCESS'){
			 $getId ++;
			}
			if($getId == 1) { 
			 	echo $line;
			 	$done = true;
			 	$line = "";	
			 }
			$line = "";
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