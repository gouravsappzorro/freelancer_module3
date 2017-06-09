<?php
	include('Admin/MyInclude/MyConfig.php');
	include ("MailConfig.php");

	extract($_POST);

	$delete_faq=mysql_query("DELETE from faqs where UniqueId='".$faqid."'");

	if(@$delete_faq)
	{
		echo trim("Done");
	}
?>