<?php
	include_once("/var/www/php/sql_connect.php");

    $token = $_POST["token"];

    if($token[0] === "$")
    {
    	echo getEmailFromToken($token);
    }

	
?>