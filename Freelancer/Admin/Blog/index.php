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
	<title>Admin Panel - View All Web Page</title>

	<?php include "../MyInclude/HomeScript.php"; ?>
		
	
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
				
				<?php // include "../include/notify-navigation.php"; ?>
				
				<!-- /Notify Navigation -->
				
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubheader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				<?php // include "../include/subsubheader.php"; ?>
				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
						<!-- /Page Header -->

				<div class="row">
                <br/><br/><br/>
                </div>
	<?php 
				 if(isset($_GET['AJCOde59']) and $_GET['AJCOde59'] !=='')
					   {
					   			$Delete = mysql_query("DELETE FROM admin_blog_content WHERE BlogCode = '".$_GET['AJCOde59']."' ");
								if($Delete)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=index.php" >';
									$_SESSION['DeleteSu'] = 'Done';
								}
					   } 
					   
				 if(isset($_GET['DEAJ09148']) and $_GET['DEAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE admin_blog_content SET Status = 'Published' WHERE BlogCode = '".$_GET['DEAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=index.php" >';
									$_SESSION['SETAcSu'] = 'Published';
								}
					   } 
					   
					   
				 if(isset($_GET['ActAJ09148']) and $_GET['ActAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE admin_blog_content SET Status = 'Pending' WHERE BlogCode = '".$_GET['ActAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=index.php" >';
									$_SESSION['SETAcSu1'] = 'Pending';
								}
					   } ?>	   

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php 	if(isset($_SESSION['UpdateSu']) and $_SESSION['UpdateSu'] == 'Done')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Blog Updated!</strong>.
								   </div>';
						    unset($_SESSION['UpdateSu']);
			           }
					   if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Blog Deleted!</strong>.
									  </div>';
						    unset($_SESSION['DeleteSu']);
			           }
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] = 'Published')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Blog Published!</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu']);
			           }
					   if(isset($_SESSION['SETAcSu1']) and $_SESSION['SETAcSu1'] = 'Pending')
						{  
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Blog Pending!</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu1']);
			           }
						if(isset($_POST['Delete']))
						{
						  if(isset($_POST['Code'])) { $checkbox   =   $_POST['Code']; } else { $checkbox  = '';} 
						   if($checkbox   == "")
						   {
						   }
						   else
						   {
						   $count      =   count($checkbox);
						   for($i=0; $i<$count; $i++)
						   {
							 $del_id   =  $checkbox[$i];
							 $sql      = "DELETE FROM admin_blog_content WHERE BlogCode='$del_id'";
							 $result   = mysql_query($sql);
						   }
						   if($result)
						   {
							
									echo '<meta http-equiv="refresh" content="0;URL=index.php">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Blog Deleted!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>				   
						<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View All Blog</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<form name="individual_signup" action="" method="post" >
							<div class="widget-content no-padding">
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<a onClick="return confirm('are you sure you want to delete??');" title="Delete"><input type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn-primary pull-center"></a>
                                                
										
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
								
								<table class="table table-striped table-checkable table-hover">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
											<th class="hidden-xs">Image</th>
											<th>Title</th>
											<th>Date</th>
											<th>Visits</th>
											<th class="align-center">Action</th>
										</tr>
									</thead>
									<tbody>
									
	
									
									
								
			   <?php $i=0;
					 $Content = mysql_query("SELECT  * FROM admin_blog_content ORDER BY Id DESC ");
						  while ($Fw = mysql_fetch_array($Content)) 
						  {	 ?>
										<tr>
											<td class="checkbox-column">
											
												<input type="checkbox" name="Code[]" value="<?php echo $Fw['BlogCode']; ?>" class="uniform">
											</td>
											<td class="hidden-xs"><img src="BlogImages/<?php if($Fw['BlogImage'] == ''){ echo 'blak.jpg'; }else{ echo $Fw['BlogImage']; } ?>" style="width:80px; height:80px;"></td>
											<td ><?php echo substr($Fw['BlogTitle'],0,70); ?>..</td>
											<td><?php echo $Fw['BlogDate']; ?></td>
										 </form>
													
											
											<td class="align-center">
												<span class="btn-group">
												
										<?php  if($Fw['Status'] == 'Pending') 
												{ ?>
														<a href="index.php?DEAJ09148=<?php  echo $Fw['BlogCode']; ?>"  title="Make it Active" class="bs-tooltip btn btn-xs">
														<i class="icon-fixed-width">&#xf00d</i>
														</a>
										   <?php } ?>
										<?php   if($Fw['Status'] == 'Published') 
												  {  ?>	
														 <a href="index.php?ActAJ09148=<?php echo $Fw['BlogCode']; ?>" title="Make it Deactive" class="bs-tooltip btn btn-xs">
														 <i class="icon-fixed-width">&#xf00c</i>
														 </a>                
											<?php } ?>
														  <a href="./EditBlogContent.php?AJCOde59=<?php echo $Fw['BlogCode']; ?>"  title="Edit" class="bs-tooltip btn btn-xs">
														  <i class="icon-pencil"></i>
														  </a>
														  
														   <a  href="index.php?AJCOde59=<?php echo $Fw['BlogCode']; ?>" onClick="return confirm('are you sure you want to delete??');"  title="Delete" class="bs-tooltip btn btn-xs">
														   <i class="icon-trash"></i>
														   </a>
												  </span>
											</td>
										</tr>
										
					<?php } ?><!-- While Main Close -->					
										
										
									
										
										
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<a onClick="return confirm('are you sure you want to delete??');" title="Delete"><input type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn-primary pull-center"></a>
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
