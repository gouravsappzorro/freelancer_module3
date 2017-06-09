<?php include('../Admin/MyInclude/MyConfig.php'); ?>

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

    <?php include('../include/script.php');
	
	  ?>
    <script type="text/javascript" language="javascript">
        /*developer stahe 2 validatio */
        $(document).ready(function(e) {
            $("#company_serial").hide();
        });

        function fileCheck(value) {

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



        function blankCheck(value, id) {

            if (value == '') {

                document.getElementById(id + "_error").className = "error";
                document.getElementById(id + "_error").innerHTML = ' This field is required.';
                return false;
            } else {
                document.getElementById(id + "_error").innerHTML = '';
                return true;

            }
        }


        function skillsCheck() {

            var chk = document.getElementsByName('skills[]');
            var hasChecked = false;
            for (var i = 0; i < chk.length; i++) {
                if (chk[i].checked) {
                    hasChecked = true;
                    break;
                }
            }
            if (hasChecked == false) {

                document.getElementById("skill_error").innerHTML = 'Please select skills.';
                return false;
            } else {
                document.getElementById("skill_error").innerHTML = '';
                return true;
            }


        }

        function typeCheck() {



            var chk = document.getElementsByName('type');
            var name = $("input[name=type]:checked").val();

            if (name == 'Freelancer') {
                $("#company_serial").hide();
            }
            if (name == 'Company') {
                $("#company_serial").show();
            }


            var hasChecked = false;
            for (var i = 0; i < chk.length; i++) {
                if (chk[i].checked) {
                    hasChecked = true;
                    break;
                }
            }
            //alert(hasChecked);
            if (hasChecked == false) {

                document.getElementById("type_error").innerHTML = 'Please Check Any One Option.';
                return false;
                alert();
            } else {
                document.getElementById("type_error").innerHTML = '';
                return true;
            }
        }
        function profileTitleCheck(value,id)
        {
            if (value == '')
            {
                document.getElementById(id+"_error").className = "error";
                document.getElementById(id+"_error").innerHTML = ' This field is required.';
                return false;
            }
            else if(value.length >200 || value.length < 2)
            {
                document.getElementById(id+"_error").className = "error";
                document.getElementById(id+"_error").innerHTML = ' Profile Title between 2 to 200 characters long.';
                return false;   
            }
            else
            {
                document.getElementById(id+"_error").innerHTML = '';
                return true;        
                
            }
        }

        function profileValidation() {

            //var a= fileCheck(document.getElementById("file").value);
            var b = profileTitleCheck(document.getElementById("profile_title").value, document.getElementById("profile_title").id);
            var c = blankCheck(document.getElementById("shortdescr").value, document.getElementById("shortdescr").id);
            var d = blankCheck(document.getElementById("company").value, document.getElementById("company").id);
            if ($("input[name=type]:checked").val() == 'Company') {
                var d = blankCheck(document.getElementById("serial_number").value, document.getElementById("serial_number").id);
            }
            var e = skillsCheck();
            var f = typeCheck();

            if (b && c && d && e && f && flag == 1) {

                return true;
            } else {
                return false;
            }
        }

    </script>
    <script type="text/javascript">
		$(document).ready(function() {
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>
    <style type="text/css">
        .ui-datepicker-month{
            float: left;
        }
    </style>
</head>
<?php


function subcategory($maincategory){
	
	$sql=mysql_query("select * from admin_skill where type='".$maincategory."'");
	$subcategory=mysql_num_rows($sql);
	$result='';
	for($i=1;$i<=$subcategory;$i++){
	$row1=mysql_fetch_array($sql);
	?>

    <input type="checkbox" name="skills[]" onBlur="skillsCheck();" value="<?php echo $row1['Skill_Name']; ?>">
    <?php echo $row1['Skill_Name']; ?> <br />
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
                <div class="section-overlay" style=""> </div>
                <div class="container section-content">
                    <div class="row-fluid">
                        <div class="row-fluid equal-cheight-no element-padding-medium element-vpadding-medium">
                            <div class="section-column span12">
                                <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                
                                	
									
                                    <div class="section-column span12">
                                    <h2 style="color:#F1C40F">Step 2 / 2</h2>
                                    </div>
                                    
                                    <div class="row-fluid element-padding-medium element-vpadding-default ">

                                        <div class="section-column span6">
                                            <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">

                                                <h3 class="title textcenter style1 bw-defaultpx dh-defaultpx divider-primary bc-default dw-default color-default" style="margin-bottom:45px"><span>Complete your signup process</span>
                                    			</h3>


                                                <h3>Profile Details</h3>
                                                <hr />

                                                
                                                
                                                <form id="contact-form" class="test" method="post" onSubmit="return profileValidation(this);" action="profile_action.php" enctype="multipart/form-data">

                                                
                                                    <input type="hidden" name="id" value="<?PHP echo $_POST['id']; ?>">
                                                    <input type="hidden" name="terms" value="<?PHP echo $_POST['terms']; ?>" />
                                                    <input type="hidden" name="username" value="<?php echo $_POST['username'];?>" />
                                                    <input type="hidden" name="Password" value="<?php echo $_POST['Password'];?>" />
                                                    <input type="hidden" name="email" value="<?PHP echo $_POST['email']; ?>" />
                                                    <input type="hidden" name="fname" value="<?php echo $_POST['fname'];?>" />
                                                    <input type="hidden" name="lname" value="<?php echo $_POST['lname'];?>" />
                                                    <input type="hidden" name="country" value="<?php echo $_POST['country'];?>" />
                                                    <input type="hidden" name="city" value="<?php echo $_POST['city'];?>" />

                                                                                                      
                                                    

                                                    <div class="row-fluid">
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
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-chain"></i></span>
                                                                <label><strong>Profile Picture:</strong></label><br />
                                                                <input type="file" name="profile_pic" id="file" onBlur="fileCheck(this.value);">
                                                                <div style="color:RED;" id="file_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 5px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select Profile Picture. It should be jpeg,jpg,png file and lessthan 10 mb size" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                        
                                                    </div>


                                                    <div class="row-fluid">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                                <label><strong>Profile Title:</strong></label>
                                                                <input name="profile_title" id="profile_title" type="text" onBlur="profileTitleCheck(this.value,this.id);" class="name" placeholder="e.g. Website Design & Development,PHP,Wordpress,Joomla Developer" />
                                                                <div style="color:RED;" id="profile_title_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 35px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Profile Title. For Ex.Php Developer,Web developer etc.." class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    	</div>
                                                        
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-envelope-o"></i></span>
                                                                <label><strong>Describe your services:</strong></label>
                                                                <textarea name="shortdescr" id="shortdescr" onBlur="blankCheck(this.value,this.id);" style="width:100%;" placeholder="Describe your services in short" rows="8"></textarea>
                                                                <div style="color:RED;" id="shortdescr_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 45px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Describe Your Service in short like how many experience you have!, etc..." class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    	</div>
                                                        <div class="span4"></div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <label><strong>I am a:</strong></label>
                                                                <br />
                                                                <input type="radio" name="type" id="type" onclick="typeCheck();" value="Freelancer"> Freelancer
                                                                <input type="radio" name="type" id="type" onclick="typeCheck();" value="Company"> Company
                                                                <div style="color:RED;" id="type_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 5px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select any one option it show what you are company or freelancer" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    	</div>
                                                        <div class="span4"></div>
                                                    </div>

                                                    <div class="row-fluid">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-chain"></i></span><input name="company" id="company" onBlur="blankCheck(this.value,this.id);" type="text" class="company" placeholder="Your Company Name" />
                                                                <div style="color:RED;" id="company_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 0px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Your Company Name" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    	</div>
                                                        <div class="span4"></div>
                                                    </div>

                                                    <div class="row-fluid" id="company_serial">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-chain"></i></span><input name="serial_number" id="serial_number" onBlur="blankCheck(this.value,this.id);" type="text" class="company" placeholder="Your Company  Serial Number" />
                                                                <div style="color:RED;" id="serial_number_error" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 5px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Company Serial Number.if you are a company then fill this field" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                        <div class="span4"></div>
                                                    </div>

                                                    <div class="row-fluid" id="experience">
                                                        <div class="span8">
                                                            <div class="control-wrap">
                                                                <span class="icon"><i class="fa fa-chain"></i></span><input name="experience" id="datepicker" onBlur="blankCheck(this.value,this.id);" type="text" class="experience" placeholder="Select Date When Start Your Career" />
                                                                <div style="color:RED;" id="experience" class="error"></div>
                                                            </div>
                                                        </div>
                                                        <div style="margin: 5px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Enter Company Serial Number.if you are a company then fill this field" class="right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                        <div class="span4"></div>
                                                    </div>
	                                            </div>


                                            <?php 
										   $res=mysql_query("select * from admin_skill_category where Status='Published'");
										  
										   ?>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <h3>Technical Skills</h3>
                                                    <hr />
                                                    <div class="control-wrap">
                                                        <div class="span10">
                                                            <?php
															while($row=mysql_fetch_array($res))
															{
															?>
                                                                <label><strong><?php echo $row['skill_category']; ?></strong></label><br/>
                                                                <?php echo subcategory($row['CodeId']); ?>
                                                                <?php } ?>
                                                                
                                                        </div>
                                                    </div>
                                                    <div style="color:RED;" id="skill_error" class="error"></div>
                                                </div>
                                                <div style="margin: 5px 0px 0px 0px;" class="bs-example">
                                                        <ul class="list-inline">
                                                            <li>

                                                                <a data-toggle="tooltip" data-html="true" data-placement="right" title="Select the skills you have.It is use full when bid on project" class "right_tooltip"><img src="<?php echo WebUrl; ?>images/question.png" width="20" height="20"></a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                <div class="span4"></div>
                                            </div>
                                            <div class="row-fluid">
                                                <div class="span8">
                                                    <input type="submit" name="submit" id="profile_submit" class="main-button" value="Save">
                                                    <div id="msg" class="message"></div>
                                                </div>

                                            </div>
                                            </form>
                                        </div>
                                        <div class="section-column span6">
                                        
                                        <img src="<?php echo WebUrl;?>images/twostepregister.png" width="100%" height="100%">
                                        <p align="justify">
                                        <h5>You will have a chance to complete this information through your Edit Profile page</h5>
                                        </p>
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
            
            <!-- End footer -->
               <script>
              $( function() {
                $( "#datepicker" ).datepicker({
                    dateFormat: "dd-mm-yy",
                    changeMonth: true,//this option for allowing user to select month
                    changeYear: true, //this option for allowing user to select from year range
                    yearRange: "c-25:nnnn"
                });
              } );
              </script>

        </body>


</html>