<?php include "../Admin/MyInclude/MyConfig.php"; ?>
<?php
showcurrenttime();
extract($_POST);
mysql_query("update message set ReadStatus='0' where project_id='".$project_id."' and Sender_Id!='".$_SESSION['id']."' and client_id='".$_SESSION['id']."' and developer_id='".$developer_id."' ");
?>