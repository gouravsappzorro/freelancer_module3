<?php session_start(); ?>
<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
<?php							/**================================================================================||
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
								||=================================================================================**/      

?>




<?php if(isset($_SESSION['Email']) && isset($_SESSION['UserId']) && isset($_SESSION['UserName']))     { ?>

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
		
			var oFCKeditor = new FCKeditor( 'PageContent' ) ;
			oFCKeditor.BasePath	= '../MyInclude/fckeditor/';
			oFCKeditor.ReplaceTextarea() ;
		}

	</script>

    <style>
        

        section {
            width: 100%;
            margin: auto;
            text-align: left;
        }
    </style>
	<script type="text/javascript" src="AddNewPageValid.js"></script>
	
		<style>
		.error{ color:#FF0000; }
		</style>
	<!-- Validation Js Ending --->
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
				
			
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubheader.php"; ?>
				
				<!-- /Breadcrumbs line -->
				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg"> <!-- .row-bg -->
					

					
					
				</div> <!-- /.row -->
				<!-- /Statboxes -->
		
				

	

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> ADD NEW PAGE</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
										
				<?php 
				
							
						if(isset($_POST['PrivacyPolicy']))
						{
						 	$SeoTitle         = $_POST['SeoTitle'];
							$SeoKeywords      = $_POST['SeoKeywords'];
							$SeoDescription   = $_POST['SeoDescription'];
							$PageTitle        = $_POST['PageTitle'];
							$PageContent     = $_POST['PageContent'];
							
											
							$Update           =	"UPDATE admin_staticpage SET
							PageTitle         = '$PageTitle',
							Content       = '$PageContent',
							
							SeoTitle          = '$SeoTitle',
							
							SeoKeywords       = '$SeoKeywords',
							SeoDescription    = '$SeoDescription'
					WHERE	CodeId            = '33333' ";	
							
							
							
							$InData           = mysql_query($Update); 	
							if($InData)
							{
								echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Your New Page Update Successfully!</strong>.
									   </div>';
							}	
							
							
							else
							{
								echo '<div class="alert alert-danger fade in">
												<i class="icon-remove close" data-dismiss="alert"></i>
												<strong>You Page Not Update</strong> 
									</div>';
							
							
						}	}
						
							$Check = mysql_query("SELECT * FROM admin_staticpage where CodeId='33333'");
							
							$row =mysql_fetch_array($Check);			
				?>				
								
					
									
				<form name="individual_signup" class="form-horizontal row-border"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return JayCreatedValidForm(this);" method="post"  enctype="multipart/form-data">
						
									<div class="form-group">
									
										<label class="col-md-2 control-label">Page Title<span class="required">*</span></label>
										<div class="col-md-9">
															<label for="PageTitle" class="error" id="PageTitle_error"></label>
										
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-cog"></i></span>
																		<input type="text" name="PageTitle" value="<?php echo $row['PageTitle']; ?>" id="PageTitle"  title="PageTitle" onFocus="if (this.value == 'PageTitle') {this.value = '';}" onBlur="PageTitleCheck(this.value)" class="form-control bs-tooltip" >
																	</div>
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-2 control-label">Page Content<span class="required">*</span></label>
										<div class="col-md-9"><label for="MetaDescription" class="error" id="MetaDescription_error"></label>
														<section id="editor">
														
														 <textarea id="PageContent" name="PageContent"  class="form-control" ><?php echo $row['Content']; ?></textarea>
														</section>
										</div>
										
									</div>
									
							<label class="col-md-6 control-label pull-left ">SEO PROPERTIES (MOD RE-WRITE)</label><br /><br />
									
									
				
									
									
									
									<div class="form-group">
										<label class="col-md-2 control-label">Title<span class="required"></span></label>
										<div class="col-md-4">
											<label for="Location" class="error" id="Location_error"></label>
													<div class="input-group">
														<span class="input-group-addon"><i class="icon-reorder"></i></span>
															<input type="text" name="SeoTitle" class="form-control" value="<?php echo $row['SeoTitle']; ?>" placeholder="SeoTitle">
													</div>
										</div>
									</div>
									
									
								<div class="form-group">
									<label class="col-md-2 control-label">Keywords<span class="required"></span></label>
									<div class="col-md-4">
										<label for="Location" class="error" id="Location_error"></label>
												<div class="input-group">
													<span class="input-group-addon"><i class="icon-reorder"></i></span>
								     					<textarea name="SeoKeywords" id="SeoKeywords" title="Keywords"  class="form-control bs-tooltip" ><?php echo $row['SeoKeywords']; ?></textarea>
												</div>
								   </div>
							 </div>
									
									
							<div class="form-group">
							    <label class="col-md-2 control-label">SeoDescription<span class="required"></span></label>
								<div class="col-md-4">
									<label for="Location" class="error" id="Location_error"></label>
										<div class="input-group">
										<span class="input-group-addon"><i class="icon-reorder"></i></span>
													<textarea name="SeoDescription" id="SeoDescription" title="SEO || Description"  class="form-control bs-tooltip" ><?php echo $row['SeoDescription']; ?></textarea>
										</div>
								</div>
							</div>
							<br />
								

								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
											
												
												<input type="submit" id="submit-visit" name="PrivacyPolicy" value="Update" class="btn btn-primary pull-center">								
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
<?php }
	  else 
	  { ?> 
	  				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../LogIn.php" > 
<?php } ?>

<?php							/**================================================================================||
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
								||=================================================================================**/      

?>
