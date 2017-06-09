<?php
include "../Admin/MyInclude/MyConfig.php";
if(isset($_REQUEST['my-profile']))
{
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$city=$_REQUEST['city'];

	$data="select * from location where Code='".$_REQUEST['country']."'";
	$res1=mysql_query($data);
	$row=mysql_fetch_array($res1);
	$country=$row['Code'];
	
	$profile =  $_FILES["profile_pic"]["name"];
	
	if($profile==""):
		$profile =  $_REQUEST['image_path'];
	endif;
	
	$target_dir ="../Profile Picture/";
	$target_file =$target_dir . basename($_FILES["profile_pic"]["name"]);
	
	move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
	
	$sql="update register set first_name='".$fname."',
							  last_name='".$lname."',
							  country='".$country."',
							  city='".$city."',
							  profile_picture='".$profile."'
							  where unique_code='".$_SESSION['id']."'";
	$res=mysql_query($sql);
	
	if($res)
	{
		//if($res1)
		//{
			$_SESSION['success']="Data Saved Successfully...";
?>
			
			 <script type="text/javascript">
                   window.location.href="my-profile.php";
              </script>

<?php
		//}
	}
	else
	{
		$_SESSION['error']="Something Wrong, please Try Again";
?>
			
			 <script type="text/javascript">
                   window.location.href="my-profile.php";
              </script>

<?php
		//}
	}
}
?>