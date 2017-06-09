 <?php
	include "../Admin/MyInclude/MyConfig.php";
	include "../MailConfig.php";
    ?>
<?php
 if(isset($_POST['submit']))
 {
	 extract($_POST);
	 
	//~ $exp=explode(",",Get_Date_Difference($experience,time()));
 	$id=$_POST['id'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	
	$profile =  $_FILES["profile_pic"]["name"];
	$target_dir = "../Profile Picture/";
	$target_file =$target_dir . basename($_FILES["profile_pic"]["name"]);
	$skill=implode(',',$_REQUEST['skills']);
	
	//echo $email;exit;
	
	
	//if($res)
	//{
		//$_SESSION['success']="Profile Data Saved";
	$to       = $email;
    //$to= 'kanugreencubes@gmail.com';
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
                          <span class="il">Welcome</span> to Webzira !<br><br>
							
                          Please click on the below link or copy paste link in the browser to activate your account. Link will get expired in 24 hours. <br /><br />
						  
						 <a href="'. WebUrl.'Register/activate.php?key='.$id.'">href="'. WebUrl.'Register/activate.php?key='.$id.'"</a><br /><br />
							
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
  		$send=email("Freelancer",$to,$msg,$subject,"No");
        if($send=="")
        {
			move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
			
			$insert = "insert into register set
						first_name = '".$_POST['fname']."',
						last_name = '".$_POST['lname']."',
						email = '".$_POST['email']."',
						username = '".$_POST['username']."',
						password = '".$_POST['Password']."',
						country = '".$country."',
						city = '".$city."',
						hire = '".$_POST['terms']."',
						unique_code = '".$_POST['id']."',
						register_date = CURDATE(),
						status = 'pending',
						profile_picture='".$profile."',
						profile_title='".$_REQUEST['profile_title']."',
						description='".mysql_real_escape_string($_REQUEST['shortdescr'])."',
						company='".$_REQUEST['company']."',
						company_serial_num='".$_REQUEST['serial_number']."',
						experience='".$experience."',
						skills='".$skill."',
						company_type='".$_REQUEST['type']."'
					   ";
				

			/*$update="update register set email='".$Email."',
								 profile_picture='".$profile."',
								 profile_title='".$_REQUEST['profile_title']."',
								 description='".mysql_real_escape_string($_REQUEST['shortdescr'])."',
								 company='".$_REQUEST['company']."',
								 company_serial_num='".$_REQUEST['serial_number']."',
								 skills='".$skill."',
								 company_type='".$_REQUEST['type']."'
								 where unique_code='".$id."'";*/
								 
			$res=mysql_query($insert);
			if($res)
			{
			//$_SESSION['id']=$id;
			//$_SESSION['user']=$_POST['user'];
								
			
			
            $_SESSION['success']="Congratulation! We have sent activation link to your mail";
?>

                    <script type="text/javascript">
                         window.location.href="../Login/login.php";
                    </script>
                    
<?php
			}
			else
			{
				$_SESSION['error']="Data not saved please try again";
				?>
                
                    <script type="text/javascript">
                         //~ window.location.href="register-step2-developers.php";
                    </script>
                <?php
			}
				
        }
        else
        {
            $_SESSION['error']="Mail is not sent,please enter correct mail address";
?>
                    <script type="text/javascript">
                       //window.location.href="register-step2-developers.php";
					   window.location.href="register.php";
                    </script>

<?php    
        }
 }
?>
