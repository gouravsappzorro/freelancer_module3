<?php
	include('../Admin/MyInclude/MyConfig.php');
	if($_POST['email'])
	{
		//echo $sql="select email from register where email='".$_POST['email']."'"	;
		$res=mysql_query("select email from register where email='".$_POST['email']."' and status='active'");
		$cnt=mysql_num_rows($res);
		if($cnt<=0)
		{
			echo '1';			
			
		}
		else
		{
			echo '0';
		}
	}
?>