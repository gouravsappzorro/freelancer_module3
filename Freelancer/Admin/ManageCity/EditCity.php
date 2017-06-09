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

function countryCheck(value)
{
	if(value=='0')
	{
		document.getElementById("country_error").innerHTML="This field is required.";
		return false;
	}
	else
	{
		document.getElementById("country_error").innerHTML="";
		return true;
	}	
}

function cityCheck(value)
{
	var regex=/^([A-Za-z ])+$/;
	if (value == ''){
			
		document.getElementById("city_error").innerHTML = 'This field is required.';
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("city_error").innerHTML = 'Enter Valid City Name.';
		return false;
	}
	else if(value != '')
	{
		var falg=1;
		var country=$("#country").val();
		$.ajax({
			type:'POST',
			url:'country_check.php',
			data:{value:value,falg:falg,country:country},
			success:function(msg)
			{
				if(msg==1)
				{
					document.getElementById("city_error").innerHTML = 'City already Exist.';
					document.getElementById("city_err").value=1;
					return false;
				}
				if(msg==0)
				{
					document.getElementById("city_error").innerHTML = '';
					document.getElementById("city_err").value=0;
					return true;
				}
			}
		});
		if(document.getElementById("city_err").value ==0 )
		{
			return true;
		}
		else{
			return false;
		}
	}
	else
	{
		document.getElementById("city_error").innerHTML = '';
		return true;		
	}
}

function CityFormValidation()
{
	var a = countryCheck(document.getElementById("country").value);
	var b = cityCheck(document.getElementById("City").value);
	
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
								<h4><i class="icon-reorder"></i> EDIT CITY</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
							<?php $Code = $_GET['AJCOde59'];
                            $Edit = mysql_fetch_array(mysql_query("SELECT * FROM city WHERE ID = '$Code'"));
									
							if(isset($_POST['Update']))
							{
								$country = $_POST['country'];
								$city =	$_POST['City'];
								$Status = $_POST["Status"];
																
								$Update     =	"UPDATE city SET
									Name	=	'".$city."',
									CountryCode	=	'".$country."',
									Status	=	'".$Status."' 
									WHERE Id	= 	'".$Code."'";
												
								$UPData           = mysql_query($Update); 
										
								if($UPData)
								{
								
									echo '<div align="center"><br/>Wait Some Moment<br /><img src="../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
									echo  '<div class="alert alert-success fade in">
														<i class="icon-remove close" data-dismiss="alert"></i>
														<strong>City Update Successfully!</strong>.
										   </div>';
									echo '<meta http-equiv="refresh" content="2; url=./index.php" />';	
							
								}	
								else
								{
									echo '<div class="alert alert-danger fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Error! Please Try Again...</strong> .
										</div>';
								
								}
							}
							?>	
												
							<form name="individual_signup" class="form-horizontal row-border"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return CityFormValidation(this);" method="post"  enctype="multipart/form-data">
                                    
                                <div class="form-group">
                                    <label class="col-md-2 control-label">Country<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <label for="country" class="error" id="country_error"></label>
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            
                                            <select name="country" class="form-control bs-tooltip" id="country" title="Country" onFocus="if (this.value == 'Country') {this.value = '';}" onBlur="countryCheck(this.value)">
                                            	
                                                <?php
													$sql_location=mysql_query("select * from location where Status='Published' order by Name");
													while($row_location=mysql_fetch_array($sql_location))
													{
													?>
														<option value="<?php echo $row_location['Code'];?>" <?php if($Edit['CountryCode']==$row_location['Code']){ echo 'selected';};?>><?php echo $row_location['Name'];?></option>
                                                    <?php
													}
												?>
                                            </select>
                                            
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label class="col-md-2 control-label">City Name<span class="required">*</span></label>
                                    <div class="col-md-9">
                                        <label for="City" class="error" id="city_error"></label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="icon-cog"></i></span>
                                            <input type="text" name="City" id="City" value="<?php echo $Edit['Name'];?>" title="City Name" onFocus="if (this.value == 'City Name') {this.value = '';}" onBlur="cityCheck(this.value)" class="form-control bs-tooltip" >
                                            <input type="hidden" name="city_err" id="city_err" value="">
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="table-footer">
                                        <div class="col-md-12" >
                                            <div class="table-actions">
                                                <select class="btn btn-primary pull-center" style="background:#006666" name="Status">
                                                    <option value="Published" <?php if($Edit['Status']=='Published'){ echo 'selected';}?>>@Published</option>
                                                    <option value="Pending" <?php if($Edit['Status']=='Pending'){ echo 'selected';}?>>@Pending</option>
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
