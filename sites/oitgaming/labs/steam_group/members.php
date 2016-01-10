
<?php

$url = 'http://steamcommunity.com/groups/OITGC/memberslistxml/?xml=1';
	#$url = "http://steamcommunity.com/groups/Valve/memberslistxml/?xml=1";
	$content = file_get_contents($url);
	$xml=simplexml_load_string($content) or die("Error: Cannot create object");
	$mem = $xml->members->steamID64;
	//print_r($xml->members->steamID64);
	$i;


for ($i=0; $i < count($mem); $i++) 
{ 
	$url = 'http://steamcommunity.com/profiles/' . $mem[$i] .'/?xml=1';
	$eURL = 'http://steamcommunity.com/profiles/' . $mem[$i];
	#$url = "http://steamcommunity.com/groups/Valve/memberslistxml/?xml=1";
	$content = file_get_contents($url);
	//echo $url . "<br>";
	$newxml=simplexml_load_string($content) or die("Error: Cannot create object");
	$name = $newxml->steamID; 
	$pic = $newxml->avatarMedium;

?>
	<div class="memberIcnDiv">
		<a href="#memberList" >
			<img class="img-circle memberIcon" onclick="memberSelect(this, '<?=$eURL?>')" data-toggle="tooltip" data-placement="top" title="<?=$name?>" src="<?=$pic?>" >
		</a>
	</div>
<?php
	
	
}
	

?>
	



	

	

	