<?php session_start(); ?>
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

	<title>Past Projects - Client</title>
	<!--[if lte IE 8]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
    <link rel="stylesheet" href="css/star-rating.css" type="text/css">
	<?php include('include/script.php');  ?>
   	<script src="js/star-rating.js" type="text/javascript"></script>

    
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
    <!--End Header -->

    <section class="section" style="padding-top:0; padding-bottom:40px;">
    <div class="container">
	<br /><br />
	
	<div class="row-fluid">
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-open-projects-client.php">Open for Bidding</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px; border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span4">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-current-projects-client.php">Work in Progress</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #efefef"><span></span></div>
					</div>
					<div class="span3">
						<h3 class="title textleft default bw-2px dh-2px divider-light bc-dark dw-default color-default" style="margin-bottom:0px"><span><a href="myprojects-past-projects-client.php">Past Projects</a></span></h3>
						<div class="hr border-small dh-2px alignleft hr-border-primary" style="margin-top:15px;margin-bottom:25px;border:1px solid #f1c40f"><span></span></div>
					</div>
					<div class="span3">
						<p style="color:#000000"><strong></strong></p>
					</div>
	</div>				
	
	<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:35px;">
                    <span></span>
              </div>
	
<div class="row-fluid" style="background-color:f6f6f6;">
<!-- 1st Bidder Block -->
    
        <div class="span4">
            <p style="color:#000000"><strong>PROJECT NAME</strong></p>
        </div>
        <div class="span2">
            <p style="color:#000000"><strong>DEVELOPER</strong></p>

        </div>
        <div class="span2">
            <p style="color:#000000"><strong>BIDS</strong></p>
        </div>
        <div class="span2">
            <p style="color:#000000"><strong>AWARDED BID</strong></p>
        </div>
        <div class="span2">
            <p style="color:#000000"><strong>STATUS</strong></P>
        </div>
</div>			
		
<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:15px;">
    <span></span>
</div>

	<?php

	$query=mysql_query("select * from post_projects where uid='$_SESSION[id]' and status='complete'");
		
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
	
	$res = mysql_query("select * from post_projects where uid='$_SESSION[id]' and status='complete' order by id desc LIMIT ".$per_page." OFFSET ".$offset);
	
	if(mysql_affected_rows())
	{
		while($row=mysql_fetch_array($res))
		{
			?>		
			<div class="row-fluid">
  
                <div class="span4">
                    <a href="browse_detail_client.php?project_id=<?php echo $row['project_id']?>" title=""><?php echo $row['title'];?></a>
                </div>
        			<?php $developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[developer_id]'"));?>

        		<div class="span2">
            		<p><?php echo $developer['first_name']." ".$developer['last_name'];?></p>
        		</div>

				<?php
        			$user_bid=mysql_fetch_array(mysql_query("select * from user_bids where project_id='$row[project_id]' and uid='$row[developer_id]'"));
        
        		?>
        		<div class="span2">
	        		<p><?php echo $row['currency'].' '.$user_bid['cost'];?></p>
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
            		<p><?php echo $row['status'];?></p>
            	
					<?php 
					$rate=mysql_fetch_array(mysql_query("select * from rating where project_id='$row[project_id]'"));
					?>
            	
                	<p><button class="button default-button button_default btn btn-primary btn-lg projectid" data-toggle="modal" data-target=".modal" pId="<?php echo $row['project_id'];?>" <?php if($rate['client_status']=='1'){ ?> style="pointer-events:none;" <?php }?>><?php if($rate['client_status']=='0' or $rate['client_status']==''){ ?>Rate Now <?php }else {?> Rated <?php }?></button></p>
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
		echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>You have no any post projects</div>";
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
    	
    <!--======= Popup =======-->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
        <div class="modal-content">
        	<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times-circle"></i></button>
                    <h4 class="modal-title" id="myModalLabel">Rate Now</h4>
                </div>
    
                <div class="modal-body test">
                
                <div id="message"></div>
                
                <form name="form1" method="post">
                    <label for="Punctuality">Punctuality</label>
                    <input id="Punctuality" value="" type="number" class="rating" min=0 max=5 step=1 data-size="xs" onBlur="blankCheck(this.value,this.id)">
                    <div style="color:RED;" id="Punctuality_error" class="error"></div>
                    
                    <label for="Proffesionalism">Proffesionalism</label>
    				<input id="Proffesionalism" value="" type="number" class="rating" min=0 max=5 step=1 data-size="xs" onBlur="blankCheck(this.value,this.id)">
                    <div style="color:RED;" id="Proffesionalism_error" class="error"></div>
                    
                    <label for="Would rehire">Would rehire</label>
					<input id="Would_rehire" value="" type="number" class="rating" min=0 max=5 step=1 data-size="xs" onBlur="blankCheck(this.value,this.id)">
                    <div style="color:RED;" id="Would_rehire_error" class="error"></div>
                   	
                    
                    <textarea style="width:100%;" name="rate_message" id="rate_message" type="text" placeholder="Review Message" onBlur="MessageCheck(this.value,this.id)"></textarea>
                    
                	<div style="color:RED;" id="rate_message_error" class="error"></div><br>

                	<input type="hidden" name="projectId" id="projectId" value="">
                
                	<div class="modal-footer">
                
                	<button type="button" class="btn btn-default" data-dismiss="modal" onClick="location.reload();">Close</button>
                
                	<input type="button" class="button" style="border-radius:4px;" name="submit" id="submit" value="Submit">
                	<img src="images/loader.gif" style="visibility:hidden" id="load_data">
                	</div>
                </form>  
            </div> 
        </div>
    </div>
</div>
<!--======= Popup End =======--> 
        </div>
     </section>
<?php include "include/footer.php"; ?>
   </body>

<script>

//rating validation
function blankCheck(value,id){
	
	if (value == '' || value == 0){
			
		//document.getElementById(id+"_error").className = "error";
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}

function MessageCheck(value,id)
{
	if (value == '' || value == 0)
	{
		document.getElementById(id+"_error").innerHTML = ' This field is required.';
		return false;
	}
	else if(value.length < 5 || value.length > 1000)
	{
		document.getElementById(id+"_error").innerHTML = ' Message Between 5 to 1000 characters long.';
		return false;
	}
	else
	{
		document.getElementById(id+"_error").innerHTML = '';
		return true;		
	}
}
 // rating script
$(document).ready(function () {
			
		$("#submit").click(function(e) {
			var msg = $("#rate_message").val();
			var project = $("#projectId").val();
			var Punctuality = $("#Punctuality").val();
			var Proffesionalism = $("#Proffesionalism").val();
			var Would_rehire = $("#Would_rehire").val();
			
			var a = MessageCheck(document.getElementById("rate_message").value,document.getElementById("rate_message").id);
			var b = blankCheck(document.getElementById("Proffesionalism").value,document.getElementById("Proffesionalism").id);
			var c = blankCheck(document.getElementById("Punctuality").value,document.getElementById("Punctuality").id);
			var d = blankCheck(document.getElementById("Would_rehire").value,document.getElementById("Would_rehire").id);
			
			if(a && b && c && d)
			{
		
				$.ajax({
					type:'POST',	
					url:'ratings-action.php',
					data:{"msg":msg,"project":project,Punctuality:Punctuality,Proffesionalism:Proffesionalism,Would_rehire:Would_rehire},
					success:function(msg){
						//alert(msg);
						if(msg==1){
							$('#message').html('<div class="alert alert-success">Successfully Rated..</div>');
							setTimeout(clear, 1500);
						}
						if(msg==0)
						{
							$('#message').html('<div class="alert alert-danger">Error! Please Try Again...</div>');
							setTimeout(clear, 1500);
						}
					}
				});
				//$(this).attr("checked");
				return true;
			}
		
			else
			{
				return false;
			}
		});
	
}); 

$(".projectid").click(function(e) {
	var pid=$(this).attr("pId");
	$("#projectId").val(pid);
});

function clear()
{
	location.reload();
}
$(document).ready(function(e) {
	$(document).ajaxStart(function() {
    	$("#submit").hide();
		$("#load_data").css("visibility","visible");
	});
});

</script>

</html>
