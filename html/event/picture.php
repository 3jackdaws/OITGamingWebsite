<?php
include_once("/var/www/php/sql_connect.php");
	$token = $_COOKIE["token"];
	var_dump($_FILES);
	if(isset($_FILES["hpic"]))
    {
    	echo "isset";
    	$tmpdir = tempnam("/var/www/uploads", "img_");
        if($_FILES["hpic"]["type"] !== "image/jpeg")
        {
            $img_text = "That's not a jpeg.";
        }
        else if(move_uploaded_file($_FILES["gotwimg"]["tmp_name"], $tmpdir))
        {
        	$uid = getUserIDFromToken($token);
        	
            $img_text = updateEventPicture($uid, $tmpdir);
        }
    }
    else
    {
        $img_text = "Image must be jpeg and less than 200kb.";
    }

?>

<center>
	<img src="<?=$result[3]?>" style="width: 200px; height: 200px;">
	<br>
	<br>
	<form role="form" action="picture.php" enctype="multipart/form-data">
		<input class="btn" type="file" name="hpic">
		<br />
		<button class="btn btn-default">Confirm Choice</button>
		<div id="picerr"><?=$img_text?></div>
	</form>
	
</center>