<?php
    include("/var/www/web_classes/DHunter.php");
    $token = $_COOKIE["token"];
    $db = new OITDatabase;
    //var_dump($db->db_connection);
    echo "<br><br><br>";
    //var_dump($db->SQLPrepare("SELECT * FROM users;"));
    echo "<br><br><br>";
    //var_dump($db->SQLGetResult());
    echo "<br><br><br>";
    echo "<br><br><br>";

    $user = new DUser($token);
    
    //echo $user->Email() . " " . $user->Perms();


    $hunter = new DHunter($token);
    var_dump($hunter);


?>