<?php 
	include_once '../../../functions/functions.php';
	
	$domain = $_REQUEST['domain'];
	$gatewayURL = "https://".$domain."/transaction/recurrent" ;
	$passcode = $_REQUEST['passcode'];
	
	$merchantID = $_REQUEST['merchantID'];
	$amount = $_REQUEST['amount'];
	$orderID = $_REQUEST['orderID'];
	$originalTransactionID = $_REQUEST['originalTransactionID'];
	/* $cardCVV2 = $_REQUEST['cardCVV2']; */
	
	$pSign = sha1($passcode . $merchantID . $amount . $orderID . $originalTransactionID /* . $cardCVV2 */);
	
	$postData = "";
	$postData .= "merchantID=" . $merchantID;
	$postData .= "&amount=" . $amount;
	$postData .= "&orderID=" . $orderID;
	$postData .= "&originalTransactionID=" . $originalTransactionID;
	/* $postData .= "&cardCVV2=" . $cardCVV2; */
	$postData .= "&pSign=" . $pSign;
	
	$result = http_post($gatewayURL, $postData);
	
	$serverResponseJson = json_decode($result, TRUE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pago Integration: Recurring</title>
</head>
<body>

<h1>Pago Integration: Recurring</h1>

<label>Gateway URL</label><br/>
<textarea cols="100" rows="3"><?php echo $gatewayURL; ?></textarea><br/>

<label>Request</label><br/>
<textarea cols="100" rows="8"><?php echo $postData; ?></textarea><br/>

<label>Response</label><br/>
<textarea cols="100" rows="8"><?php echo $result; ?></textarea><br/>

<label>Response parsed and displayed below</label><br/>
<textarea cols="100" rows="8">
responseCode: <?php echo isset($serverResponseJson['responseCode'])? $serverResponseJson['responseCode'] : ""; ?>&#13;&#10;
reasonCode: <?php echo isset($serverResponseJson['reasonCode'])? $serverResponseJson['reasonCode'] : ""; ?>&#13;&#10;
redirectURL: <?php echo isset($serverResponseJson['redirectURL'])? $serverResponseJson['redirectURL'] : ""; ?>&#13;&#10;
transactionID: <?php echo isset($serverResponseJson['transactionID'])? $serverResponseJson['transactionID'] : ""; ?>&#13;&#10;
amount: <?php echo isset($serverResponseJson['amount'])? $serverResponseJson['amount'] : ""; ?>&#13;&#10;
currency: <?php echo isset($serverResponseJson['currency'])? $serverResponseJson['currency'] : ""; ?>&#13;&#10;
orderID: <?php echo isset($serverResponseJson['orderID'])? $serverResponseJson['orderID'] : ""; ?>&#13;&#10;
executed: <?php echo isset($serverResponseJson['executed'])? $serverResponseJson['executed'] : ""; ?>&#13;&#10;
pSign: <?php echo isset($serverResponseJson['pSign'])? $serverResponseJson['pSign'] : ""; ?>&#13;&#10;
</textarea>

<br/><br/>

</body>
</html>