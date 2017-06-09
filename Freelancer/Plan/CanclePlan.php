<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php require_once('../payment/config.php'); ?>

<?php
/*	echo $_SESSION['id'];
	die;*/
	if(isset($_GET['CanclePlan'])  && $_GET['CanclePlan'] == 'Cancle' || isset($_GET['CanclePlanP'])  && $_GET['CanclePlanP'] == 'Cancle' )
	{
		$Token = mysql_fetch_array(mysql_query("select * from payment where user_id = '".$_SESSION['id']."' and Status = 'active' "));
							
		// $plan = Stripe_Customer::retrieve($Token['CustomerId']);								
		// $plan->delete();
								
		$calncelplan=mysql_query("update  payment SET Status = 'Disable' where user_id = '".$_SESSION['id']."' and Status = 'active'");	
						   
		if($calncelplan)
		{
			$_SESSION['CanclePlan'] = 'Cancle';
			
			mysql_query("delete from bid_info where uid='".$_SESSION['id']."'");
			
			//if(isset($_GET['CanclePlan']))
			//{
				//mysql_query("delete from bid_count where Trademan_Id='".$_SESSION['Code']."'");
	 			//echo	'<meta http-equiv="refresh" content="0; url=Pricing.php">';									   
			//}
			
			if(isset($_GET['CanclePlanP']))
			{
				echo	'<meta http-equiv="refresh" content="0; url=../membership-plans.php">';
			}	
			
			//mysql_query("delete from bid_count where Trademan_Id='".$_SESSION['Code']."'");
		}
		else
		{
			echo 'not';
			echo mysql_error($calncelplan);
		}
	}else{
			echo "wrong";
		}
?>
</body>
</html>