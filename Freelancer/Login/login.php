<?php
session_start();
?>
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
	<?php //include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>
	<script>
		function blankCheck(value,id){
	
	if (value == ''){
			
			document.getElementById(id+"_error").className = "error";
			document.getElementById(id+"_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
		
	}
}
function loginValidation(){
	
	$('#gif').css('visibility', 'visible');
    return true;
	
	var a = blankCheck(document.getElementById("username").value,document.getElementById("username").id);
	var b = blankCheck(document.getElementById("password").value,document.getElementById("password").id);
	

	if(a && b ){
	
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
                                <div class="section-column span4" style="">
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                        <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>Login to Account</span>
                                        </h3>
                                        <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;">
                                            <span></span>
                                        </div>
                                        <h6 class="title textleft default bw-2px dh-2px divider-dark bc-dark dw-default color-default" style="margin-bottom:30px"><span>Some of the points will come here.Some of the points will come here<br /><br /></span>
                                        </h6>
                                        

                                        <?php
                                    //Include FB config file && User class
                                    require_once '../Register/fbConfig.php';
                                    require_once '../Register/User.php';
                                    if(!$fbUser){
                                       $fbUser = NULL;
                                       $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>WebUrl.'Login/login.php','scope'=>$fbPermissions));
                                       $output = '<a href="'.$loginURL.'"><img src="../images/fblogin-btn.png"></a>';   
                                    }else{
                                       //Get user profile data from facebook
                                       $fbUserProfile = $facebook->api('/me?fields=id,first_name,last_name,email,link,gender,locale,picture');
                                       
                                       //Initialize User class
                                       $user = new User();
                                       
                                       //Insert or update user data to the database
                                       $fbUserData = array(
                                          'oauth_provider'=> 'facebook',
                                          'oauth_uid'    => $fbUserProfile['id'],
                                          'first_name'   => $fbUserProfile['first_name'],
                                          'last_name'    => $fbUserProfile['last_name'],
                                          'email'     => $fbUserProfile['email'],
                                          'gender'       => $fbUserProfile['gender'],
                                          'locale'       => $fbUserProfile['locale'],
                                          'picture'      => $fbUserProfile['picture']['data']['url'],
                                          'link'         => $fbUserProfile['link'],
                                          'signup'       => 'no'
                                       );
                                       $userData = $user->checkUser($fbUserData);
                                       
                                       //Put user data into session
                                       $_SESSION['userData'] = $userData;

                                       $select_login_id=mysql_fetch_array(mysql_query("SELECT * FROM `register` where unique_code='".$fbUserProfile['id']."'"));
                                       $_SESSION['user']=$select_login_id['hire'];
                                       $_SESSION['id']=$select_login_id['unique_code'];

                                       if(isset($_SESSION['user']) && isset($_SESSION['id']) && $_SESSION['user']=='Work')
										{
									 		header("location:../Developer/dashboard.php");
										}
										else
									 	{
									 		header("location:../Client/dashboard.php");
								 		}
                                       
                                       //Render facebook profile data
                                       if(!empty($userData)){
                                          $output = '<h1>Facebook Profile Details </h1>';
                                          $output .= '<img src="'.$userData['picture'].'">';
                                            $output .= '<br/>Facebook ID : ' . $userData['oauth_uid'];
                                            $output .= '<br/>Name : ' . $userData['first_name'].' '.$userData['last_name'];
                                            $output .= '<br/>Email : ' . $userData['email'];
                                            $output .= '<br/>Gender : ' . $userData['gender'];
                                            $output .= '<br/>Locale : ' . $userData['locale'];
                                            $output .= '<br/>Logged in with : Facebook';
                                          $output .= '<br/><a href="'.$userData['link'].'" target="_blank">Click to Visit Facebook Page</a>';
                                            $output .= '<br/>Logout from <a href="logout.php">Facebook</a>'; 
                                       }else{
                                          $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
                                       }
                                    }
                                    echo $output;
                                    // echo $fbUserData['signup'];

                                    ?>

                                    </div>
                                </div>
                                <div class="section-column span8" style="">
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
<?php
	if(isset($_GET['p_id']))
	{
		$url="login_action.php?p_id=$_GET[p_id]";
	}
	else
	{
		$url="login_action.php";
	}
?>                                     
<form id="contact-form" class="test" name="login"  method="post" onSubmit="return loginValidation(this);" action="<?php echo $url;?>">
                                           
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
														<?php
																if(isset($_SESSION['msg']))
																{
																	echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong>Opps!  </strong> ".$_SESSION['msg']."
  								 										</div>";
								 									unset($_SESSION['msg']);
																}
																if(isset($_SESSION['success']))
																{
																	echo"<div class='alert alert-success fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong></strong> ".$_SESSION['success']."
  								 										</div>";
								 									unset($_SESSION['success']);
																}
																
														?>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
                                                        <input name="username" id="username" type="text"  onBlur="blankCheck(this.value,this.id);" class="name" placeholder="Your Username"/>
														<div style="color:RED;" id="username_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
                                                        <input name="password"  id="password" type="password"  onBlur="blankCheck(this.value,this.id);" style="width:100%;" placeholder="Your Password"/>
														<div style="color:RED;" id="password_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											<div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                    <div class="control-wrap">
                                                        <a id="forgot_pass" href="<?php echo WebUrl; ?>Login/forgotpassword.php">Forgot Password</a>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
												
                                             <div class="row-fluid">	
												<div class="span2"></div>
                                                <div class="span8">
                                                   
													<input id="signin" name="signin" type="submit" value="Submit">
                                                    <input type="image" src="<?php echo WebUrl;?>images/loader.gif" id="gif" style="visibility:hidden; margin-left:-8%;">
                                                    
         
        
													
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
	
	
	
    

  <?php include "../include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>
