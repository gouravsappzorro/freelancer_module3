<?php include "../MyInclude/Db_Conn.php"; ?>
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
		
	<!--<script src="../plugins/datatables/jquery.dataTables.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/DT_bootstrap.js"></script>
    <link href="../plugins/datatables/dataTables.responsive.css" type="text/css" rel="stylesheet">
    <link href="../plugins/datatables/dataTables.bootstrap.css" type="text/css" rel="stylesheet">-->
    <script type="text/javascript">
	$(function() 
	{
		$("#dateRangePicker").datepicker({
			dateFormat:'yy-mm-dd',
			onSelect: function (selected) 
			{
				var dt = new Date(selected);
				dt.setDate(dt.getDate() + 1);
				$("#dateRangePicker1").datepicker("option", "minDate", dt);
			}
		});
	 
		$("#dateRangePicker1").datepicker({
			dateFormat:'yy-mm-dd',
			onSelect: function (selected) 
			{
				var dt = new Date(selected);
				dt.setDate(dt.getDate() - 1);
				$("#dateRangePicker").datepicker("option", "maxDate", dt);
			}
		});
		
		$("#rdateRangePicker").datepicker({
			dateFormat:'yy-mm-dd',
			onSelect: function (selected) 
			{
				var dt = new Date(selected);
				dt.setDate(dt.getDate() + 1);
				$("#rdateRangePicker1").datepicker("option", "minDate", dt);
			}
		});
	 
		$("#rdateRangePicker1").datepicker({
			dateFormat:'yy-mm-dd',
			onSelect: function (selected) 
			{
				var dt = new Date(selected);
				dt.setDate(dt.getDate() - 1);
				$("#rdateRangePicker").datepicker("option", "maxDate", dt);
			}
		});
	});
	</script>

</head>

<body>
	<?php
	
	if(isset($_REQUEST['search']))
	{
		$start_date=$_REQUEST['date'];
		$end_date=$_REQUEST['date1'];
		
		$date=" where create_date>='".$start_date."' and create_date<='".$end_date."'";
	}
	else
	{
		$date="";
	}
	
	if(isset($_REQUEST['rsearch']))
	{
		$start_date=$_REQUEST['rdate'];
		$end_date=$_REQUEST['rdate1'];
		
		$rdate=" where release_date>='".$start_date."' and release_date<='".$end_date."'";
	}
	else
	{
		$rdate="";
	}
	
	if(isset($_REQUEST['submit']) and $_REQUEST['status']!='all')
	{
		$status=" where status='".$_REQUEST['status']."'";
	}
	else
	{
		$status='';
	}
	?>
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
				
                <form method="get" >
					<div class="row form-group">
                        <div class="col-sm-12">
                            <label>Search By Created Date :<i class="fa fa-level-down" aria-hidden="true"></i></label>
                        </div>

                    	<div class="col-sm-3 date">
                            <div class="input-group input-append date">
                                <input type="text" class="form-control" name="date" value="<?php if(isset($_REQUEST['date'])){ echo $_REQUEST['date'];}?>" placeholder="Start Date" required id="dateRangePicker">
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                         <div class="col-sm-3 date1">
                            <div class="input-group input-append date" >
                                <input type="text" class="form-control" id="dateRangePicker1" name="date1" value="<?php if(isset($_REQUEST['date1'])){ echo $_REQUEST['date1'];}?>" placeholder="End Date" required>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary" name="search" value="Submit">
                        </div>
					</div>
				</form>
                <form method="get" >
					<div class="row form-group">
                        <div class="col-sm-12">
                            <label>Search By Released Date :<i class="fa fa-level-down" aria-hidden="true"></i></label>
                        </div>
                   		<div class="col-sm-3 date">
                            <div class="input-group input-append rdate">
                                <input type="text" class="form-control" name="rdate" value="<?php if(isset($_REQUEST['rdate'])){ echo $_REQUEST['rdate'];}?>" placeholder="Start Date" required id="rdateRangePicker">
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                         <div class="col-sm-3 date1">
                            <div class="input-group input-append rdate" >
                                <input type="text" class="form-control" id="rdateRangePicker1" name="rdate1" value="<?php if(isset($_REQUEST['rdate1'])){ echo $_REQUEST['rdate1'];}?>" placeholder="End Date" required>
                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar"></span></span>
                            </div>
                        </div>
                        <div class="col-sm-1">
                            <input type="submit" class="btn btn-primary" name="rsearch" value="Submit">
                        </div>
						</form>
                     
                     	<form method="get">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-2">
                        	<select name="status" id="status" class="form-control">
                            	<option value="all">All</option>
                            	<option value="create" <?php if(isset($_REQUEST['status']) and $_REQUEST['status']=='create'){ echo "selected";}?>>Created</option>
                                <option value="release" <?php if(isset($_REQUEST['status']) and $_REQUEST['status']=='release'){ echo "selected";}?>>Released</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                        	<input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        </div>
                    </div>
                </form>
                <br>

				<div class="widget box table-responsive">
					<div class="widget-header">
						<h4><i class="icon-reorder"></i> View All Milestones</h4>
						<div class="toolbar no-padding">
							<div class="btn-group">
								<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
							</div>
						</div>
					</div>
							
					<div class="widget-content no-padding">
                    <?php
						$query=mysql_query("SELECT  * FROM milestone $date $rdate $status ORDER BY id desc");
						$total_rows = mysql_num_rows($query);
								
						$per_page = 10;
						$num_links = 3;
						$total_rows = $total_rows; 
						$cur_page = 1; 
							
						if(isset($_GET['page']))
						{
							$cur_page = $_GET['page'];
							$cur_page = ($cur_page < 1)? 1 : $cur_page;
						}
							
						$offset = ($cur_page-1)*$per_page;
							
						$pages = ceil($total_rows/$per_page);
							
						$start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
						$end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
							
						$res = mysql_query("SELECT  * FROM milestone $date $rdate $status ORDER BY id desc LIMIT ".$per_page." OFFSET ".$offset);
						if(mysql_num_rows($res)<=0)
						{
							echo '<div class="alert alert-info"><strong>Info!</strong> Records not found</div>';
						}
						else
						{
						?>		
						
                        <table class="table table-striped table-hover table-checkable table-colvis datatable dataTable">
							<thead>
								<tr>
	                                <th>Project Name</th>
                                    <th>Client Name</th>
                                    <th>Develoepr Name</th>
                                    <th>Milestone</th>
                                    <th>Status</th>
                                    <th class="align-center">Action</th>
								</tr>
							</thead>
							<tbody>
								
							<?php $i=0;
							while ($row_milestone = mysql_fetch_array($res)) 
							{	
								$project = mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$row_milestone['project_id']."'"));
										
								$client = mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_milestone['client_id']."'"));
								$developer = mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_milestone['developer_id']."'"));
									
							?>
								<tr>
									<td><?php echo $project['title'];?></td>
                                    <td><?php echo $client['first_name'].' '.$client['last_name'];?></td>
									<td><?php echo $developer['first_name'].' '.$developer['last_name'];?></td>
                                    <td><?php echo $row_milestone['create_payment'].' '.$project['currency'];?></td>
                                    <td>
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
                                       									   
									<td class="align-center">
										<span class="btn-group">
											<a href="./view.php?AJCOde59=<?php echo $row_milestone['id']; ?>" title="View" class="btn btn-sm bs-tooltip">
												<i class="icon-pencil"></i> View
											</a>
										</span>
									</td>
								</tr>
							<?php } ?><!-- While Main Close -->					
							</tbody>
                                    
						</table>
                        <br />
                        <!--======= Pagination Navigation Start =========-->
                        <div class="row">
                          	<div class="col-md-12" align="right">
                    			<div class="page-nation" align="right" style="margin-top:15px;">
                        			<ul class="pagination pagination-large" style="margin:0px; margin-top:-40px;">
									<?php
										if(isset($_REQUEST['date']) and isset($_REQUEST['date1']))
										{
											$dt = "&date=$_REQUEST[date]&date1=$_REQUEST[date1]&search=Submit";
										}
										else if(isset($_REQUEST['rdate']) and isset($_REQUEST['rdate1']))
										{
											$dt = "&rdate=$_REQUEST[rdate]&rdate1=$_REQUEST[rdate1]&rsearch=Submit";
										}
										else if(isset($_REQUEST['status']))
										{
											$dt ="&status=$_REQUEST[status]&submit=Submit";
										}
										else
										{
											$dt="";
										}
                            	        if(isset($pages))
                                        {  
											if($pages > 1)        
											{    
												if($cur_page > 1)
												{   $dir = "First";
													echo '<li><span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1),$dt.'">'.$dir.'</a> </span></li>';
												}
											   if($cur_page > 1) 
												{
													$dir = "Prev";
													echo '<li><span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1),$dt.'">'.$dir.'</a> </span></li>';
												}                 
												
												for($x=$start ; $x<=$end ;$x++)
												{
													if($x == $cur_page)
													{
														echo '<li class="active"><a href="">'.$x.'</a></li>';
													}
													else
													{
														echo '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$x,$dt.'">'.$x.'</a></li>';
													}
													
												}
												
												if($cur_page < $pages )
												{   $dir = "Next";
													echo '<li><span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1),$dt.'">'.$dir.'</a> </span></li>';
												}
												if($cur_page < $pages)
												{   $dir = "Last";
											   
													echo '<li><a href="'.$_SERVER['PHP_SELF'].'?page='.$pages,$dt.'">'.$dir.'</a></li> '; 
												}   
											}
										}
                                    ?>
                                    </ul>
                                </div>
							</div>
						</div>
                		<!--========= End Pagination Navigation ==========-->
						<?php }?>
                                
                    </div> <!-- /.widget-content -->
				</div> <!-- /.widget -->
			</div> <!-- /.col-md-6 -->
		</div> <!-- /.row -->
		<!-- /Page Content -->
	</div>
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