<?php
	include_once("/var/www/php/sql_connect.php");

    $token = $_POST["token"];

	echo getEmailFromToken($token);
?>