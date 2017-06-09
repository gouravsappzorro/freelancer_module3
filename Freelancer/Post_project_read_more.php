<?php include('./Admin/MyInclude/MyConfig.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php //include('../include/validation.php'); ?>
	<?php include('./include/script.php');  ?>
	<?php include('./include/validation.php'); ?>
	<script>
	
		
	</script>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"./include/header.php"; ?>
<!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Browse Projects</h1>
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
    <div class='page-nav clearfix' align="right">
		 Show <a href="" class='active'>20 </a>, <a href="">50 </a> , <a href="">100 </a> Records  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <span class='active'>1</span><a href='#'>2</a><a href='#' class='next'>Next<i class='fa-angle-right'></i></a>
    </div>
	
	<div class="container">
		
		<div class="row-fluid">
         
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Search Jobs</span></h3>
                        <form name="" action="" method="post">
							<input type="text" name="search" value="" placeholder="Search Jobs"><br />
							<label><strong>Projcets Type:</strong></label><br />
							<input type="radio" name="type" value="fixed"> Fixed Price <br />
							<input type="radio" name="type" value="hourly"> Hourly Price <br />
							<input type="radio" name="type" value="both"> Both <br /><br />
							
							<label><strong>Price:</strong></label><br />
							<input type="text" name="startprice" value="" placeholder="Min.">
							<input type="text" name="endprice" value="" placeholder="Max.">	<br /><br />					
							
							<label><strong>Select Skills:</strong>:</label><br />
							<input type="checkbox" name="skills" value="PHP"> PHP <br />
							<input type="checkbox" name="skills" value="PHP"> Wordpress <br />
							<input type="checkbox" name="skills" value="PHP"> Joomla <br />
							<input type="checkbox" name="skills" value="PHP"> Cake PHP <br />
							<input type="checkbox" name="skills" value="PHP"> Yii PHP <br />
							<input type="checkbox" name="skills" value="PHP"> Concrete5 <br />
							<input type="checkbox" name="skills" value="PHP"> WooCommerce <br />
							<input type="checkbox" name="skills" value="PHP"> Magento <br />
							<input type="checkbox" name="skills" value="PHP"> Volusion <br />
							<input type="checkbox" name="skills" value="PHP"> Angular JS <br />
							<input type="checkbox" name="skills" value="PHP"> Open Cart <br />
							<input type="checkbox" name="skills" value="PHP"> Prestashop <br />
							<input type="checkbox" name="skills" value="PHP"> Android App <br />
							<input type="checkbox" name="skills" value="PHP"> iOS App <br />
							<input type="checkbox" name="skills" value="PHP"> Windows App <br /><br />
							
							<label><strong>Location:</strong></label><br />
							<input type="text" name="location" value="" placeholder="Type & search location">
							
						</form>
                    </div>
                </div>
				
				
				
				<!-- First Project -->
				
                <div class="span9">
                    <?php 
						$select="select *,DATE_FORMAT(NOW(),'%D %b %Y') AS niceDate from post_projects where id='".$_GET['id']."'";
						$res=mysql_query($select);
						while($row=mysql_fetch_array($res))
						{
					?>
					<div class="inner-content">
					  <div class="span9">
						 <ul class="product_list_widget">
                                <li>
									<a href="#" title="">
									<img style="width:50px;height:50px; border-radius:4px;" src="images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/></a>
									<a href=""><font style="color:#f1c40f"><?php echo $row['title'];?></font></a>
									
                                	
									<font style="font-size:13px"><?php echo $row['description']; ?></font><br />
									<a href=""><font style="text-transform:none;"><?php echo $row['skills'] ?></font></a>
								</li>
						</ul>
					
					</div>
					<div class="span3">
						<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">$<?php echo $row['budget'] ?></font><br />
						<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On:<?php echo $row['niceDate']; ?></font><br />
						<span><a href=""><strong>Bid Now</strong></a></span>
					</div>
				</div>
				
				<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    <span></span>
              	</div>
				<?php }?>
				
				
				</div>
				
				<div class='page-nav clearfix '>
                      <span class='active'>1</span><a href='#'>2</a><a href='#' class='next'>Next<i class='fa-angle-right'></i></a>
                </div>
				
            </div>
        </div>
    </div>
    </section>

   
   <?php include "./include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>