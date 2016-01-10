<?php
if(!isset($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == ""){
    $redirect = "https://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    header("HTTP/1.1 301 Moved Permanently");
    header("Location: $redirect");
}
?>
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
                                
                                <title>Oregon Tech Gaming Community</title>
                                
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
       
        if(isset($_COOKIE["token"]))
        {
            $token = $_COOKIE["token"];
        }

        $suggest_game_text = "Suggest a Game Here";
        $gotw = fopen("./assets/gotw/topc.txt","r") or die("Oh noes! The Game of the Week has been lost!");
        $gotwarray = explode(";", fread($gotw, filesize("./assets/gotw/topc.txt")));
        fclose($gotw);

        $atext = fopen("./assets/announcements/warn.txt", "r");
        $announcement = fread($atext, filesize("./assets/announcements/warn.txt"));

        $pValue = $gotwarray[2]/$gotwarray[3]*100;
        if($pValue == 100)
        {
            $pbar_text = $gotwarray[4];
            switch(strtolower($gotwarray[5])) 
            {
            case "yellow":
                $pbar_color = "progress-bar-warning";
                break;
            
            case "green":
                $pbar_color = "progress-bar-success";
                break;
            
            default:
                $pbar_color = " ";
                break;
            }
        }
        else
        {
            $pbar_text = "\$$gotwarray[2] of \$$gotwarray[3] funded";
            $pbar_color = " ";
        } 
    ?>

    <style>

        
        

    </style>
    <!-- NAVBAR================================================== -->
    <body>
    <script>

    
    </script>
    <div id="announce" class="container-fluid paper-blue" style="color: white; font-size: 1.5em; text-align: center;">
            <?=$announcement?>
    </div>
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
                <a class="navbar-brand" href="#">OIT Gaming Community</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#events">Upcoming Events</a></li>
                    <li><a href="#gotw">Game of the Week</a></li>
                    <li><a href="/picker">GOTW Pool</a></li>
                    <li><a href="mailto:gaming@oit.edu">Contact</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li id="ddown" class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span id="c_th"> <span id="l_id">Log in</span> <span id="l_icon" class="glyphicon glyphicon-log-in"></span></span></a>
                        <ul id="perUsrInfo" class="dropdown-menu">
                            <div  style="text-align:center; width: 200px; margin: 10px 30px 10px 30px">
                                <?php
                                    include("/var/www/php/standard_login.php");
                                ?>
                            
                            <a href="/login">Register</a>
                            </div>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
        
    <!-- END NAVBAR -->
    

    <!-- BODY CONTAINER -->
    <div class="container">
    
    <!-- BEGIN JUMBOTRON AND SIGNUP FORM -->
       
    
        <div class="jumbotron">
            <div class="row">
                <div class="col-sm-3">
                    <center>
                        <img src="/assets/media/cog.png" width=200 height=200>
                        <br>
                    </center>
                </div>
                <div class="col-sm-9">
                    <center>
                        <h1>oitgaming.com</h1>
                        <h3>The official Oregon Tech Gaming Community Website.</h3>
                        <h3>What you see now is just the beginning.</h3>
                        <p style="text-align: right">
                            <button class="btn btn-lg btn-primary" data-toggle="collapse" data-target="#form">Join Now!</button>
                        </p>
                    </center>
                </div>
            </div>
            <div id="form" class="collapse container-fluid">
                <center>
                    <iframe src="https://docs.google.com/forms/d/1IIMkfK0LLW_WTKw66_eHB48FH_622vhWQCsMHFAUMow/viewform?embedded=true" style="width: 100%;" height="800" frameborder="0" marginheight="0" marginwidth="0" scrolling="no">Loading...</iframe>
                </center>
            </div>
        </div>
    <!-- END JUMBOTRON AND SIGNUP FORM -->
            
            
    <!-- THREE COLUMN -->
        
        <div class="row">
            <div class="col-lg-4">
                <center><img class="img-square" src="/assets/media/controller.png" alt="Controller" width="140" height="140">
                    <h2>Inclusive</h2>
                </center>
                <p>The Gaming Community welcomes everyone that enjoys playing video games.  Many of the founders are PC gamers, but all of us own and enjoy playing on various consoles.</p>
                    
            </div>
            <div class="col-lg-4">
                <center><img class="img-square" src="/assets/media/slug.jpg" alt="Hangout Slugs Are Great" width="140" height="140">
                    <h2>Friendly</h2>
                </center>
                <p>We started the Gaming Community because we love playing games with friends.  If you like making friends or talking with other people about games you enjoy, you will be welcome here.</p>
            </div><!-- /.col-lg-4 -->
            <div class="col-lg-4">
                <center><img class="img-square" src="/assets/media/pickaxe.jpg" alt="Diamond Pickaxe" width="140" height="140">
                    <h2>Active</h2>
                </center>
                <p>Acting within and outside the community, the Gaming Community seeks to enrich the lives of all those who cross paths with it.</p>
            </div>
        </div>
<!--END BODY CONTAINER -->
    </div>
            
        <!-- END THREE COLUMN -->
        
        <br><br>
     
        <!-- CALENDAR -->
    <div id="events" class="container-fluid paper-blue">
        <div id="caldiv" class="container">
            <div class="alert alert-info fade in">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Hey, listen!</strong> This calendar is constantly updated. Look here first for event and club information!
            </div>
            <div id="cal">
            </div>         
        </div>
    </div>
        <!-- /CALENDAR -->


            
            
        
        
        <!-- GAME OF THE WEEK -->
        
    <div class="container">
        <br>
        <br>
        <div id="gotw" class="jumbotron ">
            <h1><center>Game of the Week</h1>
            <h3>Every week, a new game is randomly selected from member suggestions.  Members play the game during the week and, come the Friday meeting, discuss their favorite aspects of it.</h3>
            <br>
            <center>
                <form onkeypress="return event.keyCode != 13;" id="gs_form" class="form-inline pull-center" role="form"  >
                    <div class="form-group ">
                        <input type="text" class="form-control" id="gs" placeholder="Enter suggestion here">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default" type="button" onclick="check()" >Submit Suggestion</button>
                    </div>
                    <br><br>
                    <div id="gs_output" style="color: #2196F3; font-size: 1.5em"></div>
                </form>
            </center>  
        </div>
        <br>     
              
        <!-- IMAGE AND DESC -->  
        <div class="row-featurette">
            <div class="col-lg-3">
                <img class="img-rounded" src="/assets/gotw/gotwimg.jpg" style="width:100%; height:100%;">
                <br/>
            </div>
            <div id="gotwc" class="col-lg-9">
                <h3 id="gotw-header">
                    <?=$gotwarray[0]?>
                </h3>
                <p id='gotw-body'><?=$gotwarray[1]?></p>
                <div class='progress'>
                    <div id='progress-bar-gotw' class='progress-bar progress-bar-striped <?=$pbar_color?> active' role='progressbar' aria-valuenow='50' aria-valuemin='0' aria-valuemax='<?=$gotwarray[3]?>' style='width:<?=$pValue?>%'>
                       <?=$pbar_text?> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END THIRD PART CONTAINER -->
    <br>
    <hr class="featurette-divider">
    <br>
    <h1><center>Steam Group Members</center></h1>
    <div class="container-fluid steamMemberBar" id="memberlist">
        <center>Populating...</center>
    
    </div>
    <div class="container">
        <div class="row-featurette" style="">
        <br>
            <div class="col-lg-6">
                <h4>
                    <center>
                        <span id="name">Tap or click icons for user names</span>
                    </center>
                </h4>
            </div>
            <div class="col-lg-6">
                <h4>
                    <center>
                        <a href="https://steamcommunity.com/groups/OITGC" target="_blank">Join our Steam group</a>
                    </center>
                </h4>
            </div>
                        
        </div> 
    </div>

    <hr class="featurette-divider" >
    <footer style="margin: 10px 10px 10px 10px;">
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
        $(document).ready(function()
        {
            $.post("/assets/php/members.php", {swag: "hi"}, function(data)
                {
                    document.getElementById("memberlist").innerHTML = data;
                });
            
            
                            
   
            if( $(window).width()> 1000)
            {
                $("#cal").load("/assets/cal/desktop.txt");
            }
            else
            {
                $("#cal").load("/assets/cal/mobile.txt");
            }
            getUser();     
        }); 

        function getUser()
        {
            $.post("/login/getuser.php", {token: "<?=$token?>"}, function(data)
                {
                    if(data.length > 5)
                    {
                        var fname = data.split(".");
                        document.getElementById("l_id").innerHTML = "Welcome, " + capitalizeFirstLetter(fname[0]);
                        document.getElementById("perUsrInfo").innerHTML = "<li><a href='/event'>Event Standings</a></li><li><a onclick='logout()' href='#'>Logout</a></li>";
                        document.getElementById("l_icon").setAttribute("class", "glyphicon glyphicon-menu-down");
                    }
                });
        };
          
        function capitalizeFirstLetter(string) 
        {
            return string.charAt(0).toUpperCase() + string.slice(1);
        };           

        function memberSelect(e, url)
        {
            var old = document.getElementById("mActive");
            if(old)
            {
                old.setAttribute("style", "border: 2px solid grey;");
                old.setAttribute("id", "");
            }
            e.setAttribute("style", "border: 4px solid #2196F3;");
            e.setAttribute("id", "mActive");

            var name = e.getAttribute("title");
            document.getElementById("name").innerHTML = "<a target='_blank' href='" + url + "'>" + name + "</a>"

        }; 

        function logout(){
            setCookie("token", "null", 0);
            window.location = "/";
        }    

        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays*24*60*60*1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + "; " + expires + ";" +"path=/";
        };     

        function logFormSubmit(){
            var e = document.getElementById("email2");
            var err = document.getElementById("loginOutput");
            err.innerHTML = "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'></span>" ;
            var pw = document.getElementById("password2");

            $.post("/login/login.php", {email: e.value, password: pw.value}, function(data){
                
                if(data !== "failure")
                {

                    err.innerHTML = "Login successful";
                    setCookie("token", data, 7);
                    window.location = "/";
                }
                else
                {
                    err.innerHTML = "Invalid User/Pass";
                }
                
                
            });
        }; 

        function check() 
        {
            var val = document.getElementById("gs");
            var str = val.value;
            document.getElementById("gs_output").innerHTML = "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'></span>"       
            if(str.length > 0 )
            {
                $.post("/assets/gotw/suggest.php",{game: str}, function(data){
                    document.getElementById("gs_output").innerHTML = data;
                    val.value = "";
                });     
            } 
            else{
                document.getElementById("gs_output").innerHTML = "";
            }   
        };
    </script>
    </body>
</html>


