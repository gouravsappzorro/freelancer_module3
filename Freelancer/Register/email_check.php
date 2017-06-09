<?php
	include('../Admin/MyInclude/MyConfig.php');
			
	if($_POST['email'] && $_POST['terms'])
	{
		//$sql="select * from register where email='".$_POST['email']."' and hire='".$_POST['terms']."'";
		$res=mysql_query("select * from register where email='".$_POST['email']."' and hire='".$_POST['terms']."' and status='active'");
		$cnt=mysql_num_rows($res);
		//$row=mysql_fetch_array($res);
		//echo $_POST['terms'];
		//echo $row['terms'];
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