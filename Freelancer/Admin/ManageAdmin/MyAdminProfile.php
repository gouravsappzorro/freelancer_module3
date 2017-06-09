<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

						
						<?php	/**================================================================================||
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
								||=================================================================================**/?>





<?php if(isset($_SESSION['Email']) && isset($_SESSION['UserId']) && isset($_SESSION['UserName']))     { 
      $mainAdmin = mysql_num_rows(mysql_query("select * from admin_login where UserId = '".$_SESSION['UserId']."' and UserName = '".$_SESSION['UserName']."' and Status = 'SuperAdmin' "));
	  
	if($mainAdmin > 0 )
	{ ?>
	
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
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				<?php // include "../include/subsubheader.php"; ?>
				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
						<br /><br />
	<?php 
				 if(isset($_GET['AJCOde59']) and $_GET['AJCOde59'] !=='')
					   {
					   			$Delete = mysql_query("DELETE FROM admin_login WHERE UserId = '".$_GET['AJCOde59']."' ");
								if($Delete)
								{
									
									echo '<meta http-equiv="refresh" content="1; url=MyAdminProfile.php" >';
									$_SESSION['DeleteSu'] = 'Done';
								}
					   } 
					   
				 if(isset($_GET['DEAJ09148']) and $_GET['DEAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE admin_login SET Status = 'Active' WHERE UserId = '".$_GET['DEAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="1; url=MyAdminProfile.php" >';
									$_SESSION['SETAcSu'] = 'Active';
								}
					   } 
					   
					   
				 if(isset($_GET['ActAJ09148']) and $_GET['ActAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE admin_login SET Status = 'Deactive' WHERE UserId = '".$_GET['ActAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="1; url=MyAdminProfile.php" >';
									$_SESSION['SETAcSu'] = 'Deactive';
								}
					   } ?>	   

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php  if(isset($_SESSION['NewSu']) && $_SESSION['NewSu'] == 'Done' )
						{
							echo  '<div class="alert alert-success fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<center><strong>Your User Admin Profile Updated Successfully!</strong>.</center>
								</div>';
							unset($_SESSION['NewSu']);
						}
						
					   if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected Admin Profile Deleted!</strong>.
									  </div>';
						    unset($_SESSION['DeleteSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] = 'Active' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected Admin Profile Activate !</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] = 'Deactive')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected Admin Profile Deactivated !</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu']);
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
							 $sql      = "DELETE FROM admin_login WHERE UserId='$del_id'";
							 $result   = mysql_query($sql);
						   }
						   if($result)
						   {
							
									echo '<meta http-equiv="refresh" content="1;URL=MyAdminProfile.php">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected Admin Profile  Deleted!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>				   
						<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View All Admin User</h4>
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
												<a class="bs-tooltip" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-xs"><input type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn-primary pull-center"></a>
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
											<th class="hidden-xs">UserId</th>
											<th>Email</th>
											<th>Member Name </th>
											<th>Contact No.</th>
											<th>Date</th>
											<th class="align-center">Action</th>
										</tr>
									</thead>
									<tbody>
									
	
									
									
								
					<?php  	 $Con   =  mysql_query("SELECT *  FROM admin_login ");
						  	 while($Fw    =  mysql_fetch_array($Con))
						 	  {
							  	if($Fw['Status'] == "SuperAdmin")
								{
					 ?>
										<tr>
											<td class="checkbox-column"><i class="icon-male"></i></td>
											<td class="hidden-xs"><?php echo $Fw['UserId']; ?></td>
											<td><?php echo $Fw['Email']; ?></td>
											<td><?php echo $Fw['MemberName']; ?></td>
											<td><?php echo $Fw['ContactNo']; ?></td>
											<td><?php echo $Fw['Date']; ?></td>
											<td class="align-center">
												<span class="btn-group">
												<?php  if($Fw['Status'] == 'Deactive') { ?>
													<a href="MyAdminProfile.php?DEAJ09148=<?php echo $Fw['UserId']; ?>"  class="bs-tooltip" title="Make it Active" class="btn btn-xs"><i class="icon-fixed-width">&#xf00d</i></a>
													<?php } ?>
												<?php if($Fw['Status'] == 'Active') {  ?>	
													<a href="MyAdminProfile.php?ActAJ09148=<?php echo $Fw['UserId']; ?>"  class="bs-tooltip" title="Make it Deactive" class="btn btn-xs"><i class="icon-fixed-width">&#xf00c</i></a>                
													<?php } ?>
													<a href="./EditUserProfile.php?AJCOde59=<?php echo $Fw['UserId']; ?>" class="bs-tooltip" title="Edit" class="btn btn-xs"><i class="icon-pencil"></i></a>
												
												</span>
											</td>
										</tr>
										<?php } else									
									
											  { ?>
										
										
												<tr>
													<td class="checkbox-column">
														<input type="checkbox" name="Code[]" value="<?php echo $Fw['UserId']; ?>" class="uniform">
													</td>
													<td class="hidden-xs"><?php echo $Fw['UserId']; ?></td>
													<td><?php echo $Fw['Email']; ?></td>
													<td><?php echo $Fw['MemberName']; ?></td>
													<td><?php echo $Fw['ContactNo']; ?></td>
													<td><?php echo $Fw['Date']; ?></td>
													
													<td class="">
															<span class="btn-group">
											<?php  if($Fw['Status'] == 'Deactive') { ?>
													<a href="MyAdminProfile.php?DEAJ09148=<?php echo $Fw['UserId']; ?>"  class="bs-tooltip" title="Make it Active" class="btn btn-xs"><i class="icon-fixed-width">&#xf00d</i></a>
													<?php } ?>
										<?php if($Fw['Status'] == 'Active') {  ?>	
													<a href="MyAdminProfile.php?ActAJ09148=<?php echo $Fw['UserId']; ?>"  class="bs-tooltip" title="Make it Deactive" class="btn btn-xs"><i class="icon-fixed-width">&#xf00c</i></a>                
													<?php } ?>
															<a href="./EditUserProfile.php?AJCOde59=<?php echo $Fw['UserId']; ?>" class="bs-tooltip" title="Edit" class="btn btn-xs"><i class="icon-pencil"></i></a>
													<a  href="MyAdminProfile.php?AJCOde59=<?php echo $Fw['UserId']; ?>" class="bs-tooltip" title="Delete" class="btn btn-xs" onClick="return confirm('are you sure you want to delete??');"><i class="icon-trash"></i></a>
															</span>
														</td>
												    </tr>
												 <?php } ?>	
											
							
											
					<?php } ?><!-- While Main Close -->					
										
										
									
								
										
										
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<a class="bs-tooltip" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-xs"><input type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn-primary pull-center"></a>
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				</div> <!-- /.row -->

				</form>
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>
<?php }
	  else{?>
	 				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../index.php" > 
	   
		  <?php }  

      }
	  else 
	  { ?> 
	  				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../LogIn.php" > 
<?php } ?>
