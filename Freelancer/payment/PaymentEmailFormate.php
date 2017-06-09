<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php 
include('../MailConfig.php');
	
	$UserEmail			= $Email;	
	$to       			= $UserEmail;
	$subject  			= "Welcome- Pest & Mould Control";
	$header   			= "Pest & Mould Control";


$msg	= '  <div style="background-color:#e5e5e1;font-size:18px">
    <div bgcolor="#e5e5e1" style="margin:0;padding:0">
      <table width="100%" bgcolor="#e5e5e1" cellspacing="0" cellpadding="0"><tbody><tr>
<td valign="bottom">
              <table style="background-color:#fff;padding:10px;border:solid 1px #cccccc" width="672" align="center" cellspacing="0" cellpadding="0"><tbody>
<tr>
<td height="78" align="left" style="background-color:#f9f9f9;border:1px solid #e3e3e3">
                      <table width="651" border="0" cellspacing="0" cellpadding="0"><tbody><tr>
<td style="padding-left:15px;" align="left" valign="middle">
                          <img src="'.AdminUrl.'Admin/SliderImage/pestmouldcontrol_logo.png" class="CToWUd">
</td>
                        </tr></tbody></table>
</td>
                    
                  </tr>
<tr valign="top" style="">
<td style="padding-top:20px" height="218" align="center">
                      <table width="630" border="0" align="center" cellpadding="5px" cellspacing="0">
<tbody><tr align="left">
<td width="212" style="font-family:Arial,Helvetica,sans-serif;font-size:20px;color:#000">
                            Hi,'.$name.'!
                          </td>

                        </tr>			
				
					
				
<tr>
<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
                            <span class="il">Welcome</span> to Done and Busted!<br><br>
                          Thanks for Payment Done and Busted. You can Apply For job   <br />
<br />
<br><br>
                            
							
                            
                          </td>
                        </tr>
						
						<tr>
<td style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;">
                           Start Date = '.$paydate.'<br><br>
						   End Date	  = '.$nextpaydate.'<br><br>
						   Plan Name  = '.$plannew.'<br><br>
                           <br />
<br />
<br><br>
                            
							
                            
                          </td>
                        </tr>
						
<tr valign="left">
<td height="50" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;border-bottom:1px solid #ccc">
                           If you have any queries, feel free to contact us at  info@pestmouldcontrol.com
                          </td>
                        </tr>


<tr valign="left">
<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:16px;color:#000;line-height:24px;word-spacing:1px;padding-top:30px">
                          Thank you 
                            <br>
                            -Team Done and Busted
                          </td>
                        </tr>
						
<tr align="left">
<td height="50" align="left" valign="top" style="font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#000;line-height:24px;word-spacing:1px;padding-top:0px">
                          Copyrights @ 2015 Done and Busted.  All Rights Reserved. 
                          </td>
                        </tr>						
						
</tbody></table>
</td>
                  </tr>
</tbody></table>
</td>
          </tr></tbody></table>
</div>
  <img width="1px" height="1px" alt="" src="https://ci3.googleusercontent.com/proxy/83dfHynG2V1AsC6C9f_Kf_UZNQ09DFy9EW5fjBHlPq8q_kO0dzTQaJSW4lE694FRehVFZjKmfXBUAguY_MntW5AWy4s5kuWoVhy6WBB9A4YIx9I-yB48EX6yyLBA9yXupAEVV64VaoJMO-RkoghuefmPXUI4zB-9b24PBf9XaK3eQO-irJ1dPjtTiSXekbU5piZ2g0rozJ6N56_FiETbJX6576lzoGjFkYzmTE8suKlCAMOAW3N1iENTOHMrnWKKnOBTcuMJhKikx9F9xGhjMPCuTwYnId3YlAhyARamfJiicMdZ5jgfZjYrqFj50t9tKiB8kMlDPFTr6HgVjRZHiLySNklqPkau0uRuZRn42yeT60-pzu5PMeEan_s8ANxAfZSgwGmXxLdSDyu_9hEm6EMTjtbDw51_d2Xdq1sol7I5IKiq6qR5LD5kCVvFU4x0DvtEB8YZAYAtFeYfAtNtPp1wHBtRGxF3jMiRvm-24eyS3gIoAWyuqCsvOZwEXNj9CGxaWZJDPb7m4LojOMYQ68I=s0-d-e1-ft#http://email.getveromail.com/o/eJyFkM1OwzAQhJ-muViKbCch8SGXwhEJDkg9Rht727j4T66bwtsTFyhBQuI22v1mNLsSbAB9cJtmG1HqoNGlQXkLehk99IdFmFJ6W8gfEPNwOJ3HI8qUqR2aBUGSPNn5-DrpGQvVq0pUfO2bIWpI2l-T771L0ZtC95yyhnaUM8p5fVeytmWirLho2KamB0wzRn-rMfXVSOuGtXupFFAFiFKMY1eh6PawKFHE3vpodYRj9v91wD_VV-S3HLTKNO_atl7vQ_Q5aXBgMQNPAd2bRGPIC8rJeQPjiTzPqSSPSa2N6T1cDVucYNb-HMH8WqMNBhLegi9f5cjls3CR-vyXD63YmbA" class="CToWUd"></div>';
  
    $send=email("Done and Busted",$to,$msg,$subject,"No");

  ?>

</body>
</html>