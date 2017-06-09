<?php
session_start();
?>
<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user'])) {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="Login/login.php";
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

	<title>Open Projects - Client</title>
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php include('include/script.php');  ?>
    <?php include('include/validation.php'); ?>
    
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

<?php include"include/header.php"; ?>

    <!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">My Projects</h1>
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
    <!--End Header -->

    <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <div class="row-fluid">
			<br /><br />
			
	<div class="row-fluid">
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-open-projects-client.php">Open for Bidding</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px; border:1px solid #f1c40f"><span></span></div>
					</div>
					<div class="span4">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-current-projects-client.php">Work in Progress</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-past-projects-client.php">Past Projects</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span3">
						<p style="color:#000000"><strong></strong></p>
					</div>
	</div>				
			<!-- 1st Bidder Block -->
			
	<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:35px;">
                    <span></span>
              </div>
	
	 <div class="row-fluid">
			<!-- 1st Bidder Block -->
				
					<div class="span5">
						<p style="color:#000000"><strong>PROJECT NAME</strong></p>
					</div>
					<div class="span1">
						<p style="color:#000000"><strong>BIDS</strong></p>
					</div>
					<div class="span1">
						<p style="color:#000000"><strong>AVG</strong></p>
					</div>
					<div class="span2">
						<p style="color:#000000"><strong>BID ENDS</strong></P>
					</div>
					<div class="span1">
						<p style="color:#000000"><strong>Q & A</strong></P>
					</div>
					<div class="span2">
						<p style="color:#000000"><strong>ACTION</strong></P>
					</div>
		</div>			
		
		<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:15px;">
                    <span></span>
              </div>
			<?php
			
			$query=mysql_query("select * from post_projects where uid='$_SESSION[id]' and status='pending'");
		
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
			
			$res = mysql_query("select * from post_projects where uid='$_SESSION[id]' and status='pending' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
			
			if(mysql_affected_rows())
			{
				while($row=mysql_fetch_array($res))
				{
		?>
        		<div class="row-fluid">		
					<div class="span5">
						 <ul class="product_list_widget">
                                <li>
									<a href="browse_detail_client.php?project_id=<?php echo $row['project_id']?>" title=""><?php echo $row['title'];?></a>
								</li>
						</ul>
					</div>
                    <?php
						$bid_count=mysql_fetch_array(mysql_query("select count(project_id) as pid from user_bids where project_id='$row[project_id]'"));
					?>
					<div class="span1">
						<p><?php echo $bid_count['pid'];?></p>
					</div>
                    
                    <?php
						$avg_bid=mysql_fetch_array(mysql_query("select format(avg(cost),0) as avg from user_bids where project_id='$row[project_id]'"));
					
					?>
                    
					<div class="span1">
						<p>
						<?php
							if($avg_bid['avg']<=0)
							{
								echo $row['currency']." ".'0';
							}
							else
							{
								echo $row['currency']." ".$avg_bid['avg'];
							}
						?>
                        </p>
					</div>
					<div class="span2">
						<p>
                        <?php
						$date1 = date('Y-m-d');
						$date2 = $row['bid_end_date'];
						if($date2>$date1)
						{
						$diff = abs(strtotime($date2) - strtotime($date1));
						
						$years = floor($diff / (365*60*60*24));
						$months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
						$days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
						
						printf("%d months, %d days\n", $months, $days);
						}
						else
						{
							echo "Bid Ends";
						}

						?>
                        </p>
					</div>
					<div class="span1">
						<a href="AddQuestionAnswerClient.php?project_id=<?php echo $row['project_id']?>" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i></a>
					</div>
					<div class="span2">
						<form name="" action="" method="post">
							<select id="bidaction" name="bidaction" onChange="editdata(<?php echo $row['project_id'];?>,this.value)">
								<option value="0">Select</option>
								<option value="1">Cancel Project</option>
								<option value="2">Evaluate Bids</option>
                                <option value="3"><?php if($row['isSuspend']=='Yes'){?>Active Project<?php }else{echo 'Suspend Project';} ?></option>
							</select>
						</form>
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
				echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>Projects not found</div>";
			}
		?>
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
    </section>

   <?php include "include/footer.php"; ?>
<script>
function editdata(project_id,value)
{
	
	if(value==1)
	{
		var conf=confirm("are you sure to Cancel this project?");
		if(conf==true)
		{
			$.ajax({
				type:'POST',
				url:'action_projects_client.php',
				data:{project_id:project_id,value:value},
				success:function(){
					location.reload();
				}
			});
		}
		else
		{
			location.reload();
		}
	}
	
	if(value==2)
	{
		window.location='browse_detail_client.php?project_id='+project_id;
	}
	
	if(value==3)
	{
		var conf=confirm("are you sure to Cancel this project?");
		if(conf==true)
		{
			$.ajax({
				type:'POST',
				url:'action_projects_client.php',
				data:{project_id:project_id,value:value},
				success:function(msg){
					alert(msg);
					location.reload();
				}
			});
		}
		else
		{
			location.reload();
		}
	}
}
</script>   
   
	</body>
</html>

