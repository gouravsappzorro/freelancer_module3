<?php 
session_start();
?>
<?php
include('../Admin/MyInclude/MyConfig.php'); 
if(isset($_REQUEST['post_project']))
{
	$image=$_FILES['file']['name'];
	$target_dir ="../Projects/";
	$target_file =$target_dir . basename($_FILES["file"]["name"]);
	
	$cate_res=mysql_query("SELECT * FROM `admin_category` WHERE Id='".$_REQUEST['category']."'");
	$cate=mysql_fetch_array($cate_res);
	$category=$cate['CategoryName'];
	$sub_cate="";
	$competible=implode(',',$_REQUEST['competible']);
	$skills=implode(',',$_REQUEST['skills']);
	$sub_cate='';
	if(isset($_REQUEST['subcategory']) && !empty($_REQUEST['subcategory']))
	{
		$sub_cate=implode(',', $_REQUEST['subcategory']);
	}
	$location=implode(",", $_REQUEST['location']);
	//~ echo"<pre>";print_r($location);"</pre>";
	//~ die;
	$location_type=$_POST['location_type'];          //Added location_type(1-Everyone|2-Geo-Based) in a database.
	$project_id=mt_rand(100000,999999);
	
	$bid_end_date=date('Y-m-d', strtotime('+2 months'));
	
	$sql="insert into post_projects(`id`,`project_id`,`uid`,`category_of _work`,`sub_category_of _work`,`title`,`skills`,`description`,`image`,`accept_offers`,`competible`,`location`,`location_type`,`experience`,`type_of_project`,`currency`,`budget`,`help`,`post_date`,`bid_end_date`,`status`,`isSuspend`) values
	                                            (null,
	                                            '".$project_id."',
												'".$_SESSION['id']."',
												'".$category."',
												'".$sub_cate."',
												'".mysql_real_escape_string($_REQUEST['title'])."',
												'".mysql_real_escape_string($skills)."',
												'".mysql_real_escape_string($_REQUEST['description'])."',
												'".mysql_real_escape_string($image)."',
												'".$_REQUEST['accept_offers']."',
												'".$competible."',
												'".mysql_real_escape_string($location)."',
												'".$location_type."',
												'".$_REQUEST['exp']."',
												'".$_REQUEST['project_type']."',
												'".$_REQUEST['currency']."',
												'".$_REQUEST['budget']."',
												'".mysql_real_escape_string($_REQUEST['improve'])."',
												CURDATE(),
												'".$bid_end_date."',
												'pending',
												'No'
												)";
	$res=mysql_query($sql);
	
	if($res)
	{	
		$mul_countries=explode(",",$location);
		$countries_count=count($mul_countries);
		for($i=0;$i<$countries_count;$i++)
		{
			$sql1="insert into projects_location(`project_id`,`location_name`) values 
											   ('".$project_id."','".$mul_countries[$i]."')";
											   
			$res1=mysql_query($sql1);
		}
		move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
		$_SESSION['success']="Your project is posted successfully";
	}
?>
		
		 <script type="text/javascript">
              window.location.href="../browse_detail_client.php?project_id=<?php echo $project_id; ?>";
         </script>
        
<?php
	}else
	{
		$_SESSION['error']="Database Error";
?>
		<script type="text/javascript">
              window.location.href="post-project.php";
         </script>


<?php
	}
	
	//SELECT * FROM `post_projects` where location_type=1 UNION select * 
	//from `post_projects` where project_id IN(SELECT project_id FROM `projects_location` where location_name='IND')

?>
