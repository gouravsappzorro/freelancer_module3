<?php
	include('Admin/MyInclude/MyConfig.php');
	include ("MailConfig.php");
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
	<?php include('include/script.php');  ?>
	<?php include('include/validation.php'); ?>
	
</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">
   
<?php include"include/header.php"; ?>

     <!-- Static Page Titlebar -->
     <?php 
	 		if(isset($_GET['project_id']))
			{
				
				$res=mysql_query("select * FROM post_projects where project_id='".$_GET['project_id']."'");
		  		$row=mysql_fetch_array($res);
				 echo $cnt=mysql_fetch_array($res);
				 $cnt1=0;

		  			$res1=mysql_query("select * from register where unique_code='".$row['uid']."'");
		  			$row1=mysql_fetch_array($res1);
				 	echo $cnt1=mysql_fetch_array($res1);

				if(($cnt==0) && $cnt1==0)
				{
	 ?>
     
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px; line-height:30px;"><?php echo $row['title']; ?></h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>
                            </div>
                        </div>
                        <div id="breadcrumbs">
                            <span class="breadcrumb-title">Project ID:<?php echo $row['project_id']; ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->
	
    <section class="section" style="padding-top:80px; padding-bottom:30px;">
    <div class="container">
        <div class="row-fluid">
           
           <?php
		   
		   if(isset($_SESSION['success']))
			{
				echo"<div class='row-fluid'><div class='span8'><div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6; text-align:left;'>
			   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			   <strong></strong> ".$_SESSION['success']."
			   </div></div></div>";
			   unset($_SESSION['success']);
			}
		
			if(isset($_SESSION['error']))
			{
				echo"<div class='row-fluid'><div class='span12'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1; text-align:left;'>
				<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
					<strong></strong> ".$_SESSION['error']."
				</div></div></div>";
				unset($_SESSION['error']);
			}
		   
		   ?>
           
           
                <div class="span8">
                    <div class="inner-content">
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Project Description</span></h3>
                        <div class="excerpt">
                            <p align="justify">
                                <?php echo nl2br($row['description']); ?>
                                
                            </p>
                            <p>
                            
                            <?php 
							if($row['image']!='')
							{
								echo '<a href="'.WebUrl.'Projects/'.$row['image'].'" download><i class="fa fa-download" aria-hidden="true"> </i>
'.$row['image'].'</a>';
							}
							?>
                            </p>
                            <p style="pointer-events:none;">
                            Desired Location:<?php 
							$location=explode(',',$row['location']);
							
							for($a=0;$a<count($location);$a++)
							{
								if($a==0)
								{
									echo '<a href="javascript:void();">'.$location[$a].'</a>';
								}
								else
								{
									echo ',<a href="javascript:void();">'.$location[$a].'</a>';
								}
							}
							?>
                            </p>
                            
                            <p style="pointer-events:none;">
                            	Required Experience: <?php
								if($row['experience']=='1+')
								{
									echo '<a href="javascript:void();"> 1 Year and Above</a>';
								}
								elseif($row['experience']=='3+')
								{
									echo '<a href="javascript:void();"> 3 Year and Above</a>';
								}								 
                                elseif($row['experience']=='5+')
								{
									echo '<a href="javascript:void();"> 5 Year and Above</a>';
								}
								elseif($row['experience']=='10+')
								{
									echo '<a href="javascript:void();"> 10 Year and Above</a>';
								}
								elseif($row['experience']=='15+')
								{
									echo '<a href="javascript:void();"> 15 Year and Above</a>';
								}
								elseif($row['experience']=='All')
								{
									echo '<a href="javascript:void();"> Not Required</a>';
								}
                                ?>
                            </p>
							<p style="pointer-events:none;">
								Skills:<?php $skill=explode(',',$row['skills']);
								//echo "<a href='javascript:void()'>".$row['skills']."</a>";
									for($i=0;$i<count($skill);$i++)
									{
										if($i==0){
								 		?> 
                                 		<a href="javascript:void()"><?php echo $skill[$i]; ?></a>
                             			 <?php }
							  			else
							  			{
								  		?>
                                  		,<a href="javascript:void()"><?php echo $skill[$i]; ?></a>
								  		<?php 
										}
									}
								 ?>
							</p>
							<h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span> Question & Answers</span></h3>
							 <div class="panel-group" id="accordion">
                        <?php
                        $i=1;
                        $select_faq=mysql_query("SELECT * FROM `faqs` where ProjectId='".$_GET['project_id']."'");
                        $select_faq_num=mysql_num_rows($select_faq);
                        while($fetch_faq=mysql_fetch_array($select_faq))
                        {
                        ?>

						    <div class="panel panel-warning">
						      <div class="panel-heading" style="cursor: pointer;">
						        <h4 class="panel-title" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i;?>">
						          <a><i class="fa fa-hand-o-right" aria-hidden="true"></i> <?php echo $fetch_faq['Question'];?></a>
						        </h4>
						      </div>
						      <div id="collapse<?php echo $i;?>" class="panel-collapse collapse">
						        <div class="panel-body"><?php echo $fetch_faq['Answer'];?></div>
						        
						      </div>
						      
						    </div>
						   
						  <?php $i++; }
						  if($select_faq_num<1)
						  {
						  	echo '<div class="alert alert-info alert-dismissible">
								    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
								    <strong>Sorry!</strong> There Are No Question-Answers Posted Of This Project.
								  </div>';
						  }
						  ?>
						  </div>
                           
                        </div>
                    </div>
                </div>
                <div class="span4">
                    <div class="inner-content">
                      <br /><br /><br />
                        <div class="project-info">
                            <div class="clearfix">
								
                                <h4 class="share-label"><?php echo $row1['first_name']." ".$row1['last_name'];?></h4><br />
								<?php echo $row1['country']; ?>,<?php echo $row1['city']; ?><br/>
                				<strong><?php echo $row['currency'].' '.$row['budget'];?></strong>
                                <br /><br />
                               	
                                <!--====== Client Rating & Reviews ======-->
                                
								<?php
								$rate_client=mysql_fetch_array(mysql_query("select avg(Developer_Punctuality + Developer_Proffesionalism + Developer_rehire) as client_rate from rating where client_id='$row1[unique_code]'"));
								
								$rate=($rate_client['client_rate']/15)*100;
								
								?>
                                                             
								 <div class="star-rating">
                                    <span style="width:<?php echo $rate;?>%"><strong class="rating">5.00</strong> out of 5</span>
                                </div>
                                
                                <?php
									$review_client=mysql_num_rows(mysql_query("select * from rating where client_id='$row1[unique_code]'"));
								?>
								<a href="javascript:void();"><?php echo $review_client;?> Reviews</a>	
                                
                                <!--====== End Rating & Reviews ======-->
                                
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    </section>
	<?php 
	}
	  else
	{
	?>
    <div class="container">
    <div class="row-fluid">
        <div class="span8">
            <div class="inner-content">
              <div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong></strong>No posted project available. 
              </div> 
            </div>
        </div>
    </div>
    </div>
    <?php
		  }
		}        
    ?>
<section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <?php
		
		 $bid_check=mysql_fetch_array(mysql_query("select * from user_bids where project_id='$_GET[project_id]' and (status='award' or status='awarded')"));

		
		
		
		 $user=mysql_fetch_array(mysql_query("select * from register where unique_code='$bid_check[uid]'"));
		 
		if($bid_check['status']=='award' or $bid_check['status']=='awarded')
		{
	?>
    			<!--====== Award Project ======-->
                
    			<div class="row-fluid" style="border:thin #CCC solid; padding-top:30px; margin-bottom:20px">
            		<div class="span6">
						 <ul class="product_list_widget">
                            <li>
                                <a href="<?php echo WebUrl;?>Developer/profile.php?user=<?php echo $user['unique_code'];?>" title="<?php echo $user['first_name']." ".$user['last_name'];?>">
                                
                                <img width="120" height="120" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $user['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
                                
                                <?php echo $user['first_name']." ".$user['last_name'];?>
                                </a>
                                
                                <span><?php echo $user['country'].",".$user['city'];?></span><br />
                                <p align="justify"><?php echo nl2br($bid_check['bid_message']); ?></p>
                            </li>
						</ul>
                        
                        <!--======== Milestone Paid Statusbar ========-->
                        <?php
						if($row['uid']==$_SESSION['id'])
						{
						
							$sql_developer_milestone_payment=mysql_query("select SUM(milestone) as milestone from milestone_payment where project_id='$_GET[project_id]' and client_id='$_SESSION[id]'");
							$developer_milestone_payment = mysql_fetch_array($sql_developer_milestone_payment);
							
							$admin_commision_payment=mysql_fetch_array(mysql_query("select developer_percentage from admin_commision_percentage"));
							
							$admincommision=0;
							
							if($developer_milestone_payment['milestone'] != '')
							{
								$admincommision = $bid_check['cost'] * ($admin_commision_payment['developer_percentage'] / 100);
							}
							
							$milestonepayment = ceil($admincommision) + $developer_milestone_payment['milestone'];
		
							//$milestonepayment = $bid_check['cost'] - ceil($admincommision);
							
							$per = 100 * (int)$milestonepayment / (int)$bid_check['cost'];
			
							
							$milestone=mysql_num_rows(mysql_query("select * from milestone where project_id='".$_GET['project_id']."'"));
							
							if($milestone>0){
							?>
							<div class="progress" title="Milestone Paid <?php echo number_format($per,0);?>%">
								<div class="progress-bar  progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $per;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $per;?>%; background:#F1C40F">Milestone Paid <?php echo number_format($per,0);?>%</div>
							</div>
							<?php
							}
						}
						?>
						<?php
						$select_award_date=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$_GET['project_id']."'"));
						$select_bids_day=mysql_fetch_array(mysql_query("select * from user_bids where project_id='".$_GET['project_id']."' and status='awarded'"));
						$get_date_project_end = date('Y-m-d', strtotime('+'.$select_bids_day['duration'].' days', strtotime($select_award_date['award_date'])));
						$start = strtotime($select_award_date['award_date']);
						
						$end = strtotime('$get_date_project_end');

						$start = strtotime($get_date_project_end);

						$end = strtotime(date('Y-m-d'));

						$days_between = ceil(abs($end - $start) / 86400);

						$current = strtotime(date('Y-m-d'));

						$completed = (($current - $start) / ($end - $start)) * 100;
						
						?>
                        <div class="progress" title="Days Left <?php echo number_format($completed,0);?>%">
  							<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="<?php echo $completed;?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $completed;?>%; background:#F1C40F" >Days Left <?php echo $days_between;?></div>
                        </div>
                        <!--======== End Milestone Paid Statusbar ========-->
                        
					</div>
                    
                    
                    <!--++++++++ Developer Reting +++++++++-->
					<div class="span3">
						<?php
                            $rate_developer1=mysql_fetch_array(mysql_query("select avg(Client_Punctuality + Client_Proffesionalism + Client_Rehire) as developer_rate from rating where developer_id='$user[unique_code]'"));
                                
                            $rate_dev1=($rate_developer1['developer_rate']/15)*100;
                            
                        ?>
						<div class="star-rating">
                              <span style="width:<?php echo $rate_dev1;?>%"><strong class="rating">5.00</strong> out of 5</span>
                        </div>
						<p>
						<?php
								$review_dev1=mysql_num_rows(mysql_query("select * from rating where developer_id='$user[unique_code]'"));
								
								echo $review_dev1.' Reviews';
						?>
                        </p>
					</div>
                    <!--++++++++++ End Developer Rating +++++++++-->
                    
                    
					<div class="span3">
						<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif; color:#000000"><?php if($row['type_of_project']=='fixed'){ echo $row['currency']. " ".$bid_check['cost'];}else{ echo $bid_check['cost'] / $bid_check['duration']. " ".$row['currency'];}?></font><br />
						<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;"><?php echo "in ".$bid_check['duration'];?><?php if($row['type_of_project']=='fixed'){ echo " Days";} else{ echo " Hours";}?></font><br /><br />
						
                       	<?php
					   	if($row['uid']==$_SESSION['id'])
						{
						?> 
                            <div style="pointer-events:none">
                            <?php if($row['status']=='complete'){ ?>
                            
                            <a href="javascript:void();"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Completed</font></a><br />
                            
                            <?php }else if($bid_check['status']=='awarded'){ ?>
                            
                            <a href="javascript:void();"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Work in Progress</font></a><br />
                            
                            
                            <?php }else if($bid_check['status']=='award' ){?>
                            
                            <a href="javascript:void();"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Pending</font></a><br />
                            <?php }?>
                            </div>
                            <img src="images/message-icon.png" width="18" height="8"><a href="<?php echo WebUrl;?>Client/ClientMessage.php?project_id=<?php echo $_GET['project_id'];?>&code=<?php echo $user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Message Now</font></a>
						<?php
						}
						?>
					</div>
                    
           	 	</div>
                
                <!--=========================-->
    <?php }?>
    
    <!--========= Milestone Details ==========-->
    <?php
	if($row['status']!='pending')
    {
		if($row['uid']==$_SESSION['id'])
		{
		?>
    
    <h3 align="center" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>Milestone Details</span></h3>
    <div class="row-fluid">
    
    <?php
        
    $sql_milestone=mysql_query("select * from milestone where project_id='$_GET[project_id]' order by id desc");
    $row_milestone=mysql_fetch_array($sql_milestone);
    
    $milestone_count=mysql_num_rows($sql_milestone);
    
    $total_milestone=mysql_fetch_array(mysql_query("select SUM(create_payment) as create_payment from milestone where project_id='$_GET[project_id]'"));
    
	//Remain Payment
	$remain_payment = $bid_check['cost'] - $total_milestone['create_payment'];
		?>
                                          
    <?php 
	$sql_mlstn=mysql_query("select * from milestone where project_id='$_GET[project_id]' order by id asc");
	
	if(mysql_affected_rows()){
	?>
    
        <div class="span12">
        <?php
		if(isset($_SESSION['s']))
		{
			echo"<div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong></strong> ".$_SESSION['s']."
			</div>";
			unset($_SESSION['s']);
		}
		
		if(isset($_SESSION['e']))
		{
			echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
			<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
			<strong></strong> ".$_SESSION['error']."
			</div>";
			unset($_SESSION['e']);
		}
		?>
        
        <div class="table-responsive ">
        <table class="table table-hover">
            <thead>
                <tr bgcolor="#dff0d8">
                    <th>No</th>
                    <th>Created Milestone</th>
                    <th>Message</th>
                    <th>Create Date</th>
                    <th>Release Date</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        	<?php
        
            $no=1;
            while($mlstn=mysql_fetch_array($sql_mlstn))
            {
            	$create_date=new DateTime($mlstn['create_date']); 
            	$release_date=new DateTime($mlstn['release_date']); 
                echo '<tr>';
                echo '<td>'.$no.'</td>';
                echo '<td>'.$row['currency']." ".$mlstn['create_payment'].'</td>';
				echo '<td>'.$mlstn['milestone_message'].'</td>';
				echo '<td>'.$create_date->format('m/d/Y').'</td>';
				if($mlstn['release_date']=='0000-00-00')
				{
					echo '<td></td>';
				}
				else{
					echo '<td>'.$release_date->format('m/d/Y').'</td>';
				}
				if($mlstn['status']=='release')
				{
                	echo '<td><img src="images/symbol_check.png" height="auto" width="30px"></td>';
				}
				if($mlstn['status']=='create')
				{
					echo '<td>
					<a href="javascript:void();" class="release" milestone="'.$mlstn['id'].'">Release</a>
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					<a href="javascript:void();" class="cancel" milestone_cancel="'.$mlstn['id'].'">Cancel</a>
					</td>';
					
				}
				
                echo '</tr>';
                $no++;
            }
        	?>
                <tr bgcolor="#dff0d8">
                    <th>Remaining Milestone</th>
                    <th colspan="5">
                        <?php echo $row['currency']." ".$remain_payment;?>
                    </th>
                </tr>
			</tbody>
        </table>
        </div>
        </div>
		<?php 
		}
		else
		{ 
			echo"<div class='span4'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
            <strong>Alert!</strong> No Any Milestone Request
            </div></div>";
		}?>
        
	</div>
    
	<?php
		}
	}
	?>
        
     <!--========== End Mlestone Details ========-->
     
        <div class="row-fluid">
            <h3 align="center" class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:45px;"><span>Bidding Details</span></h3>		
			
			<!-- 1st Bidder Block -->
            <!--<div class="row-fluid">-->

	<div class="tabset horizental-tabset">
	<ul class="tabs clearfix">
		<li class="tab"><a href="#tab-1">All Bids</a></li>
		<li class="tab"><a href="#tab-2">Shorted List</a></li>
	</ul>
    
    <!--======= All Bids code start =======-->
    
	<div id="tab-1" class="panel tab-content clearfix">
	<?php 

	$sql_bids=mysql_query("select * from user_bids where (status='active' or status='compare') and project_id='$_GET[project_id]'");

	if(mysql_affected_rows())
	{
		while($row_bids=mysql_fetch_array($sql_bids))
		{
			$row_user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_bids[uid]'"));

	?>
			<div class="span6">
				<ul class="product_list_widget">
				<li>
					<a href="<?php echo WebUrl;?>Developer/profile.php?user=<?php echo $row_user['unique_code'];?>" title="<?php echo $row_user['first_name']." ".$row_user['last_name'];?>">
						
                        <img width="120" height="120" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row_user['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
						
						<?php echo $row_user['first_name']; ?> <?php echo $row_user['last_name']; ?>
					</a>
					
                    <span><?php echo $row_user['country']; ?>, <?php echo $row_user['city']; ?></span><br />
					<p align="justify"><?php echo nl2br($row_bids['bid_message']); ?></p>
				</li>
				</ul>
			</div>
			
            
            <!--+++++++++ Developer Rate ++++++++-->
            <div class="span3">
            	<?php
                $rate_developer2=mysql_fetch_array(mysql_query("select avg(Client_Punctuality + Client_Proffesionalism + Client_Rehire) as client_rate from rating where developer_id='$row_user[unique_code]'"));
                                    
                $rate_dev2=($rate_developer2['client_rate']/15)*100;
                            
                ?>

				<div class="star-rating">
					<span style="width:<?php echo $rate_dev2;?>%"><strong class="rating">5.00</strong> out of 5</span>
				</div>
				<p>
                <?php
					$review_dev2=mysql_num_rows(mysql_query("select * from rating where developer_id='$row_user[unique_code]'"));
					
					echo $review_dev2.' Reviews';
				?>
                </p>
			</div>
            <!--+++++++++ End Developer Rate ++++++++-->

			<div id="action" <?php if($bid_check['status']=='award' or $bid_check['status']=='awarded'){ ?> style="pointer-events:none;" <?php }?>>

			<div class="span">
                <font style="font-size:24px; font-family:Arial, Helvetica, sans-serif; color:#000000"><?php echo $row['currency']. " ".$row_bids['cost'];?></font><br />
                
                <font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;"><?php echo "in ".$row_bids['duration'];?><?php if($row['type_of_project']=='fixed'){ echo " Days";} else{ echo " Hours";}?></font><br /><br />
                
                <a href="javascript:void();" class="btn btn-warning award" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Award</font></a><br>
    
                <?php if($row_bids['status']=='compare'){?>
                    <a href="javascript:void();" class="unshort" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Remove From List</font></a><br/>
    
                <?php }else{?>
    
                    <a href="javascript:void();" class="short" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Short List</font></a><br/>
                <?php } ?>
    
                <img src="images/message-icon.png" width="18" height="8"> <a href="<?php echo WebUrl;?>Client/ClientMessage.php?project_id=<?php echo $_GET['project_id'];?>&code=<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Message Now</font></a>

			</div>
		</div>

		<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
			<span></span>
		</div>
		<?php
		}
	}
	else
	{ 
		echo"<div class='row-fluid'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
        <strong></strong> No Bidders have applied yet
    	</div></div>";
	}
	?>

	</div>

<!--============ All Bids code End ==============-->

<!--============= Shorted List Code Start ================-->

	<div id="tab-2" class="panel tab-content clearfix">
	<?php 

		$sql_bids=mysql_query("select * from user_bids where project_id='$_GET[project_id]' and status='compare'");

		if(mysql_affected_rows())
		{
			while($row_bids=mysql_fetch_array($sql_bids))
			{
				$row_user=mysql_fetch_array(mysql_query("select * from register where unique_code='$row_bids[uid]'"));

		?>
				<div class="span6">
					<ul class="product_list_widget">
					<li>
						<a href="javascript:void();" title="">
							
                            <img width="120" height="120" src="<?php echo WebUrl; ?>Profile Picture/<?php echo $row_user['profile_picture']; ?>"  class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="this.src='<?php echo WebUrl; ?>Profile Picture/no_image.jpg';"/>
							
							<?php echo $row_user['first_name']; ?> <?php echo $row_user['last_name']; ?>
						</a>
						<span><?php echo $row_user['country']; ?>, <?php echo $row_user['city']; ?></span><br />
						<p align="justify"><?php echo nl2br($row_bids['bid_message']); ?></p>
					</li>
					</ul>
				</div>
                
                <!--+++++++++ Start Developer Rate ++++++++-->
				<div class="span3">
					<?php
                        $rate_developer3=mysql_fetch_array(mysql_query("select avg(Client_Punctuality + Client_Proffesionalism + Client_Rehire) as client_rate from rating where developer_id='$row_user[unique_code]'"));
                            
                        $rate_dev3=($rate_developer3['client_rate']/15)*100;
                        
                    ?>

					<div class="star-rating">
						<span style="width:<?php echo $rate_dev3;?>%"><strong class="rating">5.00</strong> out of 5</span>
					</div>
					<p>
                    <?php
						$review_dev3=mysql_num_rows(mysql_query("select * from rating where developer_id='$row_user[unique_code]'"));
						
						echo $review_dev3.' Reviews';
					?>
                    </p>
				</div>
				<!--++++++++++ End Developer Rate ++++++++++-->

				<div id="action" <?php if($bid_check['status']=='award' or $bid_check['status']=='awarded'){ ?> style="pointer-events:none;" <?php }?>>

				<div class="span">
					<font style="font-size:24px; font-family:Arial, Helvetica, sans-serif; color:#000000"><?php echo $row['currency']. " ".$row_bids['cost'];?></font><br />
					<font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;"><?php echo "in ".$row_bids['duration'];?><?php if($row['type_of_project']=='fixed'){ echo " Days";} else{ echo " Hours";}?></font><br /><br />
                    
					<a href="javascript:void();" class="award" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Award</font></a><br>

					<?php if($row_bids['status']=='compare'){?>
                    
					<a href="javascript:void();" class="unshort" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Remove From List</font></a><br/>

					<?php }else{?>

					<a href="javascript:void();" class="short" uid="<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Short List</font></a><br/>
					
					<?php } ?>

					<img src="images/message-icon.png" width="18" height="8"> <a href="<?php echo WebUrl;?>Client/ClientMessage.php?project_id=<?php echo $_GET['project_id'];?>&code=<?php echo $row_user['unique_code'];?>"><font style="font-size:14px; font-family:Arial, Helvetica, sans-serif;">Message Now</font></a>

				</div>
				</div>
<!-- 1st Bidder Block End -->

				<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
					<span></span>
				</div>
				<?php
			}	
		}
		else
		{ 
			echo"<div class='row-fluid'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
			You have not short listed any developer yet !
		    </div></div>";
		}
		?>
		</div>
<!--============= Shorted List Code End ===================-->  
      
	</div>
	</div>
	</div>
    <!--</div>-->
</section>
    

<?php include "include/footer.php"; ?>
	<!-- End footer -->
<?php
	
	/* First time Payment */
	
	if(isset($_GET['developer']) and isset($_GET['project_id']) and isset($_GET['admin_payment']))
	{
		mysql_query("update milestone set status='release',release_date=CURDATE() where project_id='$_GET[project_id]' and id='$_SESSION[milestone_id]'");
		
		/* admin payment */
		
		if($_SESSION['update']=='' and !isset($_SESSION['update']))
		{
			$insert=mysql_query("insert into admin_commision values('','$_SESSION[id]','$_GET[developer]','$_GET[project_id]','$_SESSION[admin_commision]','$_SESSION[commision_dev]','$_SESSION[commision_admin]',CURDATE())");
		}
		else
		{
			$from_dev_commision_sql=mysql_fetch_array(mysql_query("select from_dev_commision from admin_commision where project_id='$_GET[project_id]'"));
			
			$from_dev_commision=$from_dev_commision_sql['from_dev_commision'] + $_SESSION['commision_admin'];
			$update=mysql_query("update admin_commision set from_dev_commision='$from_dev_commision' where project_id='$_GET[project_id]'");
			unset($_SESSION['update']);
		}
		/* ============== */
		/* Developer Payment */
		
		$insert_dev=mysql_query("insert into milestone_payment values('','$_GET[project_id]','$_SESSION[id]','$_GET[developer]','$_SESSION[remain_pay]',CURDATE())");
		
		/* ============== */
		
		
?>
<script>
	window.location.href="browse_detail_client.php?project_id=<?php echo $_GET['project_id'];?>";
</script>
<?php
	$f_milestone = $_SESSION['remain_pay'] + $_SESSION['commision_dev'];
	$_SESSION['Success']="Milestone Release Successfully";
	
			$to       = $user['email'];
			$subject  = $row1['first_name'].' '.$row1['last_name']." released milestone pay of ".$row['currency'].' '.$_SESSION['remain_pay']." for ".$row['title'];
			$header   = "Webzira.com"; 
			$msg='
			<div style="background-color:#e5e5e1;font-size:18px">
				<div bgcolor="#e5e5e1" style="margin:0;padding:0">
					<table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
							<td valign="bottom">
								<table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
				                    <table width="651" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
										<td style="padding-left:15px;" align="left" valign="middle">
										<img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
                        				</tr>
									</tbody>
									</table>
									</td>
								</tr>
								<tr valign="top" style="">
									<td style="padding-top:20px" height="218" align="center">
										<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
										<tbody>
										<tr align="left">
											<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
                            Hi,'.$user['first_name']." ".$user['last_name'].'!
                          					</td>
										</tr>
										<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$user['username'].'\'</td>
						</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira !<br><br>
						  
						  	
						   <strong>'.$row1['first_name'].' '.$row1['last_name'].'</strong> released milestone pay of <strong>'.$row['currency'].' '.$_SESSION['remain_pay'].'</strong> to your paypal account '.$user['paypal_Account'].'
										
											<br /><br>
											
						<strong>'.$f_milestone.'</strong> (Milestone)  -  <strong>'.$_SESSION['commision_dev'].'</strong> (Webzira fee)   =  <strong>'.$_SESSION['remain_pay'].'</strong> (Remain Milestone Payment)
							<br><br>
								
							
											Thanks for using Webzira.com
                          					</td>
                        			</tr>
									<tr valign="left">
										<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
			
										If you have any queries, feel free to contact us at info@webzira.com
										</td>
                        			</tr>
									<tr valign="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
                          
						  				Thank you <br>
			                            - Webzira.com Team
            				            </td>
                        			</tr>
									<tr align="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
			
			                          Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
            			              </td>
                        			</tr>						
						
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
				</table>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
  			<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send=email("Webzira.com",$to,$msg,$subject,"No");
	
		//insert Notification
		$project_title=mysql_real_escape_string($row['title']);
		$insert_notification=mysql_query("insert into notification values('','$user[unique_code]','$row1[unique_code]','<font style=color:#f1c40f><a href=#>$row1[first_name] $row1[last_name]</a></font> released milestone pay of <strong>$row[currency] $_SESSION[remain_pay]</strong> on project <font style=color:#f1c40f><a href=#>$project_title</a></font>',now(),'active')");
	
	unset($_SESSION['commision_admin'],$_SESSION['remain_pay'],$_SESSION['admin_commision'],$_SESSION['commision_dev']);
	
	}
	
	/* =============== */
	
	/* Developer Payment */
	
	if(isset($_GET['developer']) and isset($_GET['project_id']) and isset($_GET['dev_payment']))
	{
		mysql_query("update milestone set status='release',release_date=CURDATE() where project_id='$_GET[project_id]' and id='$_SESSION[milestone_id]'");
		
		$insert_dev=mysql_query("insert into milestone_payment values('','$_GET[project_id]','$_SESSION[id]','$_GET[developer]','$_SESSION[remain_pay]',CURDATE())");
		
	?>
<script>
	window.location.href="browse_detail_client.php?project_id=<?php echo $_GET['project_id'];?>";
</script>
	<?php

	$_SESSION['Success']="Milestone Release Successfully";

	$to       = $user['email'];
	$subject  = $row1['first_name'].' '.$row1['last_name']." released milestone pay of ".$row['currency'].' '.$_SESSION['remain_pay']." for ".$row['title'];
	$header   = "Webzira.com"; 
	$msg='
	<div style="background-color:#e5e5e1;font-size:18px">
		<div bgcolor="#e5e5e1" style="margin:0;padding:0">
			<table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
				<tbody>
					<tr>
					<td valign="bottom">
						<table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0">
						<tbody>
						<tr>
							<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
							<table width="651" border="0" cellspacing="0" cellpadding="0">
							<tbody>
								<tr>
								<td style="padding-left:15px;" align="left" valign="middle">
								<img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
								</tr>
							</tbody>
							</table>
							</td>
						</tr>
						<tr valign="top" style="">
							<td style="padding-top:20px" height="218" align="center">
								<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
								<tbody>
								<tr align="left">
									<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
					Hi,'.$user['first_name']." ".$user['last_name'].'!
									</td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$user['username'].'\'</td>
						</tr>
								<tr>
									<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
									<span class="il">Welcome</span> to Webzira !<br><br>
				  
				   <strong>'.$row1['first_name'].' '.$row1['last_name'].'</strong> released milestone pay of <strong>'.$row['currency'].' '.$_SESSION['remain_pay'].'</strong> to your paypal account '.$user['paypal_Account'].'
								
									<br /><br>
									
					
					
									Thanks for using Webzira.com
									</td>
							</tr>
							<tr valign="left">
								<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
	
								If you have any queries, feel free to contact us at info@webzira.com
								</td>
							</tr>
							<tr valign="left">
								<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
				  
								Thank you <br>
								- Webzira.com Team
								</td>
							</tr>
							<tr align="left">
								<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
	
							  Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
							  </td>
							</tr>						
				
					</tbody>
				</table>
			</td>
		</tr>
		</tbody>
		</table>
	</td>
	</tr>
	</tbody>
	</table>
	</div>
	<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
		
		$send=email("Webzira.com",$to,$msg,$subject,"No");
		
		//insert Notification
		$project_title=mysql_real_escape_string($row['title']);
		$insert_notification=mysql_query("insert into notification values('','$user[unique_code]','$row1[unique_code]','<font style=color:#f1c40f><a href=#>$row1[first_name] $row1[last_name]</a></font> released milestone pay of <strong>$row[currency] $_SESSION[remain_pay]</strong> on project <font style=color:#f1c40f><a href=#>$project_title</a></font>',now(),'active')");
		
		unset($_SESSION['remain_pay']);
	}
	/* ============= */
	
	/* Admin Payment */
	
	if(isset($_GET['developer']) and isset($_GET['project_id']) and isset($_GET['admin_pay']))
	{
		mysql_query("update milestone set status='release',release_date=CURDATE() where project_id='$_GET[project_id]' and id='$_SESSION[milestone_id]'");
		
		if($_SESSION['admin_pay']=='')
		{
			$insert=mysql_query("insert into admin_commision values('','$_SESSION[id]','$_GET[developer]','$_GET[project_id]','$_SESSION[admin_commision]','$_SESSION[remain_pay]','$_SESSION[commision_admin]',CURDATE())");
		}
		else
		{
			$from_dev_commision_sql=mysql_fetch_array(mysql_query("select from_dev_commision from admin_commision where project_id='$_GET[project_id]'"));
			
			$from_dev_commision = $from_dev_commision_sql['from_dev_commision'] + $_SESSION['remain_pay'];
			
			$update=mysql_query("update admin_commision set from_dev_commision='$from_dev_commision' where project_id='$_GET[project_id]'");
			unset($_SESSION['admin_pay']);
			
		}
		
	?>
<script>
	window.location.href="browse_detail_client.php?project_id=<?php echo $_GET['project_id'];?>";
</script>
	<?php
	
		$_SESSION['Success']="Milestone Release Successfully";
		
		$to       = $user['email'];
			$subject  = $row1['first_name'].' '.$row1['last_name']." released milestone pay of ".$row['currency'].' '.$_SESSION['remain_pay']." for ".$row['title'];
			$header   = "Webzira.com"; 
			$msg='
			<div style="background-color:#e5e5e1;font-size:18px">
				<div bgcolor="#e5e5e1" style="margin:0;padding:0">
					<table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
							<td valign="bottom">
								<table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0">
								<tbody>
								<tr>
									<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
				                    <table width="651" border="0" cellspacing="0" cellpadding="0">
									<tbody>
										<tr>
										<td style="padding-left:15px;" align="left" valign="middle">
										<img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
                        				</tr>
									</tbody>
									</table>
									</td>
								</tr>
								<tr valign="top" style="">
									<td style="padding-top:20px" height="218" align="center">
										<table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
										<tbody>
										<tr align="left">
											<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
                            Hi,'.$user['first_name']." ".$user['last_name'].'!
                          					</td>
										</tr>
										<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$user['username'].'\'</td>
						</tr>
										<tr>
											<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
											<span class="il">Welcome</span> to Webzira !<br><br>
						  
						  	
						  	
							
							Your Requested milestone is Lessthan Webzira fee so 
						   <strong>'.$row1['first_name'].' '.$row1['last_name'].'</strong>  not unable to pay of <strong>'.$row['currency'].' '.$_SESSION['remain_pay'].'</strong> to your paypal account '.$user['paypal_Account'].'
										
											<br /><br>
							
											Thanks for using Webzira.com
                          					</td>
                        			</tr>
									<tr valign="left">
										<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
			
										If you have any queries, feel free to contact us at info@webzira.com
										</td>
                        			</tr>
									<tr valign="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
                          
						  				Thank you <br>
			                            - Webzira.com Team
            				            </td>
                        			</tr>
									<tr align="left">
										<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
			
			                          Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
            			              </td>
                        			</tr>						
						
							</tbody>
						</table>
					</td>
				</tr>
				</tbody>
				</table>
			</td>
			</tr>
			</tbody>
			</table>
			</div>
  			<img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send=email("Webzira.com",$to,$msg,$subject,"No");
		
//insert Notification
		$project_title=mysql_real_escape_string($row['title']);
		$insert_notification=mysql_query("insert into notification values('','$user[unique_code]','$row1[unique_code]','<font style=color:#f1c40f><a href=#>$row1[first_name] $row1[last_name]</a></font> released milestone pay of <strong>$row[currency] $_SESSION[remain_pay]</strong> on project <font style=color:#f1c40f><a href=#>$project_title</a></font>',now(),'active')");
		
				
		unset($_SESSION['remain_pay']);
	}
	
	/* ============= */
?>

<!--====== Complete Project Payment ======-->
<?php

if($row['status']=='award')
{
	$total_payment=mysql_fetch_array(mysql_query("select sum(milestone) as milestone from milestone_payment where project_id='$_GET[project_id]'"));
	
	$admin_commision=mysql_fetch_array(mysql_query("select developer_percentage from admin_commision_percentage"));
	
	$commision = $bid_check['cost'] * ($admin_commision['developer_percentage'] / 100);
	
	$payment = $bid_check['cost'] - ceil($commision);
	
	if($payment == $total_payment['milestone'])
	{
		mysql_query("update post_projects set status='complete',complete_date=CURDATE() where project_id='$_GET[project_id]'");
		
/*=============== client rating mail ===================*/

		$to1       = $row1['email'];
		$subject1  = "Leave Ratings for ".$user['first_name']." ".$user['last_name']." for ".$row['title'];
		$header1   = "Freelancer"; 
	
$msg1='
<div style="background-color:#e5e5e1;font-size:18px">
    <div bgcolor="#e5e5e1" style="margin:0;padding:0">
      <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0"><tbody><tr>
<td valign="bottom">
              <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
<tr>
<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
                      <table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="padding-left:15px;" align="left" valign="middle">
                          <img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
</td>
                        </tr></tbody></table>
</td>
                    
                  </tr>
<tr valign="top" style="">
<td style="padding-top:20px" height="218" align="center">
                      <table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
<tbody><tr align="left">
<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
                            Hi,'.$row1['first_name']." ".$row1['last_name'].'!
                          </td>
						  <tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$row1['username'].'\'</td>
						</tr>
                        </tr>
<tr>
<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
                          <span class="il">Welcome</span> to Webzira!
						  
						  <br><br>
						  						  
						  Congratulation! <strong>'.$user['first_name']." ".$user['last_name'].'</strong> has successfully completed your project '.$row['title'].'.
						  
						  <br>
						  
						  Leave frank ratings and reviews for <strong>'.$user['first_name']." ".$user['last_name'].'</strong>, so that other Clients also know how your experience was working with <strong>'.$user['first_name']." ".$user['last_name'].'</strong>.
						  
						  <br><br>
													  
						 <a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'ratings-pending.php" >Click Here</a>
						 
						 <br/><br/>
							
						 Your feedback will be only published to <strong>'.$user['first_name']." ".$user['last_name'].'</strong>, once you have been rated too by <strong>'.$user['first_name']." ".$user['last_name'].'</strong>.
						 
						 <br>
						 
						 Post more projects on Webzira.com and get your work done from reputed developers on platform.
						 <br><br>						 
						 
						 Thanks for using Webzira.com<br />
						  
                          </td>
                        </tr>
<tr valign="left">
<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
                           If you have any queries, feel free to contact us at info@webzira.com
                          </td>
                        </tr>


<tr valign="left">
<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
                          Thank you 
                            <br>
                            - Webzira.com Team 
                          </td>
                        </tr>
						
<tr align="left">
<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
                          Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
                          </td>
                        </tr>						
						
</tbody></table>
</td>
                  </tr>
</tbody></table>
</td>
          </tr></tbody></table>
</div>
  <img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send1=email("Freelancer",$to1,$msg1,$subject1,"No");


/*===================================================*/
/*========= Developer rating mail ===================*/

		$to       = $user['email'];
		$subject  = "Leave Ratings for ".$row1['first_name']." ".$row1['last_name']." for ".$row['title'];
		$header   = "Webzira.com"; 
	
		$msg='
		<div style="background-color:#e5e5e1;font-size:18px">
			<div bgcolor="#e5e5e1" style="margin:0;padding:0">
			  <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0"><tbody><tr>
		<td valign="bottom">
					  <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
		<tr>
		<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
							  <table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
		<td style="padding-left:15px;" align="left" valign="middle">
								  <img src="'.WebUrl.'images/email-logo.png" alt="Webzira Logo">
		</td>
								</tr></tbody></table>
		</td>
							
						  </tr>
		<tr valign="top" style="">
		<td style="padding-top:20px" height="218" align="center">
							  <table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
		<tbody><tr align="left">
		<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
									Hi,'.$user['first_name']." ".$user['last_name'].'!
								  </td>
								</tr>
								<tr>
						<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">User Name : \''.$user['username'].'\'</td>
						</tr>
		<tr>
		<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
								  <span class="il">Welcome</span> to Webzira!<br><br>
								 
								 Congratulation! You have successfully completed project <strong>'.$row['title'].'</strong> for <strong>'.$row1['first_name']." ".$row1['last_name'].'</strong><br>
								 
								 Leave frank ratings and reviews for <strong>'.$row1['first_name']." ".$row1['last_name'].'</strong>, so that other developers know how your experience was working with <strong>'.$row1['first_name']." ".$row1['last_name'].'</strong>.
									
								  <br /><br />
								  
								 <a style="background:#41b7d8 none repeat scroll 0 0; color:white; padding:10px 20px; text-decoration:none; font-family: Source Sans Pro,sans-serif; font-size:20px;" href="'. WebUrl.'ratings-pending.php" >Click Here</a><br/><br/>
									
									
								 Your feedback will be only published to <strong>'.$row1['first_name']." ".$row1['last_name'].'</strong>, once you have been rated too by <strong>'.$row1['first_name']." ".$row1['last_name'].'</strong>.
								 
								  <br />
								  
								  Bid on more and more projects, complete all the work on time and earn more income.
								  <br /><br>
								  
								  Thanks for using Webzira.com<br />
								  
								  </td>
								</tr>
		<tr valign="left">
		<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
								   If you have any queries, feel free to contact us at info@webzira.com
								  </td>
								</tr>
		
		
		<tr valign="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
								  Thank you 
									<br>
									- Webzira.com Team 
								  </td>
								</tr>
								
		<tr align="left">
		<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
								  Copyrights @ 2016 Webzira.com .  All Rights Reserved. 
								  </td>
								</tr>						
								
		</tbody></table>
		</td>
						  </tr>
		</tbody></table>
		</td>
				  </tr></tbody></table>
		</div>
		  <img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  		$send1=email("Webzira.com",$to,$msg,$subject,"No");
	}
}
?>
<!--==============================-->


<?php
//Paypal_id Validation

?>
</body>
<script>
$(document).ready(function(e) {
						
    $(".short").click(function(e) {
        var unique=$(this);
		var user=unique.attr("uid");
		var project_id=<?php echo $_GET['project_id']?>;
		var short=1;
		$.ajax({
			type:'POST',
			url:"action_shortlist.php",
			data:{project_id:project_id,user:user,short:short},
			dataType:'html',
			success:function(data){
				location.reload();
			}
		});
    });
	
	$(".unshort").click(function(e) {
        var unique=$(this);
		var user=unique.attr("uid");
		var project_id=<?php echo $_GET['project_id']?>;
		var short=2;
		$.ajax({
			type:'POST',
			url:"action_shortlist.php",
			data:{project_id:project_id,user:user,short:short},
			dataType:'html',
			success:function(data){
				location.reload();
			}
		});
    });
	
	$(".award").click(function(e) {
		
        var unique=$(this);
		var user=unique.attr("uid");
		var project_id=<?php echo $_GET['project_id']?>;
		var award=1;
		$.ajax({
			type:'POST',
			url:"action_shortlist.php",
			data:{project_id:project_id,user:user,award:award},
			dataType:'html',
			success:function(data){
				location.reload();
				//alert(data);
			}
		});
    });
	
	$(".cancel").click(function(e) {
        var cncl=$(this).attr("milestone_cancel");
		var can='1';
		conf=confirm("Are you Sure??");
		if(conf==true)
		{
			$.ajax({
				type:'POST',
				url:'action_milestone.php',
				data:{cncl:cncl,can:can},
				success:function(){
					location.reload();
				}
			});
		}
    });
	
	$(".release").click(function(e) {
        var project_id='<?php echo $_GET['project_id'];?>';
		
		var release='true';
		var rel=$(this);
		var id=rel.attr("milestone");
		var total_cost='<?php echo $bid_check['cost'];?>';
		
		var paypal_id='<?php echo $user['paypal_Account'];?>';
		if(paypal_id=='')
		{
			alert("Please Contact developer to add his/her Paypal Account");
		}
		else
		{
			$.ajax({
				type:'POST',
				url:'action_milestone_calc.php',
				data:{project_id:project_id,release:release,id:id,total_cost:total_cost},
				dataType:'html',
				success:function(data){
					//alert(data);
					if(data=='first')
					{
						call_paypal();
					}
					if(data=='remain')
					{
						single_payment();
					}
					if(data=='admin_pay')
					{
						admin_payment(data);
					}
				}
			});
		}
    });
});
function call_paypal()
{
	var p_id='<?php echo $_GET['project_id']?>';
	var currency='<?php echo $row['currency'];?>';
	var developer_id='<?php echo $user['unique_code'];?>';
	
		window.location.href="paypal/samples/Pay.php?project_id="+p_id+"&currency="+currency+"&developer="+developer_id;
	
}

function single_payment()
{
	var p_id='<?php echo $_GET['project_id']?>';
	var currency='<?php echo $row['currency'];?>';
	var developer_id='<?php echo $user['unique_code'];?>';
	
		window.location.href="paypal/samples/Pay_single.php?project_id="+p_id+"&currency="+currency+"&developer="+developer_id;
}

function admin_payment(str)
{
	var p_id='<?php echo $_GET['project_id']?>';
	var currency='<?php echo $row['currency'];?>';
	var developer_id='<?php echo $user['unique_code'];?>';
	
	window.location.href="paypal/samples/Pay_single.php?project_id="+p_id+"&currency="+currency+"&developer="+developer_id+"&str="+str;
}
</script>
</html>
