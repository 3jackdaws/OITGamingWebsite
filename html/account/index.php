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
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
                                
                                    
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

        
    ?>

    <style>
        .paper-blue{
            background-color: #2196F3;
            padding-top: 30px;
            padding-bottom: 30px;
            box-shadow: 0px 0px 7px 5px #AAAAAA;
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
                <a class="navbar-brand" href="#">My Account</a>
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
                    <li id="ddown" class="dropdown">
                        <a id="ddown" href="/login" ><span id="c_th"> <span id="l_id">Log in</span> <span class="glyphicon glyphicon-log-in"></span></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
        
    <!-- END NAVBAR -->
    

    <!-- BODY CONTAINER -->
    <div class="container">
    
    <!-- BEGIN JUMBOTRON AND SIGNUP FORM -->
       
    
        <div id="fill" class="jumbotron">
            
            
        </div>
    <!-- END JUMBOTRON AND SIGNUP FORM -->
            
            
    

    <hr class="featurette-divider" >
    <footer style="margin: 10px 10px 10px 10px;">
        <p class="pull-right" >
            <a href="/admin">Administration</a> &nbsp; &middot; &nbsp;
            <a href="/assets/OITGCConstitution.pdf">View OITGC Constitution</a> &nbsp; &middot; &nbsp;
            <a href="#">Back to top</a>
        </p>
        <p>
            &copy; 2015 Oregon Tech Gaming Community <img src=""/>
        </p>
    </footer>
        
        

        
        <!-- Bootstrap core JavaScript
         ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function()
        {
            $.post("getAccountInfo.php", {token: "<?=$token?>"}, function(data)
                {
                    document.getElementById("fill").innerHTML = data;
                })  
        }); 

        function capitalizeFirstLetter(string) 
        {
            return string.charAt(0).toUpperCase() + string.slice(1);
        };           
      
    </script>
    </body>
</html>


