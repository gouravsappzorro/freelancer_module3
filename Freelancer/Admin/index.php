<?php
session_start();
?>
<?php //include "./MyInclude/Db_Conn.php"; ?>
<?php include "./MyInclude/MyConfig.php"; ?>

	
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







<?php if(isset($_SESSION['UserName']) && isset($_SESSION['Email']) && isset($_SESSION['UserId']) ) { ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>

	
		<script type="text/javascript" src="./Visiter/Chart/Chart4.js"></script>
		<script type="text/javascript">
			$(function () {
				var chart;
				$(document).ready(function() {
					$.getJSON("./Visiter/Chart/data.php", function(json) {
					
						chart = new Highcharts.Chart({
							chart: {
								renderTo: 'JayCreatedChart',
								type: 'line',
								marginRight: 30,
								marginBottom: 25
							},
							title: {
								text: 'Visiter Chart',
								x: -20 //center
							},
							subtitle: {
								text: 'WEBZIRA',
								x: -20
							},
							xAxis: {title: {
									text: 'Date'
								},
								categories: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12','13','14','15','16', '17','18','19','20','21', '22','23','24','25','26','27','28','29','30','31'],	
								
							},
							
							yAxis: {
								title: {
									text: 'Visiter'
								},
								plotLines: [{
									value: 0,
									width: 1,
									color: '#808080'
								}]
							},
							tooltip: {
								formatter: function() {
										return '<b>'+ 'Date :'+'Visiter'+'</b><br/>'+
										this.x +' : '+ this.y;
								}
							},
							legend: {
								//text: 'Visiter'
								layout: 'vertical',
								align: 'right',
								verticalAlign: 'top',
								x: -10,
								y: 100,
								borderWidth: 1
							},
							series: json
						});
					});
				
				});
				
			});
		</script>
		 <script src="./Visiter/Chart/chart.js"></script>
         <script src="./Visiter/Chart/chart1.js"></script>
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
		 
		 <?php include "./MyInclude/HomeScript.php"; ?>
         
         <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/DT_bootstrap.js"></script>
    <link href="plugins/datatables/dataTables.responsive.css" type="text/css" rel="stylesheet">
    <link href="plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">
	
</head>

<body>

	<?php  include "./MyInclude/HomeHeader.php"; ?>

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				
				<?php include "./MyInclude/HomeSearch.php"; ?>
				
				<!--=== Navigation ===-->
				
				<?php include "./MyInclude/HomeNavigation.php"; ?>
				
				<!-- /Navigation -->
				
		
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php @ include "./MyInclude/HomeSubheader.php"; ?>
				

<?php
if(isset($_POST['search']))
{
	$start_date=$_POST['date'];
	$end_date=$_POST['date1'];
	
	$active_user=mysql_num_rows(mysql_query("select * from register where status='active' and register_date>='".$start_date."' and register_date<='".$end_date."'"));
	$pending_user=mysql_num_rows(mysql_query("select * from register where status='pending' and register_date>='".$start_date."' and register_date<='".$end_date."'"));
	$projects=mysql_num_rows(mysql_query("select * from post_projects where post_date>='".$start_date."' and post_date<='".$end_date."'"));
	$clients=mysql_num_rows(mysql_query("select * from register where hire='Hire' and register_date>='".$start_date."' and register_date<='".$end_date."'"));
	$developers=mysql_num_rows(mysql_query("select * from register where hire='Work' and register_date>='".$start_date."' and register_date<='".$end_date."'"));
	$pending_project=mysql_num_rows(mysql_query("select * from post_projects where status='pending' and post_date>='".$start_date."' and post_date<='".$end_date."'"));
	$award_project=mysql_num_rows(mysql_query("select * from post_projects where status='award' and post_date>='".$start_date."' and post_date<='".$end_date."'"));
	$complete_project=mysql_num_rows(mysql_query("select * from post_projects where status='complete' and post_date>='".$start_date."' and post_date<='".$end_date."'"));
	$canceled_projects=mysql_num_rows(mysql_query("select * from post_projects where status='cancel' and post_date>='".$start_date."' and post_date<='".$end_date."'"));
	$message=mysql_num_rows(mysql_query("select DISTINCT project_id from message where Date>='".$start_date."' and Date<='".$end_date."'"));
	$Total_visitor=mysql_num_rows(mysql_query("select * from admin_pagehit_counter where date>='".$start_date."' and date<='".$end_date."'"));
	$Today_visitor=mysql_num_rows(mysql_query("select * from admin_pagehit_counter where date='".date('Y-m-d')."'"));
	$membership=mysql_fetch_array(mysql_query("select SUM(Amount) as amount from payment where PayDate>='".$start_date."' and PayDate<='".$end_date."'"));
	$commision=mysql_fetch_array(mysql_query("select SUM(total_commision) as commision from admin_commision where date>='".$start_date."' and date<='".$end_date."'"));
	$hit=mysql_query("select * from admin_pagehit_counter WHERE `Date` BETWEEN '$start_date' AND '$end_date' order by id DESC");
	
	
}
else
{
	$active_user=mysql_num_rows(mysql_query("select * from register where status='active'"));
	$pending_user=mysql_num_rows(mysql_query("select * from register where status='pending'"));
	$projects=mysql_num_rows(mysql_query("select * from post_projects"));
	$clients=mysql_num_rows(mysql_query("select * from register where hire='Hire'"));
	$developers=mysql_num_rows(mysql_query("select * from register where hire='Work'"));
	$pending_project=mysql_num_rows(mysql_query("select * from post_projects where status='pending'"));
	$award_project=mysql_num_rows(mysql_query("select * from post_projects where status='award'"));
	$complete_project=mysql_num_rows(mysql_query("select * from post_projects where status='complete'"));
	$canceled_projects=mysql_num_rows(mysql_query("select * from post_projects where status='cancel'"));
	$message=mysql_num_rows(mysql_query("select DISTINCT project_id from message"));
	$Total_visitor=mysql_num_rows(mysql_query("select * from admin_pagehit_counter"));
	$Today_visitor=mysql_num_rows(mysql_query("select * from admin_pagehit_counter where date='".date('Y-m-d')."'"));
	$membership=mysql_fetch_array(mysql_query("select SUM(Amount) as amount from payment"));
	$commision=mysql_fetch_array(mysql_query("select SUM(total_commision) as commision from admin_commision"));
	$hit=mysql_query("select * from admin_pagehit_counter order by id DESC LIMIT 100");
}
?>
<div class="row row-bg"> <!-- .row-bg -->
    <div class="col-sm-6 col-md-3">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual cyan">
                    <div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
                </div>
                <div class="title">Today Visiter</div>
                <div class="value"><?php echo $Today_visitor; ?></div>
                
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->

    <div class="col-sm-6 col-md-3">
    
    </div> <!-- /.col-md-3 -->

    <div class="col-sm-6 col-md-3 hidden-xs">
    </div>

    <div class="col-sm-6 col-md-3 hidden-xs">
        <div class="statbox widget box box-shadow">
            <div class="widget-content">
                <div class="visual red">
                    <i class="fa fa-users fa-fw"></i>
                </div>
                <div class="title">Total Visitors</div>
                <div class="value"><?php echo $Total_visitor ?></div>
                
            </div>
        </div> <!-- /.smallstat -->
    </div> <!-- /.col-md-3 -->
</div>
<div class="row row-bg"> 
<form id="dateRangeForm" method="post" class="form-horizontal">
    <div class="container form-group">
        <div class="col-sm-1">
        	
        </div>
        <div class="col-sm-4 date">
            <div class="input-group input-append date" >
                <input type="text" class="form-control" name="date" id="dateRangePicker" value="<?php if(isset($_POST['date'])){ echo $_POST['date'];}?>" placeholder="Start Date">
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
         <div class="col-sm-4 date1">
            <div class="input-group input-append date" >
                <input type="text" class="form-control" name="date1" id="dateRangePicker1" value="<?php if(isset($_POST['date1'])){ echo $_POST['date1'];}?>" placeholder="End Date">
                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
            </div>
        </div>
        <div class="col-sm-2">
        	<input type="submit" class="btn btn-default" name="search" value="Search">
        </div>
    </div>
   <br><br>
</form> <!-- .row-bg -->
							
					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
						
							<div class="widget-content">
								<div class="title" style="font-align:center;">Active Users</div>
								<div class="value"><?php echo $active_user;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
								<div class="widget-content">
								
								<div class="title" style="font-align:center;">Pending Users</div>
								<div class="value"><?php echo $pending_user;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">No Of Projects</div>
								<div class="value"><?php echo $projects;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">No Of Clients</div>
								<div class="value"><?php echo $clients;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">No Of Developers</div>
								<div class="value"><?php echo $developers;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
																
								<div class="title">Pending Projects</div>
								<div class="value"><?php echo $pending_project;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">Awarded Projects</div>
								<div class="value"><?php echo $award_project;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">Completed Projects</div>
								<div class="value"><?php echo $complete_project;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
                    
                    <div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">Canceled Projects</div>
								<div class="value"><?php echo $canceled_projects;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
                    
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">No Of Message Exchanged</div>
								<div class="value"><?php echo $message;?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">Membership Income</div>
								<div class="value"><?php if($membership['amount']==''){ echo 0;}else{ echo $membership['amount'];}?></div>
								
							</div>
						</div><!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="title">From Project's Income</div>
								<div class="value"><?php if($commision['commision']==''){ echo 0;}else{ echo $commision['commision'];}?></div>
								
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->


					<div class="col-sm-6 col-md-3">
					
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
					</div>

					
				</div>
				<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Total Visiter Chart</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div id="JayCreatedChart" style=""></div>
							</div>
		
				   			
							<div class="widget-content">
								<ul class="stats"> <!-- .no-dividers -->
									<li>
										<strong><?php $visitor=mysql_num_rows(mysql_query("select * from admin_pagehit_counter")); echo $visitor; ?></strong>
										<small>Total Views</small>
									</li>
									<li class="light hidden-xs">
										<strong>
										<?php
											$yesterday=mysql_num_rows(mysql_query("select * from admin_pagehit_counter WHERE `date` = CURDATE() - INTERVAL 1 DAY"));
										
                                        	echo $yesterday; 
                                        ?>
                                        </strong>
										<small>Total of Yesterday</small>
									</li>
									
								</ul>
							</div>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->
				<div class="row">
							
								<div class="col-md-12">
								
									<div class="widget box">
									
										<div class="widget-header">
										
											<h4><i class="icon-reorder"></i>View All Hits</h4>
											
												<div class="toolbar no-padding">
													
											</div>						
										</div>
									<div class="widget-content table-responsive">
									
										<table class="table table-striped table-hover table-checkable table-colvis datatable dataTable">
										
											<thead>
												<tr>
													<th class="checkbox-column">
														<input type="checkbox" class="uniform">
													</th>
													<th>Page Name</th>
													<th>Country</th>
													<th>City</th>
													<th>Ip Address</th>
													<th>Date</th>
												</tr>
											</thead>
											<tbody>
									
										<?php
				   							while($hitdata=mysql_fetch_array($hit)){
					
										?>	
						  		 
												<tr>
													<td class="checkbox-column">
														<input type="checkbox" name="Code[]" value="<?php echo $Fw['Userid']; ?>" class="uniform">
													</td>
													<td><?php echo $hitdata['PageName']; ?></td>
													<td><?php echo $hitdata['CountryName']; ?></td>
													<td><?php echo $hitdata['CityName']; ?></td>
													<td><?php echo $hitdata['IpAddress']; ?></td>
													<td><?php echo $hitdata['Date']; ?></td>
													
												</tr>
										
										<?php } ?>	
										
											</tbody>
										
										</table>
								
									</div>
							
									</div>
							
								</div>
						
							</div>
				
				
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

<?php }else { echo '<div align="center"> <img src="./MyInclude/green.gif" /> </div>	<meta http-equiv="refresh" content="0; url=./LogOut.php"/> ';} ?>






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

