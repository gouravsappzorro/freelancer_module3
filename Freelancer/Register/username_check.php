<?php
	include('../Admin/MyInclude/MyConfig.php');
	if($_POST['username'])
	{
		//echo $sql="select username from register where username='".$_POST['username']."'"	;
		$res=mysql_query("select username from register where username='".$_POST['username']."' and status='active'");
		$cnt=mysql_num_rows($res);
		
		if($cnt==1)
		{
			echo '1';			
			
		}
		else
		{
			echo '0';
		}
	}
?>