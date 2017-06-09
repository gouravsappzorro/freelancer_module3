<?php
session_start();

?>
<?php //include "../MyInclude/Db_Conn.php"; ?>
<?php //include "../MyInclude/MyConfig.php"; ?>
<?php include('../Admin/MyInclude/MyConfig.php'); ?>

<?php

	/*session_start();
	if(isset($_SESSION['UEmail']) && isset($_SESSION['Code']))
	{
		$Email 	= $_SESSION['UEmail'];
		$Code   = $_SESSION['Code'];
		
		$selectuser  = mysql_query("SELECT * FROM trademandetail where Email = '".$Email."' and Code = '".$Code."' ");
		
		$userrow  = mysql_fetch_array($selectuser);
		$Email     = $userrow['Email'];
	}
	else
	{
		echo	'<meta http-equiv="refresh" content="0; url=../Signin/SignIn.php">';
	}*/
	$uid=$_SESSION['id'];
	$res=mysql_query("select * from register where unique_code='".$uid."'");
	$row=mysql_fetch_array($res);
	$email=$row['email'];
	$name	=	$row['first_name'];
	if(isset($_GET['PlanCode']) && isset($_GET['Planname']) || isset($_GET['PlannameP']))
	{
		
			$plan = $_GET['PlanCode'];
			
			$query2 = mysql_query("SELECT * FROM admin_membership_plan where code = '".$plan."' ");
			$row2   = mysql_fetch_array($query2);
						
			$plannew   = $row2['plan_name'];
			$amount    = $row2['price'];
			$cur_plan  = $row2['code'];
			$days	   = $row2['duration'];	
	
			$total_money = $amount;

			require_once('config.php');

			$token  = $_POST['stripeToken'];
		
			$customer = Stripe_Customer::create(array(
			'email' => $email,
			'plan' => $cur_plan,
			'card'  => $token			
			));
		
			 $customer_id = $customer->id;
			 $subscriptions_id = $customer->subscriptions->data[0]->id;
		
		
			$status		   =  Stripe_Customer::retrieve($customer_id);		
			$subscription  =  $status->subscriptions->retrieve($subscriptions_id);
			$paymentstatus =  $subscription->status;
		
			if( $paymentstatus == 'active' )
			{		
					
				
					$paydate 	  = date("Y-m-d");
					$nextmonth    = strtotime("+1 Months");
					$nextpaydate  = date("Y-m-d", $nextmonth);
					$ReceiptNo    = rand(100000, 999999);
					$card		  =	'MC';
					
					$CheckUser	  =	mysql_num_rows( mysql_query("select * from payment where Email = '".$email."'" ));
					
					//$bid_res=mysql_query("select * from bid_info where uid = '".$uid."'" );
					//$bid_row=mysql_fetch_array($bid_res);
					//$bids	  =	mysql_num_rows($bid_res);
			
					if( $CheckUser > 0)
					{
		
		
						$query = mysql_query("insert into payment SET
									ReceiptNo		= '".$ReceiptNo."',	 
									Plan			= '".$plannew."',
									Token 			= '".$_POST['stripeToken']."',
									CustomerId		= '".$customer_id."',
									SubscriptionId	= '".$subscriptions_id."',
									PlanId			= '".$cur_plan."',
									Amount			= '".$total_money."',
									Status			= 'active',
									PayDate			= '".$paydate."',
									NextPayDate		= '".$nextpaydate."',
									Bid				= '".$row2['bids']."',	
								    Email 			= '".$email."',
									user_id			= '".$uid."'
									
									");
		
						
						/*$query = mysql_query("UPDATE payment SET 
									ReceiptNo		= '".$ReceiptNo."',	
									Plan			= '".$plannew."',
									Token 			= '".$_POST['stripeToken']."',
									CustomerId		= '".$customer_id."',
									SubscriptionId	= '".$subscriptions_id."',
									PlanId			= '".$cur_plan."',
									Amount			= '".$total_money."',
									Status			= '".$paymentstatus."',
									PayDate			= '".$paydate."',
									Bid				= '".$row2['Validity']."',
									NextPayDate		= '".$nextpaydate."'
								where Email = '".$Email."' && Code = '".$Code."' ");*/
						
				  }
				  else
				  {
				  			
						$query = mysql_query("insert into payment SET
									ReceiptNo		= '".$ReceiptNo."',	 
									Plan			= '".$plannew."',
									Token 			= '".$_POST['stripeToken']."',
									CustomerId		= '".$customer_id."',
									SubscriptionId	= '".$subscriptions_id."',
									PlanId			= '".$cur_plan."',
									Amount			= '".$total_money."',
									Status			= 'active',
									PayDate			= '".$paydate."',
									NextPayDate		= '".$nextpaydate."',
									Bid				= '".$row2['bids']."',	
								    Email 			= '".$email."',
									user_id			= '".$uid."'
									
									");
									
									
				 }
				 
				 /*if($bids>0)
				 {
					 //$bid=$bid_row['Bid']+$bid_row['Bid'];
					 $update=mysql_query("update bid_info SET
									
									PlanId			= '".$cur_plan."',
									Amount			= '".$total_money."',
									Status			= 'active',
									PayDate			= '".$paydate."',
									NextPayDate		= '".$nextpaydate."',
									Bid				= '".$row2['bids']."',	
								    Email 			= '".$email."',
									uid			= '".$uid."'
									
									");
				 }
				 else
				 {*/
					
					//$update=mysql_query("update bid_info SET Status='deactive' where uid='".$uid."'"); 
					$delete=mysql_query("delete from bid_info where uid='$uid'");
					
					/*  for remain bid */
					
					//$sql=mysql_query("select * from bid_info where uid='".$uid."' and Status='deactive' order by id desc");
					//$row_bid=mysql_fetch_array($sql);
					
					//$final_bids=$row_bid['Bid']+$row2['bids'];
					
					/*  end  */
					$insert=mysql_query("insert into bid_info SET
									
									PlanId			= '".$cur_plan."',
									Amount			= '".$total_money."',
									Status			= 'active',
									PayDate			= '".$paydate."',
									NextPayDate		= '".$nextpaydate."',
									Bid				= '".$row2['bids']."',	
								    Email 			= '".$email."',
									uid			= '".$uid."'
									
									");
				 //}
			
					/*$query3 = mysql_query("UPDATE trademandetail SET PlanName='$plannew' where Email= '".$email."'");			
			
				if($query && $query3)
				{
					
					$_SESSION['plan'] = 'Success';
					$user	=	mysql_fetch_array( mysql_query("select * from trademandetail where Email= '".$Email."' and Code = '".$Code."' ") );
					$name	=	$user['FullName'];
					$name	=	$user['FullName'];*/
					$_SESSION['plan'] = 'Success';
					
					include('../Plan/invoice.php');
					
					if(isset($_GET['PlannameP']))
					{
						//~ echo	'<meta http-equiv="refresh" content="0; url=../membership-plans.php">';
					}
					if(isset($_GET['Planname']))	
					{
						//echo	'<meta http-equiv="refresh" content="0; url=../Plan/Pricing.php">';
							
					}
				//}
				//else
				//{
					//echo "not working";
				//}			
		 }	
		else
		{
			echo "not ok";
			$_SESSION['plan'] = 'Failure';
		}
	}
	else
	{
		echo	'<meta http-equiv="refresh" content="0; url=../Signin/SignIn.php">';
	}

?>
