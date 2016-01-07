<?php  
    $gotw = fopen("topc.txt","r");
    $gotwarray = explode(";", fread($gotw, filesize("topc.txt")));
    fclose($gotw);
    if(strlen($_POST["title"]) > 2)
    {
        $gotwarray[0] = $_POST["title"];
    }
    if(strlen($_POST["body"]) > 2)
    {
        $gotwarray[1] = $_POST["body"];
    }
    if(strlen($_POST["cp"]) !== 0)
    {
        $gotwarray[2] = $_POST["cp"];
    }
    if(strlen($_POST["cost"]) !== 0)
    {
        $gotwarray[3] = $_POST["cost"];
    }
    if(strlen($_POST["text"]) > 2)
    {
        $gotwarray[4] = $_POST["text"];
    }
    if(strlen($_POST["color"]) > 2)
    {
        $gotwarray[5] = $_POST["color"];
    }

    $gotw = fopen("topc.txt","w");
    
    fwrite($gotw, implode(";", $gotwarray));
    fclose($gotw);
    
    if(copy("../../uploads/gotwimg.jpg", "gotwimg.jpg"))
    {
        ?>
Image upload succeeded. <a href="http://www.oitgaming.com/#gotw">Show me.</a>
        <?php
        unlink("../../uploads/gotwimg.jpg");
    }
    else
    {
        echo "Image upload failed.";
    }

?>

