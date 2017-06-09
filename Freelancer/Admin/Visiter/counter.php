<?php include "../MyInclude/MyConfig.php"; ?>
<?php
				     	/**================================================================================||
								||      *Developer : Green Cubes Solutions										   ||
								||      *Website   : www.greencubes.co.in										   ||
								||      *Date      : 25-11-2014													   ||
								||																				   ||
								||      *  NOTICE OF LICENSE  *													   ||
								|| 																				   ||
								|| 																				   ||
								||		   This source file is subject to the Company Copyright 				   ||
								||		   and its use by any other party without concern of Greencubes        	   ||
								||  	   or trying to sell this code will be considered illegal 				   ||
								||		   and any legal actions can be undertaken.								   ||
								||		   If you want to receive a copy of the license, please send an email      ||
								||  	   to info@greencubes.co.in, for further procedure						   ||
								||=================================================================================**/        ?>








<?php

	$tablename = 'admin_visiter_count';

	global  $tablename; 
	$today = date("Y/m/d");

	$Fetch = mysql_query("SELECT * FROM ".$tablename." WHERE PageUrl = '".$PageUrl."' and PageName = '".$Title."' and date = '$today'");
	$fet   = mysql_fetch_array($Fetch);
	
	if(mysql_num_rows(mysql_query("SELECT PageUrl FROM ".$tablename." WHERE PageUrl = '".$PageUrl."' and PageName = '".$Title."' and date = '$today'")))
	{

		$i = $fet['Count']+1;
		$updatecounter = mysql_query("UPDATE ".$tablename." SET Count = '$i', Date = '$today' WHERE PageUrl = '".$PageUrl."' and PageName = '".$Title."' and date = '$today'");
		
	
	} 
	else
	{
	

		$insert = mysql_query("INSERT INTO ".$tablename." (PageName, Count,Date,PageUrl,Status)VALUES ('".$Title."', '1','".$today."', '".$PageUrl."','".$Status."')");
	
		if (!$insert) 
		{
    		die ("Can\'t insert into $dbtablehits : " . mysql_error()); // remove ?
		}
	}
	
?>
