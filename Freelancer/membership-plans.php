<?php
session_start();
?>
<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php require_once('payment/config.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
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
	<?php //include('../include/validation.php'); ?>
	<?php include('include/script.php');  ?>
	<?php //include('include/validation.php'); ?>
	
    <style>
		.price_box.style5 .pricing-signup {
			height:110px;
		}
		.col-md-12{
			margin-top:40px;
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
                            <h1 style="font-size:24px;">Membership Plans</h1>
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

    <section id="section_1124473077" class="section content-box section-border-no section-bborder-no section-height-content section-bgtype-image section-fixed-background-no section-bgstyle-stretch section-triangle-no triangle-location-top parallax-section-no section-overlay-no section-overlay-dot-no " style="padding-top:90px;padding-bottom:90px;background-color:#f7f7f7;" data-video-ratio="" data-parallax-speed="1">
        <div class="section-overlay" style="">
        </div>
        <div class="container section-content">
            <div class="row-fluid">
            <?php if(isset($_SESSION['plan']) && $_SESSION['plan'] == 'Success' ){ ?>
											
			<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
    			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   				<strong></strong>Your payment was successful.plan activated successfully.</div>
											
				<?php unset($_SESSION['plan']); } ?>
					
				<?php if(isset($_SESSION['plan']) && $_SESSION['plan'] == 'Failure' ){ ?>
											
					<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
    					<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
   						<strong></strong>Please Try Again
					</div>
												
				<?php  unset($_SESSION['Failure']); } ?>
                <?php if(isset($_SESSION['CanclePlan']) && $_SESSION['CanclePlan'] == 'Cancle' ){ ?>
											
                    <div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <strong></strong>You have successfully cancelled your plan But to enjoy the premium benefits and to apply quotes on jobs, you should always take any one of the membership plan.
                    </div>
											
				<?php unset($_SESSION['CanclePlan']); } ?>
          		<div class="row-fluid equal-cheight-no element-padding-no element-vpadding-no">

                <?php 
				$payment =mysql_fetch_array(mysql_query("select * from payment where user_id = '".$_SESSION['id']."' and Status = 'active' ")); 

				$query="select * from admin_membership_plan";
				$res=mysql_query($query);

				while($row=mysql_fetch_array($res))
				{
				?>
                    <div class="section-column span4" style="">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div <?php if($payment['Plan']==$row['plan_name'] && $payment['Status']=='active'){?>id="pricing_211698049" <?php }else{ ?> id="pricing_1443819961" <?php }?> class="price_box style5 hover-button-no">
                            
                                <div class="title-box">
                                    <h3><?php echo $row['plan_name']; ?></h3>
                                </div>
                                <div class="pricing-box">
                                    <div class="price-content">
                                        <span class="price"><span class="dollor">$</span><?php echo $row['price']; ?></span><span class="month">per Month,</span>
                                        <span>Bids : <?php echo $row['bids'];?></span>
                                    </div>
                                </div>
                                <!--<div class="feature-list">
                                    <ul>
                                        <li>Feature List Item 1</li>
                                        <li>Feature List Item 2</li>
                                        <li>Feature List Item 3</li>
                                        <li>Feature List Item 4</li>
                                        <li>Feature List Item 5</li>
                                    </ul>
                                </div>-->
                                <div class="pricing-signup">
                                    <div class="pricing-signup-button">
                                    <?php
									if($payment['Status'] != 'active' )
									{
									?> 
									 <form action="<?php echo WebUrl; ?>payment/pay.php?PlannameP=<?php echo $row['plan_name']; ?>&PlanCode=<?php echo $row['code']; ?>" method="post">
										<script
										src="https://checkout.stripe.com/checkout.js" class="stripe-button"
										data-key="<?php echo $stripe['publishable_key']; ?>"
										data-image="images/stripe.png"
										data-name="Freelancer"
										data-description="<?php echo $row['plan_name']; ?> <?php echo "(".$row['price'].")"; ?>"
										data-amount="<?php echo $row['price']*100; ?>">
										
										</script>
									</form>			
													
							  <?php }else if($payment['Status'] == 'active' && $payment['PlanId'] == $row['code'])
							  		{
									?>
                                    <a class="button default-button button_default" target="_self" href="<?php echo WebUrl; ?>Plan/CanclePlan.php?CanclePlanP=Cancle">Cancel Plan</a>
                                    <br /><br />
										<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br/>
										<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span><br /><br />
                              <?php }
									else
									{ ?>
														
							  <?php }
									?>
                                    
              						
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>
                    
                     <!--<div class="section-column span4" style="">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div id="pricing_211698049" class="price_box style5 hover-button-no">
                                <div class="title-box">
                                    <h3>Medium</h3>
                                </div>
                                <div class="pricing-box">
                                    <div class="price-content">
                                        <span class="price"><span class="dollor">$</span>12</span><span class="month">/ Month</span>
                                    </div>
                                </div>
                                <div class="feature-list">
                                    <ul>
                                        <li>Feature List Item 1</li>
                                        <li>Feature List Item 2</li>
                                        <li>Feature List Item 3</li>
                                        <li>Feature List Item 4</li>
                                        <li>Feature List Item 5</li>
                                    </ul>
                                </div>
                                <div class="pricing-signup">
                                    <div class="pricing-signup-button">
                                        <a class="button default-button button_default" target="_self" href="#">Select</a><a class="button hover-button button_default" target="_self" href="#">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="section-column span4" style="">
                        <div class="inner-content content-box textnone" style="padding-top:0px;padding-bottom:0px;padding-left:0px;padding-right:0px;">
                            <div id="pricing_953487848" class="price_box style5 hover-button-no">
                                <div class="title-box">
                                    <h3>Advanced</h3>
                                </div>
                                <div class="pricing-box">
                                    <div class="price-content">
                                        <span class="price"><span class="dollor">$</span>20</span><span class="month">/ Month</span>
                                    </div>
                                </div>
                                <div class="feature-list">
                                    <ul>
                                        <li>Feature List Item 1</li>
                                        <li>Feature List Item 2</li>
                                        <li>Feature List Item 3</li>
                                        <li>Feature List Item 4</li>
                                        <li>Feature List Item 5</li>
                                    </ul>
                                </div>
                                <div class="pricing-signup">
                                    <div class="pricing-signup-button">
                                        <a class="button default-button button_default" target="_self" href="#">Select</a><a class="button hover-button button_default" target="_self" href="#">Select</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>-->
					
                    
                </div>
                <div class="row">
                        <div class="col-md-12">
                            <h3>Why should I Upgrade?</h3>
                            <p>Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.</p>
                        </div>
                    
						<div class="col-md-12">
                    		<h3>Can I change my plans?</h3>
							<p>Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.</p>
						</div>
					
						<div class="col-md-12">
							<h3>Can I cancel my plans?</h3>
							<p>Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.Some of the content for the membership plans will come here.</p>
						</div>  
					</div>
            </div>
        </div>
        </section>
	 <?php include "include/footer.php"; ?>
	<!-- End footer -->
	</body>
</html>
