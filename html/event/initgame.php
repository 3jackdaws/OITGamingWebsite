<?php
	include_once("/var/www/php/sql_connect.php");
	$token = $_POST["token"];
	if(getUserPermissions($token) === 1)
	{
		echo setRoundToZero();
		
	}
	else
	{
		echo "Insufficient privilege";
	}
	
?>