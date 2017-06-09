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
		
	<script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/DT_bootstrap.js"></script>
    <link href="../plugins/datatables/dataTables.responsive.css" type="text/css" rel="stylesheet">
    <link href="../plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
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
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
				<!-- /Statboxes -->

	
				<!-- /Statboxes -->
	<?php 
				 if(isset($_GET['AJCOde59']) and $_GET['AJCOde59'] !=='')
					   {
						   
								$Delete=mysql_query("DELETE FROM city WHERE ID = '".$_GET['AJCOde59']."' ");
					   			
								if($Delete)
								{
								
									echo '<meta http-equiv="refresh" content="2; url=index.php" >';
									$_SESSION['DeleteSu'] = 'Done';
								}
								
					   } 
					   
				 if(isset($_GET['DEAJ09148']) and $_GET['DEAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE city SET Status = 'Published' WHERE ID = '".$_GET['DEAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="2; url=index.php" >';
									$_SESSION['SETAcSu'] = 'Published';
								}
					   } 
					   
					   
				 if(isset($_GET['ActAJ09148']) and $_GET['ActAJ09148'] !=='')
					   {
					   			$UPDATW = mysql_query("UPDATE city SET Status = 'Pending' WHERE ID = '".$_GET['ActAJ09148']."' ");
								if($UPDATW)
								{
									
									echo '<meta http-equiv="refresh" content="2; url=index.php" >';
									$_SESSION['SETAcSu'] = 'Pending';
								}
					   } ?>	   

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php 	
					   if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>City Deleted Successfully!</strong>.
									  </div>';
						    unset($_SESSION['DeleteSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] == 'Published' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>City Activated Successfully!</strong>.
									  </div>';
						    unset($_SESSION['SETAcSu']);
			           }
					   
					   
					   if(isset($_SESSION['SETAcSu']) and $_SESSION['SETAcSu'] == 'Pending')
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>City Deactivated Successfully!</strong>.
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
							 $sql      = "DELETE FROM city WHERE ID='$del_id'";
							
							 $result   = mysql_query($sql);
							 
						   }
						   if($result)
						   {
							
									echo '<meta http-equiv="refresh" content="0;URL=index.php">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>City Deleted Successfully!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>	
                 <p style="text-align:right;"><a href="AddNewCity.php"><input type="button" name="new" class="btn btn-primary pull-center" value="Add New City"></a></p>
					<form name="individual_signup" action="" method="post" >
						<div class="widget box table-responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View All Cities</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							
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
								<table class="table table-striped table-hover table-checkable table-colvis datatable dataTable">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
                                           
											<th>City Name</th>
											<th>Country Name</th>
											<th class="align-center">Action</th>
										</tr>
									</thead>
									<tbody>
								
									<?php $i=0;
                                    
                                   
                                    
                                    $res = mysql_query("SELECT  * FROM city ORDER BY Name");
                                    
                                    
									while ($city = mysql_fetch_array($res)) 
									{	
										$country=mysql_fetch_array(mysql_query("select * from location where Code='".$city['CountryCode']."'"));
									
									?>
									<tr>
										<td class="checkbox-column">
										
											<input type="checkbox" name="Code[]" value="<?php echo $city['ID']; ?>" class="uniform">
										</td>

										<td><?php echo $city['Name']; ?></td>
                                        <td><?php echo $country['Name']; ?></td>
                                        									   
										<td class="align-center">
											<span class="btn-group">
											
									<?php  if($city['Status'] == 'Pending') 
											{ ?>
													<a href="index.php?DEAJ09148=<?php echo $city['ID']; ?>"  title="Make it Active" class="btn btn-sm bs-tooltip">
													<i class="icon-fixed-width">&#xf00d; </i> Deactive
													</a>
									   <?php } ?>
									<?php   if($city['Status'] == 'Published') 
											  {  ?>	
													 <a href="index.php?ActAJ09148=<?php echo $city['ID']; ?>" title="Make it Deactive" class="btn btn-sm bs-tooltip">
													 <i class="icon-fixed-width">&#xf00c; </i> Active
													 </a>                
										<?php } ?>
													  <a href="./EditCity.php?AJCOde59=<?php echo $city['ID']; ?>" title="Edit" class="btn btn-sm bs-tooltip">
													  <i class="icon-pencil"></i> Edit
													  </a>
													  
													   <a  href="index.php?AJCOde59=<?php echo $city['ID']; ?>" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-sm bs-tooltip">
													   <i class="icon-trash"></i> Delete
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
                            </form>
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
