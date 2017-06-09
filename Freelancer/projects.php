<?php include('Admin/MyInclude/MyConfig.php'); ?>
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

</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"include/header.php"; ?>

<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="titlebar-heading">
                        <h1 style="font-size:24px; line-height:30px;">Browse Projects
</h1>
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
        
		<?php 
        $sql_projects=mysql_query("select * from post_projects where status='pending'");

        $total_rows = mysql_num_rows($sql_projects);
        
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
        
        $res = mysql_query("select * from post_projects where status='pending' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
        
        if(mysql_affected_rows())
        {
            while($row=mysql_fetch_array($res))
            {
                $sql_client=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[uid]'"));
            ?>
				<div class="row-fluid">
                	<div class="span9">
						<ul class="product_list_widget">
                  			<li>
                        	<a href="javascript:void(0);" title="<?php echo $sql_client['first_name'].' '.$sql_client['last_name']?>"><img style="width:50px;height:50px; border-radius:4px;" src="<?php echo WebUrl;?>Profile Picture/<?php echo $sql_client['profile_picture']?>" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError="src='Profile Picture/no_image.jpg'"/></a>
                            <a href="javascript:void();"><font style="color:#f1c40f"><?php echo $row["title"];?></font></a>
                            
                            <font style="font-size:13px"><?php echo limit_words($row["description"],8)?></font><br />
                            
                        </li>
					</ul>
				</div>
                <div class="span3">
                	<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000"><?php echo $row["budget"].' '.$row['currency']?></font><br />
                    
                </div>
                <div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                	<span></span>
                </div>
			</div>
            <?php
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
</section>

<?php include "include/footer.php"; ?>
</body>
</html>