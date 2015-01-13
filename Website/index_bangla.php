 <head>
    <meta charset="utf-8">
    <title>Team BanglaItalia - Online Dot Printer</title>
    <meta name="author" content="Daniele Gadler">
    <meta http-equiv="Content-Language" content="en">
	
	<link href="./css/bootstrap.css" rel="stylesheet">
	<link href="./css/bootstrap.min.css" rel="stylesheet">
	
	<link href="./css/style_bangla.css" rel="stylesheet">
    
    <link href='http://fonts.googleapis.com/css?family=Slabo+27px' rel='stylesheet' type='text/css'>


</head>
<body>

<!-- let's get working !-->

	<!--top navbar begin !-->
   <!-- <nav class="navbar navbar-default navbar-static-top" role="navigation">
      <div class="container">
      
  <a target="_blank" href="http://www.unibz.it/it/inf/welcome/default.html"><img width="50" height= "50" class="left-bar-logo" src="./img/unibz_orange_logo.jpg"/></a> !
      
       <center><h2 class="main-title"><b>Dot Printer</b></h2></center>
      </div>
    </nav>
	<!--top navbar end!-->

	<center>
	
	
   <!-- <img src="./img/banglaitalia_logo.png"/> logo removed because Naomi didn't like it :(!-->
	
    
    <!--central body with data begin !-->
    <div class="panel panel-default body-panel-text">
    	<div class="panel-heading">
   			<h3 class="panel-title font"><b>Making Stories Project</b></h3>
 	    </div>
  		<div>
        <p>
   		The Dot Printer is a home-made printer created by 4 students of the Faculty of Computer Science of the Free University of Bolzano out of  scrap material. </br> It is meant to be the proof of concept that lies behind the entire <a href="http://opencitymuseum.com/2014/10/29/making-stories-nutzlose-gegenstaende-in-sinnvolle-objekte-transformieren/"><span style ="font-style:italic">Making Stories Project</span></a>, being carried out by the Open City Museum: 
        </br>
        </br>
       <a> <b>How to make use of useless things.</b></a> </p>
       
       
      <h3> <b> Status: </b><span class="glyphicon glyphicon-print" aria-hidden="true"></span> <span id="print-status" style="color:green" > Available</span> </h3>

       </br>
       


	<?php
	error_reporting(E_ALL);

	if(isset($_POST['submit'])){
	/*
	echo "submit set";
	print "Received " .$_FILES['userfile']['name'] . " size = ". $_FILES['userfile']['size'];
	echo "<br>";
	*/
		if($_FILES["file"]["error"] > 0)
		{
			echo "Error: " . $_FILES["file"]["error"] . "<br>";
		}
		else
		{		
		   if  (move_uploaded_file($_FILES["file"]["tmp_name"], "print.png")) {
		   echo "The file has been successfully uploaded. You may now print your picture.";
		}
			
		}
	}else{
	?>
	 <p>Please select a picture with maximum width 40px and maximum height 200px</p>

	   
	   <form enctype="multipart/form-data" action="index.php" method="POST">
	  <input type="file" name="file" accept="image/png">   <br/>
	<input class="btn btn-large btn-primary" type="submit" name="submit"/>
	</form>
	   
	   <?php
	   
	   } //chiusura else 
	   
	   ?>
	   
		 </br>
		 
		 
		 
     <div id="print-button" class="btn btn-large btn-success"><span class="glyphicon glyphicon-play" aria-hidden="true"></span><b>  Print now</b>!</div>
       
	   
    
       </br>
       </br>
       </br>
	   
       
       <!--central body with data end!-->
	   	 </div>   
         
         
         <!--footer begin  !-->
          <div class="panel-footer">Powered by: HTML, Java, CSS, PHP, SQL, Bash Scripting, JS and a lot of swearing. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span> 
          </br>
          </br>
         <a target="_blank" href="https://www.youtube.com/watch?v=_O75ws_KBdw"> <img title="Disassembling Time"src="./img/youtube_icon.png"/></a>
		   <!-- <a target="_blank" href="http://www.unibz.it/it/inf/welcome/default.html"><img width="50" height= "50" class="left-bar-logo" src="./img/unibz_orange_logo.jpg"/></a> !-->

         <a class="footer-circle" target="_blank" href="http://www.unibz.it/it/inf/welcome/default.html"> <img width="50" height= "50" title="Faculty of Computer Science Website" src="./img/unibz_orange_logo.png" /></a>
          <a target="_blank" href="https://www.facebook.com/inf.unibz.it"> <img title="Faculty of Computer Science Official Facebook Page"src="./img/facebook_icon.png"/></a>
          
          </div> 
          
        <!--footer end !-->

 	</div>
 
    <!--central panel with data end !-->
	
	
	</center>

	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) Always to be put at the end for better loading time! -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
	
	<script> 
	
	jQuery(document).ready(function () {
		getState();
		setTimeout(getState , 100 ); //10.000
		
	});
	
	function getState() {
		$.get( "test.php", function( data ) {
			if (data === "0") {
				setAvailableState();
			} else {
				setPrintingState();
			}
			setTimeout(getState , 1000);
		});
	}
	
	function setPrintingState() {
			$("#print-status").text("Now printing...");
	}
	
	function setAvailableState() {
			$("#print-status").text("Available");
	}
	
	$("#print-button").click(function () {
	
		$.get( "print.php", function( data ) {
			setPrintingState();
		});	
		 

	});

	
	
	</script>
	
</body>
