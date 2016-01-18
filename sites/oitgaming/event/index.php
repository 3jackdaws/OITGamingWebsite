<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#337ab7">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="keywords" content="oregon tech gaming community">
                    <meta name="description" content="The Official Oregon Tech Gaming Community Website. The place to find event times, locations, and announcements.">
                        <meta name="author" content="Ian Murphy">
                            <link rel="icon" href="/assets/media/cog128.png">
                                
                                <title>Event Standings</title>
                                
                                <!-- Bootstrap core CSS -->
                                <link href="/assets/stylesheets/bootstrap.min.css" rel="stylesheet">
                                <link href="/assets/stylesheets/add.css" rel="stylesheet">
                                    
                                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                                    <!--[if lt IE 9]>
                                     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                     <![endif]-->
                                    
                                    
                                    
    </head>
    <!--  PHP ================== -->
    <?php
    include_once("/var/www/php/sql_connect.php");
    if(isset($_COOKIE["token"]))
    {
        $token = $_COOKIE["token"];
    }
    include("/var/www/web_classes/DHunter.php");
    $hunter = new DHunter($token);
    $quarry = $hunter->Quarry();



    if(isset($_FILES["hpic"]))
    {
        
        $tmpdir = tempnam("/var/www/sites/oitgaming/uploads", "img_");
        // unlink($tmpdir);
        $tmpdir = $tmpdir;
        $path = explode("oitgaming", $tmpdir);
        if($_FILES["hpic"]["type"] === "image/jpeg" and $_FILES["hpic"]["size"] < 10*1024*1024)
        {
            if(move_uploaded_file($_FILES["hpic"]["tmp_name"], $tmpdir))
            {
                fixOrientation($tmpdir);
            
                $img_text = $hunter->ChangeAvatar($path[1]);
            }
        }
        else 
        {
            $img_text = "That's not a jpeg or it is over 6MB";
        }
        
    }
    else
    {
        $img_text = "";
    }

        
    ?>

    <style>
        

        .jumbotron-vert{
            background-color: #FCFCFC;
            
            border: 1px solid lightgrey;
            border-radius: 3px;
            margin-top: 5%;
            margin-bottom: 5%;
            margin-right: auto;
            margin-left: auto;
            max-width: 400px;
            min-height: 400px;
            box-shadow: 0px 2px 7px 2px lightgrey;
            overflow:hidden;
        }
        

        .glyphicon-refresh-animate {
                    -animation: spin .7s infinite linear;
                    -webkit-animation: spin2 .7s infinite linear;
                }

                @-webkit-keyframes spin2 {
                    from { -webkit-transform: rotate(0deg);}
                    to { -webkit-transform: rotate(360deg);}
                }

                @keyframes spin {
                    from { transform: scale(1) rotate(0deg);}
                    to { transform: scale(1) rotate(360deg);}
                }
       
        .left{
            font-size: 10px;
            color: #AAA;
            /*width: 30%;
            float: left;
            text-align: right;
            padding-right: 2%;*/
        }
        .right{
           /* width: 70%;
            float: left;
            text-align: left;
            padding-left: 2%;*/
        }
        

    </style>
    <!-- NAVBAR================================================== -->
    <body>
   
    <div id="adjust"><br></div>
    <div class="container">
        <nav id="nav" class="navbar navbar-inverse">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">My Profile</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">Home</a></li>
                    <li><a href="/#events">Upcoming Events</a></li>
                    <li><a href="/#gotw">Game of the Week</a></li>
                    <li><a href="/picker">GOTW Pool</a></li>
                    <li><a href="mailto:gaming@oit.edu">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="leaderboard" >Leaderboard and Log</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
        
    <!-- END NAVBAR -->
    

    <!-- BODY CONTAINER -->
    <div id="fill" class="container">

    <?php

    if($hunter->Email() != NULL)
    {
        
        if(isset($quarry))
        {
            $quarry = getQuarryStats($quarry);
        }
        else
        {
            $quarry[2] = "No Quarry Assigned";
            $quarry[4] = "/uploads/null.jpg";

        }
        if($hunter->ElimBy() != NULL)
        {
            $elimBy = getQuarryStats($result[8]);
            $elimBy = $elimBy[2];
            $elimBy = "Eliminated by " . $elimBy;
        }
        else
        {
            $elimBy = "Not yet eliminated.";
        }
    
        if($hunter->HID() == NULL)
        {
            echo "<center><button class='btn btn-default btn-lg' onclick='addUserToEvent()'>Participate in the Event</button>";
        }
            #user has already entered
        else
        {
            ?>

                
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-lg-6">
                            <h3><center>You:</h3>
                                <div class="jumbotron-vert" style="">
                                    <center>
                                        <div style="max-height: 80vw; height: 400px; width: 100%; overflow: hidden; background: url('<?=$hunter->Avatar()?>') no-repeat; background-size: cover; background-position: center center">
                                            
                                        </div>
                                        
                                        <?php
                                        if($hunter->Quarry() == NULL)
                                        {
                                            ?>

                                            <a href="javascript:void(0)" data-toggle="collapse" data-target="#img_new"><h6>Change Image</a>
                                        <div id="picerr" style="color: red"><?=$img_text?></div>
                                        <div id="img_new" class="collapse" style="text-align: left; padding: 5%">
                                            
                                            Image must be a jpeg no larger than 6MB.  Upload a high enough resolution image that other players can identify you.
                                            <br><br>
                                            A square image works best as the above display area is a square.
                                            <center>
                                            <form role="form" action="index.php" method="POST" enctype="multipart/form-data">
                                                <input class="btn" type="file" name="hpic">
                                                <br />
                                                <button class="btn btn-default">Confirm Choice</button>
                                            </form>
                                        </div>


                                            <?php
                                        }
                                        ?>
                                        
                              
                                   
                                        <div class="" style="text-align: center; margin: 10%;">
                                    
                                            <div class="row flex">
                                                <div style="float: left; text-align: center; min-width: 50%">
                                                    <div class="left">Name:</div>
                                                    <div class="right"><h3 style="margin:0"><?=$hunter->FirstName()?></div>
                                                    <br>
                                                    <div class="left">Player ID:</div>
                                                    <div class="right"><?=$hunter->HID()?></div>
                                                </div>
                                                <div style="float: right; ">
                                                    <div class="left">Current Score:</div>
                                                    <div class="right"><h1 style="margin: 0;"><?=$hunter->Points()?></h1></div>
                                                    points
                                                </div>  
                                                
                                            </div>
                                        
                                        <!-- <hr class="featurette-divider">
                                            <div class="row">
                                                <div class="left">Status</div>
                                                <div class="right"><?=$elimBy?></div>
                                            </div>      -->
                                        </div>
                                        <br>
                                        <div>
                                            <a href="mailto:event-issues@oitgaming.com">Problems?</a>
                                        </div>
                                    </div>
                                
                                </div>
                            
                            

    <!-- Quarry -->
                            <div class="col-lg-6">
                            <h3><center>Your Target:</h3>
                                <div class="flip">
                                    <div id="quarry" class="card">
                                        <div class="face front">
                                            <div id="qCard" class="inner jumbotron-vert" style="height: 460px;">
                                                <center>
                                                    
                                                    <div style="max-height: 80vw; height: 400px; width: 100%; overflow: hidden; background: url('<?=$quarry[4]?>') no-repeat; background-size: cover; background-position: center center">
                                            
                                        </div>
                                                    
                                                <div class="row">
                                                    
                                                    
                                                        <h3>
                                                        <center><?=$quarry[2]?></center>
                                                            
                                                        </h3>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                        <div class="face back">
                                            <div class=" jumbotron-vert" style="height: 460px; padding-top: 100px;">
                                                
                                                <h1>Redeem:</h1>
                                                
                                                <center>
                                                <form style="width: 40%">
                                                    <label style="color: grey">Enter your target's 4 character ID and click submit.</label>
                                                    <br><br>
                                                    <input id="qID" class="form-control" type='text' placeholder="Quarry ID">
                                                    <br>
                                                    <button id="qRedeem" class="btn btn-default" type=button>Submit</button>
                                                </form>
                                                <br>
                                                <div id="qErr" style="color:red"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <button id="bFlip" class="btn btn-default">FLIP CARD</button>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                
            <?php
        }
    }   
    else
    {
        ?>
        <center><button onclick="document.location = '/login'" class='btn btn-default btn-lg'>Sign in</button>
        <?php
    }

    ?>
    </div>
    
    <div id="err" style="color:red; text-align: center; font-size: 2em">
    </div>
    <!-- END JUMBOTRON AND SIGNUP FORM -->
            
            
    

   
    <?php
        include("/var/www/snippets/event_footer.php");
    ?>
    
        
        

        
        <!-- Bootstrap core JavaScript
         ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>

        $(document).ready(function()
        {       
   
            if( $(window).width() < 1000)
            {
                $("#nav").toggleClass("navbar-fixed-top");
                $("#adjust").html("<br><br><br>");
            }
            
            // getUser();     
        }); 
        $('#bFlip').click(function(){
            $("#quarry").toggleClass('flipped');

        });

        $('#newQuarry').click(function(){
            if(confirm("Requesting a new contract will remove your current contract.  You can only request a new contract every 24 hours.  Click OK to continue with this request."))
            {
                $.post("getNewQuarry.php", {token: "<?=$token?>", quarry: "NEW"}, function(data)
                {


                    if(data === "TRUE")
                    {
                        setTimeout(function(){$("#quarry").toggleClass('flipped');}, 700);

                        setTimeout(function(){window.location = "/event";}, 1000);
                    }
                    else if(data[0] === "T")
                    {
                        document.getElementById("err").innerHTML = data;
                    }
                    else{
                        document.getElementById("err").innerHTML = "You must wait " + data + " more hours before requesting a new contract";
                    }
                });
            }
            
        });

        $("#qRedeem").click(function(){
            var quarryID = document.getElementById("qID").value;
            document.getElementById("qErr").innerHTML = "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'></span>";
            $.post("getNewQuarry.php", {token: "<?=$token?>", quarry: quarryID}, function(data)
                {
                    document.getElementById("qErr").innerHTML = data;
                    if(data === "Contract Redeemed")
                    {
                        setTimeout(function(){$("#quarry").toggleClass('flipped');}, 700);

                        setTimeout(function(){window.location = "/event";}, 1000);
                        
                    }
                });
        });

        $(document).ready(function()
        {
            
        
        }); 

        function capitalizeFirstLetter(string)
        {
            return string.charAt(0).toUpperCase() + string.slice(1);
        };           
      
        function addUserToEvent()
        {
            
            $.post("enrollUser.php", {token: "<?=$token?>"}, function(data)
                {
                    document.getElementById("err").innerHTML = data;
                    if(data === "User enrolled successfully.")
                    {
                        window.location = "/event"
                    }
                });
        };

        
    </script>
    </body>
</html>


