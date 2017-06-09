<?php //include "../../MyInclude/Db_Conn.php"; ?>
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
	<title>Admin Panel - View All Projects</title>

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

				<?php
				if(isset($_GET['AJCOde59']) and $_GET['AJCOde59'] !=='')
				{
					$Delete = mysql_query("DELETE FROM post_projects WHERE project_id = '".$_GET['AJCOde59']."' ");
					if($Delete)
					{
						
						echo '<meta http-equiv="refresh" content="0; url=index.php" >';
						$_SESSION['DeleteSu'] = 'Done';
					}
				} 
				
				?>
				<!-- /Statboxes -->
				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
                    
                    <?php
					if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done' )
					{ 
						echo	'<div class="alert alert-success fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Your Project Deleted Successfully!</strong>.
								  </div>';
						unset($_SESSION['DeleteSu']);
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
								$sql      = "DELETE FROM post_projects WHERE project_id='$del_id'";
								$result   = mysql_query($sql);
							}
							if($result)
							{
								echo '<meta http-equiv="refresh" content="0;URL=index.php">';
								echo '<div class="alert alert-success fade in">
									 <i class="icon-remove close" data-dismiss="alert"></i>
									 <strong>Your Project Deleted Successfully!</strong>.
									 </div>';
							}
						}	
								
					}
					?>
					<form method="post">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> View All Projects</h4>
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
								<table class="table table-striped  table-hover table-checkable table-colvis datatable dataTable" id="example">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
                                            <th class="hidden-xs">Project Title</th>
                                            <th>Client Name</th>
                                            <th>Budget</th>
                                            <th class="align-center">Action</th>
										</tr>
									</thead>
									<tbody>
								
					<?php $i=1;
					 
					 		$res = mysql_query("SELECT * FROM post_projects ORDER BY Id DESC ");
					 
					 
						  while ($Fw = mysql_fetch_array($res)) 
						  {	 ?>
										<tr>
											
                                            <td class="checkbox-column">
												<input type="checkbox" name="Code[]" value="<?php echo $Fw['project_id']; ?>" class="uniform">
											</td>
											<td class="hidden-xs"><?php echo $Fw['title']; ?></a></td>
                                            <?php $client=mysql_fetch_array(mysql_query("select * from register where unique_code='".$Fw['uid']."'"));
                                           ?>
                                           <td><?php echo $client['first_name']." ".$client['last_name']; ?></td>
                                           <td><?php echo $Fw['budget']." ".$Fw['currency']; ?></td>
                                           <td class="align-center">
                                                <a href="project_details.php?project_id=<?php echo $Fw['project_id'];?>" class="btn btn-sm bs-tooltip" title="View">
                                                <i class="fa fa-eye" aria-hidden="true"></i> View
                                                </a>
                                                
                                                <a href="EditProject.php?AJCOde59=<?php echo $Fw['project_id'];?>" class="btn btn-sm bs-tooltip" title="Edit">
                                                <i class="fa fa-pencil" aria-hidden="true"></i> Edit
                                                </a>
                                              	
                                               	<a  href="index.php?AJCOde59=<?php echo $Fw['project_id']; ?>" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-sm bs-tooltip">
                                               		<i class="icon-trash"></i> Delete
                                               	</a>
											</td>
                                           
                                        </tr>
					<?php $i++; } ?><!-- While Main Close -->					
										
									
									
										
										
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
