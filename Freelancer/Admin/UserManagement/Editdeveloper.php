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
	<title>Admin Panel Dashboard</title>
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
				
				<?php //include "../include/subsubheader.php"; ?>

				
				<div class="row"> <!-- .row-bg -->
					<br><br><br>

				</div>
				
				<div class="row">
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> Edit developer</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">	
                            
						<?php  
						$Code  = $_GET['AJCOde59'];
						
						$developer = mysql_fetch_array(mysql_query("SELECT * FROM register WHERE id = '".$Code."' "));			
											
						if(isset($_POST['Editdeveloper']))
						{
							
							$UserId     =   trim($_POST['UserId']);
							$email		=	trim($_POST['UserEmail']);
							$fname		=	trim($_POST['FName']);
							$lname		=	trim($_POST['LName']);
							$cntry		=	trim($_POST['Country']);
							$city		=	trim($_POST['city']);
							$status		=	trim($_POST['status']);
							$data="select * from location where Code='".$cntry."'";
							$res=mysql_query($data);
							$row=mysql_fetch_array($res);
							$cnt=$row['Name'];
							
							if($_POST['Password']=='')
							{
								$password   =   $developer['password'];
							}
							else
							{
								$password   =   trim($_POST['Password']);
							}
								
							$update		=	"UPDATE register SET				
							first_name	=	'$fname',
							last_name	=	'$lname',
							email		=	'$email',
							username	=	'$UserId',
							password	=	'$password',
							country		=	'$cnt',
							city		=	'$city',
							status		=	'$status'
							WHERE id	=	'$Code'
							";
							
							$InData		= mysql_query($update); 	
							
							if($InData)
							{
								echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
								echo  '<div class="alert alert-success fade in">
													<i class="icon-remove close" data-dismiss="alert"></i>
													<strong>developer Data Update Successfully!</strong>.
									   </div>';
							    echo '<meta http-equiv="refresh" content="3; url=./developer-management.php" />';	
								$_SESSION['UpdateSu'] = 'Done';
							}	
							else
							{
								echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Please Try Again Somethings wrong!</strong> .
									</div>';
							}
						}							
						
				?>				
												
				<form name="individual_signup" class="form-horizontal"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return RegistationValidation(this);" method="post"  enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-md-2 control-label">User Id<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="UserId" class="error" id="UserId_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-user"></i></span>
													<input type="text" name="UserId" id="UserId" value="<?php echo $developer['username'] ?>"  title="User Id" onFocus="if (this.value == 'UserId') {this.value = '';}" onBlur="UserIdCheck(this.value)" class="form-control bs-tooltip" >
                                              <input type="hidden" name="username_err" id="username_err" value="">
											</div>
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">Password</label>
									<div class="col-md-6">
										<label for="Password" class="error" id="Password_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-key"></i></span>
													<input type="password" name="Password" id="Password" value="<?php echo isset($_POST['Password']); ?>"  title="Password" onFocus="if (this.value == 'Password') {this.value = '';}" onBlur="PasswordCheck(this.value)" class="form-control bs-tooltip" >
											</div>
									</div>
						   </div>
                           <div class="form-group">
								<label class="col-md-2 control-label">Confirm Password</label>
									<div class="col-md-6">
										<label for="Confirm" class="error" id="Confirm_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-key"></i></span>
													<input type="password" name="Confirm" id="Confirm" value="<?php echo isset($_POST['Confirm']); ?>"  title="Confirm Password" onFocus="if (this.value == 'Confirm Password') {this.value = '';}" onBlur="ConfirmCheck(this.value)" class="form-control bs-tooltip" >
											</div>
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">Email<span class="required">*</span></label>
									<div class="col-md-6">
										<label for="UserEmail" class="error" id="UserEmail_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-envelope"></i></span>
													<input type="text" name="UserEmail" id="UserEmail" value="<?php echo $developer['email'] ?>"  title="User Email" onFocus="if (this.value == 'UserEmail') {this.value = '';}" onBlur="UserEmailCheck(this.value)" class="form-control bs-tooltip" >
											</div>
                                            <input type="hidden" name="email_err" id="email_err" value="">
									</div>
						   </div>
                           
                           <div class="form-group">
								<label class="col-md-2 control-label">First Name<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="FName" class="error" id="FName_error"></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-cog"></i></span>
													<input type="text" name="FName" id="FName" value="<?php echo $developer['first_name'] ?>"  title="First Name" onFocus="if (this.value == 'First Name') {this.value = '';}" onBlur="FNameCheck(this.value)" class="form-control bs-tooltip" >
											</div>
                                    </div>        
                               </div>
                                            
                               <div class="form-group">
								<label class="col-md-2 control-label">Last Name<span class="required">*</span></label>
									<div class="col-md-6">
                                    
										<label for="LName" class="error" id="LName_error"></label>             
                                            <div class="input-group">
												<span class="input-group-addon"><i class="icon-cog"></i></span>
													<input type="text" name="LName" id="LName" value="<?php echo $developer['last_name'] ?>"  title="Last Name" onFocus="if (this.value == 'Last Name') {this.value = '';}" onBlur="LNameCheck(this.value)" class="form-control bs-tooltip" >
											</div>
									</div>
						   </div>
						   
						  
							
                        <div class="form-group">
                        
                        <?php $country = mysql_query("select * from location where Status='Published' order by Name"); ?>
                        
                        	<label class="col-md-2 control-label">Country<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="Country" class="error" id="Country_error"></label>
                            
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-arrow-down"></i></span>
                                    <select name="Country" id="Country"  title="Country" onFocus="if (this.value == 'Country') {this.value = '0';}" onBlur="CountryCheck(this.value)" class="form-control bs-tooltip" onChange="cityFetch()">
                                    	<option value="0">Select Country</option>
                                    <?php while($con = mysql_fetch_array($country)) :?>
                                    	<option <?php if($con['Name'] == $developer['country']) : echo 'selected="selected"'; endif?> value="<?php echo $con['Code']; ?>" onClick="cityFetch()"><?php echo $con['Name']; ?></option>
                                    <?php endwhile ?>	
                                    </select>
                                </div>
                            </div>
                        </div>
								
						<div class="form-group">
                        	<label class="col-md-2 control-label">City<span class="required">*</span></label>
                            <div class="col-md-6">
                            	<label for="City" class="error" id="City_error"></label>
                            
                                <div class="input-group">
                                <span class="input-group-addon"><i class="icon-arrow-down"></i></span>
                                    <select name="city" id="city" onBlur="CityCheck(this.value)" onFocus="if (this.value == 'City') {this.value = '0';}" class="form-control bs-tooltip" title="City">
                                    	<?php $getlocation=mysql_fetch_array(mysql_query("select * from location where Name='".$developer['country']."'"));
                                        $getcity=mysql_query("select * from city where CountryCode='".$getlocation['Code']."' and Status='Published' order by Name");
										while($rowgetcity=mysql_fetch_array($getcity))
										{?>
											<option value="<?php echo $rowgetcity['Name'];?>" <?php if($rowgetcity['Name']==$developer['city']){ echo "selected"; };?>><?php echo $rowgetcity['Name'];?></option>
                                                                
										<?php }	?>
                                   </select>
                                </div>
                            </div>
                        </div>
						
										
							
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
																							
													<select class="btn btn-primary pull-center" style="background:#006666" name="status">
														<option <?php if($developer['status'] == 'active'): echo 'selected="selcected"'; endif; ?> value="active">Active</option>
														<option <?php if($developer['status'] == 'pending'): echo 'selected="selcected"'; endif; ?> value="pending">Pending</option>
														
													</select>
												
												<input type="submit" id="submit-visit" name="Editdeveloper" value="Update" class="btn btn-primary pull-center">								
										
																							
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
function cityFetch(){
	var id = document.getElementById("Country").value;
	var dataString = 'id='+ id;	
	$.ajax
	({
		type: "POST",
		url: "get_city.php",
		data: dataString,
		cache: false,
		success: function(html)
		{
			  $("#city").html(html);
		} 
	});
}
function UserIdCheck(userid){
	
	if (userid == ''){
			
			document.getElementById("UserId_error").className = "error";
			document.getElementById("UserId_error").innerHTML = 'This field is required.';
			return false;
	}
	else
	{
		document.getElementById("UserId_error").innerHTML = '';
		return true;		
		
	}
}
function UserIdCheck(userid){
	//var regex = /G[a-b].*/;
	if (userid == ''){
			
			document.getElementById("UserId_error").className = "error";
			document.getElementById("UserId_error").innerHTML = ' This field is required.';
			return false;
	}
	
	if(userid.length<5)
	{
			document.getElementById("UserId_error").className = "error";
			document.getElementById("UserId_error").innerHTML = 'Username at least 5 character long.';
			return false;
	}
	else if(userid!="")
	{
		var id='<?php echo $Code;?>';
		$.ajax
		({
		type: "POST",
		url: "username_check.php",
		data:{userid:userid,id:id},
		cache: false,
		success: function(msg)
		{
			

			 if(msg==1)
			 {
				document.getElementById("UserId_error").className = "error";
				document.getElementById("UserId_error").innerHTML = ' Username already in use.';
				document.getElementById("username_err").value=1;
				return false;
			}
			else
			{
				
				document.getElementById("UserId_error").innerHTML = '';
				document.getElementById("username_err").value=0;
				return true;
				
			}	
		} 
});
		if(document.getElementById("username_err").value==0)
		{

			
			return true;
		}
		else
		{
			
			return false;

		}
	}
	else
	{
		document.getElementById("UserId_error").innerHTML = '';
		return true;		
		
	}
}
function PasswordCheck(Password){
	
	if(Password.length<6 && Password!='')
	{
			document.getElementById("Password_error").className = "error";
			document.getElementById("Password_error").innerHTML = 'Password must be al least 6 character.';
			return false;
	}
	else if(Password.search(/[a-zA-Z]/) == -1 && Password!='')
	{
			document.getElementById("Password_error").className = "error";
			document.getElementById("Password_error").innerHTML = 'Password must contain letters.';
			return false;
	}
	else if(Password.search(/\d/) == -1 && Password!='')
	{
			document.getElementById("Password_error").className = "error";
			document.getElementById("Password_error").innerHTML = 'Password must contain numbers.';
			return false;
	}
	else
	{
		document.getElementById("Password_error").innerHTML = '';
		return true;		
		
	}
}
function ConfirmCheck(Confirm){
	
	var password = document.getElementById("Password").value;
	
	
	if(password!=Confirm)
	{

			document.getElementById("Confirm_error").className = "error";
			document.getElementById("Confirm_error").innerHTML = 'Confirm password not match with password.';
			return false;
	}
	else
	{
		document.getElementById("Confirm_error").innerHTML = '';
		return true;		
		
	}
}
function UserEmailCheck(email){
	
	if (email == ''){
			
			document.getElementById("UserEmail_error").className = "error";
			document.getElementById("UserEmail_error").innerHTML = ' This field is required.';
			return false;
	}
	
	var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	if(!regex.test(email)){

		document.getElementById("UserEmail_error").innerHTML = 'Please Enter Valid Email id.';
		return false;		
	}
	else if(email!="")
	{
		var id='<?php echo $Code;?>';
		var work='Work';
		$.ajax
		({
		type: "POST",
		url: "developer_email_check.php",
		data:{email:email,work:work,id:id},
		cache: false,
		dataType:'html',
		success: function(data)
		{
			 if(data==1)
			 {
				document.getElementById("UserEmail_error").className = "error";
			document.getElementById("UserEmail_error").innerHTML = 'Email-Id Already Exist.';
				document.getElementById("email_err").value=1;
				return false;
			}
			else
			{
				document.getElementById("UserEmail_error").innerHTML = '';
				document.getElementById("email_err").value=0;
				return true;
				
			}	
		} 
});
		if(document.getElementById("email_err").value==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	else
	{
		
		document.getElementById("UserEmail_error").innerHTML = '';
		return false;		
		
	}
}
function FNameCheck(fname){
	var regex=/^[A-Za-z]+$/;
	if (fname == ''){
			
			document.getElementById("FName_error").className = "error";
			document.getElementById("FName_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(!regex.test(fname))
	{
			document.getElementById("FName_error").className = "error";
			document.getElementById("FName_error").innerHTML = 'Please enter only letters.';
			return false;
	}
	else
	{
		document.getElementById("FName_error").innerHTML = '';
		return true;		
		
	}
}
function LNameCheck(lname){
	var regex=/^[A-Za-z]+$/;
	if (lname == ''){
			
			document.getElementById("LName_error").className = "error";
			document.getElementById("LName_error").innerHTML = ' This field is required.';
			return false;
	}
	else if(!regex.test(lname))
	{
			document.getElementById("LName_error").className = "error";
			document.getElementById("LName_error").innerHTML = 'Please enter only letters.';
			return false;
	}
	else
	{
		document.getElementById("LName_error").innerHTML = '';
		return true;		
		
	}
}
function CountryCheck(country){
	

	if (country == '0'){
			
			document.getElementById("Country_error").className = "error";
			document.getElementById("Country_error").innerHTML = 'This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("Country_error").innerHTML = '';
		return true;		
		
	}
}

function CityCheck(city){
	
	
	if (city == '0'){
			
			document.getElementById("City_error").className = "error";
			document.getElementById("City_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById("City_error").innerHTML = '';
		return true;		
		
	}
}
function RegistationValidation(){
				
	var a = UserIdCheck(document.getElementById("UserId").value);
	var b = UserEmailCheck(document.getElementById("UserEmail").value);
	var c = FNameCheck(document.getElementById("FName").value);
	var d = LNameCheck(document.getElementById("LName").value);
	var e = CountryCheck(document.getElementById("Country").value);
	var f = CityCheck(document.getElementById("city").value);
	
	if(a && b && c && d && e && f){
		return true;
	}
	else{
		return false;	
	}
}


</script>
