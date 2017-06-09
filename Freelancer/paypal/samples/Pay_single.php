<?php include('../../Admin/MyInclude/MyConfig.php'); ?>
<?php 
	mysql_query("update milestone set status='create',release_date='' where id='$_SESSION[milestone_id]'");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>PayPal Adaptive Payments - Pay</title>
<!--<META HTTP-EQUIV="refresh" CONTENT="1">-->
<link rel="stylesheet" type="text/css" href="Common/sdk.css" />
<script type="text/javascript" src="Common/sdk_functions.js"></script>
<script type="text/javascript" src="Common/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="Common/jquery.qtip-1.0.0-rc3.min.js"></script>

<style>
.no-js #loader { display: none;  }
.js #loader { display: block; position: absolute; left: 100px; top: 0; }
.se-pre-con {
	position: fixed;
	left: 0px;
	top: 0px;
	width: 100%;
	height: 100%;
	z-index: 9999;
	background: url(../../images/green.gif) center no-repeat #fff;
}
</style>

<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>
<script>
	$(window).load(function() {
		//$(".se-pre-con").fadeOut("slow");
		
		setTimeout(function() {
			document.getElementById("release").submit();        
    	}, 1000);
	});
</script>
<script type="text/javascript">
    ;(function () {
        var reloads = [20, 30],
            storageKey = 'reloadIndex',
            reloadIndex = parseInt(localStorage.getItem(storageKey), 10) || 0;

        if (reloadIndex >= reloads.length || isNaN(reloadIndex)) {
            localStorage.removeItem(storageKey);
            return;
        }

        setTimeout(function(){
            window.location.reload();
        }, reloads[reloadIndex]);

        localStorage.setItem(storageKey, parseInt(reloadIndex, 10) + 1);
    }());
</script>
</head>
<?php	
	//$serverName = $_SERVER['SERVER_NAME'];
	//$serverPort = $_SERVER['SERVER_PORT'];
	//$url = dirname('http://' . $serverName . ':' . $serverPort . $_SERVER['REQUEST_URI']);
	//$returnUrl = $url . "/WebflowReturnPage.php";
	//$cancelUrl =  $url . "/Pay.php";
?>

<?php

	$cancelUrl = WebUrl."browse_detail_client.php?project_id=".$_GET['project_id'];

	$currency=$_GET['currency'];
	
	if(isset($_GET['str'])=='admin_pay')
	{
		$admin=mysql_fetch_array(mysql_query("select paypal_account from admin_login where Status='SuperAdmin'"));

		$receiverEmail=$admin['paypal_account'];
		$fee=$_SESSION['remain_pay'];
		
		$returnUrl = WebUrl."browse_detail_client.php?project_id=".$_GET['project_id']."&developer=".$_GET['developer']."&admin_pay=".$_GET['str'];
	}
	else
	{

		$developer=mysql_fetch_array(mysql_query("select * from register where unique_code='$_GET[developer]'"));
		
		$fee=$_SESSION['remain_pay'];
		//$receiverEmail="bhavinthummar100_buyer8@gmail.com";
		$receiverEmail=$developer['paypal_Account'];
		
		$returnUrl = WebUrl."browse_detail_client.php?project_id=".$_GET['project_id']."&developer=".$_GET['developer']."&dev_payment";
	}
?>

<body>
<div class="se-pre-con"></div>

	<div id="wrapper">
		<!--<img src="https://devtools-paypal.com/image/bdg_payments_by_pp_2line.png"/>
		<div id="header">
			<h3>Pay</h3>
			<div id="apidetails">The Pay API operation is used to transfer
				funds from a sender's PayPal account to one or more receivers'
				PayPal accounts. You can use the Pay API operation to make simple
				payments, chained payments, or parallel payments; these payments can
				be explicitly approved, preapproved, or implicitly approved.</div>
		</div>-->
		<div id="request_form">
			<form action="PayReceipt.php" method="post" id="release">
				<!--<div class="params">
					<div class="param_name">Action type *</div>
					<div class="param_value">-->
						<!--<select name="actionType" id="actionType">
							<option value="PAY">PAY</option>
							<option value="CREATE">CREATE</option>
							<option value="PAY_PRIMARY">PAY_PRIMARY</option>
						</select>-->
                        
                        <!--Action Type-->
                        <input type="hidden" name="actionType" id="actionType" value="PAY">
					<!--</div>
				</div>
				<div class="params">
					<div class="param_name">Cancel Url *</div>
					<div class="param_value">-->
						
                        <!--Cancel Url-->
                        <input name="cancelUrl" id="cancelUrl" value="<?php echo $cancelUrl;?>" type="hidden"/>
					<!--</div>
				</div>
				<div class="params">
					<div class="param_name">Currency code *</div>
					<div class="param_value">-->
                    
                    <!--Currency Code-->
					<input name="currencyCode" value="<?php echo $currency;?>"  type="hidden"/>
					
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Fees payer</div>
					<div class="param_value">
						<select name="feesPayer">
							<option value="EACHRECEIVER">EACHRECEIVER</option>
							<option value="PRIMARYRECEIVER">PRIMARYRECEIVER</option>
							<option value="SENDER" selected="selected">SENDER</option>
							<option value="SECONDARYONLY">SECONDARYONLY</option>
						</select>
					</div>
				</div>-->
                
                <!--Fees Payer-->
                <input type="hidden" name="feesPayer" value="SENDER">
                
				<!--<div class="params">
					<div class="param_name">IPN Notification Url</div>
					<div class="param_value">-->
                    
                    <!--IPN Notification Url-->
					<input name="ipnNotificationUrl" value="" type="hidden" />
					
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Memo</div>
					<div class="param_value">-->
                    
                    <!--Memo-->
					<input name="memo" value="" type="hidden" />
					
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Pin</div>
					<div class="param_value">-->
					
                    <!--Pin-->
                    <input name="pin" id="pin" value="" type="hidden"/>
					
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Preapproval key</div>
					<div class="param_value">-->
                    
                    <!--Preapproval Key-->
					<input type="hidden" name="preapprovalKey" id="preapprovalKey" value="" />
					
                    <!--</div>
				</div>
				
				<table class="params" id="receiverTable">
					
					<tr id="receiverTable_0">
						
						<td>-->
							<!--<input type="text" name="receiverEmail[]" id="receiveremail_0" value="platfo_1255612361_per@gmail.com">-->
                            
                            <input type="hidden" name="receiverEmail[0]" id="receiveremail_0" value="<?php echo $receiverEmail;?>">
                            
						<!--</td>
						<td>-->
<!--							<input type="text" name="receiverAmount[]" id="amount_0" value="1.0" class="smallfield">-->


<input type="hidden" name="receiverAmount[0]" id="amount_0" value="<?php echo $fee;?>" class="smallfield">

						<!--</td>
						<td>-->
                        
							<input type="hidden" name="phoneCountry[0]" id="phoneCountry_0" value="" class="xsmallfield" /> 
                            
                             
							<input type="hidden" name="phoneNumber[0]" id="phoneNumber_0" value="" class="xsmallfield" />
                           
                            
							<input type="hidden" name="phoneExtn[0]" id="phoneExtn_0" value="" class="xsmallfield" />
                            
						
                        <!--</td>						
						<td>-->
                        
                        	<!--<select name="primaryReceiver[]" id="primaryReceiver_0" class="smallfield">
								<option value="true">true</option>
								<option value="false" selected="selected">false</option>
							</select>-->
							<input type="hidden" name="primaryReceiver[0]" id="primaryReceiver_0" class="smallfield" value="false">
								
                          
                            
						<!--</td>
						<td>-->
                        
							<input type="hidden" name="invoiceId[0]" id="invoiceid_0" value="" class="smallfield">
                            
                            
						
                        <!--</td>
						<td>-->
                        
							<!--<select name="paymentType[]" id="paymentType_0" class="smallfield">
								<option>- Select -</option>
								<option>GOODS</option>
								<option>SERVICE</option>
								<option>PERSONAL</option>
								<option>CASHADVANCE</option>
								<option>DIGITALGOODS</option>
							</select>-->
                        
                            <input type="hidden" name="paymentType[0]" id="paymentType_0" value="SERVICE" class="smallfield">
                           
                            
						<!--</td>
						<td>-->
                        
							<input type="hidden" name="paymentSubType[0]" id="paymentSubType_0" value="" class="smallfield">
                           
                            
						<!--</td>						
					</tr>
				</table>-->
				<!--<a rel="receiverControls"></a>
				<table align="center">
					<tr>
						<td><a href="#receiverControls" onclick="cloneRow('receiverTable', 8)" id="Submit"><span> Add
									Receiver  </span> </a></td>
						<td><a href="#receiverControls" onclick="deleteRow('receiverTable')" id="Submit"><span>  Delete
									Receiver</span> </a></td>
					</tr>
				</table>-->
				<!--<div class="params">
					<div class="param_name">Reverse all parallel payments on error</div>
					<div class="param_value">-->
                    
                    <!--Reverse all parallel payments on error-->
					<input type="hidden" name="reverseAllParallelPaymentsOnError" id="reverseAllParallelPaymentsOnError" value="false" />
					
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Sender email (Optional for Guest Payment)</div>
					<div class="param_value">-->
                    
                    <!--Sender email (Optional for Guest Payment)-->
					<input type="hidden" name="senderEmail" id="senderEmail" value=""/>
                    
					<!--</div>
				</div>
				<div class="params">
					<div class="param_name">Return Url</div>
					<div class="param_value">-->
                    
                    <!--Return Url-->
					<input type="hidden" name="returnUrl" id="returnUrl" value="<?php echo $returnUrl;?>" />
					<!--</div>
				</div>
				<div class="params">
					<div class="param_name">Tracking Id</div>
					<div class="param_value">-->
                    
                    <!--Tracking Id-->
					<input type="hidden" name="trackingId" id="trackingId" value="" />
                    
                    <!--</div>
				</div>
				<div class="params">
					<div class="param_name">Funding constraint (Requires advanced permission levels)</div>
					<div class="param_value">
						<select name="fundingConstraint" id="fundingConstraint">
							<option value="">- Select -</option>
							<option>ECHECK</option>
							<option>BALANCE</option>
							<option>CREDITCARD</option>
						</select>
					</div>
				</div>-->
                
                <!--Funding constraint (Requires advanced permission levels)-->
                <input type="hidden" name="fundingConstraint" id="fundingConstraint" value="">
                
				<!--<div class="input_header">Sender Identifier</div>
				<table class="params">
					<tr>
						<th>Email</th>
						<th>Phone (Country code / Phone number / Extension)</th>
						<th>Use Credentials</th>
					</tr>
					<tr>-->
                    
                    <!--Sender Identifier-->
                    	<!--Email-->
						<input name="emailIdentifier" id="emailIdentifier" value=""  type="hidden"/>
                        <!--Phone (Country code / Phone number / Extension)-->
						<input type="hidden" name="senderCountryCode" class="smallfield"/>
						<input type="hidden" name="senderPhoneNumber" /> 
                        <input type="hidden" name="senderExtension" class="smallfield"/>
						<!--<select name="useCredentials" id="useCredentials">
								<option></option>
								<option>true</option>
								<option>false</option>
						</select>-->
                        
                        <!--Use Credentials-->
                        <input type="hidden" name="useCredentials" id="useCredentials">
						<!--</td>
					</tr>
				</table>				
				<div class="submit">-->
<!--					<input type="submit" value="Submit" id="pay" />-->
				
        	</form>
    	</div>
	</div>
</body>
</html>