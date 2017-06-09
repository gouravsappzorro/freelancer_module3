<?php //include "../../MyInclude/Db_Conn.php"; ?>
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
	<title>Admin Panel - Developer Projects</title>
	<?php include "../MyInclude/HomeScript.php"; ?>
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
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
                
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
                <?php
                $user_id=$_GET['TestCode'];
                if(isset($_POST['allocatebid']))
                {
                	extract($_POST);
                	$select_bid_info=mysql_query("SELECT * FROM `bid_info` where uid='".$user_id."' and Status='active'");
                	$num_bid_info=mysql_num_rows($select_bid_info);
                	$select_uid_email=mysql_fetch_array(mysql_query("SELECT * FROM `register` where unique_code='".$user_id."' and status='active'"));
                	if($num_bid_info > 0)
                	{
                		$update_bids=mysql_query("UPDATE bid_info set Bid='".$bid."' where uid='".$user_id."'");
                	}
                	else
                	{
                		$insert_bids=mysql_query("INSERT into bid_info set Status='active',Bid='".$bid."',Email='".$select_uid_email['email']."',uid='".$user_id."'");
                	}
                }
                if(@$update_bids || @$insert_bids)
                {
                	echo '<div class="alert alert-success alert-dismissible">
							  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
							  <strong>Success!</strong> Bids Allocated Successfully.
							</div>';
                }
                $select_bid_info1=mysql_fetch_array(mysql_query("SELECT * FROM `bid_info` where uid='".$user_id."' and Status='active'"));
                ?>
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                    
                            <h4><i class="icon-reorder"></i> Allocate Number of Bids to Developer</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        		<div class="widget-content">
								<form name="individual_signup" class="form-horizontal"  action="<?php $_SERVER['PHP_SELF']; ?>" onSubmit="return RegistationValidation(this);" method="post"  enctype="multipart/form-data">
									<div class="form-group">
										<label class="col-md-2 control-label">No Of Bids<span class="required">*</span></label>
											<div class="col-md-6">
												<label for="UserId" class="error" id="UserId_error"></label>
													<div class="input-group">
														<span class="input-group-addon"><i class="icon-user"></i></span>
															<input type="number" name="bid" id="bid" value="<?php echo $select_bid_info1['Bid'];?>" title="Bids" onFocus="if (this.value == 'bid') {this.value = '';}" onBlur="UserIdCheck(this.value)" class="form-control bs-tooltip" >
		                                              <input type="hidden" name="username_err" id="username_err" value="">
													</div>
											</div>
								   </div>
                           
												
												<input type="submit" id="submit-visit" name="allocatebid" value="Update" class="btn btn-primary pull-center">								
										
																							
											</div>
										</div>
									</div> <!-- /.table-footer -->
								</div> <!-- /.row -->
                                </form>                    
                                </div>
                                <br>					
                                                            
                        </div>
                    </div> <!-- /.widget -->
                </div>
			</div>
		</div>
	</div>
</body>
</html>