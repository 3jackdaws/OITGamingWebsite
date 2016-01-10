<?php
	include_once("/var/www/php/sql_connect.php");
	$token = $_POST["token"];
	$newA = $_POST["annon"];
	$options = $_POST["options"];
	$perms = getUserPermissions($token);
	if($perms === 1)
	{
		
	    if(strlen($newA) !== 0)
	    {
	        $warn = fopen("warn.txt", "w");
	        fwrite($warn, $options . $newA);
	        fclose($warn);
	        
	        echo "Update successful.";
	        

	    }
 		else {
    		echo "Update not applied";   
		}
	}
?>

