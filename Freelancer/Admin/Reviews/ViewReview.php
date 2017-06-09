<?php //include "../../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - View Reviews</title>

	<?php include "../MyInclude/HomeScript.php"; ?>
	<link rel="stylesheet" href="<?php echo WebUrl;?>/css/rating-tooltip.css">
	
	<style>
		a.tooltips span::before {
		margin-top:0px;
	}
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
					$review=mysql_fetch_array(mysql_query("select * from rating where id='$_GET[view]'"));
					
					$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$review[developer_id]'"));
					
					$client=mysql_fetch_array(mysql_query("select * from register where unique_code='$review[client_id]'"));
				?>
                
                
				<div class="row">
                    <div class="col-md-6">
                    	<div class="widget box table-responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View Developer Rating</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
								<table class="table table-bordered table-responsive table-hover">
                                	<tr>
                                        <th><img src="<?php echo WebUrl;?>Profile Picture/<?php echo $developer['profile_picture'];?>" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'" height="80px" width="80px"></th>
                                        <td><?php echo $developer['first_name'].' '.$developer['last_name'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $developer['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Location</th>
                                            <td><?php echo $developer['city'].', '.$developer['country']; ?></td>
										</tr>
                                        <tr>
                                        	<th>About</th>
                                            <td align="justify"><?php echo nl2br($developer['description']);?></td>
                                        </tr> 
                                        <tr>
                                        	<th>Review</th>
                                            <td align="justify"><?php echo nl2br($review['client_message']);?></td>
                                        </tr>
                                        <tr>
                                        	<th>Rating</th>
                                        	<td>
                                            	<?php
												$client_rate  =  $review['Client_Punctuality'] + $review['Client_Proffesionalism'] + $review['Client_Rehire'];
												
												$cli_rate = ($client_rate * 5) / 15;
												for($x=1;$x<=$cli_rate;$x++)
												{
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5)
												{
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												?>
                                                <!--===== tootltip =====-->
											<a class="tooltips" href="javascript:void()">
											<i class="glyphicon glyphicon-question-sign" style="position:relative; margin-left:10px; font-size:18px; color:#febf32"></i>
											<span>
											<?php 
											
												echo "Punctuality <br>";
												for($x=1;$x<=$review['Client_Punctuality'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Proffesionalism <br>";
												for($x=1;$x<=$review['Client_Proffesionalism'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Rehire <br>";
												for($x=1;$x<=$review['Client_Rehire'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
											
											
											
											?>
                                            </span>
                                            </a>
                                            <!--===== End Tooltip =====-->
                                                
                                            </td>
                                        </tr>
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
                    
                    <div class="col-md-6">
						<div class="widget box table responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i>View Client Rating</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								<table class="table table-bordered table-responsive table-hover">
                                	<tr>
                                        <th><img src="<?php echo WebUrl;?>Profile Picture/<?php echo $client['profile_picture'];?>" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg'" height="80px" width="80px"></th>
                                        <td><?php echo $client['first_name'].' '.$client['last_name'];?></td>
                                        </tr>
                                        
                                        <tr>
                                            <th>Email</th>
                                            <td><?php echo $client['email']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Location</th>
                                            <td><?php echo $client['city'].', '.$client['country']; ?></td>
										</tr>
                                        <tr>
                                        	<th>Review</th>
                                            <td align="justify"><?php echo nl2br($review['developer_message']);?></td>
                                        </tr>
                                        <tr>
                                        	<th>Rating</th>
                                        	<td>
                                            	<?php
												$developer_rate = $review['Developer_Punctuality'] + $review['Developer_Proffesionalism'] + $review['Developer_rehire'];
												
												$dev_rate = ($developer_rate * 5) / 15;
												for($x=1;$x<=$dev_rate;$x++)
												{
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5)
												{
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												?>
                                                
                                                <!--===== tootltip =====-->
											<a class="tooltips" href="javascript:void()">
											<i class="glyphicon glyphicon-question-sign" style="position:relative; margin-left:10px; font-size:18px; color:#febf32"></i>
											<span>
											<?php 
											
												echo "Punctuality <br>";
												for($x=1;$x<=$review['Developer_Punctuality'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Proffesionalism <br>";
												for($x=1;$x<=$review['Developer_Proffesionalism'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Rehire <br>";
												for($x=1;$x<=$review['Developer_rehire'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
											
											?>
                                            </span>
                                            </a>
                                            <!--===== End Tooltip =====-->
                                            </td>
                                        </tr>
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
