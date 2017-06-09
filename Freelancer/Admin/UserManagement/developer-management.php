<?php //include "../../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Developer Management</title>

	<?php include "../MyInclude/HomeScript.php"; ?>

<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/DT_bootstrap.js"></script>
<link href="../plugins/datatables/dataTables.responsive.css" type="text/css" rel="stylesheet">
<link href="../plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<script>
$(function() 
{
	$("#start_date").datepicker({
		dateFormat:'yy-mm-dd',
		onSelect: function (selected) {
    		var dt = new Date(selected);
        	dt.setDate(dt.getDate() + 1);
        	$("#end_date").datepicker("option", "minDate", dt);
        }
    });
 
    $("#end_date").datepicker({
  		dateFormat:'yy-mm-dd',
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#start_date").datepicker("option", "maxDate", dt);
        }
	});
});
  </script>		
	
</head>

<body>
<?php

if(isset($_POST['search']))
{
	$start_date=$_POST['date'];
	$end_date=$_POST['date1'];
			
	$res = mysql_query("SELECT * FROM register where hire='Work' and register_date>='".$start_date."' and register_date<='".$end_date."' order by id desc");
}
else
{
	$res = mysql_query("SELECT * FROM register where hire='Work' order by id desc");
}
?>


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
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				
				
				
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
				<!-- /Statboxes -->

	
				<!-- /Statboxes -->
	<?php 
				 if(isset($_GET['AJCOde59']) and $_GET['AJCOde59'] !=='')
					   {
					   			$Delete = mysql_query("DELETE FROM register WHERE id = '".$_GET['AJCOde59']."' ");
								if($Delete)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=developer-management.php" >';
									$_SESSION['DeleteSu'] = 'Done';
								}
					   } 
					   
				 if(isset($_GET['DEAJ09148']) and $_GET['DEAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE register SET status = 'active' WHERE id = '".$_GET['DEAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=developer-management.php" >';
									$_SESSION['SETAcSu'] = 'active';
								}
					   } 
					   
					   
				 if(isset($_GET['ActAJ09148']) and $_GET['ActAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE register SET status = 'pending' WHERE id = '".$_GET['ActAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="0; url=developer-management.php" >';
									$_SESSION['SETAcSu'] = 'pending';
								}
					   } ?>	   

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php 	if(isset($_SESSION['UpdateSu']) and $_SESSION['UpdateSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your developer Updated!</strong>.
								   </div>';
						    unset($_SESSION['UpdateSu']);
			           }
					   if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your developer Deleted!</strong>.
									  </div>';
						    unset($_SESSION['DeleteSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] = 'active' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected developer Activated !</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] = 'Pending')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Selected developer Deactivated !</strong>.
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
							 $sql      = "DELETE FROM register WHERE id='$del_id'";
							 $result   = mysql_query($sql);
						   }
						   if($result)
						   {
							
									echo '<meta http-equiv="refresh" content="0;URL=developer-management.php">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Developer Deleted!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>	
                 <form name="individual_signup" action="" method="post" >
                 <div class="container form-group">
                    <div class="col-sm-1">
                        
                    </div>
                    <div class="col-sm-4 date">
                        <div class="input-group input-append date">
                            <input type="text" class="form-control" name="date" value="<?php echo @$_POST['date'];?>" placeholder="Start Date" id="start_date">
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                     <div class="col-sm-4 date1">
                        <div class="input-group input-append date" >
                            <input type="text" class="form-control" id="end_date" name="date1" value="<?php echo @$_POST['date1'];?>" placeholder="End Date" >
                            <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <input type="submit" class="btn btn-default" name="search" value="Search">
                    </div>
                </div>
            <p style="text-align:right;"><a href="AddNewDeveloper.php"><input type="button" name="new" class="btn btn-primary pull-center" value="Add New Developer"></a></p>		   
						<div class="widget box table-responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View All Developers</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							
							<div class="widget-content no-padding ">
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
								<table class="table table-striped  table-hover table-checkable table-colvis datatable dataTable">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
                                            
											<th>developer Name</th>
                                            <th>Email</th>
											<!-- <th>City</th> -->
                                            <th>Country</th>
                                            <th>Register Date</th>
                                            <th>Review</th>
                                            <th>Projects</th>
                                            <th>Add Bids</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php
									
									while ($Fw = mysql_fetch_array($res)) 
                                    {	 ?>
                                          <tr>
											<td class="checkbox-column">
											

												<input type="checkbox" name="Code[]" value="<?php echo $Fw['id']; ?>" class="uniform">
											</td>
                                            
										   <td><?php echo $Fw['first_name']." ".$Fw['last_name']; ?></td>
                                           
                                           <td><?php echo $Fw['email']; ?></td>
                                           <!--<td><?php echo $Fw['city']; ?></td>-->
                                           <td><?php echo $Fw['country']; ?></td>
                                           <td><?php echo $Fw['register_date'];?></td>
                                           <td><a href="DeveloperReview.php?TestCode=<?php echo $Fw['unique_code']; ?>"><input type="button" name="Submit" value="Review" class="btn btn-sm btn-warning"></a></td>
                                           <td><a href="DeveloperProjects.php?TestCode=<?php echo $Fw['unique_code']; ?>"><input type="button" name="Submit" value="Projects" class="btn btn-sm btn-warning"></a></td>
                                           <td><a href="AllocateBids.php?TestCode=<?php echo $Fw['unique_code']; ?>"><input type="button" name="Submit" value="Add Bids" class="btn btn-sm btn-danger"></a></td>
                                           <td>
												<span class="btn-group">
												
										<?php  if($Fw['status'] == 'pending') 
												{ ?>
														<a href="developer-management.php?DEAJ09148=<?php echo $Fw['id']; ?>"  title="Make it Active" class="btn btn-sm bs-tooltip">
														<i class="icon-fixed-width">&#xf00d;</i>
														</a>
										   <?php } ?>
										<?php   if($Fw['status'] == 'active') 
												  {  ?>	
														 <a href="developer-management.php?ActAJ09148=<?php echo $Fw['id']; ?>" title="Make it Deactive" class="btn btn-sm bs-tooltip">
														 <i class="icon-fixed-width">&#xf00c;</i>
														 </a>                
											<?php } ?>
														  <a href="./Editdeveloper.php?AJCOde59=<?php echo $Fw['id']; ?>" title="Edit" class="btn btn-sm bs-tooltip">
														  <i class="icon-pencil"></i>
														  </a>
														  
														   <a  href="developer-management.php?AJCOde59=<?php echo $Fw['id']; ?>" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-sm bs-tooltip">
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
												<a class="bs-tooltip" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-xs"><input type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn-primary pull-center"></a>
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
							</div> <!-- /.widget-content -->
						</div> <!-- /.widget -->
                        </form>
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
