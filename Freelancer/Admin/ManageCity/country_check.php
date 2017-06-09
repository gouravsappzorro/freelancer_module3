<?php include "../MyInclude/Db_Conn.php"; ?>
<?php include "../MyInclude/MyConfig.php"; ?>

<?php
extract($_POST);

if(isset($falg) and $falg==1)
{
	if(isset($id))
	{
		$country=mysql_num_rows(mysql_query("select * from city where Name='".$value."' and CountryCode='".$country."' and ID!='".$id."'"));
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
		$country=mysql_num_rows(mysql_query("select * from city where Name='".$value."' and CountryCode='".$country."'"));
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