<?php
session_start();
?>
<?php
include('../Admin/MyInclude/MyConfig.php'); 
//$_SESSION['msg']="Please Login First...!";
if(isset($_SESSION['id']))
{
	$sql="select password from register where unique_code='".$_SESSION['id']."'";
	$res=mysql_query($sql);
	$row=mysql_fetch_array($res);
	//~ echo"<pre>";print_r($row);"</pre>";
	//~ die;
	
	//echo $_REQUEST['current_pass'];
	//echo $row['password'];
	if($row['password']==$_REQUEST['current_pass'])
	{
		$update="update register set password='".$_REQUEST['new_pass']."' where unique_code='".$_SESSION['id']."'";
		$update_res=mysql_query($update);
		if($update_res)
		{
			$_SESSION['success']="Password Change Successfully";
?>
			
			 <script type="text/javascript">
                    window.location.href="change-password.php";
                </script>
<?php
		}
		else
		{
			$_SESSION['error']="Update Failed,please Try Again";
?>
			
			<script type="text/javascript">
                    window.location.href="change-password.php";
                </script>

<?php
		}
	}
	else
	{
			$_SESSION['error']="Current password Not Matched With Old Password";
?>
			
			<script type="text/javascript">
                    window.location.href="change-password.php";
                </script>
<?php
	}
}
else
{
			$_SESSION['error']="Please Login First";
?>
			<script type="text/javascript">
                    window.location.href="change-password.php";
                </script>
<?php
}
?>
