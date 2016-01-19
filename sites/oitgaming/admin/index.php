<?php
    include_once("/var/www/web_classes/DUser.php");
    $token = $_COOKIE["token"];
   
    $user = new DUser($token);
    error_log($user->Email());

   
?>

<!DOCTYPE html>


<html lang="en">
    <head>
     <meta name="theme-color" content="#FF8800">
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="The Official Oregon Tech Gaming Community Website. The place to find event times, locations, and announcements.">
                        <meta name="author" content="Ian Murphy">
                            <link rel="icon" href="/assets/media/cog128.png">
                                
                                <title>Administration - oitgaming.com</title>
                                
                                <!-- Bootstrap core CSS -->
                                <link href="/assets/stylesheets/bootstrap.min.css" rel="stylesheet">
                                <link href="/assets/stylesheets/add.css" rel="stylesheet">
                                    
                                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                                    <!--[if lt IE 9]>
                                     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                     <![endif]-->
                                    
                                    
                                    
    </head>
   
    <style>
        
        </style>
    <!-- NAVBAR================================================== -->
<body>
    <br />
    <div class="container">
        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Administration</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../">Home</a></li>
                    <li><a href="../#events">Upcoming Events</a></li>
                    <li><a href="../#gotw">Game of the Week</a></li>
                    <li><a href="event.php">Event Control</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right" >
                    <li >
                    	<a href="/admin" onclick="setCookie('token', 'hi', 1)"><span class="glyphicon glyphicon-log-out"></span> Log out</a>	
                    </li>
                </ul>
            </div>
        </nav>
    </div>
            
        
    <!-- END NAVBAR -->
    
    <div class="container">
    <center>
        
        
        <h4><center>
    <?php
        
if($user->Perms() !== 1)
{
	if($user->Perms() === 0)
	{
		echo "<p style='color:red'>Invalid login token</p>";
	}
	?>
        <center>
            <h2>    
                Log in
            </h2>
            <form id="signin" method="POST" action="./gibcookie.php">
                <input class="form-control frm-sm" type="email" id="email2" name="email" value="OIT Email" onfocus="pwClear(this, 'OIT Email', 'text')" onblur="blurRe(this, 'OIT Email')">
                <br>
                <input class="form-control frm-sm" type="text" id="password2" name="password" value="Password" class="1" onfocus="pwClear(this, 'Password', 'password')" onblur="blurRe(this, 'Password')">
                <br>
                <button class="btn btn-default" type="button" onclick="logFormSubmit()">Submit</button>
                <div id="err2" style="color:red"></div>
            </form>
            <div id="output" style="color:red"></div>
    <?php
        	
}   //ending if bracket
else if($user->Perms() === 1) 
{
    if(isset($_FILES["gotwimg"]))
    {
        if($_FILES["gotwimg"]["type"] !== "image/jpeg")
        {
            $img_text = "That's not a jpeg.";
        }
        else if(move_uploaded_file($_FILES["gotwimg"]["tmp_name"], "../uploads/gotwimg.jpg"))
        {
            $img_text = "Image upload successful.";
        }
    }
    else
    {
        $img_text = "Image must be a jpeg.";
    }
    
    ?>
        <div >
            <button class="btn btn-primary" data-toggle="collapse" data-target="#gotwu">GOTW</button>
       
            <button class="btn btn-primary" data-toggle="collapse" data-target="#gsa">SUGGEST</button>
        
            <button class="btn btn-primary" data-toggle="collapse" data-target="#ann" onclick="getCurrentMOTD()">MOTD</button>

            <button class="btn btn-primary" data-toggle="collapse" data-target="#eventControl">EVENT CTRL</button>
        </div>    
        <div id="output" style="color:red"></div>    
            <div class="collapse" id="gotwu">
                <center><h2>Update GOTW</h2></center>
                <div class="col-lg-3">
                    <center>
                        <?=$img_text?>
                        <img src="/uploads/gotwimg.jpg" style="width:100%; height: 100%">
                        <br /><br />
                        <form role="form" action="./index.php" method="POST" enctype="multipart/form-data">
                            <input type="file" name="gotwimg" id="gotwimg">
                            <br />
                            <input class="btn btn-default" type="submit" value="Confirm Choice">
                        </form>
                    </center>
                </div>
                <div class="col-lg-9">
                    <form role="form" action="/assets/gotw/change_gotw.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                           <label for="title">Game Title:</label>
                           <input type="text" name="title" class="form-control" id="title">
                        </div>
                        <div class="form-group">
                           <label for="body">Body Text:</label>
                           <textarea type="text" name="body" rows="6" class="form-control" id="body"></textarea>
                        </div>
                        <div class="form-group">
                           <label for="body">$ Raised:</label>
                           <input type="text" name="cp" class="form-control" id="cp">
                        </div>
                        <div class="form-group">
                           <label for="body">$ Needed:</label>
                           <input type="text" name="cost" class="form-control" id="cost">
                        </div>
                        <div class="form-group ">
                           <label for="body">Bar Text When Full:</label>
                           <input type="text" name="text" class="form-control" id="text">
                        </div>
                        <div class="form-group">
                           <label for="body">Bar Color When Full:</label>
                           <input type="text" name="color" class="form-control" id="color">
                        </div>

                        <div class="form-group">
                          <input class="btn btn-default" type="submit" value="Submit">
                        </div>
                    </form> 
                </div>
            </div>
            <br>
            <div class="collapse" id="gsa">
                <h2>
                    <center>
                        Game Suggestion Approval
                    </center>   
                </h2>
                Non-approved Games <a href="#" onclick="obliterate(sGames)"><span style="font-size: .5em">[Remove All]</a></span>
                <br><br>
                <div id="suggestions"></div>
                <br><br>
                Approved Games
                <br><br>
                <div id="currentGames"></div>
                <br><br>
                <button class="btn btn-primary" onclick="submitGames()">Approve Games</button>
            </div>
    
    

        
            <div class="collapse" id="ann">
                <h2>
                    <center>
                        Change MOTD
                    </center>
                </h2>
                <div><h5>Current MOTD: <span id="currentMOTD" style="color:red"></span></div>
                <br>
                <div class="form-group">
                    <textarea id="motd" class="form-control frm-sm" rows=4></textarea>
                    <br><br>
                    <button class="btn btn-default" type="button" onclick="submitMOTD()">Submit MOTD</button>
                </div>
            
                </form>
            </div>

            <div class="collapse" id="eventControl">
                <h2>
                    <center>
                        Change MOTD
                    </center>
                </h2>
                <div><h5>Current MOTD: <span id="currentMOTD" style="color:red"></span></div>
                <br>
                <div id="eventOutput">
                </div>
                <div id="eventControlActions">
                    <button class="btn btn-warning" onclick="eventControl('set round 0')">Set to Round 0</button>
                    <button class="btn btn-default" id="roundAdvance">Advance Round</button>
                    <br>
                    <input id="cmd" type="text" style="font-family: monospace; width: 50%">

                </div>
            
                </form>
            </div>
            
                <?php
                
                    }
                ?>
    
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
    var cGames;
    var sGames;
    var token = "<?=$token?>";
    var errtext = "";
    $(document).ready(function(){
        $.get("/assets/gotw/suggested_games.txt", function(data){
            var suggestionList = data;
            
            sGames = suggestionList.split(";");
            var suggest = document.getElementById("suggestions");
            sortButtons(sGames, suggest, "sug");
        });
        $.get("/assets/gotw/games.txt", function(data){
            var suggestionList = data;
            
            cGames = suggestionList.split(";");
            var current = document.getElementById("currentGames");
            sortButtons(cGames, current, "cur");
        });
    });

    $("#roundAdvance").click(function(){
        alert("roundAdvance");
    });

    function eventControl(argument){
        $.post("/event/eventControl.php", {token: token, args: argument}, function(data){
            
            document.getElementById("output").innerHTML = data;
        });
    };

    function sortButtons(arr, elem, name)
    {
        arr.sort();
        var build = "";
        for (var i = 0; i < arr.length; i++) 
        {
            build = build + "<button class='btn btn-default' name='" + name + "' onclick='pushGame(this)'>" + arr[i] + "</button>";
        };
        elem.innerHTML = build;
    };

    function refreshLists()
    {
        var suggest = document.getElementById("suggestions");
        var current = document.getElementById("currentGames");
        sortButtons(cGames, current, "cur");
        sortButtons(sGames, suggest, "sug");
    }

    function submitGames()
    {
        var updated = cGames.join(";");
        $.post("/assets/gotw/update_games.php" , {games: updated, token: token}, function(data){
            document.getElementById('output').innerHTML = data;
        });
    }

    function submitMOTD()
    {
        var newMOTD = document.getElementById("motd").value;
        $.post("/assets/announcements/chmotd.php" , {annon: newMOTD, token: token}, function(data){
            document.getElementById('output').innerHTML = data;
            getCurrentMOTD();
        });
    }

    function getCurrentMOTD()
    {
        $("#currentMOTD").load("/assets/announcements/warn.txt");
    }

    function pushGame(elem)
    {
        var val = elem.innerHTML;
        
        if(elem.name === "cur")
        {
            sGames.push(val);
            var idx = cGames.indexOf(val);
            cGames.splice(idx, 1);
        }
        else
        {
            cGames.push(val);
            var idx = sGames.indexOf(val);
            sGames.splice(idx, 1);
        }
        refreshLists();
        
    }

    function logFormSubmit()
    {
        var e = document.getElementById("email2");
        var err = document.getElementById("err2");
        var pw = document.getElementById("password2");
        $.post("../login/login.php", {email: e.value, password: pw.value}, function(data)
            {
                if(data !== false)
                {
                    err.innerHTML = "Login successful";
                    setCookie("token", data, 7);
                    window.location = "/admin";
                }
                else
                {
                    err.innerHTML = "Invalid User/Pass";
                } 
            });
    };

    function obliterate(array)
    {
        array.splice(0, array.length);
        refreshLists();
    }

    function setCookie(cname, cvalue, exdays) 
    {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires + ";" +"path=/";
    };

    function pwClear(e, val, type)
    {
        if(e.value === val)
        {
            e.type = type;
            e.value = "";
        }    
    };
            
    function blurRe(e, prev){
        if(e.value === "")
        {
            e.value = prev;
            e.type = "text";
        }
    };

    $("#cmd").keyup(function(event)
        {
            if(event.keyCode == 13)
            {
                var cmd = document.getElementById("cmd").value;
                alert(cmd);
                
                eventControl(cmd);
            }
    });
    </script>
        