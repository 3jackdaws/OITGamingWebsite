<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="theme-color" content="#2196F3">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <meta name="keywords" content="oregon tech gaming community">
                    <meta name="description" content="The Official Oregon Tech Gaming Community Website. The place to find event times, locations, and announcements.">
                        <meta name="author" content="Ian Murphy">
                            <link rel="icon" href="/assets/media/cog128.png">
                                
                                <title>My Account</title>
                                
                                <!-- Bootstrap core CSS -->
                                <link href="/assets/stylesheets/bootstrap.min.css" rel="stylesheet">
                                
                                    
                                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                                    <!--[if lt IE 9]>
                                     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                     <![endif]-->
                                    
                                    
                                    
    </head>
    <!--  PHP ================== -->
    <?php
        include_once("/var/www/php/sql_connect.php");

        $leaders = getTop3();

        $log = getGameLog();

        
    ?>

    <style>
        
    .leader{
        width:300px;
        height: 120px;
        background-color: #FCFCFC;
        border: 1px solid lightgrey;
        border-radius: 3px;
        margin-top: 5%;
        margin-bottom: 5%;
        margin-right: auto;
        margin-left: auto;
        box-shadow: 0px 2px 7px 2px lightgrey;
        
    }
        
    .l-image{
        margin: auto;
        display: flex;
        align-items: center;
        height: 120px;
        width: 120px;
        float: left;
        text-align: center;
    }

    .logbox{
        
        /*display: flex;
        align-items: center;*/
        /*text-align: center;*/
        width: 90%;
        max-width: 700px;
        background-color: #FCFCFC;
        border: 1px solid lightgrey;
        border-radius: 3px;
        margin-top: 5px;
        margin-bottom: 5px;
        margin-right: auto;
        margin-left: auto;
        box-shadow: 0px 2px 7px 2px lightgrey;
    }

    .lb-image{
        width: 230px;
        display: inline-block;
        
        margin: auto;
        margin-top: 2%;
        margin-bottom: 2%;
        
    }

    .log-mid{
        
    }

    .image-div{
        width: 33%;
        
        
    }
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
                        <a href="../" >Back to My Account</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
        
    <!-- END NAVBAR -->
    

    <!-- BODY CONTAINER -->
    <div id="fill" class="container">
        <div class="row">
            <center>
                <h1>Top Players</h1>
            </center>
            <div class="col-lg-4">
                <div class="leader" title="<?=$leaders[0]["firstName"]?>">
                    <div class="img-circle" style="max-height: 80vw; margin: 10px; height: 100px; width: 100px; float: left;overflow: hidden; background: url('<?=$leaders[0]["pictureDir"]?>') no-repeat; background-size: cover; background-position: center center"></div>
                    
                    <div class="l-image" style="width: 150px">  
                        <div style="display:inline-box; width: 100%">
                            <h2 style="width: 100%; margin: 0"><?=$leaders[0]["points"]?></h2>
                            <h5 style="width: 100%; margin: 0">Points</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="leader" title="<?=$leaders[1]["firstName"]?>">
                    <div class="img-circle" style="max-height: 80vw; margin: 10px; height: 100px; width: 100px; float: left;overflow: hidden; background: url('<?=$leaders[1]["pictureDir"]?>') no-repeat; background-size: cover; background-position: center center"></div>
                    <div class="l-image" style="width: 150px">  
                        <div style="display:inline-box; width: 100%">
                            <h2 style="width: 100%; margin: 0"><?=$leaders[1]["points"]?></h2>
                            <h5 style="width: 100%; margin: 0">Points</h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="leader" title="<?=$leaders[2]["firstName"]?>">
                    <div class="img-circle" style="max-height: 80vw; margin: 10px; height: 100px; width: 100px; float: left;overflow: hidden; background: url('<?=$leaders[2]["pictureDir"]?>') no-repeat; background-size: cover; background-position: center center"></div>
                    <div class="l-image" style="width: 150px">  
                        <div style="display:inline-box; width: 100%">
                            <h2 style="width: 100%; margin: 0"><?=$leaders[2]["points"]?></h2>
                            <h5 style="width: 100%; margin: 0">Points</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr class="featurette-divider"/>
    <br><br>
    <?php
        date_default_timezone_set('America/Los_Angeles');
        foreach ($log as $row) {

            $hunter = getQuarryStats($row["HID"]);
            $quarry = getQuarryStats($row["Redeemed"]);
            $time = $row["time"];
        
            $time = strtotime($time);
            $time -= 3*60*60;
            $time = "On " . date("D, M j, h:i a", $time);
           
            ?>


            <div class="logbox">
                <div class="row">
                    <div class="col-lg-6">
                    <center>
                        <div class="lb-image">

                            <div class="img-circle" style="max-height: 80vw; margin: 5px; height: 70px; width: 70px; float: left;overflow: hidden; background: url('<?=$hunter[4]?>') no-repeat; background-size: cover; background-position: center center"></div>
                        
                            <div class="glyphicon glyphicon-arrow-right" style="font-size: 1.5em; color: #AC2729; margin-top: 30px;"></div>
                        
                            <div class="img-circle" style="max-height: 80vw; margin: 5px;height: 70px; width: 70px; float: right;overflow: hidden; background: url('<?=$quarry[4]?>') no-repeat; background-size: cover; background-position: center center"></div>
                        </div>
                    </center>
                    </div>
                    <div class="col-lg-6" style="margin-top: auto; margin-bottom: auto;">
                        
                            <center><h2 ><?=$hunter[2]?> redeemed a contract on <?=$quarry[2]?></h3></center>
                      
                    </div>
                </div>
               
                
            </div>
            <center><h6 style="color: #BBB; margin: 0;"><?=$time?></h6></center>
            <br>



            <?php
        }
    ?>
    <hr class="featurette-divider" >
    <footer id="footer" style="margin: 10px 10px 10px 10px;">
    <?php
        include("/var/www/snippets/standard_footer.php");
    ?>
    </footer>
        
        

        
        <!-- Bootstrap core JavaScript
         ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    <script>
        $('#bFlip').click(function(){
            $("#quarry").toggleClass('flipped');

        });

        $('#newQuarry').click(function(){
            if(confirm("You are about to request a new quarry.  Click OK to continue."))
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
                        document.getElementById("err").innerHTML = "You must wait " + data + " more hours before requesting a new quarry";
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


