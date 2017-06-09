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
	<script type="text/javascript" language="javascript">
	
function degreeCheck(value)
{
	 var text = /^[a-zA-Z ).&(]+$/;
	 if(value=='')
	 {
		document.getElementById("degree_error").innerHTML="This field is required.";
		return false;
	 } 
	 else if(!text.test(value))
	 {
		document.getElementById("degree_error").innerHTML="Invalid Format";
		return false;
	 }
	 else if(value.length < 2 || value.length > 30)
	 {
		document.getElementById("degree_error").innerHTML="Degree name between 2 to 30 characters long";
		return false;
	 }
	 else
	 {
		 document.getElementById("degree_error").innerHTML="";
		 return true;
	 }
}

function universityCheck(value)
{
	var text = /^[a-zA-Z &]+$/;
	
	if(value=='')
	{
		document.getElementById("university_error").innerHTML="This field is required."
		return false;
	}
	else if(!text.test(value))
	{
		document.getElementById("university_error").innerHTML="Invalid University/College Name."
		return false;
	}
	else if(value.length < 2 || value.length > 30)
	{
		document.getElementById("university_error").innerHTML="University/College Name between 2 to 30 characters long."
		return false;
	}
	else
	{
		document.getElementById("university_error").innerHTML=""
		return true;
	}
}

function startyearCheck(value)
{
	var current_year=new Date().getFullYear();
	var text = /^[0-9]+$/;
	
	if(value=='')
	{
		document.getElementById("startyear_error").innerHTML="This field is requird";
		return false;
	}
   	else if (!text.test(value))
	{
		document.getElementById("startyear_error").innerHTML="Please Enter Numeric Values Only";
		return false;
	}

	else if (value.length != 4) {
		document.getElementById("startyear_error").innerHTML="Year is not proper. Please check";
		return false;
	}

	else if((value < 1920) || (value > current_year))
	{
		document.getElementById("startyear_error").innerHTML="Year should be in range 1920 to current year";
		return false;
	}
	else
	{
		document.getElementById("startyear_error").innerHTML="";
		return true;
	}
}
function endyearCheck(value)
{
	var current_year=new Date().getFullYear();
	var text = /^[0-9]+$/;
	var startyear = document.getElementById("startyear").value;
	if (value == '')
	{
		document.getElementById("endyear_error").innerHTML = ' This field is required.';
		return false;
	}
	else if (!text.test(value))
	{
		document.getElementById("endyear_error").innerHTML="Please Enter Numeric Values Only";
		return false;
	}

	else if (value.length != 4) {
		document.getElementById("endyear_error").innerHTML="Year is not proper. Please check";
		return false;
	}

	else if((value <= startyear) || (value > current_year+10))
	{
		document.getElementById("endyear_error").innerHTML="Year should be greater than start year";
		return false;
	}
	else
	{
		document.getElementById("endyear_error").innerHTML = '';
		return true;
	}
}

function countryCheck(country)
{
	if (country == 'select')
	{
		document.getElementById("country_error").className = "error";
		document.getElementById("country_error").innerHTML = ' This field is required.';
		return false;
	}
	
	else
	{
		document.getElementById("country_error").innerHTML = '';
		return true;		
		
	}
}	

function educationValidation(){
	
	var a = degreeCheck(document.getElementById("degree").value);
	var b = countryCheck(document.getElementById("country").value);
	var c = universityCheck(document.getElementById("university").value);
	var d = startyearCheck(document.getElementById("startyear").value);
	var e = endyearCheck(document.getElementById("endyear").value);
	
	
	if(a && b && c && d && e){
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
											<li class="page_item page-item-664 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
											<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
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
												<li class="page_item page-item-664 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
												<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
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
									$select="select * from education where uid='".$_SESSION['id']."'";
									$res=mysql_query($select);
									$row=mysql_fetch_array($res);
								 ?>
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>My Education</span>
                                        </h3>
									
									<div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                     <form id="contact-form" class="test" method="post" onSubmit="return educationValidation(this);" action="education_action.php">
                                        
											<div class="row-fluid">	
										
                                                <div class="span10" >
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
								<div class="add_mobile">
                                    <a href="" class="add_field_mobile col-md-10" id="myid"><strong>+ Add Another Education Details</strong></a>
                                    <?php
					                  $exp_education=explode(",", $row['education']);
					                  $exp_country=explode(",", $row['country']);
					                  $exp_univercity=explode(",", $row['univercity']);
					                  $exp_start_year=explode(",", $row['start_year']);
					                  $exp_end_year=explode(",", $row['end_year']);
					                  $Count_phone = count($exp_education);
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
														<label><strong>Degree:</strong></label><br />
														<input type="text" value="<?php echo $exp_education[$i]; ?>" name="degree[]" id="degree" onBlur="degreeCheck(this.value);" placeholder="Education Degree">
														<div style="color:RED;" id="degree_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
										   
											<div class="row-fluid">
													
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Country:</strong></label>
														<select name="country[]" id="country" onBlur="countryCheck(this.value);">
															<option value="select"> Select country where you studied</option>
															<?php 
																$res=mysql_query("select * from location");
																while($row1=mysql_fetch_array($res))
																{
															?>
															<option <?php if($exp_country[$i]==$row1['Name']){echo'selected="selected"';} ?> value="<?php echo $row1['Name']; ?>"><?php echo $row1['Name']; ?></option>
															<?php }?>
														</select>
                                                    </div>
													<div style="color:RED;" id="country_error" class="error"></div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">
													
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>University/College Name:</strong></label>
														<input type="text" name="university[]" value="<?php echo $exp_univercity[$i]; ?>" id="university" onBlur="universityCheck(this.value);" placeholder="University where you studied">
														<div style="color:RED;" id="university_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>Start Year:</strong></label>
														<input type="text" name="startyear[]" value="<?php echo $exp_start_year[$i]; ?>" id="startyear" onBlur="startyearCheck(this.value);" placeholder="Starting year of education">
														<div style="color:RED;" id="startyear_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">
													
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<label><strong>End Year:</strong></label>
														<input type="text" name="endyear[]" value="<?php echo $exp_end_year[$i]; ?>" id="endyear" onBlur="endyearCheck(this.value);" placeholder="Ending Yeay of education">
														<div style="color:RED;" id="endyear_error" class="error"></div>
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
                                                    <input type="submit" id="save_education" name="save_education" class="main-button" value="Save">
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
            $(wrapper).append("<div><a href='#' class='remove_mobile_field col-md-10'><strong>- Remove</strong></a><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><label><strong>Degree:</strong></label><br /><input type='text' name='degree[]' id='degree' onBlur='degreeCheck(this.value);' placeholder='Education Degree'><div style='color:RED;' id='degree_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-envelope-o'></i></span><label><strong>Country:</strong></label><select name='country[]' id='country' onBlur='countryCheck(this.value);'><option value='select'> Select country where you studied</option><?php 
																$res=mysql_query('select * from location');
																while($row1=mysql_fetch_array($res))
																{
															?><option value='<?php echo $row1['Name']; ?>'><?php echo $row1['Name']; ?></option><?php }?></select></div><div style='color:RED;' id='country_error' class='error'></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-envelope-o'></i></span><label><strong>University/College Name:</strong></label><input type='text' name='university[]' id='university' onBlur='universityCheck(this.value);' placeholder='University where you studied'><div style='color:RED;' id='university_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><label><strong>Start Year:</strong></label><input type='text' name='startyear[]' id='startyear' onBlur='startyearCheck(this.value);' placeholder='Starting year of education'><div style='color:RED;' id='startyear_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><label><strong>End Year:</strong></label>	<input type='text' name='endyear[]' id='endyear' onBlur='endyearCheck(this.value);' placeholder='Ending Yeay of education'><div style='color:RED;' id='endyear_error' class='error'></div></div></div><div class='span2'></div></div></div>"); 
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
