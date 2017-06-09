<?php
	include "./MailConfig.php";
	
	$to      =  $Email;
	$subject =  "Reply From Randwick..";
	$header  =  "from: Randwick Auto Electricals";
	$msg = '

 <div style="font-size:14px;"><b>You have receieved reply from Randwick Auto Electrcials</b></div><br /><br />			
			
 <div style="font-size:14px;"><b>Name:</b>'.$Name.'</div><br /><br />
             
		
               <div style="font-size:14px;"><b>Message:</b>'.$Message.'</div><br /><br />
			
               <div style="font-size:14px;">Thanks</div><br /><br />
             
               <div style="font-size:14px;">Randwick Auto Electricals</div>
             
			
			';
			
			 email("GreenCubes-Admin",$to,$msg,$subject,"No");  ?>