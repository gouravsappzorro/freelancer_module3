<?php

include "../Admin/MyInclude/MyConfig.php";


 if(isset($_POST['submit']))
 {
 	
	//$portfolio_pic =  $_FILES["portfolio_pic"]["name"];
	//$target_dir = "portfolio pic/";
	//$target_file = $target_dir . basename($_FILES["portfolio_pic"]["name"]);
	//$skill=implode(',',$_REQUEST['skill']);
	//$skill=array();
	//$skill1=$_REQUEST['skill'];
	//foreach($skill1 as $value1)
	//{
		//$skill=$value1;
	//}
	 //move_uploaded_file($_FILES["portfolio_pic"]["tmp_name"], $target_file);
	// if(isset($_SESSION['id']))
	 //{
	 //$res=mysql_query("SELECT * FROM `portfolio` where uid=".$_SESSION['id']."");
	 //$count=mysql_num_rows($res);
	 //if($count==0)
	 //{
	 	$skill=implode(',',$_REQUEST['skills']);
		move_uploaded_file($_FILES["file"]["tmp_name"],"../Portfolio/".$_FILES["file"]["name"]);
		
		$sql="insert into portfolio values(null,'".$_SESSION['id']."','".$_FILES['file']['name']."','".mysql_real_escape_string($_REQUEST['title'])."','".$_POST['url']."','".$skill."')";
	 //}
		$res=mysql_query($sql);
		if($res)
				{
				
					$_SESSION['success']="Portfolio Detail succesfully saved";
?>
					
					<script type="text/javascript">
                    	window.location.href="my-portfolio.php";
                	</script>

<?php				
				}
				else
				{
					$_SESSION['error']="Failed,Please Try again";
?>
					<script type="text/javascript">
                    	window.location.href="my-portfolio.php";
                	</script>

<?php				}
	//}
	
	
 }
?>