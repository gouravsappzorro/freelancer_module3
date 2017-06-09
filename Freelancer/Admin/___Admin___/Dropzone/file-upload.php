

		<?php	/**================================================================================||
				||      *Developer : Green Cubes Solutions										   ||
				||      *Website   : www.greencubes.co.in										   ||
				||      *Date      : 25-11-2014													   ||
				||																				   ||
				||      *  NOTICE OF LICENSE  *													   ||
				|| 																				   ||
				|| 																				   ||
				||		   This source file is subject to the Company Copyright 				   ||
				||		   and its use by any other party without concern of Greencubes        	   ||
				||  	   or trying to sell this code will be considered illegal 				   ||
				||		   and any legal actions can be undertaken.								   ||
				||		   If you want to receive a copy of the license, please send an email      ||
				||  	   to info@greencubes.co.in, for further procedure						   ||
				||=================================================================================**/?>








<?php
   include "./resize_class.php";
 
$upload_dir = '../images';  

if (!empty($_FILES)) {
     
    $tempFile = $_FILES['file']['tmp_name'];                    
      // using DIRECTORY_SEPARATOR constant is a good practice, it makes your code portable.
    $targetPath = dirname( __FILE__ ) . DIRECTORY_SEPARATOR . $upload_dir . DIRECTORY_SEPARATOR;  
     // Adding timestamp with image's name so that files with same name can be uploaded easily.
	 $imagename =  $_FILES['file']['name'];
    $mainFile =  $targetPath.$imagename;  
	
	

    move_uploaded_file($tempFile,$mainFile); 
	
	 $resizeObj = new resize('./images/'.$imagename.'');
			
					// *** 2) Resize image (options: exact, portrait, landscape, auto, crop)
			
					$resizeObj -> resizeImage(255,150, 'auto');
			
					// *** 3) Save image
			
					$resizeObj -> saveImage('./images/sml_'.$imagename.'', 100);
					
     
}
?> 




		<?php	/**================================================================================||
				||      *Developer : Green Cubes Solutions										   ||
				||      *Website   : www.greencubes.co.in										   ||
				||      *Date      : 25-11-2014													   ||
				||																				   ||
				||      *  NOTICE OF LICENSE  *													   ||
				|| 																				   ||
				|| 																				   ||
				||		   This source file is subject to the Company Copyright 				   ||
				||		   and its use by any other party without concern of Greencubes        	   ||
				||  	   or trying to sell this code will be considered illegal 				   ||
				||		   and any legal actions can be undertaken.								   ||
				||		   If you want to receive a copy of the license, please send an email      ||
				||  	   to info@greencubes.co.in, for further procedure						   ||
				||=================================================================================**/?>

