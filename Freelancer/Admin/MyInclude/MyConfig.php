<?php 
	ob_start();
	//~ session_start(); 
	//error_reporting(0);
?>
<?php  
date_default_timezone_set('Asia/Kolkata');
//~ date_default_timezone_set('UTC');
if($_SERVER['HTTP_HOST'] == 'localhost')
{
				/* Provide Your HostName  Here */				$HostName      = "localhost";                              
				/* Provide Your Database User Provide Here */   $DbUser        = "root"; 
				/* Provide Your Database Password Here */       $DbPassword    = ""; 
				/* Provide Your Database Name Here */    	    $Database      = "freelancer";  
				/* Provide Sql Query Here */    			    $Db            = mysql_connect($HostName, $DbUser, $DbPassword)or die ('Error: '.mysql_error()); 
				/* Provide Sql Query Here */		                             mysql_select_db($Database,$Db)or die ('Error: '.mysql_error());	
																
																$dbtablehits = 'hits';
																$dbtableinfo = 'info';
																$maxrows = 50;	
}				
else
{
 				//================== ** Online Server Define Here ** =======================//   
	
/* Provide Your HostName  Here */				$HostName      = "localhost";                              
/* Provide Your Database User Provide Here */   $DbUser        = "traalero_trainee"; 
/* Provide Your Database Password Here */       $DbPassword    = "trainee"; 
/* Provide Your Database Name Here */    	    $Database      = "traalero_freelancer";  
/* Provide Sql Query Here */    			    $Db            = mysql_connect($HostName, $DbUser, $DbPassword) or die ('Error: '.mysql_error()); 
/* Provide Sql Query Here */		                             mysql_select_db($Database,$Db) or die ('Error: '.mysql_error());	
												$dbtablehits = 'hits';
												$dbtableinfo = 'info';
												$maxrows = 50;	
}		
?>
<?php  
		if($_SERVER['HTTP_HOST'] == 'localhost')
		{
		/* Provide Your Admin Url Here */		    define('AdminUrl',   'http://localhost/Freelancer/Admin/'); 
		/* Provide Your Site Url Here */    	    define('WebUrl',     'http://localhost/Freelancer/');              
		/* Provide Your Htaccess Url Url Here */	define('LastUrl',    'http://localhost/Freelance/Pages.php?View=');		
													define('LastUrl1',    'http://localhost/Freelance/Pages.php?ViewPage=');		
		}
		else
		{
			/*(<!-- ================== ** Online Server Define Here  ** ======================= --> */
														      		
		/* Provide Your Admin Url Here */		    define('AdminUrl',   'http://traala.com.md-in-45.webhostbox.net/Freelancer/Admin/'); 
		/* Provide Your Site Url Here */    	    define('WebUrl',     'http://traala.com.md-in-45.webhostbox.net/Freelancer/');              
		/* Provide Your Htaccess Url Url Here */	define('LastUrl',    'http://traala.com.md-in-45.webhostbox.net/Freelancer/Pages.php?View=');	
													define('LastUrl1',    'http://traala.com.md-in-45.webhostbox.net/Freelancer/Pages.php?ViewPage=');
		} 

/* Provide Your Table Name Below  */
/* Funcltion Of Limited Word Display  Below // @@Don't Change Anything@@ */										

/*function limit_words($string, $word_limit)
{
	$words = explode(" ",$string);
	 return implode(" ", array_splice($words, 0, $word_limit));
}*/
function limit_words($text, $limit) 
{
	if (str_word_count($text, 0) > $limit) 
	{
    	$words = str_word_count($text, 2);
        $pos = array_keys($words);
        $text = substr($text, 0, $pos[$limit]) . '...';
	}
    return $text;
}

function country($code){
	
	$data="select * from location where Code='".$code."'";
 	$res=mysql_query($data);
 	$rowcnt=mysql_fetch_array($res);
 	return $country=$rowcnt['Name'];
}

function CountryName($codearray){
	
	$array_data=explode(",",$codearray);
	$data="select * from location where Code IN (".$codearray.")";
 	$res=mysql_query($data);
 	while($rowcnt=mysql_fetch_array($res))
 	{
 	$country[]=$rowcnt['Name'];
    }
 return implode(",", $country);
}

function showcurrenttime()
{
	if(!isset($_COOKIE['GMT_bias']))
    {
	?>
 		<script type="text/javascript">
 		var Cookies = {};
 		Cookies.create = function (name, value, days)
		{
 		
			if (days) {
				var date = new Date();
				date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
				var expires = "; expires=" + date.toGMTString();
			} else {
				var expires = "";
			}
			
			document.cookie = name + "=" + value + expires + "; path=/";
			this[name] = value;
 		}
 	
		var now = new Date();
		Cookies.create("GMT_bias",now.getTimezoneOffset(),1);
		window.location = "<?php echo $_SERVER['REQUEST_URI'];?>";
		</script>
	<?php
 	}
	else
	{
 		$fct_clientbias = $_COOKIE['GMT_bias'];
 	}
 
 	$fct_servertimedata = gettimeofday();
 	$fct_servertime = $fct_servertimedata['sec'];
 	$fct_serverbias = $fct_servertimedata['minuteswest'];
 	$fct_totalbias = $fct_serverbias - $fct_clientbias;
 	$fct_totalbias = $fct_totalbias * 60;
 	$fct_clienttimestamp = $fct_servertime + $fct_totalbias;
 	$fct_time = time();
 	$fct_year = strftime("%Y", $fct_clienttimestamp);
 	$fct_month = strftime("%m", $fct_clienttimestamp);
 	$fct_day = strftime("%d", $fct_clienttimestamp);
 	$fct_hour = strftime("%H", $fct_clienttimestamp);
 	$fct_minute = strftime("%M", $fct_clienttimestamp);
 	$fct_second = strftime("%S", $fct_clienttimestamp);
 	//$fct_am_pm = strftime("%p", $fct_clienttimestamp);
 	
	return $fct_year."-".$fct_month."-".$fct_day." ".$fct_hour.":".$fct_minute.":".$fct_second;
}

function Get_Date_Difference($start_date, $end_date)
    {
        $diff = abs($end_date - strtotime($start_date));
        $years = floor($diff / (365*60*60*24));
        $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));
        $days = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24));
        return $years.','.$months.','.$days;
    }

?>
