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
	
	 
	 <script type="text/javascript" src="../plugins/pickadate/picker.js"></script>
  	 <script type="text/javascript" src="../plugins/pickadate/picker.date.js"></script>

	
	<script type="text/javascript" src="../assets/js/demo/ui_general.js"></script>
	<?php include "../MyInclude/MyEditor.php"; ?>
	
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
								<h4><i class="icon-reorder"></i> ADD NEW BLOG CATEGORY</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
				<?php 
				
						if(isset($_POST['CategoryUpdate']))
						{
						  
							
							$AddCategory     = $_POST['AddCategory'];
							$Status          = 'Published';
							$CodeId          = rand(100000, 999999);
								
							
							$Check = mysql_query("SELECT * FROM admin_blog_cat WHERE CategoryName = '".$AddCategory."'  ");
							$Count = mysql_num_rows($Check);
							
							
							if($Count == '0')
							{
																			
								$Insert        = "INSERT INTO admin_blog_cat SET
								CatCode        = '".$CodeId."',
								Status         = '".$Status."',
								CategoryName   = '".$AddCategory."',										
								Date           = '".date("Y-m-d")."' ";	
							
								$InData           = mysql_query($Insert); 	
								if($InData)
								{
									echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
														<strong>Your New Category  Created Successfully!</strong>.
									  	   </div>';
								}	
								else
								{
									echo '<div class="alert alert-danger fade in">
												<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Please Try Again Somethings wrong!</strong> .
										</div>';
								}
							
							}
							else
							{
								echo '<div class="alert alert-danger fade in">
												<i class="icon-remove close" data-dismiss="alert"></i>
												<strong>Please Check  Ctegory Name. Its Already Exits.. Change It... </strong> 
									</div>';
							}
							
						}				
				?>				
												
				<form name="individual_signup" class="form-horizontal "  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return JayCreatedValidForm(this);" method="post"  enctype="multipart/form-data">
								
									
									<div class="form-group">
									
										<label class="col-md-3 control-label"><span class="required"></span></label>
										<div class="col-md-7">
															<br />
										</div>
										
									</div>
									
									
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Add Category<span class="required">*</span></label>
										<div class="col-md-5">
											<input type="text" name="AddCategory" title="Add Category" class="form-control bs-tooltip" required>
										</div>
										
									</div>
									
								
									
								<br /><br /><br />
								
												
							
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
											
													
												
												<input type="submit" id="submit-visit" name="CategoryUpdate" value="Submit" class="btn btn-primary pull-right">								
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
