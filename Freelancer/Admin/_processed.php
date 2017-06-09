<?php //include "./MyInclude/Db_Conn.php"; ?>
<?php include "./MyInclude/MyConfig.php"; ?>

		<?php	/**================================================================================||
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
				||=================================================================================**/?>







<?php


if(!isset($_POST['Email']))
{
	$message=array();
	
	if(isset($_POST['User']) && !empty($_POST['User']))
	{
		$User = $_POST['User'];
	}
	else
	{
		$message[]='Please enter your username.';
	}
	
	if(isset($_POST['Pass']) && !empty($_POST['Pass']))
	{
		$Pass = $_POST['Pass'];
	}
	else
	{
		$message[]='Please enter your password.';
	}
	
	$countError=count($message);
	
	if($countError > 0)
	{
		 for($i=0;$i<$countError;$i++)
		 {
				  echo ucwords($message[$i]).'<br/><br/>';
		 }
	}
	else
	{
		$query="select * from admin_login where UserName = '$User' and Password = '$Pass'";
	
		$res=mysql_query($query);
		$checkUser=mysql_num_rows($res);
		while($rw=mysql_fetch_array($res)) 
		{
			if($rw['UserName']==$_POST['User'] && $rw['Password']==$_POST['Pass'])
			{
				$UId       = $rw['UserId'];
				$Email     = $rw['Email'];
				$UserName  = $rw['UserName'];
				$status    = $rw['Status'];
			
				
				if($checkUser == 0)
				{
				 
					echo ucwords('Your email and password not matching.');
				 
				}
				else if($status == 'Active')
				{
				 
				 
					 $_SESSION['LOGIN_STATUS'] =  'NormalAdmin';
					 $_SESSION['Email']        =  $Email;
					 $_SESSION['UserId']       =  $UId;
					 $_SESSION['UserName']     =  $UserName; 
				
				
					 echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
					 echo 'verify';
				 
				} 
				else if($status == 'SuperAdmin')
				{
				 
				 
					$_SESSION['LOGIN_STATUS'] =  'SuperAdmin';
					$_SESSION['Email']        =  $Email;
					$_SESSION['UserId']       =  $UId;
					$_SESSION['UserName']     =  $UserName; 
				
				
					echo '<meta http-equiv="refresh" content="0; url=index.php"/>';
					echo 'verify';
				 
				} 
				
				else if($status == '') 
				{
			
					echo ucwords('Your Account Is Banded.');
			
				}
			}
			else
			{
				echo ucwords('Your email and password not matching.');
			}
		}
	}
}
else 
{				
	$Forg = array();
	
	if(isset($_POST['Email']))
	{
			
		if(isset($_POST['Email']) && !empty($_POST['Email']))
		{
				 $Email = $_POST['Email'];
				 $regex = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/"; 
				 
				 if ( preg_match( $regex, $Email ) ) 
				 {
					 $Email = $_POST['Email'];
				 }
				 else
				 { 
					  $Forg[] = "Please enter valid email";
				 } 
		}
		else
		{
		   $Forg[]='Please enter your email.';
		}
	
		
		

		
		$countError=count($Forg);

		if($countError > 0)
		{
			  for($i=0;$i<$countError;$i++)
			 {
			  echo ucwords($Forg[$i]).'<br/><br/>';
			 }
		}
		else
		{
		
			$Qi    = "select * from admin_login where Email = '$Email' ";
			$KI    =  mysql_query($Qi);
			$EUser =  mysql_num_rows($KI);
			
			while($ro = mysql_fetch_array($KI)) 
			{
		
			  $To        =  $ro['Email'];
			  $UserName  =  $ro['UserName'];
			  $UserPass  =  $ro['Password'];
			   
			}    
			if($EUser == 0)
			{
				 
				 echo ucwords('Your email  not matching.');
				 
			}
			else
			{										
				include "./SendEmail.php";
				 echo 'EmailSent';
				 
			} 
		}
	}
}

?>




		<?php	/**================================================================================||
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
				||=================================================================================**/?>


