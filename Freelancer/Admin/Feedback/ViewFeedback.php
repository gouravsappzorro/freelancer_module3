<?php //include "../../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<title>Admin Panel - View Feedback</title>

	<?php include "../MyInclude/HomeScript.php"; ?>

<script language="javascript" type="text/javascript">
function openwindow(path)
{
artclasses = window.open (  path, "artclasses", " location = 1, resizable = yes, status = 1, scrollbars = 1, width = 500, height=300 ");
artclasses.moveTo (200,100);
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
				
				<?php include "../MyInclude/HomeSubHeader.php"; ?>
				
				<div class="row "> <!-- .row-bg -->
					<br /><br /><br />
				</div> <!-- /.row -->
				<?php
					$feedback=mysql_fetch_array(mysql_query("select * from feedback where id='$_GET[view]'"));
					
				?>
                
                
				<div class="row">
                    <div class="col-md-12">
                    	<div class="widget box table-responsive">
							<div class="widget-header">
						
								<h4><i class="icon-reorder"></i> View Feedback</h4>
								<div class="toolbar no-padding">
									<div class="btn-group">
										<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
									</div>
								</div>
							</div>
							<div class="widget-content no-padding">
								
								<table class="table table-bordered table-responsive table-hover">
                                	<tr>
                                       <th>First Name</th>
                                       <td><?php echo $feedback['first_name'];?></td>
                                    </tr>
                                    
                                    <tr>
                                       <th>Last Name</th>
                                       <td><?php echo $feedback['last_name'];?></td>
                                    </tr>
                                        
                                    <tr>
                                        <th>Email</th>
                                        <td><?php echo $feedback['email']; ?></td>
                                    </tr>
                                    <?php
									if($feedback['image']!='')
									{
										?>
                                    <tr>
                                        <th>Image</th>
                                        <td><a class="bs-tooltip" title="Click for View large image" href="javascript:openwindow('<?php echo WebUrl;?>images/feedback/<?php echo $feedback['image'];?>')"><img src="<?php echo WebUrl;?>images/feedback/<?php echo $feedback['image'];?>" alt="<?php echo $feedback['image'];?>" width="50px;"></td></td>
                                    </tr>
                                    <?php
                                    }
                                    ?>
                                    <tr>
                                        <th>Message</th>
                                        <td><?php echo nl2br($feedback['feedback']);?></td>
                                    </tr> 
                                    <tr>
                                        
                                        <td colspan="2"><a href="Replay.php?TestCode=<?php echo $feedback['id']; ?>"><input type="button" name="Submit" value="Replay" class="btn btn-sm btn-warning"></a></td>
                                    </tr>
                                    
								</table>
								
							</div> <!-- /.widget-content -->
                            
						</div> <!-- /.widget -->
					</div> <!-- /.col-md-6 -->
					<!-- /Static Table -->
                    
                    
				</div>
			</div>
		</div>
	</div>
</body>
</html>
