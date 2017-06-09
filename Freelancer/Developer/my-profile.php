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
	<?php include('../include/script.php');  ?>
    <?php include('profile_validation.php'); ?>
        <style type="text/css">
        .ui-datepicker-month{
            float: left;
        }
        #ui-datepicker-div{z-index: 100 !important;}
    </style>
</head>
<?php


function subcategory($maincategory,$hobby){
	
	$sql=mysql_query("select * from admin_skill where type='".$maincategory."'");
	$subcategory=mysql_num_rows($sql);
	$result='';
	for($i=1;$i<=$subcategory;$i++){
	$row1=mysql_fetch_array($sql);
	?>
		
        <input type="checkbox" name="skills[]"<?php if(in_array($row1['Skill_Name'],$hobby)){echo 'checked="checked"'; }?> onBlur="skillsCheck();" value="<?php echo $row1['Skill_Name']; ?>"> <?php echo $row1['Skill_Name']; ?> <br />
	<?php	
	}
	
	return $result;
}


?>
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
											<li class="page_item page-item-2716 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
											<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
											<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
											<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
											<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                            <li class="page_item page-item-553"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
											<li class="page_item page-item-658"><a href="#">My Finances</a></li>
											<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
											<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
										</ul>
										<div class="side-navigation-mobile">
											<a href="#" class="current-page">Select</a>
											<ul>
												<li class="page_item page-item-2716 current_page_item"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">My Profile</a></li>
												<li class="page_item page-item-639"><a href="<?php echo WebUrl; ?>Developer/change-password.php">Change Password</a></li>
												<li class="page_item page-item-664"><a href="<?php echo WebUrl; ?>Developer/my-education.php">My Education</a></li>
												<li class="page_item page-item-612"><a href="<?php echo WebUrl; ?>Developer/my-experience.php">My Experience</a></li>
												<li class="page_item page-item-655"><a href="<?php echo WebUrl; ?>Developer/my-portfolio.php">My Portfolio</a></li>
                                                <li class="page_item page-item-553"><a href="<?php echo WebUrl; ?>Developer/my-paypal.php">My Paypal Account</a></li>
												<li class="page_item page-item-658"><a href="#">My Finances</a></li>
												<li class="page_item page-item-562"><a href="#">My Transactions</a></li>
												<li class="page_item page-item-559"><a href="<?php echo WebUrl; ?>Developer/close-account.php">Close Account</a></li>
											</ul>
										</div>
									</div>
								</div>
								<?php 
										$select="select * from register where unique_code='".$_SESSION['id']."'";
										$res=mysql_query($select);
										$row=mysql_fetch_array($res);
										$hobby=explode(",",$row['skills']);
									?>
                                <div class="section-column span9" style="">
                                    
									 <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span>My Profile</span>
                                        </h3>
									
									
									<div class="inner-content content-box textnone" style="padding-top:0px;  padding-bottom:0px; padding-left:0px; padding-right:0px;">
                                    <?php
										if(isset($_GET['project_id']))
										{
											$url = "my-profile_action.php?project_id=".$_GET['project_id'];
										}
										else
										{
											$url = "my-profile_action.php";
										}
									?>
                                     <form name="profile"  class="test" method="post" action="<?php echo $url;?>" onSubmit="return profileValidation(this);" enctype="multipart/form-data">
                                     
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
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Select Date When Start Your Career:</strong></label>
                                                        </br>
														<input name="experience" id="datepicker" onBlur="blankCheck(this.value,this.id);" type="text" class="experience" placeholder="Select Date When Start Your Career" value="<?php echo $row['Experience']; ?>" readonly/>
														<div style="color:RED;" id="country_error" class="error"></div>
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
											
											<div class="add_mobile">
		                                    <a href="" class="add_field_mobile" id="myid"><strong>+ Add More Country And City</strong></a>
		                                    <?php
		                                    $exp_country=explode(",", $row['country']);
		                                    $exp_city=explode(",", $row['city']);
		                                    $count_country=count($exp_country);
		                                    if($count_country>0)
		                                    {
		                                    	for($i=0;$i<$count_country;$i++)
		                                    	{
		                                    ?>
		                                    <div>
		                                    <a href='#' style="<?php if($i==0){echo "display:none";}?>" class='remove_mobile_field col-md-10'><strong>- Remove</strong></a>
											<div class="row-fluid">	
												
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span>
														<select name="country[]" id="country" onBlur="countryCheck(this.value);" onChange="cityFetch(this.value,0)">
															
															<?php
															$sql1="select * from location where Status='Published' order by Name";
															$res1=mysql_query($sql1);
															while($country=mysql_fetch_array($res1))
															{
															?>
															<option <?php if($exp_country[$i]==$country['Code']){ echo 'selected="selected"';} ?>  value="<?php echo $country['Code']; ?>"><?php echo $country['Name']; ?></option>
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
														<select name="city[]" id="city0" onBlur="cityCheck(this.value);">
															
                                                            <?php
															$getlocation=mysql_fetch_array(mysql_query("select * from location where Code='".$exp_country[$i]."'"));
															$getcity=mysql_query("select * from city where CountryCode='".$getlocation['Code']."' and Status='Published' order by Name");
															while($rowgetcity=mysql_fetch_array($getcity))
															{?>
                                                                
                                                                <option value="<?php echo $rowgetcity['Name'];?>" <?php if($exp_city[$i]==$rowgetcity['Name']){ echo "selected"; };?>><?php echo $rowgetcity['Name'];?></option>
                                                                
                                                            <?php }	?>
															<option <?php if($row['city']=='other') echo "selected"; ?> value="other">Other</option>
		 												
														</select>
														<div style="color:RED;" id="city_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											</div>
											<?php } }?>
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
											
										   
											<div class="row-fluid">	
											
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Profile Title:</strong></label> 
														<input name="profile_title" id="profile_title" type="text" onBlur="profileTitleCheck(this.value,this.id);" class="name" placeholder="e.g. Website Design & Development,PHP,Wordpress,Joomla Developer" value="<?php echo $row['profile_title']; ?>"/>
														<div style="color:RED;" id="profile_title_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
											<div class="row-fluid">
													
                                                <div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-envelope-o"></i></span>
														<label><strong>Describe your services:</strong></label>
														<textarea style="width:100%;
	max-width:100%;" name="shortdescr" id="shortdescr" onBlur="blankCheck(this.value,this.id);" placeholder="Describe your services in short" rows="8"><?php echo $row['description']; ?></textarea>
														<div style="color:RED;" id="shortdescr_error" class="error"></div>
                                                       
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
                                            <div class="row-fluid">	
												<div class="span10">
                                                    <div class="control-wrap">
                                                         <label><strong>I am a:</strong></label>
                                                         <?php echo $row['company_type'];?>
                              <br />
                              <input type="radio" name="type" id="type" <?php if($row['company_type']=="Freelancer"){ ?> checked <?php } ?> onclick="typeCheck();" value="Freelancer">
                              Freelancer
                              <input type="radio" name="type" id="type" <?php if($row['company_type']=="Company"){ ?> checked <?php } ?> onclick="typeCheck();" value="Company">
                              Company
														<div style="color:RED;" id="type_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
                                            
                                            
											<div class="row-fluid">	
									
												<div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span><input name="company" id="company" type="text" onBlur="CompanyNameCheck(this.value,this.id);" class="company" placeholder="Your Company Name" value="<?php echo $row['company']; ?>"/>
														<div style="color:RED;" id="company_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
											
                                            <div class="row-fluid" id="company_serial">	
									
												<div class="span10">
                                                    <div class="control-wrap">
                                                        <span class="icon"><i class="fa fa-chain"></i></span><input name="serial_number" id="serial_number" type="text" onBlur="SerialCheck(this.value,this.id);" class="company" placeholder="Your Company Serial number" value="<?php echo $row['company_serial_num']; ?>"/>
														<div style="color:RED;" id="serial_number_error" class="error"></div>
                                                    </div>
                                                </div>
												<div class="span2"></div>
											</div>
												
												<div class="span2"></div>
											</div>
											
										
                                           
											   <div class="row-fluid">	
											   		<div id="skills">
                                                        <div class="span10">
                                                        
                                                        <h3>Technical Skills</h3>
                                                        <?php if(isset($_GET['project_id'])){?>
                                                        <input type="button" value="Back" onClick="window.location.href='../bidding.php?project_id=<?php echo $_GET['project_id'];?>'" class="btn btn-sm btn-warning" style="float:right;">
                                                        <?php }?>
                                                        <hr />
                                                       	
                                                            <div class="control-wrap">
                                                                
                                                                <?php
                                                                $res=mysql_query("select * from admin_skill_category where Status='Published'");
                                                                while($row2=mysql_fetch_array($res))
                                                                {
                                                                ?>
                                                                <label><strong><?php echo $row2['skill_category']; ?></strong></label><br/>
                                                                    <?php echo subcategory($row2['CodeId'],$hobby); ?>
                                                                <?php } ?>
                                                                    
                                                                
                                                            </div>
                                                            <div style="color:RED;" id="skill_error" class="error"></div>
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
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <?php include "../include/footer.php"; ?>
      <script>
              $(function(){
                $("#datepicker").datepicker({
                    dateFormat: "dd-mm-yy",
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true, //this option for allowing user to select from year range
                    yearRange: "c-25:nnnn"
                });
              });
              </script>
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
            $(wrapper).append("<div><a href='#' class='remove_mobile_field'><strong>- Remove</strong></a><div class='row-fluid'><div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span><select name='country[]' id='country' onBlur='countryCheck(this.value);' onChange='cityFetch(this.value,"+x+")'><?php
															$sql1="select * from location where Status='Published' order by Name";
															$res1=mysql_query($sql1);
															while($country=mysql_fetch_array($res1))
															{
															?><option value='<?php echo $country['Code']; ?>''><?php echo $country['Name']; ?></option><?php
															}
															?></select><div style='color:RED;' id='country_error' class='error'></div></div></div><div class='span2'></div></div><div class='row-fluid'>	<div class='span10'><div class='control-wrap'><span class='icon'><i class='fa fa-chain'></i></span>	<select name='city[]' id='city"+x+"' class='city' onBlur='cityCheck(this.value)'><option value='select'>Select your city</option></select><div style='color:RED;' id='city_error' class='error'></div></div></div><div class='span2'></div></div></div>"); 
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
