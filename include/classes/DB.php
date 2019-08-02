<?php
session_start();
if(!defined('__CONFIG__')) {
	exit('You do not have a config file');
}

	
	$dbconnection = mysqli_connect('localhost', 'root', '', 'login_system');
	mysqli_set_charset($dbconnection, "utf8");
	if (!$dbconnection)
	{
		die("Could not connect: " . mysqli_connect_error());
	}

?>
