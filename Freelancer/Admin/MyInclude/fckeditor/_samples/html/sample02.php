<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--
 * FCKeditor - The text editor for Internet - http://www.fckeditor.net
 * Copyright (C) 2003-2010 Frederico Caldeira Knabben
 *
 * == BEGIN LICENSE ==
 *
 * Licensed under the terms of any of the following licenses at your
 * choice:
 *
 *  - GNU General Public License Version 2 or later (the "GPL")
 *    http://www.gnu.org/licenses/gpl.html
 *
 *  - GNU Lesser General Public License Version 2.1 or later (the "LGPL")
 *    http://www.gnu.org/licenses/lgpl.html
 *
 *  - Mozilla Public License Version 1.1 or later (the "MPL")
 *    http://www.mozilla.org/MPL/MPL-1.1.html
 *
 * == END LICENSE ==
 *
 * Sample page.
-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>FCKeditor - Sample</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex, nofollow" />
	<link href="../sample.css" rel="stylesheet" type="text/css" />
	<script type="text/javascript" src="../../fckeditor.js"></script>
	<script type="text/javascript">

window.onload = function()
{
	// Automatically calculates the editor base path based on the _samples directory.
	// This is usefull only for these samples. A real application should use something like this:
	// oFCKeditor.BasePath = '/fckeditor/' ;	// '/fckeditor/' is the default value.
	var sBasePath = document.location.href.substring(0,document.location.href.lastIndexOf('_samples')) ;

	var oFCKeditor = new FCKeditor( 'FCKeditor1' ) ;
	oFCKeditor.BasePath	= sBasePath ;
	oFCKeditor.ReplaceTextarea() ;
}

	</script>
</head>
<body>
	<h1>
		FCKeditor - JavaScript - Sample 2</h1>
	<div>
		This sample displays a normal HTML form with an FCKeditor with full features enabled.
		It uses the "ReplaceTextarea" command to create the editor.
	</div>
	<hr />
	
	<?php 
	
	
	
	 include "db_conn.php";

	$sql = "Select * from mycontent where id = '3'";
	$insert = mysql_query($sql,$conn);
	//if($insert) { echo "done"; }  else {  echo "eroorrrrrrr";}
	$fetch = mysql_fetch_array($insert);
	echo $fetch['content'];
if (isset($_POST['submit']))
   
{
	
	$ppostedValue = $_POST['FCKeditor1'];
	
	$postedValue = str_replace("'","",$ppostedValue);
	
	$sql = "Insert into mycontent(content) values ('".$postedValue."')";
	$insert = mysql_query($sql,$conn);
	if($insert) { echo "done"; }  else {  echo "eroorrrrrrr";}
			

}
?>
	
	<form action="" method="post">
		<div>
			<textarea name="FCKeditor1" rows="10" cols="80" style="width: 100%; height: 200px"></textarea>
		</div>
		<br />
		<input type="submit" name="submit" value="Submit" />
	</form>
</body>
</html>
