<?php 
	include('Admin/MyInclude/MyConfig.php');
	include ("MailConfig.php");
?>
<?php

extract($_POST);

$sql_milestone=mysql_query("select Sum(create_payment) as remain_payment from milestone where project_id='$project_id'");

$cnt=mysql_num_rows($sql_milestone);

$row_milestone=mysql_fetch_array($sql_milestone);

if(isset($project_id) && isset($client_id) && isset($developer_id) && isset($cost) && isset($description) && $create=='true')
{
	if($row_milestone['remain_payment']=='' or $row_milestone['remain_payment']!=0)
	{
		$desc=mysql_real_escape_string($description);
		
		$insert_milestone=mysql_query("insert into milestone values('','$project_id','$client_id','$developer_id','$desc','$cost',CURDATE(),'','create')");
		
		
		if($insert_milestone)
		{
			$_SESSION['s']="Milestone created successfully";
			
			//fetch client details
			$sql_client=mysql_fetch_array(mysql_query("select * from register where unique_code='$client_id'"));
			
			//fetch developer details
			$sql_developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$developer_id'"));
			
			// fetch project details
			$projects=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$project_id'"));
			
			//Code of notification
			$project_title=mysql_real_escape_string($projects['title']);
			
			$insert_notification=mysql_query("insert into notification values('','$client_id','$developer_id','<font style=color:#f1c40f><a href=../Developer/profile.php?user=$sql_developer[unique_code]>$sql_developer[first_name] $sql_developer[last_name]</a></font> has requested a milestone pay of <strong>$projects[currency] $cost</strong> on project <font style=color:#f1c40f><a href=../browse_detail_client.php?project_id=$projects[project_id]>$project_title</a></font>',now(),'active')");
			
			$insert_notification=mysql_query("insert into notification values('','$developer_id','$client_id','You requested a milestone pay of <strong>$projects[currency] $cost</strong> on project <font style=color:#f1c40f><a href=../bidding.php?project_id=$projects[project_id]>$project_title</a></font>',now(),'active')");
			
			
			
			$to       = $sql_client['email'];
			$subject  = $sql_developer['first_name'].' '.$sql_developer['last_name']." has requested a milestone pay on project ".$projects['title'];
			$header   = "Webzira.com"; 
			$msg='
			<div style="background-color:#e5e5e1;font-size:18px">
				<div bgcolor="#e5e5e1" style="margin:0;padding:0">
					<table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
							<td valign="bottom">
								<table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
				                    <table width="651" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
										<td style="padding-left:15px;" align="left" valign="middle">
										<img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
                        				</tr>
									</tbody>
									</table>
									</td>
								</tr>
								<tr valign="top" style="">
									<td style="padding-top:20px" height="218" align="center">
										<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
										<tbody>
										<tr align="left">
											<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
                            Hi,'.$sql_client['first_name']." ".$sql_client['last_name'].'!
                          					</td>
											<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_client['username'].'\'</td>
						</tr>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira !<br><br>
						  
						   <strong>'.$sql_developer['first_name']." ".$sql_developer['last_name'].'</strong> has requested a milestone payment of <strong>'.$projects['currency'].' '.$cost.'</strong> for your ongoing project <strong>'.$projects['title'].'</strong>
										
											<br />
											
							If you are sure to release the milestone payment, click on the below button to go to the projects page. 
							<br /><br>
							<a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'browse_detail_client.php?project_id='.$projects['project_id'].'" >Click Here!</a>
							
							<br><br>
							
											Thanks for using Webzira.com
                          					</td>
                        			</tr>
									<tr valign="left">
										<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
			
										If you have any queries, feel free to contact us at info@webzira.com
										</td>
                        			</tr>
									<tr valign="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
                          
						  				Thank you <br>
			                            - Webzira.com Team
            				            </td>
                        			</tr>
									<tr align="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
			
			                          Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
            			              </td>
                        			</tr>						
						
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
				</table>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
  			<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send=email("Webzira.com",$to,$msg,$subject,"No");
		
			if($send=="")
			{
				$_SESSION['s'].="<br>Email Sent Successfully To <strong>".$sql_client['first_name']." ".$sql_client['last_name']." </strong>";
				
			}
			else
			{
				$_SESSION['e'].="<br>Email not Sent";
			}
			$send='';
			
		}
		else
		{
			$_SESSION['e']="Error in Milestone creation";
		}
	}
	else
	{
		$_SESSION['e']= "No any remain payment";
	}
}

if(isset($cncl) and $can=='1')
{
	
	// fetch milestone details
	$sql_milestone=mysql_fetch_array(mysql_query("select * from milestone where id='$cncl'"));
	
	//fetch project data
	$sql_project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$sql_milestone[project_id]'"));
	
	//fetch client details
	$sql_cli=mysql_fetch_array(mysql_query("select * from register where unique_code='$sql_milestone[client_id]'"));
	
	//fetch developer details
	$sql_dev=mysql_fetch_array(mysql_query("select * from register where unique_code='$sql_milestone[developer_id]'"));
	
	
	//Code of notification
	$project_title=mysql_real_escape_string($sql_project['title']);
	
	$insert_notification=mysql_query("insert into notification values('','$sql_milestone[developer_id]','$sql_milestone[client_id]','<font style=color:#f1c40f><a href=#>$sql_cli[first_name] $sql_cli[last_name]</a></font> Cancel a milestone of <strong>$sql_project[currency] $sql_milestone[create_payment]</strong> on project <font style=color:#f1c40f><a href=../bidding.php?project_id=$sql_project[project_id]>$project_title</a></font>',now(),'active')");
	
	
	
	$to       = $sql_dev['email'];
	$subject  = $sql_cli['first_name'].' '.$sql_cli['last_name']." has cancel milestone pay on project ".$sql_project['title'];
	$header   = "Webzira.com"; 
	$msg='
	<div style="background-color:#e5e5e1;font-size:18px">
		<div bgcolor="#e5e5e1" style="margin:0;padding:0">
			<table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
					<td valign="bottom">
						<table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
							<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
							<table width="651" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
								<td style="padding-left:15px;" align="left" valign="middle">
								<img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
								</tr>
							</tbody>
							</table>
							</td>
						</tr>
						<tr valign="top" style="">
							<td style="padding-top:20px" height="218" align="center">
								<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
								<tbody>
								<tr align="left">
									<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
					Hi,'.$sql_dev['first_name']." ".$sql_dev['last_name'].'!
									</td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_dev['username'].'\'</td>
						</tr>
								<tr>
									<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
									<span class="il">Welcome</span> to Webzira !<br><br>
				  
				   <strong>'.$sql_cli['first_name']." ".$sql_cli['last_name'].'</strong> cancel milestone of <strong>'.$sql_project['currency'].' '.$sql_milestone['create_payment'].'</strong> for project <strong>'.$sql_project['title'].'</strong>
								
					
					<br><br>
					
									Thanks for using Webzira.com
									</td>
							</tr>
							<tr valign="left">
								<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
	
								If you have any queries, feel free to contact us at info@webzira.com
								</td>
							</tr>
							<tr valign="left">
								<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
				  
								Thank you <br>
								- Webzira.com Team
								</td>
							</tr>
							<tr align="left">
								<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
	
							  Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
							  </td>
							</tr>						
				
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
	
	$send=email("Webzira.com",$to,$msg,$subject,"No");
		
	
	$del=mysql_query("delete from milestone where id='$cncl'");
	
	
	
}
?>