<?php session_start(); ?>
<?php include "../MyInclude/Db_Conn.php"; ?>
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
	<title>Admin Panel Dashboard</title>
<?php include "../MyInclude/HomeScript.php"; ?>
	<?php include "../MyInclude/MyEditor.php"; ?>
	<script type="text/javascript">
	
		window.onload = function()
		{
			// Automatically calculates the editor base path based on the _samples directory.
			// This is usefull only for these samples. A real application should use something like this:
			// oFCKeditor.BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
			//var sBasePath = document.location.href.substring(0,document.location.href.lastIndexOf('../MyInclude/FCKEditor/_samples')) ;
		
			var oFCKeditor = new FCKeditor( 'BlogContent' ) ;
			oFCKeditor.BasePath	= '../MyInclude/fckeditor/';
			oFCKeditor.ReplaceTextarea() ;
		}
	</script>
    <style>
      section {   width: 100%; margin: auto; text-align: left; }
	  .error{ color:#FF0000; }
    </style>
	<script type="text/javascript" src="AddNewPageValid.js"></script>
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

				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Page Content ===-->
						<!-- /Page Header -->

				<?php 
						$GetCo = mysql_num_rows(mysql_query("select * from admin_blog_cat where Status = 'Published'"));
						
					    $Sky    = mysql_query("SELECT SUM(Count)  AS totalcount FROM admin_visiter_count where Status = 'Blog' ");
				  while($coni   = mysql_fetch_array($Sky)){ 
				        $Visit  = $coni['totalcount']  ;  }    	
	
				?>
				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg"> <!-- .row-bg -->
					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual cyan">
									<div class="statbox-sparkline">15,30,22,25,26,30,27</div>
								</div>
								<div class="title">Total Pages</div>
								<div class="value"><?php echo $GetCo; ?></div>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual green">
									<div class="statbox-sparkline">30,29,22,15,20,30,32</div>
								</div>
								<div class="title">Total Visitors</div>
								<div class="value"><?php echo $Visit; ?></div>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

				</div> <!-- /.row -->
				<!-- /Statboxes -->
				<div class="row">
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Edit Your Blog</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">	
				<?php  $Code  = $_GET['AJCOde59'];
						if(isset($_POST['EditBlog']))
						{
							$BlogDate           =  $_POST['BlogDate'];
							$BlogCat            =  $_POST['BlogCat'];
							$BlogTitle          =  $_POST['BlogTitle'];
							$BlogImage          =  $_FILES['BlogImage']['name'];
							$DImage             =  $_POST['DImage'];
							$BlogContent1       =  $_POST['BlogContent'];
							$BlogUrl1           =  $_POST['Url'];
							$SeoTitle           =  $_POST['SeoTitle'];
							$SeoKeywords        =  $_POST['SeoKeywords'];
							$SeoDescription     =  $_POST['SeoDescription'];
							$Status             =  $_POST['Status'];
							$BlogUrl            =  str_replace(" ","-",$BlogUrl1);
							$BlogContent        =  str_replace("'","",$BlogContent1);//remove ' attribute
							$BlogFormate        =  strtotime($BlogDate); 
							
						    $BlogDateNew        = date('d/M', $BlogFormate);
								
								
							if(isset($BlogImage)):
		 		
		 						 move_uploaded_file($_FILES["BlogImage"]["tmp_name"],"./BlogImages/".$_FILES["BlogImage"]["name"]);
		 					endif;									
							
							if($BlogImage == ''):
								$BlogImage = $DImage;
							endif;	
												
							$Update          = "UPDATE admin_blog_content SET
							Status           = '$Status',
							BlogCat          = '$BlogCat',
							BlogDate         = '$BlogDate',
							BlogDateNew      = '$BlogDateNew',
							BlogTitle        = '$BlogTitle',
							BlogImage        = '$BlogImage',
							BlogUrl          = '$BlogUrl',
							BlogContent      = '$BlogContent',
							SeoTitle         = '$SeoTitle',
							SeoKeywords      = '$SeoKeywords',
							SeoDescription   = '$SeoDescription'	
					WHERE   BlogCode         = '$Code'";	
							
							$InData           = mysql_query($Update); 	
							if($InData)
							{
								echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
								echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your Blog Content Update Successfully!</strong>.
									   </div>';
							    echo '<meta http-equiv="refresh" content="3; url=./index.php" />';	
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
						$Blog = mysql_fetch_array(mysql_query("SELECT * FROM admin_blog_content WHERE BlogCode = '".$Code."' "));			
				?>				
												
				<form name="individual_signup" class="form-horizontal"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return JayCreatedValidForm(this);" method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-2 control-label">Blog Title<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="BlogTitle" class="error" id="BlogTitle_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-cog"></i></span>
													<input type="text" name="BlogTitle" id="BlogTitle" value="<?php echo $Blog['BlogTitle'] ?>"  title="Blog Title" onFocus="if (this.value == 'BlogTitle') {this.value = '';}" onBlur="BlogTitleCheck(this.value)" class="form-control bs-tooltip" >
											</div>
									</div>
						   </div>
						   <div class="form-group">
								
					      <?php $BlogCat1 = mysql_query("select * from admin_blog_cat "); ?>
									
										<label class="col-md-2 control-label">Blog Category<span class="required">*</span></label>
										<div class="col-md-6">
															<label for="BlogCat" class="error" id="BlogCat_error"></label>
										
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-arrow-down"></i></span>
																		<select name="BlogCat" id="BlogCat"  title="Blog Category" onFocus="if (this.value == 'BlogCat') {this.value = '0';}" onBlur="BlogCatCheck(this.value)" class="form-control bs-tooltip" >
																		<option value="0">Select Category</option>
																		
																	<?php while($SCat = mysql_fetch_array($BlogCat1)) :?>
																		<option <?php if($Blog['BlogCat'] == $SCat['CatCode']) : echo 'selected="selected"'; endif?> value="<?php echo $SCat['CatCode']; ?>"><?php echo $SCat['CategoryName']; ?></option>
																	<?php endwhile ?>	
																		</select>
																	</div>
										</div>
										
								</div>
						  <div class="form-group">
						  	<label class="col-md-2 control-label">Blog Date<span class="required">*</span></label>
								<div class="col-md-6">
									<label for="BlogDate" class="error" id="BlogDate_error"></label>																	
										<input type="text" name="BlogDate" id="BlogDate" value="<?php echo $Blog['BlogDate'] ?>" onFocus="if (this.value == 'BlogDate') {this.value = '';}" onBlur="BlogDateCheck(this.value)" class="form-control datepicker">
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Blog Image<span class="required">*</span></label>
								<div class="col-md-4">
									<label for="BlogImage" class="error" id="BlogImage_error"></label>
										<input type="File" name="BlogImage" id="BlogImage"  title="BlogImage" class="form-control bs-tooltip" >
										<input type="hidden" name="DImage" value="<?php echo $Blog['BlogImage'] ?>">
								</div>	<label class="col-md-1 control-label"><a class="bs-tooltip" title="Click View for Show Image" href="javascript:openwindow('./BlogImages/<?php echo $Blog['BlogImage'] ?>')"><font color="red"><b>View</b></font></a> </span></label>
						</div>	
						<div class="form-group">
							<label class="col-md-2 control-label">Blog Content <span class="required">*</span></label>
								<div class="col-md-9"><label for="BlogContent" class="error" id="BlogContent_error"></label>
									<section id="editor">
										<textarea id="BlogContent" name="BlogContent" onFocus="if (this.value == 'BlogContent') {this.value = '';}" onBlur="BlogContentCheck(this.value)"  class="form-control"><?php echo $Blog['BlogContent'] ?></textarea>
									</section>
								</div>
						</div>
								
						<div align="center"  class="alert alert-info fade in col-md-11" >
								<i class="icon-remove close" data-dismiss="alert"></i>
									<strong>SEO PROPERTIES (MOD RE-WRITE)!</strong> 
						</div>
						<div class="form-group">
								<br /><br />
							<label class="col-md-2 control-label">Blog Url<span class="required">*</span></label>
								<div class="col-md-8">
									<label for="Url" class="error" id="Url_error"></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-reorder"></i></span>
												<input type="text" class="form-control" name="Url" id="Url" value="<?php echo $Blog['BlogUrl']; ?>" placeholder="Url Name.." onFocus="if (this.value == 'Url') {this.value = '';}" onBlur="UrlCheck(this.value)">
										</div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Title<span class="required">*</span></label>
								<div class="col-md-8">
									<label for="Location" class="error" id="Location_error"></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-reorder"></i></span>
												<input type="text" name="SeoTitle" value="<?php echo $Blog['SeoTitle']; ?>" class="form-control" placeholder="SeoTitle">
										</div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">Keywords<span class="required">*</span></label>
								<div class="col-md-8">
									<label for="Location" class="error" id="Location_error"></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-reorder"></i></span>
												<textarea name="SeoKeywords" id="SeoKeywords"  title="Keywords"  class="form-control bs-tooltip" ><?php echo $Blog['SeoKeywords']; ?></textarea>							</div>
								</div>
						</div>
						<div class="form-group">
							<label class="col-md-2 control-label">SeoDescription<span class="required">*</span></label>
								<div class="col-md-8">
									<label for="Location" class="error" id="Location_error"></label>
										<div class="input-group">
											<span class="input-group-addon"><i class="icon-reorder"></i></span>
												<textarea name="SeoDescription" id="SeoDescription" title="SEO || Description"  class="form-control bs-tooltip" ><?php echo $Blog['SeoDescription']; ?></textarea>		</div>
								</div>
						</div><br />
												
							
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
																							
													<select class="btn btn-primary pull-center" style="background:#006666" name="Status">
														<option <?php if($Blog['Status'] == 'Published'): echo 'selected="selcected"'; endif; ?> value="Published">@Published</option>
														<option <?php if($Blog['Status'] == 'Pending'): echo 'selected="selcected"'; endif; ?> value="Pending">@Pending</option>
														
													</select>
												
												<input type="submit" id="submit-visit" name="EditBlog" value="Update" class="btn btn-primary pull-center">								
									</form>	
																							
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
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


	<script type="text/javascript">
			
		"use strict";

$(document).ready(function(){

	//===== Date Pickers & Time Pickers & Color Pickers =====//
	$( ".datepicker" ).datepicker({
		defaultDate: +7,
		showOtherMonths:true,
		autoSize: true,
		appendText: '<span class="help-block">(dd-mm-yyyy)</span>',
		dateFormat: 'dd-mm-yy'
		});

	$('.inlinepicker').datepicker({
		inline: true,
		showOtherMonths:true
	});

	$('.datepicker-fullscreen').pickadate();
	$('.timepicker-fullscreen').pickatime();


	});
	</script>
	
	<script language="javascript" type="text/javascript">
function openwindow(path)
{
artclasses = window.open (  path, "artclasses", " location = 1, resizable = yes, status = 1, scrollbars = 1, width = 500, height=300 ");
artclasses.moveTo (200,100);
}
</script>

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
