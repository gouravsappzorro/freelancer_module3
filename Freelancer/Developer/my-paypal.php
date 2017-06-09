<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php');
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
	<?php //include('../include/validation.php'); ?>
	<script>
	
function blankCheck(email){
	
	if (email == ''){
			
			document.getElementById("paypal_acc_err").className = "error";
			document.getElementById("paypal_acc_err").innerHTML = ' This field is required.';
			return false;
	}
	/*else if(email!="")
	{
		$.ajax({
			type: "POST",
			url: "verify_paypal_email.php",
			data:{email:email},
			cache: false,
			success: function(msg)
			{
				//alert(msg);
				if(msg==1)
			 	{
					document.getElementById("paypal_acc_err").className = "error";
					document.getElementById("paypal_acc_err").innerHTML = 'This account is already exist';
					document.getElementById("paypal_acc_err").value=1;
					return false;
				}
				else
				{
					document.getElementById("paypal_acc_err").innerHTML = '';
					document.getElementById("paypal_acc_err").value=0;
					return true;
				}	
			} 
		});
		if(document.getElementById("paypal_acc_err").value==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}*/
	else
	{
		document.getElementById("paypal_acc_err").innerHTML = '';
		return true;		
	}
}

function paypalValidation()
{
	if(blankCheck(document.getElementById("paypalEmail").value))
	{
		return true;
	}
	else
	{
		return false;
	}
}
$(document).ready(function(e) {
	$("#load_data").hide();
	$(document).ajaxStart(function() {
    	$("#load_data").show();
	});
});
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
                               
							   <div id="sidebar" class="span3 sidebar sidebar-left" style="">
									<div class="inner-content">
										<ul class="side-navigation">
											<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
											<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
											<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
											<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                            <li class="page_item page-item-553 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
											<li class="page_item page-item-658"><a href="my-finances.html">My Finances</a></li>
											<li class="page_item page-item-562"><a href="my-transactions.html">My Transactions</a></li>
											<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
										</ul>
										<div class="side-navigation-mobile">
											<a href="#" class="current-page">Select</a>
											<ul>
												<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
												<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
												<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
												<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
												<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                                <li class="page_item page-item-553 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
												<li class="page_item page-item-658"><a href="my-finances.html">My Finances</a></li>
												<li class="page_item page-item-562"><a href="my-transactions.html">My Transactions</a></li>
												<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>Paypal Account</span>
                                        </h3>
									
									<div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form id="myForm" class="test" onSubmit="return paypalValidation();" method="post" action="AddPaypalAccount.php">
                                          
											
											<div class="row-fluid">	
											
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
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
												<div class="span2"></div>
											</div> 
											<?php
											$sql=mysql_query("select paypal_Account from register where unique_code='".$_SESSION['id']."'");
											$row=mysql_fetch_array($sql);
											?>
											<div class="row-fluid">	
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<input name="paypalEmail" style="width:100%;" id="paypalEmail" onBlur="blankCheck(this.value);" type="email" class="text" placeholder="Paypal Account" value="<?php echo $row['paypal_Account'];?>"/>
														<input type="hidden" name="paypal_acc_err" value"">
														<div style="color:RED;" id="paypal_acc_err" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
                                            <div class="row-fluid">	
												
                                                <div class="span10">
<!--<button class="button btn btn-warning btn-lg" id="create">Save  <i class="fa fa-spinner fa-pulse" id="load_data"></i></button>
-->
                                                    <input type="submit" name="add_paypal" id="add_paypal" class="main-button" value="Save">
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
   </div>

   <?php include "../include/footer.php"; ?>
	<!-- End footer -->
	</body>
</html>
