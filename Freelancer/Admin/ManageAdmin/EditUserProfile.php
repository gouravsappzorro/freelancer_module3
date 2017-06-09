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



<?php if(isset($_SESSION['UserName']) && isset($_SESSION['Email']) && isset($_SESSION['UserId']) ) { ?>

<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>

<?php include "../MyInclude/HomeScript.php"; ?>
	<!-- Validation JS ------>
		
		<script type="text/javascript" src="EditAdminValid.js"></script>

	<!-- Validation Js Ending --->
	
    	<style>
		.error{ color:#FF0000; }
		</style>
	
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
				
				<?php // include "../include/notify-navigation.php"; ?>
				
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
				
				<?php // include "../include/subsubheader.php"; ?>
				
				<!-- /Page Header -->
		<br /><br />

			<?php 
					$Code  = $_GET['AJCOde59'];
					$Edit  = mysql_fetch_array(mysql_query("SELECT * FROM admin_login WHERE UserId = '".$Code."'")) ;
			?>

				<!--=== Page Content ===-->
				<div class="row">
					<div class="col-md-6">
						<div class="widget box">
							<div class="widget-header" align="center">
								<h4 ><i class="icon-male"></i>Edit Your  Admin Profile</h4>
							</div>
							<div class="widget-content">
							<?php if(isset($_SESSION['NewSu']) && $_SESSION['NewSu'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<center><strong>Your Admin Profile Updated Successfully!</strong>.</center>
													</div>';
											unset($_SESSION['NewSu']);
													
									}?>
								<form class="form-horizontal row-border" id="validate-1" action="NewAdminUpload.php" method="post" onSubmit="return adminProfileValidation(this);" enctype="multipart/form-data">
				
									<div class="form-group">
									
										<label class="col-md-3 control-label">Member Name<span class="required">*</span></label>
										<div class="col-md-9"><label for="MemberName" class="error" id="MemberName_error"></label>
											<input type="text" name="MemberName" id="MemberName" value="<?php echo $Edit['MemberName']; ?>" onFocus="if (this.value == 'MemberName') {this.value = '';}" onBlur="MemberNameCheck(this.value)" class="form-control required" >
											<input type="hidden" name="Code" value="<?php echo $Code  = $_GET['AJCOde59']; ?>" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Address<span class="required">*</span></label>
										<div class="col-md-9"><label for="Address" class="error" id="Address_error"></label>
											<input type="text" name="Address" id="Address" value="<?php echo $Edit['Address']; ?>" onFocus="if (this.value == 'Address') {this.value = '';}" onBlur="AddressCheck(this.value)" class="form-control required" >
										</div>
										
									</div>
									
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Contact No.<span class="required">*</span></label>
										<div class="col-md-9"><label for="ContactNo" class="error" id="ContactNo_error"></label>
											<input type="text" name="ContactNo" id="ContactNo" value="<?php echo $Edit['ContactNo']; ?>" onFocus="if (this.value == 'ContactNo') {this.value = '';}" onBlur="ContactNoCheck(this.value)" class="form-control required" >
										</div>
										
									</div>
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">Email Address<span class="required">*</span></label>
										<div class="col-md-9"><label for="Email" class="error" id="Email_error"></label>
											<input type="text" name="Email" id="Email" value="<?php echo $Edit['Email']; ?>" onFocus="if (this.value == 'Email') {this.value = '';}" onBlur="EmailCheck(this.value)" class="form-control required digits" >
										</div>
										
									</div>
									
                                    <?php
									if($Edit['Status']=='SuperAdmin')
									{
									?>
									<div class="form-group">
									
										<label class="col-md-3 control-label">Paypal Account<span class="required">*</span></label>
										<div class="col-md-9"><label for="PaypalAccount" class="error" id="Paypal_error"></label>
											<input type="text" name="PaypalAccount" id="PaypalAccount" value="<?php echo $Edit['paypal_account']; ?>" onFocus="if (this.value == 'PaypalAccount') {this.value = '';}" onBlur="PaypalAccountCheck(this.value)" class="form-control required digits" >
										</div>
										
									</div>
									
                                    <?php }?>
									
									<div class="form-actions">
										
                                        <input type="hidden" name="status" value="<?php echo $Edit['Status'];?>">
										<input type="submit" id="submit-visit" name="EditAdminProfile" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
                    
                    
                    <div class="col-md-6">
						<div class="widget box">
							<div class="widget-header" align="center">
								<h4 ><i class="icon-key"></i>Edit Your Admin Password</h4>
							</div>
							<div class="widget-content">
							<?php if(isset($_SESSION['UPDATEPWD']) && $_SESSION['UPDATEPWD'] == 'Done' )
									{
											echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<center><strong>Your Admin Password Updated Successfully!</strong>.</center>
													</div>';
											unset($_SESSION['UPDATEPWD']);
													
									}?>
								<form class="form-horizontal row-border" id="validate-1" action="NewAdminUpload.php" method="post" onSubmit="return adminPasswordValidation(this);" enctype="multipart/form-data">
				
									<div class="form-group">
									
										<label class="col-md-3 control-label">Old Password<span class="required">*</span></label>
										<div class="col-md-9"><label for="OldPassword" class="error" id="OldPassword_error"></label>
											<input type="password" name="OldPassword" id="OldPassword"  onFocus="if (this.value == 'OldPassword') {this.value = '';}" onBlur="OldPasswordCheck(this.value)"class="form-control required digits" >
											
                                            <input type="hidden" name="EditPassword" id="EditPassword" value="<?php echo  $Edit['Password']; ?>">
                                            
                                            <input type="hidden" name="Code" value="<?php echo $Code  = $_GET['AJCOde59']; ?>" >
										</div>
										
									</div>
									
									<div class="form-group">
									
										<label class="col-md-3 control-label">NewPassword<span class="required">*</span></label>
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
									
									
									<div class="form-actions">
										
										<input type="submit" id="submit-visit" name="EditAdminPassword" value="Update" class="btn btn-primary pull-right">
									</div>
								</form>
							</div>
						</div>
					</div>
                    
					<!-- /Validation Example 2 -->
				</div>
				<!-- /Page Content -->
			</div>
			<!-- /.container -->
		</div>
	</div>
</body>
</html>


<?php }else { echo '<div align="center"> <img src="./MyInclude/green.gif" /> </div>	<meta http-equiv="refresh" content="0; url=../LogIn.php"/> ';} ?>




<?php	      	/**================================================================================||
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
				||=================================================================================**/
?>