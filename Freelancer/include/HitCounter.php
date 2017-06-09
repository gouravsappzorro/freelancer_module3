<?php
//extract($_POST);


$IpAddress=$_SERVER['REMOTE_ADDR'];
$PageName=basename($_SERVER['PHP_SELF']);

function ip_details($IpAddress) 
    {
        $json       = unserialize(file_get_contents("http://ip-api.com/php/{$IpAddress}"));
        $details    = $json ;
        return $details;
    }
	
    $details    =   ip_details("$IpAddress");
	$Status=$details['status'];
	
	if($Status!='fail'){
	 
	$City=$details['city'];   
        $Country=$details['country']; 
	 
	$CheckIp=mysql_num_rows(mysql_query("select * from admin_pagehit_counter where IpAddress='".$IpAddress."' and Date='".date('Y-m-d')."'"));
	 if($CheckIp==0)
	 {
	 
	 mysql_query("INSERT INTO `admin_pagehit_counter` (`PageName`, `IpAddress`,`CountryName`,`CityName`,`Date`) VALUES ('".$PageName."', '".$IpAddress."','".$Country."','".$City."','".date('Y-m-d')."')");
			 
	 }
	}
?>