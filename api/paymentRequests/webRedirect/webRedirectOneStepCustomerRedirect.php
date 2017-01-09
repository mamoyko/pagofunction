<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pago Integration: Web Redirect - One Step Customer Redirect</title>
<script type="text/javascript">
	function rand ( n ) {
		document.getElementById("orderID").value = 'one-step-customer-redirect-' + ( Math.floor ( Math.random() * n + 1 ) );
	}
</script>
</head>
<body onLoad="rand(2000000);">

<h1>Pago Integration: Web Redirect - One Step Customer Redirect</h1>

<form action="webRedirectOneStepCustomerRedirectDo.php" method="post">
	
	<label>Domain</label><br/>
	<select name="domain">
		<optgroup label="pagoglobal">
			<option value="secure.pagoglobal.com">secure.pagoglobal.com</option>
		</optgroup>
	</select>
	<br/>
	
	<label>merchantID</label><br/>
	<input type="text" name="merchantID" value="[YOUR_MERCHANTID_GOES_HERE]" size="130" /><br/>
	
	<label>amount</label><br/>
	<input type="text" name="amount" value="1.00" size="130" /><br/>
	
	<label>currency</label><br/>
	<input type="text" name="currency" value="[YOUR_CURRENCY_GOES_HERE]" size="130" /><br/>
	
	<label>orderID</label><br/>
	<input type="text" id="orderID" name="orderID" value="" size="130" /><br/>
	
	<label>returnURL</label><br/>
	<input type="text" name="returnURL" value="http://www.google.com" size="130" /><br/>
	
	<label>notifyURL</label><br/>
	<input type="text" name="notifyURL" value="http://www.yahoo.com" size="130" /><br/>
	
	<label>customerEmail</label><br/>
	<input type="text" name="customerEmail" value="test@test.com" size="130" /><br/>
	
	<label>customerPhone</label><br/>
	<input type="text" name="customerPhone" value="639435044009" size="130" /><br/>
	
	<label>customerFirstName</label><br/>
	<input type="text" name="customerFirstName" value="Tester F" size="130" /><br/>
	
	<label>customerLastName</label><br/>
	<input type="text" name="customerLastName" value="Tester L" size="130" /><br/>
	
	<label>customerAddress1</label><br/>
	<input type="text" name="customerAddress1" value="Ayala Ave" size="130" /><br/>
	
	<label>customerAddress2</label><br/>
	<input type="text" name="customerAddress2" value="" size="130" /><br/>
	
	<label>customerCity</label><br/>
	<input type="text" name="customerCity" value="Makati" size="130" /><br/>
	
	<label>customerZipCode</label><br/>
	<input type="text" name="customerZipCode" value="1234" size="130" /><br/>
	
	<label>customerStateProvince</label><br/>
	<input type="text" name="customerStateProvince" value="NCR" size="130" /><br/>
	
	<label>customerCountry</label><br/>
	<input type="text" name="customerCountry" value="PH" size="130" /><br/>
	
	<label>customerDob</label><br/>
	<input type="text" name="customerDob" value="1982-07-27" size="130" /><br/>
	
	<label>saveCard</label><br/>
	<input type="text" name="saveCard" value="0" size="130" /><br/>
	
	<label>description</label><br/>
	<input type="text" name="description" value="This is a test transaction using one step customer redirect" size="130" /><br/>
	
	<label>pSign</label><br/>
	<input type="text" name="pSign" value="" size="130" disabled="disabled"/><br/>
	
	<br/>
	
	<label>PASSCODE</label><br/>
 	<input type="text" name="passcode" value="[YOUR_PASSCODE_GOES_HERE]" size="130" /><br/>
 
	<input type="submit" id="submit" value="Generate pSign using PASSCODE" /><br/>

</form>

<br/><br/>

</body>
</html>