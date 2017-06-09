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

	<title>Close Account</title>
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php include('../include/script.php');  ?>

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
											<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Client/change-password.php">Change Password</a></li>
											<li class="page_item page-item-658"><a href="#">My Finances</a></li>
											<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
											<li class="page_item page-item-559 current_page_item"><a href="<?php echo WebUrl;?>Client/close-account.php">Close Account</a></li>
										</ul>
										<div class="side-navigation-mobile">
											<a href="#" class="current-page">Select</a>
											<ul>
												<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
												<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Client/change-password.php">Change Password</a></li>
												<li class="page_item page-item-658"><a href="#">My Finances</a></li>
												<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
												<li class="page_item page-item-559 current_page_item"><a href="<?php echo WebUrl;?>Client/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>Close Account</span>
                                     </h3>
									
									<div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form id="contact-form" class="contact-form field-icons-no" method="post">
                                          
										<div class="row-fluid">	
                                            <div class="span12">
                                                <div class="control-wrap">
                                                    <span class="icon"><i class="fa fa-chain"></i></span>
                                                    
                                                    <label><strong>Select appropriate reasons for closing your account. Its really sad for us.</strong></label><br />
                                                    <input type="radio" name="reason" value="I dont like this site."> I dont like this site. <br />
                                                    <input type="radio" name="reason" value="I dont like this site."> I dont like this site. <br />
                                                    <input type="radio" name="reason" value="I dont like this site."> I dont like this site. <br />
                                                    <input type="radio" name="reason" value="I dont like this site."> I dont like this site. <br />
                                                    <input type="radio" name="reason" value="I dont like this site."> I dont like this site. <br /><br />
                                                    
                                                    <textarea name="reason" id="reason"  style="width:100%;" placeholder="Other Reason" rows="5"></textarea>
                                                    <div style="color:RED;" id="reason_error" class="error"></div>
                                                </div>
                                            </div>
                                        </div>
											
										<div class="row-fluid">	
                                            <div class="span10">
                                                <!--<input type="submit" id="submit_contact" class="main-button" value="Close Account">-->
                                                <button class="button default-button button_default btn btn-primary btn-lg" id="closeAccount" data-target="#myModal" data-toggle="modal" >Close Now</button>
                                                
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
        
        <!--============= popup Start=============-->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                        <h4 class="modal-title" id="myModalLabel">Password Check</h4>
                    </div>
            
                    
                    <div class="modal-body test">
                        <div id="msg" class="message"></div>
                        <form method="post" action="" onSubmit="return passswordValidation(this);">
                        
                            <input name="password" id="password" type="password"  onBlur="passwordCheck(this.value)"  class="username" style="width:100%"  placeholder="Enter Password"/>
                        
                            <div style="color:RED;" id="password_error" class="error"></div><br>
                        
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload();">Close</button>
                        
                            <input type="submit" name="submit" value="Submit" id="submit_contact">
                            </div>
                        </form>  
                    </div> 
                </div>
            </div>
        </div>
            
        <!--=========== End Popup ===========-->

	
   <?php include "../include/footer.php"; ?>
   
   <?php
		$getpasssword=mysql_fetch_array(mysql_query("select password from register where unique_code='".$_SESSION['id']."'"));
	?>
	</body>
<script>
function passwordCheck(value)
{
	var userpass='<?php echo @$getpasssword['password'];?>';
	if(value=='')
	{
		document.getElementById("password_error").innerHTML="Please Enter Your Password";
		return false;
	}
	else if(value != userpass)
	{
		document.getElementById("password_error").innerHTML="Your Password is incorrect";
		return false;
	}
	else
	{
		document.getElementById("password_error01").innerHTML="";
		return true;
	}
	
}

$("#submit_contact").click(function(e) {

	/*var reason=$('input[name=reason]:checked').val();
	
	if(reason == '' || reason==null)
	{
		document.getElementById("reason_error").innerHTML="Please Select Any One Reason";
		return false;
	}*/
	
	var userpass='<?php echo @$getpasssword['password'];?>';
	
	var password=$("#password").val();
	
	
		
	if(password=='')
	{
		document.getElementById("password_error").innerHTML="Please Enter Your Password";
		return false;
	}
	else if(password != userpass)
	{
		document.getElementById("password_error").innerHTML="Your Password is incorrect";
		return false;
	}
	else
	{
		var del='0';
		var reason=$("#reason").val();

		$.ajax({
			type:'POST',
			url:'close-account-action.php',
			data:{del:del,reason:reason},
			success:function(msg){
			//alert(msg);
				if(msg==1)
				{
					$("#msg").html("<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>Your Account Close Successfully</div>");
					setTimeout(clear,3000)
				}
				if(msg==0)
				{
					$("#msg").html("<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>Unable to Delete!!! Please Try Again</div>");
				}
				location.reload;
			}
		});
		
		document.getElementById("reason_error").innerHTML="";
		return true;
	}
});

function clear()
{
	window.location.href="../index.php";
}
</script>

</html>