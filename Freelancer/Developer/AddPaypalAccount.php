<?php include('../Admin/MyInclude/MyConfig.php');?>
<?php
if(isset($_POST['add_paypal']))
{
	$account=trim($_POST['paypalEmail']);
	
	$sql1=mysql_query("select paypal_Account from register where paypal_Account='$account'");
	$cnt=mysql_num_rows($sql1);
	
	/*if($cnt>0)
	{
		$_SESSION['error']="This account is already exist";
		?>
        <script>
			window.location.href='my-paypal.php';
		</script>
        <?php
	}
	else
	{*/
		$update=mysql_query("update register set paypal_Account='$account' where unique_code='".$_SESSION['id']."'");
		
		$_SESSION['success']="Account succesfully saved";
		
		if($update)
		{
		?>
        <script>
			window.location.href='my-paypal.php';
		</script>
        <?php
		}
		else
		{
			$_SESSION['error']="Failed,Please Try again";
		}
	//}
}
?>