<!DOCTYPE html>


<html lang="en">
    <head>
     <meta name="theme-color" content="#FFFF00">
        <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta name="description" content="The Official Oregon Tech Gaming Community Website. The place to find event times, locations, and announcements.">
                        <meta name="author" content="Ian Murphy">
                            <link rel="icon" href="/assets/media/cog128.png">
                                
                                <title>Labs - oitgaming.com</title>
                                
                                <!-- Bootstrap core CSS -->
                                <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
                                
                                    
                                    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
                                    <!--[if lt IE 9]>
                                     <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
                                     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
                                     <![endif]-->
                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>                  
    <script>
    	$(document).ready(function()
    	{
    		 $.post("./members.php", {swag: "hi"}, function(data){
    			document.getElementById("memberlist").innerHTML = data;
    		})
    		
    		
    		
		});

		function memberSelect(e, url){
			
			var old = document.getElementById("mActive");
			if(old)
			{
				old.setAttribute("style", "border: 2px solid grey;");
				old.setAttribute("id", "");
			}
			e.setAttribute("style", "border: 4px solid limegreen;");
			e.setAttribute("id", "mActive");
			var name = e.getAttribute("title");
			document.getElementById("name").innerHTML = "<h1><center><a target='_blank' href='" + url + "'>" + name + "</a>"

		};

    	
    </script>                                
                                    
    </head>
    <!--  PHP ================== -->
   
    
    
    
    
    
    
    
    
    <style>
        .paper-blue{
            background-color: #2196F3;
            padding-top: 30px;
            padding-bottom: 30px;
            box-shadow: 0px 0px 7px 5px #AAAAAA;
        }
        .announcement{
            background-color: #2196F3;
            box-shadow: 0px 0px 7px 5px #AAAAAA;
            color: white;
            }

        .memberIcon{
        	border: 2px solid grey;
        	height: 100%;
        	width: 100%;
        }

        .memberIcnDiv{
        	float: left; 
        	margin: 10px 10px 10px 10px;
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
                            <a class="navbar-brand" href="#">Labs</a>
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
                                	<a href="/admin" onclick="setCookie('token', ' ', 0)"><span class="glyphicon glyphicon-log-out"></span> Log out</a>
                                	
                                    	
                                </li>
                                
                                            
                                   
                               
                            </ul>
                        </div>
                </nav>
            
        
    <!-- END NAVBAR -->
    

    <div class="jumbotron" style="overflow: scroll">
        <div class="" id="memberlist" style="height: 80px; width: 2000px;  white-space: nowrap">
        	Please wait while the list populates.
        </div>
        
    </div>
<div id="name">
        </div>
    </div>

</body>













