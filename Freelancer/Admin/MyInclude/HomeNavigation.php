<ul id="nav">
	<li class="current"> <a href="<?php echo AdminUrl; ?>index.php"> <i class="icon-dashboard"></i> Dashboard </a> </li>
  
  	<li> <a href="javascript:void(0);"> <i class="fa fa-users"></i></i> Users</a>
        <ul class="sub-menu">
            <li> <a href="<?php echo AdminUrl; ?>UserManagement/client-management.php"> <i class="icon-angle-right"></i>Clients </a> </li>
            <li> <a href="<?php echo AdminUrl; ?>UserManagement/developer-management.php"> <i class="icon-angle-right"></i>Developers </a> </li>
        
        </ul>
    </li>
  
  	<li> <a href="<?php echo AdminUrl; ?>Projects/"> <i class="icon-desktop"></i>Projects</a></li>
	<li> <a href="<?php echo AdminUrl; ?>Milestone/"> <i class="fa fa-ticket" aria-hidden="true"></i>Milestones</a></li>

  	<?php
		$mainAdmin = mysql_fetch_array(mysql_query("select * from admin_login where UserId = '".$_SESSION['UserId']."' and UserName = '".$_SESSION['UserName']."' and Status = 'SuperAdmin' "));

		if($mainAdmin['Status'] == 'SuperAdmin' )
		{ ?>
  
  			<li> <a href="<?php echo AdminUrl; ?>Commisoin/"> <i class="fa fa-money"></i></i>Commision Management</a></li>
		<?php
		}
		?>
  
	<li> <a href="<?php echo AdminUrl; ?>Messages/"> <i class="fa fa-envelope" aria-hidden="true"></i>Messages</a></li>  
  
	<li> <a href="<?php echo AdminUrl; ?>Reviews/"> <i class="fa fa-comments" aria-hidden="true"></i>Reting and Reviews</a></li>  

	<li> <a href="<?php echo AdminUrl; ?>Feedback/"> <i class="fa fa-comment-o" aria-hidden="true"></i>Feedback </a></li>  

	<li> <a href="javascript:void(0);"> <i class="fa fa-globe" aria-hidden="true"></i>Manage Location </a>
    	<ul class="sub-menu">
      		<li> <a href="<?php echo AdminUrl; ?>ManageCountry/"> <i class="icon-angle-right"></i> Manage Country </a> </li>
      		<li> <a href="<?php echo AdminUrl; ?>ManageCity"> <i class="icon-angle-right"></i> Manage City </a> </li>
	    </ul>
	</li>

	<li> <a href="javascript:void(0);"> <i class="icon-desktop"></i> Testimonials </a>
    	<ul class="sub-menu">
      		<li> <a href="<?php echo AdminUrl; ?>Testimonials/"> <i class="icon-angle-right"></i> View All Testimonials </a> </li>
      		<li> <a href="<?php echo AdminUrl; ?>Testimonials/AddNewPage.php"> <i class="icon-angle-right"></i> Add New Testimonials </a> </li>
    	</ul>
	</li>
	
    <li><a href=""><i class="icon-bar-chart"></i>BLOGS</a>
		<ul class="sub-menu">
            <li><a href="<?php echo AdminUrl; ?>Blog/"><i class="icon-angle-right"></i>View All Blogs</a></li>
            <li><a href="<?php echo AdminUrl; ?>Blog/AddNewBlog.php"><i class="icon-angle-right"></i>Add New Blog</a></li>
            <li><a href="<?php echo AdminUrl; ?>Blog/AllCategory.php"><i class="icon-angle-right"></i>View All Blog Category</a></li>
            <li><a href="<?php echo AdminUrl; ?>Blog/CreateCategory.php"><i class="icon-angle-right"></i>Add Blog Category</a></li>
		</ul>
	</li>
	<li> <a href="javascript:void(0);"> <i class="icon-desktop"></i> Currency-Skill-Category </a>
    	<ul class="sub-menu">
      		<li> <a href="<?php echo AdminUrl; ?>AllManage/Membership/index.php"> <i class="icon-angle-right"></i> Manage Membership </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>AllManage/Category/index.php"> <i class="icon-angle-right"></i> Manage Category </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>AllManage/SubCategory/index.php"> <i class="icon-angle-right"></i> Manage SubCategory </a> </li>
      
      		<li> <a href="<?php echo AdminUrl; ?>AllManage/SkillCategory/index.php"> <i class="icon-angle-right"></i>Manage Skills Category</a> </li>
      
      		<li> <a href="<?php echo AdminUrl; ?>AllManage/Skill/index.php"> <i class="icon-angle-right"></i> Manage Skills </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>AllManage/Currency/index.php"> <i class="icon-angle-right"></i> Manage Currency </a> </li>
     	</ul>
	</li>
	
    <li> <a href="javascript:void(0);"> <i class="fa fa-sticky-note"></i></i> StaticPage </a>
    	<ul class="sub-menu">
      		<li> <a href="<?php echo AdminUrl; ?>StaticPage/AboutUs.php"> <i class="icon-angle-right"></i> About Us </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>StaticPage/TermsofService.php"> <i class="icon-angle-right"></i> Terms of Service </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>StaticPage/PrivacyPolicy.php"> <i class="icon-angle-right"></i> Privacy Policy </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>StaticPage/TrustandSafety.php"> <i class="icon-angle-right"></i> Trust & Safety </a> </li>
      		
            <li> <a href="<?php echo AdminUrl; ?>StaticPage/Careers.php"> <i class="icon-angle-right"></i> Careers </a> </li>
    	</ul>
	</li>
	
    <li> <a href="<?php echo AdminUrl; ?>Admin/WebSettings.php"> <i class="icon-home"></i>HOME</a></li>
</ul>
Copyright &copy; <?php echo date('Y');?>, All right reserved.