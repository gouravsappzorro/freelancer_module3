<?php 
include('../Admin/MyInclude/MyConfig.php');
if(isset($_POST['DeleteUser']))
{	$message=array();
	if(isset($_POST['DeleteUser']) && !empty($_POST['DeleteUser']))
	{   $Delete  = $_POST['DeleteUser'];
		$Deleted = mysql_query("DELETE FROM portfolio WHERE id = ".$Delete." ");
		if($Deleted)
		{
			echo '1';
		}
		else
		{
			echo '0';
		} //endif;
	}
}?>