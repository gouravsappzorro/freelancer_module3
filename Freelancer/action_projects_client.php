<?php include('Admin/MyInclude/MyConfig.php'); ?>
<?php

extract($_POST);

// code for cancel project;

if(isset($project_id) and $value==1)
{
	if(mysql_query("update post_projects set status='cancel' where project_id='".$project_id."'"))
	{
		$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$project_id."'"));
		//Notification
		
		$project_title=mysql_real_escape_string($project['title']);
		$insert_notification=mysql_query("insert into notification values('','$project[uid]','$project[uid]','You Close the Project <font style=color:#f1c40f>$project_title</font>',now(),'active')");
		
		mysql_query("delete from user_bids where project_id='".$project_id."'");
		echo "Success";
	}
	else
	{
		echo "error";
	}
}

if(isset($project_id) and $value==3)
{
	$fetch_status=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$project_id."'"));
	if($fetch_status['isSuspend']=='Yes')
	{
		$spd_status='No';
	}
	elseif($fetch_status['isSuspend']=='No')
	{
		$spd_status='Yes';	
	}
	else
	{
		$spd_status='';
	}
	
	if(mysql_query("update post_projects set isSuspend='".$spd_status."' where project_id='".$project_id."'"))
	{
		$project=mysql_fetch_array(mysql_query("select * from post_projects where project_id='".$project_id."'"));
		//Notification
		
		$project_title=mysql_real_escape_string($project['title']);
		$insert_notification=mysql_query("insert into notification values('','$project[uid]','$project[uid]','You Suspend the Project <font style=color:#f1c40f>$project_title</font>',now(),'active')");
		
		mysql_query("delete from user_bids where project_id='".$project_id."'");
		echo "Success";
	}
	else
	{
		echo "error";
	}
}

?>