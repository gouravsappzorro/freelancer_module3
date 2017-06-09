<?php
	$con=mysql_connect("localhost","greencub_miraj","green123");
	$db=mysql_select_db("greencub_freelancer",$con);
?>
<?php 
class Configuration
{
	
	// For a full list of configuration parameters refer in wiki page (https://github.com/paypal/sdk-core-php/wiki/Configuring-the-SDK)
	public static function getConfig()
	{
		$config = array(
				// values: 'sandbox' for testing
				//		   'live' for production
                //         'tls' for testing if your server supports TLSv1.2
				
				"mode" => "sandbox"

		
                // TLSv1.2 Check: Comment the above line, and switch the mode to tls as shown below
                // "mode" => "tls"
	
				// These values are defaulted in SDK. If you want to override default values, uncomment it and add your value.
				// "http.ConnectionTimeOut" => "5000",
				// "http.Retry" => "2",
			);
		return $config;
	}
	
	// Creates a configuration array containing credentials and other required configuration parameters.
	public static function getAcctAndConfig()
	{
		/*$sql=mysql_query("select * from register where unique_code='".$_SESSION['id']."'");
		$row=mysql_fetch_array($sql);
	 	$username=$row['paypal_UserName'];
	 	$password=$row['paypal_Password'];
	 	$signature=$row['paypal_Signature'];*/
		
		$config = array(
				// Signature Credential
				"acct1.UserName" => "rviparmar96386-facilitator_api1.gmail.com",
				"acct1.Password" => "Y7NCHK7HP27E6JF2",
				"acct1.Signature" => "A9qwzwDrpElvgAQ.O9NqwlYhi.GmAtYFHGL9XrrNdYe5zGe7HkyK.3qn",
				"acct1.AppId" => "APP-80W284485P519543T"
				
				
				/*"acct1.UserName" => "	
buyer_api1.greencubes.co.in",
				"acct1.Password" => "PVKKZQKZFJLSQN93",
				"acct1.Signature" => "AFcWxV21C7fd0v3bYYYRCpSSRl31A7Y1elCatTwKa2-1GdBnv5zNhB2p",
				"acct1.AppId" => "APP-80W284485P519543T"*/
				
				/*============ Dynamic credentials ===========*/
				
				/*"acct1.UserName" => "$username",
				"acct1.Password" => "$password",
				"acct1.Signature" =>"$signature",
				"acct1.AppId" => "APP-80W284485P519543T"*/
				
				/*============================================*/
				
				// Sample Certificate Credential
				// "acct1.UserName" => "certuser_biz_api1.paypal.com",
				// "acct1.Password" => "D6JNKKULHN3G5B8A",
				// Certificate path relative to config folder or absolute path in file system
				// "acct1.CertPath" => "cert_key.pem",
				// "acct1.AppId" => "APP-80W284485P519543T"
				);
		
		return array_merge($config, self::getConfig());;
	}

}
