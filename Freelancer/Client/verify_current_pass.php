<?php
	include('../Admin/MyInclude/MyConfig.php');
	if($_POST['current_pass'])
	{
		//echo $sql="select email from register where email='".$_POST['email']."'"	;
		$res=mysql_query("select password from register where unique_code='".$_SESSION['id']."'");
		$row=mysql_fetch_array($res);
	
		if($row['password']!=$_POST['pass'])
		{
			echo '1';			
			
		}
		else
		{
			echo '0';
		}
	}
?>
