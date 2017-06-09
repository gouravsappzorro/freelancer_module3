<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php');?>
<?php include("../MailConfig.php");?>
<?php
if (!isset($_SESSION['user'])) {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="../Login/login.php";
     </script>
<?php
  	
    exit; 
}
?>

<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php //include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?>

     <!-- Static Page Titlebar -->
<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Dashboard</h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>                 
							</div>
                        </div>
                        <div id="breadcrumbs">
						<?php
						// print_r($_SESSION);
                        if(isset($_SESSION['id']))
                        {
                            $unread_message=mysql_num_rows(mysql_query("select * from message where ReadStatus='1' and Sender_Id!='".$_SESSION['id']."' and (developer_id='".$_SESSION['id']."' or client_id='".$_SESSION['id']."')"));
                        }
                        ?>
                         	<span class="breadcrumb-title" style="font-size:15px; font-weight:500;">
                            <a href="<?php echo WebUrl;?>Developer/message.php">Messages :
								<?php if($unread_message>0){?>  
                                     <i class="fa fa-envelope" aria-hidden="true" style="left:10px; position:relative; color:#F30 "> <?php echo $unread_message;?></i>
                                     
                                     <?php }else {?>
                                     <i class="fa fa-envelope" aria-hidden="true" style="left:10px; position:relative;"> <?php echo $unread_message;?></i>
                                     <?php }?>
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End Header -->

<!--============ Start Profile Complete Calculation =============-->
<?php

$maximumPoints = 100;
$point = 0;
$result=mysql_query("select * from register where unique_code='$_SESSION[id]'");
while($row = mysql_fetch_assoc($result)) {
	
	$education=mysql_fetch_array(mysql_query("select * from education where uid='$row[unique_code]'"));
	$experience=mysql_fetch_array(mysql_query("select * from experience where uid='$row[unique_code]'"));
	$portfolio=mysql_fetch_array(mysql_query("select * from portfolio where uid='$row[unique_code]'"));
	
	$message='';
	
    if($row['first_name'] != '' && $row['last_name'] != '' && $row['country'] != '' && $row['city'] != '')
	{
		$point+=10;
	}
	else if($row['first_name'] == '' || $row['last_name'] == '' || $row['country'] == '' || $row['city'] == '')
	{
		$message .= "<a href=".WebUrl.'Developer/my-profile.php'." style='color:red;'>Fillup Your Profile Details<br/></a>";
	}
	
	if($row['profile_picture'] != '' && $row['profile_title'] !='' && $row['description'] != '' && $row['company'] != ''  && $row['skills'] !='' && $row['company_type'] != '')
	{
		$point+=10;
	}
	else if($row['profile_picture'] == '' || $row['profile_title'] =='' || $row['description'] == '' || $row['company'] == '' || $row['skills'] =='' || $row['company_type'] == '')
	{
		$message .= "<a href=".WebUrl.'Developer/my-profile.php'." style='color:red;'>Fillup Your Personal Information <br/></a>";
	}
	
	if($education['education'] != '' && $education['country'] != '' && $education['univercity'] != '' && $education['start_year'] != '' && $education['end_year'] != '')
	{
		$point+=20;
	}
	else if($education['education'] == '' || $education['country'] == '' || $education['univercity'] == '' || $education['start_year'] == '' || $education['end_year'] == '')
	{
		$message .= "<a href=".WebUrl.'Developer/my-education.php'." style='color:red;'>Fillup Your Education Information <br></a>";
	}
		
		
	if($experience['title'] != '' && $experience['company'] != '' && $experience['experience'] != '' && $experience['summary'] != '')
	{
		$point+=20;
	}
	else if($experience['title'] == '' || $experience['company'] =='' || $experience['experience'] == '' || $experience['summary'] == '')
	{
		$message .= "<a href=".WebUrl.'Developer/my-experience.php'." style='color:red;'>Fillup Your Experience Details <br></a>";
	}
	
	if($portfolio['portfolio_image'] != '' && $portfolio['title'] != '' && $portfolio['skills'] != '')
	{
		$point+=20;
	}
	else if($portfolio['portfolio_image'] == '' || $portfolio['title'] == '' || $portfolio['skills'] == '')
	{
		$message .= "<a href=".WebUrl.'Developer/my-portfolio.php'." style='color:red;'>Fillup Your Portfolio Details <br></a>";
	}
	
	if($row['paypal_Account'] !='')
	{
		$point+=20;
	}
	else if($row['paypal_Account'] =='')
	{
		$message .= "<a href=".WebUrl.'Developer/my-paypal.php'." style='color:red;'>Enter Your Paypal Account</a>";
	}
	
}

$percentage = ($point*$maximumPoints)/100;


/*=============== Badge Code Start =================*/

//
if($percentage==100)
{
	$sql_badge=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='100-profile.png'"));
	
	if($sql_badge<1)
	{
		
		$desc=mysql_real_escape_string("100% Profile complete");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`, `name`, `description`, `badge`, `date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','100-profile.png',now())");
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
											<img src="'.WebUrl.'images/badges/100-profile.png" width="80px" height="80px">
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
		}
	}	
}

/*========== End Profile Complete calculation ===========*/


// Getting first review
$get_1review=mysql_query("select * from rating where developer_id='".$_SESSION['id']."'");
$count_1review=mysql_num_rows($get_1review);
$row_1review=mysql_fetch_array($get_1review);
if($row_1review['client_status']=='1' and $row_1review['developer_status']=='1')
{

	if($count_1review<=1)
	{
		$sql_badge2=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='1st-review.png'"));
	
		if($sql_badge2<1)
		{
			$desc=mysql_real_escape_string("Getting first review");
			$badge_insert=mysql_query("INSERT INTO badges(`uid`, `name`, `description`, `badge`, `date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','1st-review.png',now())");
			
			if($badge_insert)
			{
				$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
							
				$to       = $developer['email'];
				$subject  = "You have achieved new badge";
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
								Hi,'.$developer['first_name']." ".$developer['last_name'].'!
												</td>
											</tr>
											<tr>
												<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
												<span class="il">Welcome</span> to Webzira!<br><br>
							  
												Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
												<img src="'.WebUrl.'images/badges/1st-review.png" width="80px" height="80px">
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
			}
		}
	}
}



//Getting 5/5 reviews for 10 projects

$sql_rating=mysql_query("select * from rating where developer_id='".$_SESSION['id']."' and Client_Proffesionalism='5' and Client_Punctuality='5' and Client_Rehire='5'");
$count_rating=mysql_num_rows($sql_rating);
$row_rating=mysql_fetch_array($sql_rating);

if($count_rating>=10)
{
	$sql_badge3=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='5star-10projects.png'"));
	
	if($sql_badge3<1)
	{
		$desc=mysql_real_escape_string("Getting 5/5 reviews for 10 projects");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`, `name`, `description`, `badge`, `date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','5star-10projects.png',now())");
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
											<img src="'.WebUrl.'images/badges/5star-10projects.png" width="80px" height="80px">
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
		}
	}
}


// Complete a project worth more than $500 USD

$sql_completeproject=mysql_fetch_array(mysql_query("select SUM(milestone) as milestone from milestone_payment where developer_id='".$_SESSION['id']."'"));

if($sql_completeproject['milestone']>=500)
{
	$sql_badge4=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='500-dollar.png'"));
	
	if($sql_badge4<1)
	{
		$desc=mysql_real_escape_string("Complete a project worth more than $500 USD");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`, `name`, `description`, `badge`, `date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','500-dollar.png',now())");
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
											<img src="'.WebUrl.'images/badges/500-dollar.png" width="80px" height="80px">
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
		}
	}
}

// Complete a project worth more than $1000 USD
if($sql_completeproject['milestone']>=1000)
{
	$sql_badge4=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='1000-dollar.png'"));
	
	if($sql_badge4<1)
	{
		$desc=mysql_real_escape_string("Complete a project worth more than $1000 USD");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`, `name`, `description`, `badge`, `date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','1000-dollar.png',now())");
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
											<img src="'.WebUrl.'images/badges/1000-dollar.png" width="80px" height="80px">
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
		}
	}
}


//add bedge when bid on 100 projects
$user_bids=mysql_query("select * from user_bids where uid='".$_SESSION['id']."'");
$counter=mysql_num_rows($user_bids);
if($counter>=100)
{
	$bedge5=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='100-bid.png'"));
	if($bedge5<1)
	{
		$desc=mysql_real_escape_string("Bid on 100 projects");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`,`name`,`description`,`badge`,`date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','100-bid.png',now())") or die(mysql_error());
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
			
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge <strong>'.$desc.'</strong><br>
											<img src="'.WebUrl.'images/badges/100-bid.png" width="80px" height="80px">
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
			
		}
	}
}



//add badge when Bid on 300 projects
if($counter>=300)
{
	$bedge6=mysql_fetch_array(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='300-bid.png'"));
	if($bedge6<1)
	{
		$desc=mysql_real_escape_string("Bid on 300 projects");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`,`name`,`description`,`badge`,`date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','300-bid.png',now())") or die(mysql_error());
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
			
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge '.$desc.'<br>
											<img src="'.WebUrl.'images/badges/300-bid.png" width="80px" height="80px">
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
		}
	}
}


//add badge when Bid on 1000 projects
if($counter>=1000)
{
	$bedge7=mysql_num_rows(mysql_query("select * from badges where uid='".$_SESSION['id']."' and badge='1000-bid.png'"));
	if($bedge7<1)
	{
		$desc=mysql_real_escape_string("Bid on 1000 projects");
		$badge_insert=mysql_query("INSERT INTO badges(`uid`,`name`,`description`,`badge`,`date`) VALUES ('".$_SESSION['id']."','".$desc."','".$desc."','1000-bid.png',now())") or die(mysql_error());
		
		if($badge_insert)
		{
			$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
			
			$to       = $developer['email'];
			$subject  = "You have achieved new badge";
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
							Hi,'.$developer['first_name']." ".$developer['last_name'].'!
											</td>
										</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira!<br><br>
						  
											Congratulations ! You have achieved new badge '.$desc.'<br>
											<img src="'.WebUrl.'images/badges/1000-bid.png" width="80px" height="80px">
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
		}
	}
}





/*=================== End Badge Code ==================*/



?>

    <section class="section" style="padding-top:80px; padding-bottom:30px;">
	<div class="container">
		<div class="row-fluid">
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                    <?php 
						$res=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");
						$row=mysql_fetch_array($res);
						 ?>
                        
                        <img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                        
                        <p><?php echo $row['first_name']." ".$row['last_name'];?><br />
                        <?php 
						$sql_bid=mysql_fetch_array(mysql_query("select * from bid_info where uid='$_SESSION[id]'"));
						$plan=mysql_fetch_array(mysql_query("select * from admin_membership_plan where code='$sql_bid[PlanId]'"));
						
						//$plan_=mysql_fetch_array(mysql_query("select * from payment where user_id='$_SESSION[id]' and Status='active'"));
						?>
						Membership Plan: 
						<?php
						if($plan['plan_name']=='')
						{
							echo "Not activated";
						}
						else
						{
							echo $plan['plan_name'];
						}
						
						/*if($plan_['Plan']=='')
						{
							echo "Not activated";
						}
						else
						{
							echo $plan_['Plan'];
						}*/
						?></p>
                        
                        <p><u><a style="color:inherit" href="<?php echo WebUrl; ?>Developer/profile.php?user=<?php echo $row['unique_code']; ?>">View My-public profile</a></u></p>
						<div class="progress-wrap">
                            <p class="bar-text">
                                Profile Status <strong><?php echo $percentage.'%';?></strong>
                            </p>
                            <div class="progress">
                                <div class="bar" style="" data-percentage-value="<?php echo $percentage;?>" data-value="<?php echo $percentage;?>">
                                </div>
                            </div>
                            <?php if($message != '')
							{
							?>
                            <div id="triangle-up"></div>
                            	<div id="Profile_complete_message">
                                	<p>Follow to Complete Profile</p>
									<?php echo $message;?>
                            	</div>
                            
                            <?php
							}
							?>
                        </div><br />
						
						 
						 
						 <!-- My Bids Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>My Bids</span></h3>
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif"><strong><?php if($sql_bid['Bid']>0){echo $sql_bid['Bid']." / ".$plan['bids']; }else{ echo '0';}?></strong></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif"><a href="<?php echo WebUrl;?>membership-plans.php">Change Plan</a></font><br /><br />
						
						<!-- My Projects Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Ongoing Projects</span></h3>		
						<?php
							$sql=mysql_query("select * from post_projects where status='award' order by award_date desc LIMIT 5");
							while($row_project=mysql_fetch_array($sql))
							{
                            	echo '<p><a href="'.WebUrl.'bidding.php?project_id='.$row_project['project_id'].'">'.$row_project['title'].' >></a></p><hr />';
                            
							}
						?>
					</div>
                </div>
				
				<!-- First Project -->
				
                <div class="span9">
					<div class="inner-content">

					  <div class="span12">
					  <?php
							if(isset($_SESSION['success']))
							{
								echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong></strong> ".$_SESSION['success']."
									</div>";
								unset($_SESSION['success']);
							}
							else
							{
								$sel="select status from register where unique_code='".$_SESSION['id']."'";
								$res=mysql_query($sel);
								$row=mysql_fetch_array($res);
								if($row['status']=='active')
								{
									unset($_SESSION['activate']);
								}
								else
								{
									$_SESSION['activate']="Your account is not verified yet. Please verify your email id by clicking on the link given in email we sent.";
								}
								if(isset($_SESSION['activate']))
								{
									echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
											<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
											<strong></strong> ".$_SESSION['activate']."
										</div>";
									//unset($_SESSION['activate']);
								}
							}
							
					?>
					<?php
							if(isset($_SESSION['error']))
							{
								echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong></strong> ".$_SESSION['error']."
									</div>";
								unset($_SESSION['error']);
							}
							
						?>
					  <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Projects Feed</span></h3>	
						<ul class="product_list_widget">
                         <?php
                        
						$query=mysql_query("select * from notification where uid='$_SESSION[id]' order by id desc limit 30");
		
						$total_rows = mysql_num_rows($query);
						
						$per_page = 10;
						$num_links = 5;
						$total_rows = $total_rows; 
						$cur_page = 1; 
						
						if(isset($_GET['page']))
						{
						  $cur_page = $_GET['page'];
						  $cur_page = ($cur_page < 1)? 1 : $cur_page;
						}
						
						$offset = ($cur_page-1)*$per_page;
						
						$pages = ceil($total_rows/$per_page);
						
						$start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
						$end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
						
						$res = mysql_query("select * from notification where uid='$_SESSION[id]' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
                        
						if(mysql_affected_rows())
						{
							while($row_noti=mysql_fetch_array($res))
							{
								$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_noti[profile]'"));
							?>
								
								<a href="<?php echo WebUrl;?>Client/profile.php?user=<?php echo $developer['unique_code'];?>" title="<?php echo $developer['first_name'].' '.$developer['last_name'];?>">
								<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $developer['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/></a>
								
								<?php echo $row_noti['notification'];?>
								<br />
								<!--Day Caluclation-->			
								<?php
							
								$date1 = new DateTime($row_noti['date']);
								$date2 = new DateTime("now");
								$interval = $date1->diff($date2);
								$years = $interval->format('%y');
								$months = $interval->format('%m');
								$days = $interval->format('%d');
								if($years!=0){
									$ago = $years.' year(s) ago';
								}else{
									$ago = ($months == 0 ? $days.' day(s) ago' : $months.' month(s) ago');
								}
								if($ago==0)
								{
									$ago='Today';
								}
								echo $ago; 
								
								?>
	
								
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
									<span></span>
								</div>
										
							<?php
								
							}
						}
						else
						{
							echo"<div class='row-fluid'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Alert !!</strong> No any Notification Available Yet
		    				</div></div>";
						}
                        ?>
                        
						</ul>
					</div>
				</div>
				
				
			
	<!--======= Pagination Navigation Start =========-->
    <div id="pagination">
        <div id="pagiCount">
            <?php
                if(isset($pages))
                {  
                    if($pages > 1)        
                    {    
                        if($cur_page > $num_links)
                        {   $dir = "First";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1).'">'.$dir.'</a> </span>';
                        }
                       if($cur_page > 1) 
                        {
                            $dir = "Prev";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1).'">'.$dir.'</a> </span>';
                        }                 
                        
                        for($x=$start ; $x<=$end ;$x++)
                        {
                            
                            echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?page='.$x.'">'.$x.'</a> ';
                        }
                        if($cur_page < $pages )
                        {   $dir = "Next";
                            echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1).'">'.$dir.'</a> </span>';
                        }
                        if($cur_page < ($pages-$num_links) )
                        {   $dir = "Last";
                       
                            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'">'.$dir.'</a> '; 
                        }   
                    }
                }
            ?>
        </div>
    </div>
    <!--========= End Pagination Navigation ==========-->
				
            </div>
        </div>
    </div>
    </section>

   
   <?php include "../include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>
