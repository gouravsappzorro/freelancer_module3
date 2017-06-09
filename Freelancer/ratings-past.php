<?php
session_start();
?>
<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user'])){
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="Login/login.php";
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
	<?php include('include/script.php');  ?>
	<link rel="stylesheet" href="<?php echo WebUrl;?>/css/rating-tooltip.css">  
	
	<style>
    		ul.product_list_widget li a {
		display: inline;
	}
    	</style>
             
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
                            <h1 style="font-size:24px;">Ratings & Reviews</h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->

     <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <div class="row-fluid">
			<br /><br />
			
				<div class="row-fluid">
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="ratings-pending.php">Pending Reviews</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px; border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="ratings-past.php">Past Reviews</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #f1c40f"><span></span></div>
					</div>
					<div class="span3">
						<p style="color:#000000"><strong></strong></p>
					</div>
				</div>				
			
			<?php
			if($_SESSION['user']=='Work')
			{
				$sql_rate=mysql_query("select * from rating where developer_id='$_SESSION[id]' and developer_status='1' and client_status='1' order by id desc limit 10");
			}
			if($_SESSION['user']=='Hire')
			{
				$sql_rate=mysql_query("select * from rating where client_id='$_SESSION[id]' and developer_status='1' and client_status='1' order by id desc limit 10");
			}
				if(mysql_affected_rows())
				{
					while($row_rate=mysql_fetch_array($sql_rate))
					{
						if($_SESSION['user']=='Work')
						{
							$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_rate[project_id]'"));
							
							$user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_rate[client_id]'"));
						}
						
						if($_SESSION['user']=='Hire')
						{
							$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='$row_rate[project_id]'"));
							
							$user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_rate[developer_id]'"));
						}
						
				?>
				
					<!-- 1st Bidder Block -->

						<div class="span12">
							 <ul class="product_list_widget">
									<li>
										<a href="javascript:void();" title="">
										<img width="120" height="120" src="<?php echo WebUrl;?>Profile Picture/<?php echo $user['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl;?>Profile Picture/no_image.jpg';"/>
										<?php echo $project['title'];?>
										</a>
										<span><p><?php echo $user['city'].', '.$user['country'];?></p></span>
										<p>
										<?php
											if($_SESSION['user']=='Hire')
											{
												$developer_rate = $row_rate['Developer_Punctuality'] + $row_rate['Developer_Proffesionalism'] + $row_rate['Developer_rehire'];
												
												$dev_rate = ($developer_rate * 5) / 15;
												
												for($x=1;$x<=$dev_rate;$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
											}
											
											if($_SESSION['user']=='Work')
											{
												$client_rate  =  $row_rate['Client_Punctuality'] + $row_rate['Client_Proffesionalism'] + $row_rate['Client_Rehire'];
												
												$cli_rate = ($client_rate * 5) / 15;
												
												for($x=1;$x<=$cli_rate;$x++) {
													echo '<img src="'.WebUrl.'images/rate_star.png" style="width:17px; margin-right:0px;"/>';
												}
												
												while ($x<=5) {
													echo '<img src="'.WebUrl.'images/rate_star_blank.png" style="width:18px; margin-right:0px;"/>';
													$x++;
												}
											}
											?>
                                           
                                           
                                            
                                           <!--===== tootltip =====-->
											<a class="tooltips" href="javascript:void()">
											<i class="glyphicon glyphicon-question-sign" style="position:relative; margin-left:10px; font-size:18px; color:#febf32"></i>
											<span>
											<?php 
											/*======= For Developer =======*/
											if($_SESSION['user']=='Work')
											{
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
											}
											
											
											
											/*========== For Client ==========*/
											
											if($_SESSION['user']=='Hire')
											{
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
											}
											?>
                                            </span>
                                            </a>
                                            <!--===== End Tooltip =====-->
                                            
                                            
										</p>
										<?php
										if($_SESSION['user']=='Work')
										{
										?>
                                        	<p align="justify">"<?php echo nl2br($row_rate['client_message'])?>" - <strong><?= $user['first_name'].' '.$user['last_name']?></strong> </p>
                                        <?php
										}
										if($_SESSION['user']=='Hire')
										{
										?>
                                       		<p align="justify">"<?php echo nl2br($row_rate['developer_message'])?>" - <strong><?= $user['first_name'].' '.$user['last_name']?></strong> </p>
                                        <?php
										}
										?>
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
					echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
					
					<strong></strong>No any Rating available
					</div>";
				}
				?>
        </div>
    </div>
    </section>
    
    <?php include "include/footer.php"; ?>
	<!-- End footer -->
</body>
</html>
