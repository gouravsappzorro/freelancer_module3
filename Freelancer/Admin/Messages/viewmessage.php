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
	<title>Admin Panel - Message Management</title>
	<?php include "../MyInclude/HomeScript.php"; ?>
<script type="text/javascript">
checked=false;
function checkedAll (frm1) {var aa= document.getElementById('frm1'); if (checked == false)
{
checked = true
}
else
{
checked = false
}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
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
				
	
				<div class="row">
				
					<!--=== Static Table ===-->
					<div class="col-md-12">
				<?php 	
					   if(isset($_POST['Delete']))
						{
						  if(isset($_POST['Code'])) { $checkbox   =   $_POST['Code']; } else { $checkbox  = '';} 
						   if($checkbox   == "")
						   {
						   }
						   else
						   {
						   $count      =   count($checkbox);
						   for($i=0; $i<$count; $i++)
						   {
							 $del_id   =  $checkbox[$i];

							 $sql      = "DELETE FROM message WHERE Id='$del_id'";
							 $result   = mysql_query($sql);
						   }
						   if($result)
						   {
							
									echo '<meta http-equiv="refresh" content="0;URL=viewmessage.php?view='.$_GET['view'].'">';
									echo	'<div class="alert alert-success fade in">
											<i class="icon-remove close" data-dismiss="alert"></i>
											<strong>Message Deleted Successfully!</strong>.
									  </div>';
							}
						}	
							
						}
						
						
						
				 ?>	
                 <form name="individual_signup" action="" method="post" id="frm1">	


				<div class="row">
						<div class="col-md-12">
							<div class="widget box">
								<div class="widget-header">
									<h4><div class="checker"><span class=""><input type="checkbox" class="uniform" name="checkall" onclick="checkedAll(frm1);"></span></div>
														
													All Messages</h4><div class="toolbar no-padding">
										<div class="btn-group">
											
											<span class="btn btn-xs widget-collapse"><i class="icon-angle-down"></i></span>
											
										</div>
									</div><div class="widget-content" style="height:400px; overflow:scroll; overflow-x: hidden;">
								
									<?php
									$message=mysql_query("select * from message where project_id='".$_GET['view']."'");
									while($row_message=mysql_fetch_array($message))
									{
										$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_message['developer_id']."'"));
										
										$client=mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_message['client_id']."'"));
									?>
                                    <div class="clear_row">
                                    	<label style="font-weight: 900;">
                                        From : 
                                        <?php
											if($row_message['Sender_Id']==$row_message['client_id'])
											{
												echo $client['first_name'].' '.$client['last_name'];
											}
											else
											{
												echo $developer['first_name'].' '.$developer['last_name'];
											}
										?>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                                        <i class="arrow icon-angle-right"></i>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        To :
                                        <?php
											if($row_message['Sender_Id']!=$row_message['client_id'])
											{
												echo $client['first_name'].' '.$client['last_name'];
											}
											else
											{
												echo $developer['first_name'].' '.$developer['last_name'];
											}
										?> 
                                        </label> 
                        				
                                        <input type="checkbox" name="Code[]" value="<?php echo $row_message['Id'];?>" style="margin: 4px 0 0 7px;">
                                        <?php
										if($row_message['Message'] != '')
										{
											echo $row_message['Message'];
										}
										else if($row_message['Files'] != '')
										{
											echo '<a href="'.WebUrl.'images/attachment/'.$row_message['Files'].'"><img src="'.WebUrl.'images/Attachment.png" alt="Attachment" width="20px" height="20px">'.$row_message['Files'].'</a>';
										}
										?>
                      				</div>
									<?php
                                    }
                                    ?>       
            
            </div><table id="tab1">


									
	
									<!-- Toolbar -->
									
									<!-- /Toolbar -->
								
								
								                
            
            
         

</table>

							
								  <span class="btn-group">
                                                                        
                                     <button type="submit" id="submit-visit" name="Delete" value="Delete" class="btn btn btn-primary btn-warning "> <b><i class="icon-trash"></i> Delete</b></button>
                                      
                                                    
                                  </span>


									<a class="more" href="javascript:void(0);"> <br></a>
								</div>
							</div>
						</div>
						
					
						
						
						
				</div></form>
                 		
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
