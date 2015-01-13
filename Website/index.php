<head>
  <title>Team Banglaitalia - Dot Printer</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="fonts/fonts.css" type="text/css"/>
  
  
  <link rel="stylesheet" href="fonts/fonts.css" type="text/css" />
    
  

  <link rel="icon" type="image/png" href="/favicon.png" />
  <link rel="apple-touch-icon" href="apple-touch-icon.png" >
  <link rel="icon" sizes="144x144" href="apple-touch-icon.png">

</head>

<body>
   <center>
   

  <div class="content">

  	<img  width="200px" height="153px" src="./img/dot_printer_700px.png" />
	
    <h1 >Print it out!</h1>
	

    <div class="intro">
      <!--<p class="intro-big">
        An informal introduction to designing and building websites.
      </p> !-->
      <p>
       The Dot Matrix Printer is a home-made printer created by 4 students of the Faculty of Computer Science of the Free University of Bolzano out of scrap material. 
		It is meant to be the proof of concept that lies behind the entire <a href="www.facebook.com"><span>Making Stories Project</span></a>, being carried out by the Open City Museum: 
      </p>
    </div>
   
    <time class="lesson-info" datetime="2015-01-09 20:00">
     How to make use of useless things.<br>
    </time>

    <h2 class="lesson-title">Status :<span class="glyphicon glyphicon-print" aria-hidden="true"></span> <span id="print-status" style="color:green" > Available</span> </h2>
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
	Please choose a file:  </br> <input type="file" name="file" accept="image/png">   <br/>
	<input class="btn btn-large btn-primary" type="submit" name="submit" value="Upload Picture"/>
	</form>
	   
	   <?php
	   
	   } //chiusura else 
	   
	   ?>
	   
		 </br>
		 
     <div id="print-button" class="btn btn-large btn-success"><span class="glyphicon glyphicon-play" aria-hidden="true"></span><b>  Print now</b>!</div>
  
  
  
  <!--  <time class="lesson-info" datetime="">
      Date and time TBD
    </time>
	!-->

     <!--<p class="coming-soon">
      More coming soon...
    </p>  
   !-->
	
	

    <footer class="footer">
	Powered by: HTML, Bootstrap, Java, CSS, PHP, SQL, Bash Scripting, JS and a lot of swearing. <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  </br>
	Made by: Brocanelli Stefan, <a href="https://www.linkedin.com/profile/view?id=305437338"><span>Gadler Daniele</span></a>, Salam Saifur, Shantunu Shaharear 

    </footer>
	<a target="_blank" href="https://www.youtube.com/watch?v=_O75ws_KBdw"> <img title="Disassembling Time"src="./img/youtube_icon.png"/></a>
		   <!-- <a target="_blank" href="http://www.unibz.it/it/inf/welcome/default.html"><img width="50" height= "50" class="left-bar-logo" src="./img/unibz_orange_logo.jpg"/></a> !-->

	 <a target="_blank" href="https://www.facebook.com/inf.unibz.it"> <img title="Faculty of Computer Science Official Facebook Page" src="./img/facebook_icon.png"/></a>
          
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