<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']!='Hire') {
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
    </div>
</section>
    
<section class="section" style="padding-top:50px; padding-bottom:30px;">
    <div class="container">
        <div class="row-fluid">
           <div class="row-fluid">
				<div class="span12">
					 <ul class="product_list_widget">
                <?php
				$projects=mysql_query("select distinct u.project_id,p.title from post_projects as p,user_bids as u where p.uid='".$_SESSION['id']."' and p.project_id=u.project_id");
				
				$cnt=mysql_num_rows($projects);
				if($cnt>0)
				{
					while($row_projects=mysql_fetch_array($projects))
					{
								
						//Fetch Client Details
						$client_details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$_SESSION['id']."'"));
						
						$user_bid=mysql_query("select * from user_bids where project_id='".$row_projects['project_id']."'");
						
						?>
						<li>
							<a href="" title="<?php echo $client_details['first_name'].' '.$client_details['last_name'];?>">
							<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $client_details['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
							</a>
							
							<a href="">
								<strong><?php echo $row_projects['title'];?></strong>
							</a>
							<div style="margin-left:80px">
							<ul>
							<?php 
							while($row_userbid=mysql_fetch_array($user_bid))
							{
								//fetch Developer Details
								$developer_details=mysql_fetch_array(mysql_query("select * from register where unique_code='".$row_userbid['uid']."'"));
								
								//fetch Unread message notification
								$unread_message=mysql_num_rows(mysql_query("select * from message where ReadStatus='1' and Sender_Id!='".$_SESSION['id']."' and client_id='".$_SESSION['id']."' and project_id='".$row_projects['project_id']."' and developer_id='".$row_userbid['uid']."'"));
								?>
								<li>
								
								<a href="" title="<?php echo $developer_details['first_name'].' '.$developer_details['last_name'];?>">
							<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $developer_details['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
								</a>
							
								
									<strong><?php echo $developer_details['first_name'].' '.$developer_details['last_name'];?></strong>
                                    
                                    <?php
                            if($unread_message>0)
							{
								echo '<i class="fa fa-envelope" aria-hidden="true" style="color:#F30"> '. $unread_message.'</i>';
							}
							?>
								
								<a href="<?php echo WebUrl;?>Client/ClientMessage.php?project_id=<?php echo $row_projects['project_id'];?>&code=<?php echo $developer_details['unique_code'];?>&var=1"><font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;"><i class="fa fa-envelope" aria-hidden="true"></i>
	 Message Now</font></a>
								
								</li>
								<?php
							}
							?>
							</ul>
							</div>
						</li>
						
						<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
							<span></span>
						</div>
						<?php
					}
				}
				else
				{
					echo "No data Found";
				}
				?>
                	</ul>
				</div>
			</div>
		</div>
	</div>
</section>

<?php include "../include/footer.php"; ?>
</body>
</html>