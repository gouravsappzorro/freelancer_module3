<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<?php							/**================================================================================||
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


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - Manage Country</title>

	<?php include "../MyInclude/HomeScript.php"; ?>
	<?php include "../MyInclude/MyEditor.php"; ?>
	
    <style>
        section {
            width: 100%;
            margin: auto;
            text-align: left;
        }
		.error{ color:#FF0000; }
	</style>
<script type="text/javascript">
function CountryNameCheck(value){
	
	var regex=/^[a-zA-Z ]+$/;
	if (value == ''){
			
		document.getElementById("name_error").innerHTML = 'This field is required.';
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("name_error").innerHTML = 'Enter Valid Country Name.';
		return false;
	}
	else if(value.length < 2)
	{
		document.getElementById("name_error").innerHTML = 'Country name Should be greater than 2 characters Long.';
		return false;
	}
	else if(value != '')
	{
		var falg=0;
		var id = '<?php echo $_GET['AJCOde59'];?>';
		$.ajax({
			type:'POST',
			url:'country_check.php',
			data:{value:value,falg:falg,id:id},
			success:function(msg){
				if(msg==1)
				{
					document.getElementById("name_error").innerHTML = ' Country Name already Exist.';
					document.getElementById("name_err").value=1;
					return false;
				}
				if(msg==0)
				{
					document.getElementById("name_error").innerHTML = '';
					document.getElementById("name_err").value=0;
					return true;
				}
			}
		});
		if(document.getElementById("name_err").value ==0 )
		{
			return true;
		}
		else{
			return false;
		}
	}
	else
	{
		document.getElementById("name_error").innerHTML = '';
		return true;		
		
	}
}
 

function CountryCodeCheck(value)
{
	var regex=/^([A-Z])+$/;
	if (value == ''){
			
		document.getElementById("code_error").innerHTML = 'This field is required.';
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("code_error").innerHTML = 'Enter Country Code in Uppercase letter.';
		return false;
	}
	else if(value.length != 3)
	{
		document.getElementById("code_error").innerHTML = 'Country Code Must be 3 Characters Long.';
		return false;
	}
	else if(value != '')
	{
		var falg=1;
		var id = '<?php echo $_GET['AJCOde59'];?>';
		$.ajax({
			type:'POST',
			url:'country_check.php',
			data:{value:value,falg:falg,id:id},
			success:function(msg){
				if(msg==1)
				{
					document.getElementById("code_error").innerHTML = ' Country Code already Exist.';
					document.getElementById("code_err").value=1;
					return false;
				}
				if(msg==0)
				{
					document.getElementById("code_error").innerHTML = '';
					document.getElementById("code_err").value=0;
					return true;
				}
			}
		});
		if(document.getElementById("code_err").value ==0 )
		{
			return true;
		}
		else{
			return false;
		}
	}
	else
	{
		document.getElementById("code_error").innerHTML = '';
		return true;		
	}
}

function CountryFormValidation()
{
	var a = CountryNameCheck(document.getElementById("Name").value);
	var b = CountryCodeCheck(document.getElementById("Code").value);
	
	if(a && b)
	{
		return true;
	}
	else
	{
		return false;
	}
}

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
				
				<!-- /Navigation -->
				
			
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../MyInclude/HomeSubheader.php"; ?>
				
				<!-- /Breadcrumbs line -->

				<!--=== Page Header ===-->
				
				<?php //MyInclude "../MyInclude/subsubheader.php"; ?>
				
			
				<!-- /Page Header -->

				<!--=== Page Content ===-->
				<!--=== Statboxes ===-->
				<div class="row"> <!-- .row-bg -->
					<br/><br/><br/>

					

					
				</div> <!-- /.row -->
				<!-- /Statboxes -->

	

				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
						<div class="widget box">
							<div class="widget-header">
								<h4><i class="icon-reorder"></i> EDIT COUNTRY</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
							<?php $Code = $_GET['AJCOde59'];
                            $Edit = mysql_fetch_array(mysql_query("SELECT * FROM location WHERE Id = '$Code'"));
									
							if(isset($_POST['Update']))
							{
								$name = $_POST['Name'];
								$code = $_POST['Code'];
								$status = $_POST['Status'];
																
								$Update     =	"UPDATE location SET
									Name	=	'".$name."',
									Code	=	'".$code."',
									Status	=	'".$status."' 
									WHERE Id	= 	'".$Code."'";
												
								$UPData           = mysql_query($Update); 
										
								if($UPData)
								{
								
									echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
									echo  '<div class="alert alert-success fade in">
														<i class="icon-remove close" data-dismiss="alert"></i>
														<strong>Country Update Successfully!</strong>.
										   </div>';
									echo '<meta http-equiv="refresh" content="2; url=./index.php" />';	
									//$_SESSION['UpdateSu'] = 'Done';
									
								}	
								else
								{
									echo '<div class="alert alert-danger fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Error! Please Try again....</strong> .
										</div>';
								
								}
							}
							?>	
												
							<form name="individual_signup" class="form-horizontal row-border"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return CountryFormValidation(this);" method="post"  enctype="multipart/form-data">
                                    
                                <div class="form-group">
                                
                                    <label class="col-md-2 control-label">Country Name<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <label for="Name" class="error" id="name_error"></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            <input value="<?php echo $Edit['Name'];?>" type="text" name="Name" id="Name"  title="Country" onFocus="if (this.value == 'Country') {this.value = '';}" onBlur="CountryNameCheck(this.value)" class="form-control bs-tooltip" >
                                            <input type="hidden" name="name_err" id="name_err" value="">
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                
                                    <label class="col-md-2 control-label">Country Code<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <label for="Code" class="error" id="code_error"></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            <input value="<?php echo $Edit['Code'];?>" type="text" name="Code" id="Code" title="Country Code" onFocus="if (this.value == 'Country Code') {this.value = '';}" onBlur="CountryCodeCheck(this.value)" class="form-control bs-tooltip" >
                                            <input type="hidden" name="code_err" id="code_err" value="">
                                        </div>
                                    </div>
                                </div>
                                        
                                <div class="row">
                                    <div class="table-footer">
                                        <div class="col-md-12" >
                                            <div class="table-actions">
                                                <select class="btn btn-primary pull-center" style="background:#006666" name="Status">
                                                    <option value="Published" <?php if($Edit['Status']=='Published'){ echo 'selected';}?>>@Published</option>
                                                    <option value="Pending"  <?php if($Edit['Status']=='Pending'){ echo 'selected';}?>>@Pending</option>
                                                </select>
                                                            
                                                <input type="submit" id="submit-visit" name="Update" value="Submit" class="btn btn-primary pull-center">								
                                            </div>
                                        </div>
                                    </div> <!-- /.table-footer -->
                                </div> <!-- /.row -->
                            </form>	
												
												
												
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

  
  <script language="javascript" type="text/javascript">
function openwindow(path)
{
artclasses = window.open (  path, "artclasses", " location = 1, resizable = yes, status = 1, scrollbars = 1, width = 500, height=300 ");
artclasses.moveTo (200,100);
}
</script>
  
</body>
</html>



<?php							/**================================================================================||
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
