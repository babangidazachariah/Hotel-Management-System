<?php 
	print(strripos($_GET['cardNumber'], "daddy"));
?>
<form method="GET" action='GetRooms.php'>
	<table><tr><td align="right"><b>Card Issuer :</b></td><td align="left"><select name="bank" id="bank"><option value="">Select Bank</option><option value="Access">Access</option><option value="Eco">Eco Bank</option><option value="FirstCity">FCMB</option><option value="FirstBank">First Bank</option><option value="Keystone">Keystone</option><option value="Sterling">Sterling</option><option value="UBA">UBA</option><option value="Zenith">Zenith</option></td></tr><tr><td align="right"><b>Card Serial Number :</b></td><td align="left"><input type="password" name="cardNumber" id="cardNumber" /></select></td></tr> 
										<tr><td align="right"><b>  Expiry Date :</b></td><td align="left"><input type="text" name="category" id="experyDate" />dd-mm-yyyy </td></tr>
										<tr><td align="right"><b>  Price :</b></td><td align="left"><input type="text" name="floor" id="price" />dd-mm-yyyy </td></tr><tr><td><input type='submit' value='submit' /></table><p /> 

</form>