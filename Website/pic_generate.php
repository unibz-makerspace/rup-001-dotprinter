<?php
//DanyEle: PHP script to generate text and have it printed. Max 2 '^' as new lines symbols


$string = $_GET['text'];

if (!empty($string))
	{
		// Set font size 
		$font_size = 4; 
		// Create image width dependant on width of the string 
		$width  = imagefontwidth($font_size)*strlen($string); 
		// Create the image pallette 
		$img = imagecreate($width,40); 
		// black background 
		$bg    = imagecolorallocate($img, 255, 255, 255); 
		// black font color 
		$color = imagecolorallocate($img, 0, 0, 0); 
		// Length of the string 
		$len = strlen($string); 
		// Y-coordinate of character, X changes, Y is static 
		$ypos = 0; 		
		//Check how many "^" there are. Each of them is a new line. Max 2!
		$trattin_count = substr_count($string, '^'); 
		
		$trattin_count++;
		
		$string0 = "";
		$string1 = "";
		$string2 = "";
		
		//1 line break ^
		if ($trattin_count == 2)
		{
			$first_pos_found = strpos($string, '^');
			$string1 = substr($string, 0, $first_pos_found);
			$string2 = substr($string, $first_pos_found + 1);
		}
		else if ($trattin_count == 3)
		{
			$first_pos_found = strpos($string, '^');
			$last_pos_found = strripos($string, '^');
			$string1 = substr($string, 0, $first_pos_found);
			$string3 = substr($string, $last_pos_found + 1);
			
			$length_to_subtract = strlen($string3) + strlen($string1);
			$length_str2 = $len - $length_to_subtract - 2;
			//why? because YOLO.
			$string2 = substr($string, $first_pos_found + 1, $length_str2);

			$string = $string2;
			
			
		}
		
		// Loop through the string 
		for($i=0;$i<$len;$i++){ 
			// Position of the character horizontally 
			$xpos = $i * imagefontwidth($font_size); 
			// Draw character 
			//imagechar($img, $font_size, $xpos, $ypos, $string, $color); 
			
			//if 1 line break
			if ($trattin_count == 2)
			{
				imagechar($img, $font_size, $xpos, $ypos, $string1, $color); 
				imagechar($img, $font_size, $xpos, $ypos + 12, $string2, $color); 
				
				// Remove character from string
				$string1 = substr($string1, 1);    	
				$string2 = substr($string2, 1); 
			}
			//if no line break 
			else if($trattin_count == 1)
			{
				imagechar($img, $font_size, $xpos, $ypos, $string, $color); 
				$string = substr($string, 1);    	
			}
			//if 2 line breaks
			else if ($trattin_count == 3)
			{
				imagechar($img, $font_size, $xpos, $ypos, $string1, $color); 
				imagechar($img, $font_size, $xpos, $ypos + 12, $string2, $color); 
				imagechar($img, $font_size, $xpos, $ypos + 24, $string3, $color); 

				$string1 = substr($string1, 1);
				$string2 = substr($string2, 1);
				$string3 = substr($string3, 1);
			}
			
			   	
		} 
		
		// Return the image 
		//header("Content-Type: image/png"); 

		$rotated_image = imagerotate($img, -90, 0);

		//Save it on server
		imagepng($rotated_image, "print.png"); 
		
		//Display it
		//imagepng($rotated_image); 
		//imagepng($img); 
				
		// Remove images
		imagedestroy($img); 
		imagedestroy($rotated_image); 
		
		echo "Text has been submitted. You may now print your text.";
	
	}

	?>