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
	<title>Admin Panel - Developer Projects</title>
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
				
                
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
                
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                    
                            <h4><i class="icon-reorder"></i> Developer Projects</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                        <?php
						$sql_project=mysql_query("select * from user_bids where uid='$_GET[TestCode]'");
						if(mysql_affected_rows())
						{
							while($row_project=mysql_fetch_array($sql_project))
							{
								$sql_developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_project[uid]'"));
								
								$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_project[project_id]'"));
								
								$client=mysql_fetch_array(mysql_query("select * from register where unique_code='$project[uid]'"));
							?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Developer Name</label>
                                    <label class="col-md-7 control-label"><?php echo $sql_developer['first_name'].' '.$sql_developer['last_name'];?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Client Name</label>
                                    <label class="col-md-7 control-label"><?php echo $client['first_name'].' '.$client['last_name'];?></label>
                                </div>
                                <br>
                                <div class="form-group">		
                                    <label class="col-md-3 control-label">Project Title</label>
                                    <label class="col-md-7 control-label"><?php echo $project['title'];?></label>
                                </div>	
                                <br>
                                <div class="form-group">		
                                    <label class="col-md-3 control-label">Description</label>
                                    <label class="col-md-7 control-label" style="text-align:justify"><?php echo nl2br($project['description']);?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Project Budget</label>
                                    <label class="col-md-7 control-label"><?php echo $project['budget'].' '.$project['currency'];?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Status</label>
                                    <label class="col-md-7 control-label" style="color:red;font-weight: 600;">
									<?php
									if($row_project['uid']==$project['developer_id'])
									{
										echo $project['status'];
									}
									else
									{
										if($row_project['status']=='compare')
										{
											echo 'active';
										}
										else
										{
											echo $row_project['status'];
										}
									}
									?>
                                    </label>
                                </div>
                                <br>					
                                                            
                                <a class="more" href="javascript:void(0);"> <br></a>
                        <?php
							}
						}
						else
						{
							echo 'Reviews not available';
						}
						?>
                        </div>
                    </div> <!-- /.widget -->
                </div>
			</div>
		</div>
	</div>
</body>
</html>