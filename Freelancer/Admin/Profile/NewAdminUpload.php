<?php include "../MyInclude/Db_Conn.php"; ?>
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
if (isset($_POST['EditUserAdmin']))
{
  
 		 $Date             =    date("d/m/Y"); 
 		 $MemberName       =    $_POST['MemberName'];
		 $Address          =    $_POST['Address'];
		 $ContactNo        =    $_POST['ContactNo'];
		 $Email            =    $_POST['Email'];

  		$InData             =    "UPDATE admin_login SET
												 MemberName       =    '$MemberName',
												 Address          =    '$Address',
												 ContactNo        =    '$ContactNo',
												 Email            =    '$Email',
												 Date             =    '$Date'  
										 WHERE  UserId            =    '$_SESSION[UserId]'";			
		$insert         =     mysql_query($InData);	
				
		if($insert) 
		{ 
					
			$_SESSION['NewSu'] = "Done"; 			
			
			?><meta http-equiv="refresh" content="0; url=./index.php"><?php 
		}
		
}
	
if(isset($_POST['ChangePassword']))
{
	$sql_pass=mysql_fetch_array(mysql_query("select Password from admin_login where UserId='$_SESSION[UserId]'"));
	
	if($sql_pass['Password']==$_POST['OldPassword'])
	{
	
		$Password	=	$_POST['Password'];
	
		$update_pass=mysql_query("UPDATE admin_login SET Password='$Password' where UserId='".$_SESSION['UserId']."'");
	
		if($update_pass)
		{
			$_SESSION['password'] = "Done";
			?>
        	<script>
				window.location.href='index.php';
			</script>
    	    <?php
		}
	}
	else
	{
		$_SESSION['password'] = "Error";
		?>
        	<script>
				window.location.href='index.php';
			</script>
    	    <?php
	}
}
?>
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

