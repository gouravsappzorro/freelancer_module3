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
	<SCRIPT TYPE="text/javascript">

function blankCheck(value,id)
{
	if (value == '')
	{
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

function TitleCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length < 2 || value.length > 30)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Title should be 2 to 30 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}

function fileCheck(value)
{
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
 function skillsCheck(){
 	
  var chk=document.getElementsByName('skills[]');
  var hasChecked=false;
  for (var i = 0; i < chk.length; i++)
	{
		if (chk[i].checked)
		{
				hasChecked = true;
				break;
		}
	}
	if (hasChecked==false)
	{
				
			document.getElementById("skill_error").innerHTML = 'Please select skills.' ; 
   			return false;
	}else
	{
			document.getElementById("skill_error").innerHTML = '' ; 
   			return true;
	}
  
 
 }
function portfolioValidation(){
	
	
	var a = blankCheck(document.getElementById("file").value,document.getElementById("file").id);
	var b = TitleCheck(document.getElementById("title").value,document.getElementById("title").id);
	var c=	skillsCheck();

	if(a && b && c && flag==1){
	
		return true;	
	}
	else{
		return false;	
	}
}
</SCRIPT>
<script type="text/javascript">
	
	function DeleteId(Delete1)
	{ var x;  
	  if (confirm("Are you Sure ? you want to Delete This Portfolio!") == true) 
	  {	 var dataString = 'DeleteUser='+ Delete1 ;
	  
		 $.ajax({
			 type: "POST",
			 url: "delete_portfolio.php",
			 data: dataString,
			 cache: false,
			 success: function(result){
			 
			   if(result==1)
			   {
				$("#msg").html('<div class="alert alert-success fade in" style="background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;"><i class="icon-remove close" data-dismiss="alert"></i><strong>Portfolio Suucessfully Deleted!</strong>.</div>');
				$("#RefreshPage").load("my-portfolio.php #RefreshPage");
				
			   }
			 }
		  });
	  }else	{ x = "Your Data is safe!"; }		  
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
                               
							   <div id="sidebar" class="span3 sidebar sidebar-left" style="">
									<div class="inner-content">
										<ul class="side-navigation">
											<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
											<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
											<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
											<li class="page_item page-item-655 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                            <li class="page_item page-item-553"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
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
												<li class="page_item page-item-655 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                                <li class="page_item page-item-553"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
												<li class="page_item page-item-658"><a href="my-finances.html">My Finances</a></li>
												<li class="page_item page-item-562"><a href="my-transactions.html">My Transactions</a></li>
												<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>My Portfolio</span>
                                        </h3>
									
									<div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form name="portfolio" class="test" method="post" onSubmit="return portfolioValidation(this);" action="portfolio_action.php" enctype="multipart/form-data">
                                      	
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
                                                <div class="span10">
                                                    <div class="control-wrap" id="msg">
                                                         
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div> 
										
										<div class="row-fluid">	
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Upload Portfolio:</strong></label><br />
														<input type="file" name="file" id="file" onBlur="blankCheck(this.value,this.id);" onChange="fileCheck(this.value);">
														<div style="color:RED;" id="file_error" class="error"></div>
                                                   </div>
                                                </div>
												
											</div>
											
										   <div class="row-fluid">	
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Portfolio Title:</strong></label>
														<input type="text" name="title" id="title" onBlur="TitleCheck(this.value,this.id);" placeholder="Portfolio Title">
														<div style="color:RED;" id="title_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
                                            
                                            <div class="row-fluid">	
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Portfolio Link </strong><span style="font-size:12px;">(optional)</span> : </label>
														<input type="url" name="url" id="url"  placeholder="Portfolio Link">
														<div style="color:RED;" id="title_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">	
                                                <div class="span12">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Select skills which were required for this project:</strong></label><br />
														<div class="span4">
																<input type="checkbox" name="skills[]" value="PHP" onBlur="skillsCheck();"> PHP <br />
																<input type="checkbox" name="skills[]" value="Wordpress" onBlur="skillsCheck();"> Wordpress <br />
																<input type="checkbox" name="skills[]" value="Joomla" onBlur="skillsCheck();"> Joomla <br />
																<input type="checkbox" name="skills[]" value="Magento" onBlur="skillsCheck();"> Magento <br />
																<input type="checkbox" name="skills[]" value="Opencart" onBlur="skillsCheck();"> Opencart <br />
																<input type="checkbox" name="skills[]" value="CakePHP" onBlur="skillsCheck();"> CakePHP <br />
															</div>
															<div class="span4">
																<input type="checkbox" name="skills[]" value="iOS" onBlur="skillsCheck();"> iOS <br />
																<input type="checkbox" name="skills[]" value="Android" onBlur="skillsCheck();"> Android <br />
																<input type="checkbox" name="skills[]" value="Windows" onBlur="skillsCheck();"> Windows <br />
																<input type="checkbox" name="skills[]" value="Blackberry" onBlur="skillsCheck();"> Blackberry <br />
																<input type="checkbox" name="skills[]" value="Opencart" onBlur="skillsCheck();"> Opencart <br />
																<input type="checkbox" name="skills[]" value="CakePHP" onBlur="skillsCheck();"> CakePHP <br />
															</div>
															<div class="span4">
																<input type="checkbox" name="skills[]" value="PHP" onBlur="skillsCheck();"> PHP <br />
																<input type="checkbox" name="skills[]" value="Wordpress" onBlur="skillsCheck();"> Wordpress <br />
																<input type="checkbox" name="skills[]" value="Joomla" onBlur="skillsCheck();"> Joomla <br />
																<input type="checkbox" name="skills[]" value="Magento" onBlur="skillsCheck();"> Magento <br />
																<input type="checkbox" name="skills[]" value="Opencart" onBlur="skillsCheck();"> Opencart <br />
																<input type="checkbox" name="skills[]" value="CakePHP" onBlur="skillsCheck();"> CakePHP <br />
															</div>
															<div style="color:RED;" id="skill_error" class="error"></div>
                                                    </div>
                                                </div>
											</div>
											
											 <div class="row-fluid">	
                                                <div class="span8">
                                                    <!--<input type="submit" id="submit_contact" onClick="form_submit();" name="submit" class="main-button" value="Save">-->
													<input type="submit" id="porfolio" name="submit" value="Save">
                                                    <div id="msg" class="message"></div>
                                                </div>
												<div class="span2"></div>
                                            </div>
											
											
                                     </form>
                                    </div>
									<div id="RefreshPage">
									<?php $sql="select * from portfolio where uid='".$_SESSION['id']."'";
										  $res=mysql_query($sql);
										  $cnt=mysql_num_rows($res);
									 ?>
									 <?php
									 if($cnt==0)
									 {
									 ?>
									<div class="span6">
										<div style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;' class='alert alert-danger fade in'>
    										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    										<strong>Portfolio Not Found</strong>
 										</div>
									</div>
									<?php }else{
										while($row=mysql_fetch_array($res))
										{
										$skill=explode(",",$row['skills']);
										$skills=implode("/",$skill)
									?>
									<div class="span6">
                                            <div class="portfolio-item creative branding span scheme-default" style="height:100%; width:100%;">
                                                <div class="inner-content">
                                                    <div class="image hoverlay" >
                                                        <a href="#" target="_self"><img src="<?php echo WebUrl; ?>Portfolio/<?php echo $row['portfolio_image']; ?>" class="attachment-thumb-large" alt="portfolio"/></a>
                                                         <div class="overlay">
                                                            <div class="overlay-content">
                                                                <div class="info">
																	<font style="font-size:18px;"><?php echo $row['title']; ?></font><br />
                                                                    <font style="font-size:12px"><?php echo $skills; ?></font><br />
                                                                    <div class="hr">
                                                                        <span></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
													<div align="center">
															<a id="<?php echo $row['id']; ?>" onClick="DeleteId(this.id);" href="javascript:void(0)">Remove</a>
                                                    	</div>
                                                </div>
                                            </div>
									</div>
									<?php }}?>
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
