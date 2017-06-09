<?php
	include('../MyInclude/MyConfig.php');
	
	extract($_POST);
	
	if(isset($id))
	{
		//echo $sql="select username from register where username='".$_POST['username']."'"	;
		$res=mysql_query("select username from register where username='".$_POST['userid']."' and unique_code!='".$id."' and status='active'");
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
	else
	{
		$res=mysql_query("select username from register where username='".$_POST['userid']."' and status='active'");
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