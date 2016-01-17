<?php
	include_once("/var/www/php/sql_connect.php");
	include_once("/var/www/web_classes/DHunter.php");
	sleep(1);
	$token = $_POST["token"];
	$enteredHID = $_POST["quarry"];
	
	$user = new DHunter($token);

	if($enteredHID === "NEW")
	{
		$timeTil = $user->requestNewQuarry();
		if($timeTil === true)
		{
			echo "TRUE";
		}
		else
		{
			echo $timeTil;
		}
	}
	else
	{
		$assignedQuarry = $user->Quarry();

		if($enteredHID === $assignedQuarry)
		{
			echo "Contract Redeemed";
			$user->IncrementPoints();
			$user->getQuarry();
			$user->pushQuarry();
			addToGameLog($user->HID(), $assignedQuarry);
		}
		else
		{
			echo "That is not the ID of your target";
		}
	}
	
	
	



?>