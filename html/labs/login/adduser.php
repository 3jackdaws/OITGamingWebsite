<?php
    include_once("/var/www/web_classes/DUser.php");

    $email = $_POST["email"];
	$password = $_POST["password"];
	
	sleep(0.5);

	$user = new DUser(NULL);

	try{
		echo $user->CreateNew($email, $password);
	}
	catch(Exception $e){
		echo "Exception caught: " . $e->getMessage();
	}
	

    

?>
