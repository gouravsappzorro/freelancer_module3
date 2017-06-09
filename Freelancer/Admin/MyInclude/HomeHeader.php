<?php
	if(!isset($_SESSION['UserId']))
	{
		?>
        <script>
			window.location.href='<?php echo AdminUrl;?>LogIn.php';
		</script>
        <?php
		
	}
?>
<!-- Header -->
	<header class="header navbar navbar-fixed-top" role="banner">
		<!-- Top Navigation Bar -->
		<div class="container">

			<!-- Only visible on smartphones, menu toggle -->
			<ul class="nav navbar-nav">
				<li class="nav-toggle"><a href="javascript:void(0);" title=""><i class="icon-reorder"></i></a></li>
			</ul>

			<!-- Logo -->
			<a class="navbar-brand" href="<?php echo AdminUrl; ?>index.php">
				<strong>WEBZIRA</strong>
			</a>
			<!-- /logo -->

			<!-- Sidebar Toggler -->
			<a href="#" class="toggle-sidebar bs-tooltip" data-placement="bottom" data-original-title="Toggle navigation">
				<i class="icon-reorder"></i>
			</a>
			<!-- /Sidebar Toggler -->

			<!-- Top Left Menu -->
			<ul class="nav navbar-nav navbar-left hidden-xs hidden-sm">
				<li>
					<a href="<?php echo WebUrl; ?>" target="_blank">
						View Site
					</a>
				</li>
				<!--<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						Dropdown
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
						<li><a href="#"><i class="icon-user"></i> Example #1</a></li>
						<li><a href="#"><i class="icon-calendar"></i> Example #2</a></li>
						<li class="divider"></li>
						<li><a href="#"><i class="icon-tasks"></i> Example #3</a></li>
					</ul>
				</li>-->
			</ul>
			<!-- /Top Left Menu -->
<!-- Top Right Menu -->
			
				
			<!-- Top Right Menu -->
			<ul class="nav navbar-nav navbar-right">
				<!-- Notifications -->
			
				<?php // $GetCo = mysql_num_rows(mysql_query("select * from admin_contact_form where Type = '' ")); ?>
				<!-- Messages -->
				


				<!-- User Login Dropdown -->
				<li class="dropdown user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<!--<img alt="" src="assets/img/avatar1_small.jpg" />-->
						<i class="icon-user"></i>
						<span class="username"><?= $_SESSION['UserName'];?></span>
						<i class="icon-caret-down small"></i>
					</a>
					<ul class="dropdown-menu">
					
					<?php 
						$mainAdmin = mysql_fetch_array(mysql_query("select * from admin_login where UserId = '".$_SESSION['UserId']."' and UserName = '".$_SESSION['UserName']."' and Status = 'SuperAdmin' "));
					if($mainAdmin['Status'] == 'SuperAdmin' )
					{ ?>
						<li><a href="<?php echo AdminUrl; ?>ManageAdmin/MyAdminProfile.php"><i class="icon-user"></i><b> My Admin Profile</b></a></li>
						<li><a href="<?php echo AdminUrl; ?>ManageAdmin/index.php"><i class="icon-calendar"></i><b>Add New Admin Profile</b></a></li>
			   <?php } ?>		
						<!--<li><a href="<?php echo AdminUrl; ?>Admin/WebSettings.php"><i class="icon-tasks"></i><b>Web Settings</b></a></li>
						<li class="divider"></li> -->
                    <?php
					if($mainAdmin['Status'] != 'SuperAdmin')
                    {
                    ?>
                		<li><a href="<?php echo AdminUrl; ?>Profile/index.php"><i class="icon-user"></i> <b>Manage Profile</b></a></li>
                    <?php }?>
						<li><a href="<?php echo AdminUrl; ?>LogOut.php"><i class="icon-key"></i> <b>Log Out</b></a></li>
                        
					</ul>
				</li>
				<!-- /user login dropdown -->
			</ul>
			<!-- /Top Right Menu -->
		</div>
		<!-- /top navigation bar -->

		<!--=== Project Switcher ===-->
		<div id="project-switcher" class="container project-switcher">
			<div id="scrollbar">
				<div class="handle"></div>
			</div>

			<div id="frame">
				<ul class="project-list">
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-desktop"></i></span>
							<span class="title">Lorem ipsum dolor</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-compass"></i></span>
							<span class="title">Dolor sit invidunt</span>
						</a>
					</li>
					<li class="current">
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-male"></i></span>
							<span class="title">Consetetur sadipscing elitr</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-thumbs-up"></i></span>
							<span class="title">Sed diam nonumy</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-female"></i></span>
							<span class="title">At vero eos et</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-beaker"></i></span>
							<span class="title">Sed diam voluptua</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-desktop"></i></span>
							<span class="title">Lorem ipsum dolor</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-compass"></i></span>
							<span class="title">Dolor sit invidunt</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-male"></i></span>
							<span class="title">Consetetur sadipscing elitr</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-thumbs-up"></i></span>
							<span class="title">Sed diam nonumy</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-female"></i></span>
							<span class="title">At vero eos et</span>
						</a>
					</li>
					<li>
						<a href="javascript:void(0);">
							<span class="image"><i class="icon-beaker"></i></span>
							<span class="title">Sed diam voluptua</span>
						</a>
					</li>
				</ul>
			</div> <!-- /#frame -->
		</div> <!-- /#project-switcher -->
	</header> <!-- /.header -->