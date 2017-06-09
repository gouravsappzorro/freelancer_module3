<?php
	include('./Admin/MyInclude/MyConfig.php');
	if($_POST['id'])
	{
		$sql="select * from post_projects where type_of_project='".$_POST['id']."'";
		echo "<script>alert('".$_POST['id']."')</script>";
		$res=mysql_query($sql);
		while($row=mysql_fetch_array($res))
		{
	
 ?>			
			<div class="inner-content">
					  <div class="span9">
						 <ul class="product_list_widget">
                                <li>
									<a href="#" title="">
									<img style="width:50px;height:50px; border-radius:4px;" src="images/bidder.jpg" class="attachment-shop_thumbnail wp-post-image" style="border-radius:4px;"/></a>
									<a href=""><font style="color:#f1c40f"><?php echo $row['title'];?></font></a>
									
                                	
									<font style="font-size:13px"><?php echo limit_words($row['description'],10); ?></font><a href="<?php echo WebUrl; ?>Post_project_read_more.php?id=<?php echo $row['id']; ?>">Read more</a><br />
									<a href=""><font style="text-transform:none;"><?php echo $row['skills'] ?></font></a>
								</li>
						</ul>
					
					</div>
					<div class="span3">
						<font style="font-size:20px; font-family:Arial, Helvetica, sans-serif; color:#000000">$<?php echo $row['budget'] ?></font><br />
						<font style="font-size:12px; font-family:Arial, Helvetica, sans-serif;">Posted On: <?php echo $row['niceDate'];?></font><br />
						<span><a href=""><strong>Bid Now</strong></a></span>
					</div>
				</div>
				
				<div class="hr border-large dh-1px aligncenter hr-border-light" style="margin-top:15px;margin-bottom:15px;">
                    <span></span>
              	</div>
				<?php }}?>