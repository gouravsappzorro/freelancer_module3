<?php session_start(); ?><?php include "./MyInclude/Db_Conn.php"; ?><?php include "./MyInclude/MyConfig.php"; ?>	<?php						     	/**================================================================================||								||      *Developer : Green Cubes Solutions										   ||								||      *Website   : www.greencubes.co.in										   ||								||      *Date      : 25-11-2014													   ||								||																				   ||								||      *  NOTICE OF LICENSE  *													   ||								|| 																				   ||								|| 																				   ||								||		   This source file is subject to the Company Copyright 				   ||								||		   and its use by any other party without concern of Greencubes        	   ||								||  	   or trying to sell this code will be considered illegal 				   ||								||		   and any legal actions can be undertaken.								   ||								||		   If you want to receive a copy of the license, please send an email      ||								||  	   to info@greencubes.co.in, for further procedure						   ||								||=================================================================================**/        ?><!DOCTYPE html><html lang="en"><head>	<meta charset="utf-8">	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />	<title>Admin Panel Dashboard</title><?php include "./MyInclude/HomeScript.php"; ?>	<?php $up = mysql_query("UPDATE admin_contact_form SET Type = '1'  where TestCode = '".$_GET['TestCode']."' "); ?>    <style>                section {            width: 100%;            margin: auto;            text-align: left;        }    </style>	<script type="text/javascript" src="Admin/AddNewPageValid.js"></script>			<style>		.error{ color:#FF0000; }		</style>	<!-- Validation Js Ending ---></head><body>	<?php  include "./MyInclude/HomeHeader.php"; ?>	<div id="container">		<div id="sidebar" class="sidebar-fixed">			<div id="sidebar-content">				<!-- Search Input -->								<?php include "./MyInclude/HomeSearch.php"; ?>								<!--=== Navigation ===-->								<?php include "./MyInclude/HomeNavigation.php"; ?>				<!-- /Navigation -->										</div>			<div id="divider" class="resizeable"></div>		</div>		<!-- /Sidebar -->		<div id="content">			<div class="container">				<!-- Breadcrumbs line -->								<?php include "./MyInclude/HomeSubHeader.php"; ?>								<!-- /Breadcrumbs line -->				<!--=== Page Header ===-->							<?php 						$GetCo = mysql_num_rows(mysql_query("select * from admin_contact_form "));											    $Sky    = mysql_query("SELECT SUM(Count)  AS totalcount FROM admin_visiter_count ");				  while($coni   = mysql_fetch_array($Sky)){ 				        $Visit  = $coni['totalcount']  ;  }    						?>						<!--=== Page Content ===-->				<!--=== Statboxes ===-->				<div class="row row-bg"> <!-- .row-bg -->					<div class="col-sm-6 col-md-3">						<div class="statbox widget box box-shadow">							<div class="widget-content">								<div class="visual cyan">									<div class="statbox-sparkline">30,20,15,30,22,25,26,30,27</div>								</div>								<div class="title">Clients Inquiry</div>								<div class="value"><?php echo $GetCo; ?></div>								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>							</div>						</div> <!-- /.smallstat -->					</div> <!-- /.col-md-3 -->					<div class="col-sm-6 col-md-3">										</div> <!-- /.col-md-3 -->					<div class="col-sm-6 col-md-3 hidden-xs">					</div>					<div class="col-sm-6 col-md-3 hidden-xs">						<div class="statbox widget box box-shadow">							<div class="widget-content">								<div class="visual red">									<i class="icon-user"></i>								</div>								<div class="title">Visitors</div>								<div class="value"><?php echo $Visit;  ?></div>								<a class="more" href="javascript:void(0);">View More <i class="pull-right icon-angle-right"></i></a>							</div>						</div> <!-- /.smallstat -->					</div> <!-- /.col-md-3 -->				</div> <!-- /.row -->				<!-- /Statboxes -->				<div class="row">						<div class="col-md-6" >							<div class="widget box" >								<div class="widget-header">									<h4><i class="icon-reorder"></i> Inquiry Full Details</h4>										<!-- Toolbar -->									<div class="toolbar no-padding">										<div class="btn-group">																						<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>																					</div>									</div>									<!-- /Toolbar -->								</div>								<div class="widget-content">								<?php 										$Code  = $_GET['TestCode'];										$Cont  = mysql_fetch_array(mysql_query("Select * From admin_contact_form where TestCode = '".$Code."' "))								?>								<div class="form-group">								<label class="col-md-3 control-label">Name</label>										<label class="col-md-7 control-label">												<?php echo $Cont['Name']; ?>										</label>								</div>								<br />								<div class="form-group">										<label class="col-md-3 control-label">Email</label>										<label class="col-md-7 control-label">												<?php echo $Cont['Email']; ?>										</label>								</div>																		<br />								<div class="form-group">										<label class="col-md-3 control-label">Phone</label>										<label class="col-md-7 control-label">												<?php echo $Cont['Phone']; ?>										</label>								</div>																	<br />								<div class="form-group">										<label class="col-md-3 control-label">Vehicle Make</label>										<label class="col-md-7 control-label">												<?php echo $Cont['VehicleMake']; ?>										</label>								</div>																													<br />								<div class="form-group">										<label class="col-md-3 control-label">Vehicle Model</label>										<label class="col-md-7 control-label">												<?php echo $Cont['VehicleModel']; ?>										</label>								</div>																																										<br />								<div class="form-group">										<label class="col-md-3 control-label">Message</label>										<label class="col-md-7 control-label">												<?php echo $Cont['Message']; ?>										</label>								</div>																																			<a class="more" href="javascript:void(0);"> <br /></a>								</div>							</div>						</div>																																								</div> <!-- /.row -->																															<!-- /Page Content -->			</div>			<!-- /.container -->		</div>	</div></body></html>