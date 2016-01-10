<?php
	$url = 'http://steamcommunity.com/groups/OITGC/memberslistxml/?xml=1';
	#$url = "http://steamcommunity.com/groups/Valve/memberslistxml/?xml=1";
	$content = file_get_contents($url);
	$xml=simplexml_load_string($content) or die("Error: Cannot create object");
	$mem = $xml->members->steamID64;
	//print_r($xml->members->steamID64);
	for ($i=0; $i < count($mem); $i++) { 
		echo $mem[$i] . "<br>";
	}
	
	



	// $array = $xml->steamID64;
	// var_dump($array);

	//echo $content;
?>
<!-- /member list -->