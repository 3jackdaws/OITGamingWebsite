<?php
    include_once("/var/www/php/sql_connect.php");
    

    
    $token = $_POST["token"];
    
    $perms = getUserPermissions($token);
    if($perms === 1)
    {
        if(strlen($_POST["games"]) !== 0)
        {   
            $gotw = fopen("games.txt","w");
            if(fwrite($gotw, $_POST["games"]))
            {
                echo "Update sucessful";
                copy("./suggested_games.txt", "./gs_bak/sg_".date(DATE_RSS));
                unlink("./suggested_games.txt");
            }
            else
            {
                 echo "File was not written";
            }
            fclose($gotw);


        }
    }
    else
    {
        echo "Invalid token.";
    }  
    
    ?>
    

