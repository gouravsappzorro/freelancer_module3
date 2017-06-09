<?php 
	include('Admin/MyInclude/MyConfig.php'); 
	include ("MailConfig.php");
?>

<?php

$currentdate=date('YmdHi');
$str=$currentdate;

	// fetch project details
	$sql=mysql_query("select * from post_projects where project_id='$_GET[project_id]'");
	$row=mysql_fetch_array($sql);
	
	// fetch client details
	$sql2=mysql_query("select * from register where unique_code='".$row['uid']."'");
	$sql_user=mysql_fetch_array($sql2);
	
	//fetch developer details
	$sql3=mysql_fetch_array(mysql_query("select * from register where unique_code='$_GET[key]'"));
	
	$sql_bid=mysql_fetch_array(mysql_query("select * from user_bids where uid='$_GET[key]' and project_id='$_GET[project_id]'"));
?>



<?php

	// when developer Accept the awarded project
	
	if(isset($_GET['key']) and isset($_GET['project_id']) and isset($_GET['confirm']))
	{
		//Code of notification
		$project_title=mysql_real_escape_string($row['title']);
		$insert_notification=mysql_query("insert into notification values('','$sql_user[unique_code]','$sql3[unique_code]','<font style=color:#f1c40f><a href=../Developer/profile.php?user=$sql3[unique_code]>$sql3[first_name] $sql3[last_name]</a></font> you award project <font style=color:#f1c40f><a href=../browse_detail_client.php?project_id=$row[project_id]>$project_title</a></font> for <strong>$row[currency] $sql_bid[cost]</strong>',now(),'active')");
		
		$insert_notification=mysql_query("insert into notification values('','$sql3[unique_code]','$sql_user[unique_code]','<font style=color:#f1c40f><a href=../Developer/profile.php?user=$sql_user[unique_code]>$sql_user[first_name] $sql_user[last_name]</a></font> award project <font style=color:#f1c40f><a href=../browse_detail_client.php?project_id=$row[project_id]>$project_title</a></font> for <strong>$row[currency] $sql_bid[cost]</strong>',now(),'active')");
		
		$to       = $sql_user['email'];
		$subject  = $sql3['first_name'].' '.$sql3['last_name']." has accepted the project ".$row['title'];
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
									Hi,'.$sql_user['first_name']." ".$sql_user['last_name'].'!
								  </td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_user['username'].'\'</td>
						</tr>
		<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
								  <span class="il">Welcome</span> Webzira!<br><br>
								
								<strong>'.$sql3['first_name'].' '.$sql3['last_name'].'</strong> has accepted your project <strong>'.$row['title'].'</strong>. Ask <strong>'.$sql3['first_name'].' '.$sql3['last_name'].'</strong> for updates on the project as on decided between you both. Communicate regularly through our inbuilt messaging chat system to avoid any confusion during the project course. Pay the milestone as per decided in the beginning.
								
								  <br/><br/>
									
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
								  Thank you 
									<br>
									- Webzira.com Team 
								  </td>
								</tr>
								
		<tr align="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
								  Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
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
		
			if(mysql_query("update user_bids set status='awarded' where project_id='$_GET[project_id]' and uid='$_GET[key]'"))
			{
				header("location:bidding.php?project_id=".$_GET['project_id']);
			}
			else
			{
				echo "error";
			}
		
			mysql_query("update post_projects set status='award',developer_id='".$_GET['key']."',award_date=CURDATE() where project_id='".$_GET['project_id']."'");
		
		
	}
	
	
	// when developer reject the awarded project
	
	if(isset($_GET['key']) and isset($_GET['project_id']) and isset($_GET['delete']))
	{
		if(mysql_query("update user_bids set status='active' where project_id='$_GET[project_id]' and uid='$_GET[key]'"))
		{
			header("location:bidding.php?project_id=".$_GET['project_id']);
		}
		else
		{
			echo "error";
		}
		mysql_query("update post_projects set status='pending',developer_id='',award_date='' where project_id='".$_GET['project_id']."'");
		
		$to       = $sql_user['email'];
		$subject  = $sql3['first_name'].' '.$sql3['last_name']." has rejected your project ".$row['title'];
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
									Hi,'.$sql_user['first_name']." ".$sql_user['last_name'].'!
								  </td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_user['username'].'\'</td>
						</tr>
		<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
								  <span class="il">Welcome</span> to Webzira!<br><br>
									
								<strong>'.$sql3['first_name'].' '.$sql3['last_name'].'</strong> has rejected your project <strong>'.$row['title'].'</strong>. You can ask the reason to developer through our inbuilt messaging chat system. You can also award other reputed developers who bided on your project.
								
								  <br/><br/>
									
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
								  Thank you 
									<br>
									- Webzira.com Team 
								  </td>
								</tr>
								
		<tr align="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
								  Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
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