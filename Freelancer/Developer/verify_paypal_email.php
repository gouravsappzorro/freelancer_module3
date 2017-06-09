<?php include('../Admin/MyInclude/MyConfig.php');?>

<?php
if(isset($_POST['email']))
{
	$sql=mysql_query("select paypal_Account from register where paypal_Account='$_POST[email]'");
	$cnt=mysql_num_rows($sql);
	
	if($cnt>0)
	{
		echo '1';
	}
	else
	{
		echo '0';
	}
}

?>