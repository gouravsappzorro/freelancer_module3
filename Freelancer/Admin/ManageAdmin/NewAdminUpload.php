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
if (isset($_POST['AdminUpdate']))
{
  
 		 $Date             =    date("d/m/Y"); 
 		 $MemberName       =    $_POST['MemberName'];
		 $Address          =    $_POST['Address'];
		 $ContactNo        =    $_POST['ContactNo'];
		 $UserName         =    $_POST['UserName'];
		 $Password         =    $_POST['Password'];
		 $Email            =    $_POST['Email'];
		 $CodeId           =    rand(100000, 999999);
		
  		$InData             =    "insert into admin_login set
		 										 UserId           =    '$CodeId',
												 MemberName       =    '$MemberName',
												 Address          =    '$Address',
												 ContactNo        =    '$ContactNo',
												 UserName         =    '$UserName',
												 Password         =    '$Password',
												 Email            =    '$Email',  
												 Status           =    'Active',
												 Date             =    '$Date'     ";			
		$insert         =     mysql_query($InData);	
				
		if($insert) 
		{ 
					
			$_SESSION['NewSu'] = "Done"; 			
			
			?><meta http-equiv="refresh" content="0; url=./index.php"><?php 
		}
		
}
			



if (isset($_POST['EditAdminProfile']))
{
  
 		$Date             =    date("d/m/Y"); 
 		$MemberName       =    $_POST['MemberName'];
		$Address          =    $_POST['Address'];
		$ContactNo        =    $_POST['ContactNo'];
		$Email            =    $_POST['Email'];
		if($_POST['status']=='SuperAdmin')
		{
			$paypal		  =	$_POST['PaypalAccount'];
		}
		else
		{
			$paypal		  = '';
		}
		$CodeId           =    $_POST['Code'];
		 
		/* if($OldPassword == $EditPassword && $Password !== "")
		 {
		 	$NewPassword = $Password;
		 }
		 else
		 {
		 	$NewPassword = $EditPassword;
		 }*/
		
  		$InData             =    "UPDATE admin_login SET
												 MemberName       =    '$MemberName',
												 Address          =    '$Address',
												 ContactNo        =    '$ContactNo',
												 Email            =    '$Email',
												 paypal_account	  =	   '$paypal',
												 Date             =    '$Date'  
										 WHERE  UserId            =    '$CodeId'";			
		$insert         =     mysql_query($InData);	
				
		if($insert) 
		{ 
					
			$_SESSION['NewSu'] = "Done"; 			
			
			?><meta http-equiv="refresh" content="0; url=./EditUserProfile.php?AJCOde59=<?php echo $CodeId;  ?>"><?php 
		}
		
}

if (isset($_POST['EditAdminPassword']))
{
	$CodeId           =    $_POST['Code'];
	
	$upData	=	"UPDATE admin_login SET
				Password	=	'$_POST[Password]'
				WHERE  UserId            =    '$CodeId'";
	
	$update	=	mysql_query($upData);
		
	if($update) 
	{ 
				
		$_SESSION['UPDATEPWD'] = "Done"; 			
		
		?><meta http-equiv="refresh" content="0; url=./EditUserProfile.php?AJCOde59=<?php echo $CodeId;  ?>"><?php 
	}
}

?>

	<div align="center"><br /><br /><br /><br /><br />Wait Some Moment<br /><br /><img src="../MyInclude/green.gif"  ></div>	
	
	
	
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

