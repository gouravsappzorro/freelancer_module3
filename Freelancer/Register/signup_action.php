<?php
include "../Admin/MyInclude/MyConfig.php";
include "../MailConfig.php";

if(isset($_REQUEST['signup']))
{
	extract($_POST);
	$activation = md5(uniqid(rand(), true));
	$username=$_REQUEST['username'];
	$Password=$_REQUEST['password'];
	$Email=$_REQUEST['email'];
	$fname=$_REQUEST['fname'];
	
	// if(@$hire=='Work')
	// {
	// $country=implode(",", $_REQUEST['country']);
	// $city=implode(",", $_REQUEST['city']);
	// }
	// else
	// {
	// $country=$_REQUEST['country'];
	// $city=$_REQUEST['city'];
	// }


//echo $_POST['captcha'];
//if(($_POST['captcha']==$_SESSION['vercode']))
//{
?>

<form name="myform" method="post" action="../Developer/register-step2-developers.php" id="profile">
    <input type="hidden" name="id" value="<?PHP echo $activation; ?>" />
    <input type="hidden" name="terms" value="<?PHP echo $_REQUEST['terms']; ?>" />
    <input type="hidden" name="username" value="<?php echo $_REQUEST['username'];?>" />
    <input type="hidden" name="Password" value="<?php echo $Password;?>" />
    <input type="hidden" name="email" value="<?PHP echo $Email; ?>" />
    <input type="hidden" name="fname" value="<?php echo $fname;?>" />
    <input type="hidden" name="lname" value="<?php echo $_REQUEST['lname'];?>" />
    <input type="hidden" name="country" value="<?php echo $country;?>" />
    <input type="hidden" name="city" value="<?php echo $city;?>" />
</form>

<?php

//if($res)
	//{
	if($_REQUEST['terms']=="Work")
	{
		
		/*$sql="INSERT INTO register(`id`, `first_name`, `last_name`,`email`,`username`,`password`,`country`, `city`, `hire`,`unique_code`,`register_date`,`status`) VALUES (NULL, '".$_REQUEST['fname']."', '".$_REQUEST['lname']."','".$_REQUEST['email']."','".$_REQUEST['username']."','".$_REQUEST['password']."','".country($country)."', '".$_REQUEST['city']."', '".$_REQUEST['terms']."','".$activation."',CURDATE(),'pending')";
		
		$res=mysql_query($sql);
		
		if($res)
		{*/
			?>
			<script type="text/javascript">
				//window.location.href="../Developer/register-step2-developers.php";
				document.myform.submit();
			</script>
			<?php
		/*}
		else
		{
			$_SESSION['error']="Data not saved please try again";
			?>
            <script type="text/javascript">
            	window.location.href="register.php";
            </script>
		<?php                   
		}*/
	}
	else
	{				
		$_SESSION['user1']=$_REQUEST['terms'];		
		
		extract($_POST);	 
		$to       = $Email;
		$subject  = "Activation Link";
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
                          <span class="il">Welcome</span> to Freelancing Website !<br><br>
							
                          Please click on the below link or copy paste link in the browser to activate your account. Link will get expired in 24 hours. <br /><br />
						  
						 <a href="'. WebUrl.'Register/activate.php?key='.$activation.'">href="'. WebUrl.'Register/activate.php?key='.$activation.'"</a><br /><br />
							
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
 //echo $msg;
   $send=email("Webzira.com",$to,$msg,$subject,"No");

		if($send=='')
        {
        	$sql="INSERT INTO register(`id`, `first_name`, `last_name`, `email`, `username`, `password`, `country`, `city`, `hire`,`unique_code`,`register_date`,`status`) VALUES (NULL, '".$_REQUEST['fname']."', '".$_REQUEST['lname']."', '".$_REQUEST['email']."', '".$_REQUEST['username']."', '".$_REQUEST['password']."','".$country."', '".$city."', '".$_REQUEST['terms']."','".$activation."',CURDATE(),'pending')";
		
		
			$res=mysql_query($sql);
			//$_SESSION['id']=$activation;
			 //$_SESSION['user']=$_REQUEST['terms'];
			$_SESSION['success']="Congratulation! We have sent activation link to your mail";
			?>
            <script type="text/javascript">
	            //window.location.href="../Client/post-project.php";
				window.location.href="../Login/login.php";
			</script>
                   
			<?php
        }
        else
        {
            $_SESSION['error']="Mail is not sent,please enter Correct mail address";
			?>
            <script type="text/javascript">
            	window.location.href="register.php";
            </script>
		<?php    
        }
	}
}
?>