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
	
	<?php include('../include/validation.php'); ?>
    
<script type="text/javascript" language="javascript">
	
function TitleCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length<2 || value.length>100)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Title should be 2 to 100 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}

function CompanyCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length<2 || value.length>30)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Company Name should be 2 to 30 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}

function blankCheck(value,id)
{
	if (value == '')
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length < 5 || value.length > 1000)
	{
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' Summary should be 5 to 1000 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}	
		
function experienceCheck(exper)
{
	if (exper == 'select')
	{
		document.getElementById("experience_error").className = "error";
		document.getElementById("experience_error").innerHTML = ' This field is required.';
		return false;
	}
	
	else
	{
		document.getElementById("experience_error").innerHTML = '';
		return true;		
	}
}	

function experienceValidation()
{
	var a = TitleCheck(document.getElementById("title").value,document.getElementById("title").id);
	var b = experienceCheck(document.getElementById("experience").value);
	var c = CompanyCheck(document.getElementById("company").value,document.getElementById("company").id);
	var d = blankCheck(document.getElementById("summary").value,document.getElementById("summary").id);

	if(a && b && c && d){
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
                               
							   <div id="sidebar" class="span3 sidebar sidebar-left" style="">
									<div class="inner-content">
										<ul class="side-navigation">
											<li class="page_item page-item-2716"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
											<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
											<li class="page_item page-item-612 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
											<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
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
												<li class="page_item page-item-612 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
												<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                                <li class="page_item page-item-553"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
												<li class="page_item page-item-658"><a href="my-finances.html">My Finances</a></li>
												<li class="page_item page-item-562"><a href="my-transactions.html">My Transactions</a></li>
												<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								<?php
									$select="select * from experience where uid='".$_SESSION['id']."'";
									$res=mysql_query($select);
									$row=mysql_fetch_array($res);
								 ?>
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>My Experience</span>
                                        </h3>
									
									<div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form id="contact-form" class="test" method="post" onSubmit="return experienceValidation(this);" action="experience_action.php">
                                   		
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
													<a href="" class="add_field_mobile col-md-10" id="myid"><strong>+ Add More Country And City</strong></a>
                                                 <div class="span10">
                                                    <!--<div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Total Experience:</strong></label>
														<select name="experience" id="experience" onBlur="experienceCheck(this.value);">
															<option value=""> Select your total experience </option>
															<option value="1+" <?php if($row['experience']=='1+'){echo 'selected="selected"';}else{} ?> > 1 Year and above</option>
															<option value="3+" <?php if($row['experience']=='3+'){echo 'selected="selected"';}else{} ?> > 3 Year and above</option>
															<option value="5+" <?php if($row['experience']=='5+'){echo 'selected="selected"';}else{} ?> > 5 Year and above</option>
															<option value="10+" <?php if($row['experience']=='10+'){echo 'selected="selected"';}else{} ?> > 10 Year and above</option>
															<option value="15+" <?php if($row['experience']=='15+'){echo 'selected="selected"';}else{} ?> > 15 Year and above</option>
														</select>
														<div style="color:RED;" id="experience_error" class="error"></div>
                                                    </div>-->
                                                </div> 
												<div class="span2"></div>
											</div>
									<div class="add_mobile">
                                    	
                                    	<?php
					                  $exp_title=explode(",", $row['title']);
					                  $exp_company=explode(",", $row['company']);
					                  // $exp_experience=explode(",", $row['experience']);
					                  $exp_summary=explode(",", $row['summary']);
					                  $Count_phone = count($exp_title);
					                  if($Count_phone>0){ 
					                  	for($i=0;$i<$Count_phone;$i++)
					                  	{
					                    ?>
										  <div>
										  <a href='#' style="<?php if($i==0){echo "display:none";}?>" class='remove_mobile_field col-md-10'><strong>- Remove</strong></a>
										<div class="row-fluid">	
                                                
												<div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Title:</strong></label><br />
														<input type="text" name="title[]" value="<?php echo $exp_title[$i]; ?>" id="title" onBlur="TitleCheck(this.value,this.id);" placeholder="Title describing your experience">
														<div style="color:RED;" id="title_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
										   
											<div class="row-fluid">
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Company:</strong></label>
														<input name="company[]" id="company" value="<?php echo $exp_company[$i]; ?>" type="text" onBlur="CompanyCheck(this.value,this.id);" class="company" placeholder="e.g. Green Cube Solutions"/>
														<div style="color:RED;" id="company_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											
											
											<div class="row-fluid">
													
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Summary:</strong></label>
														<textarea style="width:100%;
														max-width:100%;" name="summary[]" id="summary" onBlur="blankCheck(this.value,this.id);" placeholder="Briefly describe your experience" rows="8"><?php echo $exp_summary[$i]; ?></textarea>
														<div style="color:RED;" id="summary_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											</div>
											<?php

							                      }
							                  }
							                  ?>
											</div>

											 <div class="row-fluid">
											 	
                                                <div class="span10">
                                                    <input type="submit" name="save_experience" id="save_experience" class="main-button" value="Save">
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
            $(wrapper).append("<div><a href='#' class='remove_mobile_field col-md-10'><strong>- Remove</strong></a><div class='row-fluid'>	<div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><label><strong>Title:</strong></label><br />	<input type='text' name='title[]' id='title' onBlur='TitleCheck(this.value,this.id);' placeholder='Title describing your experience'><div style='color:RED;' id='title_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-envelope-o'></i></span><label><strong>Company:</strong></label>	<input name='company[]' id='company' type='text' onBlur='CompanyCheck(this.value,this.id);' class='company' placeholder='e.g. Green Cube Solutions'/><div style='color:RED;' id='company_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><label><strong>Summary:</strong></label><textarea style='width:100%;	max-width:100%;' name='summary[]' id='summary' onBlur='blankCheck(this.value,this.id);' placeholder='Briefly describe your experience' rows='8'></textarea>	<div style='color:RED;' id='summary_error' class='error'></div></div></div>	<div class='span2'></div></div></div>"); 
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
	</body>
	

</html>
