<?php
    include_once("/var/www/php/sql_connect.php");

    $token = $_POST["token"];
	
	sleep(0.5);

	echo  getUserPermissions($token);


?>