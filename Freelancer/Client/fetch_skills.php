<?php 

	include "../Admin/MyInclude/MyConfig.php";
if($_POST['required_skill'])
{
	$skill=$_POST['required_skill']."%";
	//$skill = strtolower($_GET["q"]);
	$sql="select * from admin_skill where Skill_Name like '".$skill."'";
	
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
	{
	?>
    
    	<ul><li style="text-decoration:none;"><?php echo $row['Skill_Name'];?></li></ul>
	
    <?php }

}
?>