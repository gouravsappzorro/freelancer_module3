<?php							/**================================================================================||
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
								||=================================================================================**/      

?>






<?php 

		$Browser = 'Localhost';// Localhost // // OnlineServer //    Set here your root ...................... 

?>



<?php //================== ** Localhost Define Here ** =======================//   ?> 


<?php  
if($_SERVER['HTTP_HOST'] == 'localhost')
 {
	
				/* Provide Your HostName  Here */				$HostName      = "localhost";                              
				/* Provide Your Database User Provide Here */   $DbUser        = "root"; 
				/* Provide Your Database Password Here */       $DbPassword    = ""; 
				/* Provide Your Database Name Here */    	    $Database      = "freelancer";  
				/* Provide Sql Query Here */    			    $Db            = mysql_connect($HostName, $DbUser, $DbPassword) or die ('Error: '.mysql_error()); 
				/* Provide Sql Query Here */		                             mysql_select_db($Database,$Db) or die('Error: '.mysql_error());	
																
																$dbtablehits = 'hits';
																$dbtableinfo = 'info';
																$maxrows = 50;	
					
				
}				
				
else
{
 				//================== ** Online Server Define Here ** =======================//   

	
	
/* Provide Your HostName  Here */				$HostName      = "localhost";                              
/* Provide Your Database User Provide Here */   $DbUser        = "traalero_trainee"; 
/* Provide Your Database Password Here */       $DbPassword    = "trainee"; 
/* Provide Your Database Name Here */    	    $Database      = "traalero_freelancer";  
/* Provide Sql Query Here */    			    $Db            = mysql_connect($HostName, $DbUser, $DbPassword) or die ('Error: '.mysql_error()); 
/* Provide Sql Query Here */		                             mysql_select_db($Database,$Db) or die ('Error: '.mysql_error());	
												$dbtablehits = 'hits';
												$dbtableinfo = 'info';
												$maxrows = 50;	
																
}		

?>













<?php							/**================================================================================||
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
								||=================================================================================**/      

?>
