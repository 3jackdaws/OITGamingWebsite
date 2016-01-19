
<?php

	$url = 'http://steamcommunity.com/groups/OITGC/memberslistxml/?xml=1';
	#$url = "http://steamcommunity.com/groups/Valve/memberslistxml/?xml=1";
	$content = file_get_contents($url);
	$xml=simplexml_load_string($content) or die("Error: Cannot create object");
	$mem = $xml->members->steamID64;
	
	$i;


for ($i=0; $i < count($mem); $i++) 
{ 
	try{
		$url = 'https://steamcommunity.com/profiles/' . $mem[$i] .'/?xml=1';
		$eURL = 'https://steamcommunity.com/profiles/' . $mem[$i];
		#$url = "http://steamcommunity.com/groups/Valve/memberslistxml/?xml=1";
		$content = file_get_contents($url);
		//echo $url . "<br>";
		$err = false;
		$newxml=simplexml_load_string($content) or $err = true;
		$name = $newxml->steamID; 
		$pic = $newxml->avatarMedium;
		
		if(!$err){
		?>
			<div class="memberIcnDiv">
				<a href="#memberList" >
					<img class="img-circle memberIcon" onclick="memberSelect(this, '<?=$eURL?>')" data-toggle="tooltip" data-placement="top" title="<?=$name?>" src="<?=$pic?>" >
				</a>
			</div>
	

		
		<?php
		}
	}	
	catch(Exception $e)
	{
		error_log($e->getMessage());
	}
	
}
	

?>
	



	

	

	