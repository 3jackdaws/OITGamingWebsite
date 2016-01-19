<?php
    include_once("/var/www/web_classes/DUser.php");
    include_once("/var/www/php/sql_connect.php");
   
    $user = new DUser($_COOKIE["token"]);
    error_log($user->Email());

    if($user->Perms() == 1)
    {
        $string = $_POST["query"];
        if(isset($_POST["query"]))
        {
            $query = $_POST["query"];
            $string = db_find($query);
        }
        
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
                    <li><a href="../picker">GOTW Pool</a></li>
                    <li><a href="mailto:gaming@oit.edu">Contact</a></li>
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
        <div class="row">
        <center>
            <div class="col-lg-4">
                <div class="jumbotron">
                    <h2>Event Control</h2>
                    <button class="btn btn-primary btn-sm" id="event_start">Start Event</button>
                    <br><br>
                    <button class="btn btn-primary btn-sm" id="event_start">Set All To Null</button>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="jumbotron">
                    <h2>Look up Player</h2>
                    <form class="form-inline" method="post" action="./event.php">
                        <input type="text" class="form-control"  name="query" id="lookup"  placeholder="Name, ID, or Email"/>
                        
                        <button class="btn btn-primary btn-sm" id="event_start">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <?=var_dump($string);?>
            </div>
        </center>
        </div>
    </div>
    
    
    
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
    
    $(document).ready(function(){
        
    $("#roundAdvance").click(function(){
        alert("roundAdvance");
    });

    function eventControl(argument){
        $.post("/event/eventControl.php", {token: token, args: argument}, function(data){
            
            document.getElementById("output").innerHTML = data;
        });
    };

    

    
    function setCookie(cname, cvalue, exdays) 
    {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires + ";" +"path=/";
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
        <?php
    }
?>


        