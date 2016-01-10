<?php
    
    include_once("/var/www/web_classes/eventcontrol.php");
    $token = $_COOKIE["token"];
    $db = new OITDatabase;
    //var_dump($db->db_connection);
    echo "<br><br><br>";
    //var_dump($db->SQLPrepare("SELECT * FROM users;"));
    echo "<br><br><br>";
    //var_dump($db->SQLGetResult());
    echo "<br><br><br>";
    echo "<br><br><br>";

    
    
    //echo $user->Email() . " " . $user->Perms();
    $user = new DUser($token);
    echo $user->Email();

    $Eventcontol = new EventControlModule();
    $Eventcontol->user = $user;
    var_dump($Eventcontol->Authenticate());

    //var_dump($user);
    echo "<br><br>";

    //var_dump($Eventcontol);


?>