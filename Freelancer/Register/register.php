<?php 
session_start();
include('../Admin/MyInclude/MyConfig.php'); ?>
<!doctype html>
<html lang="en-US">
   <head>
      <!-- Meta Tags -->
      <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <title>Freelance Website</title>
      <?php //include('../include/validation.php'); ?>
      <?php include('../include/script.php');  ?>
      <?php include('../include/validation.php'); ?>
      <script src="https://www.google.com/recaptcha/api.js" async defer></script>
      <script type="text/javascript">
         $(document).ready(function() {
         	$('[data-toggle="tooltip"]').tooltip();
         });
           
      </script>
      <script type="text/javascript">
         // function usertype(){
         //    var a=$('input[name=terms]:checked').val();
         //    if(a=='Hire')
         //    {
         //       $("#myid").css('display','none');
         //       $('#city0').attr('name', 'city');
         //       $('#country').attr('name', 'country');
         //    }
         //    else
         //    {
         //       $("#myid").css('display','block');
         //       $('#city0').attr('name', 'city[]');
         //       $('#country').attr('name', 'country[]');
         //    }
         // }
      </script>
      <style type="text/css">
         .modal-backdrop {
             position: relative;
             top: 0;
             right: 0;
             bottom: 0;
             left: 0;
             z-index: 100;
             background-color: #000;
             }
            #header {
                position: relative;
                width: 100%;
                overflow: visible;
                z-index: 0; 
                display: block;
            }
            #header_wrapper {
                position: relative;
                width: 100%;
                display: block;
                z-index: 4;
            }
      </style>
   </head>
   <body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">
      <?php include"../include/header.php"; ?>
      <!-- Static Page Titlebar -->
      <section id="titlebar" class="titlebar titlebar2 titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes"> 
      </section>
      <!--End Header -->
      <section id="section_154374867" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:90px;padding-bottom:50px;background-color:#ffffff;" data-video-ratio="" data-parallax-speed="1">
         <div class="section-overlay" style=""> </div>
         <div class="container section-content">
            <div class="row-fluid">
               <div class="row-fluid equal-cheight-no element-padding-medium element-vpadding-medium">
                  <div class="section-column span12" style="">
                     <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                        <div class="row-fluid element-padding-medium element-vpadding-default ">
                           <div class="section-column span4">
                              <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>Create New Account</span>
                                 </h3>
                                 <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;"> <span></span> </div>
                                 <h6 class="title textleft default bw-2px dh-2px divider-dark bc-dark dw-default color-default" style="margin-bottom:30px"><span>Some of the points will come here.Some of the points will come here<br /><br />Some of the points will come hereSome of the points will come here<br /><br />Some of the points will come hereSome of the points will come here</span>
                                 </h6>
                                 <?php
                                    //Include FB config file && User class
                                    require_once 'fbConfig.php';
                                    require_once 'User.php';
                                    if(!$fbUser){
                                       $fbUser = NULL;
                                       $loginURL = $facebook->getLoginUrl(array('redirect_uri'=>$redirectURL,'scope'=>$fbPermissions));
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
                                          'email'        => $fbUserProfile['email'],
                                          'gender'       => $fbUserProfile['gender'],
                                          'locale'       => $fbUserProfile['locale'],
                                          'picture'      => $fbUserProfile['picture']['data']['url'],
                                          'link'         => $fbUserProfile['link'],
                                          'signup'       => 'yes'
                                       );
                                       $userData = $user->checkUser($fbUserData);
                                       
                                       //Put user data into session
                                       $_SESSION['userData'] = $userData;
                                       
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

                           <!-- Modal -->
                             <div class="modal fade" id="myModal" role="dialog">
                               <div class="modal-dialog">
                               
                                 <!-- Modal content-->
                                 <div class="modal-content">
                                   <div class="modal-header">
                                     <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     <h4 class="modal-title">SELECT YOUR ROLE</h4>
                                   </div>
                                   <div class="modal-body">
                                   <?php
                                   if(isset($_POST['role']))
                                   {
                                    extract($_POST);
                                    $_SESSION['user']=$hire;
                                    $_SESSION['id']=$fbUserProfile['id'];
                                    $update_profile=mysql_query("UPDATE register set hire='".$hire."'");
                                    if($update_profile)
                                    {
                                       if($_SESSION['user']=='Work')
                                       {
                                          header("location:../Developer/dashboard.php");
                                       }
                                       else
                                       {
                                          header("location:../Client/dashboard.php");
                                       } 
                                    }
                                   }
                                   ?>
                                     <form method="post"><br />
                                        <select name="hire">
                                           <option value="Work"> I Want to Work</option>
                                           <option value="Hire"> I Want to Hire</option>
                                        </select><br />
                                        <input type="submit" name="role" value="Submit">
                                     </form>
                                   </div>
                                   <div class="modal-footer">
                                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   </div>
                                 </div>
                                 
                               </div>
                             </div>


                           <div class="section-column span8">
                              <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                 <form name="register" id="register" class="test" onSubmit="return form_validation();" method="post" action="signup_action.php">
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
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
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <input type="radio" name="terms" onBlur="termCheck()" id="terms" value="Hire"> I want to Hire &nbsp;&nbsp; 
                                             <input type="radio" name="terms" onBlur="termCheck()" id="terms" value="Work"> I want to Work &nbsp;&nbsp; 
                                             <input type="radio" name="terms" onBlur="termCheck()" id="terms" value="" checked="checked" style="display:none;">
                                             <div style="color:RED;" id="terms_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Click on I want Hire if you want to post project or click on i want to work if you want to work on project" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div>
                                    </div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-envelope-o"></i></span><input name="username" id="username" type="text" onBlur="usernameCheck(this.value)" class="username" placeholder="Your Username" /> <input type="hidden" name="username_err" id="username_err" value="">
                                             <div style="color:RED;" id="username_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter User name. It is use for login to your profile. user name should be more than 5 characters" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div>
                                       </div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span><input style="width:100%;" name="password" id="password" type="password" onBlur="passwordCheck(this.value)" placeholder="Your Password" />
                                             <div style="color:RED;" id="password_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Password.Password atleast 6 characters long and must contain 1 alphabet and one number" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div
                                    ></div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span><input style="width:100%;" name="confirmpass" id="confirmpass" type="password" onBlur="confirmpassCheck(this.value)" placeholder="Retype Your Password" />
                                             <div style="color:RED;" id="confirmpass_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Retype Your Password" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div
                                    ></div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span><input name="email" id="email" type="text" onBlur="emailCheck(this.value)" class="email" placeholder="Your Email" />
                                             <div style="color:RED;" id="email_error" class="error"></div>
                                             <input type="hidden" name="email_err" id="email_err" value=""> 
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Your valid email address.In this email We send confirmation link to varify your email" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div
                                    ></div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span4">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span><input name="fname" id="fname" type="text" onBlur="fnameCheck(this.value)" class="name" placeholder="Your First Name" />
                                             <div style="color:RED;" id="fname_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div class="span4">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span><input name="lname" id="lname" type="text" onBlur="lnameCheck(this.value)" class="name" placeholder="Your Last Name" />
                                             <div style="color:RED;" id="lname_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Your First name and Last Name. Name should be atleast 2 characters long" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div
                                    ></div>
                                    <div class="add_mobile">
                                    <a href="" class="add_field_mobile col-md-10 col-md-offset-2" id="myid" style="display: none;">+ Add More Country And City</a>
                                    <div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span> 
                                             <select class="country" name="country" id="country" onBlur="countryCheck(this.value)" onChange="cityFetch(this.value)">
                                                <option value="select">Select your country</option>
                                                <?php 
                                                   $sql="select * from location where Status='Published' order by Name";
                                                   $res=mysql_query($sql);
                                                   while($row=mysql_fetch_array($res))
                                                   {
                                                   
                                                   ?>
                                                <option value="<?php echo $row['Code']; ?>"><?php echo $row['Name']; ?></option>
                                                <?php  }?>
                                             </select>
                                             <div style="color:RED;" id="country_error" class="error"></div>
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Your Country" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div
                                    ></div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="control-wrap">
                                             <span class="icon"><i class="fa fa-chain"></i></span> 
                                             <select name="city" id="city" class="city" onBlur="cityCheck(this.value)">
                                                <option value="select">Select your city</option>
                                             </select>
                                             <div style="color:RED;" id="city_error" class="error"></div>
                                             
                                          </div>
                                       </div>
                                       <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                          <ul class="list-inline">
                                             <li> <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Your City" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a> </li>
                                          </ul>
                                       </div>
                                       </div>
                                    </div>
                                    </div>
                                    <div class="row-fluid">
                                       <div class="span2"></div>
                                       <div class="span8">
                                          <div class="g-recaptcha" data-sitekey="6Lcbch8UAAAAABGFoxDr9IX-n4ItUx4W79_9Ngin"></div>
                                          <div style="color:RED;" id="captcha_error" class="error"></div>
                                       </div>
                                    </div>
                                    <!--<div class="span2"></div>
                                       <div class="span4">
                                       <div class="control-wrap"><input type="hidden" name="captcha_err" id="captcha_err" value="">
                                       <span class="icon"><i class="fa fa-chain"></i></span><input name="captcha" id="captcha" type="text" onBlur="captchaCheck(this.value)" onKeyUp="captchaCheck(this.value)"  class="name" placeholder="Enter Captcha"/>
                                       <div style="color:RED;" id="captcha_error" class="error"></div>
                                       <div id="error_solve">
                                       
                                       </div>
                                       </div>
                                       </div>
                                       
                                       <div class="span4">
                                       <div class="control-wrap">
                                       <span class="icon"><i class="fa fa-chain"></i></span><img style="background-color:white;" id="reload" src="captcha.php"><img src="<?php echo WebUrl; ?>images/reload.png" onClick="reloadCaptcha();" style="cursor:pointer">
                                       </div>
                                       </div>-->
                              
                              <div class="row-fluid">
								  <div class="span2"></div>
								  <div class="span8">
									  <!--id="submit_contact" class="main-button"--><input class="signup" id="signup" type="submit" onClick="validation();" value="Sign Up" name="signup">
									  <div id="msg" class="message"></div>
								  </div>
								  <div class="span2"></div>
                              </div>
                              </form><input type="image" src="<?php echo WebUrl;?>images/loader.gif" id="gif" style="visibility:hidden; margin-left:-8%;">
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
      
      <script type="text/javascript">

      $(document).ready(function() {

  //-------------------------For More Phone Number-----------------------
    var max_fields      = 10; //maximum input boxes allowed
    var wrapper         = $(".add_mobile"); //Fields wrapper
    var add_button      = $(".add_field_mobile"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
             //text box increment
            $(wrapper).append("<div><a href='#' class='remove_mobile_field col-md-10 col-md-offset-2'>- Remove</a><div class='row-fluid'><div class='span2'></div><div class='span8'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><select class='country' name='country[]' id='country' onBlur='countryCheck(this.value)' onChange='cityFetch(this.value,"+x+")'><option value='select'>Select your country</option><?php $sql='select * from location where Status="Published" order by Name';
                                                   $res=mysql_query($sql);
                                                   while($row=mysql_fetch_array($res))
                                                   {
                                                   
                                                   ?><option value='<?php echo $row['Code']; ?>'><?php echo $row['Name']; ?></option><?php  }?></select><div style='color:RED;' id='country_error' class='error'></div></div></div><div style='margin: 0px 0px 0px 0px;' class='bs-example'><ul class='list-inline'><li> <a data-toggle='tooltip' data-html='true' data-placement='right' title='Select Your Country' class 'right_tooltip'><img src='<?php echo WebUrl; ?>images/question.png' width='20' height='20'></a> </li></ul></div></div><div class='row-fluid'><div class='span2'></div><div class='span8'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><select name='city[]' id='city"+x+"' class='city' onBlur='cityCheck(this.value)'><option value='select'>Select your city</option></select><div style='color:RED;' id='city_error' class='error'></div></div></div><div style='margin: 0px 0px 0px 0px;' class='bs-example'><ul class='list-inline'><li> <a data-toggle='tooltip' data-html='true' data-placement='right' title='Select Your City' class 'right_tooltip'><img src='<?php echo WebUrl; ?>images/question.png' width='20' height='20'></a> </li></ul></div></div></div>"); 
                                                   //add input box
        x++;
    }
    });
    
    $(wrapper).on("click",".remove_mobile_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
 });
    </script>
      <!-- End footer -->
                                    <?php if (@$fbUserData['signup']=='yes') { ?>
                                        <script type="text/javascript"> $('#myModal').modal('show'); </script>
                                    <?php } ?>
   </body>
</html>
