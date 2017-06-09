<?php
session_start();
?>
<?php include('./Admin/MyInclude/MyConfig.php'); ?>
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

	<title>Current Projects - Developer</title>
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
-->	
	<?php include('include/script.php');  ?>
    <?php include('include/validation.php'); ?>
	
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

     <?php include"include/header.php"; ?>
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


<section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
        <div class="row-fluid">
			<br /><br />
			
            <div class="row-fluid">
                <div class="span3">
                    <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-open-projects-developer.php">Active Bids</a></span></h3>
                    <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px; border:1px solid #efefef"><span></span></div>
                </div>
                <div class="span3">
                    <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-current-projects-developer.php">Current Work</a></span></h3>
                    <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #efefef"><span></span></div>
                </div>
                <div class="span3">
                    <h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-past-projects-developer.php">Past Work</a></span></h3>
                    <div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #f1c40f"><span></span></div>
                </div>
                <div class="span3">
                    <p style="color:#000000"><strong></strong></p>
                </div>
            </div>				
			<!-- 1st Bidder Block -->
			
            <div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:35px;">
                <span></span>
            </div>
	
            <div class="row-fluid" style="background-color:f6f6f6;">
            <!-- 1st Bidder Block -->
            
                <div class="span4">
                    <p style="color:#000000"><strong>PROJECT NAME</strong></p>
                </div>
                <div class="span2">
                    <p style="color:#000000"><strong>EMPLOYER</strong></p>
                </div>
                <div class="span2">
                    <p style="color:#000000"><strong>BIDS</strong></p>
                </div>
                <div class="span2">
                    <p style="color:#000000"><strong>AWARDED BID</strong></p>
                </div>
                <div class="span2">
                    <p style="color:#000000"><strong>COMPLETED</strong></P>
                </div>
            </div>			
		
            <div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:15px;">
                <span></span>
            </div>
			<?php
                if(isset($_SESSION['id']) and $_SESSION['id']!='')
                {
                    
					$query=mysql_query("select * from post_projects where developer_id='$_SESSION[id]' and status='complete'");
		
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
					
					$res = mysql_query("select * from post_projects where developer_id='$_SESSION[id]' and status='complete' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
					
					
                    if(mysql_affected_rows())
                    {
                        while($row=mysql_fetch_array($res))
                        {?>
                            <div class="row-fluid">
                            <!-- 1st Bidder Block -->
                            
                                <div class="span4">
                                        <a href="bidding.php?project_id=<?php echo $row['project_id'];?>" title=""><?php echo $row['title'];?></a>
                                </div>
                                
                                <?php
                                $client=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[uid]'"));
                            
                                ?>
                            
                                <div class="span2">
                                    <p><?php echo $client['first_name']." ".$client['last_name'];?></p>
                                </div>
                                
                                 <?php
                                $user_bids=mysql_fetch_array(mysql_query("select * from user_bids where project_id='$row[project_id]' and uid='$row[developer_id]'"));
                                ?>
                                <div class="span2">
                                    <p><?php echo $row['currency']." ".$user_bids['cost'];?></p>
                                </div>
                                <div class="span2">
                                    <p>
                                    <?php
                                    $date1 = new DateTime($row['award_date']);
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
                                    </p>
                                </div>
                                <div class="span2">
                                    <?php echo $row['status'];?>
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
                        echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>You have no any past projects</div>";
                    }
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
	</div>
</section>
<?php include "include/footer.php"; ?>
	<!-- End footer -->
</body>
</html>
