<?php
session_start();
	include "../Admin/MyInclude/MyConfig.php";
	if(isset($_REQUEST['signin']))
	{
		//echo"SELECT * FROM register WHERE (username='".$_POST['username']."' AND password='".$_POST['password']."') AND status='active'";
		 $res=mysql_query("SELECT * FROM register WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'");
		 $row=mysql_fetch_array($res);
		 $cnt=mysql_num_rows($res);
		 
		 //if($cnt!=0)
		 //{
		if($row['username']==$_REQUEST['username'] && $row['password']==$_REQUEST['password'])
		{
			
				$_SESSION['id']=$row['unique_code'];
				$_SESSION['user']=$row['hire'];
				if(isset($_GET['p_id']))
				{
					header("location:../bidding.php?project_id=$_GET[p_id]");
				}
				else
				{
					if($_SESSION['user']=='Work')
					{
				 		header("location:../Developer/dashboard.php");
					}
					else
				 	{
						header("location:../Client/dashboard.php");
						header("location:../Client/post-project.php");
					}
				}
	    }			

		else
		{
			$_SESSION['msg']="User Name Or Password Is Wrong";
		?>					
                                              
 			<script type="text/javascript">
             	 window.location.href="login.php";
            </script>
	<?php	

		}
	}
	?>
