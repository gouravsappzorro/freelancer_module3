<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
<?php include "../MailConfig.php";?>
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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Replay Feedback</title>

	<?php include "../MyInclude/HomeScript.php"; ?>
	<?php include "../MyInclude/MyEditor.php"; ?>
	<script type="text/javascript">
	
		window.onload = function()
		{
			// Automatically calculates the editor base path based on the _samples directory.
			// This is usefull only for these samples. A real application should use something like this:
			// oFCKeditor.BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
			//var sBasePath = document.location.href.substring(0,document.location.href.lastIndexOf('../MyInclude/FCKEditor/_samples')) ;
		
			var oFCKeditor = new FCKeditor( 'message' ) ;
			oFCKeditor.BasePath	= '../MyInclude/fckeditor/';
			oFCKeditor.ReplaceTextarea() ;
		}
	</script>
    <style>
        section {
            width: 100%;
            margin: auto;
            text-align: left;
        }
    
		.error{ color:#FF0000; }
	</style>
    
<script type="text/javascript">

function messageCheck(value)
{
	if(value=='')
	{
		document.getElementById("message_error").innerHTML="This field is required.";
		return false;
	}
	else
	{
		document.getElementById("message_error").innerHTML="";
		return true;
	}	
}

function subjectCheck(value)
{
	var regex=/^([A-Za-z0-9 ])+$/;
	if (value == ''){
			
		document.getElementById("subject_error").innerHTML = 'This field is required.';
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("subject_error").innerHTML = 'Enter Valid Subject.';
		return false;
	}
	else
	{
		document.getElementById("subject_error").innerHTML = '';
		return true;		
	}
}

function replayValidation()
{
	var b = subjectCheck(document.getElementById("subject").value);
	
	if(b)
	{
		return true;
	}
	else
	{
		return false;
	}
}

</script>
	<!-- Validation Js Ending --->
</head>

<body>

	<?php include "../MyInclude/HomeHeader.php"; ?>

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				
				<?php include "../MyInclude/HomeSearch.php"; ?>
				
				<!--=== Navigation ===-->
				
				<?php include "../MyInclude/HomeNavigation.php"; ?>
				
				<!-- /Navigation -->
				
			
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubheader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row"> <!-- .row-bg -->
					<br/><br/><br/>

					
					
				</div> <!-- /.row -->
				<!-- /Statboxes -->
		
				

	

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box table-responsive">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Replay Feedback</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
				<?php 
						$feedback=mysql_fetch_array(mysql_query("select * from feedback where id='".$_GET['TestCode']."'"));
						if(isset($_POST['submit']))
						{
							$email = $feedback['email'];
							$name = $feedback['first_name'].' '.$feedback['last_name'];;
							$subject = $_POST['subject'];
							$message = $_POST['message'];
							
							$to       = $email;
							$subject  = $_POST['subject'];
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
													Hi,'.$name.'!
												  </td>
												</tr>
							<tr>
							<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
												  <span class="il">Welcome</span> to Webzira!<br><br>
												  
												  '.$message.'
												  
												  
												  <br /><br />
												  
												 
												 Thanks for Feedback<br />
												  
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
							
							
								mysql_query("update feedback set status='Replayed'");
								echo '<meta http-equiv="refresh" content="2;URL=index.php">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Send Mail Successfull!</strong>.
									  </div>';
							
							
						}				
				?>				
												
                            <form name="individual_signup" class="form-horizontal row-border"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return replayValidation(this);" method="post"  enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Replay to<span class="required">*</span></label>
                                    <div class="col-md-9"><label for="name" class="error" id="name_error"></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            <input type="text" name="name" id="name"  title="Name" onFocus="if (this.value == 'Name') {this.value = '';}" onBlur="cityCheck(this.value)" class="form-control bs-tooltip" value="<?php echo $feedback['first_name'].' '.$feedback['last_name'];?>" disabled>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Subject<span class="required">*</span></label>
                                    <div class="col-md-9"><label for="subject" class="error" id="subject_error"></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            <input type="text" name="subject" id="subject"  title="Subject" onFocus="if (this.value == 'Subject') {this.value = '';}" onBlur="subjectCheck(this.value)" class="form-control bs-tooltip" >
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
									<label class="col-md-2 control-label">Message <span class="required">*</span></label>
                                    <div class="col-md-9"><label for="message" class="error" id="message_error"></label>
                                        <section id="editor">
                                            <textarea id="message" name="message" class="form-control" onBlur="messageCheck(this.value)"></textarea>
                                        </section>
                                    </div>
								</div>
                                <div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
												<input type="submit" id="submit-visit" name="submit" value="Submit" class="btn btn-primary pull-center">								
									
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
                            </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>
</html>

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
