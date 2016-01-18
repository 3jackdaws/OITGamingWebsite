<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
         <meta name="theme-color" content="#2196F3">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="The Official Oregon Tech Gaming Community Website. The place to find event times, locations, and announcements.">
                        <meta name="author" content="Ian Murphy">
                            <link rel="icon" href="/assets/media/cog128.png">
                                
                                <title>Oregon Tech Gaming Community - oitgaming.com</title>
                                
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
        .paper-blue{
            background-color: #2196F3;
            padding-top: 30px;
            padding-bottom: 30px;
            box-shadow: 0px 0px 7px 5px #AAAAAA;
            min-height: 200px;
        }
        .announcement{
            background-color: #2196F3;
            box-shadow: 0px 0px 7px 5px #AAAAAA;
            color: white;
    }
        </style>
    <!-- NAVBAR================================================== -->
    <body>
        <script>
        var games;
            function fullPick() {
                var x = document.getElementById("random");
              
                x.innerHTML = "The new Game of the Week is...";
                window.setTimeout(getRandomGame, 3000);
            }
            
            function getRandomGame() {
                var x = document.getElementById("random");
                
                var game = games[Math.floor((Math.random() * games.length))];
                //var gSplit = game.split(" ");
                var buildHREF = "http://www.google.com/search?q=" + game; 
                 x.innerHTML = game +"<br><br>" + "<h4><a href='" + buildHREF + "'target='_blank'>Google it</a";
            }

            function redo(){
                document.getElementById("random").innerHTML = "<button class='btn btn-primary btn-lg' onclick='fullPick()'>Pick Random Game</button>";
            }
       

        </script>
        
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
                                <li><a href="/">Home</a></li>
                                <li><a href="/#events">Upcoming Events</a></li>
                                <li><a href="/#gotw">Game of the Week</a></li>
                                <li class="active"><a href="#">Random Picker</a></li>
                                <li><a href="mailto:gaming@oit.edu">Contact</a></li>
                                <!--<li><a href="/go">CS:GO Tournament</a></li>-->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Other Links <span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/admin">Administration</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">G-Plus Communities</li>
                                        <li><a href="https://plus.google.com/communities/104370220559910889562/stream/2c2c3810-6337-4404-8198-375e79a48d3e?hl=en">General Discussion</a></li>
                                        <li><a href="https://plus.google.com/communities/104370220559910889562/stream/d1e48f2f-cc4f-40f7-a6e8-953b7ed7e3f7?hl=en">Counter Strike: GO</a></li>
                                        <li role="separator" class="divider"></li>
                                        <li class="dropdown-header">Other Commmunities</li>
                                        <li><a href="http://steamcommunity.com/groups/OITGC">Steam</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                </nav>
            </div>
        
    <!-- END NAVBAR -->
    
    
    <!-- BEGIN JUMBOTRON AND SIGNUP FORM -->
       
        <div class="container">
            <div class="jumbotron">
                <div class="row">
                    <div class="col-sm-3">
                        <center><img src="/assets/media/cog.png" style="width: 100%; height: 100%"><br>
                        
                        </center>
                    </div>
                
                    <div class="col-sm-9">
                        <h1><center>Random Game Picker</h1>
                        <h3><center>Below are all suggested games of the week.  <br><br>Click "Choose Game" to randomly pick a new game.</h3>

                    </div>
                    
                </div>
                </div>
        
    <!-- END JUMBOTRON AND SIGNUP FORM -->
            
            
            
        
     
        <div class="jumbotron">
            <center><h1 id="random"><button class="btn btn-primary btn-lg" onclick="fullPick()">Pick Random Game</button></h1>
        </div>
        </div>
        
        



            
        
        
        
        
                
                
                
                
        
           
            
                
                
            </div>

             <hr class="featurette-divider" >
                
                    <div class="container">
                        <h2><center>Game Pool</h2>
                        <h4><div id="games">
                    
                        </div>
                    </div>
                    
                
            </div>
            

          </div>
        
        <?php
            include("/var/www/snippets/standard_footer.php");
        ?>
  

        
        <!-- Bootstrap core JavaScript
         ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
       
      
    <script>
          
        $(document).ready(function(){
            $.get("/assets/gotw/games.txt", function(data){
                games = data.split(";");
                games.sort();
                var build = "<ul class='pager' >";
                for(var i =0; i<games.length; i++)
                {
                    build = build + "<li><a href='http://www.google.com/search?q=" + games[i] + "' target='_blank'>" + games[i] + "</a></li>"
                }
                build = build + "</ul>";
                document.getElementById("games").innerHTML = build;
            });              
        });
           
           
          
                                
    </script>
    </body>
</html>

