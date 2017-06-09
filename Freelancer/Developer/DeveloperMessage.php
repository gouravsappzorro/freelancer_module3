<?php include('../Admin/MyInclude/MyConfig.php');?>
<?php include "../MailConfig.php"; showcurrenttime();?>

<?php

if (!isset($_SESSION['user']) || $_SESSION['user']!='Work') {
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

<style>
.text-widget p {
    font-family: Open Sans;
    font-size: 16px;
    font-weight: 300;
    font-weight: 500;
    color: #000000;
}
.gray-btn{ font-size: 15px;}
.yellow-btn { font-size: 13px;}
.gray-btn:hover{
    background: #E1E1E1;
    color: #000;
    font-size: 15px;
}
.attachment{
    width: 35px;
    background: transparent;
    border: 2;
    height: 35px;
    margin-left: -11px;
    margin-right: 5px;
    border-radius: 50%;
    /* margin: 0; */
    padding: 0;
    outline: 0;
    cursor:pointer;
}
.button{
  margin:0px;
  font-size: 15px;
  background-color: #018bc8;
  color: white;
  width:90px;
  height:40px;
  border-radius:30px;
  outline: 0;
}
.button:hover{
  background-color: white;
  font-weight: normal;
  color: #018bc8;
  
  border: 2px solid #018bc8;
  border-color: #018bc8;
  border-radius: 50px;
  margin:0px;
  width:90px;
  height:40px;
}
</style>
<script>

function updatenotification(project_id){

$.ajax({

		type:"POST",
		url:"notification.php",
		data:"project_id="+project_id,
		success:function(msg){
		
		}
});

}
updatenotification('<?php echo $_GET['project_id']; ?>');


function Uploadfile(){
	$("#Files").trigger('click');
}

</script>
<script type="text/javascript" src="DeveloperMessageValid.js"></script>

 
</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?> 
<!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
<?php
	$row=mysql_fetch_array(mysql_query("select project_id,title from post_projects where project_id='".$_GET['project_id']."'"));

?>
<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px; line-height:30px;"><?php echo $row['title'];?></h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>
                            </div>
                        </div>
                        <div id="breadcrumbs">
                            <span class="breadcrumb-title"><?php echo "Project ID:".$row['project_id'];?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<?php 

   $project_details=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$_GET['project_id']."'"));
   
   $Developer_Details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));

	$Client_Details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$project_details['uid']."'"));
?>

<?php 
$count=0;
if(isset($_POST['project_id']))
{
	$limit=10485760;
	$ext=strrchr($_FILES['Files']['name'],".");
	if($_FILES['Files']['size'] > $limit){
		$error="Max fileupload size is 10mb";
		$count++;
		echo $count;
	}
	elseif($ext!=".bmp" && $ext!=".jpg" && $ext!=".jpeg" && $ext!=".png" && $ext!=".gif" && $ext!=".doc" && $ext!=".docx" && $ext!=".zip" && $ext!=".xsl" && $ext!=".xslx" && $ext!=".pdf") 
	{
		$error="Invalid file";
		$count++;
	}
}
?>
<?php
if(isset($_POST['project_id']) && $count==0)
{
	$Files=$_FILES['Files']['name'];
	$Files_Type=$_FILES['Files']['type'];
	$developer_id=$_POST['developer_id'];
	$client_id=$_POST['client_id'];
	$project_id=$_POST['project_id'];
	//date_default_timezone_set('Asia/Kolkata');

	$Total_Files=count($Files);
	//$Files=implode(',',$Files);
	$Files_Type_Total=count($Files_Type);
	//$Date=date('Y-m-d');
	//$Time=date('h:i A');
	
	
	
 
	$Message_Data=mysql_query("INSERT INTO message(developer_id,client_id,project_id,Sender_Id,Files,ReadStatus,Date)values('".$developer_id."','".$client_id."','".$project_id."','".$developer_id."','".$Files."','1','".showcurrenttime()."')");
  
	
    	$Tmp_Name=$_FILES['Files']['tmp_name'];
	    $File_Name=$_FILES['Files']['name'];
    	move_uploaded_file($Tmp_Name,'../images/attachment/'.$File_Name);

  
	if($Message_Data){
      
		$to       = $Client_Details['email'];
		$subject  = $Client_Details['first_name'].' '.$Client_Details['last_name'].", you have received a message from ".$Developer_Details['first_name'].' '.$Developer_Details['last_name'];
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
						Hi,'.$Client_Details['first_name']." ".$Client_Details['last_name'].'!
										</td>
									</tr>
									<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$Client_Details['username'].'\'</td>
						</tr>
									<tr>
										<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
										<span class="il">Welcome</span> to Webzira !<br><br>
					  
					   You have received new message from <strong>'.$Developer_Details['first_name'].' '.$Developer_Details['last_name'].'</strong>. 
									
						<br /><br>
						
						<a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'Client/ClientMessage.php?project_id='.$_GET['project_id'].'&code='.$Developer_Details['unique_code'].'" >View Message</a>
						
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
		
		echo '<script> window.location.href="";</script>';
	}
}

?>

<!-- content-Section -->
<div class="content-section">
	<div class="container">
    	<div class="row">
			<div class="col-md-4 page-content"></div>
                
    		<div class="col-md-12" style="background-color: #fff;">
         
			  
			<br/>

			<div class="theme_box">
				<div class="col-md-10"><h2>Messages Management</h2></div>
				<div class="col-md-2">
                
                <?php if(isset($_GET['var']) && $_GET['var']==1){?>
                
					<a href="<?php echo WebUrl;?>Developer/message.php"><button name="Update" class="btn yellow-btn " type="button" style="margin:0px; float:right; width:auto" ><strong><i class="fa fa-arrow-left"></i> Back</strong></button></a>
                   
                <?php } if(isset($_GET['var']) && $_GET['var']=='2'){ ?>
                
                	<a href="<?php echo WebUrl;?>myprojects-open-projects-developer.php"><button name="Update" class="btn yellow-btn " type="button" style="margin:0px; float:right; width:auto" ><strong><i class="fa fa-arrow-left"></i> Back</strong></button></a>
                
                   
				<?php }if(!isset($_GET['var'])) {?>
                
                	<a href="<?php echo WebUrl;?>bidding.php?project_id=<?php echo $_GET['project_id'];?>"><button name="Update" class="btn yellow-btn " type="button" style="margin:0px; float:right; width:auto" ><strong><i class="fa fa-arrow-left"></i> Back</strong></button></a>
                
                <?php }?>
                
				</div>
     		</div>
  			
            <div class="theme_box" style="margin-bottom:20px;">
                <div class="row">
                    <div class="col-md-5">
                        <img title="<?php echo $Developer_Details['first_name'].' '.$Developer_Details['last_name']; ?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Developer_Details['profile_picture']?>" width="40" height="40" style=" border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'">
                        
                        <?php echo $Developer_Details['first_name'].' '.$Developer_Details['last_name']; ?>
                        <span style="margin-left:15%;"><?php echo 'User Name : '.$Developer_Details['username'];?></span>
                        <p><strong>SENDER</strong></p>
                        
                    </div>
                    <div class="col-md-2">
                        <span style=" font-size:36px"> >> </span>
                    </div>
                    <div class="col-md-5">
                        <img title="<?php echo $Client_Details['first_name'].' '.$Client_Details['last_name']; ?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Client_Details['profile_picture']; ?>" width="40" height="40" style=" border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'">
                        
                        <?php echo $Client_Details['first_name'].' '.$Client_Details['last_name']; ?>
                        <span style="margin-left:15%;"><?php echo 'User Name : '.$Client_Details['username'];?></span>
                        <p><strong>RECEIVER</strong></p>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <hr style="border-top: 2px solid #eee;">
            </div>
			
            <div class="theme_box">
			<div class="row">
				<div class="col-md-12">
                
					<div id="message_box">
                    	<div class="message_box" id="cover">
						<?php $Message_details=mysql_query("select * from message where project_id='".$_GET['project_id']."' and developer_id='$_SESSION[id]'");           
			            $Total=mysql_num_rows($Message_details);
              
						if($Total==0)
              			{
                  			echo '<div class="alert alert-info"><strong>Info!</strong> You Have no any messages yet.</div>';
						}
              			else
              			{ 
              				while($Message_Data=mysql_fetch_array($Message_details))
              				{ 
              						
								if($Message_Data['Sender_Id']==$Message_Data['developer_id'])
								{
					                if($Message_Data['Message']!='')
                					{
           							?>
										<div class="clear_row" style="clear:both">
											<div class="col-md-1 message_sender"><img title="<?php echo $Developer_Details['first_name'].' '.$Developer_Details['last_name'];?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Developer_Details['profile_picture']; ?>" width="40" height="40" style=" float:right;border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'"></div>
                        					<div class="col-md-10 message_sender_box"><?php echo nl2br($Message_Data['Message']); ?></div>
											<div class="col-md-1 sender_time">
											<?php
											   $time=explode(' ',$Message_Data['Date']);
											   echo substr($time[1], 0, -3);
											?>
                                            </div>
                      					</div>
            						<?php 
									}
                					else if($Message_Data['Files']!='')
                					{
                  						?>
										<div class="clear_row" style="clear:both"><div class="col-md-1 message_sender"><img title="<?php echo $Developer_Details['first_name'].' '.$Developer_Details['last_name']; ?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Developer_Details['profile_picture']?>" width="40" height="40" style=" float:right;border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'"></div>
                        				<div class="col-md-10 message_sender_box">
                                        
										<?php
                    					$Files=explode(',',$Message_Data['Files']);
                    					$FIles_Total=count($Files);
                    
                    					for($j=0;$j<$FIles_Total;$j++)
                    					{
                    					?>  
                   							<a href="<?php echo WebUrl;?>images/attachment/<?php echo $Files[$j]; ?>" style="color:#000000; font-size:15px;" target="_blank"><img src="<?php echo WebUrl;?>images/Attachment.png" width="30" height="30"><?php echo $Files[$j]; ?></a>
                  						<?php
                    					}
                    					?>
										</div>
                                        <div class="col-md-1 sender_time">
                                        <?php
										   $time=explode(' ',$Message_Data['Date']);
										   echo substr($time[1], 0, -3);
										?>
                                        </div></div>
                                        <?php
                
									}
								}
                				else
                				{
									if($Message_Data['Message']!='')
              						{ ?>
               							<div class="row clear_row">
                        					<div class="col-md-2 message_reciver"><img title="<?php echo $Client_Details['first_name'].' '.$Client_Details['last_name']; ?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Client_Details['profile_picture']; ?>" width="40" height="40" style=" float:right;border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'"></div>
                        					<div class="col-md-9 message_reciver_box"><?php echo nl2br($Message_Data['Message']); ?></div>
											<div class="col-md-1 reciver_time">
											<?php
											   $time=explode(' ',$Message_Data['Date']);
											   echo substr($time[1], 0, -3);
											?>
                                            </div>
                      					</div>
            						<?php 
                					}
                					else if($Message_Data['Files']!='')
                					{
										$Files=explode(',',$Message_Data['Files']);
										$FIles_Total=count($Files);
										?>

                						<div class="row clear_row"><div class="col-md-2 message_reciver"><img title="<?php echo $Client_Details['first_name'].' '.$Client_Details['last_name']; ?>" src="<?php echo WebUrl;?>Profile Picture/<?php echo $Client_Details['profile_picture'];?>" width="40" height="40" style=" float:right;border-radius: 50%;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'"></div>
                  						<div class="col-md-9 message_reciver_box">
                                        
                                        <?php
                    
                    					for($j=0;$j<$FIles_Total;$j++)
                    					{
                    					?>  
                  
				  							<a href="<?php echo WebUrl;?>images/attachment/<?php echo $Files[$j]; ?>" style="color:#000000; font-size:15px;" target="_blank" download><img src="<?php echo WebUrl;?>images/Attachment.png" width="30" height="30"><?php echo $Files[$j]; ?></a>
				    
                  						<?php   
                    					}
                    					?>
										</div>
                                        <div class="col-md-1 reciver_time">
                                        <?php
										   $time=explode(' ',$Message_Data['Date']);
										   echo substr($time[1], 0, -3);
										?>
                                        </div></div>
                                        <?php
                
									}
								}
							}
						}
           				?>  
						</div>
					</div>
                                     
          			<div style="display:none" id="file_upload">
          				<form action="" method="post" id="imageupload" enctype="multipart/form-data" >
          
            				<input type="file" name="Files" id="Files" onChange="javascript:this.form.submit();" >
					            <input type="hidden" name="developer_id"  id="developer_id" class="form-control" value="<?php echo $Developer_Details['unique_code']; ?>">
					            <input type="hidden" name="client_id"  id="client_id" class="form-control" value="<?php echo $Client_Details['unique_code']; ?>">
            
					            <input type="hidden" name="project_id"  id="project_id" class="error" value="<?php echo $_GET['project_id']; ?>"> 
            
			          </form>
		          </div>
				</div>
			</div>
        </div>
        
        <div class="row">
			<hr style="border-top: 2px solid #eee;">
		</div>
        
		<div class="row">
			<div class="col-md-11" style="margin-bottom:50px">
            	<textarea name="Message"  id="Message" class="form-control" style="height:50px !important; margin-top:5px; resize:none" placeholder="Type Your Message Here...."></textarea><br/>
            	
                <div id="Message_error" class="error"><?php if(isset($error)){ echo $error;}?></div>
            	
                <input type="hidden" name="developer_id"  id="developer_id" class="form-control" value="<?php echo $Developer_Details['unique_code']; ?>">
            	<input type="hidden" name="client_id"  id="client_id" class="form-control" value="<?php echo $Client_Details['unique_code']; ?>">
            
            	<input type="hidden" name="project_id"  id="project_id" class="error" value="<?php echo $_GET['project_id']; ?>">         
            
			</div>
                      
            <a  onClick="Uploadfile();"><img src="<?php echo WebUrl; ?>images/Attachment.png" class="attachment"   title="Attechment"></a>
            
            <img src="<?php echo WebUrl; ?>images/send.png" id="atc" class="attachment" onClick="UserMessageValidation();" style="width:50px; height:50px;line-height:50px; cursor:pointer"  title="Send">
            
		</div>
      </div>
    </div>
  </div>
</div>
<?php include('../include/footer.php'); ?>

</body>
<script>
$(document).ready(function(e) {
	
	var elem = document.getElementById('message_box');
	//var elem = document.getElementsByClassName("message_box");
	elem.scrollTop = elem.scrollHeight;

});

</script>
</html>