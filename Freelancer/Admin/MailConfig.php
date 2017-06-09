<?php
function email($name,$mail,$message,$subject,$customer){

	//$SmptA  = mysql_fetch_array(mysql_query("Select * from admin_header_footer_data"));	
 // Include the PHPMailer classes
 // If these are located somewhere else, simply change the path.
 require_once("PHPMailer/class.phpmailer.php");
 require_once("PHPMailer/class.smtp.php");
 require_once("PHPMailer/phpmailer.lang-en.php");
 
 // mostly the same variables as before
 // ($to_name & $from_name are new, $headers was omitted)
 $to_name = $name;
 $to = $mail;
  

 
 $message    = wordwrap($message,200);
 $from_name  = "Webzira.com";
 $from       = "miraj@greencubes.co.in";
$headers     = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
 
 // PHPMailer's Object-oriented approach
 $mail = new PHPMailer();
 
 // Can use SMTP
 // comment out this section and it will use PHP mail() instead
 $mail->AddEmbeddedImage('images\bhavna_favicon.ico', 'logoimg','Bhavna Gum Udhyog','base64', 'image/ico');
 $mail->AddEmbeddedImage('images\aspire.ico', 'logoimg1','Aspire Web Service','base64', 'image/ico');
  //$mail->AddEmbeddedImage('images\true.gif', 'logoimg1','true.gif','base64', 'image/gif');
 $mail->IsSMTP();
 $mail->Host     = "mail.greencubes.co.in";
 $mail->Port     = "2525";
 $mail->SMTPAuth = true;
 $mail->Username = "miraj@greencubes.co.in";
 $mail->Password = "Green123/*-";
 $mail->IsHTML(true);
 if($customer=="Yes" or $customer=="Y"){
  $message=  '<html>
  <style type="text/css">
<!--
.style1 {
	font-family: arial;
	font-size: 20px;
	color: #CC6600;
	font-weight: bold;
}
.style2 {
	font-family: verdana;
	font-size: 10px;
	color: #FFFFFF;
}
-->
  </style>
<body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0" bgcolor="#333399" >

<STYLE>
 .headerTop { background-color:#FFCC66; border-top:0px solid #000000; border-bottom:1px solid #FFFFFF; text-align:center; }
 .adminText { font-size:10px; color:#996600; line-height:200%; font-family:verdana; text-decoration:none; }
 .headerBar { background-color:#FFFFFF; border-top:0px solid #333333; border-bottom:10px solid #FFFFFF; }
 .title { font-size:20px; font-weight:bold; color:#CC6600; font-family:arial; line-height:110%; }
 .subTitle { font-size:11px; font-weight:normal; color:#666666; font-style:italic; font-family:arial; }
 td { font-size:12px; color:#000000; line-height:150%; font-family:trebuchet ms; }
 .sideColumn { background-color:#FFFFFF; border-right:1px dashed #CCCCCC; text-align:left; }
 .sideColumnText { font-size:11px; font-weight:normal; color:#999999; font-family:arial; line-height:150%; }
 .sideColumnTitle { font-size:15px; font-weight:bold; color:#333333; font-family:arial; line-height:150%; }
 .footerRow { background-color:#FFFFCC; border-top:10px solid #FFFFFF; }
 .footerText { font-size:10px; color:#996600; line-height:100%; font-family:verdana; }
 a { color:#FF6600; color:#FF6600; color:#FF6600; }
</STYLE>

ThankYou for leaving your precious inquiry. This is an automated response from our company. We will look into your query deeply and try to work on it.<br /><br />


Thanking You<br /><br />

CampusPool Team

<address style="text-align: center;"> </address>

</body>
</html>'; 
}
 // Could assign strings directly to these, I only used the
 // former variables to illustrate how similar the two approaches are.
 $mail->FromName = $from_name;
 $mail->From     = $from;
 $mail->AddAddress($to, $to_name);
 $mail->Subject  = $subject;
 $mail->Body     = $message;
 $mail->Headers = $headers;
 $result = $mail->Send();
 
 if($customer=="Y"){
 
 return $result ? $rr : 'Error';
 }
 
 }
?>

