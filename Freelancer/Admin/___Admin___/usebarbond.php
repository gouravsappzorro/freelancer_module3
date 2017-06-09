<?php session_start(); ?>
<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
<?php
						     	/**================================================================================||
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
								||=================================================================================**/        ?>






<?php 

if (isset($_POST['Update']))
{
  
 		// $today    =    date("Y/m/d"); 
 		 $SImage1    =   $_FILES['SImage1']['name'];
 		 $SImage2    =   $_FILES['SImage2']['name'];
 		 $SImage3    =   $_FILES['SImage3']['name']; 
 		
		 $hSImage1   =   $_POST['hSimage1'];
 		 $hSImage2   =   $_POST['hSimage2'];
 		 $hSImage3   =   $_POST['hSimage3'];
		
 		
		$STitle1 = $_POST['title1'];
		$STitle2 = $_POST['title2'];
		$STitle3 = $_POST['title3'];
		
		$SubTitle1 = $_POST['subtitle1'];
		$SubTitle2 = $_POST['subtitle2'];
		$SubTitle3 = $_POST['subtitle3'];
		
		 
		 $CodeId    =   $_POST['CodeId'];
		 
		 if(isset($SImage1))
		 {
		 	move_uploaded_file($_FILES["SImage1"]["tmp_name"],"./ProjectsImage/".$_FILES["SImage1"]["name"]);
		 }	
		 if(isset($SImage2))
		 {
		 	move_uploaded_file($_FILES["SImage2"]["tmp_name"],"./ProjectsImage/".$_FILES["SImage2"]["name"]);
		 }	
		 if(isset($SImage3))
		 {
		 	move_uploaded_file($_FILES["SImage3"]["tmp_name"],"./ProjectsImage/".$_FILES["SImage3"]["name"]);
		 }	
		
  			
		 if($SImage1 == "")
		 {
		 		$SImage1 = $hSImage1 ;
		 }	
		 if($SImage2 == "")
		 {
		 		$SImage2 = $hSImage2 ;
		 }	
		 if($SImage3 == "")
		 {
		 		$SImage3 = $hSImage3 ;
		 }	
		$sql="UPDATE `admin_projects` SET `Title1`='".$STitle1."',`Title2`='".$STitle2."',`Title3`='".$STitle3."',`SubTitle1`='".$SubTitle1."',`SubTitle2`='".$SubTitle2."',`SubTitle3`='".$SubTitle3."',`Image1`='".$SImage1."',`Image2`='".$SImage2."',`Image3`='".$SImage3."' WHERE CodeId  =  '".$CodeId."'";
		
		$insert = mysql_query($sql);	
				
		if($insert) 
		{ 
					
			$_SESSION['usebarbond'] = "Done"; 			
			
			?> <meta http-equiv="refresh" content="0; url=./WebSettings.php" ><?php 
		}
			

}
			
?>

	<div align="center"><br /><br /><br /><br /><br />Wait Some Moment<br /><br /><img src="../MyInclude/green.gif"  ></div>
	
	
	
	
	
	
	
	
	
	<?php
						     	/**================================================================================||
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
								||=================================================================================**/        ?>

