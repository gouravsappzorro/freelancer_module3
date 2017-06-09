<?php 
session_start();
include "../Admin/MyInclude/MyConfig.php";?>

<!doctype html>
<html lang="en-US">

<head> 

    <!-- Meta Tags -->
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Freelance Website</title>
    <?php include('post_project_validation.php'); ?>
    <?php include('../include/script.php');  ?>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript" src="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.css" />
    <style>
	.row [class*="span"], .row-fluid [class*="span"], .row-fluid .one_fifth {
     	margin-bottom: 0px; 
	}
	</style>
    
    <script type="text/javascript">
        function subcategorFatch(cate) {
            //var id = document.getElementById("country").value;
            var dataString = 'id=' + cate;
            $.ajax({
                type: "POST",
                url: "fatch_subcategory.php",
                data: dataString,
                cache: false,
                success: function(html) {
                    // alert(html);
                    $("#subcategory").html(html);
                    $('.cat-tooltip').show();
                }
            });
        }
    </script>
    <?php
		if(isset($_SESSION['user']))
		{
			if($_SESSION['user']=='Work')
			{
				//$_SESSION['login']="You must be logged in as Client to Post a Project";
				$_SESSION['login']='in order to post a project you must SIGN UP as client or LOG IN';
		?>
        <script language="javascript">
            ;
            $(document).ready(function() {
                $("#post_project input").prop("disabled", true);
                $("#post_project select").prop("disabled", true);
                $("#post_project textarea").prop("disabled", true);

            });
        </script>
        <?php
			}
			else
			{
				unset($_SESSION['login']);	
			}
		}
		else
		{
			?>
            <script language="javascript">
                ;
                $(document).ready(function() {
                    $("#post_project input").prop("disabled", true);
                    $("#post_project select").prop("disabled", true);
                    $("#post_project textarea").prop("disabled", true);

                });
            </script>
            <?php  
		}
	 ?>

            <script type="text/javascript">
                $(document).ready(function() {
                    $('[data-toggle="tooltip"]').tooltip();
                });
            </script>
            
            <script>
            
			 $(document).ready(function(){
				 $('#location_div').hide();
                 $('input[type="radio"]').click(function(){
					   if($(this).attr('id') == 'everyone'){
						   //~ alert('Everyone!'); 
						 $('#location_div').hide(); 
						           
					   }
					   if($(this).attr('id') == 'geo_based'){
						   //~ alert('Geo Based!'); 
						 $('#location_div').show(); 
						           
					   }
						   
						   
				  });
			   });
            </script>
              

</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">
    <?php include"../include/header.php"; ?>

    <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar2 titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes"> </section>
    <!--End Header -->

    <section id="section_154374867" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:90px;padding-bottom:50px;background-color:#ffffff;" data-video-ratio="" data-parallax-speed="1">

        <div class="section-overlay" style=""> </div>
        <div class="container section-content">
        <?php
		if(isset($_SESSION['user']) and $_SESSION['user']=='Work'){?>
        <div class="row-fluid">
        	<div class="span8"></div>
            <div class="span4">
                <a href="<?php echo WebUrl;?>Register/register.php" class="external"><input type="submit" name="submit" value="Create New Account"></a>
            </div>
        </div>
        <?php }?>
            <div class="row-fluid">
                <div class="row-fluid equal-cheight-no element-padding-medium element-vpadding-medium">
                    <div class="section-column span12" style="">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div class="row-fluid element-padding-medium element-vpadding-default ">
                                <div class="section-column span8" style="">
                                    <div class="row-fluid">
                                        <div class="span12">
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
							
							if(isset($_SESSION['error']))
							{
								echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong></strong> ".$_SESSION['error']."
								</div>";
								unset($_SESSION['error']);
							}
							
					?>
                                                    <?php
							if(isset($_SESSION['login']))
							{
								echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
								<strong></strong> ".$_SESSION['login']."
								</div>";
							}
							
					?>
                                            </div>
                                        </div>

                                        <div class="span12"></div>

                                    </div>
                                    <?php if(!isset($_SESSION['id'])){ ?>
                                    <div class="alert alert-success">
                                        You must be logged in as Client to Post a Project. <a href="<?php echo WebUrl; ?>Login/login.php">LOGIN</a> or <a href="<?php echo WebUrl; ?>Register/register.php">SIGN UP</a>
                                    </div>
                                    <?php } else{} ?>
                                </div>
                            </div>

                            <div class="row-fluid element-padding-medium element-vpadding-default ">
                                <div class="section-column span12" style="">
                                    <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span> Post a project </span> </h3>
                                    <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;"> <span></span> </div>
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                        <form name="post_project" id="post_project" class="test" method="post" onSubmit="return PostprojectValidation(this);" action="post_project_action.php" enctype="multipart/form-data">
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                        <label><strong>Select category of work:</strong></label>
                                                        <select name="category" id="category" onBlur="categoryCheck(this.value)" onChange="subcategorFatch(this.value);">
                            <option value="Select">Select category of work</option>
                            <?php
																$res=mysql_query("select * from admin_category");
																while($row=mysql_fetch_array($res))
																{
															?>
                            <option value="<?php echo $row['Id']; ?>"><?php echo $row['CategoryName']; ?></option>
                            <?php	
																}
															?>
                          </select>
                                                        <div style="color:RED;" id="category_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Category of work and Category is compulsory" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <!-- <div class="row-fluid">
                                                <div class="span8"> -->
                                                    <div id="subcategory">

                                                    </div>
                                                <!-- </div>
                                                <div style="margin: 0px 0px 0px -130px;" class="bs-example ">
                                                    <ul class="list-inline cat-tooltip" style="display:none">
                                                        <li>
                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter SubCategory" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>

                                            </div> -->

                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Title of the project:</strong></label>
                                                        <input name="title" id="project_title" onBlur="TitleCheck(this.value,this.id);" type="text" class="name" placeholder="e.g. Build a professional website" />
                                                        <div style="color:RED;" id="project_title_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Project Title" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Skills required for the project:</strong></label>

                                                        <select id="tokenize_placehoder" style="margin: 0px; padding: 0px; border: 0px; display:none; width:100%;" name="skills[]" class="tokenize-sample" multiple="multiple">
                            
                            
                            <?php $skill_res=mysql_query("select * from admin_skill");
		  while($row=mysql_fetch_array($skill_res))
		  {
	?>
                            <option value="<?php echo $row['Skill_Name']; ?>"><?php echo $row['Skill_Name']; ?></option>
                            <?php }
	 ?>
                          </select>
                                                        <div id="skills"></div>
                                                        <script type="text/javascript">
                                                            $('select#tokenize_placehoder').tokenize({
                                                                placeholder: "e.g. PHP, Developing, Wordpress"
                                                            });
                                                        </script>
                                                        <div style="color:RED;" id="required_skill_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Skills like php,wordpress,css,javascript" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Description for the project:</strong></label>
                                                        <textarea name="description" id="project_des" onBlur="DescriptionCheck(this.value,this.id);" placeholder="Briefly describe your project" rows="10" style="width:100%;"></textarea>
                                                        <div style="color:RED;" id="project_des_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Project Description " class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Upload images or documents that might be useful for developer to understand the project better:</strong></label>
                                                        <br />
                                                        <input type="file" name="file" id="file" onBlur="fileCheck(this.value);">
                                                        <div style="color:RED;" id="file_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Images and Documents and files should be lessthen 10 mb" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="span2"></div> -->
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Accept offers from Freelancer or Company:</strong></label>
                                                        <br />
                                                        <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="freelancer"> Freelancer
                                                        <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="company"> Company
                                                        <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="both"> Both

                                                        <div style="color:RED;" id="accept_offers_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Accept Offers" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="span2"></div> -->
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Should be compatible with:</strong></label>
                                                        <br />
                                                        <input type="checkbox" name="competible[]" id="competible" value="mobiles"> Mobiles
                                                        <input type="checkbox" name="competible[]" id="competible" value="pc"> PC
                                                        <input type="checkbox" name="competible[]" id="competible" value="tablets"> Tablets
                                                        <input type="checkbox" name="competible[]" id="competible" value="ipads"> iPads
                                                        <div style="color:RED;" id="competible_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Should be compatible with" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="span2"></div> -->
                                            </div>
                                            <!-- <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Choose desired location of developer:</strong></label>

                                                        <select id="location" name="location" onBlur="LocationCheck(this.value,this.id)">
                            	
                            							<option value="">Select Location</option>
                                                        <option value="Local">Local</option>
                                                        <option value="International">International</option>
                                                  </select>
                                                        <div style="color:RED;" id="location_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Choose Desired Location" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div> -->
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> 
														<span class="icon">
															<i class="fa fa-chain"></i>
														</span>
                                                        <label>
															<strong>
															Please allow bids from:
															</strong>
                                                        </label>
                                                        </br>
                                                             
                                                             <input type="radio" name="location_type" id="everyone" value="1">Everyone
															 <input type="radio" name="location_type" id="geo_based" value="2">Geo-Based
															  
                                                   </div>
                                                  </div>
                                                 </div>  
                                            
                                            
                                               <div class="row-fluid" id="location_div">
                                                <div class="span8" id="location_div">
                                                    <div class="control-wrap" id="location_div"> 
														<span class="icon">
															<i class="fa fa-chain"></i>
														</span>
                                                        <label><strong>Choose desired location of developer  :</strong></label>

                                                        <select id="tokenize_placehoder" style="margin: 0px; padding: 0px; border: 0px; display:none; width:100%;" name="location[]" class="tokenize-sample" multiple="multiple">
                            
                            
                                                        <?php $location_res=mysql_query("select * from location");
                                                              while($location_row=mysql_fetch_array($location_res))
                                                              {
                                                        ?>
                                                            <option value="<?php echo $location_row['Code']; ?>"><?php echo $location_row['Name']; ?></option>
                                                        <?php }
                                                         ?>
                                                        </select>
                                                        
                                                        <div id="location"></div>
                                                        <script type="text/javascript">
                                                            $('select#tokenize_placehoder').tokenize({
                                                                placeholder: "e.g. India, United-States , Israel"
                                                            });
                                                        </script>
                                                        <div style="color:RED;" id="location_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Location like india,US,israel" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>How many years of experience developer you want?</strong></label>
                                                        <br />
                                                        <select name="exp" id="exp">
                                                            <option  value="Allow all">Allow all</option>
                                                            <option  value="1+">1 Year and above</option>
                                                            <option  value="3+">3 Year and above</option>
                                                            <option  value="5+">5 Year and above</option>
                                                            <option  value="10+">10 Year and above</option>
                                                            <option  value="15+"> 15 Year and above</option>
                                                            <!--<option  value="1-3"> 1-3 Year</option>
                                                            <option  value="3-5"> 3-5 Year</option>
                                                            <option  value="5-10"> 5-10 Year</option>
                                                            <option  value="10-15"> 10-15 Year</option>
                                                            <option  value="15+"> 15+ Year</option>-->
                                                          </select>
                                                        <div style="color:RED;" id="exp_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Experience you want from developer" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Type of project:</strong></label>
                                                        <br />
                                                        <input type="radio" name="project_type" id="project_type" onBlur="project_typeCheck();" value="fixed"> Fixed Price
                                                        <input type="radio" name="project_type" id="project_type" onBlur="project_typeCheck();" value="hourly"> Hourly
                                                        
                                                        <!--<input type="radio" name="project_type" id="project_type" onBlur="project_typeCheck();" value="both"> Fixed Price-->

                                                        <div style="color:RED;" id="project_type_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Type of project it is either fixed price or Hourly" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- <div class="span2"></div> -->
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span4">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Select Currency:</strong></label>
                                                        <select name="currency" id="currency" onBlur="currencyCheck(this.value,this.id)">
                            <option value="Select">Select your currency</option>
                            <?php 
																$currency_res=mysql_query("select * from admin_currency");
																while($row=mysql_fetch_array($currency_res))
																{
															?>
                            <option value="<?php echo $row['Currency']; ?>"><?php echo $row['Currency']; ?></option>
                            <?php } ?>
                            
                          </select>
                                                        <div style="color:RED;" id="currency_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div class="span4">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Set your budget for the project:</strong></label>
                                                        <input name="budget" id="budget" type="text" class="budget" placeholder="e.g. 250-250 USD" onBlur="budgetCheck(this.value)" />
                                                        <div style="color:RED;" id="budget_error" class="error"></div>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Currency and Enter your Budget. Budget should be in Digits" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <div class="control-wrap"> <span class="icon"><i class="fa fa-chain"></i></span>
                                                        <label><strong>Help us improve, is there another section you were missing?</strong></label>
                                                        <textarea name="improve" placeholder="Help us improve, is there another section you were missing?" rows="4" style="width:100%;"></textarea>
                                                    </div>
                                                </div>
                                                <div style="margin: 45px 0px 0px -130px;" class="bs-example">
                                                    <ul class="list-inline">
                                                        <li>

                                                            <a data-toggle="tooltip" data-html="true" data-placement="right" title="Please Give your review which help us to improve services " class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <input type="checkbox" name="terms" id="term" class="main-button" value="Yes" onBlur="termCheck();"> I agree to all terms and conditions set by webzira.com
                                                    <div style="color:RED;" id="term_error" class="error"></div>
                                                    <div id="msg" class="message"></div>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                              		<div class="g-recaptcha" data-sitekey="6Lcbch8UAAAAABGFoxDr9IX-n4ItUx4W79_9Ngin"></div>
                                                    <div style="color:RED;" id="captcha_error" class="error"></div>
												</div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">

                                                    <input type="submit" name="post_project" id="post_project" onClick="validation();">
                                                    <div id="msg" class="message"></div>
                                                </div>
                                                <div class="span2"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="section-column span4" style="">
                                    <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                        <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px">
                      <?php if(!isset($_SESSION['id'])){ ?>
                      <span>Create New Account</span> </h3>
                                        <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;"> <span></span> </div>
                                        <h6 class="title textleft default bw-2px dh-2px divider-dark bc-dark dw-default color-default" style="margin-bottom:30px"><span>
                       IF you want to post a project, click on the below button to create new account.&nbsp;&nbsp;&nbsp;&nbsp; 
                      <form action="<?php echo WebUrl; ?>Register/register.php" method="post">
                     <input type="submit" name="sign" value="SIGN UP">
                      </form>
						<?php } ?>
                       </span> </h6>
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
