<?php 
session_start();
?>
<?php
	include('Admin/MyInclude/MyConfig.php'); 
	include('MailConfig.php');
?>
<?php

	if(isset($_POST['save_bid']) && isset($_SESSION['id']))
	{

		$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
		$d_exp_country=explode(",", $developer['country']);

		$dev_exp=mysql_fetch_array(mysql_query("select * from experience where uid='".$_SESSION['id']."'"));
		
		$post_projects=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$_POST['project_id']."'"));
		$p_exp_country=explode(",", $post_projects['location']);

		$client=mysql_fetch_array(mysql_query("select * from register where unique_code='".$post_projects['uid']."'"));
		
		// if($developer['country']==$client['country'])
		// {
		// 	$location="Local";
		// }
		// else if($developer['country']!=$client['country'])
		// {
		// 	$location="International";
		// }

		// Comparing the values
		$array_result = array_intersect($d_exp_country,$p_exp_country);
		$exp=explode(",",Get_Date_Difference($developer['Experience'],date('d-m-Y')));
		
		$flag=0;
		//$exp_experience=explode(",", $dev_exp['experience']);
		$msg="You are unable to Bid on this Project Because ";
		if($developer['company_type'] != ucfirst($post_projects['accept_offers']))
		{

			if($post_projects['accept_offers']=='both')
			{
				$flag=0;
			}
			else
			{
				$flag++;
				$_SESSION['error']=$msg."Your Type is not match <br>";
			}
		}
		
		if($exp[0] < (int)$post_projects['experience'])
		{
			
			if($post_projects['experience']=='All')
			{
				$flag=0;
			}
			else
			{

				$flag++;
				$_SESSION['error']=$msg."Your Experience is not match <br>";
				
			}
		}


		
		
		//~ if(count($array_result)<1)
		//~ {
			//~ $flag++;
			//~ $_SESSION['error']=$msg."Your Location is not match <br>";
		//~ }
		
		$skills_dev=explode(',',strtolower($developer['skills']));
		$skills_pro=explode(',',strtolower($post_projects['skills']));
		$skills=array_intersect($skills_dev,$skills_pro);
		
		$a=count($skills);
		
		if($a==0)
		{
			$_SESSION['error']=$msg."Your Skills are not match <br>";
			$flag++;
		}
				
		if($flag>0)
		{
			?>
            	<script type="text/javascript">
                   	window.location.href="bidding.php?project_id=<?php echo $_POST['project_id']; ?>";
                </script>
                    
            <?php
		}
		else{
		
			$res2=mysql_query("select * from user_bids where project_id='".$_POST['project_id']."' and uid='".$_SESSION['id']."'");
			$counter=mysql_num_rows($res2);
			
			if($post_projects['type_of_project']=='fixed')
			{
				$cost=$_POST['cost'];
			}
			if($post_projects['type_of_project']=='hourly')
			{
				$cost=$_POST['cost'] * $_POST['duration'];
			}
			
			if($counter==0 && $flag==0)
			{

				$res=mysql_query("insert into user_bids values(null,'".$_POST['project_id']."',
															   '".mysql_real_escape_string($_POST['bid_message'])."',
															   '".$cost."',
															   '".mysql_real_escape_string($_POST['duration'])."',
															   '".$_SESSION['id']."',
															   'active')");
				if($res)
				{
					// fetch post project data
					$sql_post_project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$_POST[project_id]'"));
					
					//fetch client details
					$sql_client=mysql_fetch_array(mysql_query("select * from register where unique_code='$sql_post_project[uid]'"));
					
					//fetch developer details
					$sql_developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$_SESSION[id]'"));
					
					/*============== Send Mail when developer Bid on project ===========*/
					
					$to       = $sql_client['email'];
					$subject  = "You have new bid on ".$sql_post_project['title'];
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
												</tr>
												<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$sql_client['username'].'\'</td>
						</tr>
												<tr>
													<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
													<span class="il">Welcome</span> to Webzira!<br><br>
								  
													
													<strong>'.$sql_developer['first_name']." ".$sql_developer['last_name'].'</strong> has bided on the project <strong>'.$sql_post_project['title'].'</strong> that you recently posted.  Please click on the below button to open the project page.<br/><br>
													
													<a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'browse_detail_client.php?project_id='.$_POST['project_id'].'" >Click Here!</a><br><br>
													
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
								  
												Thank You <br>
												- Webzira.com Team
												</td>
											</tr>
											<tr align="left">
												<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
					
											  Copyrights 
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
					
					
					
				
					$res1=mysql_query("select * from bid_info where uid='".$_SESSION['id']."' and Status='active'");
					$row=mysql_fetch_array($res1);
					$rem_bid=$row['Bid']-1;
				
					$res2=mysql_query("update bid_info set Bid='$rem_bid' where uid='".$_SESSION['id']."' and Status='active'");
					if($res2)
					{
						$_SESSION['success']="Your bid successfully saved.";
						if(isset($_POST['list'])==1)
						{
						?>
						<script type="text/javascript">
							window.location.href="browseprojects.php";
						</script>
						<?php
						}
						else
						{
				?>
						<script type="text/javascript">
							window.location.href="bidding.php?project_id=<?php echo $_POST['project_id']; ?>";
						</script>
						
						
				<?php
						}
					}	
				}
			}
			else
			{
				$res=mysql_query("update user_bids set bid_message='".mysql_real_escape_string($_POST['bid_message'])."',
													   cost='".$_POST['cost']."',
													   duration='".mysql_real_escape_string($_POST['duration'])."',
													   status='active'
													   where project_id='".$_POST['project_id']."' and uid='$_SESSION[id]'");
				if($res)
				{
					if(isset($_POST['list'])=='1')
					{
						?>
						<script type="text/javascript">
							window.location.href="myprojects-open-projects-developer.php";
						</script>
						<?php
					}
					else
					{
				?>
					<script type="text/javascript">
							window.location.href="bidding.php?project_id=<?php echo $_POST['project_id']; ?>";
						</script>
				
				<?php
					}
				}
			}
		}
	}
 ?>
