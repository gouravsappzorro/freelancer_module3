<?php
session_start();
?>
<?php include('./Admin/MyInclude/MyConfig.php'); ?>
<?php
error_reporting(0);
if (!isset($_SESSION['user'])) 
{
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="Login/login.php";
     </script>
<?php
}
?>
<?php

	$custom_url='';

	foreach($_REQUEST as $key=>$value)
	{
		if($value=='')
		{
			continue;
		}
		if(is_array($value))
		{
			$value=implode('__',$value);
		}
		else
		{
			$value;
		}
		
		$custom_url .=	$key.'='.str_replace('&','_and_',$value)."&";
		
	}
?>


<?php  
include('per_page.php');
  
$where='where True and status="pending"';


if(isset($_REQUEST['type']) && $_REQUEST['type']!='both' && $_REQUEST['type']!="")
{
	$where .=" and type_of_project='".$_REQUEST['type']."'";
}
else if(isset($_REQUEST['type']) && $_REQUEST['type']=='both' && $_REQUEST['type']!="")
{ 
	$where .=" and (type_of_project='fixed' or type_of_project='hourly')";
}

if(isset($_REQUEST['startprice']) && $_REQUEST['startprice']!='' )
{
	$where .=" and budget >=".$_REQUEST['startprice']."";
}
if(isset($_REQUEST['endprice']) && $_REQUEST['endprice']!='')
{
	$where .=" and budget <=".$_REQUEST['endprice']."";
}
/*if(isset($_REQUEST['startprice']) && $_REQUEST['startprice']!='' && isset($_REQUEST['endprice']) && $_REQUEST['endprice']!='')
{
	$where .=" and budget between ".$_REQUEST['startprice']." and ".$_REQUEST['endprice'];
}*/
if(isset($_REQUEST['locality']) && $_REQUEST['locality']!='')
{
	$where .=" and location like '%".$_REQUEST['locality']."%'";
}


if(isset($_REQUEST['skills']) && $_REQUEST['skills']!="")
{
	
	$Data=implode(",",$_REQUEST['skills']);
	$val=explode(',',$Data);
	$total=count($val);
	//$where .=" and skills in ('".$Data."')";	
	for($i=0;$i<$total;$i++)
	{
		if($i==0)
		{
			$where .=" and skills like '%".$val[$i]."%'";	
		}
		else
		{
			$where .=" or skills like '%".$val[$i]."%'";	
		}
	}	
}
if(isset($_REQUEST['search']) && $_REQUEST['search'] != '')
{
	$where .=" and title like '%".$_REQUEST['search']."%'";
}

$bid_res=mysql_query("select * from bid_info where uid='".$_SESSION['id']."' and Status='active'");
$bids=mysql_fetch_array($bid_res);

//echo "select * from post_projects $where";
  
	if(isset($_REQUEST['locality']) && $_REQUEST['locality']!='')
	{
		//$where .=" and location like '%".$_REQUEST['locality']."%'";
		$check_location .=" and project_id IN(select project_id from projects_location where location_name='".$_REQUEST['locality']."') ";
		$qry="select * from post_projects $where UNION select * from post_projects $where $check_location";
	}
	else{
		$qry="select * from post_projects $where";
	}
	$Total=mysql_num_rows(mysql_query($qry));
	if(isset($_GET['showpage']))
	{ 
		$Show=$_GET['showpage'];
	}
	else
	{ 
		$Show=10;
	}
	$Total_page =   ceil($Total/$Show);
	$page_cur   =  (isset($_GET['page']))?$_GET['page']:1;
	$Main       =  ($page_cur-1)*$Show;	
  //echo "select * from post_projects $where limit $Main,$Show";
    if(isset($_REQUEST['locality']) && $_REQUEST['locality']!='')
	{
		$check_location .=" and project_id IN(select project_id from projects_location where location_name='".$_REQUEST['locality']."') ";
		$qry="(select * from post_projects $where) UNION (select * from post_projects $where $check_location)  limit $Main,$Show";
		//~ $select=mysql_query("select * from post_projects $where order by id desc limit $Main,$Show");
		$select=mysql_query($qry);
	}
	else
	{
		$qry="select * from post_projects $where order by id desc limit $Main,$Show";
		//~ $select=mysql_query("select * from post_projects $where order by id desc limit $Main,$Show");
		$select=mysql_query($qry);
	}
  
if(isset($_GET['search']) || isset($_GET['type']) || isset($_GET['startprice']) || isset($_GET['endprice']) || isset($_GET['skills']) || isset($_GET['locality']))
{
$pg="&search=$_GET[search]&type=$_GET[type]&startprice=$_GET[startprice]&endprice=$_GET[endprice]&skills=$_GET[skills]&locality=$_GET[locality]";
}
else
{
	$pg='';
}
$str="";

$str.=' <div class="page-nav">

		 Show <a href="browseprojects.php?showpage=20"'.$pg;
		 if(isset($_GET['showpage']) and $_GET['showpage']==20)
		 {
			 $str .= 'class="active"';
		 }
		$str .= '>20 </a>, <a href="browseprojects.php?showpage=50"'.$pg;
		
		if(isset($_GET['showpage']) and $_GET['showpage']==50)
		{
			$str .= 'class="active"';
		}
		$str .= '>50 </a> , <a href="browseprojects.php?showpage=100"'.$pg;
		
		if(isset($_GET['showpage']) and $_GET['showpage']==100)
		{
			$str .= 'class="active"';
		}
		$str .= '>100 </a> Records ';

		$str .=  '</div>';
		
	$str .='<div class="span9">';
	
	if(isset($_SESSION['success']))
	{
		$str .="<div class='span12'><div class='alert alert-danger fade in' style='background-color:#dff0d8; color:#3c763d; border-color: #d6e9c6;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<strong></strong> ".$_SESSION['success']."
		</div></div>";
		unset($_SESSION['success']);
	}
	
	if(isset($_SESSION['error']))
	{
		$str .= "<div class='span12'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
		<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
		<strong></strong> ".$_SESSION['error']."
		</div></div>";
		unset($_SESSION['error']);
	}

	$cnt=mysql_num_rows($select);
					
	while ($row = mysql_fetch_array($select))
	{
		if($row['status']!='pending')
		{
			continue;	
		}
		
		$sql_client=mysql_fetch_array(mysql_query("select * from register where unique_code='$row[uid]'"));
		$str .='<input type="hidden" id="rowcount" name="rowcount" />';
	
		$str .='<div class="inner-content">';
			$str .='<div class="span9">';
				$str .='<ul class="product_list_widget">';
					$str .='<li>';
						$str .='<a href="javascript:void(0);" title="'.$sql_client['first_name'].' '.$sql_client['last_name'].'">';
						
						if($sql_client['profile_picture']=='')
						{
							$str .='<img style="width:50px;height:50px; border-radius:4px;" src="'.WebUrl.'Profile Picture/no_image.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" /></a>';
						}
						else
						{
							$str .='<img style="width:50px;height:50px; border-radius:4px;" src="'.WebUrl.'Profile Picture/'.$sql_client['profile_picture'].'" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;" onError=this.src="'.WebUrl.'Profile Picture/no_image.jpg"/></a>';
						}
						
						$str .='<a href="'.WebUrl.'bidding.php?project_id='.$row["project_id"].'"><font style="color:#f1c40f">'.$row["title"].'</font></a>';
										
										
						$str .='<font style="font-size:13px">'.limit_words($row["description"],30).'</font><a href="'.WebUrl.'bidding.php?project_id='.$row["project_id"].'">Read more</a><br />';
						
						$str .='<a href=""><font style="text-transform:none;">'.$row["skills"].'</font></a>';
					$str .='</li>';
				$str .='</ul>';
						
			$str .='</div>';
			$str .='<div class="span3">';
				$str .='<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">'.$row['currency'].' '.$row["budget"].'</font><br />';
				$str .='<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On: '.$row['post_date'].'</font><br>';
									
			$str .='</div>';
		$str .='</div>';
					
		$str .='<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">';
			$str .='<span></span>';
		$str .='</div>';
					
	}
$str .='</div>';


$str .= '<div class="page-nav clearfix ">
 Show <a href="browseprojects.php?showpage=20"';
		 if(isset($_GET['showpage']) and $_GET['showpage']==20)
		 {
			 $str .= 'class="active"';
		 }
		$str .= '>20 </a>, <a href="browseprojects.php?showpage=50"';
		
		if(isset($_GET['showpage']) and $_GET['showpage']==50)
		{
			$str .= 'class="active"';
		}
		$str .= '>50 </a> , <a href="browseprojects.php?showpage=100"';
		
		if(isset($_GET['showpage']) and $_GET['showpage']==100)
		{
			$str .= 'class="active"';
		}
		$str .= '>100 </a> Records ';
	$str .=  '</div>';
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
	<?php include('./include/script.php');  ?>
	
    <script type="text/javascript" lang="javascript">
	
	function formSubmit()
	{
		document.myform.submit();
	}
	</script>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

<?php include"./include/header.php"; ?>

<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">

    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Browse Projects</h1>
                            <div class="hr hr-border-primary double-border border-small"> <span></span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
	</div>
</section>
<!--End Header -->

<div class="inner-content" id="msg"></div>

<section class="section" style="padding-top:80px; padding-bottom:30px;">
<div class="container">
	<div class="row-fluid">
    	<div class="row-fluid">
        	<div class="span3">
            	<div class="inner-content">
		            <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Search Jobs</span></h3>
        		    <form id="myform" name="myform" action="" method="post">
                		<input type="text" name="search" id="search" value="<?php if(isset($_REQUEST['search'])){ echo $_REQUEST['search']; }?>" placeholder="Search Jobs By Name" onBlur="formSubmit();">
						<br />
                  		<label><strong>Projcets Type:</strong></label>
                  		<br />
                  		<input <?php if(isset($_REQUEST['type'])){ $type=$_REQUEST['type']; if($type=='fixed'){echo 'checked="checked"';}} ?> type="radio"  id="fixed" onClick="formSubmit();" name="type" value="fixed">
              		    Fixed Price <br />
                  		<input <?php if(isset($_REQUEST['type'])){ $type=$_REQUEST['type']; if($type=='hourly'){echo 'checked="checked"';}} ?> type="radio" id="hourly" name="type" value="hourly" onClick="formSubmit();">
                		Hourly Price <br />
						<input <?php if(isset($_REQUEST['type'])){ $type=$_REQUEST['type']; if($type=='both'){echo 'checked="checked"';}} ?> type="radio" id="both" name="type" value="both" onClick="formSubmit();">
						Both <br />
						<br />
						<label><strong>Price:</strong></label>
						<br />
						<input type="text" id="startprice" name="startprice"   placeholder="Min." onBlur="formSubmit();" value="<?php if(isset($_REQUEST['startprice'])){ echo $_REQUEST['startprice']; } ?>">
						<input type="text" id="endprice" name="endprice" value="<?php if(isset($_REQUEST['endprice'])){ echo $_REQUEST['endprice']; } ?>" placeholder="Max." onBlur="formSubmit();">
						<br />
						<br />
						<label><strong>Select Skills:</strong>:</label>
						<br />
                        
						<input type="checkbox"  name="skills[]" id="PHP" <?php if(in_array('PHP',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?>  value="PHP" onClick="formSubmit();">
						PHP <br />
						
                        <input type="checkbox" name="skills[]" <?php if(in_array('Wordpress',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?>  id="Wordpress" value="Wordpress" onClick="formSubmit();">
                        Wordpress <br />
						
                        <input type="checkbox" name="skills[]" <?php if(in_array('Joomla',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> id="Joomla" value="Joomla" onClick="formSubmit();">
                        Joomla <br />
						
                        <input type="checkbox" name="skills[]" <?php if(in_array('CakePHP',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="CakePHP" onClick="formSubmit();">						
                        Cake PHP <br />

						<input type="checkbox" name="skills[]" <?php if(in_array('YiiPHP',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="YiiPHP" onClick="formSubmit();">                  
						Yii PHP <br />

						<input type="checkbox" name="skills[]"<?php if(in_array('Concrete5',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="Concrete5" onClick="formSubmit();">
                        Concrete5 <br />
                        
						<input type="checkbox" name="skills[]" <?php if(in_array('WooCommerce',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="WooCommerce" onClick="formSubmit();">
						WooCommerce <br />
                        
						<input type="checkbox" name="skills[]"<?php if(in_array('Magento',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?>  value="Magento" onClick="formSubmit();">
						Magento <br />
                        
						<input type="checkbox" name="skills[]" <?php if(in_array('Volusion',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?>value="Volusion" onClick="formSubmit();">
						Volusion <br />
                        
						<input type="checkbox" name="skills[]"<?php if(in_array('AngularJS',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="AngularJS" onClick="formSubmit();">
						Angular JS <br />
                        
						<input type="checkbox" name="skills[]"<?php if(in_array('OpenCart',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="OpenCart"onClick="formSubmit();">
						Open Cart <br />
		
						<input type="checkbox" name="skills[]"<?php if(in_array('Prestashop',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="Prestashop" onClick="formSubmit();">
						Prestashop <br />
                        
						<input type="checkbox" name="skills[]"<?php if(in_array('AndroidApp',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="Android" onClick="formSubmit();">
						Android App <br />
                        
						<input type="checkbox" name="skills[]" <?php if(in_array('iOSApp',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="iOS" onClick="formSubmit();">
						iOS App <br />
                        
						<input type="checkbox" name="skills[]" <?php if(in_array('WindowsApp',$_REQUEST['skills'])){ echo 'checked="checked"'; } ?> value="Windows" onClick="formSubmit();">
						Windows App <br />
						<br />
						<label><strong>Location:</strong></label>
						<br />
						<!--<input  type="text" id="locality" name="locality" onBlur="formSubmit();" value="<?php if(isset($_REQUEST['locality'])){ echo $_REQUEST['locality']; } ?>" placeholder="Type & search location">-->
						
						<select name="locality" id="locality" onBlur="formSubmit();" onChange="formSubmit();" >
                        	<option value="">Select Location</option>
							<?php $location_res=mysql_query("select * from location");
                                                              while($location_row=mysql_fetch_array($location_res))
                                                              {
                                                        ?>
                                                            <option value="<?php echo $location_row['Code']; ?>"><?php echo $location_row['Name']; ?></option>
                                                        <?php }
                                                         ?>
						</select>
						<div id="location"></div>
                                                        <script type="text/javascript">
                                                            $('select#tokenize_placehoder').tokenize({
                                                                placeholder: "e.g. India, United-States , Israel"
                                                            });
                                                        </script>
<!--
                                                        </br>
                                                 <label>
															<strong>
															Please allow bids from:
															</strong>
                                                        </label>
                                                        </br>
                                                             
                                                             <input type="radio" name="location_type" id="everyone" value="1">Everyone
															 <input type="radio" name="location_type" id="geo_based" value="2">Geo-Based        
-->
					</form>
				</div>
			</div>
        
        <!-- First Project -->
        

        	<div id="title"> 
		
			<?php
			if($cnt > 0)
			{
				echo $str; 
			}
			else
			{ 
				echo"<div class='span8'><div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
			<strong>Alert!</strong> Projects Not Available
			</div></div>";
			}
			?> 
        
        	</div>
		</div>
	</div>
</div>
</section>
<?php include "./include/footer.php"; ?>
<!-- End footer -->
<script>
	window.history.pushState('', '',"<?php echo $_SERVER['PHP_SELF'].'?'.rtrim($custom_url, "&"); ?>");
</script>

</body>
</html>
