<?php
	include "../MyInclude/MyConfig.php";
	
	extract($_POST);		
	
	if(isset($email) and $work=='Work')
	{
		if(isset($id))
		{
			$res=mysql_query("select * from register where email='".$email."' and hire='".$work."' and id!='".$id."' and status='active'");
			$cnt=mysql_num_rows($res);
			if($cnt>0)
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
			$res=mysql_query("select * from register where email='".$email."' and hire='".$work."' and status='active'");
			$cnt=mysql_num_rows($res);
			if($cnt>0)
			{
				echo '1';	
			}
			else
			{
				echo '0';
			}
		}
		
	}
?>