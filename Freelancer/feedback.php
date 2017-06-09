<?php include( 'Admin/MyInclude/MyConfig.php'); ?>

<?php
	if(isset($_POST['submit']))
	{
		$first_name	=	$_POST['first_name'];
		$last_name	=	$_POST['last_name'];
		$email		=	$_POST['email'];
		$feedback	=	$_POST['feedback'];
		
		$image=$_FILES['file']['name'];
		$target_dir ="images/feedback/";
		$target_file =$target_dir . basename($_FILES["file"]["name"]);
		
		$insert=mysql_query("insert into feedback (first_name,last_name,email,image,feedback,date) values ('".$first_name."','".$last_name."','".$email."','".$image."','".$feedback."',now())");
		
		if($insert)
		{
			move_uploaded_file($_FILES['file']['tmp_name'],$target_file);
			$_SESSION['success'] = "Feedback Submit Successfully";
		}
		else
		{
			$_SESSION['error'] = "Error in Submit your feedback! Please Try again";
		}
	}
?>

<!doctype html>
<html lang="en-US">

<head>
    <!-- Meta Tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Freelance Website</title>
    <?php //include( '../include/validation.php'); ?>
    <?php include( 'include/script.php'); ?>
    
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script type="text/javascript">
	
		function fnameCheck(value)
		{
			var regex=/^[A-Za-z ]+$/;
			if(value=='')
			{
				document.getElementById("first_name_error").innerHTML="This Field is Required.";
				return false;
			}
			else if(!regex.test(value))
			{
				document.getElementById("first_name_error").innerHTML="Please enter only letters.";
				return false;
			}
			else if(value.length < 2 || value.length > 30)
			{
				document.getElementById("first_name_error").innerHTML="Firstname between 2 to 30 characters long.";
				return false;
			}
			else
			{
				document.getElementById("first_name_error").innerHTML="";
				return true;
			}
		}
		
		function lnameCheck(value)
		{
			var regex=/^[A-Za-z ]+$/;
			if(value=='')
			{
				document.getElementById("last_name_error").innerHTML="This Field is Required.";
				return false;
			}
			else if(!regex.test(value))
			{
				document.getElementById("last_name_error").innerHTML="Please enter only letters.";
				return false;
			}
			else if(value.length < 2 || value.length > 30)
			{
				document.getElementById("last_name_error").innerHTML="Last Name between 2 to 30 characters long.";
				return false;
			}
			else
			{
				document.getElementById("last_name_error").innerHTML="";
				return true;
			}
		}
		
		function emailCheck(email)
		{
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
			if (email == ''){
				
				document.getElementById("email_error").className = "error";
				document.getElementById("email_error").innerHTML = ' This field is required.';
				return false;
			}
			else if(!regex.test(email)){
			
				document.getElementById("email_error").innerHTML = 'Please Enter Valid Email id.';
				return false;		
			}
			else
			{
				document.getElementById("email_error").innerHTML = '';
				return true;
			}
		}
        function fileCheck(value) {

            if (typeof FileReader !== "undefined") {
                var limit = 10485760;
                //var limit=620544;
                var size = document.getElementById('file').files[0].size;
            }

            var allowedFiles = [".jpg", ".jpeg", ".png", ".gif"];
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");

            if (size > limit) {
                document.getElementById("file_error").innerHTML = 'Max fileupload size is 10mb';
                flag = 0;
                return false;
            } else if (!regex.test(value.toLowerCase())) {
                document.getElementById("file_error").innerHTML = 'Invalide file!';
                flag = 0;
                return false;
            } else {
                document.getElementById("file_error").innerHTML = '';
                flag = 1;
                return true;
            }

        }

        function feedbackCheck(value) {

            if (value == '') 
			{
				document.getElementById("feedback_error").innerHTML = ' This field is required.';
                return false;
            }
			else if(value.length < 2 || value.length > 1000)
			{
				document.getElementById("feedback_error").innerHTML = ' Message between 5 to 5000 characters long.';
                return false;
			}
			else 
			{
                document.getElementById("feedback_error").innerHTML = '';
                return true;
            }
        }
		
		function captchaCheck()
		{
			var flag;
			var captcha_response = grecaptcha.getResponse();
			if(captcha_response.length == 0)
			{
				document.getElementById("captcha_error").innerHTML="Please Select the Captcha";
				flags=0;
				return false;
			}
			else
			{
				document.getElementById("captcha_error").innerHTML="";
				flags=1;
				return true;
			}	
		}

        function feedbackValidation()
		{
			var a = fnameCheck(document.getElementById("first_name").value);	
			var b = lnameCheck(document.getElementById("last_name").value);
            var c = emailCheck(document.getElementById("email").value);
            var d = feedbackCheck(document.getElementById("feedback").value);
			var e = captchaCheck();
            
			if(!a)
			{
				document.getElementById("first_name").focus();
			}
			else if(!b)
			{
				document.getElementById("last_name").focus();
			}
			else if(!c)
			{
				document.getElementById("email").focus();
			}
			else if(!d)
			{
				document.getElementById("feedback").focus();
			}
			else if(flag==0)
			{
				document.getElementById("file").focus();
			}
			
            if ( a && b && c && d && e && flag == 1 && flags==1)
			{
                return true;
            }
			else
			{
                return false;
            }
        }
    </script>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

    <?php include "include/header.php"; ?>

    <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar2 titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes"></section>
    <!--End Header -->

    <section id="section_154374867" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:90px;padding-bottom:50px;background-color:#ffffff;" data-video-ratio="" data-parallax-speed="1">
        <div class="section-overlay" style=""> </div>
        <div class="container section-content">
            <div class="row-fluid">
                <div class="row-fluid equal-cheight-no element-padding-medium element-vpadding-medium">
                    <div class="section-column span12">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div class="row-fluid element-padding-medium element-vpadding-default ">
                            	<div class="section-column span2"></div>
                                <div class="section-column span8">
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">

                                        <h3 class="title textcenter style1 bw-defaultpx dh-defaultpx divider-primary bc-default dw-default color-default" style="margin-bottom:45px"><span>Give Your Valuable Feedback</span>
                               			</h3>
                                       <hr />

                                        <form id="contact-form" class="test" method="post" onSubmit="return feedbackValidation(this);" action="" enctype="multipart/form-data">

                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <?php if(isset($_SESSION[ 'success']))
														{ 
															echo "<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      						<strong></strong> ".$_SESSION[ 'success']. "
  								 							</div>"; unset($_SESSION[ 'success']); 
														}
														?>
                                                        <?php if(isset($_SESSION[ 'error']))
														{
															echo "<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
															<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      						<strong></strong> ".$_SESSION[ 'error']. "
  								 							</div>"; unset($_SESSION[ 'error']); 
														}
														?>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="row-fluid">
                                                <div class="span6">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                        <label><strong>First Name:</strong>
                                                        </label>
                                                        <input name="first_name" id="first_name" type="text" onBlur="fnameCheck(this.value);" class="name" placeholder="Enter Your First Name" />
                                                        <div style="color:RED;" id="first_name_error" class="error"></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="span6">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                        <label><strong>Last Name:</strong>
                                                        </label>
                                                        <input name="last_name" id="last_name" type="text" onBlur="lnameCheck(this.value);" class="name" placeholder="Enter Your Last Name" />
                                                        <div style="color:RED;" id="last_name_error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Email:</strong>
                                                        </label>
                                                        <input name="email" id="email" onBlur="emailCheck(this.value);" type="text" class="email" placeholder="Enter Your Email" />
                                                        <div style="color:RED;" id="email_error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Picture:</strong>
                                                        </label>
                                                        <br />
                                                        <input type="file" name="file" id="file" onBlur="fileCheck(this.value);">
                                                        <div style="color:RED;" id="file_error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>

                                            

                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                        <label><strong>Your Feedback:</strong>
                                                        </label>
                                                        <textarea name="feedback" id="feedback" onBlur="feedbackCheck(this.value);" style="width:100%;" placeholder="Enter Your Feedback" rows="8"></textarea>
                                                        <div style="color:RED;" id="feedback_error" class="error"></div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <div class="g-recaptcha" data-sitekey="6LcHVRsTAAAAAGnSc98wyhQ2Nsv8hI3ZEaqpLeMS"></div>
                                                    <div style="color:RED;" id="captcha_error" class="error"></div>
                                                </div>
                                            </div>
                                                
                                            <div class="row-fluid">
                                                <div class="span12">
                                                    <input type="submit" name="submit" id="feedback_submit" class="main-button" value="Send">
                                                    <div id="msg" class="message"></div>
                                                </div>
                                            </div>
	                                    </form>
    	                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include "include/footer.php"; ?>

    <!-- End footer -->
</body>

</html>