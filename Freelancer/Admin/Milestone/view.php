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
	||=================================================================================**/
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel</title>
	<?php include "../MyInclude/HomeScript.php"; ?>
</head>

<body>
	<?php
		$milestone=mysql_query("select * from milestone where id='".$_GET['AJCOde59']."'");
		$row_milestone=mysql_fetch_array($milestone);
		
		$project = mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$row_milestone['project_id']."'"));
		$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_milestone['developer_id']."'"));
		
		$client=mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_milestone['client_id']."'"));
	?>

	<?php include "../MyInclude/HomeHeader.php"; ?>
	<div id="container">
		<div id="sidebar" class="sidebar-fixed">
			<div id="sidebar-content">
				<?php include "../MyInclude/HomeSearch.php"; ?>
				<?php include "../MyInclude/HomeNavigation.php"; ?>
			</div>
			<div id="divider" class="resizeable"></div>
		</div>
		<div id="content">
			<div class="container">
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
		
        		<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
				
				<div class="row">
					<div class="col-md-12">
						<div class="widget box table-responsive">
							<div class="widget-header">
                            	<h4>View Milestone Details</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
                            </div>
                            <div class="widget-content no-padding">
                                <table class="table table-bordered table-responsive table-hover">
                                    <tbody>
                                        <tr>
                                            <th>Project Name</th>
                                            <td><?php echo $project['title'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Client Name</th>
                                            <td><?php echo $client['first_name'].' '.$client['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Developer Name</th>
                                            <td><?php echo $developer['first_name'].' '.$developer['last_name'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Milestone</th>
                                            <td><?php echo $row_milestone['create_payment'].' '.$project['currency'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Message</th>
                                            <td><?php echo nl2br($row_milestone['milestone_message']);?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td style="color: #F00;">
                                                <?php
                                                    if($row_milestone['status']=='create')
                                                    {
                                                        echo 'Created';
                                                    }
                                                    else if($row_milestone['status']=='release')
                                                    {
                                                        echo 'Released';
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Created Date</th>
                                            <td><?php echo $row_milestone['create_date'];?></td>
                                        </tr>
                                        <tr>
                                            <th>Released Date</th>
                                            <td>
                                                <?php
                                                    if($row_milestone['release_date']!='0000-00-00')
                                                    {
                                                        echo $row_milestone['release_date'];
                                                    }
                                                    else
                                                    {
                                                        echo "Not Released";
                                                    }
                                                ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>	<!--/widget-content-->
						</div>	<!--/widget-box-->
					</div>	<!--/Col-md-12-->
				</div>	<!--/Row-->
            </div>	<!--/container-->
		</div>	<!--/content-->
	</div>	<!--/container-->
</body>
</html>

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
	||=================================================================================**/
?>