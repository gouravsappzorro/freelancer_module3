<?php 
	include "../Admin/MyInclude/MyConfig.php";
	if(isset($_REQUEST['save_experience']))
	{
		//if(isset($_SESSION['id']))
		//{
			$res=mysql_query("select * from experience where uid='".$_SESSION['id']."'");
			$count=mysql_num_rows($res);
			if($count==0)
			{
				$insert="insert into experience values(null,
													'".$_SESSION['id']."',
													'".implode(",", $_REQUEST['title'])."',
													'".implode(",", $_REQUEST['company'])."',
													'',
													'".mysql_real_escape_string(implode(",", $_REQUEST['summary']))."')";
				$res1=mysql_query($insert);
				if($res1)
				{
				
					$_SESSION['success']="Experience Detail succesfully saved";
?>
					
					<script type="text/javascript">
                    		window.location.href="my-experience.php";
                	</script>

<?php				
				}
				else
				{
					$_SESSION['error']="Failed,Please Try again";
?>
					<script type="text/javascript">
                    		window.location.href="my-experience.php";
                	</script>

<?php				}
			}
			else
			{
				
				$update="update experience set title='".implode(",", $_REQUEST['title'])."',
											   company='".implode(",", $_REQUEST['company'])."',
											   experience='',
											   summary='".mysql_real_escape_string(implode(",", $_REQUEST['summary']))."' where uid='".$_SESSION['id']."'";
				$res2=mysql_query($update);
				if($res2)
				{
				
					$_SESSION['success']="Experience Detail succesfully saved";
?>
					
					<script type="text/javascript">
                    		window.location.href="my-experience.php";
                	</script>
<?php				
				}
				else
				{
					$_SESSION['error']="Failed,Please Try again";
?>
					<script type="text/javascript">
                    		window.location.href="my-experience.php";
                	</script>

<?php				}
				
			}
		//}
		//else
		//{
			//$_SESSION['msg']="Please Login First";
		//	header('location:add_experience.php');
		//}
	}
?>