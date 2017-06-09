<?php include('Admin/MyInclude/MyConfig.php');?>
<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php include('include/validation.php'); ?>
	<?php include('include/script.php');  ?>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"include/header.php"; ?>

     <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Dashboard</h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>                            
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->

    <section class="section" style="padding-top:80px; padding-bottom:30px;">
	<div class="container">
		
		<div class="row-fluid">
         
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                    <?php $res=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");
							  $row=mysql_fetch_array($res);
						 ?>
                        <img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                        
                        <p><?php echo $row['first_name']." ".$row['last_name'];?><br />
                        <?php 
						$sql_bid=mysql_fetch_array(mysql_query("select * from bid_info where uid='$_SESSION[id]'"));
						$plan=mysql_fetch_array(mysql_query("select * from admin_membership_plan where code='$sql_bid[PlanId]'"));
						?>
						Membership Plan: <?php echo $plan['plan_name'];?></p>
                        
                        <p><u><a style="color:inherit" href="<?php echo WebUrl; ?>Developer/profile.php?user=<?php echo $row['username']; ?>">View My-public profile</a></u></p>
						<div class="progress-wrap">
								<p class="bar-text">
									Profile Status <strong>90%</strong>
								</p>
								<div class="progress">
									<div class="bar" style="" data-percentage-value="90" data-value="90">
									</div>
								</div>
							</div><br />
						
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>My Balance</span></h3>
                       
                         <?php
						 $sql_milestone_payment=mysql_fetch_array(mysql_query("select SUM(milestone) as ms from milestone_payment where developer_id='$_SESSION[id]'"));
						 ?>
                         
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif"><strong><?php echo "$ ".number_format($sql_milestone_payment['ms'],2);?></strong></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif">View Transaction History</font><br /><br />
						 
						 <!-- My Bids Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>My Bids</span></h3>
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif"><strong><?php if($sql_bid['Bid']>0){echo $sql_bid['Bid']." / ".$plan['bids']; }else{ echo '0';}?></strong></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif"><a href="<?php echo WebUrl;?>membership-plans.php">Change Plan</a></font><br /><br />
						
						<!-- My Projects Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Ongoing Projects</span></h3>		
						<?php
							$sql=mysql_query("select * from post_projects where status='award' order by award_date desc LIMIT 5");
							while($row_project=mysql_fetch_array($sql))
							{
                            	echo '<p><a href="'.WebUrl.'bidding.php?project_id='.$row_project['project_id'].'">'.$row_project['title'].' >></a></p><hr />';
                            
							}
						?>
					</div>
                </div>
					
				
				
				
				<!-- First Project -->
				
                <div class="span9">
					<div class="inner-content">
                     <div class="span12">
                     	<ul class="product_list_widget">
                                <li>
									<?php
																/*$sel="select status from register where unique_code='".$_SESSION['id']."'";
																$res=mysql_query($sel);
																$row=mysql_fetch_array($res);
																if($row['status']=='active')
																{
																	unset($_SESSION['activate']);
																}
																else
																{
																	$_SESSION['activate']="Congratulation! We have sent activation link yo your mail";
																}
																if(isset($_SESSION['activate']))
																{
																	echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong></strong> ".$_SESSION['activate']."
  								 										</div>";
								 									//unset($_SESSION['activate']);
																}*/
																
														?>
									<?php
																if(isset($_SESSION['success']))
																{
																	echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong></strong> ".$_SESSION['success']."
  								 										</div>";
								 									unset($_SESSION['success']);
																}
																else
																{
																	$sel="select status from register where unique_code='".$_SESSION['id']."'";
																$res=mysql_query($sel);
																$row=mysql_fetch_array($res);
																if($row['status']=='active')
																{
																	unset($_SESSION['activate']);
																}
																else
																{
																	$_SESSION['activate']="Your email is not yet verified ! Please click on the verification link in your email.";
																}
																if(isset($_SESSION['activate']))
																{
																	echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    																		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      										<strong></strong> ".$_SESSION['activate']."
  								 										</div>";
								 									//unset($_SESSION['activate']);
																}
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
								
								</li>
							</ul>
                     </div>
					  <div class="span12">
					  <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Projects Feed</span></h3>	
						 <ul class="product_list_widget">
                                <?php
								$sql_milestone=mysql_query("select * from milestone where developer_id='$_SESSION[id]' and status='release' order by release_date desc limit 5");
								while($row_milestone=mysql_fetch_array($sql_milestone))
								{
									$sql_user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_milestone[client_id]'"));
									
									$sql_project=mysql_fetch_array(mysql_query("select * from post_projects where uid='$row_milestone[client_id]' and project_id='$row_milestone[project_id]'"));
								?>
                                <li>
                                	<a href="javascript:void();" title="">
									<img style="width:40px; height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f"><?php echo $sql_user['first_name']." ".$sql_user['last_name'];?></font></a> released a milestone payment of <strong><?php echo $row_milestone['create_payment']." ".$sql_project['currency'];?></strong>  for <a href="javascript:void();"><font style="color:#f1c40f"><?php echo $sql_project['title'];?></font></a><br />
						
                        <!--Day Caluclation-->			
						<?php
						
						$date1 = new DateTime($row_milestone['release_date']);
						$date2 = new DateTime("now");
						$interval = $date1->diff($date2);
						$years = $interval->format('%y');
						$months = $interval->format('%m');
						$days = $interval->format('%d');
						if($years!=0){
							$ago = $years.' year(s) ago';
						}else{
							$ago = ($months == 0 ? $days.' day(s) ago' : $months.' month(s) ago');
						}
						if($ago==0)
						{
							$ago='Today';
						}
						echo $ago; 
						
						?>
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								<?php
								}
								?>
                                
                                <?php
									$sql_create_milestone=mysql_query("select * from milestone where client_id='$_SESSION[id]' and status='create' order by create_date desc LIMIT 5");
									while($row_create_milestone=mysql_fetch_array($sql_create_milestone))
									{
										$sql_create_user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_create_milestone[developer_id]'"));
										
										$sql_project_milestone=mysql_fetch_array(mysql_query("select * from post_projects where uid='$row_create_milestone[client_id]' and project_id='$row_create_milestone[project_id]'"));
								?>
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f"><?php echo $sql_create_user['first_name'].' '.$sql_create_user['last_name'];?></font></a> created a milestone payment of <strong><?php echo $row_create_milestone['create_payment'].' '.$sql_project_milestone['currency'];?> </strong> for <a href="javascript:void(0);"><font style="color:#f1c40f"><?php echo $sql_project_milestone['title'];?></font></a><br />
						
                        <!--Day Caluclation-->			
						<?php
						
						$date1 = new DateTime($row_create_milestone['create_date']);
						$date2 = new DateTime("now");
						$interval = $date1->diff($date2);
						$years = $interval->format('%y');
						$months = $interval->format('%m');
						$days = $interval->format('%d');
						if($years!=0){
							$ago = $years.' year(s) ago';
						}else{
							$ago = ($months == 0 ? $days.' day(s) ago' : $months.' month(s) ago');
						}
						if($ago==0)
						{
							$ago='Today';
						}
						echo $ago; 
						
						?>
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
                                <?php
									}
								?>
								<?php
								$sql_awardproject=mysql_query("select * from post_projects where developer_id='$_SESSION[id]' and status='award' order by award_date desc limit 5");
								while($row_awardproject=mysql_fetch_array($sql_awardproject))
								{
									$client=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_awardproject[uid]'"));
									
									$user_bids=mysql_fetch_array(mysql_query("select * from user_bids where uid='$_SESSION[id]' and project_id='$row_awardproject[project_id]'"));
								?>
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f"><?php echo $client['first_name'].' '.$client['last_name'];?></font></a> awarded you project <a href=""><font style="color:#f1c40f"><?php echo $row_awardproject['title'];?></font></a> for <?php echo $user_bids['cost'].' '.$row_awardproject['currency'];?><br />
						<!--Day Caluclation-->			
						<?php
						
						$date1 = new DateTime($row_awardproject['award_date']);
						$date2 = new DateTime("now");
						$interval = $date1->diff($date2);
						$years = $interval->format('%y');
						$months = $interval->format('%m');
						$days = $interval->format('%d');
						if($years!=0){
							$ago = $years.' year(s) ago';
						}else{
							$ago = ($months == 0 ? $days.' day(s) ago' : $months.' month(s) ago');
						}
						if($ago==0)
						{
							$ago='Today';
						}
						echo $ago; 
						
						?>
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								<?php
								}
								?>
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> left ratings and reviews for project <a href=""><font style="color:#f1c40f">Build a website</font></a> for $450<br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> left ratings and reviews for project <a href=""><font style="color:#f1c40f">Build a website</font></a> for $450<br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> left ratings and reviews for project <a href=""><font style="color:#f1c40f">Build a website</font></a> for $450<br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> left ratings and reviews for project <a href=""><font style="color:#f1c40f">Build a website</font></a> for $450<br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
					
						</ul>
					
					</div>
					
				</div>
				
				
			
				<div class='page-nav clearfix '>
                      <span class='active'>1</span><a href='#'>2</a><a href='#' class='next'>Next<i class='fa-angle-right'></i></a>
                </div>
				
            </div>
        </div>
    </div>
    </section>

   
   <?php include "include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>