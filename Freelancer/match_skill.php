<?php 
	include "Admin/MyInclude/MyConfig.php";
	include('MailConfig.php');
?>

<?php
$develoer=mysql_query("select * from register where hire='Work' and status='active' and skills!=''");
while($row_developer=mysql_fetch_array($develoer))
{
	$skills1=" skills LIKE  '%" .str_replace(',',"%' or skills LIKE '%",$row_developer['skills'])."%' ";
	$post_project=mysql_query("select * from post_projects where status='pending' and $skills1  order by id desc");
	$cnt_post_project=mysql_num_rows($post_project);
	if($cnt_post_project>0)
	{
		$project_list='';
		$project_id='';
		while($row_postprojects=mysql_fetch_array($post_project))
		{
			$project_id.=$row_postprojects['project_id'].',';
		}

		$project_id=rtrim($project_id,',');

		$data1=mysql_fetch_row(mysql_query("select * from skillmatch_mail_log where project_id='".$project_id."' and uid='".$row_developer['unique_code']."'"));

		if($data1==0)
		{
			$sql2 = "select * from skillmatch_mail_log where uid='".$row_developer['unique_code']."'";
		   
			$result = mysql_query($sql2);
		   
			while($row2 = mysql_fetch_array($result))
			{
				$temp_pro_id= $row2['project_id'];
				$project_id = str_replace($temp_pro_id,'',$project_id);
				$project_id=trim($project_id,',');
			}
		   
			mysql_query("insert into skillmatch_mail_log values('','$row_developer[unique_code]','$project_id','0')") or die (mysql_error());
			
			$a=mysql_query("select * from skillmatch_mail_log where project_id=''");

			while($b=mysql_fetch_array($a))
			{
				mysql_query("delete from skillmatch_mail_log where project_id='$b[project_id]'");
			}
		}
		
		$log=mysql_query("select * from skillmatch_mail_log where uid='".$row_developer['unique_code']."' and project_id='".rtrim($project_id,',')."'");
		
		$sql_log=mysql_num_rows($log);
			
		while($row_log=mysql_fetch_array($log))
		{
			if($row_log['status']=='0' || $row_log['status']==NULL)
			{
				$sql=mysql_query("select * from skillmatch_mail_log where uid='".$row_developer['unique_code']."' and status='0'");
				
				while($row=mysql_fetch_array($sql))
				{
					$project=explode(',',$row['project_id']);
				
					for($i=0;$i<count($project);$i++)
					{
						$pro=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".@$project[$i]."'"));
					
						$project_list.='
						<tr style="background:#ffffff">
							<td style="width:70%; font-size:16px !important; padding-left:10px !important;"><a href="">'.@$pro['title'].'</a><br />
								<p style="font-size:12px !important; padding-left:5px">'.limit_words(@$pro['description'],20).'</p>
								<p>
								'.@$pro['skills'].'
								</p>
							</td>
							<td style="width:30%;" align="center">'.@$pro['currency']." ".@$pro['budget'].'<br /><br />
								<a href="'.WebUrl.'bidding.php?project_id='.@$pro['project_id'].'"><button type="button" class="btn btn-warning">Bid Now</button></a>
							</td>
						</tr>';
					
					}
				}
				
				echo "<br>";echo "<br>";
				echo "Mail Send to ".$row_developer['email'];
				echo "<br>";
				
				$to       = $row_developer['email'];
				$subject  = "You have skill match";
				$header   = "Webzira.com"; 
				$msg='
				<div style="background-color:#e5e5e1;font-size:18px">
					<div bgcolor="#e5e5e1" style="margin:0;padding:0">
					  <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
					  <tbody><tr>
						<td valign="bottom">
						  <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
							<tr>
								<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
								<table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
									<td style="padding-left:15px;" align="left" valign="middle">
										<img src="'.WebUrl.'/images/email-logo.png" alt="">
									</td>
								</tr></tbody></table>
								</td>
											
							</tr>
							<tr valign="top" style="">
								<td style="padding-top:20px" height="218" align="center">
									<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
										<tbody><tr align="left">
											<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
											Hi, '.$row_developer['first_name']." ".$row_developer['last_name'].'! <br /><br />
											</td>
										</tr>
							<div class="table-responsive">
								<table style="border:none !important;">
									<tbody>
										
										<tr style="background:#2e363f">
										<td style="color:#ffffff;font-size:14px;">PROJECT DESCRIPTION</td>
										<td style="color:#ffffff;font-size:14px;">PROJECT COST</td>
										</tr>
										'.$project_list.'
										</tbody>
								</table>
							</div>
							
						<tr valign="left">
						<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
												   <div align="center">
														<button type="button" class="btn btn-warning">View More Jobs on Website with matching skills</button><br /><br >
												   </div>
												   <h4>If you have any queries, feel free to contact us at  info@webzira.com</h4>
												  </td>
												</tr>
						
						
						<tr valign="left">
						<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
												  <h4>Thank you 
													<br>
													-Team Webzira</h4> 
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
						  
				echo $msg;
				
				$send=email("Webzira.com",$to,$msg,$subject,"No");
				if($send=='')
				{
					mysql_query("update skillmatch_mail_log set status='1' where project_id='$project_id' and uid='$row_developer[unique_code]'");
				}
				else
				{
					echo 'error in send mail';
				}
			}
			else
			{
				$error="skills not match";
			}
		}
	}
	else
	{
		echo "no skills match";
	}
}
echo $error;
?>