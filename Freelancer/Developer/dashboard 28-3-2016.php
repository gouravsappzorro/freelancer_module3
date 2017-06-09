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
	<?php include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?>

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
	<div class="container" >
		
		<div class="row-fluid">
         
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                        <img src="<?php echo WebUrl; ?>images/bidder.jpg" style="border-radius:4px;"><br />
                        <p>Sam Arya<br />
						Membership Plan: Basic</p>
						<div class="progress-wrap">
								<p class="bar-text">
									Profile Status <strong>90%</strong>
								</p>
								<div class="progress " style="">
									<div class="bar" style="" data-percentage-value="90" data-value="90">
									</div>
								</div>
							</div><br />
						 
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>My Balance</span></h3>
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif"><strong>$500</strong></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif">View Transaction History</font><br /><br />
						 
						 <!-- My Bids Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>My Bids</span></h3>
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif"><strong>50/100</strong></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif">Change Plan</font><br /><br />
						
						<!-- My Projects Section -->
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Ongoing Projects</span></h3>		
						
						<p><a href="">Build a professional website >></a></p><hr />
						<p><a href="">Build a mobile application >></a></p><hr />
						<p><a href="">Build an Ecommerce Store for my company >></a></p><hr />
						
                    </div>
                </div>
					
				
				
				
				<!-- First Project -->
				
                <div class="span9">
					<div class="inner-content">
					  <div class="span12">
					  <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Projects Feed</span></h3>	
						 <ul class="product_list_widget">
                                <li>
									<a href="#" title="">
									<img style="width:40px; height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> released a milestone payment of $450 USD for <a href=""><font style="color:#f1c40f">Build a website</font></a><br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> created a milestone payment of $450 USD for <a href=""><font style="color:#f1c40f">Build a website</font></a><br />
									3 Weeks ago
								
								</li>
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    				<span></span>
              					</div>
								
								<li>
									<a href="#" title="">
									<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>
									<a href=""><font style="color:#f1c40f">Client</font></a> awarded you project <a href=""><font style="color:#f1c40f">Build a website</font></a> for $450<br />
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

   
   <?php include "../include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>