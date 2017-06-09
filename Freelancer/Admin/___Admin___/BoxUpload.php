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
if (isset($_POST['BoxUpdate']))
{
  
		
		 $Title1    		 =   $_POST['Title1']; 
		 $Title2             =   $_POST['Title2'];
		 $Title3             =   $_POST['Title3'];
		 $Title4             =   $_POST['Title4'];
		 
		 $SubTitle1             =   $_POST['SubTitle1'];
		 $SubTitle2             =   $_POST['SubTitle2'];
		 $SubTitle3             =   $_POST['SubTitle3'];
		 $SubTitle4             =   $_POST['SubTitle4'];
		
		 $CodeId             =   $_POST['CodeId'];
	
	
		$sql = "UPDATE  admin_box_image SET
									
										Title1               =   '".$Title1."',
										Title2               =   '".$Title2."',
										Title3               =   '".$Title3."',
										Title4               =   '".$Title4."',
										
										SubTitle1               =   '".$SubTitle1."',
										SubTitle2               =   '".$SubTitle2."',
										SubTitle3               =   '".$SubTitle3."',
										SubTitle4               =   '".$SubTitle4."'
										
										
								WHERE   CodeId               =   '".$CodeId."'		";	
		

		
		$insert = mysql_query($sql);	
				
		if($insert) 
		{ 
					
			$_SESSION['BoxSu'] = "Done"; 			
			
			?> <meta http-equiv="refresh" content="0; url=./WebSettings.php" > <?php 
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

