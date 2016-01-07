<?php
	include_once("/var/www/php/sql_connect.php");
	sleep(1);
	$token = $_POST["token"];
	$enteredHID = $_POST["quarry"];
	
	$uid = getUserIDFromToken($token);

	$stats = getHunterStats($uid);

	$assignedQuarry = $stats[5];
	$hid = $stats[3];

	if($enteredHID === $assignedQuarry)
	{
		echo "Contract Redeemed";
		incrementPoints($uid);
		eliminatePlayer($assignedQuarry, $hid);
		getNewQuarry($uid);
	}
	else
	{
		echo "That is not the ID of your target";
	}
	
	



?>