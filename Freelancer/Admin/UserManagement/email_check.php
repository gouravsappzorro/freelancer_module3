<?php
	include "../MyInclude/MyConfig.php";
	
	extract($_POST);		
	
	if(isset($email) and $work=='Hire')
	{
		//$sql="select * from register where email='".$_POST['email']."' and hire='".$_POST['terms']."'";
		if(isset($id))
		{
			$res=mysql_query("select * from register where email='".$email."' and hire='".$work."' and unique_code!='".$id."' and status='active'");
			$cnt=mysql_num_rows($res);
			//$row=mysql_fetch_array($res);
			//echo $_POST['terms'];
			//echo $row['terms'];
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
		//$row=mysql_fetch_array($res);
		//echo $_POST['terms'];
		//echo $row['terms'];
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