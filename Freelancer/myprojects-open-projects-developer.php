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

	<title>Open Projects - Developer</title>
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<script>
		function blankCheck(value,id){
	
	if (value == ''){
			
			document.getElementById(id+"_error").className = "error";
			document.getElementById(id+"_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
function costCheck(value){
	
	if (value == ''){
			document.getElementById("cost_error").className = "error";
			document.getElementById("cost_error").innerHTML = ' This field is required.';
			return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
function costCheck(value){
	var regex=/^[0-9]+$/;
	if (value == ''){
			
			document.getElementById("cost_error").className = "error";
			document.getElementById("cost_error").innerHTML = ' This field is required.';
			return false;
			
	}
	else if(!regex.test(value))
	{
		document.getElementById("cost_error").innerHTML = 'Only numbers are allowed.';
		return false;
	}
	else
	{
		document.getElementById("cost_error").innerHTML = '';
		return true;		
	}
}
function durationCheck(value){
	var regex=/^[0-9]+$/;
	if (value == ''){
		document.getElementById("duration_error").className = "error";
		document.getElementById("duration_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(!regex.test(value))
	{
		document.getElementById("duration_error").innerHTML = 'Only numbers are allowed.';
		return false;
	}
	else
	{
		document.getElementById("duration_error").innerHTML = '';
		return true;		
	}
}
function bidValidation(){
	
	
	var a = blankCheck(document.getElementById("bid_message").value,document.getElementById("bid_message").id);
	var b = costCheck(document.getElementById("cost").value);
	var c = durationCheck(document.getElementById("duration").value);
	if(a && b && c){
		return true;	
	}
	else{
		return false;	
	}
}
		function bidact(Project_Id,value)
		{
			if(value==3)
			{
				window.location.href='Developer/DeveloperMessage.php?project_id='+Project_Id+'&var=2';
			}
			
			if(value==2)
			{
				var conf=confirm('are you sure you want to delete??');
				if(conf==true)
				{
				$.ajax({
					type:'POST',
					url:"action_projects_developer.php",
					data:{value:value,Project_Id:Project_Id},
					dataType:'html',
					success:function(data){
						//alert(data);
						location.reload();
					}
				});
				}
				else
				{
					location.reload();
				}
			}
			
			if(value==1){
				$.ajax({
					type:'POST',
					url:'action_projects_developer.php',
					data:{value:value,Project_Id:Project_Id},
					dataType:'html',
					success:function(data){
						$("#edit_popup").html(data);
					}
				});
				$('#edit').click();
			}
		}
	</script>

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
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px; border:1px solid #f1c40f"><span></span></div>
					</div>
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-current-projects-developer.php">Current Work</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-past-projects-developer.php">Past Work</a></span></h3>
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
						<p style="color:#000000"><strong>MY BID	</strong></p>
					</div>
					
					<div class="span1">
						<p style="color:#000000"><strong>ENDS</strong></P>
					</div>
					<div class="span2">
						<p style="color:#000000"><strong>STATUS</strong></P>
					</div>
					<div class="span2">
						<p style="color:#000000"><strong>ACTION</strong></P>
					</div>
		</div>			
		
		<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:15px;">
                    <span></span>
              </div>
<?php
	if(isset($_SESSION['id']) and $_SESSION['id']!='')
	{
		$query=mysql_query("select * from user_bids as user_bid,post_projects as post_project where user_bid.uid='".$_SESSION['id']."' and user_bid.project_id=post_project.project_id and post_project.status='pending' order by user_bid.id desc");
		
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
		
		$res = mysql_query("select * from user_bids as user_bid,post_projects as post_project where user_bid.uid='".$_SESSION['id']."' and user_bid.project_id=post_project.project_id and post_project.status='pending' order by user_bid.id desc LIMIT ".$per_page." OFFSET ".$offset);

		if(mysql_affected_rows())
		{
			while($row=mysql_fetch_array($res))
			{
			?>
				<div class="row-fluid">		
					<div class="span5">
						 <ul class="product_list_widget">
                                <li>
									<a href="bidding.php?project_id=<?php echo $row['project_id'];?>" title=""><?php echo $row['title'];?></a>
								</li>
						</ul>
					</div>
					<div class="span1">
						<p><?php echo $row['currency']." ".$row['cost'];?></p>
					</div>
					<div class="span1">
						<p><?php if($row['type_of_project']=='fixed'){echo $row['duration']." Days";}else{ echo $row['duration']." Hours";}?></p>
					</div>
					<div class="span2">
						<p><?php echo $row['status'];?></p>
					</div>
                    
                    <?php $status_check=mysql_fetch_array(mysql_query("select * from user_bids where (status='award' or status='awarded') and project_id='".$row['project_id']."'"));?>
					
                    <div class="span2" <?php if($status_check['status']=='award' or $status_check['status']=='awarded'){ ?> style="pointer-events:none;" <?php }?>>
						
							<select id="bidaction" name="bidaction" onChange="bidact(<?php echo $row['project_id'];?>,this.value)">
								<option value="0">Select</option>
								<option value="1">Edit Bid</option>
								<option value="2">Remove Bid</option>
								<option value="3">Send Message</option>
							</select>
						
					</div>
				</div>
                <div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                      <span></span>
                </div>
 				
				<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="edit" style="display:none">Open Modal</button>

  <!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
            	<h4 class="modal-title" id="myModalLabel">Bid Now</h4>
            </div>
            <div class="modal-body test">
                <div id="edit_popup"></div>
            </div> 
        </div>
    </div>
</div>
        <?php
			}
		}
		else
		{
			echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>You are not bid in any projects</div>";
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
