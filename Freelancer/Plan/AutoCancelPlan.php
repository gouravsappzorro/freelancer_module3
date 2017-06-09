<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php require_once('../payment/config.php'); ?>

<?php

	$Token = mysql_query("select * from payment where Status = 'active' ");
	
	$current_date=date('Y-m-d');
	while($row_token=mysql_fetch_array($Token))
	{
		if($current_date>$row_token['NextPayDate'])
		{
			echo $row_token['CustomerId'].'<br>';
			$plan = Stripe_Customer::retrieve($row_token['CustomerId']);								
			$plan->delete();

			$calncelplan=mysql_query("update  payment SET Status = 'Disable' where Status = 'active'");
			mysql_query("delete from bid_info where uid='".$row_token['user_id']."'");
			
		}		
	}
?>