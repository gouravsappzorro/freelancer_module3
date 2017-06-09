<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>
<?php

extract($_POST);

$sql=mysql_num_rows(mysql_query("select * from admin_login where UserName = '".$UserName."'"));

if($sql>0)
{
	echo 1;
}
else
{
	echo 0;
}
?>