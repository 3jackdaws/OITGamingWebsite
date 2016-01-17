<!DOCTYPE html>
<html lang="en">
    <head >
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
                                    
                                    
           <style>
           		
           </style>                         
    </head>
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
                            <a class="navbar-brand" href="#">OIT Gaming Community</a>
                        </div>
                        <div id="navbar" class="navbar-collapse collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="/">Home</a></li>
                                <li><a href="/#events">Upcoming Events</a></li>
                                <li><a href="/#gotw">Game of the Week</a></li>
                                <li><a href="/picker">GOTW Pool</a></li>
                                <li><a href="mailto:gaming@oit.edu">Contact</a></li>
                                <!--<li><a href="/go">CS:GO Tournament</a></li>-->
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                <li class="dropdown">
                                    
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
                <div class="col-lg-6" style="border-right: 1px solid #CCC">
                    <?php
                        include("/var/www/php/standard_login.php");
                    ?>
                </div>
                <div class="col-lg-6">
                    <h2><center>Sign up</h2>
                    <form id="signup">
                    <center>
                        <input class="form-control frm-sm" type="email" id="email" name="email" placeholder="OIT Email">
                        <br>
                        <input class="form-control frm-sm" type="password" id="password" name="password" placeholder="Password">
                        <br>
                        <input class="form-control frm-sm" type="password" id="pc" name="pc" placeholder="Confirm Password">
                        <br>
                        <button class="btn btn-default" type="button" onclick="regFormSubmit()">Submit</button>
                            <div id="err"style="color:red"></div>
                        <div id="err" style="color:red"></div>
                    </form>
                   
                </div>
            </div>

    <!-- END JUMBOTRON AND SIGNUP FORM -->



    	
<script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.min.js"></script>
    	<script>

        <?php
        if(isset($_GET["url"]))
        {
            $_GET["url"] = $url;
            echo "var url = '$url'";
        }
        else
        {
            echo "var url = '/'";
        }
            
        ?>

        function logFormSubmit(){
            var e = document.getElementById("email2");
            var err = document.getElementById("loginOutput");
            err.innerHTML = "<span class='glyphicon glyphicon-refresh glyphicon-refresh-animate'></span>" ;
            var pw = document.getElementById("password2");

            $.post("./login.php", {email: e.value, password: pw.value}, function(data){
                
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
    	
    	function regFormSubmit(){
    		var form = document.getElementById("signup");
    		var e = document.getElementById("email");
    		var err = document.getElementById("err");
    		var pw = document.getElementById("password");
    		var pc = document.getElementById("pc");
            err.innerHTML = "";
    		var name = (e.value).split("@");
           
    		if(name[0].indexOf(".") !== -1 && name[1].search("oit.edu") !== -1)
    		{
            
    			if(pw.value === pc.value)
    			{
                    
                    $.post("./adduser.php", {email: e.value, password: pw.value}, function(data)
                        {     
                            err.innerHTML = data;
                            $.post("./login.php", {email: e.value, password: pw.value}, function(data)
                            {
                                if(data !== "failure")
                                {

                                    //err.innerHTML = "Login successful";
                                    setCookie("token", data, 7);
                                    window.location = "/";
                                }
                                else
                                {
                                    err.innerHTML = "Problem loggin in";
                                }
                        
                        
                            });
                        }

                    );
                    
    			}
    			else
    			{
    				err.innerHTML = "Passwords do not match.";
    				
    			}
    		}
    		else
    		{
    			err.innerHTML = "Email is not an OIT email";
    		}
    	
    		
    	
    	};

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + ";" +"path=/";
};
    	</script>