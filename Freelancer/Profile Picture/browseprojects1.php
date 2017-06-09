<?php include('./Admin/MyInclude/MyConfig.php'); ?>
<!doctype html>
<html lang="en-US">
<head>
	<!-- Meta Tags -->
	<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

	<title>Freelance Website</title>
	<?php //include('../include/validation.php'); ?>
	<?php include('./include/script.php');  ?>
	<?php //include('./include/validation.php'); ?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.js"></script>
	<script>
	//$(document).ready(function(){
	
	
		/*function formSubmit()
		{
			document.myform.submit();
		}*/
	//});	
		
		function makeTable(data){
       var str = "";
	    $.each(this,function(key,value){
               //$('#title').html();
			   str+='<div id="'+key+'">'+value+'</div>';
			   
            });
        return str;
         
      }
	 
		function getEmployeeFilterOptions(id){
        var opts = [];
        var chk=document.getElementById(id);
        //if(chk.checked)
        //$('input[type=checkbox]'.each(function(){
          if(chk.checked){
            opts.push(this.name);
          }
       // });
        return opts;
      }
	 
	  function updateEmployees(opts){
        $.ajax({
        	alert(opts);
          type: "POST",
          url: "filter.php",
          //dataType : 'json',
          cache: false,
          data: {filterOpts: opts},
		 // contentType: "application/json; charset=utf-8",
		  success: function(html) {
		   $('#title').html(html);
		 
		 

        }
        
        });
      }
	  var checkboxes = $("input[type=checkbox]");
      $checkboxes.on("change", function(){
        var opts = getEmployeeFilterOptions();
        updateEmployees(opts);
      });
      updateEmployees();
	</script>
</head>

<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"./include/header.php"; ?>
<!-- Static Page Titlebar -->
    <section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="row-fluid">
                        <div class="titlebar-heading">
                            <h1 style="font-size:24px;">Browse Projects</h1>
                            <div class="hr hr-border-primary double-border border-small">
                                <span></span>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
    <!--End Header -->

    <section class="section" style="padding-top:80px; padding-bottom:30px;">
    <div class='page-nav clearfix' align="right">
		 Show <a href="" class='active'>20 </a>, <a href="">50 </a> , <a href="">100 </a> Records  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		 <?php
						    	
								
								
		 ?>
		<!-- <span class='active'>1</span><a href='#'>2</a><a href='#' class='next'>Next<i class='fa-angle-right'></i></a>-->
    </div>
	
	<div class="container">
		
		<div class="row-fluid">
         
            <div class="row-fluid">
                <div class="span3">
                    <div class="inner-content">
                        <h3 class="portfolio-single-heading title style1 bw-2px dh-2px divider-primary bc-dark dw-default color-default" style="margin-bottom:30px;"><span>Search Jobs</span></h3>
                        <form id="myform" name="myform" action="" method="post">
							<input type="text" name="search" value="" placeholder="Search Jobs"><br />
							<label><strong>Projcets Type:</strong></label><br />
							<input type="radio" id="type_of_project" name="type" value="fixed"> Fixed Price <br />
							<input type="radio" id="type_of_project" onClick="formSubmit();" name="type1" value="hourly"> Hourly Price <br />
							<input type="radio" id="type_of_project" name="type" value="both"> Both <br /><br />
							
							<label><strong>Price:</strong></label><br />
							<input type="text" name="startprice" value="" placeholder="Min.">
							<input type="text" name="endprice" value="" placeholder="Max.">	<br /><br />					
							
							<label><strong>Select Skills:</strong>:</label><br />
							<input type="checkbox" name="skills" value="PHP" onChange="getEmployeeFilterOptions(this.id);"> PHP <br />
							<input type="checkbox" name="skills1" value="Wordpress"> Wordpress <br />
							<input type="checkbox" name="skills" value="Joomla"> Joomla <br />
							<input type="checkbox" name="skills" value="Cake PHP"> Cake PHP <br />
							<input type="checkbox" name="skills" value="Yii PHP"> Yii PHP <br />
							<input type="checkbox" name="skills" value="Concrete5"> Concrete5 <br />
							<input type="checkbox" name="skills" value="WooCommerce"> WooCommerce <br />
							<input type="checkbox" name="skills" value="Magento"> Magento <br />
							<input type="checkbox" name="skills" value="Volusion"> Volusion <br />
							<input type="checkbox" name="skills" value="Angular JS"> Angular JS <br />
							<input type="checkbox" name="skills" value="Open Cart"> Open Cart <br />
							<input type="checkbox" name="skills" value="Prestashop"> Prestashop <br />
							<input type="checkbox" name="skills" value="Android App"> Android App <br />
							<input type="checkbox" name="skills" value="iOS App"> iOS App <br />
							<input type="checkbox" name="skills" value="Windows App"> Windows App <br /><br />
							
							<label><strong>Location:</strong></label><br />
							<input type="text" name="location" value="" placeholder="Type & search location">
							
						</form>
                    </div>
                </div>
				
				
				
				<!-- First Project -->
				
                <div class="span9">
                
					<div id="title"></div>
					<div id="title1"></div>
					<div id="title2"></div>
					
					<?php
					//$sql ="select * from post_projects";
//  $res=mysql_query($sql);
//  $row=mysql_fetch_array($res);
//  $str='';
//while ($row = mysql_fetch_array($res))
//{
//
//  $str .='<div class="inner-content">';
//					  $str .='<div class="span9">';
//						 $str .='<ul class="product_list_widget">';
//                                $str .='<li>';
//									$str .='<a href="#" title="">';
//									$str .='<img style="width:50px;height:50px; border-radius:4px;" src="images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/></a>';
//									$str .='<a href=""><font style="color:#f1c40f">'.$row["title"].'</font></a>';
//									
//                                	
//									$str .='<font style="font-size:13px">'.limit_words($row["description"],10).'</font><a href="'.WebUrl.'Post_project_read_more.php?id='.$row["id"].'">Read more</a><br />';
//									$str .='<a href=""><font style="text-transform:none;">'.$row["skills"].'</font></a>';
//								$str .='</li>';
//						$str .='</ul>';
//					
//					$str .='</div>';
//					$str .='<div class="span3">';
//						$str .='<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">$'.$row["budget"].'</font><br />';
//						$str .='<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On:</font><br />';
//						$str .='span><a href=""><strong>Bid Now</strong></a></span>';
//					$str .='</div>';
//				$str .='</div>';
//				
//				$str .='<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">';
//                    $str .='<span></span>';
//              	$str .='</div>';
//}
//echo $str;
					?>
					
				<?php //}?>
				
				
				</div>
				
				<div class='page-nav clearfix '>
				
                     <!-- <span class='active'>1</span><a href='#'>2</a><a href='#' class='next'>Next<i class='fa-angle-right'></i></a>-->
                </div>
				
            </div>
        </div>
    </div>
    </section>

   
   <?php include "./include/footer.php"; ?>
	<!-- End footer -->
	</body>
	

</html>