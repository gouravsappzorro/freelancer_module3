<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php'); 
if (!isset($_SESSION['user'])) {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="../Login/login.php";
     </script>
<?php
  	
    exit; 
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
	<?php include('../include/script.php');  ?>
	<link rel="stylesheet" href="<?php echo WebUrl;?>/css/rating-tooltip.css">
	
	<style>
   		ul.product_list_widget li a {
		display: inline;
	}
    	</style>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

<?php include"../include/header.php"; ?>
<?php
if(isset($_GET['user']))
{
	$uid_res=mysql_query("select unique_code from register where unique_code='".$_GET['user']."'");
	$uid_row=mysql_fetch_array($uid_res);
	$uid_cnt=mysql_num_rows($uid_res);
	
	if($uid_cnt!=0){
	
		$res=mysql_query("select * from register where unique_code='".$uid_row['unique_code']."'");
		$user_cnt=mysql_num_rows($res);
		
		if($user_cnt==0)
		{
			$_SESSION['no_user']="No User Found";
		}
		$row=mysql_fetch_array($res);
	
		/*$profile_res=mysql_query("select * from profile where uid='".$uid_row['unique_code']."'");
		$profile_cnt=mysql_num_rows($profile_res);
		if($profile_cnt==0)
		{
			$_SESSION['no_profile']="No Profile Data Found";
		}
		$row1=mysql_fetch_array($profile_res);*/
		
		$education_res=mysql_query("select * from education where uid='".$uid_row['unique_code']."'");
		$edu_cnt=mysql_num_rows($education_res);
		if($edu_cnt==0)
		{
			$_SESSION['no_edu']="No Education Data Found";
		}
		$row2=mysql_fetch_array($education_res);
	
		$experience_res=mysql_query("select * from experience where uid='".$uid_row['unique_code']."'");
		$exp_cnt=mysql_num_rows($experience_res);
		if($exp_cnt==0)
		{
			$_SESSION['no_exp']="No Experience Data Found";
		}
		$row3=mysql_fetch_array($experience_res);
	}
}

 ?>
 <section id="titlebar" class="titlebar titlebar2 titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-rs-height="yes" data-height="80"> </section>
 
    <section class="section" style="padding-top:80px; padding-bottom:0px;">
    <div class="container">
        <div class="row-fluid">
           
            <div class="row-fluid">
                
                <div class="span4">
                    <div class="inner-content">
					<?php
						if(isset($_SESSION['no_user']))
						{
							echo"<div class='alert alert-info'>
    								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      <strong>NO Data!</strong> ".$_SESSION['no_user']."
  								 </div>";
								 unset($_SESSION['no_user']);
						}else{
					?>
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span><?php echo $row['first_name'];?> <?php echo $row['last_name'];?></span></h3>
                        <div class="project-info">
                            <div class="clearfix">
								
									<a href="#" title="">
									<?php if(isset($_SESSION['no_user'])){?>
									<img  src="<?php echo WebUrl; ?>Profile Picture/no_image.jpg" width="300" height="auto" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/>
									<?php }else{?>
									<img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture'] ?>" width="300" height="auto" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" id="profile" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
									<?php }?>
									</a><br />
									
                                	<span><?php echo $row['country'];?>, <?php echo $row['city'];?></span><br /><br />
									Member since <?php $year=explode('-',$row['register_date']);echo $year[0];?><br />
                                    <!--====== Total projects completed ======-->
                                    <?php
										$sql_project=mysql_num_rows(mysql_query("select * from  post_projects where developer_id='$row[unique_code]' and status='complete'"));
									?>
									Total projects completed: <?php echo $sql_project;?><br />
                                    
                                    <!--=======================================-->
                                    
                                    <!--====== Total Earned ======-->
                                    <?php
										$total_earned=mysql_fetch_array(mysql_query("select SUM(milestone) as milestone from milestone_payment where developer_id='$row[unique_code]'"));
										
									?>
                                    <?php
									if($_SESSION['user']=='Work'){
									?>
                                        Total Earned: $ <?php 
                                        if($total_earned['milestone']=='')
                                        { 
                                            echo '0';
                                        }
                                        else
                                        {
                                             echo number_format($total_earned['milestone'],2);
                                        }
									}
									?><br /><br />
                                    
                                    <!--==========================-->
                                    <?php
                                		$rate_developer=mysql_fetch_array(mysql_query("select avg(Client_Punctuality + Client_Proffesionalism + Client_Rehire) as developer_rate from rating where developer_id='$row[unique_code]'"));
										
                                    	$rate_dev=($rate_developer['developer_rate']/15)*100;
                                
                            		?>
									<div class="star-rating">
                                    	<span style="width:<?php echo $rate_dev;?>%"><strong class="rating">5.00</strong> out of 5</span>
                                	</div>
									
									<a href="">
									<?php
										$review_dev=mysql_num_rows(mysql_query("select * from rating where developer_id='$row[unique_code]'"));
								
										echo $review_dev.' Reviews';
									?></a><br /><br />
									<?php if(isset($_SESSION['no_user'])){?>	
									<p>
										Skills:Profile Not Fill Up! 
									</p>
									<?php }else{?>
									<p>
										Skills: <?php echo $row['skills'];?> 
									</p>
									<?php }?>
                            </div>
                        </div>
                    </div>
					<?php }?>
                </div>
				
				<div class="span8">
                    <div class="inner-content">
					<?php
						if(isset($_SESSION['no_user']))
						{
							echo"<div class='alert alert-info'>
    								<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      <strong>No Data!</strong> ".$_SESSION['no_profile']."
  								 </div>";
								 unset($_SESSION['no_user']);
						}else{
					?>
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span><?php echo $row['profile_title'];?></span></h3>
                        <div class="excerpt">
						
                            <p align="justify"><?php echo nl2br($row['description']);?>
                               <!-- At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.<br /><br />
								
								
								 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,<br /><br />
								 
								  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,-->
								
                            </p>
							
                        </div>
                    </div>
					<?php }?>
                </div>
				
            </div>
        </div>
    </div>
    </section>

	<!-- Portfolio -->
	
	<div id="section_0" class="section post-content">
        <div class="container">
            <div class="row-fluid">
                <section id="section_908139944" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype- section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:0;padding-bottom:0;background-color:#ffffff;" data-video-ratio="" data-parallax-speed="1">
                <?php
						$portfolio_res=mysql_query("select * from portfolio where uid='".$uid_row['unique_code']."'");
						$portfolio_cnt=mysql_num_rows($portfolio_res);
						if($portfolio_cnt==0)
						{
							$_SESSION['no_portfolio']="No Portfolio Data Found";
						}
											 
				?>
				 <h3 align="center" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Portfolio</span></h3>
                <div class="container section-content">
                    <div class="row-fluid">
                        <div class="row-fluid equal-cheight-no element-padding-default element-vpadding-default">
                            <div class="section-column span12" style="">
                                <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                                  <?php
												if(isset($_SESSION['no_portfolio']))
												{
													echo"<div class='alert alert-info'>
    														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      						<strong>No Data!</strong> ".$_SESSION['no_portfolio']."
  								 						</div>";
								 					unset($_SESSION['no_portfolio']);
												 }else{
											 ?>
                                    <div id="portfolio_1656543370" class="portfolio padding-medium">
                                        <div class="row-fluid portfolio-items bg-style-white sortable-items portfolio-style1 columns-3 love-it-no enable-hr-no hr-type-tiny hr-color-light hr-style-normal element-padding-medium info-style-left element-vpadding-default info-onhover-yes " data-columns="3" data-animation-delay="0" data-animation-effect="" data-masonry-layout="no">
											
											<?php
											while($row4=mysql_fetch_array($portfolio_res))
											{
											 ?>
                                            <div class="portfolio-item photogrpahy span scheme-default">
                                                <div class="inner-content">
                                                    <div class="image hoverlay">
                                                        <a href="#" target="_self"><img width="1100" height="797" src="<?php echo WebUrl; ?>Portfolio/<?php echo $row4['portfolio_image']; ?>" class="attachment-thumb-large" /></a>
                                                        <div class="overlay">
                                                            <div class="overlay-content">
                                                                <div class="overlay-icons">
                                                                <?php if($row4['url']!='')
																{?>
                                                                    <a href="<?php echo $row4['url'];?>" target="_new"  class="lightbox-icon"><i class="fa fa-icon_link"></i></a>
                                                                <?php
																}
																else
																{?>
                                                                	<a href="javascript:void(0);" class="lightbox-icon" title="Link Not Available"><i class="fa fa-icon_link"></i></a>
                                                                <?php
																}
																?>
                                                                    <a href="<?php echo WebUrl; ?>Portfolio/<?php echo $row4['portfolio_image']; ?>"  class="lightbox-icon" data-gal="prettyPhoto[portfolio1587740418]"><i class="fa fa-icon_search2"></i></a>
                                                                </div>
                                                                <div class="info">
                                                                    <h3><a href="#" target="_self"><?php echo $row4['title'];?></a></h3>
                                                                    <h5><a href="#" target="_self"><?php echo $row4['skills'];?></a></h5>
                                                                    <div class="hr">
                                                                        <span></span>
                                                                    </div>
                                                                   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											<?php }?>
                                          
                                        </div>
                                    </div>
                                    <?php }?>
									
									<div class="hr border-small dh-2px aligncenter hr-border-primary" style="margin-top:20px;margin-bottom:55px;">
                                                <span></span>
                                            </div>
                                            <div class="tabset horizental-tabset">
                                                <ul class="tabs clearfix">
                                                    <li class="tab"><a href="#tab-1">Experience</a></li>
                                                    <li class="tab"><a href="#tab-2">Education</a></li>
                                                </ul>
                                                <div id="tab-1" class="panel tab-content clearfix">
												<?php
													if(isset($_SESSION['no_exp']))
												{
													echo"<div class='alert alert-info'>
    														<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   								      						<strong>No Data!</strong> ".$_SESSION['no_exp']."
  								 						</div>";
								 					unset($_SESSION['no_exp']);
												 }else{
												 ?>
                                                    <div class="column-text ">
                                                        <h3><?php echo $row3['title']; ?></h3>
														<h4><?php echo $row3['company']; ?></h4>
														<p><?php echo $row3['experience']; ?> Years Experience</p>
														<p><strong>Summary : </strong><?php echo nl2br($row3['summary']); ?></p>
                                                    </div>
													<?php }?>
                                                </div>
												
                                                <div id="tab-2" class="panel tab-content clearfix">
												<?php
													if(isset($_SESSION['no_edu']))
												{
													echo"<div class='alert alert-info'>
    													 	<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    													 	<strong>No Data!</strong> ". $_SESSION['no_edu']."
  													    </div>";
								 					unset($_SESSION['no_edu']);
												 }else{
												 ?>
												 <?php
												 $exp_education=explode(",", $row2['education']);
												 $exp_country=explode(",", $row2['country']);
												 $exp_univercity=explode(",", $row2['univercity']);
												 $exp_start_year=explode(",", $row2['start_year']);
												 $exp_end_year=explode(",", $row2['end_year']);

												 for($i=0;$i<count($exp_education);$i++)
												 {
												 ?>
                                                    <div class="column-text ">
                                                         <h3><?php echo $exp_education[$i]; ?></h3>
														 <p><?php echo $exp_country[$i]; ?></p>
														 <p><?php echo $exp_univercity[$i]; ?></p>
														 <p><?php echo $exp_start_year[$i]; ?>-<?php echo $exp_end_year[$i]; ?></p>
														<!-- <p>20th March 2007 to 20th March 2011</p>-->
                                                    </div>
													<?php } }?>
                                                </div>
                                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
        </div>
    </div>
	
	<!-- End Portfolio -->
	
    <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <div class="row-fluid">
            <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>All Reviews</span></h3>		
			
			<?php
			$sql_rate=mysql_query("select * from rating where developer_id='$row[unique_code]' and developer_status='1' and client_status='1' order by id desc limit 10");
			if(mysql_affected_rows())
			{
				while($row_rate=mysql_fetch_array($sql_rate))
				{
					$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_rate[project_id]'"));
							
					$user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_rate[client_id]'"));
								
				?>
               		 	<div class="span12">
                     		<ul class="product_list_widget">
                                <li>
                                    <a href="#" title="">
                                    <img width="120" height="120" src="<?php echo WebUrl;?>Profile Picture/<?php echo $user['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg';"/>
                                    <?php echo $project['title'];?>
                                    </a>
                                    <span><p><?php echo $user['city'].', '.$user['country'];?></p></span>
                                    <p>
                                    
										<?php
										$client_rate  =  $row_rate['Client_Punctuality'] + $row_rate['Client_Proffesionalism'] + $row_rate['Client_Rehire'];
												
										$cli_rate = ($client_rate * 5) / 15;
										
                                        for($x=1;$x<=$cli_rate;$x++) {
                                            echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
                                        }
                                        
                                        while ($x<=5) {
                                            echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
                                            $x++;
                                        }
                                        ?>
                                    
                                    	<!--===== Tooltip ======-->

                                        <a class="tooltips" href="javascript:void()">
											<i class="glyphicon glyphicon-question-sign" style="position:relative; margin-left:10px; font-size:18px; color:#febf32"></i>
											<span>
											
											<?php 
											
											//if($_SESSION['user']=='Work')
											//{
												echo "Punctuality <br>";
												for($x=1;$x<=$row_rate['Client_Punctuality'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Proffesionalism <br>";
												for($x=1;$x<=$row_rate['Client_Proffesionalism'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Rehire <br>";
												for($x=1;$x<=$row_rate['Client_Rehire'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
											//}
											?>
                                            </span>
                                            </a>
                                        <!--===== End Tooltip ======-->
                                    </p>
                                   
                                    <p align="justify">"<?php echo nl2br($row_rate['client_message'])?>" - <strong><?= $user['first_name'].' '.$user['last_name']?></strong> </p>
                                    
                                    <p><?php echo $project['skills'];?></p>
                                </li>
                    		</ul>
						</div>
					
			<!-- 1st Bidder Block End -->
            
                    <div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:10px;margin-bottom:10px;">
                        <span></span>
                    </div>
                <?php
				}
			}
			else
			{
				echo"<div class='alert alert-info'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
				  <strong>No Data!</strong> 
				  No any Rating available
				</div>";
			}
			?>
			</div>
		</div>
    </section>

    <?php include "../include/footer.php"; ?>
  
	<!-- End footer -->
	</body>
	

</html>
