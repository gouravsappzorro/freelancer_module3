<?php session_start(); ?>
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



	

<?php if(! isset($_SESSION['UserName']) && ! isset($_SESSION['Email']) && ! isset($_SESSION['UserId']) ) { ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Login</title>

	<!--=== CSS ===-->

	<!-- Bootstrap -->
	<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

	<!-- Theme -->
	<link href="assets/css/main.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/icons.css" rel="stylesheet" type="text/css" />

	<!-- Login -->
	<link href="assets/css/login.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="assets/css/fontawesome/font-awesome.min.css">
	<!--[if IE 7]>
		<link rel="stylesheet" href="assets/css/fontawesome/font-awesome-ie7.min.css">
	<![endif]-->

	<!--[if IE 8]>
		<link href="assets/css/ie8.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>

	<!--=== JavaScript ===-->

	<script type="text/javascript" src="assets/js/libs/jquery-1.10.2.min.js"></script>

	

	<!-- Slim Progress Bars -->
	<script type="text/javascript" src="plugins/nprogress/nprogress.js"></script>



	<!-- App -->
	<script type="text/javascript" src="assets/js/login.js"></script>
	<script>
	$(document).ready(function(){
		"use strict";

		Login.init(); // Init login JavaScript
	});
	</script>
	
	
<script type="text/javascript" src="./MyInclude/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
function validLogin(){
      var User = $('#User').val();
      var Pass = $('#Pass').val();

      var dataString = 'User='+ User + '&Pass='+ Pass;
      $("#flash").show();
      $("#flash").fadeIn(400).html('<img src="./MyInclude/green.gif" style="height:60px; width:60px;"/>');
      $.ajax({
      type: "POST",
      url: "processed.php",
      data: dataString,
      success: function(result){
               var result=trim(result);
               $("#flash").hide();
               if(result){
                     window.open('index.php','_self');
               
               }else{
                     $("#errorMessage").html(result);
               }
			   if(result=='corect'){
                     window.location='../Verification/';
               }else{
                     $("#errorMessage").html(result);
               }
      }
      });
}


function validForgot(){
      var Email = $('#Email').val();

      var dataString = 'Email='+ Email;
      $("#flash").show();
	  $("trash").hide();
	  $("#trash").html('<div class="alert alert-success fade in"><i class="icon-remove close" data-dismiss="alert"></i><strong>Success!</strong> Please open your email we send password in email .. .</div>');
      $("#flash").fadeIn(400).html('<img src="./MyInclude/green.gif" style="height:60px; width:60px;"  />');
      $.ajax({
      type: "POST",
      url: "processed.php",
      data: dataString,
      cache: false,
      success: function(result){
               var result=trim(result);
               $("#flash").hide();
               if(result=='Verify')
			   {
			   	$("#trash").show();
                    // window.location='./index.html';
               }else{
                     $("#Message").html(result);
					 $("#trash").hide();
               }
			   if(result=='corect'){
                     window.location='../Verification/';
               }else{
                     $("#Message").html(result);
               }
      }
      });
}


function trim(str){
     var str=str.replace(/^\s+|\s+$/,'');
     return str;
}
</script>

	
	
</head>

<body class="login">
<div id="trash"></div>
	<!-- Logo -->
	<div class="logo">
		<strong>Admin</strong>Panel
	</div>
	<!-- /Logo -->

	<!-- Login Box -->
	<div class="box">
		<div class="content">
			<!-- Login Formular -->
			<form class="form-vertical login-form"  method="post">
				<!-- Title -->
				<div id="flash"></div>	
				<div  id="errorMessage" style="color:#b94a48; font-weight:bold; font-family:Lucida Bright"></div>
				<h3 class="form-title">Sign In to your Account</h3>
									
       							   
								   
				<!-- Error Message -->

				<!-- Input Fields -->
				<div class="form-group">
					<label for="username">Username:</label>
					<div class="input-icon">
						<i class="icon-user"></i>
						<input type="text" name="User" id="User" class="form-control" placeholder="Username" autofocus data-rule-required="true" data-msg-required="Please enter your username." />
					</div>
				</div>
				<div class="form-group">
					<label for="password">Password:</label>
					<div class="input-icon">
						<i class="icon-lock"></i>
						<input type="password" name="Pass" id="Pass" class="form-control" placeholder="Password" data-rule-required="true" data-msg-required="Please enter your password." />
					</div>
				</div>
				<!-- /Input Fields -->

				<!-- Form Actions -->
				<div class="form-actions">
					<label class="checkbox pull-left"><input type="checkbox" class="uniform" name="remember"> Remember me</label>
					
					<input type="button" id="submit-visit" value="Log in" style="width:auto" name="submit" onClick="validLogin()" class="submit btn btn-primary pull-right">
						
				</div>
			</form>
			<!-- /Login Formular -->

			
		</div> <!-- /.content -->

		<!-- Forgot Password Form -->
		<div class="inner-box">
			<div class="content">
				<!-- Close Button -->
				<i class="icon-remove close hide-default"></i>

				<!-- Link as Toggle Button -->
				
				<div id="flash"></div>	
				<div  id="Message" style="color:#b94a48; font-weight:bold; font-family:Lucida Bright"></div>
				<a href="#" class="forgot-password-link">Forgot Password?</a>

				<!-- Forgot Password Formular -->
				<form class="form-vertical forgot-password-form hide-default"  method="post">
					<!-- Input Fields -->
					<div class="form-group">
						<!--<label for="email">Email:</label>-->
						<div class="input-icon">
							<i class="icon-envelope"></i>
							<input type="email" name="Email" id="Email" class="form-control" placeholder="Enter email address" data-rule-required="true" data-rule-email="true" data-msg-required="Please enter your email." />
						</div>
					</div>
					<!-- /Input Fields -->
					
					<button type="button" id="submit-visit"  class="submit btn btn-default btn-block" onClick="validForgot()">
						Reset your Password
					</button>
				</form>
				<!-- /Forgot Password Formular -->

				
			</div> <!-- /.content -->
		</div>
		<!-- /Forgot Password Form -->
	</div>
	<!-- /Login Box -->

</body>
</html>
<?php }else { echo '<div align="center"> <img src="./MyInclude/green.gif" /> </div>	<meta http-equiv="refresh" content="0; url=./index.php"/> ';} ?>
