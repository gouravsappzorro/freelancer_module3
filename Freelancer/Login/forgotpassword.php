<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Freelance Website</title>
	<?php include('../include/script.php');  ?>
    <script>
		function emailCheck(email){
	
	if (email == ''){
			
			document.getElementById("email_error").className = "error";
			document.getElementById("email_error").innerHTML = ' This field is required.';
			return false;
	}
	
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test(email)){

		document.getElementById("email_error").innerHTML = 'Please Enter Valid Email id?';
		return false;		
	}
	else if(email!="")
	{
		
		$.ajax({
   			type: "POST",
			url: "email_check.php",
			data:{email:email},
			cache: false,
			success: function(msg)
			{
				//alert(msg);

				if(msg==1)
				{
					document.getElementById("email_error").className = "error";
					document.getElementById("email_error").innerHTML = ' Email-id does not exist.?';
					document.getElementById("email_err").value=1;
					return false;
				}
				else
				{
					
					document.getElementById("email_error").innerHTML = '';
					document.getElementById("email_err").value=0;
					return true;
					
				}	
			} 
		});
		if(document.getElementById("email_err").value==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		
		document.getElementById("email_error").innerHTML = '';
		return false;		
		
	}
	
}
function emailValidation(){
	
	
	var a = emailCheck(document.getElementById("email").value);
	
	if(a){
		return true;	
	}
	else{
		return false;	
	}
}
	</script>

</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

<?php include"../include/header.php"; ?>

    <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar2 titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
   
    </section>
    <!--End Header -->
	
	
	 <section id="section_154374867" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:90px;padding-bottom:50px;background-color:#ffffff;" data-video-ratio="" data-parallax-speed="1">
        <div class="section-overlay" style="">
        </div>
        <div class="container section-content">
            <div class="row-fluid">
                <div class="row-fluid equal-cheight-no element-padding-medium element-vpadding-medium">
                    <div class="section-column span12" style="">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div class="row-fluid element-padding-medium element-vpadding-default ">
                                 <h3 align="center" class="title default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>Forgot Password</span>
                                        </h3>
                                        <div align="center" class="hr border-small dh-2px hr-border-primary" style="margin-top:15px;margin-bottom:25px;">
                                            <span></span>
                                        </div>
								<div class="section-column span2" style="">
                                   
                                </div>
                                <div class="section-column span8" style="">
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form id="contact-form" class="test" onSubmit="return emailValidation(this);" method="post" action="forgot_pass_action.php">
                                           
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
														<div style="color:RED;" id="error" class="error">
														<?php
																if(isset($_SESSION['success']))
																{
																	echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong></strong> ".$_SESSION['success']."
  								 										</div>";
								 									unset($_SESSION['success']);
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
														</div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span><input name="email" id="email" type="text" class="email" placeholder="Your Email" onBlur="emailCheck(this.value);"/>
                                                        <div style="color:RED;" id="email_error" class="error"></div>
<input type="hidden" name="email_err" id="email_err" value="">
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
										
                                             <div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <input type="submit" name="forgot_pass" value="Send Password">
													&nbsp;&nbsp; <a href="<?php echo WebUrl; ?>Login/login.php">Back to Login</a>
                                                    <div id="msg" class="message"></div>
                                                </div>
												<div class="span2"></div>
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
	
	
	
    </div>

  <?php include "../include/footer.php"; ?>
  
	<!-- End footer -->
	</body>
	

</html>