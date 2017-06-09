<?php
session_start();
?>
<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']!='Work') {
	$_SESSION['msg']="Please Login First...!";
?>
	<script type="text/javascript">
    	window.location.href="../Login/login.php";
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

	<title>Freelance Website</title>
	<?php //include('../include/validation.php'); ?>
	<?php include('../include/script.php');  ?>

</head>
<body id="home" class="home page page-id-12 page-template page-template-fullwidth-php solid-header header-scheme-light type1 header-fullwidth-no border-default wpb-js-composer js-comp-ver-4.3.5 vc_responsive">

   
<?php include"../include/header.php"; ?>

<section id="titlebar" class="titlebar titlebar-type-solid border-yes titlebar-scheme-dark titlebar-alignment-justify titlebar-valignment-center titlebar-size-normal enable-hr-no" data-height="80" data-rs-height="yes">
    <div class="titlebar-wrapper">
        <div class="titlebar-content">
            <div class="container">
                <div class="row-fluid">
                    <div class="titlebar-heading">
                        <h1 style="font-size:24px; line-height:30px;">Rewards</h1>
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
    
    	<div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:35px;">
         	<span></span>
        </div>	
        <div class="row-fluid" style="font-size:16px">
            <div class="span2">
                <p style="color:#000000"><strong>Badge</strong></p>
            </div>
            <div class="span4">
                <p style="color:#000000"><strong>Name</strong></p>
            </div>
            <div class="span4">
                <p style="color:#000000"><strong>Description</strong></p>
            </div>
		</div>
        <div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:35px;">
         	<span></span>
        </div>
        
        <?php
		$sql_badges=mysql_query("select * from badges where uid='$_SESSION[id]' order by id");
		$cnt=mysql_num_rows($sql_badges);
		if($cnt>0)
		{
			while($row_badge=mysql_fetch_array($sql_badges))
			{
			?>
            	<div class="row-fluid">
                	<div class="span2">
        				<p align="justify">
                        	<img src="<?php echo WebUrl;?>images/badges/<?php echo $row_badge['badge'];?>" alt="">
                        </p>
                    </div>
                    <div class="span4">
                    	<p align="justify">
                    		<strong><?php echo $row_badge['name'];?></strong>
                        </p>
                    </div>
                    <div class="span5">
                    	<p align="justify">
	                    	<strong><?php echo $row_badge['description'];?></strong>
						</p>
                    </div>
        		</div>
                
                <div class="hr border-large dh-2px aligncenter hr-border-light" style="margin-top:0px;margin-bottom:20px;">
         			<span></span>
        		</div>
            <?php
			}
		}
		else
		{
			echo"<div class='alert alert-danger fade in' style='color:#a94442;background-color:#f2dede;border-color: #ebccd1;'>
            <strong>Alert!</strong> You have No any Rewards yet!
            </div>";
		}
		?>
	</div>
</section>

<?php include "../include/footer.php"; ?>
</body>
</html>
