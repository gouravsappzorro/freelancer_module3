<?php
	include('../Admin/MyInclude/MyConfig.php');
	include('../MailConfig.php');
?>
<?php
session_start();

if (!isset($_SESSION['user'])) {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="../Login/login.php";
     </script>
<?php
  	
   // exit; 
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
	<?php include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?>

     <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Dashboard</h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>                            
							</div>
                        </div>
                        <div id="breadcrumbs">
						<?php
                        if(isset($_SESSION['id']))
                        {
                            $unread_message=mysql_num_rows(mysql_query("select * from message where ReadStatus='1' and Sender_Id!='".$_SESSION['id']."' and (developer_id='".$_SESSION['id']."' or client_id='".$_SESSION['id']."')"));
                        }
                        ?>
                         	<span class="breadcrumb-title" style="font-size:15px; font-weight:500;">
                            <a href="<?php echo WebUrl;?>Client/message.php">Messages :
							<?php if($unread_message>0){?>  
                                 <i class="fa fa-envelope" aria-hidden="true" style="left:10px; position:relative; color:#F30 "> <?php echo $unread_message;?></i>
                                 
                                 <?php }else {?>
                                 <i class="fa fa-envelope" aria-hidden="true" style="left:10px; position:relative;"> <?php echo $unread_message;?></i>
                                 <?php }?>
                            </a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->
    
<!--============ Start Profile Complete Calculation =============-->
<?php

$maximumPoints = 100;
$point = 0;
$result=mysql_query("select * from register where unique_code='$_SESSION[id]'");
$row = mysql_fetch_assoc($result);

$message = '';
if($row['first_name'] != '' && $row['last_name'] != '')
{
	$point+=25;
}
else if($row['first_name'] == '' || $row['last_name'] == '')
{
	$message .= "<a href=".WebUrl.'Client/my-profile.php'." style='color:red;'>Add your Name Details <br></a>";
}

if($row['email'] != '')
{
	$point+=25;
}
else if($row['email'] == '')
{
	$message .= "<a href=".WebUrl.'Client/my-profile.php'." style='color:red;'>Add Your Email <br></a>";
}

if($row['profile_picture'] != '')
{
	$point+=25;
}
else if($row['profile_picture'] == '')
{
	$message .= "<a href=".WebUrl.'Client/my-profile.php'." style='color:red;'>Add Your Profile Picture <br></a>";
}

if($row['country'] != '' && $row['city'] != '')
{
	$point+=25;
}
else if($row['country'] == '' || $row['city'] == '')
{
	$message .= "<a href=".WebUrl.'Client/my-profile.php'." style='color:red;'>Add Your Location Details <br></a>";
}

$percentage = ($point*$maximumPoints)/100;

?>
<!--========= End Profile Complete calculation ===========-->


    <section class="section" style="padding-top:80px; padding-bottom:30px;">
	<div class="container">
		
		<div class="row-fluid">
         
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                    <?php $res=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");
							  $row=mysql_fetch_array($res);
						 ?>
                        <img src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                        
                        
                        
                        <p><?php echo $row['first_name']." ".$row['last_name'];?><br />
                       
                        <p><u><a style="color:inherit" href="<?php echo WebUrl; ?>Client/profile.php?user=<?php echo $row['unique_code']; ?>">View My-public profile</a></u></p>
						<div class="progress-wrap">
								<p class="bar-text">
									Profile Status <strong><?php echo $percentage.'%';?></strong>
								</p>
								<div class="progress">
									<div class="bar" style="" data-percentage-value="<?php echo $percentage;?>" data-value="<?php echo $percentage;?>">
									</div>
								</div>
                                
                                <?php if($message != '')
								{
								?>
								<div id="triangle-up"></div>
									<div id="Profile_complete_message">
										<p>Follow to Complete Profile</p>
										<?php echo $message;?>
									</div>
								
								<?php
								}
								?>
                                
							</div><br />
						
                        <!-- My Projects Section -->
                        
						 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Ongoing Projects</span></h3>		
						<?php
							$sql=mysql_query("select * from post_projects where status='award' order by award_date desc LIMIT 5");
							while($row_project=mysql_fetch_array($sql))
							{
                            	echo '<p><a href="'.WebUrl.'browse_detail_client.php?project_id='.$row_project['project_id'].'">'.$row_project['title'].' >></a></p><hr />';
                            
							}
						?>
					</div>
                </div>
					
				<!-- First Project -->
				
                <div class="span9">
					<div class="inner-content">
                     <!-- <div class="span12">
                     	<ul class="product_list_widget">
                         	<li>
							
							
	
							</li>
						</ul>
                     </div> -->
					 <div class="span12">
					 <?php
							if(isset($_SESSION['success']))
							{
								echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong></strong> ".$_SESSION['success']."
									</div>";
								unset($_SESSION['success']);
							}
							else
							{
								$sel="select status from register where unique_code='".$_SESSION['id']."'";
								$res=mysql_query($sel);
								$row=mysql_fetch_array($res);
								if($row['status']=='active')
								{
									unset($_SESSION['activate']);
								}
								else
								{
									$_SESSION['activate']="Your email is not yet verified ! Please click on the verification link in your email.";
								}
								if(isset($_SESSION['activate']))
								{
									echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong></strong> ".$_SESSION['activate']."
									</div>";
								//unset($_SESSION['activate']);
								}
							}
							
							?>
							<?php
							if(isset($_SESSION['error']))
							{
								echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
										<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
										<strong></strong> ".$_SESSION['error']."
									</div>";
								unset($_SESSION['error']);
							}
							
							?>
					 <h3 align="left" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:15px;"><span>Projects Feed</span></h3>	
					 <ul class="product_list_widget">
						
						<?php
                       						
						$query=mysql_query("select * from notification where uid='$_SESSION[id]' order by id desc limit 30");
		
						$total_rows = mysql_num_rows($query);
						
						$per_page = 10;
						$num_links = 5;
						$total_rows = $total_rows; 
						$cur_page = 1; 
						
						if(isset($_GET['page']))
						{
						  $cur_page = $_GET['page'];
						  $cur_page = ($cur_page < 1)? 1 : $cur_page;
						}
						
						$offset = ($cur_page-1)*$per_page;
						
						$pages = ceil($total_rows/$per_page);
						
						$start = (($cur_page - $num_links) > 0) ? ($cur_page - ($num_links - 1)) : 1;
						$end   = (($cur_page + $num_links) < $pages) ? ($cur_page + $num_links) : $pages;
						
						$res = mysql_query("select * from notification where uid='$_SESSION[id]' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
                        if(mysql_affected_rows())
						{
							while($row_noti=mysql_fetch_array($res))
							{
								$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_noti[profile]'"));
							?>
								
								<a href="<?php echo WebUrl;?>Developer/profile.php?user=<?php echo $developer['unique_code'];?>" title="<?php echo $developer['first_name'].' '.$developer['last_name'];?>">
								<img style="width:40px;height:40px; border-radius:4px;" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $developer['profile_picture'];?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/></a>
								
								<?php echo $row_noti['notification'];?>
								<br />
								<!--Day Caluclation-->			
								<?php
							
								$date1 = new DateTime($row_noti['date']);
								$date2 = new DateTime("now");
								$interval = $date1->diff($date2);
								$years = $interval->format('%y');
								$months = $interval->format('%m');
								$days = $interval->format('%d');
								if($years!=0){
									$ago = $years.' year(s) ago';
								}else{
									$ago = ($months == 0 ? $days.' day(s) ago' : $months.' month(s) ago');
								}
								if($ago==0)
								{
									$ago='Today';
								}
								echo $ago; 
								
								?>
	
								
								<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
									<span></span>
								</div>
										
							<?php
							}
						}
						else
						{
							echo"<div class='row-fluid'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
							<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
							<strong>Alert !!</strong> No any Notification Available
		    				</div></div>";
						}
                    
                        ?>
                         
						</ul>
					</div>
				</div>
			
						
	<!--======= Pagination Navigation Start =========-->
    <div id="pagination">
        <div id="pagiCount">
            <?php
                if(isset($pages))
                {  
                    if($pages > 1)        
                    {    
                        if($cur_page > $num_links)
                        {   $dir = "First";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.(1).'">'.$dir.'</a> </span>';
                        }
                       if($cur_page > 1) 
                        {
                            $dir = "Prev";
                            echo '<span id="prev"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page-1).'">'.$dir.'</a> </span>';
                        }                 
                        
                        for($x=$start ; $x<=$end ;$x++)
                        {
                            
                            echo ($x == $cur_page) ? '<strong>'.$x.'</strong> ':'<a href="'.$_SERVER['PHP_SELF'].'?page='.$x.'">'.$x.'</a> ';
                        }
                        if($cur_page < $pages )
                        {   $dir = "Next";
                            echo '<span id="next"> <a href="'.$_SERVER['PHP_SELF'].'?page='.($cur_page+1).'">'.$dir.'</a> </span>';
                        }
                        if($cur_page < ($pages-$num_links) )
                        {   $dir = "Last";
                       
                            echo '<a href="'.$_SERVER['PHP_SELF'].'?page='.$pages.'">'.$dir.'</a> '; 
                        }   
                    }
                }
            ?>
        </div>
    </div>
    <!--========= End Pagination Navigation ==========-->
				
            </div>
        </div>
    </div>
    </section>
   
   <?php include "../include/footer.php"; ?>
	<!-- End footer -->
	</body>
</html>
