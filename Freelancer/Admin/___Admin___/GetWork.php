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

if (isset($_POST['GetWork']))
{
  
 		// $today    =    date("Y/m/d"); 
 		 $Title          =    $_POST['Title'];
		 $Description    =    $_POST['Description'];
		 
		 $CodeId             =    $_POST['CodeId'];
		 
		$InData = "UPDATE `admin_getwork` SET `Title`='".$Title."',`Description`='".$Description."' WHERE CodeId='".$CodeId."'";
  		
	    $insert              =     mysql_query($InData);	
				
		if($insert) 
		{ 
					
			$_SESSION['GetWork'] = "Done"; 			
			
			?><meta http-equiv="refresh" content="0; url=./WebSettings.php"><?php 
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

