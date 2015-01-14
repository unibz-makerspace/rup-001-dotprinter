<head>
  <title>Team Banglaitalia - Dot Printer</title>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <link rel="stylesheet" href="fonts/fonts.css" type="text/css"/>
  
  
  <link rel="stylesheet" href="fonts/fonts.css" type="text/css" />
  
	<!-- bxSlider CSS file -->
	<link href="/css/jquery.bxslider.css" rel="stylesheet" />
    
  

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

    <h2 class="lesson-title">Status :<span class="glyphicon glyphicon-print" aria-hidden="true"></span> <span id="print-status" style="color:green;" > Available</span> </h2>
	<p style="color:red;  font-weight: bold;"> <!-- error. !-->
	<?php
	error_reporting(E_ALL);

	if(isset($_POST['submit']))
	//image successfully uploaded 
	{
	/*echo "submit set";
	print "Received " .$_FILES['userfile']['name'] . " size = ". $_FILES['userfile']['size'];
	echo "<br>";
		echo "Error: " . $_FILES["file"]["error"] . "<br>";
		*/
		$image_info = getimagesize($_FILES["file"]["tmp_name"]);
		$width = $image_info[0];
				
	
	    //if no file selected
		if($_FILES["file"]["error"] > 0)
		{
			echo "No picture selected. Please retry.";
			//still include the upload button
		?>
		</p>
			<p>Please select a picture with maximum width 40px and maximum height 200px</p>
			
			<form  stlye="color:green" enctype="multipart/form-data" action="index.php" method="POST">
			 	Please choose a file: </br> <input type="file" name="file" accept="image/png">   <br/>
			<input class="btn btn-large btn-primary" type="submit" name="submit" value="Upload Picture"/>
			</form> 
		<p style="color:red;  font-weight: bold;">
			<?php
			}
			
			//if image is too big
			else if ($width > 40)
			{
				echo "Image's width is greater than 40px. Please retry.";
				
				
			?>
		</p>
			<p>Please select a picture with maximum width 40px and maximum height 200px</p>
			<form enctype="multipart/form-data" action="index.php" method="POST">
				  </br> <input type="file" name="file" accept="image/png">   <br/>
			<input class="btn btn-large btn-primary" type="submit" name="submit" value="Upload Picture"/>
			</form>
		<p style="color:green"> <!-- Success! !-->
			<?php
				}
				//if no errors
				else
				{		
				   if  (move_uploaded_file($_FILES["file"]["tmp_name"], "print.png")) 
					  {
						echo "The file has been successfully uploaded. You may now print your picture.";
					  }
					
				}
			}
			
			//picture has not been uploaded yet
			else
			{
			?>
			</p>
			 <p>Please select a picture with maximum width 40px and maximum height 200px</p>


			   
			<form enctype="multipart/form-data" action="index.php" method="POST">
				Please choose a file:  </br> <input type="file" name="file" accept="image/png">   <br/>
				<input class="btn btn-large btn-primary" type="submit" name="submit" value="Upload Picture"/>
			</form>
	   
	   <?php
	   
	   } 
	   
	   ?>
	   
		 </br>
		 
     <div id="picture-button" class="btn btn-large btn-success"><span class="glyphicon glyphicon-picture" aria-hidden="true"></span><b>  Print Picture</b>!</div>
	 
	 
	 <p>Or enter the text you'd like to have printed...</p>
	 <form action="action_page.php">
		<input type="text" name="firstname" value="30 cum Laude.">
		</br>	
		<input id="text-button" class="btn btn-large btn-success" type="submit" name="submit" value="Print Text"/>
	</form>
  
  
  </br>
  </br>
	
	
	<ul class="bxslider">
	  <li><img src="/img/slideshow_1.png" /></li>
	  <li><img src="/img/slideshow_2.png" /></li>
	  <li><img src="/img/slideshow_3.png" /></li>
	  <li><img src="/img/slideshow_4.png" /></li>
	</ul>

    <footer class="footer">
	Powered by: HTML, Bootstrap, Java, CSS, PHP, SQL, Bash Scripting, JS, JQuery and a lot of swearing.  <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>  </br>
	Made by: Brocanelli Stefan, <a href="https://www.linkedin.com/profile/view?id=305437338"><span>Gadler Daniele</span></a>, Salam Saifur, Shantunu Shaharear 

    </footer>
	<a target="_blank" href="https://www.youtube.com/watch?v=_O75ws_KBdw"> <img title="Disassembling Time"src="./img/youtube_icon.png"/></a>
		   <!-- <a target="_blank" href="http://www.unibz.it/it/inf/welcome/default.html"><img width="50" height= "50" class="left-bar-logo" src="./img/unibz_orange_logo.jpg"/></a> !-->

	 
	<a target="_blank" href="https://www.facebook.com/inf.unibz.it"> <img title="Faculty of Computer Science Official Facebook Page" src="./img/facebook_icon.png"/></a>
	
	
	<a target="_blank" href="https://www.github.com/DanyEle/matrix_printer"> <img title="Github Open Source Code of our Project" src="./img/github_icon.png"/></a>
	
	<div id="contact_l"><span>CONTACT US</span></div>	
          
	</center>
	
	<div id="contact">
		<form>
			<h6>Fill all the gaps</h6>
			<label for="email">Email:</label><br>
			<input type="email" id="email" name="email" required><br>
			<label for="object">Object</label><br>
			<input type="text" id="object" name="object" required><br><br>
			<textarea required></textarea>
			<input type="submit" name="submit" value="submit" id="submit">
			<div id="close"></div>
		</form>
	</div>
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) Always to be put at the end for better loading time! -->
  <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script> !-->
    
	<script src="/js/jquery.min.js"></script>
	
	<!-- bxSlider Javascript file -->
	<script src="/js/jquery.bxslider.min.js"></script>
	
	<script src="/js/script_home.js"></script>


	<script> 
	
	jQuery(document).ready(function () {
		getState();
		setTimeout(getState , 100 ); //10.000
		
		 $('.bxslider').bxSlider();
		
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
	
	
	$("#picture-button").click(function () {
		$.get( "print.php", function( data ) {
			setPrintingState();
		});	
		
		
				 

	});
	
	
	
	
	</script>
	

</body>