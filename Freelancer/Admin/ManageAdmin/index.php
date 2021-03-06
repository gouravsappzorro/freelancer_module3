<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
						<?php	/**================================================================================||
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
								||=================================================================================**/?>



<?php if(isset($_SESSION['Email']) && isset($_SESSION['UserId']) && isset($_SESSION['UserName']))     { 
      $mainAdmin = mysql_num_rows(mysql_query("select * from admin_login where UserId = '".$_SESSION['UserId']."' and UserName = '".$_SESSION['UserName']."' and Status = 'SuperAdmin' "));
	  
	if($mainAdmin > 0 )
	{ ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>

	<?php include "../MyInclude/HomeScript.php"; ?>
	<!-- Validation JS ------>
		
		<script type="text/javascript" src="NewAdminValid.js"></script>

	
		<style>
		.error{ color:#FF0000; }
		</style>
	<!-- Validation Js Ending --->
	
	
	
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
				
				
				<!--=== Notify Navigation ===-->
				
				<?php //include "../MyInclude/HomeNotify-Navigation.php"; ?>
				
				<!-- /Notify Navigation -->
				
				
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
				
				<?php //include "../MyInclude/subheader.php"; ?>
				
				<!-- /Page Header -->

						<br /><br />
			
			
			
			
			

				<!--=== Page Content ===-->
				<div class="row">
				
				
				
				


					<!--=== Validation Example 2 ===-->
					<div class="col-md-2">
					</div>
					
					<div class="col-md-8">
						<div class="widget box">
							<div class="widget-header" align="center">
								<h4 ><i class="icon-male"></i>New Admin Profile</h4>
							</div>
							<div class="widget-content">
							<?php  if(isset($_SESSION['NewSu']) && $_SESSION['NewSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<center><strong>Your New Admin User Created Successfully!</strong>.</center>
													</div>';
													unset($_SESSION['NewSu']);
									}?>
								<form class="form-horizontal row-border" id="validate-1" action="NewAdminUpload.php" method="post" onSubmit="return JayCretedValidForm(this);" enctype="multipart/form-data">
				
									<div class="form-group">
									
										<label class="col-md-3 control-label">Member Name<span class="required">*</span></label>
										<div class="col-md-9"><label for="MemberName" class="error" id="MemberName_error"></label>
											<input type="text" name="MemberName" id="MemberName" onFocus="if (this.value == 'MemberName') {this.value = '';}" onBlur="MemberNameCheck(this.value)" class="form-control required" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Address<span class="required">*</span></label>
										<div class="col-md-9"><label for="Address" class="error" id="Address_error"></label>
											<input type="text" name="Address" id="Address" onFocus="if (this.value == 'Address') {this.value = '';}" onBlur="AddressCheck(this.value)" class="form-control required" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Contact No.<span class="required">*</span></label>
										<div class="col-md-9"><label for="ContactNo" class="error" id="ContactNo_error"></label>
											<input type="text" name="ContactNo" id="ContactNo" onFocus="if (this.value == 'ContactNo') {this.value = '';}" onBlur="ContactNoCheck(this.value)" class="form-control required" >
										</div>
										
									</div>
									
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">User Name<span class="required">*</span></label>
										<div class="col-md-9"><label for="UserName" class="error" id="UserName_error"></label>
										<input type="text" name="UserName" id="UserName" onFocus="if (this.value == 'UserName') {this.value = '';}" onBlur="UserNameCheck(this.value)" class="form-control required digits" >
                                        
                                        <input type="hidden" name="UserName_err" id="UserName_err" value="">
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">ChoosePassword<span class="required">*</span></label>
										<div class="col-md-9"><label for="Password" class="error" id="Password_error"></label>
											<input type="password" name="Password" id="Password"  onFocus="if (this.value == 'Password') {this.value = '';}" onBlur="PasswordCheck(this.value)"class="form-control required digits" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">ConfirmPassword<span class="required">*</span></label>
										<div class="col-md-9"><label for="ConfirmPassword" class="error" id="ConfirmPassword_error"></label>
											<input type="password" name="ConfirmPassword" id="ConfirmPassword" onFocus="if (this.value == 'ConfirmPassword') {this.value = '';}" onBlur="ConfirmPasswordCheck(this.value)" class="form-control required digits" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Email Address<span class="required">*</span></label>
										<div class="col-md-9"><label for="Email" class="error" id="Email_error"></label>
											<input type="text" name="Email" id="Email" onFocus="if (this.value == 'Email') {this.value = '';}" onBlur="EmailCheck(this.value)" class="form-control required digits" >
										</div>
										
									</div>
									
									
									
									
									
									<div class="form-actions">
										
										<input type="submit" id="submit-visit" name="AdminUpdate" value="Submit" class="btn btn-primary pull-right">
										
									</div>
								</form>
								
							</div>
						</div>
					</div>
					<!-- /Validation Example 2 -->
				</div>
				
		
				<div class="col-md-2">
					</div>
			
				<!-- /Page Content -->
			</div>
			<!-- /.container -->

		</div>
	</div>

</body>
</html>


<?php }
	  else{?>
	 				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../index.php" > 
	   
		  <?php }  

      }
	  else 
	  { ?> 
	  				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../MyInclude/green.gif"  >
					 </div>  
					<meta http-equiv="refresh" content="0; url=../LogIn.php" > 
<?php } ?>




<?php	/**================================================================================||
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
				||=================================================================================**/?>







