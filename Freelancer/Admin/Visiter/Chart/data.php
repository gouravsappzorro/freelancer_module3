<?php
include "../../MyInclude/Db_Conn.php";

$Start = date('Y-m-01 ',strtotime('this month'));
$End = date('Y-m-t ',strtotime('this month'));
 $Today = date('Y-m-d');


$begin = new DateTime($Start);
$end = new DateTime($Today);

$interval = DateInterval::createFromDateString('1 day');
$period = new DatePeriod($begin, $interval, $end);

$rows = array();	
$rows['name'] = 'Revenue';

foreach ( $period as $dt )
	{
 					
						  $sth = mysql_num_rows(mysql_query("SELECT * FROM admin_pagehit_counter where Date = '".$dt->format( "Y-m-d" )."'  "));
						    
							
								
								 $rows['data'][] = $sth;
							
								
  
  	}


 /*
  $data = "select Id,PageName, COUNT(Date) as tot from hitsdate group by Date ";
  $fet44 = mysql_query($data);
  while($row = mysql_fetch_array($fet44))
  {
    echo $row['Id'];
    echo $row['PageName'];
    echo $row['tot']."<br/>";

  }

*/

		

$result = array();
array_push($result,$rows);
//array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);


?>
<?php /*
include "./MyInclude/Db_Conn.php";

$Start = date('Y/m/01 ',strtotime('this month'));
$End = date('Y/m/t ',strtotime('this month'));

$sth = mysql_query("SELECT * FROM admin_visiter_count where Date BETWEEN '$Start' and '$End'");
$rows = array();
$rows['name'] = 'Revenue';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['Count'];
}

/*$sth = mysql_query("SELECT overhead FROM projections_sample");
$rows1 = array();
$rows1['name'] = 'Overhead';
while($rr = mysql_fetch_assoc($sth)) {
    $rows1['data'][] = $rr['overhead'];
}

$result = array();
array_push($result,$rows);
//array_push($result,$rows1);


print json_encode($result, JSON_NUMERIC_CHECK);
*/

?>
