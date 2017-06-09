<?php include "../../MyInclude/Db_Conn.php"; ?>
<?php include "../../MyInclude/MyConfig.php"; ?>

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





<?php if(isset($_SESSION['Email']) && isset($_SESSION['UserId']) && isset($_SESSION['UserName']))     { ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel Dashboard</title>

	<?php include "../../MyInclude/HomeScript.php"; ?>
	<?php include "../../MyInclude/MyEditor.php"; ?>
	
    <style>
        

        section {
            width: 100%;
            margin: auto;
            text-align: left;
        }
    </style>
	<script type="text/javascript" src="AddNewPageValid.js"></script>
	
		<style>
		.error{ color:#FF0000; }
		</style>
	<!-- Validation Js Ending --->
</head>

<body>

	<?php include "../../MyInclude/HomeHeader.php"; ?>

	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">

				<!-- Search Input -->
				
				<?php include "../../MyInclude/HomeSearch.php"; ?>
				
				<!--=== Navigation ===-->
				
				<?php include "../../MyInclude/HomeNavigation.php"; ?>
				
				<!-- /Navigation -->
				
			
				
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<!-- /Sidebar -->

		<div id="content">
			<div class="container">
				<!-- Breadcrumbs line -->
				
				<?php include "../../MyInclude/HomeSubheader.php"; ?>
				
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
								<h4><i class="icon-reorder"></i> EDIT SKILL</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
				<?php $Code = $_GET['AJCOde59'];
				$Edit = mysql_fetch_array(mysql_query("SELECT * FROM admin_skill WHERE CodeId = '$Code'"));
						if(isset($_POST['NewPageAdd']))
						{
						  if($_POST["CategoryName"] == "select")
							{
								echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Please select category</strong> .
									</div>';
							}
						  else if($_POST["SkillName"] == "")
							{
								echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Full Fill Requirement</strong> .
									</div>';
							}
							else
							{
							
							$SkillName        = $_POST['SkillName'];
							$Status           = $_POST['Status'];
							$type=$_POST['CategoryName'];
							$CodeId           = rand(100000, 999999);
							
							$select =mysql_query("SELECT * FROM `admin_skill` where Skill_Name='$SkillName' and CodeId!='$Code'");
							$row=mysql_fetch_array($select);
							if($row["Skill_Name"]!=$SkillName)
							{				
								$Update           =	"UPDATE admin_skill SET
								Status            =  '$Status',
								type=				'$type',
								Skill_Name        =  '$SkillName'
								
						WHERE	CodeId            =  '$Code' ";	
								
								$UPData           = mysql_query($Update); 	
								if($UPData)
								{
								
									echo '<div align="center"><br/>Wait Some Moment<br /><img src="../../MyInclude/green.gif" style="height:100px; width:100px;" ></div>';
									echo  '<div class="alert alert-success fade in">
														<i class="icon-remove close" data-dismiss="alert"></i>
														<strong>Your Update Successfully!</strong>.
										   </div>';
									echo '<meta http-equiv="refresh" content="3; url=./index.php" />';	
									$_SESSION['UpdateSu'] = 'Done';
									
								}	
							
							}
							else
							{
							echo '<div class="alert alert-danger fade in">
										<i class="icon-remove close" data-dismiss="alert"></i>
										<strong>Skill Name Allready Exist.....</strong> .
									</div>';
							
							}
							}
						}	
				?>				
												
				<form name="individual_signup" class="form-horizontal row-border"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return JayCreatedValidForm(this);" method="post"  enctype="multipart/form-data">
								
									<div class="form-group">
									
										<label class="col-md-2 control-label">Select CategoryName<span class="required">*</span></label>
										<div class="col-md-9">
															<label for="Name" class="error" id="Name_error"></label>
										
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-cog"></i></span>
                                                                    <select name="CategoryName" class="form-control">
                                                                    <option value="select">Select Category</option>
                            										<?php
																	$Code1=$_GET["code"];
																	$query1=mysql_query("SELECT  * FROM admin_skill where type='$Code1'");
																	$row1=mysql_fetch_array($query1); 
																	 $query=mysql_query("SELECT  * FROM admin_skill_category");
																	while($row=mysql_fetch_array($query)){
																	?>
                                                                    <option title="CategoryName" onFocus="if (this.value == 'CategoryName') {this.value = '';}" onBlur="CategoryNameCheck(this.value)" class="form-control bs-tooltip" value="<?php echo $row['CodeId']; ?>" <?php if($row['CodeId']==$row1['type']) echo 'selected="selected"'; ?>><?php echo $row['skill_category']; ?></option>
                                                                    <?php } ?>
                                                                    </select>
																	
																	</div>
										</div>
										
									</div>

									
									<div class="form-group">
									
										<label class="col-md-2 control-label">SkillName<span class="required">*</span></label>
										<div class="col-md-9">
															<label for="Name" class="error" id="Name_error"></label>
										
																<div class="input-group">
																	<span class="input-group-addon"><i class="icon-cog"></i></span>
																		<input type="text" name="SkillName" value="<?php echo $Edit['Skill_Name']; ?>"  id="Name"  title="SkillName" onFocus="if (this.value == 'SkillName') {this.value = '';}" onBlur="SkillNameCheck(this.value)" class="form-control bs-tooltip" >
																	</div>
										</div>
										
									</div>
									
									
								<div class="row">
									<div class="table-footer">
										<div class="col-md-12" >
											<div class="table-actions">
											
												
													<select class="btn btn-primary pull-center" style="background:#006666" name="Status">
														<option value="Published">@Published</option>
														<option value="Pending">@Pending</option>
														
													</select>
												
												<input type="submit" id="submit-visit" name="NewPageAdd" value="Update" class="btn btn-primary pull-center">								
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

<?php }
	  else 
	  { ?> 
	  				 <div align="center">
								 <br /><br /><br /><br /><br />Wait Some Moment<br /><br />
								<img src="../../MyInclude/green.gif"  >
                                
					 </div>  
					<meta http-equiv="refresh" content="0; url=../LogIn.php" > 
<?php } ?>



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
