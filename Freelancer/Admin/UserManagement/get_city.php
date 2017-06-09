<?php 

	include "../MyInclude/MyConfig.php";
if($_POST['id'])
{
	
	echo $sql="select * from city where CountryCode='".$_POST['id']."' and Status='Published' order by Name";
	
	$res=mysql_query($sql);
	while($row=mysql_fetch_array($res))
	{
?>
	        <option  value="<?php echo $row['Name']; ?>"><?php echo $row['Name']; ?></option>

<?php
	}
?>
	<option value="other">Other</option>
<?php 
}
?>