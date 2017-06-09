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
	<title>Admin Panel - Client Review</title>
	<?php include "../MyInclude/HomeScript.php"; ?>
    <link rel="stylesheet" href="<?php echo WebUrl;?>/css/rating-tooltip.css">
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
                
                <div class="col-md-12">
                    <div class="widget box">
                        <div class="widget-header">
                    
                            <h4><i class="icon-reorder"></i> Client Review</h4>
                            <div class="toolbar no-padding">
                                <div class="btn-group">
                                    <span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="widget-content">
                        <?php
						$sql_review=mysql_query("select * from rating where client_id='$_GET[TestCode]'");
						if(mysql_affected_rows())
						{
							while($row_review=mysql_fetch_array($sql_review))
							{
								$sql_developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_review[developer_id]'"));
								
								$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_review[project_id]'"));
							?>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Developer Name</label>
                                    <label class="col-md-7 control-label"><?php echo $sql_developer['first_name'].' '.$sql_developer['last_name'];?></label>
                                </div>
                                <br>
                                <div class="form-group">		
                                    <label class="col-md-3 control-label">Project Title</label>
                                    <label class="col-md-7 control-label"><?php echo $project['title'];?></label>
                                </div>	
                                <br>
                                <div class="form-group">		
                                    <label class="col-md-3 control-label">Developer Review</label>
                                    <label class="col-md-7 control-label" style="text-align:justify"><?php echo $row_review['developer_message'];?></label>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">Developer Rating</label>
                                    <label class="col-md-7 control-label">	
										<?php
												$developer_rate = $row_review['Developer_Punctuality'] + $row_review['Developer_Proffesionalism'] + $row_review['Developer_rehire'];
												
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
												for($x=1;$x<=$row_review['Developer_Punctuality'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Proffesionalism <br>";
												for($x=1;$x<=$row_review['Developer_Proffesionalism'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Rehire <br>";
												for($x=1;$x<=$row_review['Developer_rehire'];$x++) {
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
                                	</label>
                                </div>
                                <br>					
                                                            
                                <a class="more" href="javascript:void(0);"> <br></a>
                        <?php
							}
						}
						else
						{
							echo 'Reviews not available';
						}
						?>
                        </div>
                    </div> <!-- /.widget -->
                </div>
			</div>
		</div>
	</div>
</body>
</html>