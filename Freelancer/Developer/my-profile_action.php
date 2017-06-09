<?php
session_start();
?>
<?php
include "../Admin/MyInclude/MyConfig.php";
if(isset($_REQUEST['my-profile']))
{
	$experience=$_REQUEST['experience'];
	$fname=$_REQUEST['fname'];
	$lname=$_REQUEST['lname'];
	$company=$_REQUEST['company'];
	$country=implode(",", $_REQUEST['country']);
	$city=implode(",", $_POST['city']);
	// $data="select * from location where Code='".$_REQUEST['country']."'";
	// $res1=mysql_query($data);
	// $row=mysql_fetch_array($res1);
	
	$profile =  $_FILES["profile_pic"]["name"];
	if($profile==""):
		$profile =  $_REQUEST['image_path'];
	endif;
	$target_dir ="../Profile Picture/";
	$target_file =$target_dir . basename($_FILES["profile_pic"]["name"]);
    move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $target_file);
    $skill=implode(',',$_REQUEST['skills']);
	$description=$_REQUEST['description'];
	$company_serial_num=$_REQUEST['company_serial_num'];
	$company_type=$_REQUEST['type'];
	$sql="update register set Experience='".$_POST['experience']."',
	                          first_name='".$fname."',
	                          last_name='".$lname."',
	                          company='".$_REQUEST['company']."',
	                          country='".$country."',
							  city='".$city."',
							  profile_picture='".$profile."',
							  profile_title='".$_REQUEST['profile_title']."',
							  skills='".$skill."',
							  description='".mysql_real_escape_string($_REQUEST['shortdescr'])."',
							  company_serial_num='".$_REQUEST['serial_number']."',
							  company_type='".$_REQUEST['type']."'
	                          where unique_code='".$_SESSION['id']."'";
	$res=mysql_query($sql);
	//~ echo"<pre>";print_r($res);"</pre>";
	//~ die;
	if($res)
	{
		//if($res1)
		//{
		$_SESSION['success']="Data Saved Successfully...";
		
		if(isset($_REQUEST['project_id']))
		{
		?>
		<script type="text/javascript">
		var project_id='<?php echo $_GET['project_id'];?>';
			window.location.href="my-profile.php?project_id="+project_id+"#skills";
		</script>
		<?php
		}
		else
		{
		?>
		<script type="text/javascript">
			window.location.href="my-profile.php";
		</script>
		
		<?php
		}
	}
}
?>
