<?php
    include_once("/var/www/php/sql_connect.php");

    $email = $_POST["email"];
	$password = $_POST["password"];
	
	sleep(1);
	$return = getLoginToken($email, $password);
    if($return === false)
    {
    	echo "failure";
    }
    else
    {
    	echo $return;
    }
?>