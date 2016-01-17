<?php
    include_once("/var/www/php/sql_connect.php");

    $email = $_POST["email"];
	$password = $_POST["password"];
	
	sleep(0.5);

	echo addNewUserToDatabase($email, $password);
    

?>
