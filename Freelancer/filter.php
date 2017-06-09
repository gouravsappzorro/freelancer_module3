<?php 
	
	include('./Admin/MyInclude/MyConfig.php');
	include('per_page.php');
	$select = 'SELECT *';
  	$from = ' FROM post_projects';
  	$where = ' WHERE TRUE';
  	$opts = isset($_POST['filterOpts'])? $_POST['filterOpts'] : array('');

 	if (in_array("PHP", $opts))
	{
	 	$php="PHP";
 	}
	else
	{
		$php='';
	}
 
  	if (in_array("Wordpress", $opts))
	{
  		 $wp ="Wordpress";
 	}
  	else
  	{
	 	$wp=''; 
	}
	if (in_array("fixed", $opts))
	{
	 	$fixed="fixed";
 	}
	else
	{
		$fixed='';
	}
	if (in_array("hourly", $opts))
	{
	 	$hourly="hourly";
 	}
	else
	{
		$hourly='';
	}
	
	if (isset($_POST['location']))
	{
		$location=$_POST['location'];	 
 	}
	else
	{
		$location="";
	}
	
	/*if (isset($_POST['minimum']))
	{
	 	// $startprice=$_POST['minimum'];
		 if($_POST['minimum']==''){
			 $startprice="";
			//$where .= " AND (budget<=".$_POST['maximum'].")";
		}
		else
		{
			$startprice=$_POST['minimum'];
			$where .= " AND (budget>=".$_POST['minimum'].")";
		}
		 
 	}
	else
	{
		$startprice="";
	}
	
	if (isset($_POST['maximum']))
	{
	 	if($_POST['maximum']==''){
			$endprice="";
			// $where .= " AND (budget>=".$_POST['minimum'].")";
		}
		else
		{
			$endprice=$_POST['maximum'];
			$where .= " AND (budget<=".$_POST['maximum'].")";
		}
 	}
	else
	{
		$endprice="";
	}*/
	
	if($location)
	{
		 $where .= " AND (location='".$location."')";
	}
	
	/*if($startprice!="" && $endprice!="")
	{
		 $where .= " AND (budget between ".$startprice." and ".$endprice.")";
	}

	else
	{
		$where.="";
	}*/
	
	if($fixed=="fixed" || $hourly=="hourly")
	{
	
		 $where .= " AND (type_of_project='".$fixed."' or type_of_project='".$hourly."')";
	}

	else
	{
		$where.="";
	}
	
	if($php=="PHP" || $wp=='Wordpress')
	{
		 $where .= " AND (skills='".$php."' or skills='".$wp."')";
	}
	else
	{
		$where.="";	
	}
 /*-------- */
 
if(isset($_POST['filterOpts']) || isset($_POST['location']) || isset($_POST['maximum']) || isset($_POST['minimum']))
 {	
$paginationlink = "filter.php?page=";					
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}
 
$start = ($page-1)*perpage;
if($start < 0) $start = 0;

echo $sql1=$select . $from . $where;/* print dat*/
$res1=mysql_query($sql1);
//$sql ="select * from post_projects"." limit " . $start . "," .perpage; 
//$res=mysql_query($sql);
echo $sql=$select . $from . $where." limit " . $start . "," .perpage;/* print dat*/
$res=mysql_query($sql);

if(empty($_POST["rowcount"])) {
	
$_POST["rowcount"] =mysql_num_rows($res1);
}
//echo $_GET["rowcount"];
$perpageresult =perpagefilter($_POST["rowcount"],$paginationlink);
  /*--------------*/
$str="";	
$str.=' <div class="page-nav" align="right">
		 Show <a href="" class="active">20 </a>, <a href="">50 </a> , <a href="">100 </a> Records  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <span class="active">1</span><a href="#">2</a><a href="#" class="next">Next<i class="fa-angle-right"></i></a>
    </div>';
	
	//$sql1=$select . $from . $where;/* print dat*/
	//$res1=mysql_query($sql1);
	$str .='<div class="span9">';
  	while ($row = mysql_fetch_array($res))
	{
$str .='<input type="hidden" id="rowcount" name="rowcount" value="' . $_POST["rowcount"] . '" />';

  $str .='<div class="inner-content">';
					  $str .='<div class="span9">';
						 $str .='<ul class="product_list_widget">';
                                $str .='<li>';
									$str .='<a href="#" title="">';
									$str .='<img style="width:50px;height:50px; border-radius:4px;" src="images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/></a>';
									$str .='<a href=""><font style="color:#f1c40f">'.$row["title"].'</font></a>';
									
                                	
									$str .='<font style="font-size:13px">'.limit_words($row["description"],10).'</font><a href="'.WebUrl.'Post_project_read_more.php?id='.$row["id"].'">Read more</a><br />';
									$str .='<a href=""><font style="text-transform:none;">'.$row["skills"].'</font></a>';
								$str .='</li>';
						$str .='</ul>';
					
					$str .='</div>';
					$str .='<div class="span3">';
						$str .='<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">$'.$row["budget"].'</font><br />';
						//$str .='<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On:'.$row["niceDate"].'</font><br />';
						$str .='span><a href=""><strong>Bid Now</strong></a></span>';
					$str .='</div>';
				$str .='</div>';
				
				$str .='<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">';
                    $str .='<span></span>';
              	$str .='</div>';
								
}
$str .='</div>';	
if(!empty($perpageresult)) {
$str .= '<div class="page-nav clearfix ">' . $perpageresult . '</div>';
}			
echo $str; 
 }
 else
{
	
$paginationlink = "filter.php?page=";					
$page = 1;
if(!empty($_GET["page"])) {
$page = $_GET["page"];
}

$start = ($page-1)*perpage;
if($start < 0) $start = 0;
/*--------- */
echo $sql1 ="select * from post_projects"; 
$res1=mysql_query($sql1);
/*-----*/

echo $sql ="select * from post_projects"." limit " . $start . "," .perpage; 
$res=mysql_query($sql);


if(empty($_POST["rowcount"])) {
	
$_POST["rowcount"] =mysql_num_rows($res1);
}
$perpageresult =perpage($_POST["rowcount"], $paginationlink);
  /*--------------*/
	
$str='';
$str.=' <div class="page-nav" align="right" >
		 Show <a href="" class="active">20 </a>, <a href="">50 </a> , <a href="">100 </a> Records  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <span class="active">1</span><a href="#">2</a><a href="#" class="next">Next<i class="fa-angle-right"></i></a>
    </div>';
	 $str .='<div class="span9">';
	//$sql1=$select . $from . $where;/* print dat*/
	//$res1=mysql_query($sql1);
  	while ($row = mysql_fetch_array($res))
	{

	$str .='<input type="hidden" id="rowcount" name="rowcount" value="' . $_POST["rowcount"] . '" />';
  $str .='<div class="inner-content">';
  
					  $str .='<div class="span9">';
						 $str .='<ul class="product_list_widget">';
                                $str .='<li>';
									$str .='<a href="#" title="">';
									$str .='<img style="width:50px;height:50px; border-radius:4px;" src="images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/></a>';
									$str .='<a href=""><font style="color:#f1c40f">'.$row["title"].'</font></a>';
									
                                	
									$str .='<font style="font-size:13px">'.limit_words($row["description"],10).'</font><a href="'.WebUrl.'Post_project_read_more.php?id='.$row["id"].'">Read more</a><br />';
									$str .='<a href=""><font style="text-transform:none;">'.$row["skills"].'</font></a>';
								$str .='</li>';
						$str .='</ul>';
					
					$str .='</div>';
					$str .='<div class="span3">';
						$str .='<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">$'.$row["budget"].'</font><br />';
						//$str .='<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On:'.$row["niceDate"].'</font><br />';
						$str .='span><a href=""><strong>Bid Now</strong></a></span>';
					$str .='</div>';
				$str .='</div>';
				
				$str .='<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">';
                    $str .='<span></span>';
              	$str .='</div>';
								
}
$str .='</div>';
if(!empty($perpageresult)) {
$str .= '<div class="page-nav clearfix ">' . $perpageresult . '</div>';
}
	
echo $str; 
 
}
?>