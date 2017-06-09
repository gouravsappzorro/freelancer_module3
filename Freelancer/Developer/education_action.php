<?php 
	include "../Admin/MyInclude/MyConfig.php";
	if(isset($_REQUEST['save_education']))
	{
		
			$res=mysql_query("select * from education where uid='".$_SESSION['id']."'");
			$count=mysql_num_rows($res);
			if($count==0)
			{
			
				$insert="insert into education values(null,
													'".$_SESSION['id']."',
													'".implode(",", $_REQUEST['degree'])."',
													'".implode(",", $_REQUEST['country'])."',
													'".implode(",", $_REQUEST['university'])."',
													'".implode(",", $_REQUEST['startyear'])."',
													'".implode(",", $_REQUEST['endyear'])."')";
				$res1=mysql_query($insert);
				if($res1)
				{
					$_SESSION['success']="Education Detail succesfully saved";
?>
					
					 <script type="text/javascript">
                    		window.location.href="my-education.php";
                	</script>
				
<?php
				}
				else
				{
					$_SESSION['error']="Failed,Please Try again";
?>
					<script type="text/javascript">
                    		window.location.href="my-education.php";
                	</script>

<?php
				}
			}
			else
			{
											  
				$update="update education set education='".implode(",", $_REQUEST['degree'])."',
											  country='".implode(",", $_REQUEST['country'])."',
											  univercity='".implode(",", $_REQUEST['university'])."',
											  start_year='".implode(",", $_REQUEST['startyear'])."',
											  end_year='".implode(",", $_REQUEST['endyear'])."' where uid='".$_SESSION['id']."'";
				$res2=mysql_query($update);
				if($res2)
				{
					$_SESSION['success']="Education Detail succesfully saved";
?>
					<script type="text/javascript">
                    		window.location.href="my-education.php";
                	</script>
<?php				
				}
				else
				{
					$_SESSION['error']="Failed,Please Try again";
?>
					<script type="text/javascript">
                    		window.location.href="my-education.php";
                	</script>

<?php				}
			}
		
	}
?>