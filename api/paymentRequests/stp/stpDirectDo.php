<?php 
	include_once '../../../functions/functions.php';
	
	$domain = $_REQUEST['domain'];
	$gatewayURL = "https://".$domain."/transaction/execute" ;
	$passcode = $_REQUEST['passcode'];
	
	$merchantID = $_REQUEST['merchantID'];
	$amount = $_REQUEST['amount'];
	$currency = $_REQUEST['currency'];
	$orderID = $_REQUEST['orderID'];
	
	$customerIP = $_REQUEST['customerIP'];
	
	$customerEmail = $_REQUEST['customerEmail'];
	$customerPhone = $_REQUEST['customerPhone'];
	$customerFirstName = $_REQUEST['customerFirstName'];
	$customerLastName = $_REQUEST['customerLastName'];
	$customerAddress1 = $_REQUEST['customerAddress1'];
	$customerAddress2 = $_REQUEST['customerAddress2'];
	$customerCity = $_REQUEST['customerCity'];
	$customerZipCode = $_REQUEST['customerZipCode'];
	$customerStateProvince = $_REQUEST['customerStateProvince'];
	$customerCountry = $_REQUEST['customerCountry'];
	$customerDob = $_REQUEST['customerDob'];
	
	$cardNumber = $_REQUEST['cardNumber'];
	$cardCVV2 = $_REQUEST['cardCVV2'];
	$cardExpiryDate = $_REQUEST['cardExpiryDate'];
	$cardHolderName = $_REQUEST['cardHolderName'];
	
	$saveCard = $_REQUEST['saveCard'];
	$description = $_REQUEST['description'];

	$pSign = sha1($passcode . $merchantID . $amount . $currency . $orderID . $customerIP .
			$customerEmail . $customerPhone . $customerFirstName . $customerLastName . $customerAddress1 . $customerAddress2 .
			$customerCity . $customerZipCode . $customerStateProvince . $customerCountry . $customerDob . $cardNumber . $cardCVV2 . $cardExpiryDate . $cardHolderName .
			$saveCard . $description);
	
	$postData = "";	
	$postData .= "merchantID=" . $merchantID;
	$postData .= "&amount=" . $amount;
	$postData .= "&currency=" . $currency;
	$postData .= "&orderID=" . $orderID;
	$postData .= "&customerIP=" . $customerIP;
	$postData .= "&customerEmail=" . $customerEmail;
	$postData .= "&customerPhone=" . $customerPhone;
	$postData .= "&customerFirstName=" . $customerFirstName;
	$postData .= "&customerLastName=" . $customerLastName;
	$postData .= "&customerAddress1=" . $customerAddress1;
	$postData .= "&customerAddress2=" . $customerAddress2;
	$postData .= "&customerCity=" . $customerCity;
	$postData .= "&customerZipCode=" . $customerZipCode;
	$postData .= "&customerStateProvince=" . $customerStateProvince;
	$postData .= "&customerCountry=" . $customerCountry;
	$postData .= "&customerDob=" . $customerDob;
	$postData .= "&cardNumber=" . $cardNumber;
	$postData .= "&cardCVV2=" . $cardCVV2;
	$postData .= "&cardExpiryDate=" . $cardExpiryDate;
	$postData .= "&cardHolderName=" . $cardHolderName;
	$postData .= "&saveCard=" . $saveCard;
	$postData .= "&description=" . $description;
	$postData .= "&pSign=" . $pSign;
	
	$result = http_post($gatewayURL, $postData);
	
	$serverResponseJson = json_decode($result, TRUE);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pago Integration: STP Direct</title>
</head>
<body>

<h1>Pago Integration: STP Direct</h1>

<label>Gateway URL</label><br/>
<textarea cols="100" rows="3"><?php echo $gatewayURL; ?></textarea><br/>

<label>Request</label><br/>
<textarea cols="100" rows="8"><?php echo $postData; ?></textarea><br/>

<label>Response</label><br/>
<textarea cols="100" rows="8" name="response"><?php echo $result; ?></textarea><br/>

<label>Response parsed and displayed below</label><br/>
<textarea cols="100" rows="8">
responseCode: <?php echo isset($serverResponseJson['responseCode'])? $serverResponseJson['responseCode'] : ""; ?>&#13;&#10;
reasonCode: <?php echo isset($serverResponseJson['reasonCode'])? $serverResponseJson['reasonCode'] : ""; ?>&#13;&#10;
redirectURL: <?php echo isset($serverResponseJson['redirectURL'])? $serverResponseJson['redirectURL'] : ""; ?>&#13;&#10;
transactionID: <?php echo isset($serverResponseJson['transaction']['transactionID'])? $serverResponseJson['transaction']['transactionID'] : ""; ?>&#13;&#10;
amount: <?php echo isset($serverResponseJson['transaction']['amount'])? $serverResponseJson['transaction']['amount'] : ""; ?>&#13;&#10;
currency: <?php echo isset($serverResponseJson['transaction']['currency'])? $serverResponseJson['transaction']['currency'] : ""; ?>&#13;&#10;
orderID: <?php echo isset($serverResponseJson['transaction']['orderID'])? $serverResponseJson['transaction']['orderID'] : ""; ?>&#13;&#10;
executed: <?php echo isset($serverResponseJson['transaction']['executed'])? $serverResponseJson['transaction']['executed'] : ""; ?>&#13;&#10;
pSign: <?php echo isset($serverResponseJson['pSign'])? $serverResponseJson['pSign'] : ""; ?>&#13;&#10;
</textarea>
<br/>

</body>
</html>