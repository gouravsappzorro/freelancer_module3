<?php

	define('perpage',3);
	function perpage($count) {
		$Custom_Url=$_SERVER['REQUEST_URI'];
		//echo $_SERVER['REQUEST_URI'];
		
		$Custom_Url=explode('&', $Custom_Url);
		//echo"rtyrtyy";
		//$total_rec=$count;
		//$total_pages=ceil($total_rec/$num_rec_per_page);
		$output = '';
		
               
               
 
        		   
             
               
		if(!isset($_GET["page"])) $_GET["page"] = 1;
		//if(perpage != 0)
			 $count;
			 $pages  = ceil($count/perpage);
		//if($pages>1) {
			//if($_GET["page"] == 1) 
//				$output.='<span class="disabled"><<</span><span class="disabled"><</span>';
//			else	
//				$output.='<a onclick="getresult(\'' . $href . (1) . '\')" ><<</a><a onclick="getresult(\'' . $href . ($_GET["page"]-1) . '\')" ><</a>';
			
			
			//if(($_GET["page"]-3)>0) {
//				if($_GET["page"] == 1)
//					$output = $output . '<span id=1 class="active">1</span>';
//				else				
//					$output = $output . '<a onclick="getresult(\'' . $href . '1\')" >1</a>';
//			}
//			if(($_GET["page"]-3)>1) {
//					$output = $output . '...';
//			}
			for($i=1; $i<=$pages; $i++)	{
			//for($i=($_GET["page"]-2); $i<=($_GET["page"]+2); $i++)	{
				//if($i<1) continue;
				//if($i>$pages) break;
				//if($_GET["page"] == $i)
					//$output = $output . '<span id='.$i.' class="active">'.$i.'</span>';
				//else				
					$output = $output . '<a href="?&'.$Custom_Url[1].'&page='.$i.'">'.$i.'</a>';
			}
			
			//if(($pages-($_GET["page"]+2))>1) {
//				$output = $output . '...';
//			}
//			if(($pages-($_GET["page"]+2))>0) {
//				if($_GET["page"] == $pages)
//					$output = $output . '<span id=' . ($pages) .' class="active">' . ($pages) .'</span>';
//				else				
//					$output = $output . '<a onclick="getresult(\'' . $href .  ($pages) .'\')" >' . ($pages) .'</a>';
//			}
//			
//			if($_GET["page"] < $pages)
//				$output = $output . '<a onclick="getresult(\'' . $href . ($_GET["page"]+1) . '\')" >></a><a  onclick="getresult(\'' . $href . ($pages) . '\')" >>></a>';
//			else				
//				$output = $output . '<span class="disabled">></span><span class="disabled">>></span>';
//			
//			
//		}
?>		
	
		 <?php $i=1; ?>
		 
		 <?php for($i=1;$i<=$Total_page;$i++){ 
		 		$output = $output . '<a href="?&'.$Custom_Url[1].'&page='.$i.'">'.$i.'</a>';
		  } ?>	 
		
		
<?php
		return $output;
	//}
}
