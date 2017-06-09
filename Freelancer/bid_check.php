<?php
session_start();
?>
<?php
include('Admin/MyInclude/MyConfig.php');
		$check_bid_res=mysql_query("select * from bid_info where uid='".$_SESSION['id']."' and Status='active'");
		$check_bids=mysql_fetch_array($check_bid_res); 
		
		if($_SESSION['id']=='')
		{
			$err="Please Loin or signup First, then bid on project";
			
		echo"<div class='span12'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<strong></strong> ".$err."
		</div></div>";
		$err="";
		}
		else if(!$check_bids['Bid']>0)
		{
		
		$err="You have no available bids,please upgrade your membership plan. <a href='".WebUrl."membership-plans.php'>Click Here !</a>";
		
		echo"<div class='span12'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<strong></strong> ".$err."
		</div></div>";
		$err="";
		}
		
			
?>
