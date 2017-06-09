<?php session_start();//include "../../MyInclude/Db_Conn.php"; ?>
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
	<title>Admin Panel - Client Management</title>
	<?php include "../MyInclude/HomeScript.php"; ?>

<script src="../plugins/datatables/jquery.dataTables.js"></script>
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/DT_bootstrap.js"></script>
<link href="../plugins/datatables/dataTables.responsive.css" type="text/css" rel="stylesheet">
<link href="../plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
<script>

$(function() 
{
	$("#dateRangePicker").datepicker({
		dateFormat:'yy-mm-dd',
		onSelect: function (selected) {
    		var dt = new Date(selected);
        	dt.setDate(dt.getDate() + 1);
        	$("#dateRangePicker1").datepicker("option", "minDate", dt);
        }
    });
 
    $("#dateRangePicker1").datepicker({
  		dateFormat:'yy-mm-dd',
        onSelect: function (selected) {
            var dt = new Date(selected);
            dt.setDate(dt.getDate() - 1);
            $("#dateRangePicker").datepicker("option", "maxDate", dt);
        }
	});
});

  </script>
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
				
	<?php 
	//Fetch Data
	
	if(isset($_POST['search']))
	{
		$start_date=$_POST['date'];
		$end_date=$_POST['date1'];
		
		$search="uid='$_GET[TestCode]'";
		
		if((isset($_POST['date']) and $_POST['date']!='') and (isset($_POST['date1']) and $_POST['date1']))
		{
			$search.=" and post_date>='".$start_date."' and post_date<='".$end_date."'";
		}
		if(isset($_POST['skill']) and $_POST['skill']!='')
		{
			$search.=" and skills like '%".$_POST['skill']."%'";
		}
		if(isset($_POST['location']) and $_POST['location']!='0')
		{
			$search.=" and location='".$_POST['location']."'";
		}
		if(isset($_POST['experience']) and $_POST['experience']!='0')
		{
			$search.=" and experience='".$_POST['experience']."'";
		}
		$res = mysql_query("SELECT * FROM post_projects where $search order by id desc");
	}
	else
	{
		$res = mysql_query("SELECT * FROM post_projects where uid='$_GET[TestCode]' order by id desc");
	}
	?>
    <?php
	
				if(isset($_GET['AJCOde59']))
				{
					$Delete = mysql_query("DELETE FROM post_projects WHERE project_id = '".$_GET['AJCOde59']."' ");
					if($Delete)
					{
						mysql_query("delete from user_bids where project_id='".$_GET['AJCOde59']."'");
						echo '<meta http-equiv="refresh" content="0; url=ClientProjects.php?TestCode='.$_GET['TestCode'].'" >';
						$_SESSION['DeleteSu'] = 'Done';
					}
					
				} 
				?>	   

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php 	if(isset($_SESSION['UpdateSu']) and $_SESSION['UpdateSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Project Updated!</strong>.
								   </div>';
						    unset($_SESSION['UpdateSu']);
			           }
					   if(isset($_SESSION['DeleteSu']) and $_SESSION['DeleteSu'] == 'Done' )
						{ 
							echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Project Deleted!</strong>.
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
							
									echo '<meta http-equiv="refresh" content="0;URL=ClientProjects.php?TestCode='.$_GET['TestCode'].'">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Your Project Deleted!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>	
                 
                 <form name="individual_signup" action="" method="post" >
                 <div class="row">
                     <div class="container form-group">
                        <div class="col-sm-4 date">
                            <div class="input-group input-append date">
                                <input type="text" class="form-control" name="date" value="<?php echo @$_POST['date'];?>" placeholder="Start Date" id="dateRangePicker">
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                         <div class="col-sm-5 date1">
                            <div class="input-group input-append date" >
                                <input type="text" class="form-control" id="dateRangePicker1" name="date1" value="<?php echo @$_POST['date1'];?>" placeholder="End Date" >
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        
                    </div>
				</div>
                <div class="row">
                	<div class="container form-group">
                    	<div class="col-sm-3">
                            <div class="input-group input-append">
                                <input type="text" class="form-control" name="skill" value="<?php echo @$_POST['skill'];?>" placeholder="Skill search">
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-append">
                                <select name="location" id="location" class="form-control">
                                	<option value="0">Location Search</option>
                                    <option value="Local" <?php if(@$_POST['location']=='Local'){ echo 'selected="selected"';}?>>Local</option>
                                    <option value="International" <?php if(@$_POST['location']=='International'){ echo 'selected="selected"';}?>>International</option>
                                </select>
                                <span class="input-group-addon add-on"><i class="fa fa-globe" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="input-group input-append">
                                <select name="experience" id="experience" class="form-control">
                                	<option value="0">Experience Search</option>
                                    <option <?php if(@$_POST['experience']=='All'){echo 'selected="selected"';} ?> value="All"> All allowed</option>
                                    <option <?php if(@$_POST['experience']=='1+'){echo 'selected="selected"';} ?> value="1+"> 1 Year and above</option>
                                    <option <?php if(@$_POST['experience']=='3+'){echo 'selected="selected"';} ?> value="3+"> 3 Year and above</option>
                                    <option <?php if(@$_POST['experience']=='5+'){echo 'selected="selected"';} ?> value="5+"> 5 Year and above</option>
                                    <option <?php if(@$_POST['experience']=='10+'){echo 'selected="selected"';} ?> value="10+"> 10 Year and above</option>
                                    <option <?php if(@$_POST['experience']=='15+'){echo 'selected="selected"';} ?> value="15+"> 15 Year and above</option>
                                </select>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-question-sign"></span></span>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="row">
                	<div class="container form-group">
                    	<div class="col-sm-12">
                            <input type="submit" class="btn btn-default" name="search" value="Search">
                        </div>
                    </div>
                </div>
            <p style="text-align:right;"><a href="AddNewClient.php"><input type="button" name="new" class="btn btn-primary pull-center" value="Add New Client"></a></p>		   
						<div class="widget box table-responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View All Client's Projects</h4>
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
                                            
											<th>Project Name</th>
                                            <th>Skills</th>
                                            <th>Description</th>
                                            <th>Budget</th>
                                            <th>Details</th>
                                            <th>Action</th>
										</tr>
									</thead>
									<tbody>
								
									<?php $i=0;
									
									while ($Fw = mysql_fetch_array($res))
						  			{	 ?>
										<tr>
											<td class="checkbox-column">
											

												<input type="checkbox" name="Code[]" value="<?php echo $Fw['project_id']; ?>" class="uniform">
											</td>
                                            
											<td><?php echo $Fw['title']; ?></td>
                                           
                                           <td><?php echo $Fw['skills']; ?></td>
                                           <td><?php echo limit_words($Fw['description'],10); ?></td>
                                           <td><?php echo $Fw['currency'].' '.$Fw['budget'];?></td>
                                           <td><a href="<?php echo AdminUrl;?>Projects/project_details.php?project_id=<?php echo $Fw['project_id']; ?>&val=1"><input type="button" name="Submit" value="Details" class="btn btn-sm btn-warning"></a></td>
                                           <td>
												<span class="btn-group">
												
										
														  <a href="./EditClientProject.php?TestCode=<?php echo $_GET['TestCode'];?>&AJCOde59=<?php echo $Fw['project_id']; ?>" title="Edit" class="btn btn-sm bs-tooltip">
														  <i class="icon-pencil"></i>
														  </a>
														  
														   <a  href="ClientProjects.php?TestCode=<?php echo $_GET['TestCode'];?>&AJCOde59=<?php echo $Fw['project_id']; ?>" onClick="return confirm('are you sure you want to delete??');" title="Delete" class="btn btn-sm bs-tooltip">
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
