<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Manage Commision</title>

<?php include "../MyInclude/HomeScript.php"; ?>
	<?php include "../MyInclude/MyEditor.php"; ?>
	
    <style>
      section {   width: 100%; margin: auto; text-align: left; }
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
				
				<?php /*include "../include/notify-navigation.php";*/ ?>
				
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

				
				
				<div class="row">
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box" style="margin-top:50px;">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i>Commision</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">	
                            
						<?php
						$sql_commision = mysql_query("SELECT * FROM admin_commision_percentage");
						$row_commision=mysql_fetch_array($sql_commision);
						$num_commision=mysql_num_rows($sql_commision);
							
						if(isset($_POST['AddCommision']))
						{
							$client=trim($_POST['Client']);
							$developer=trim($_POST['Developer']);
							
							if($num_commision > 0)
							{
								$update=mysql_query("update admin_commision_percentage set client_percentage='$client',developer_percentage='$developer'");
								echo $update;
								
								if($update)
								{
									echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
									echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Data Update Successfully!</strong>.
									   </div>';
							   		echo '<meta http-equiv="refresh" content="3; url=./index.php" />';	
								}	
								else
								{
									echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Please Try Again Somethings wrong!</strong> .
									</div>';
								}
							}
							else
							{
								$insert=mysql_query("INSERT INTO `admin_commision_percentage`(`client_percentage`,`developer_percentage`) VALUES ($client,$developer)");
								
								if($insert)
								{
									echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
									echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>Data Insert Successfully!</strong>.
									   </div>';
							   		echo '<meta http-equiv="refresh" content="3; url=./index.php" />';	
								}	
								else
								{
									echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Please Try Again Somethings wrong!</strong> .
									</div>';
								}
							}
						}
						?>				
												
				<form name="individual_signup" class="form-horizontal"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return Validation(this);" method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-2 control-label">From Client<span class="required">*</span></label>
									<div class="col-md-4">
										<label for="client" class="error" id="client_error"></label>
											<div class="input-group">
</span>
													<input type="text" name="Client" id="Client" value="<?php if($num_commision > 0){ echo $row_commision['client_percentage'];}else{ echo isset($_POST['Client']);}?>"  title="From Client" onFocus="if (this.value == 'From Client') {this.value = '';}" onBlur="ClientCheck(this.value)" class="form-control bs-tooltip" >
                                                    												<span class="input-group-addon"><i class="fa fa-percent"></i>

											</div>
									</div>
						   </div>

                           <div class="form-group">
								<label class="col-md-2 control-label">From Developer<span class="required">*</span></label>
									<div class="col-md-4">
										<label for="Developer" class="error" id="Developer_error"></label>
											<div class="input-group">
													<input type="text" name="Developer" id="Developer" value="<?php if($num_commision > 0){echo $row_commision['developer_percentage'];}else{ echo isset($_POST['Developer']);}?>"  title="From Developer" onFocus="if (this.value == 'From Developer') {this.value = '';}" onBlur="DeveloperCheck(this.value)" class="form-control bs-tooltip" >
                                                    												<span class="input-group-addon"><i class="fa fa-percent"></i>

											</div>
									</div>
						   </div>
                           
                           <div class="row">
							<div class="table-footer">
								<div class="col-md-12" >
									<div class="table-actions">
										<input type="submit" id="submit-visit" name="AddCommision" value="Save Commision" class="btn btn-primary pull-center">																				
									</div>
								</div>
							</div> <!-- /.table-footer -->
							</div> <!-- /.row -->
                            </form> 
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
<script>

function ClientCheck(Client){
	var regex=/^-?\d*(\.\d+)?$/;
	if (Client == '' || Client==null){
			
			document.getElementById("client_error").className = "error";
			document.getElementById("client_error").innerHTML = 'This field is required.';
			return false;
	}
	else if(!regex.test(Client))
	{
			document.getElementById("client_error").className = "error";
			document.getElementById("client_error").innerHTML = 'Please enter only Number.';
			return false;
	}
	else
	{
		document.getElementById("client_error").innerHTML = '';
		return true;		
		
	}
}
function DeveloperCheck(Developer){
	var regex=/^-?\d*(\.\d+)?$/;
	if (Developer == '' || Developer==null){
			
			document.getElementById("Developer_error").className = "error";
			document.getElementById("Developer_error").innerHTML = 'This field is required.';
			return false;
	}
	else if(!regex.test(Developer))
	{
			document.getElementById("Developer_error").className = "error";
			document.getElementById("Developer_error").innerHTML = 'Please enter only Number.';
			return false;
	}
	else
	{
		document.getElementById("Developer_error").innerHTML = '';
		return true;		
		
	}
}
function Validation(){
				
	var a = ClientCheck(document.getElementById("Client").value);
	var b = DeveloperCheck(document.getElementById("Developer").value);
	
	if(a && b){
		return true;
	}
	else{
		return false;	
	}
}
</script>
