<?php
session_start();
?>
<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']!='Work') {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="Login/login.php";
    </script>
<?php
  	
    exit; 
	
}
	$sel_res=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");	
	while ($user_row = mysql_fetch_array($sel_res))
	{
			 $developer_loction_name=$user_row['country'];
			//~ die;
	}
	if(isset($_GET['pro_id']) && isset($_GET['action'])=='delete')
	{
		$del_res=mysql_query("delete from user_bids where project_id='".$_GET['pro_id']."' and uid='".$_SESSION['id']."'");	
		$url="bidding.php?project_id=".$_GET['pro_id'];
		header("Location:".$url);
	}
	
?>
 
<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php include('include/script.php');  ?>
    <script type="text/javascript" src="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.js"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo WebUrl; ?>autocomplete/jquery.tokenize.css" />

</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">
   
<?php include"include/header.php"; ?>

     <!-- Static Page Titlebar -->
     <?php 
	 		if(isset($_GET['project_id']))
			{
				
				$res=mysql_query("select * FROM post_projects where project_id='".$_GET['project_id']."'");
		  		$row=mysql_fetch_array($res);
				$cnt=mysql_num_rows($res);
				//$cnt1=0;
				//if($cnt!=0)
				//{
		  			//$res1=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");
					
					$res1=mysql_query("select * from register where unique_code='".$row['uid']."'");
		  			$row1=mysql_fetch_array($res1);
				 	$cnt1=mysql_num_rows($res1);
				//}
				if(($cnt!=0) && $cnt1!=0)
				{
			//}
	 ?>
     <?php 
		$bid_res=mysql_query("select * from bid_info where uid='".$_SESSION['id']."' and Status='active'");
		$bids=mysql_fetch_array($bid_res);
		   
	 ?>
  <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px; line-height:30px;"><?php echo $row['title']; ?></h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>
                            </div>
                        </div>
                        <div id="breadcrumbs">
                            <span class="breadcrumb-title">Project ID:<?php echo $row['project_id']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->
	
    <section class="section" style="padding-top:0px; padding-bottom:30px;">
    <div class="container">
        <div class="row-fluid">
           <div class="row-fluid">
                <div class="span12">
                    <div class="inner-content" id="msg">
                         <?php
						if(isset($_SESSION['success']))
						{
							echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong></strong> ".$_SESSION['success']."
							</div>";
							unset($_SESSION['success']);
						}
						?>
                        <?php
						if(isset($_SESSION['error']))
						{
							echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong></strong> ".$_SESSION['error']."
							</div>";
							unset($_SESSION['error']);
						}
						?>
                    </div>
                </div>
            </div>
            <div class="row-fluid">
                <div class="span8">
                    <div class="inner-content">
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Project Description</span></h3>
                        <div class="excerpt">
                        
                            <p align="justify">
                                <?php echo nl2br($row['description']); ?>
                                
                            </p>
                            <p>
                            
                            <?php 
							if($row['image']!='')
							{
								echo '<a href="'.WebUrl.'Projects/'.$row['image'].'" download><i class="fa fa-download" aria-hidden="true"> </i>
'.$row['image'].'</a>';
							}
							?>
                            </p>
                            
                            <p style="pointer-events:none;">
                            Desired Location:<?php 
							$location=explode(',',$row['location']);
							
							for($a=0;$a<count($location);$a++)
							{
								if($a==0)
								{
									echo '<a href="javascript:void();">'.$location[$a].'</a>';
								}
								else
								{
									echo ',<a href="javascript:void();">'.$location[$a].'</a>';
								}
							}
							?>
                            </p>
                            
                            <p style="pointer-events:none;">
                            	Required Experience: <?php
								if($row['experience']=='1+')
								{
									echo '<a href="javascript:void();"> 1 Year and Above</a>';
								}
								elseif($row['experience']=='3+')
								{
									echo '<a href="javascript:void();"> 3 Year and Above</a>';
								}								 
                                elseif($row['experience']=='5+')
								{
									echo '<a href="javascript:void();"> 5 Year and Above</a>';
								}
								elseif($row['experience']=='10+')
								{
									echo '<a href="javascript:void();"> 10 Year and Above</a>';
								}
								elseif($row['experience']=='15+')
								{
									echo '<a href="javascript:void();"> 15 Year and Above</a>';
								}
								elseif($row['experience']=='All')
								{
									echo '<a href="javascript:void();"> Not Required</a>';
								}
                                ?>
                            </p>
                            
							<p style="pointer-events:none;">
								Skills:<?php $skill=explode(',',$row['skills']);
								//echo $row['skills']; 
									for($i=0;$i<count($skill);$i++)
									{
										if($i==0)
										{
								 		?> 
                                 		<a href="javascript:void();"><?php echo $skill[$i]; ?></a>
                              			<?php }
							  			else
							  			{
								  		?>
                                  		,<a href="javascript:void();"><?php echo $skill[$i]; ?></a>
								  		<?php 
										}
									}
								 ?>
							</p>
							<h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span> Question & Answers</span></h3>
							 <div class="panel-group" id="accordion">
                        <?php
                        $i=1;
                        $select_faq=mysql_query("SELECT * FROM `faqs` where ProjectId='".$_GET['project_id']."'");
                        $select_faq_num=mysql_num_rows($select_faq);
                        while($fetch_faq=mysql_fetch_array($select_faq))
                        {
                        ?>

						    <div class="panel panel-warning">
						      <div class="panel-heading" style="cursor: pointer;">
						        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
						          <a><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php echo $fetch_faq['Question'];?></a>
						        </h4>
						      </div>
						      <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
						        <div class="panel-body"><?php echo $fetch_faq['Answer'];?></div>
						        
						      </div>
						      
						    </div>


						  <?php $i++; }
						  if($select_faq_num<1)
						  {
						  	echo '<div class="alert alert-info alert-dismissible">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <strong>Sorry!</strong> There Are No Question-Answers Posted Of This Project.
								  </div>';
						  }
						  ?>
						  </div>
	<?php
	$bidder_bid = mysql_query("select * from register where unique_code ='".$_SESSION['id']."'");
	while ($bidder_row_bid = mysql_fetch_array($bidder_bid)) {
		$bidder_row_bid = $bidder_row_bid['Experience'];
		$name = "$bidder_row_bid";

	}
	$datetime1 = new DateTime($name);
	$datetime2 = new DateTime();
	$interval = $datetime1->diff($datetime2);
	$bid_above_experience = $interval->format('%Y');
	//echo "bid_above_experience $bid_above_experience"."<br>";
	//$post_projects = mysql_fetch_array(mysql_query("select * from post_projects"));
	//$post_projects1 = $post_projects["experience"];
	//echo "$post_projects1"."<br>";
	//$aman = $bid_above_experience-$post_projects1;
	//echo " aman $aman";
	//~ echo "bid_above_experience $bid_above_experience"."<br>";
	$post_projects = intval($row['experience']);
	//~ echo "experience $post_projects";
	//~ echo "<br>";
	//~ $total = $bid_above_experience - $post_projects;
	//~ echo "difrence $total";
	  ?>

                    <?php 
						
						$bidder_res=mysql_query("select * from user_bids where project_id='".$_GET['project_id']."' and uid='".$_SESSION['id']."'");
						$bid_cnt=mysql_num_rows($bidder_res);
						$bider_r=mysql_fetch_array($bidder_res);
						if($bid_cnt==0)
						{
							if($_SESSION['user']=="Work"){
								if($row['status']=='pending'){
					 ?>
                     
                    <p>
                      <div class="container"> 
						 <div class="row">
                 	<?php 
					//if(/* */)
                 	
					if($row['bid_end_date'] >= date('Y-m-d'))
					{
						if($row['isSuspend']=='No' && !isset($_SESSION['activate']))
						{
								$disable="";
								if($row['location_type']==2)
								{ 
									$disable="disabled";
									$location_result=explode(",",$row['location']);
									$dev_location_name = explode(",",$developer_loction_name);
									for($k=0;$k<count($dev_location_name);$k++)
									{
										
										if(in_array($dev_location_name[$k],$location_result))
										{
											$disable="";
											break;
										}
									}
									if ($bid_above_experience >= $post_projects) {
										//~ echo "$bid_above_experience"."<br>";
										//~ echo "$post_projects"."<br>";
									?>
									<button onClick="checkBid();" id="bid" <?php echo $disable; ?> class="button default-button button_default btn btn-primary btn-lg" data-toggle="modal">
									 Bid Now
									</button>
								   <?php
								}
								else
								{
								?>
								
								<button id="onetwo" <?php echo $disable; ?> class="button default-button button_default btn btn-primary btn-lg" data-toggle="modal">
									 Bid Now
									</button>
							<script type="text/javascript">
							$(document).ready(function(){
							$('#bidone').hide();
							$('#onetwo').click(function(){
							$('#bidone').show()
							})
							})

							</script>	
													
						<p id="bidone" hidden class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>Your Experience is not match You can't Bid This Project.</p>
				<?php
								}
							}
							    else
								{
									?>
									<button onClick="checkBid();" id="bid" <?php echo $disable; ?> class="button default-button button_default btn btn-primary btn-lg" data-toggle="modal">
									 Bid Now
									</button>
								   <?php
								} 
						}
					    else
						{

								echo"<div class='alert alert-info fade in'>
								<strong>Info! </strong>You can't Bid This Project. </div>";
						}
				    }
						else
						{
							echo"<div class='alert alert-info fade in'>
							<strong>Info! </strong>Project Bid Closed</div>";
						}
					?>
			     </div>

			   </div>  
            </p>
            <?php 
						}
					}
				}
			?>
                            <!--============= popup Start=============-->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                                                <h4 class="modal-title" id="myModalLabel">Bid Now</h4>
                                            </div>
                                
                                
                                            <div class="modal-body test">
                                            <form method="post" action="bid_action.php" onSubmit="return bidValidation(this);">
                                            <input name="project_id" id="project_id" type="hidden" value="<?php echo $_GET['project_id']; ?>">
                                
                                
                                            <input name="cost" id="cost" type="text"  onBlur="costCheck(this.value)"  class="username" <?php if($row['type_of_project']=='fixed'){ ?> value="<?php echo $bider_r['cost']; ?>" placeholder="Enter Cost in <?php echo $row['currency'];?>" <?php }else{?> placeholder="Enter Cost in <?php echo $row['currency'];?> for one hour" <?php }?> value="<?php if(isset($bider_r['cost'])){ echo $bider_r['cost'] / $bider_r['duration']; }?>"/>
                                            
                                            <div style="color:RED;" id="cost_error" class="error"></div><br>
                                            
                                            <input name="duration" id="duration" type="text"  onBlur="durationCheck(this.value)" value="<?php echo $bider_r['duration']; ?>" class="username" <?php if($row['type_of_project']=='fixed'){ ?> placeholder="Enter No. of Days" <?php }else{?> placeholder="Enter No. of hours" <?php }?>/>
                                            
                                            <div style="color:RED;" id="duration_error" class="error"></div><br>
                                
                                            <textarea style="width:100%;" name="bid_message" id="bid_message" type="text"  onBlur="blankCheck(this.value,this.id)" placeholder="Biding Message"><?php echo $bider_r['bid_message']; ?></textarea>
                                
                                            <div style="color:RED;" id="bid_message_error" class="error"></div><br>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal" onClick="window.location.reload();">Close</button>
                                            
                                            <input type="submit" name="save_bid" value="Submit">
                                            </div>
                                            </form>  
                                        </div> 
                                    </div>
                                </div>
                            </div>
                            	
                            <!--=========== End Popup ===========-->
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="inner-content">
                      <br /><br /><br />
                        <div class="project-info">
                            <div class="clearfix">
								<?php $sql_plan=mysql_query("select * from bid_info as b,admin_membership_plan as p where b.PlanId=p.code and b.uid='$_SESSION[id]' and b.Status='active'");
								
								$row_plan=mysql_fetch_array($sql_plan);
								?>
                                <h4 class="share-label"><?php echo $row1['first_name']." ".$row1['last_name'] ?></h4><br />
								<?php echo $row1['country']; ?>,<?php echo $row1['city']; ?><br>
                                <strong><?php echo $row['currency'].' '.$row['budget'];?></strong>
                                <br /><br />
                               
                                 <span style="width:100%;color:#093;">Your Available Bids: <?php if($bids['Bid']>0){echo $bids['Bid']." / ".$row_plan['bids']; }else{ echo '0';}?></span><br /><br />
                                
                                <!--====== Client Rating and Review ======-->
                                <?php
								$rate_client=mysql_fetch_array(mysql_query("select avg(Developer_Punctuality + Developer_Proffesionalism + Developer_rehire) as developer_rate from rating where client_id='$row1[unique_code]'"));
								
								$rate=($rate_client['developer_rate']/15)*100;
								
								?>
								 <div class="star-rating">
                                    <span style="width:<?php echo $rate;?>%"><strong class="rating">5.00</strong> out of 5</span>
                                </div>
                                <?php
									$review_client=mysql_num_rows(mysql_query("select * from rating where client_id='$row1[unique_code]'"));
								?>
								<?php echo $review_client.' Reviews';?>
                                <!--====== End Rating and Review ======-->
                                
                                <br>
								<img src="images/message-icon.png" width="18" height="8"> 
                                <a href="<?php echo WebUrl;?>Developer/DeveloperMessage.php?project_id=<?php echo $_GET['project_id'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif; color:#f1c40f; font-size:16px;"> Message Now</font></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
	<?php 
	}
	else
	{
	?>
    <div class="container">
        <div class="row-fluid">
            <div class="span8">
                <div class="inner-content">
                    <div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong></strong>No posted project available. 
                    </div> 
                </div>
            </div>
        </div>
    </div>
    <?php
	}
	}
	
	?>
	
      
    <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <div class="row-fluid">
            <h3 align="center" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>Bidding Details</span></h3>		
			<!-- 1st Bidder Block -->
			<?php
					
				$bidder_res=mysql_query("select * from user_bids where project_id='".$_GET['project_id']."' and uid='".$_SESSION['id']."'");
				
				$bidder_row=mysql_fetch_array($bidder_res);
				
				if(mysql_affected_rows())
				{
					//while($bidder_row=mysql_fetch_array($bidder_res))
					//{
						$bidder=mysql_query("select * from register where unique_code='".$bidder_row['uid']."'");
						while($bid=mysql_fetch_array($bidder))
						{
							$profile=$bid['profile_picture'];
							if($profile=="")
							{
								$profile="no_image.jpg";	
							}		
				 			?>
						<div class="span6">
							<ul class="product_list_widget">
								<li>
									<a href="<?php WebUrl;?>Developer/profile.php?user=<?php echo $bid['unique_code'];?>" title="<?php echo $bid['first_name']; ?> <?php echo $bid['last_name']; ?>">
                                    
									<img width="120" height="120" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $profile; ?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                                    
									<?php echo $bid['first_name']; ?> <?php echo $bid['last_name']; ?>
									</a>
									<span><?php echo $bid['country']; ?>, <?php echo $bid['city']; ?></span><br />
                                    <p align="justify">
									<?php echo nl2br($bidder_row['bid_message']); ?>
                                    </p>
								</li>
							</ul>
                            <!--======== Milestone Paid Statusbar ========-->
                        <?php
						$sql_developer_milestone_payment=mysql_query("select SUM(milestone) as milestone from milestone_payment where project_id='$_GET[project_id]' and developer_id='$_SESSION[id]'");
						
						$developer_milestone_payment = mysql_fetch_array($sql_developer_milestone_payment);
												
						$admin_commision_payment=mysql_fetch_array(mysql_query("select developer_percentage from admin_commision_percentage"));
						
						$admincommision=0;
						if($developer_milestone_payment['milestone'] != '')
						{
							$admincommision = $bidder_row['cost'] * ($admin_commision_payment['developer_percentage'] / 100);
						}
						$milestonepayment = ceil($admincommision) + $developer_milestone_payment['milestone'];
						
						//$milestonepayment = $bidder_row['cost'] - ceil($admincommision);
						
						$per = 100 * (int)$milestonepayment / (int)$bidder_row['cost'];
						$milestone=mysql_num_rows(mysql_query("select * from milestone where project_id='".$_GET['project_id']."'"));
						
						if($milestone>0){
						?>
                    	<div class="progress" title="Milestone Paid <?php echo number_format($per,0);?>%">
  							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $per;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per;?>%; background:#F1C40F" >Milestone Paid <?php echo number_format($per,0);?>%</div>
                        </div>
                        <?php
						}
						?>
						<?php
						$select_award_date=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$_GET['project_id']."'"));
						$select_bids_day=mysql_fetch_array(mysql_query("select * from user_bids where project_id='".$_GET['project_id']."' and status='awarded'"));
						$get_date_project_end = date('Y-m-d', strtotime('+'.$select_bids_day['duration'].' days', strtotime($select_award_date['award_date'])));
						$start = strtotime($select_award_date['award_date']);
						
						$end = strtotime('$get_date_project_end');

						$start = strtotime($get_date_project_end);

						$end = strtotime(date('Y-m-d'));

						$days_between = ceil(abs($end - $start) / 86400);

						$current = strtotime(date('Y-m-d'));

						$completed = (($current - $start) / ($end - $start)) * 100;
						
						?>
                        <div class="progress" title="Days Left <?php echo number_format($completed,0);?>%">
  							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $completed;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $completed;?>%; background:#F1C40F" >Days Left <?php echo $days_between;?></div>
                        </div>
                        <!--======== End Milestone Paid Statusbar ========-->
						</div>
						
                        
                        <!--========= Developer Rating ===========-->
						<div class="span3">
							<?php
                                $rate_developer=mysql_fetch_array(mysql_query("select avg(Client_Punctuality + Client_Proffesionalism + Client_Rehire) as client_rate from rating where developer_id='$bid[unique_code]'"));
                                    
                                $rate_dev=($rate_developer['client_rate']/15)*100;
                                
                            ?>
							<div class="star-rating">
								  <span style="width:<?php echo $rate_dev;?>%"><strong class="rating">5.00</strong> out of 5</span>
							</div>
							
                            <p>
                            <?php
								$review_dev=mysql_num_rows(mysql_query("select * from rating where developer_id='$bid[unique_code]'"));
								
								echo $review_dev.' Reviews';
							?>
                            </p>
						</div>
                        <!--======== End Develoepr Rating ========-->
                        
						<div class="span3">
							<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif; color:#000000"> <?php if($row['type_of_project']=='fixed'){ echo $row['currency']. " ".$bidder_row['cost'];} else { echo $bidder_row['cost'] / $bidder_row['duration']. " ".$row['currency'];}?></font><br />
                            
							<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">in <?php echo $bidder_row['duration']; ?><?php if($row['type_of_project']=='fixed'){ echo " Days";} else{ echo " Hours";}?></font><br />
                            
							
							
							<?php
							if($bid_cnt!=0)
							{
								$status_check=mysql_fetch_array(mysql_query("select * from user_bids where (status='award' or status='awarded') and project_id='".$bidder_row['project_id']."'"));
								
							?>
                            
							<div id="action" <?php if($status_check['status']=='award' or $status_check['status']=='awarded'){ ?> style="pointer-events:none;" <?php }?>>
                            
							<a href="" class="" data-toggle="modal" data-target="#myModal"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Edit Bid</font></a><br>
	
							<a href="bidding.php?pro_id=<?php echo $_GET['project_id']; ?>&action='delete'" onClick="return confirm('are you sure you want to delete??');"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Remove Bid</font></a>
							</div>
						<?php } ?>	
						</div>
						
				<!-- 1st Bidder Block End -->
				
				  <div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
						<span></span>
				  </div>
				<?php 
						}
					//}
				}
				else
				{ 
					echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
					<strong></strong> No Bidders have applied yet
					</div>";
				}
				?>
        </div>
    </div>
    </section>
    
    <!--===================Create Milestore Code Start ===================-->
	<?php
	if($row['status']!='pending')
    {
		if($row['developer_id']==$_SESSION['id'])
		{
		?>
		<section class="section" style="padding-top:0; padding-bottom:40px;">
			<div class="container">
				<h3 align="center" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>Milestone Details</span></h3>
				<div class="row-fluid">
					<div class="milestone_detail">
        				<div class="span12">

        					<form method="post" enctype="multipart/form-data" action="">
        
        					<?php
        
    						$sql_milestone=mysql_query("select * from milestone where project_id='$_GET[project_id]' order by id desc");
							
    						$row_milestone=mysql_fetch_array($sql_milestone);
    
    						$milestone_count=mysql_num_rows($sql_milestone);
    						
							//fetch total milestone created
							$total_milestone=mysql_fetch_array(mysql_query("select SUM(create_payment) as create_payment from milestone where project_id='$_GET[project_id]'"));
    
							//Remain Payment
							$remain_payment = $bidder_row['cost'] - $total_milestone['create_payment'];
							//if($row_milestone['status']=='create')
							//{
							?>
									<input name="milestone_cost" id="milestone_cost" type="text"  onBlur="milestonecostCheck(this.value)" value="" class="username" placeholder="Milestone in <?php echo $row['currency'];?>" style="width:100%"/>					
									<div style="color:RED;" id="milestone_cost_error" class="error"></div><br>
					
									<textarea name="milestone_description" id="milestone_description" onBlur="milestoneblankCheck(this.value,this.id);" placeholder="Details" rows="5" cols="3" style="resize:none; width:100%"></textarea>
									<div style="color:RED;" id="milestone_description_error" class="error"></div>
									
                                    <!--<button style="margin-top:10px" class="btn btn-warning btn-lg" id="create">Create  <i class="fa fa-spinner fa-pulse" id="load_data"></i></button>-->
									<input type="button" class="button default-button button_default btn btn-primary btn-lg" id="create" name="submit" value="Create">
									<img src="images/loader.gif" style="visibility:hidden" id="load_data">
									<?php
							//}
        
       						?> 
        
							</form>
						</div>
					</div>

    				<?php 
					$sql_mlstn=mysql_query("select * from milestone where project_id='$_GET[project_id]' order by id asc");
	
					if(mysql_affected_rows()){
					?>
    
                    <div class="span12">
                    <?php
                    if(isset($_SESSION['s']))
                    {
                        echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong></strong> ".$_SESSION['s']."
                        </div>";
                        unset($_SESSION['s']);
                    }
                    ?>
                    <?php
                    if(isset($_SESSION['e']))
                    {
                        echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong></strong> ".$_SESSION['e']."
                        </div>";
                        unset($_SESSION['e']);
                    }
                    ?>
                    <?php if($remain_payment == 0 && ($row_milestone['status']=='create' or $row_milestone['status']=='release')){?>
                    
                     <div class="complete_msg"><h4>Milestone Creation Completed</h4></div>
                     <script>
                        $(".milestone_detail").hide();
                     </script>
                    
                    <?php }?>
                    <div class="table-responsive ">
                    <table class="table table-hover">
                        <thead>
                            <tr bgcolor="#dff0d8">
                                <th>No</th>
                                <th>Created Milestone</th>
                                <th>Message</th>
                                <th>Created Date</th>
                                <th>Released Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                    	<tbody>
                        <?php
                    
                        $no=1;
                        while($mlstn=mysql_fetch_array($sql_mlstn))
                        {
                        	$create_date=new DateTime($mlstn['create_date']); 
            				$release_date=new DateTime($mlstn['release_date']); 
                            echo '<tr>';
                            echo '<td>'.$no.'</td>';
                            echo '<td>'.$row['currency']." ".$mlstn['create_payment'].'</td>';
                            echo '<td>'.$mlstn['milestone_message'].'</td>';
                            echo '<td>'.$create_date->format('m/d/Y').'</td>';
                            if($mlstn['release_date']=='0000-00-00')
                            {
                                echo '<td></td>';
                            }
                            else{
                                echo '<td>'.$release_date->format('m/d/Y').'</td>';
                            }
							if($mlstn['status']=='release')
							{
                           		echo '<td>Released</td>';
							}
							else
							{
								echo '<td>Created</td>';
							}
                            echo '</tr>';
                            $no++;
                            
                        }
                    ?>
                            <tr bgcolor="#dff0d8">
                                <th>Remaining Milestone</th>
                                <th colspan="5">
                                    <?php
                                        
                                        //echo $row_milestone['remain_payment']." ".$row['currency'];
                                        echo $row['currency'].' '.$remain_payment;
                                    ?>
                                </th>
                            </tr>
                    	</tbody>
                    </table>
                    </div>
                    </div>
        
					<?php 
					}
					else
					{ 
						echo"<div class='span12'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
                        <strong>Alert!</strong> You have not created any milestone yet !
                        </div></div>";
					}
					?>
        
				</div>
                <div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
						<span></span>
				  </div>
    		</div>
    	</section>  
		<?php 
		}
	}
	
	?>  
	<!--=================== End Milestone Code ==================-->
    
	<!--=================== Skill match Code ====================-->
	<?php
    	$user=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
		$skills_dev=explode(',',strtolower($user['skills']));
		$skills_pro=explode(',',strtolower($row['skills']));
		$skills=array_intersect($skills_dev,$skills_pro);
		
		$a=count($skills);
	?>
	<!--=================== End Skillmatch Code ==================-->

    <?php include "include/footer.php"; ?>

	<?php
		$paypal_account=mysql_fetch_array(mysql_query("select paypal_Account from register where unique_code='".$_SESSION['id']."'"));
	?>
	<!-- End footer -->
	</body>
<script>
							<!-- Popup Validation -->
function blankCheck(value,id){
	
	if (value == ''){
			
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
function costCheck(value){
	
	if (value == ''){
			
			document.getElementById("cost_error").className = "error";
			document.getElementById("cost_error").innerHTML = ' This field is required.';
			
			return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
function costCheck(value){
	var regex=/^[0-9]+$/;
	if (value == ''){
			
			document.getElementById("cost_error").className = "error";
			document.getElementById("cost_error").innerHTML = ' This field is required.';
			
			return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("cost_error").innerHTML = 'Only numbers are allowed.';
		return false;
	}
	else
	{
		document.getElementById("cost_error").innerHTML = '';
		return true;		
	}
}
function durationCheck(value){
	var regex=/^[0-9]+$/;
	if (value == ''){
			
			document.getElementById("duration_error").className = "error";
			document.getElementById("duration_error").innerHTML = ' This field is required.';
			
			return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("duration_error").innerHTML = 'Only numbers are allowed.';
		return false;
	}
	else
	{
		document.getElementById("duration_error").innerHTML = '';
		return true;		
	}
}
function bidValidation(){
	
	var a = blankCheck(document.getElementById("bid_message").value,document.getElementById("bid_message").id);
	var b = costCheck(document.getElementById("cost").value);
	var c = durationCheck(document.getElementById("duration").value);
	if(a && b && c){
		return true;	
	}
	else{
		return false;	
	}
}
						<!-- Popup validation End -->
						
						<!-- Bid Check -->
function checkBid()
{ 
/*
	if (confirm("You want to Update Skill??") == false) 
	{
		$.ajax({
			type: "POST",
			url: "bid_check.php",
			//data:"username="+username,
			cache: false,
			success: function(html)
			{
				$('#msg').html(html);
			}
		});
	
		var bid_status='<?php //echo $bids['Bid'];?>';
		if(bid_status > 0)
		{
	 		$('#myModal').modal({
        		show: 'true'
    		});
		}
	}
	else
	{
		var project_id='<?php //echo $_GET['project_id'];?>';
		window.location.href='Developer/my-profile.php?project_id='+project_id+'#skills';
	}
	
	*/
	
	var skillmatch='<?php echo $a;?>';
	
	if(skillmatch==0)
	{
		if(confirm("Project's Skills Not Match! You want to Update Skills?") == true)
		{
			var project_id='<?php echo $_GET['project_id'];?>';
			window.location.href='Developer/my-profile.php?project_id='+project_id+'#skills';
		}
	}
	else
	{
		$.ajax({
			type: "POST",
			url: "bid_check.php",
			//data:"username="+username,
			cache: false,
			success: function(html)
			{
				$('#msg').html(html);
			}
		});
	
		var bid_status='<?php echo $bids['Bid'];?>';
		if(bid_status > 0)
		{
	 		$('#myModal').modal({
        		show: 'true'
    		});
		}
	}
}
						<!-- Milestone Validation -->


	
    $("#create").click(function(e) {
       
		var ab = milestoneblankCheck(document.getElementById("milestone_description").value,document.getElementById("milestone_description").id);
		var bc = milestonecostCheck(document.getElementById("milestone_cost").value);
		
		if(ab && bc){
		
			var project_id='<?php echo $_GET['project_id'];?>';
			var client_id='<?php echo $row['uid'];?>';
			var developer_id='<?php echo $_SESSION['id'];?>';
			var cost=$("#milestone_cost").val();
			
			var total_cost='<?php echo $bider_r['cost']; ?>';
			//var remain_cost=total_cost - cost;
			
			var description=$("#milestone_description").val();
			var create='true';
			
			var paypal_id='<?php echo $paypal_account['paypal_Account'];?>';
			if(paypal_id=='')
			{
				alert("Please Add Your Paypal Account First");
			}
			else{				
			$.ajax({
				type:'POST',
				url:'action_milestone.php',
				data:{project_id:project_id,client_id:client_id,developer_id:developer_id,cost:cost,/*remain_cost:remain_cost,*/description:description,create:create},
				dataType:'html',
				success:function(data){
					location.reload();
				}
			});
			
			return true;
			}
		}
		else{
			return false;	
		}
    });

function milestonecostCheck(value){
	
	var regex=/^[0-9]+$/;
	var row_bids='<?php echo @$bider_r['cost']; ?>';
	var remain_payment='<?php echo @$remain_payment;?>';

	if (value == ''){
				
		document.getElementById("milestone_cost_error").className = "error";
		document.getElementById("milestone_cost_error").innerHTML = ' This field is required.';
		
		return false;
	}
	else if(parseInt(value)<=0)
	{
		document.getElementById("milestone_cost_error").className = "error";
		document.getElementById("milestone_cost_error").innerHTML = ' Enter Milestone Greater than 0 (Zero)';
		
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("milestone_cost_error").innerHTML = 'Only numbers are allowed.';
		return false;
	}
	
	else if(remain_payment=='')
	{
		if(parseInt(value) > parseInt(row_bids))
		{
			document.getElementById("milestone_cost_error").innerHTML = 'Enter milestone Lessthan '+row_bids;
			return false;
		}
		else
		{	
			document.getElementById("milestone_cost_error").innerHTML = '';
			return true;		
		}			
	}
	else if(remain_payment!='')
	{
		if(parseInt(value) > parseInt(remain_payment))
		{
			document.getElementById("milestone_cost_error").innerHTML = 'Enter milestone Lessthan '+remain_payment;
			return false;
		}
		else
		{
			document.getElementById("milestone_cost_error").innerHTML = '';
			return true;		
		}
	}
	else
	{
		document.getElementById("milestone_cost_error").innerHTML = '';
		return true;		
	}
}


function milestoneblankCheck(value,id){
	
	if (value == ''){
			
		document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}

<!-- End Milestone validation -->

$(document).ready(function(e) {
	$(document).ajaxStart(function() {
    	$("#create").hide();
		$("#load_data").css("visibility","visible");
	});
});
				
</script>
</html>
