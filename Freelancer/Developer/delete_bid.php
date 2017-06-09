<?php include('../Admin/MyInclude/MyConfig.php'); ?>
<?php
	echo $res=mysql_query("delete from user_bids where project_id='".$_POST['project_id']."'");
?>