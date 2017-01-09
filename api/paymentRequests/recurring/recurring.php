<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Pago Integration: Recurring</title>
<script type="text/javascript">
	function rand ( n ) {
		document.getElementById("orderID").value = 'test-' + ( Math.floor ( Math.random() * n + 1 ) );
	}
</script>
</head>
<body onLoad="rand(2000000);">

<h1>Pago Integration: Recurring</h1>

<form action="recurringDo.php" method="post">
	
	<label>Domain</label><br/>
	<select name="domain">
		<optgroup label="pagoglobal">
			<option value="secure.pagoglobal.com">secure.pagoglobal.com</option>
			<option value="dev.pagoglobal.com">dev.pagoglobal.com</option>
		</optgroup>		
	</select>
	<br/>
	
	<label>merchantID</label><br/>
	<input type="text" name="merchantID" value="[YOUR_MERCHANTID_GOES_HERE]" size="130" /><br/>
	
	<label>amount</label><br/>
	<input type="text" name="amount" value="1.00" size="130" /><br/>
	
	<label>orderID</label><br/>
	<input type="text" id="orderID" name="orderID" value="" size="130" /><br/>
	
	<label>originalTransactionID</label><br/>
	<input type="text" name="originalTransactionID" value="" size="130" /><br/>
	
	<!-- <label>cardCVV2</label><br/>
	<input type="text" name="cardCVV2" value="777" size="130" /><br/> -->
	
	<label>pSign</label><br/>
	<input type="text" name="pSign" value="" size="130" disabled="disabled"/><br/>
	
	<br/>
	
	<label>PASSCODE</label><br/>
 	<input type="text" name="passcode" value="[YOUR_PASSCODE_GOES_HERE]" size="130" /><br/>
 
	<input type="submit" id="submit" value="Generate pSign using PASSCODE and Submit Request" /><br/>

</form>

<br/><br/>

</body>
</html>