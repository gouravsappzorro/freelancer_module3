<?php session_start(); ?>
<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
<?php require_once('../payment/config.php'); ?>
<?php
if(isset($_SESSION['Code']) && isset($_SESSION['UEmail']) && $_SESSION['Type'] == 'ServiceProvider')
{ 
?><head>
	<?php include "../MyInclude/Script.php";?>
</head>


<title>Pricing</title>
<body onUnload="" class="page-homepage navigation-top-header" id="page-top">

<?php include "../MyInclude/Header.php";  ?>
    <div class="row" style="margin:0px; background:#0dcdbd; padding: 0px 50px 60px 50px;">
		<div class="col-md-4">
			<h1 style="color:#FFFFFF; font-size:30px;margin-left:55px; margin-bottom:0px;">Membership Plans</h1>
		</div>
		<div class="col-md-1"></div>
		<div class="col-md-6">
			
		</div>
	</div>
		
	</div>
            <section id="why-us" class="block background-color-white" >
		
                    <div class="container">	
					
					<div align="center">
						<font style="font-size:24px; font-weight:bold;">Pestmouldcontrol.com Membership Plans</font>
						<p>No obligations. Change plans anytime. Maximise your Earnings!<br /><br /><br /></p>				
					</div>
					
					
									
                    	<div class="row">
						<div class="col-md-1"></div>
							<div class="col-md-10">
							<?php  $data=mysql_query("select * from trademandetail where Code='".$_SESSION['Code']."'");
													$result=mysql_fetch_array($data);
													
											 ?>
								<?php if(isset($_SESSION['plan']) && $_SESSION['plan'] == 'Success' ){ ?>
											<div class="alert alert-success" role="alert"> 
										 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>													
									     </button>
										 <span>Your payment was successful. <?php echo $result['PlanName']; ?>plan activated successfully.</span>
										</div>		
							  <?php unset($_SESSION['plan']); } ?>
								
								<?php if(isset($_SESSION['plan']) && $_SESSION['plan'] == 'Failure' ){ ?>
											<div class="alert alert-danger" role="alert"> 
										 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>													
									     </button>
										 <span>Please Try Again</span>
										</div>		
							  <?php  unset($_SESSION['Failure']); } ?>
								
								<?php if(isset($_SESSION['CanclePlan']) && $_SESSION['CanclePlan'] == 'Cancle' ){ ?>
											<div class="alert alert-success" role="alert">
										 <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span>													
									     </button>
										 <span>You have successfully cancelled your. <?php echo $result['PlanName']; ?>plan But to enjoy the premium benefits and to apply quotes on jobs, you should always take any one of the membership plan.</span>
										</div>		
							  <?php unset($_SESSION['CanclePlan']); } ?>
							
								<?php
								
									 $payment =	 mysql_fetch_array(mysql_query("select * from payment where Email = '".$_SESSION['UEmail']."' and Status = 'active' ")); 
									
									
									$row=mysql_fetch_array( mysql_query("select * from membership where PlanCode = 'Plan1a56488' ")); ?>
									<div class="col-xs-12 col-md-4">
            <div class="panel <?php if($payment['Plan']==$row['PlanName'] && $payment['Status']=='active'){ echo 'panel-primary ';}else{ ?> panel-success <?php } ?>">
                <div class="panel-heading">
                     <center><header><h2 style="margin-bottom:10px;"><?php echo $row['PlanName'];?></h2></header></center>
                </div>
                <div class="panel-body" style="text-align:center">
                    <div class="the-price">
                        <h1>$ <?php echo $row['Cost'];?>/Month</h1>
                    </div>
                    <table class="table" style="text-align:center">
                        <tr>
                            <td>
                                <?php echo $row['Validity'];?>&nbsp;Bids
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                                Job email alerts
                            </td>
                        </tr>
                        <tr>
                            <td>
                                More Winning Chances
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="panel-footer" style="text-align:center">
                   <?php 
													
													if($payment['Status'] != 'active' )
													{
													?> 
													
													<form action="<?php echo WebUrl; ?>payment/pay.php?PlannameP=<?php echo $row['PlanName']; ?>&PlanCode=<?php echo $row['PlanCode']; ?>" method="post">
													
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../EmailImages/stripe-logo.png"
															data-name="Pest & Mould Control"
															data-description="<?php echo $row['PlanName']; ?> <?php echo "(".$row['Cost'].")"; ?>"
															data-amount="<?php echo $row['Cost']*100; ?>">
														</script>

													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row['PlanCode'])
													{ ?>
														<center><a href="<?php echo WebUrl; ?>Plan/CanclePlan.php?CanclePlanP=Cancle" class="btn framed btn-color-default">Plan Cancel</a></center>
														<br />
														<center><span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br/>
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span></center>
											  <?php }
											  		else
													{ ?>
														
											  <?php }
											   ?>
                </div>
            </div>
        </div>
									
                        				<!--<div class="col-md-3 col-sm-3">
                            				<div class="price-box white" style="border:1px #999999 solid">							
                               					 <header><h2><?php echo $row['PlanName'];?></h2></header>
                               					 <figure><span class="price"><?php echo $row['Cost'];?>/Month</span></figure>
												<ul>
													<li><?php echo $row['Validity'];?>&nbsp;Job</li>                                    
												</ul>
												
                                					<?php 
													
													if($payment['Status'] != 'active' )
													{?> 
													
													<form action="../payment/pay.php?Planname=<?php echo $row['PlanName']; ?>&PlanCode=<?php echo $row['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../images/logo.png"
															data-name="Done and Busted"
															data-description="<?php echo $row['PlanName']; ?> <?php echo "(".$row['Cost'].")"; ?>"
															data-amount="<?php echo $row['Cost']; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row['PlanCode'])
													{ ?>
														<a href="CanclePlan.php?CanclePlan=Cancle" class="btn framed btn-color-default">Plan Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br />
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else
													{ ?>
														
											  <?php }
											   ?>
                            				</div>
                            		  </div>-->
									  
									 <?php $row1=mysql_fetch_array( mysql_query("select * from membership where PlanCode = 'Plan2a56488' ")); ?>
									  
									  <div class="col-xs-12 col-md-4">
            <div class="panel <?php if($payment['Plan']==$row1['PlanName'] && $payment['Status']=='active'){ echo 'panel-primary ';}else{ ?> panel-success <?php } ?>" style="text-align:center">
      
                <div class="panel-heading">
                    <header><h2 style="margin-bottom:10px;"><?php echo $row1['PlanName'];?></h2></header>
                </div>
                <div class="panel-body">
                    <div class="the-price">
                        <h1>$ <?php echo $row1['Cost'];?>/Month</h1>
                    </div>
                    <table class="table" style="text-align:center">
                        <tr>
                            <td>
                                <?php echo $row1['Validity'];?>&nbsp; Bids
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                               Job email alerts
                            </td>
                        </tr>
                        <tr>
                            <td>
                               More Winning Chances
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="panel-footer">
                  <?php 
													
													if($payment['Status'] != 'active' )
													{
													?> 
													
													<form action="<?php echo WebUrl; ?>payment/pay.php?PlannameP=<?php echo $row1['PlanName']; ?>&PlanCode=<?php echo $row1['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../Admin/Admin/SliderImage/stripe_logo.png"
															data-name="Pest & Mould Control"
															data-description="<?php echo $row1['PlanName']; ?> <?php echo "(".$row1['Cost'].")"; ?>"
															data-amount="<?php echo $row1['Cost']*100; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row1['PlanCode'])
													{ ?>
														<a href="<?php echo WebUrl; ?>Plan/CanclePlan.php?CanclePlanP=Cancle" class="btn framed btn-color-default">Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br/>
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else
													{ ?>
														
											  <?php }
											   ?>
                 </div>
        </div>
		</div>
									  
									  <!--<div class="col-md-3 col-sm-3">
                            				<div class="price-box white" style="border:1px #999999 solid">							
                               					 <header><h2><?php echo $row1['PlanName'];?></h2></header>
                               					 <figure><span class="price"><?php echo $row1['Cost'];?>/Month</span></figure>
												<ul>
													<li><?php echo $row1['Validity'];?>&nbsp;Job</li>                                    
												</ul>
												
                                					<?php 
													
													if($payment['Status'] != 'active' )
													{?> 
													
													<form action="../payment/pay.php?Planname=<?php echo $row1['PlanName']; ?>&PlanCode=<?php echo $row1['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../images/logo.png"
															data-name="Done and Busted"
															data-description="<?php echo $row1['PlanName']; ?> <?php echo "(".$row1['Cost'].")"; ?>"
															data-amount="<?php echo $row1['Cost']; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row1['PlanCode'])
													{ ?>
														<a href="CanclePlan.php?CanclePlan=Cancle" class="btn framed btn-color-default">Plan Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br />
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else
													{ ?>
														
											  <?php }
											   ?>
                            				</div>
                            		  </div>-->
									  
									   <?php $row3=mysql_fetch_array( mysql_query("select * from membership where PlanCode = 'Plan3j14684' ")); ?>
									   
									   <div class="col-xs-12 col-md-4">
            <div class="panel <?php if($payment['Plan']==$row3['PlanName'] && $payment['Status']=='active' ){ echo 'panel-primary ';}else{ ?> panel-success <?php } ?>" style="text-align:center">
                <div class="panel-heading">
                    <header><h2 style="margin-bottom:10px;"><?php echo $row3['PlanName'];?></h2></header>
                </div>
                <div class="panel-body" style="text-align:center">
                    <div class="the-price">
                        <h1>$ <?php echo $row3['Cost'];?>/Month</h1>
                    </div>
                    <table class="table" style="text-align:center">
                        <tr>
                            <td>
                               <?php echo $row3['Validity'];?>&nbsp; Bids
                            </td>
                        </tr>
                        <tr class="active">
                            <td>
                               Job email alerts
                            </td>
                        </tr>
                        <tr>
                            <td>
                                More Winning Chances
                            </td>
                        </tr>
                        
                    </table>
                </div>
                <div class="panel-footer">
                   <?php 
													
													if($payment['Status'] != 'active' )
													{
													?> 
													
													<form action="<?php echo WebUrl; ?>payment/pay.php?PlannameP=<?php echo $row3['PlanName']; ?>&PlanCode=<?php echo $row3['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../Admin/Admin/SliderImage/stripe_logo.png"
															data-name="Pest & Mould Control"
															data-description="<?php echo $row3['PlanName']; ?> <?php echo "(".$row3['Cost'].")"; ?>"
															data-amount="<?php echo $row3['Cost']*100; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row3['PlanCode'])
													{ ?>
														<a href="<?php echo WebUrl; ?>Plan/CanclePlan.php?CanclePlanP=Cancle" class="btn framed btn-color-default">Plan Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br/>
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else 
													{ ?>
														
											  <?php }
											   ?>
            </div>
        </div>
									   
									  <!--<div class="col-md-3 col-sm-3">
                            				<div class="price-box white" style="border:1px #999999 solid">							
                               					 <header><h2><?php echo $row3['PlanName'];?></h2></header>
                               					 <figure><span class="price"><?php echo $row3['Cost'];?>/Month</span></figure>
												<ul>
													<li><?php echo $row3['Validity'];?>&nbsp;Job</li>                                    
												</ul>
												
                                					<?php 
													
													if($payment['Status'] != 'active' )
													{
													?> 
													
													<form action="<?php echo WebUrl; ?>payment/pay.php?PlannameP=<?php echo $row3['PlanName']; ?>&PlanCode=<?php echo $row3['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../images/logo.png"
															data-name="Done and Busted"
															data-description="<?php echo $row3['PlanName']; ?> <?php echo "(".$row3['Cost'].")"; ?>"
															data-amount="<?php echo $row3['Cost']; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row3['PlanCode'])
													{ ?>
														<a href="<?php echo WebUrl; ?>Plan/CanclePlan.php?CanclePlanP=Cancle" class="btn framed btn-color-default">Plan Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span>
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else 
													{ ?>
														
											  <?php }
											   ?>
                            				</div>
                            		  </div>-->
											
										</div>
									  <!--<div class="col-md-3 col-sm-3">
                            				<div class="price-box white" style="border:1px #999999 solid">							
                               					 <header><h2><?php echo $row3['PlanName'];?></h2></header>
                               					 <figure><span class="price"><?php echo $row3['Cost'];?>/Month</span></figure>
												<ul>
													<li><?php echo $row3['Validity'];?>&nbsp;Job</li>                                    
												</ul>
												
                                					<?php 
													
													if($payment['Status'] != 'active' )
													{?> 
													
													<form action="../payment/pay.php?Planname=<?php echo $row3['PlanName']; ?>&PlanCode=<?php echo $row3['PlanCode']; ?>" method="post">
														<script
															src="https://checkout.stripe.com/checkout.js" class="stripe-button"
															data-key="<?php echo $stripe['publishable_key']; ?>"
															data-image="../images/logo.png"
															data-name="Done and Busted"
															data-description="<?php echo $row3['PlanName']; ?> <?php echo "(".$row3['Cost'].")"; ?>"
															data-amount="<?php echo $row3['Cost']; ?>">
														</script>
													</form>
													
											 <?php  }
											 		else if($payment['Status'] == 'active' && $payment['PlanId'] == $row3['PlanCode'])
													{ ?>
														<a href="CanclePlan.php?CanclePlan=Cancle" class="btn framed btn-color-default">Plan Cancel</a>
														<br /><br />
														<span style="color:#666666">Start Date:&nbsp;<?php echo $payment['PayDate']; ?></span><br />
														<span style="color:#666666"> End Date:&nbsp;<?php echo $payment['NextPayDate']; ?> </span>
											  <?php }
											  		else 
													{ ?>
														
											  <?php }
											   ?>
                            				</div>
                            		  </div>-->										
	  					
						<div class="clearfix"></div>
						<div class="col-md-6"><br /><br />
							<font style="font-size:24px; font-weight:bold;">Why should I take membership plans?</font>
							<p>Applying on various jobs is not free and taking plans allows you to bid on more and more number of jobs.</p>
							
							<br /><br />
							<font style="font-size:24px; font-weight:bold;">Unsure which plan is best for you?</font>
							<p>Contact us at <a href="" style="color:#0dcdbd">info@pestmouldcontrol.com</a></p>
							
							
					  </div>
					  <div class="col-md-6"><br /><br />
					  		<font style="font-size:24px; font-weight:bold;">Can I change plans</font>
							<p>Of course! You can cancel current plan and upgrade your membership plan at anytime to get additional benefits immediately.</p>
					  </div>
							 	
                      </div>
					  
					  <div class="col-md-1"></div>
					  
					  
					  
                    </div>
					
                  </div>
                </section>
				
				</div>
                  </div>
				  
				  
           
       <style>
.HowText{  margin-top: 16px;color: #FFF;font-weight: bold;  font-size: 18px;}
</style>    
       
        <?php include "../MyInclude/Footer.php";?>

<?php
}else{
	echo	'<meta http-equiv="refresh" content="0; url=../Signin/SignIn.php">';}
?>
</body>
</html>