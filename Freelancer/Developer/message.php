<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']!='Work') {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="../Login/login.php";
     </script>
<?php
  	
    exit; 
	
}
?>

<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php //include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>

</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?>

<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                 	<div class="titlebar-heading">
                        <h1 style="font-size:24px; line-height:30px;">Messages</h1>
                        <div class="hr hr-border-primary double-border border-small">
                        	<span></span>
                    	</div>
                    </div>
                    <div id="breadcrumbs">
                    	<span class="breadcrumb-title"></span>
                	</div>
            	</div>
        	</div>
    	</div>
	</div>
</section>
    
<section class="section" style="padding-top:50px; padding-bottom:30px;">
    <div class="container">
        <div class="row-fluid">
			<div class="span12">
				<ul class="product_list_widget">
                <?php
				$message=mysql_query("select DISTINCT project_id from message where developer_id='".$_SESSION['id']."'");
				$cnt=mysql_num_rows($message);
				if($cnt>0)
				{
					while($row_message=mysql_fetch_array($message))
					{
						//fetch project Details
						$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$row_message['project_id']."'"));
						
						//Fetch client details
						$client_details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$project['uid']."'"));
						
						//Fetch Developer Details
						$developer_details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
						//message notification
						$unread_message=mysql_num_rows(mysql_query("select * from message where ReadStatus='1' and Sender_Id!='".$_SESSION['id']."' and developer_id='".$_SESSION['id']."' and project_id='".$project['project_id']."'"));
						
						?>
						<li>
							<a href="" title="<?php echo $client_details['first_name'].' '.$client_details['last_name'];?>">
							<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $client_details['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
							</a>
							
							<a href="<?php echo WebUrl;?>Developer/DeveloperMessage.php?project_id=<?php echo $project['project_id'];?>&var=1">
								<?php echo $project['title'];?>
							</a>
                            <?php
                            if($unread_message>0)
							{
								echo '<i class="fa fa-envelope" aria-hidden="true" style="color:#F30"> '. $unread_message.'</i>';
							}
							?>

						</li>
						
						<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
							<span></span>
						</div>
						<?php
					}
				}
				else
				{
					echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
            <strong>Alert!</strong> You have No any Messages yet!
            </div>";
				}
				?>
                </ul>
			</div>
		</div>
	</div>
</section>

<?php include "../include/footer.php"; ?>
</body>
</html>
