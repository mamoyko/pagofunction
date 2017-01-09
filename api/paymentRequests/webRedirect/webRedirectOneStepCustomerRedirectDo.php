<?php 
	include_once '../../../functions/functions.php';
	
	$domain = $_REQUEST['domain'];
	$gatewayURL = "https://".$domain."/transaction/customerDirect" ;
	$passcode = $_REQUEST['passcode'];
	
	$merchantID = $_REQUEST['merchantID'];
	$amount = $_REQUEST['amount'];
	$currency = $_REQUEST['currency'];
	$orderID = $_REQUEST['orderID'];
	$returnURL = $_REQUEST['returnURL'];
	$notifyURL = $_REQUEST['notifyURL'];
	
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
	
	$saveCard = $_REQUEST['saveCard'];
	$description = $_REQUEST['description'];

	$pSign = sha1($passcode . $merchantID . $amount . $currency . $orderID . $returnURL . $notifyURL . 
			$customerEmail . $customerPhone . $customerFirstName . $customerLastName . $customerAddress1 . $customerAddress2 .
			$customerCity . $customerZipCode . $customerStateProvince . $customerCountry . $customerDob .
			$saveCard . $description);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pago Integration: Web Redirect - One Step Customer Redirect</title>
</head>
<body>

<form id="paymentForm" name="paymentForm" action="<?php echo $gatewayURL; ?>" method="post">

	<input type="hidden" name="merchantID" value="<?php echo $merchantID; ?>" size="130" />
	
	<input type="hidden" name="amount" value="<?php echo $amount; ?>" size="130" />
	
	<input type="hidden" name="currency" value="<?php echo $currency; ?>" size="130" />
	
	<input type="hidden" name="orderID" value="<?php echo $orderID; ?>" size="130" />
	
	<input type="hidden" name="returnURL" value="<?php echo $returnURL; ?>" size="130" />
	
	<input type="hidden" name="notifyURL" value="<?php echo $notifyURL; ?>" size="130" />
	
	<input type="hidden" name="customerEmail" value="<?php echo $customerEmail; ?>" size="130" />
	
	<input type="hidden" name="customerPhone" value="<?php echo $customerPhone; ?>" size="130" />
	
	<input type="hidden" name="customerFirstName" value="<?php echo $customerFirstName; ?>" size="130" />
	
	<input type="hidden" name="customerLastName" value="<?php echo $customerLastName; ?>" size="130" />
	
	<input type="hidden" name="customerAddress1" value="<?php echo $customerAddress1; ?>" size="130" />
	
	<input type="hidden" name="customerAddress2" value="<?php echo $customerAddress2; ?>" size="130" />
	
	<input type="hidden" name="customerCity" value="<?php echo $customerCity; ?>" size="130" />
	
	<input type="hidden" name="customerZipCode" value="<?php echo $customerZipCode; ?>" size="130" />
	
	<input type="hidden" name="customerStateProvince" value="<?php echo $customerStateProvince; ?>" size="130" />
	
	<input type="hidden" name="customerCountry" value="<?php echo $customerCountry; ?>" size="130" />
	
	<input type="hidden" name="customerDob" value="<?php echo $customerDob; ?>" size="130" />
	
	<input type="hidden" name="saveCard" value="<?php echo $saveCard; ?>" size="130" />
	
	<input type="hidden" name="description" value="<?php echo $description; ?>" size="130" />
	
	<input type="hidden" name="pSign" value="<?php echo $pSign; ?>" size="130" />

</form>

<script type="text/javascript">
	document.forms["paymentForm"].submit();
</script>

</body>
</html>