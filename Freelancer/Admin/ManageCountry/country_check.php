<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<?php
extract($_POST);

if(isset($falg) and $falg==0)
{
	if(!isset($id))
	{
		$country=mysql_num_rows(mysql_query("select * from location where Name='".$value."'"));
		if($country > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		$country=mysql_num_rows(mysql_query("select * from location where Name='".$value."' and Id!='".$id."'"));
		if($country > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}


if(isset($falg) and $falg==1)
{
	if(isset($id))
	{
		$country=mysql_num_rows(mysql_query("select * from location where Code='".$value."' and Id!='".$id."'"));
		if($country > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
	else
	{
		$country=mysql_num_rows(mysql_query("select * from location where Code='".$value."'"));
		if($country > 0)
		{
			echo 1;
		}
		else
		{
			echo 0;
		}
	}
}

?>