<?php include "../MyInclude/MyConfig.php"; ?>
<?php
/**================================================================================||
||      *Developer : Green Cubes Solutions										   ||
||      *Website   : www.greencubes.co.in										   ||
||      *Date      : 25-11-2014													   ||
||																				   ||
||      *  NOTICE OF LICENSE  *													   ||
|| 																				   ||
|| 																				   ||
||		   This source file is subject to the Company Copyright 				   ||
||		   and its use by any other party without concern of Greencubes        	   ||
||  	   or trying to sell this code will be considered illegal 				   ||
||		   and any legal actions can be undertaken.								   ||
||		   If you want to receive a copy of the license, please send an email      ||
||  	   to info@greencubes.co.in, for further procedure						   ||
||=================================================================================**/        ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Edit Project</title>
<?php include "../MyInclude/HomeScript.php"; ?>
<?php include "EditClientProjectvalidation.php";?>
	
    <style>
      section {   width: 100%; margin: auto; text-align: left; }
	  .error{ color:#FF0000; }
    </style>
	<script type="text/javascript" src="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.js"></script>
    <link rel="stylesheet" type="text/css" href="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.css" />
</head>
<body>

	<?php include "../MyInclude/HomeHeader.php"; ?>

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				
				<?php include "../MyInclude/HomeSearch.php"; ?>
				
				<!--=== Navigation ===-->
				
				<?php include "../MyInclude/HomeNavigation.php"; ?>
				
				<!-- /Navigation -->
				
				
				<!--=== Notify Navigation ===-->
				
				<?php /*include "../include/notify-navigation.php";*/ ?>
				
				<!-- /Notify Navigation -->
				
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				<?php //include "../include/subsubheader.php"; ?>

				<br>
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Edit Project</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">	
                            
						<?php  
						$Code  = $_GET['AJCOde59'];
						
						$project = mysql_fetch_array(mysql_query("SELECT * FROM post_projects WHERE project_id = '".$Code."' "));			
											
						if(isset($_POST['EditProject']))
						{
							if($_FILES['file']['name']!='' and isset($_FILES['file']['name']))
							{
								$image=$_FILES['file']['name'];
							}
							else
							{
								$image=$_REQUEST['hidden_file'];
							}
							$target_dir ="../../Projects/";
							$target_file =$target_dir . basename($_FILES["file"]["name"]);
							
							$cate_res=mysql_query("SELECT * FROM `admin_category` WHERE Id='".$_REQUEST['category']."'");
							$cate=mysql_fetch_array($cate_res);
							$category=$cate['CategoryName'];
							
							if(isset($_REQUEST['subcategory']) and $_REQUEST['subcategory']!='')
							{
								$sub_cate=implode(',', $_REQUEST['subcategory']);
							}
							else
							{
								$sub_cate=$_REQUEST['subcategory_h'];
							}
							
							$title=mysql_real_escape_string($_REQUEST['title']);
							
							if(isset($_REQUEST['skills']) and $_REQUEST['skills']!='')
							{
								$skills=mysql_real_escape_string(implode(',',$_REQUEST['skills']));
							}
							else
							{
								$skills=mysql_real_escape_string($_REQUEST['skills_h']);
							}
							$desc=mysql_real_escape_string($_REQUEST['description']);
							$offer=$_REQUEST['accept_offers'];
							$competible=implode(',',$_REQUEST['competible']);
	//						$sub_cate=implode(',', $_REQUEST['subcategory']);
							$location=$_REQUEST['location'];
							$exp=$_REQUEST['exp'];
							$project_type=$_REQUEST['project_type'];
							$currency=$_REQUEST['currency'];
							$budget=$_REQUEST['budget'];
							$improve=mysql_real_escape_string($_REQUEST['improve']);
							
							$update		=	"update post_projects set
							`category_of _work`		=	'".$category."',
							`sub_category_of _work`	=	'".$sub_cate."',
							`title`					=	'".$title."',
							`skills`				=	'".$skills."',
							`description`			=	'".$desc."',
							`image`					=	'".$image."',
							`accept_offers`			=	'".$offer."',
							`competible`			=	'".$competible."',
							`location`				=	'".$location."',
							`experience`			=	'".$exp."',
							`type_of_project`		=	'".$project_type."',
							`currency`				=	'".$currency."',
							`budget`				=	'".$budget."',
							`help`					=	'".$improve."'
							where
							`project_id`			=	'".$Code."'";
							$InData		= mysql_query($update); 	
							
							if($InData)
							{
								move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
								echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
								echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Project Update Successfully!</strong>.
									   </div>';
							    echo '<meta http-equiv="refresh" content="3; url=./ClientProjects.php?TestCode='.$_GET['TestCode'].'" />';	
								$_SESSION['UpdateSu'] = 'Done';
							}	
							else
							{
								echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Please Try Again Somethings wrong!</strong> .
									</div>';
							}
						}							
						
				?>				
												
				<form name="update_projects" class="form-horizontal"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return ProjectValidation(this);" method="post"  enctype="multipart/form-data">
                			<div class="form-group">
								<label class="col-md-2 control-label">Category of work<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="Category" class="error" id="category_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-gear"></i></span>
													<select name="category" id="category" onBlur="categoryCheck(this.value)" onChange="subcategorFatch(this.value);" class="form-control bs-tooltip">
                            <option value="Select">Select category of work</option>
                            						<?php
													$res=mysql_query("select * from admin_category");
													while($row=mysql_fetch_array($res))
													{
													?>
							                            <option value="<?php echo $row['Id']; ?>" <?php if($project['category_of _work']==$row['CategoryName']){echo "selected='selected'";}?>><?php echo $row['CategoryName']; ?></option>
                                                    <?php	
													}
													?>
                          							</select>
											</div>
									</div>
						   </div>
                           
                           <div class="form-group">
                           		<div id="subcategory"></div>
                                <input type="hidden" name="subcategory_h" id="subcategory_h" value="<?php echo $project['sub_category_of _work'];?>">
						   </div>
                           
							<div class="form-group">
								<label class="col-md-2 control-label">Title<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="Title" class="error" id="project_title_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-gear"></i></span>
                                                	<input name="title" id="project_title" onBlur="blankCheck(this.value,this.id);" type="text" title="Project Title" onFocus="if (this.value == 'Title') {this.value = '';}" onBlur="Title(this.value)" class="form-control bs-tooltip" value="<?php echo $project['title'];?>" />
											</div>
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">Skills<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="Skills" class="error" id="required_skill_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-gear"></i></span>
                                                <select id="tokenize_placehoder" style="margin: 0px; padding: 0px; border: 0px; display:none; width:100%;" name="skills[]" class="tokenize-sample" multiple="multiple" title="Required Skills" onFocus="if (this.value == 'Required Skills') {this.value = '';}" class="form-control bs-tooltip" onBlur="skillCheck(this.value)">
                            
                            					<option>sdsd</option>
                            					<?php $skill_res=mysql_query("select * from admin_skill");
		  										while($row=mysql_fetch_array($skill_res))
		  										{
												?>
                            					<option value="<?php echo $row['Skill_Name']; ?>"><?php echo $row['Skill_Name']; ?></option>
                            					<?php }?>
                          						</select>
                                                <input type="hidden" name="skills_h" value="<?php echo $project['skills'];?>">
                                                <div id="skills"></div>
                                                <script type="text/javascript">
                                                    $('select#tokenize_placehoder').tokenize({
                                                        placeholder: "e.g. PHP, Developing, Wordpress"
                                                    });
                                                </script>
													
											</div>
                                            
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">Description<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="description" class="error" id="project_des_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-cog"></i></span>
													<textarea name="description"  class="form-control bs-tooltip" id="project_des" onBlur="blankCheck(this.value,this.id);" placeholder="Briefly describe your project" rows="10" style="width:100%;" title="Description" onFocus="if (this.value == 'Description') {this.value = '';}"><?php echo $project['description'];?></textarea>
											</div>
                                    </div>        
                               </div>
                                            
                               <div class="form-group">
								<label class="col-md-2 control-label">Upload Image or Documents<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="file" class="error" id="file_error"></label>             
                                            <div class="input-group">
												<input type="file" name="file" id="file" onBlur="fileCheck(this.value);" class="form-control bs-tooltip" title="File or Document Upload" onFocus="if (this.value == 'File or Document Upload') {this.value = '';}">
												<input type="hidden" name="hidden_file" value="<?php echo $project['image'];?>">
											</div>
									</div>
						   </div>
						   
						  <div class="form-group">
								<label class="col-md-2 control-label">Accept offers from Freelancer or Company<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="offer" class="error" id="file_error"></label>             
                                            <div class="input-group">
												
                                                <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="freelancer" <?php if($project['accept_offers']=='freelancer'){?> checked<?php }?> > Freelancer
                                                        <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="company" <?php if($project['accept_offers']=='company'){?> checked<?php }?> > Company
                                                        <input type="radio" name="accept_offers" id="accept_offers" onBlur="offerCheck();" value="both" <?php if($project['accept_offers']=='both'){?> checked<?php }?> > Both

											</div>
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">Should be compatible with:<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="Compitable with" class="error" id="competible_error"></label>             
                                            <div class="input-group">
												<?php $comp=explode(",",$project['competible']);?>
                                                <input type="checkbox" name="competible[]" id="competible" value="mobiles" <?php if(in_array('mobiles',$comp)){echo 'checked="checked"';}?>> Mobiles
                                                <input type="checkbox" name="competible[]" id="competible" value="pc" <?php if(in_array('pc',$comp)){echo 'checked="checked"';}?>> PC
                                                <input type="checkbox" name="competible[]" id="competible" value="tablets" <?php if(in_array('tablets',$comp)){echo 'checked="checked"';}?>> Tablets
                                                <input type="checkbox" name="competible[]" id="competible" value="ipads" <?php if(in_array('ipads',$comp)){echo 'checked="checked"';}?>> iPads
											</div>
									</div>
						   </div>
							
                            
                            
                            
                        <div class="form-group">
                        <label class="col-md-2 control-label">Choose desired location of developer<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="Country" class="error" id="location_error"></label>
                            
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-arrow-down"></i></span>
                                    <select id="location" name="location" onBlur="blankCheck(this.value,this.id)" onFocus="if (this.value == 'Desired Location') {this.value = '0';}" class="form-control bs-tooltip" title="Desired Location">
                                            <option value="Local" <?php if($project['location']=='Local'){ echo "selected='selected'";} ?>>Local</option>
                                            <option value="International" <?php if($project['location']=='International'){ echo "selected='selected'";} ?>>International</option>
                                      </select>
                                </div>
                            </div>
                        </div>
								
						<div class="form-group">
                        	<label class="col-md-2 control-label">Experience<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="Experience" class="error" id="exp_error"></label>
                            
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-arrow-down"></i></span>
                                    
                                    <select name="exp" id="exp" onFocus="if (this.value == 'Experience') {this.value = '0';}" class="form-control bs-tooltip" title="Experience">
                                        <option  value="Allow all" <?php if($project['experience']=='Allow all'){ echo "selected='selected'";}?>>Allow all</option>
                                        <option  value="1+" <?php if($project['experience']=='1+'){ echo "selected='selected'";}?>>1 Year and above</option>
                                        <option  value="3+" <?php if($project['experience']=='3+'){ echo "selected='selected'";}?>>3 Year and above</option>
                                        <option  value="5+" <?php if($project['experience']=='5+'){ echo "selected='selected'";}?>>5 Year and above</option>
                                        <option  value="10+" <?php if($project['experience']=='10+'){ echo "selected='selected'";}?>>10 Year and above</option>
                                        <option  value="15+" <?php if($project['experience']=='15+'){ echo "selected='selected'";}?>> 15 Year and above</option>
                                        <!--<option  value="1-3"> 1-3 Year</option>
                                        <option  value="3-5"> 3-5 Year</option>
                                        <option  value="5-10"> 5-10 Year</option>
                                        <option  value="10-15"> 10-15 Year</option>
                                        <option  value="15+"> 15+ Year</option>-->
                                      </select>
                                    
                                </div>
                            </div>
                        </div>
						
						<div class="form-group">
                        <label class="col-md-2 control-label">Type of project<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="Type of Project" class="error" id="project_type_error"></label>
                            
                                <div class="input-group">
                                <input type="radio" name="project_type" id="project_type" onBlur="project_typeCheck();" value="fixed" <?php if($project['type_of_project']=='fixed'){ echo "checked='checked'";}?>> Fixed Price
                                                        <input type="radio" name="project_type" id="project_type" onBlur="project_typeCheck();" value="hourly" <?php if($project['type_of_project']=='hourly'){ echo "checked='checked'";}?>> Hourly

                                </div>
                            </div>
                        </div>				
						
                        
                        <div class="form-group">
                        	<label class="col-md-2 control-label">Select Currency<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="Currency" class="error" id="currency_error"></label>
                            
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-arrow-down"></i></span>
                                    
                                    <select name="currency" id="currency" onFocus="if (this.value == 'Currency') {this.value = '0';}" class="form-control bs-tooltip" title="currency">
                                         <?php
										 						$currency_res=mysql_query("select * from admin_currency order by Currency");
																while($row=mysql_fetch_array($currency_res))
																{
															?>
                            <option value="<?php echo $row['Currency']; ?>" <?php if($row['Currency']==$project['currency']){ echo "selected='selected'";}?>><?php echo $row['Currency']; ?></option>
                            <?php } ?>
                                      </select>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="form-group">
                            <label class="col-md-2 control-label">Budget<span class="required">*</span></label>
                                <div class="col-md-6">
										<label id="budget_error" class="error" for="Budget"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-gear"></i></span>
                                                	<input type="text" value="<?php echo $project['budget'];?>" class="form-control bs-tooltip" onfocus="if (this.value == 'Budjet') {this.value = '';}" title="" onBlur="budgetCheck(this.value)" id="budget" name="budget" data-original-title="Project Title">
											</div>
									</div>
						   </div>
                        	
                            
                            <div class="form-group">
								<label class="col-md-2 control-label">Help us improve, is there another section you were missing?<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="improve" class="error" id="project_des_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-cog"></i></span>
													<textarea name="improve"  class="form-control bs-tooltip" id="improve" placeholder="Help us improve, is there another section you were missing?" rows="10" style="width:100%;" title="Help" onFocus="if (this.value == 'Help') {this.value = '';}"><?php echo nl2br($project['help']);?></textarea>
											</div>
                                    </div>        
                               </div>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
																							
													
												
												<input type="submit" id="submit-visit" name="EditProject" value="Update" class="btn btn-primary pull-center">								
										
																							
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
                                </form>
                               
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				</div> <!-- /.row -->

			
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>
</body>
</html>
<script>
function subcategorFatch(cate) {
	//var id = document.getElementById("country").value;
	var dataString = 'id=' + cate;
	$.ajax({
		type: "POST",
		url: "fatch_subcategory.php",
		data: dataString,
		cache: false,
		success: function(html) {
			$("#subcategory").html(html);
			$('.cat-tooltip').show();
		}
	});
}
</script>