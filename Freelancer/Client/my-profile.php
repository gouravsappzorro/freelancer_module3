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
<?php
	if(isset($_GET['AJCOde59']))
	{
		$profile=mysql_fetch_array(mysql_query("select * from register where unique_code='$_GET[AJCOde59]'"));
		unlink("../Profile Picture/$profile[profile_picture]");
		$update=mysql_query("update register set profile_picture='' where unique_code='$_GET[AJCOde59]'");
		if($update)
		{
			header("location:my-profile.php");
		}
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
	<?php include('profile_validation.php'); ?>
	<?php include('../include/script.php');?>

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
											<li class="page_item page-item-2716 current_page_item"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Client/change-password.php">Change Password</a></li>
											<li class="page_item page-item-658"><a href="#">My Finances</a></li>
											<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
											<li class="page_item page-item-559"><a href="<?php echo WebUrl;?>Client/close-account.php">Close Account</a></li>
										</ul>
										<div class="side-navigation-mobile">
											<a href="#" class="current-page">Select</a>
											<ul>
												<li class="page_item page-item-2716 current_page_item"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
												<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Client/change-password.php">Change Password</a></li>
												<li class="page_item page-item-658"><a href="#">My Finances</a></li>
												<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
												<li class="page_item page-item-559"><a href="<?php echo WebUrl;?>Client/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								<?php 
										$select="select * from register where unique_code='".$_SESSION['id']."'";
										$res=mysql_query($select);
										$row=mysql_fetch_array($res);
									?>
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>My Profile</span>
                                        </h3>
									
									
									<div class="inner-content content-box textnone" style="padding-top:0px; padding-bottom:0px; padding-left:0px; padding-right:0px;">

                                     <form name="profile"  class="test" method="post" action="my-profile_action.php" onSubmit="return profileValidation(this);" enctype="multipart/form-data">
                                     
											<div class="row-fluid">	
											
                                                <div class="span10">
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
                                                <div class="span5">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span><input name="fname" id="fname" type="text" onBlur="fnameCheck(this.value);" class="name" placeholder="Your First Name" value="<?php echo $row['first_name']; ?>"/>
														<div style="color:RED;" id="fname_error" class="error"></div>
                                                    </div>
                                                </div>
												
												 <div class="span5">
												   <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span><input name="lname" id="lname" type="text" onBlur="lnameCheck(this.value);" class="name" placeholder="Your Last Name" value="<?php echo $row['last_name']; ?>"/>
														<div style="color:RED;" id="lname_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											
											<div class="row-fluid">	
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<select name="country" id="country" onBlur="countryCheck(this.value);" onChange="cityFetch()">
															<!--<option value="select">Select your country</option>-->
															<!--<option value="USA">United States of America</option>
															<option value="UK">United Kingdom</option>
															<option value="Canada">Canada</option>
															<option value="Australia">Australia</option>-->
															<?php
															$sql1="select * from location where Status='Published' order by Name";
															$res1=mysql_query($sql1);
															while($country=mysql_fetch_array($res1))
															{
															?>
															<option <?php if($row['country']==$country['Code']){ echo 'selected="selected"';} ?>  value="<?php echo $country['Code']; ?>"><?php echo $country['Name']; ?></option>
															<?php
															}
															?>
														</select>
														<div style="color:RED;" id="country_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<select name="city" id="city" onBlur="cityCheck(this.value);">
														<!--<option value="<?php  //echo $row['city'];  ?>"><?php  //echo $row['city'];  ?></option>-->
                                                        <?php
															$getlocation=mysql_fetch_array(mysql_query("select * from location where Code='".$row['country']."'"));
															$getcity=mysql_query("select * from city where CountryCode='".$getlocation['Code']."' and Status='Published' order by Name");
															while($rowgetcity=mysql_fetch_array($getcity))
															{?>
                                                                
                                                                <option value="<?php echo $rowgetcity['Name'];?>" <?php if($row['city']==$rowgetcity['Name']){ echo "selected"; };?>><?php echo $rowgetcity['Name'];?></option>
                                                                
                                                            <?php }	?>
																<option <?php if($row['city']=='other') echo "selected"; ?> value="other">Other</option>
															</select>
														<div style="color:RED;" id="city_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Profile Picture:</strong></label>   <!--<a href="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture'];?>">view</a>--><br />
														
														<input type="file" name="profile_pic" id="file"  value="<?php echo $row['profile_picture']; ?>" onBlur="fileCheck(this.value);">
														<input type="hidden" id="image_path" name="image_path" value="<?php echo $row['profile_picture'];?>">
                                                        <div style="color:RED;" id="file_error" class="error"></div>
                                                        <?php if($row['profile_picture']!=''){?>
                                                        <br>
														<img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture'];?>" alt="" style="width:80px; height:80px;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg';">
                                                        
                                                        <a  href="my-profile.php?AJCOde59=<?php echo $_SESSION['id']; ?>" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-sm bs-tooltip"><img src="<?php echo WebUrl;?>images/icon-remove-image.png" title="remove" style="left:-15px; position:relative; top:-75px;"></a>
                                                        <?php }?>
														
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											</div>
											
                                             <div class="row-fluid">	
												
                                                <div class="span10">
                                                    <input type="submit" id="my-profile" name="my-profile" class="main-button" value="Save">
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
