<?php //include "HitCounter.php";?>

<?php

if(isset($_SESSION['id']))
{
	$unread_message=mysql_num_rows(mysql_query("select * from message where ReadStatus='1' and Sender_Id!='".$_SESSION['id']."' and (developer_id='".$_SESSION['id']."' or client_id='".$_SESSION['id']."')"));
}
?>
 <!-- mobile menu Starts Here-->
    <div id="mobile_navigation">
        <a id="close-mobile-menu" href="#">X</a>
        <!--<ul id="mobile_menu" class="mobile_menu">
			<li class="menu-item menu-item-has-children menu-item-6811"><a href="#">How it Works</a></li>
            <li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="#">Login</a></li>
            <li class="menu-item menu-item-has-children menu-item-6811"><a href="#">Sign Up</a></li>
            <li class="menu-item"><a href="contact-us-2.html">Post Free Project</a></li>
        </ul>-->
        <ul id="mobile_menu" class="mobile_menu">
                                        <!-- Main Navigation Menu -->
                                        
										<li class="menu-item"><a href="#">Services</a></li>
                                        <li class="menu-item menu-item-has-children menu-item-6811"><a href="#">How it works</a></li>
                                        <?php if(!isset($_SESSION['id'])){ ?>
                                        <li class="menu-item"><a href="<?php echo WebUrl;?>projects.php">Projects</a></li>
                                        <?php }?>
										<?php if(isset($_SESSION['id']) && isset($_SESSION['user']))
												{ 	if($_SESSION['user']=="Work")
													 {
                                                   
										?>
                                       <li class="menu-item menu-item-has-children"><a href="#">Projects</a>
                                        <ul class="sub-menu ">
                                        	<li class="menu-item"><a href="<?php echo WebUrl;?>browseprojects.php">Projects</a></li>
                                            <li class="menu-item"><a href="<?php echo WebUrl;?>myskillmatchprojects.php">Browse Projects</a></li>
                                        </ul>
                                        </li>
										<li class="menu-item menu-item-has-children"><a href="#">My Account</a>
											<ul class="sub-menu ">
                                                <!--<li class="menu-item">
                                                	<a href="<?php echo WebUrl;?>Developer/message.php">Messages
                                                    <?php if($unread_message>0){?>  
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px;color:#F30 "> <?php echo $unread_message;?></i>
                                                         
														 <?php }else {?>
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px "> <?php echo $unread_message;?></i>
                                                         <?php }?>
                                                    </a>
                                                </li>-->
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">Profile</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>myprojects-open-projects-developer.php">My Project</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>membership-plans.php">Membership</a></li>
                                                
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>ratings-past.php">Ratings & Reviews</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Developer/my-rewards.php">My Rewards</a></li>
												<li class="menu-item"><a href="<?php echo WebUrl; ?>Login/logout.php">Logout</a></li>
                                            </ul>
										</li>
                                         <li class="menu-item menu-item-has-children menu-item-6811"><a href="<?php echo WebUrl; ?>Developer/dashboard.php">Dashboard</a></li>
										<?php
													}
													else
													{
										?>
                                        <li class="menu-item menu-item-has-children"><a href="<?php echo WebUrl;?>browseprojects-clients.php">Projects</a>
                                         <li class="menu-item menu-item-has-children"><a href="#">My Account</a>
											<ul class="sub-menu ">
												<!--<li class="menu-item">
                                                	<a href="<?php echo WebUrl;?>Client/message.php">Messages
                                                    <?php if($unread_message>0){?>  
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px;color:#F30 "> <?php echo $unread_message;?></i>
                                                         
														 <?php }else {?>
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px "> <?php echo $unread_message;?></i>
                                                         <?php }?>
                                                	</a>
                                                </li>-->
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>myprojects-open-projects-client.php">My Projects</a></li>
                                                
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>ratings-past.php">Ratings & Reviews</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Login/logout.php">Logout</a></li>
                                            </ul>
										</li>
                                         <li class="menu-item menu-item-has-children menu-item-6811"><a href="<?php echo WebUrl; ?>Client/dashboard.php">Dashboard</a></li>
                                         <?php  	  }
												}
                                                else{

                                          ?>       
										
										<li class="menu-item current-menu-ancestor current-menu-parent menu-item-has-children"><a href="<?php echo WebUrl; ?>Login/login.php">Login</a></li>
										<li class="menu-item menu-item-has-children menu-item-6811"><a href="<?php echo WebUrl; ?>Register/register.php">Sign Up</a></li>
										<?php } ?>
										<li class="menu-item"><a href="<?php echo WebUrl; ?>Client/post-project.php">Post Free Project</a></li>
										
										
                                       
                                    </ul>
                               
                                    
    </div>
    <!-- End Mobile Navigation -->
<!-- Header -->
    <div id="header_wrapper" class=" solid-header header-scheme-light type1">
        <div class="header_container">
            <div id="header" class="header-v1 " data-height="110" data-shrinked-height="65" data-auto-offset="1" data-offset="0" data-second-nav-offset="0">
                <section id="main_navigation" class="header-nav shrinking-nav">
                    <div class="container">
                        <div id="main_navigation_container" class="row-fluid">
                            <div class="row-fluid">
                                <!-- logo -->
                                <div class="logo-container">
                                    <a id="logo" href="<?php echo WebUrl; ?>index.php">
                                        <img src="<?php echo WebUrl; ?>images/logo.png" style="width:380px; height:70px;" alt="WebZira Website">
                                        <img src="<?php echo WebUrl; ?>images/logowhite.png" class="white-logo" alt="Webzira Website">
                                    </a>
                                </div>
                                <!-- Tooggle Menu will displace on mobile devices -->
                                <div id="mobile-menu-container">
                                    <a class="toggle-menu" href="#"><i class="fa-navicon"></i></a>
                                </div>
                                <nav class="nav-container">
                                    <ul id="main_menu" class="main_menu">
                                        <!-- Main Navigation Menu -->
                                        
										<li class="menu-item"><a href="#">Services</a></li>
                                        <li class="menu-item"><a href="#">How it works</a></li>
                                        <?php if(!isset($_SESSION['id'])){ ?>
                                        <li class="menu-item"><a href="<?php echo WebUrl;?>projects.php">Projects</a></li>
                                        <?php }?>
										<?php if(isset($_SESSION['id']) && isset($_SESSION['user']))
												{ 	if($_SESSION['user']=="Work")
													 {
                                                   
										?>
                                        <li class="menu-item menu-item-has-children"><a href="#">Projects</a>
                                        <ul class="sub-menu ">
                                        	<li class="menu-item"><a href="<?php echo WebUrl;?>browseprojects.php">Projects</a></li>
                                            <li class="menu-item"><a href="<?php echo WebUrl;?>myskillmatchprojects.php">Browse Projects</a></li>
                                        </ul>
                                        </li>
										<li class="menu-item menu-item-has-children"><a href="#">My Account</a>
											<ul class="sub-menu ">
                                                <!--<li class="menu-item">
                                                	<a href="<?php echo WebUrl;?>Developer/message.php">Messages
                                                     <?php if($unread_message>0){?>  
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px;color:#F30 "> <?php echo $unread_message;?></i>
                                                         
														 <?php }else {?>
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px "> <?php echo $unread_message;?></i>
                                                         <?php }?>
                                                    </a>
                                                </li>-->
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Developer/my-profile.php">Profile</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>myprojects-open-projects-developer.php">My Project</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>membership-plans.php">Membership</a></li>
                                                
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>ratings-past.php">Ratings & Reviews</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Developer/my-rewards.php">My Rewards</a></li>
												<li class="menu-item"><a href="<?php echo WebUrl; ?>Login/logout.php">Logout</a></li>
                                            </ul>
										</li>
                                        <li class="menu-item"><a href="<?php echo WebUrl; ?>Developer/dashboard.php">Dashboard</a></li>
										<?php
													}
													else
													{
										?>
                                        <li class="menu-item menu-item-has-children"><a href="<?php echo WebUrl;?>browseprojects-clients.php">Projects</a>
                                         <li class="menu-item menu-item-has-children"><a href="#">My Account</a>
											<ul class="sub-menu ">
                                            	 <!--<li class="menu-item">
                                                     <a href="<?php echo WebUrl;?>Client/message.php">Messages 
														 <?php if($unread_message>0){?>  
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px;color:#F30 "> <?php echo $unread_message;?></i>
                                                         
														 <?php }else {?>
                                                         <i class="fa fa-envelope" aria-hidden="true" style="left:60px; position:relative; bottom:2px "> <?php echo $unread_message;?></i>
                                                         <?php }?>
                                                     </a>
                                                 </li>-->
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>Client/my-profile.php">My Profile</a></li>
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>myprojects-open-projects-client.php">My Project</a></li>
                                               
                                                <li class="menu-item"><a href="<?php echo WebUrl; ?>ratings-past.php">Ratings & Reviews</a></li>
												<li class="menu-item"><a href="<?php echo WebUrl; ?>Login/logout.php">Logout</a></li>
                                            </ul>
										</li>
                                        <li class="menu-item"><a href="<?php echo WebUrl; ?>Client/dashboard.php">Dashboard</a></li
                                         ><?php  	  }
												}
                                                else{
                                          ?>       
										
										<li class="menu-item"><a href="<?php echo WebUrl; ?>Login/login.php">Login</a></li>
										<li class="menu-item"><a href="<?php echo WebUrl; ?>Register/register.php">Sign Up</a></li>
										<?php } ?>
										
                                          <li class="menu-item"><a href="<?php echo WebUrl; ?>Client/post-project.php"><input type="submit" name="submit" value="Post Free Project" /></a></li>
                                           
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>