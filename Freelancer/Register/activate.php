<?php
include "../Admin/MyInclude/MyConfig.php";
if (isset($_GET['key'])) {
		//$email=$_GET['email'];
		$key=$_GET['key'];	
	 // Update the database to set the "activation" field to null
		$sql = "UPDATE register SET status='active' WHERE unique_code='$key'LIMIT 1";
		$res = mysql_query($sql);

	// Print a customized message:

 	if ($res) //if update query was successfull
	{

 		//echo '<div>Your account is now active. You may now <a href="login.php">Log in</a></div>';
 		$_SESSION['success']="Congratulations! Your email is verified now.";
		
?>
		
		<script type="text/javascript">
             window.location.href="../Login/login.php";
        </script>

<?php
 	} else {
 			$_SESSION['error']="Oops !Your account could not be activated.";
 ?>

 			<script type="text/javascript">
             	window.location.href="../Register/register.php";
        	</script>

 	
<?php
 	}


} else {
	$_SESSION['error']="Error Occured .";

?>

			 <script type="text/javascript">
             	window.location.href="../Register/register.php";
  			 </script>

<?php
}
?>