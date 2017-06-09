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
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>All Reviews</span></h3>
                        <div class="excerpt">
						
                            <p><?php echo nl2br($row['description']);?>
                               <!--At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio.<br /><br />
								
								
								 At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident,<br /><br />
								 
								  At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident-->
								
                            </p>
                            
                            
                            <!--======== Review Start ========-->
                            
                            
                            <div class="row-fluid">
            <!--<h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>All Reviews</span></h3>		-->
			
			<?php
			$sql_rate=mysql_query("select * from rating where client_id='$row[unique_code]' and developer_status='1' and client_status='1' order by id desc limit 10");
			if(mysql_affected_rows())
			{
				while($row_rate=mysql_fetch_array($sql_rate))
				{
					$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_rate[project_id]'"));
							
					$user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_rate[developer_id]'"));
								
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
										
										$developer_rate = $row_rate['Developer_Punctuality'] + $row_rate['Developer_Proffesionalism'] + $row_rate['Developer_rehire'];
												
										$dev_rate = ($developer_rate * 5) / 15;
                                        
                                        for($x=1;$x<=$dev_rate;$x++) {
                                            echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
                                        }
                                        
                                        while ($x<=5) {
                                            echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
                                            $x++;
                                        }
                                            
                                        ?>
                                        
                                        <!--===== Tooltip =====-->
                                        <a class="tooltips" href="javascript:void()">
											<i class="glyphicon glyphicon-question-sign" style="position:relative; margin-left:10px; font-size:18px; color:#febf32"></i>
											<span>
											<?php 
																						
											//if($_SESSION['user']=='Hire')
											//{
												echo "Punctuality <br>";
												for($x=1;$x<=$row_rate['Developer_Punctuality'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Proffesionalism <br>";
												for($x=1;$x<=$row_rate['Developer_Proffesionalism'];$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
												echo "<br><br>";
												echo "Rehire <br>";
												for($x=1;$x<=$row_rate['Developer_rehire'];$x++) {
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
                                        <!--===== End Tooltip =====-->
                                    </p>
                                   
                                    <p align="justify">"<?php echo nl2br($row_rate['developer_message'])?>" - <strong><?= $user['first_name'].' '.$user['last_name']?></strong> </p>
                                    
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
				  <strong>No Data!</strong> No any Rating available
				</div>";
			}
			?>
		   
        </div>
        
        <!--======== Review End ========-->
							
                        </div>
                    </div>
					<?php }?>
                </div>
				
            </div>
        </div>
    </div>
    </section>
	
    <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <!--  REVIEW SESTION HERE-->
    </div>
    </section>

    <?php include "../include/footer.php"; ?>
  
	<!-- End footer -->
	</body>
	

</html>
