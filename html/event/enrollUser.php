<?php
	include_once("/var/www/php/sql_connect.php");

	$token = $_POST["token"];
	$uid = getUserIDFromToken($token);
	
	echo addHunter($uid);
?>