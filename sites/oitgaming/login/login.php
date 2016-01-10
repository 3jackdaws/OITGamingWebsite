<?php
    include_once("/var/www/web_classes/DUser.php");

    $email = $_POST["email"];
	$password = $_POST["password"];
	
	sleep(1);
	
    $user = new DUser(NULL);
    echo $user->Login($email, $password);
    
?>