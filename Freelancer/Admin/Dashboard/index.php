<?php session_start(); ?>
<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>

	<?php include "../include/script.php"; ?>
	
</head>

<body>

	<?php include "../include/header.php"; ?>

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				
				<?php include "../include/search.php"; ?>
				
				<!--=== Navigation ===-->
				
				<?php include "../include/navigation.php"; ?>
				
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
				
				<?php include "../include/subheader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				<?php include "../include/subsubheader.php"; ?>
				
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row row-bg"> <!-- .row-bg -->
					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual cyan">
									<div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>
								</div>
								<div class="title">Clients</div>
								<div class="value">4 501</div>
								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual green">
									<div class="statbox-sparkline">20,30,30,29,22,15,20,30,32</div>
								</div>
								<div class="title">Feedbacks</div>
								<div class="value">714</div>
								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual yellow">
									<i class="icon-dollar"></i>
								</div>
								<div class="title">Total Profit</div>
								<div class="value">$42,512.61</div>
								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->

					<div class="col-sm-6 col-md-3 hidden-xs">
						<div class="statbox widget box box-shadow">
							<div class="widget-content">
								<div class="visual red">
									<i class="icon-user"></i>
								</div>
								<div class="title">Visitors</div>
								<div class="value">2 521 719</div>
								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>
							</div>
						</div> <!-- /.smallstat -->
					</div> <!-- /.col-md-3 -->
				</div> <!-- /.row -->
				<!-- /Statboxes -->

				<!--=== Blue Chart ===-->
				<div class="row">
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Total Clicks (<span class="blue">+29%</span>)</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content">
								<div id="chart_filled_blue" class="chart"></div>
							</div>
							<div class="divider"></div>
							<div class="widget-content">
								<ul class="stats"> <!-- .no-dividers -->
									<li>
										<strong>4,853</strong>
										<small>Total Views</small>
									</li>
									<li class="light hidden-xs">
										<strong>271</strong>
										<small>Last 24 Hours</small>
									</li>
									<li>
										<strong>1,025</strong>
										<small>Unique Users</small>
									</li>
									<li class="light hidden-xs">
										<strong>105</strong>
										<small>Last 24 Hours</small>
									</li>
								</ul>
							</div>
						</div>
					</div> <!-- /.col-md-12 -->
				</div> <!-- /.row -->
				<!-- /Blue Chart -->

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> New Contact Inquiries</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-striped table-checkable table-hover">
									<thead>
										<tr>
											<th class="checkbox-column">
												<input type="checkbox" class="uniform">
											</th>
											<th class="hidden-xs">Name</th>
											<th>Email</th>
											<th>Phone</th>
											<th>Comments</th>
											<th class="align-center">Send Mail</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Greencubes</td>
											<td>mormiraj@gmail.com</td>
											<td>+91-99743 93731</td>
											<td>This is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments box</td>
											<td><input type="button" name="Submit" value="Reply"></td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Greencubes</td>
											<td>mormiraj@gmail.com</td>
											<td>+91-99743 93731</td>
											<td>This is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments box</td>
											<td><input type="button" name="Submit" value="Reply"></td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Greencubes</td>
											<td>mormiraj@gmail.com</td>
											<td>+91-99743 93731</td>
											<td>This is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments box</td>
											<td><input type="button" name="Submit" value="Reply"></td>
										</tr>
										<tr>
											<td class="checkbox-column">
												<input type="checkbox" class="uniform">
											</td>
											<td class="hidden-xs">Greencubes</td>
											<td>mormiraj@gmail.com</td>
											<td>+91-99743 93731</td>
											<td>This is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments boxThis is an inquiry comments box</td>
											<td><input type="button" name="Submit" value="Reply"></td>
										</tr>
									</tbody>
								</table>
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12">
											<div class="table-actions">
												<label>Apply action:</label>
												<select class="select2" data-minimum-results-for-search="-1" data-placeholder="Select action...">
													<option value=""></option>
													<option value="Edit">Edit</option>
													<option value="Delete">Delete</option>
												</select>
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

<?php }
	  else 
	  { ?> 
	  				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../LogiIn.php" > 
<?php } ?>
