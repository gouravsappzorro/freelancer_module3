<?php 
$conn=mysql_connect("localhost","root","");
if(!$conn)
{
die ("connection not found" .mysql_error());
}
 $select_db=mysql_select_db("test",$conn);
 if (!$select_db)
 {
 die ("database not found" .mysql_error());
 }


?>
