<?php //include "../../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Project Details</title>

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
				
			
				
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				
                <?php
				
				$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$_GET['project_id']."'"));
				
				$sql_user_bids=mysql_query("select * from user_bids where project_id='$_GET[project_id]'");
				?>
				
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
				<!-- /Statboxes -->

				 <?php $client=mysql_fetch_array(mysql_query("select * from register where unique_code='".$project['uid']."'"));?>
                 
				<!-- /Statboxes -->
				<div class="row">
                    <div class="col-md-12">
                    <?php
					if(isset($_GET['val']) and $_GET['val']=='1'){?>
						<p style="text-align:right;"><a href="<?php echo AdminUrl;?>UserManagement/ClientProjects.php?TestCode=<?php echo $client['unique_code'];?>"><input type="button" name="new" class="btn btn-primary pull-center" value="Back"></a></p>
                    <?php }else {?>
                    	<p style="text-align:right;"><a href="<?php echo AdminUrl;?>Projects/"><input type="button" name="new" class="btn btn-primary pull-center" value="Back"></a></p>
                    <?php }?>
                    </div>
                        <!--=== Static Table ===-->
					
                    <div class="col-md-6">
                    	<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View Project Details</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
								<table class="table table-bordered table-responsive table-hover">
                                	<tr>
                                        <th class="hidden-xs">Project Title</th>
                                        <td class="hidden-xs"><?php echo $project['title'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Client Name</th>
                                           
                                           <td><?php echo $client['first_name']." ".$client['last_name']; ?></td>
                                       	</tr>
                                        <tr>
                                            <th>Required Skills</th>
                                            <td><?php echo $project['skills']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Budget</th>
                                            <td><?php echo $project['budget']." ".$project['currency']; ?></td>
										</tr>
                                        <tr>
                                        	<th>Description</th>
                                            <td align="justify"><?php echo nl2br($project['description']);?></td>
                                        </tr>
                                        
                                        <tr>
                                        	<th>Post Date</th>
                                        	<td><?php echo date('d-m-Y',strtotime($project['post_date']));?></td>
                                        </tr>
                                        <tr>
                                        	<th>Status</th>
                                            <td style="color:#F00"><?php echo $project['status'];?></td>
                                        </tr>
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
                    
                    <div class="col-md-6">
						<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i>Awarded details</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
								<?php 
																
								$sql_dev=mysql_fetch_array(mysql_query("select * from register where unique_code='".$project['developer_id']."'"));
								
								if(mysql_affected_rows()){
								?>
								<table class="table table-striped table-bordered table-hover table-checkable datatable">
									<tr>
										<th>
                                        <img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $sql_dev['profile_picture'] ?>" width="50%" height="auto" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" id="profile" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                                        </th>
                                        <td><?php echo $sql_dev['first_name']." ".$sql_dev['last_name'];?></td>
                                    </tr>
                                    <tr>
                                    	<th>Email</th>
                                        <td><?php echo $sql_dev['email'];?></td>
                                    </tr>
                                    <tr>
                                    	<th>Location</th>
                                       	<?php $location=mysql_fetch_array(mysql_query("select * from location where code='".$sql_dev['country']."'"));?>
                                        <td><?php echo $sql_dev['city'].", ".$sql_dev['country'];?></td>
                                    </tr>
                                    <tr>
                                    	<th>Skills</th>
                                        <td><?php echo $sql_dev['skills'];?></td>
                                    </tr>
                                    <tr>
                                    	<th>Description</th>
                                        <td><?php echo nl2br($sql_dev['description']);?></td>
                                    </tr>
								</table>
								<?php 
								}
								else
								{
									echo "<center><h3>Project Not Awarded</h3></center>";
								}
								?>
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div>
                    </div>
                    <div class="row">
                   	<?php
					$milestone=mysql_query("select * from milestone where project_id='".$_GET['project_id']."'");
					$cnt_milestone=mysql_num_rows($milestone);
					if($cnt_milestone>0)
					{
					?>
                    <div class="col-md-12">
                    	<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> Milestone Details</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
								<table class="table table-bordered table-responsive table-hover">
                                	<tr>
                                        <th>Project Title</th>
                                        <td><?php echo $project['title'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Client Name</th>
                                           
                                           <td><?php echo $client['first_name']." ".$client['last_name']; ?></td>
                                       	</tr>
                                        <tr>
                                            <th>Developer Name</th>
                                            <td><?php echo $sql_dev['first_name']." ".$sql_dev['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Budget</th>
                                            <td><?php echo $project['budget']." ".$project['currency']; ?></td>
										</tr>
                                        <tr>
                                        	<table class="table table-striped table-bordered table-hover table-checkable table-colvis datatable dataTable" id="example">
                                            	<tr>
                                                	<th>Milestone</th>
                                                    <th>Message</th>
                                                    <th>Create Date</th>
                                                    <th>Release Date</th>
                                                    <th>Status</th>
                                                </tr>
                                                <?php
												while($row_milestone=mysql_fetch_array($milestone))
												{
													?>
                                                <tr>
                                                	<td><?php echo $row_milestone['create_payment'];?></td>
                                                    <td><?php echo $row_milestone['milestone_message'];?></td>
                                                    <td><?php echo $row_milestone['create_date']?></td>
                                                    <td><?php echo $row_milestone['release_date'];?></td>
                                                    <td>
														<?php 
														if($row_milestone['status']=='release')
														{
															echo 'Released';
														}
														else
														{
															echo 'Created';
														}?>
                                                    </td>
                                                </tr>
                                                
												<?php
												}
												?>
                                            </table>
                                        </tr>
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div>
                    <?php
					}
					?>
                    
                    
				</div> <!-- /.row -->
				<!-- /Page Content -->
                <div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i>Project Bids</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<?php
								
								
									if(mysql_num_rows($sql_user_bids) > 0)
									{
								
								?>
								<table class="table table-striped table-bordered table-checkable table-hover">
									<thead>
										<tr>
                                        	<th>No</th>
                                            <th>Developer Name</th>
                                            <th>Bids</th>
                                            <th>Duration</th>
                                            <th>Message</th>
                                            <th>Status</th>
										</tr>
									</thead>
									<tbody>
                                    <?php 
									$no=1;
									
									while($user_bids=mysql_fetch_array($sql_user_bids))
									{
										?>
										<tr>
                                        	<td><?php echo $no;?></td>
                                            <?php $developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$user_bids['uid']."'"));
                                           ?>
                                           <td><?php echo $developer['first_name']." ".$developer['last_name']; ?></td>
                                           
                                           <td><?php echo $user_bids['cost']." ".$project['currency']; ?></td>
                                           <td><?php echo $user_bids['duration']." Days";?></td>
                                           <td><?php echo nl2br($user_bids['bid_message']);?></td>
                                           <td>
                                           <?php
										   if($user_bids['status']=='awarded'){?>
                                           <label class="label label-success">Awarded</label>
                                           <?php } else {?>
                                           <label class="label label-danger">Active</label>
                                           <?php }?>
                                           </td>
										</tr>
                                    <?php 
										$no++; 
									}
									}
									else
									{
										echo "<h3><center>Bids not available</center></h3>";
									}
									?>
									</tbody>
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
				</div>
        	</div>
			<!-- /.container -->

		</div>
</div>
</body>
</html>
