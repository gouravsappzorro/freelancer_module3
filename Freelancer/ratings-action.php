<?php
session_start();
?>
<?php 
	include('Admin/MyInclude/MyConfig.php');
	include ("MailConfig.php");	
?>
<?php

extract($_POST);
	$msg=mysql_real_escape_string($msg);
	
	$sql=mysql_query("select * from rating where project_id='$project'");
	$cnt=mysql_num_rows($sql);
		
	if($_SESSION['user']=='Hire')
	{
		if($cnt<1)
		{
			
			
			$insert=mysql_query("INSERT INTO `rating`(`id`,`project_id`,`client_id`,`Client_Punctuality`,`Client_Proffesionalism`,`Client_Rehire`,`client_message`,`client_rate_date`,`client_status`,`developer_status`) VALUES ('','$project','$_SESSION[id]','$Punctuality','$Proffesionalism','$Would_rehire','$msg',CURDATE(),'1','0')");
		
			if($insert)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			$update=mysql_query("update rating set client_id='$_SESSION[id]',Client_Punctuality='$Punctuality',Client_Proffesionalism='$Proffesionalism',Client_Rehire='$Would_rehire',client_message='$msg',client_rate_date=CURDATE(),client_status='1' where project_id='$project'");
			
			if($update)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
	}
	if($_SESSION['user']=='Work')
	{
		if($cnt<1)
		{
			$insert=mysql_query("INSERT INTO `rating`(`id`,`project_id`,`developer_id`,`Developer_Punctuality`,`Developer_Proffesionalism`,`Developer_rehire`,`developer_message`,`developer_rate_date`,`developer_status`,`client_status`) VALUES ('','$project','$_SESSION[id]','$Punctuality','$Proffesionalism','$Would_rehire','$msg',CURDATE(),'1','0')");
			
			if($insert)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
		else
		{
			$update=mysql_query("update rating set developer_id='$_SESSION[id]',Developer_Punctuality='$Punctuality',Developer_Proffesionalism='$Proffesionalism',Developer_Rehire='$Would_rehire',developer_message='$msg',developer_rate_date=CURDATE(),developer_status='1' where project_id='$project'");
			
			if($update)
			{
				echo '1';
			}
			else
			{
				echo '0';
			}
		}
	}
	
	$sql=mysql_query("select * from rating where project_id='$project'");
	$row=mysql_fetch_array($sql);
	if($row['client_status']=='1' && $row['developer_status']=='1')
	{
		//fetch Developer Details
		$sql_developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[developer_id]'"));
		
		//fetch Client Details
		$sql_client=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[client_id]'"));
		
		//fetch Project Details
		$sql_project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row[project_id]'"));
		
		$project_title=mysql_real_escape_string($sql_project['title']);
		
		//insert Notification
		$insert_notification=mysql_query("insert into notification values('','$sql_client[unique_code]','$sql_developer[unique_code]','<font style=color:#f1c40f><a href=../Client/profile.php?user=$sql_developer[unique_code]>$sql_developer[first_name] $sql_developer[last_name]</a></font> left ratings and reviews for project <font style=color:#f1c40f><a href=../ratings-past.php>$project_title</a></font>',now(),'active')");
		
		$insert_notification=mysql_query("insert into notification values('','$sql_developer[unique_code]','$sql_client[unique_code]','<font style=color:#f1c40f><a href=../Developer/profile.php?user=$sql_developer[unique_code]>$sql_client[first_name] $sql_client[last_name]</a></font> left ratings and reviews for project <font style=color:#f1c40f><a href=../ratings-past.php>$project_title</a></font>',now(),'active')");
		
		
		/*============= Send Client Email ============*/
		
		$to1       = $sql_client['email'];
		$subject1  = "Ratings given by ".$sql_developer['first_name'].' '.$sql_developer['last_name']." has been published for ".$sql_project['title'];
		$header1   = "Webzira.com"; 
	
	
		$msg1='
		<div style="background-color:#e5e5e1;font-size:18px">
		<div bgcolor="#e5e5e1" style="margin:0;padding:0">
		  <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0"><tbody><tr>
		<td valign="bottom">
				  <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
		<tr>
		<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
						  <table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
		<td style="padding-left:15px;" align="left" valign="middle">
							  <img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
		</td>
							</tr></tbody></table>
		</td>
						
					  </tr>
		<tr valign="top" style="">
		<td style="padding-top:20px" height="218" align="center">
						  <table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
		<tbody><tr align="left">
		<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
								Hi,'.$sql_client['first_name']." ".$sql_client['last_name'].'!
							  </td>
							</tr>
							<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_client['username'].'\'</td>
						</tr>
		<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
							  <span class="il">Welcome</span> to Webzira!<br><br>
							  
							  Congratulation! Ratings given by <strong>'.$sql_developer['first_name'].' '.$sql_developer['last_name'].'</strong> has been published for <strong>'.$sql_project['title'].'</strong>
							  
							  
							  <br /><br />
							  
							 <a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'ratings-past.php" >Click Here!</a>
							 
							 <br><br>
								
							 Your feedback has also been published to <strong>'.$sql_developer['first_name'].' '.$sql_developer['last_name'].'</strong>
							 <br>
							 Post more projects on Webzira.com and get your work done from reputed developers on platform.
							 <br><br>
							 
							 Thanks for using Webzira.com<br />
							  
							  </td>
							</tr>
		<tr valign="left">
		<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
							  If you have any queries, feel free to contact us at info@webzira.com
							  </td>
							</tr>
		
		
		<tr valign="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
							  Thank You 
								<br>
								- Webzira.com Team
							  </td>
							</tr>
							
		<tr align="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
							  Copyrights 
							  </td>
							</tr>						
							
		</tbody></table>
		</td>
					  </tr>
		</tbody></table>
		</td>
			  </tr></tbody></table>
		</div>
		<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send1=email("Webzira.com",$to1,$msg1,$subject1,"No");
	
		
	
		/*==================== Send Developer Mail ==================*/
	
		$to       = $sql_developer['email'];
		$subject  = "Ratings given by ".$sql_client['first_name'].' '.$sql_client['last_name']." has been published for ".$sql_project['title'];
		$header   = "Webzira.com"; 
	
	
		$msg='
		<div style="background-color:#e5e5e1;font-size:18px">
			<div bgcolor="#e5e5e1" style="margin:0;padding:0">
			  <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0"><tbody><tr>
		<td valign="bottom">
					  <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
		<tr>
		<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
							  <table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
		<td style="padding-left:15px;" align="left" valign="middle">
								  <img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
		</td>
								</tr></tbody></table>
		</td>
							
						  </tr>
		<tr valign="top" style="">
		<td style="padding-top:20px" height="218" align="center">
							  <table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
		<tbody><tr align="left">
		<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
									Hi,'.$sql_developer['first_name']." ".$sql_developer['last_name'].'!
								  </td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_developer['username'].'\'</td>
						</tr>
		<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
								  <span class="il">Welcome</span> to Webzira!<br><br>
								  
								  Congratulation! Ratings given by <strong>'.$sql_client['first_name'].' '.$sql_client['last_name'].'</strong> has been published for <strong>'.$sql_project['title'].'</strong>
								  
								  
								  <br /><br />
								  
								 <a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'ratings-past.php" >Click Here!</a>
								 
								 <br><br>
									
								 Your feedback has also been published to <strong>'.$sql_client['first_name'].' '.$sql_client['last_name'].'</strong>
								 <br>
								 Bid on more and more projects, complete all the work on time and earn more income.
								 <br><br>
								 
								 Thanks for using Webzira.com<br />
								  
								  </td>
								</tr>
		<tr valign="left">
		<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
								  If you have any queries, feel free to contact us at info@webzira.com
								  </td>
								</tr>
		
		
		<tr valign="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
								  Thank You 
									<br>
									- Webzira.com Team
								  </td>
								</tr>
								
		<tr align="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
								  Copyrights 
								  </td>
								</tr>						
								
		</tbody></table>
		</td>
						  </tr>
		</tbody></table>
		</td>
				  </tr></tbody></table>
		</div>
		  <img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send=email("Webzira.com",$to,$msg,$subject,"No");
		
	}
	
?>
