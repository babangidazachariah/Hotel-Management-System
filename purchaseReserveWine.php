<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		
		<title>Purchase/Reserve Wine</title>
		
		<link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
		<script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    
		
		<link rel="stylesheet" type="text/css" href="media/css/alert.css" />
		
		<link href="generic.css" rel="stylesheet" type="text/css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<script type="text/javascript" src="media/js/js-core.js"></script>
		<script type="text/javascript" src="media/js/alert.js"></script>
		
		<script type="text/javascript">
			window.onload = function() {
				/*
				 * You'll probably want to replace this with $('#demo').click( fn ); or whatever the
				 * JS library you are using uses. If none then this will do nicly!
				 */
				 
				//parameters declarations.
				var bank = "";
				var cardSerialNumber = "";
				var cardSsn = "";
				var cardName= "";
				var cardType = "";
				var experyDate = "";
				var roomCategory = "";
				var floor = "";
				var room = "";
				
				
				//loop through the list of items to scan for selected ones.
				var totalPrice = 0;
				var selectedItems = ""; //the items the user wishes to purchase
				jsCore.addListener( {
					"mElement":  "demo",
					"sType":     "click",
					'sTitle': 'Hotel 7teen',
					"fnCallback": function() {
						//get and compute the price of the selected items.
						var prices = document.getElementById("priceList").value;
						var priceList = prices.split(",");
						var names = document.getElementById("nameList").value;
						var nameList = names.split(",");
						
						
						for(var i = 0; i < (nameList.length - 1); i++){
							//Alert.fnAlert( nameList[i]);
							if(document.getElementById(nameList[i]+'Option').value >= 1){
								var num = parseInt(document.getElementById(nameList[i]+'Option').value);
								selectedItems += nameList[i] + ",";
								if(!isNaN(parseFloat(priceList[i]))){
									totalPrice += (num * parseFloat(priceList[i]));
								}
							}
						}
						
						Alert.fnConfirm( "Please, You\'ll Need To Provide Your Master/Credit Card Details!!!<br /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' /><br />The Cost Of Your Reservation is <strike>N</strike>"+totalPrice,
							fnCallbackOkay, fnCallbackCancel );
					}
				} );
				
				fnCallbackOkay = function () {
					
					//Alert.fnAlert( "The okay button was selected." );
					if(totalPrice > 0){
						Alert.fnCustom({
								//var enableSubmit = false; <img height=\'27\' width=\'400\' src=\'images/cardimg.gif\' /> \   Expiry Date : <br /><b>yyyy-mm-dd </b></b></td><td align="left"><input type="text" name="experyDate" id="experyDate" />
									
								'sTitle': 'Hotel 7teen - Card Details',
								'sMessage': '<center> \<table><tr><td rowspan="5"><img height="100" width="100" src="images/cardimg.gif" /> </td><td align="right"><b>Card Issuer :</b></td><td align="left"><select name="bank" id="bank"><option value="">Select Bank</option><option value="Access">Access</option><option value="Eco">Eco Bank</option><option value="FirstCity">FCMB</option><option value="FirstBank">First Bank</option><option value="Keystone">Keystone</option><option value="Sterling">Sterling</option><option value="UBA">UBA</option><option value="Zenith">Zenith</option></select></td></tr><tr><td align="right"><b>Card Type :</b></td><td align="left"><select name="cardType" id="cardType"><option value="">Select Card</option><option value="verve">Verve Card</option><option value="master">Master Card</option><option value="visa">Visa Card</option></select></td></tr><tr><td align="right" width="100"><b>Card S/No. :</b></td><td align="left"><input type="password" name="cardSerialNumber" id="cardSerialNumber" /></td></tr></table><p /></center>',
								'sDisplay': 'abcd', 
								'fnPreComplete': function() { 
									if((document.getElementById('bank').value == '') || (document.getElementById('cardType').value == '') || (document.getElementById('cardSerialNumber').value == '')) {
										document.getElementById('alert_header').innerHTML = 'Hotel 7teen - Card Details Please!!!';
										return false;
									}
									return true;
								},
								'aoButtons': [
									{
										'sLabel': 'Next',
										'sClass': 'selected',
										'cPosition': 'd',
										'fnSelect': function() {
											
											bank = document.getElementById('bank').value;
											cardSerialNumber = document.getElementById('cardSerialNumber').value;
											cardType = document.getElementById('cardType').value;
											
											Alert.fnCustom({'sTitle': 'Hotel 7teen - Card Details',
															'sMessage': '<img height="13" width="400" src="images/cardimg.gif" /> \
															To Cancel, Click your Browser\'s Refresh Button.<center><table><tr><td align="right" width="100"><b>Card SSN : </b></td><td align="left"><input type="password" name="cardSsn" id="cardSsn" /></td></tr><tr><td align="right"><b>Card Name :</b></td><td align="left"><input name="cardName" id="cardName" type="text" /></td></tr><tr><td align="left"><b>Expiry Date : </b></td><td align="left"><input type="text" name="experyDate" id="experyDate" /> <b>yyyy-mm-dd </b></td></tr></table><p /></center>',
															'sDisplay': 'aaab',
															'fnPreComplete': function() { 
																if((document.getElementById('cardSsn').value == '') || (document.getElementById('cardName').value == '') || (document.getElementById('experyDate').value == '')) {
																	document.getElementById('alert_header').innerHTML = 'Hotel 7teen - Card Details Please!!!';
																	return false;
																}
																return true;
															},
															'aoButtons': 
																[
																	{	//when this button is clicked, we then submit form.
																		'sLabel': 'Next',
																		'sClass': 'selected',
																		'cPosition': 'd',
																		'fnSelect': function() {
																			//document.forms['purchaseReserveWine'].submit();
																			cardSsn = document.getElementById('cardSsn').value;
																			cardName = document.getElementById('cardName').value;
																			experyDate = document.getElementById('experyDate').value;
																			Alert.fnCustom({'sTitle': 'Hotel 7teen - Room Delivery Details',
																							'sMessage': '<img height=\'13\' width=\'400\' src=\'images/cardimg.gif\' /> To Cancel, Click your Browser\'s Refresh Button.<center><table><tr><td align="right"><b>Room Category :</b></td><td align="left"><select name="roomCategory" id="roomCategory"><option value="">Select Room Category</option><option value="presidential">Presidential Suites</option><option value="prestigious">Prestigious Suites</option><option value="Royal">Royal Suites</option><option value="Regular">Regular Suites</option></select></td></tr><tr><td align="right"><b>First Floor :</b></td><td align="left"><select name="floor" id="floor"><option value=\'\'>Select Floor</option><option value=\'first\'>First Floor</option><option value=\'second\'>Second Floor</option></select></td></tr><tr><td align="right"><b>  Room :</b></td><td align="left"><input type="text" name="room" id="room" /> </td></tr></table><p /></center>',
																							'sDisplay': 'aaab',
																							'fnPreComplete': function() { 
																								if((document.getElementById('roomCategory').value == '') || (document.getElementById('floor').value == '') || (document.getElementById('room').value == '')) {
																									document.getElementById('alert_header').innerHTML = 'Hotel 7teen - Room Delivery Details Please!!!';
																									return false;
																								}
																								return true;
																							},
																							'aoButtons': 
																								[
																									{	//when this button is clicked, we then submit form.
																										'sLabel': 'Submit',
																										'sClass': 'selected',
																										'cPosition': 'd',
																										'fnSelect': function() {
																											//document.forms['purchaseReserveWine'].submit();
																											roomCategory = document.getElementById('roomCategory').value;
																											floor = document.getElementById('floor').value;
																											room = document.getElementById('room').value;
																											
																											//
																											var parameter = "wines=" + selectedItems + "&cardSsn=" + cardSsn + "&cardType=" + cardType + "&cardName=" + cardName + "&cardSerialNumber=" + cardSerialNumber + "&experyDate=" + experyDate + "&bank=" + bank + "&roomCategory=" + roomCategory + "&floor=" + floor + "&room=" + room + "&totalPrice=" + totalPrice;
																											var xmlhttp;
																											
																											if(window.XMLHttpRequest)
																											{
																												
																												//code for internet explorer 7 and above, Firefox, safari, opera, and Chrome
																												xmlhttp =new XMLHttpRequest();
																											}else
																											{
																												//code for intenet explorer 6 and bellow
																												xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
																											}
																											xmlhttp.onreadystatechange = function()
																											{
																												
																												if((xmlhttp.readyState == 4) && (xmlhttp.status == 200))
																												{
																													
																													var response = xmlhttp.responseText;
																													if(response == 0){
																														Alert.fnAlert( "SORRY!!! Unable to complete transaction due to internal server error.<br /><b>Try Again!!!</b>" );
																													}else if(response == 1){
																														Alert.fnAlert( "Transaction Completed Successfully; Your Package will soon be brought to your room.<br /><b>Thank You!!!</b>" );
																													}else if(response == 2){
																														Alert.fnAlert( "SORRY!!! Unable to complete transaction due to Insufficient Funds/Balance in your account.<br /><b>Thank You!!!</b>" );
																													}else if(response == 3){
																														Alert.fnAlert( "Invalid Account Details.<br /><b>Try Again!!!</b>" );
																													}
																													
																													//Alert.fnAlert( xmlhttp.responseText  );
																												}
																											}
																											xmlhttp.open("GET", "transactWinePurchase.php?"+parameter, true);
																											xmlhttp.send();
																											
																											
																										}
																									}
																									
																									
																								]});
																			
																		}
																	}
																	
																	
																]});
										}
									},
									{
										
										'sLabel': 'Cancel',
										'sClass': 'selected',
										'cPosition': 'c',
										
									}
									
								]
							});
						}else{
							//document.getElementById('alert_header').innerHTML = 'Hotel 7teen';
							Alert.fnAlert( "Purchase/Buy a wine by selecting the number of bottles next to the picture you want. <br /><b>Thank You!!!</b>" );
						}
					
				}
	
				fnCallbackCancel = function () {
					//document.getElementById('alert_header').innerHTML = 'Hotel 7teen';
					Alert.fnAlert( "The cancel button was selected." );
				}
			}
		</script>
	</head>
	<body style="background-color: #000;background-image: url(images/bg-img.png;);background-repeat: repeat-x;">
		<div class="div1" id="prices">
		</div>
		<form name="purchaseReserveWine" id="purchaseReserveWine" method="POST" action="purchaseReserveWine.php">
			<table width='100%'>
				<tr>
					<td align='center' width='20%'>
					
					</td>
				</tr>
				<tr>
				
					<td align='center' width='60%'>
						
						<table style ="border-style: double; border-color: #FFCC00; border-width: 4;">
							<tr>
								<td rowspan="3" width="100px" style ="border-style: double; border-color: #330066; border-width: 4;">
									<img src="images/logo-img.jpg" alt="LOGO IMAGE" />
								</td>
							</tr>
							<tr>
								<td align="right">
									<img src="images/hotline-img.jpg" alt="LOGO IMAGE" />
								</td>
							</tr>
							
							<tr>
								<td>
									<table >
									 <tbody><tr class="navtxt">
											<td width='60'><a href="index.php">Home</a></td>
											<td width='70' align="center"><a href="about-us.php">About us</a></td>
											<td width='80' align="center"><a href="services.php">Services</a></td>
											<td width='80' align="center"><a href="gallery.php">Gallery</a></td>
											<td width='90' align="center"><a href="reservation.php">Reservation</a></td>
								
											<td width='90' align="center"><a href="contact-us.php">Contact us</a></td>
										  </tr>
										</tbody></table>
								</td>
							</tr>
							<tr>
								<td align="right" colspan="2">
									<img width ='100%' src="images/seperator.png" alt="" />
								</td>
							</tr>
							
							<tr>
							
								<td>
								
								</td>
							</tr>
					 
						</table>
						
					</td>
				</tr>
				<tr>
					<td align="center">
						<table border='1' width='80%' style ="border-style: double; border-color: #FFCC00; border-width: 4;" bgcolor="#CCCCCC" >
							<tr>
								
								<td align ='center' colspan="7" width="200px" height='50px' bgcolor="#999999">
									<font color="blue" name="Arial" size="8"><b>Get Your Drinks Here!!!</b></font>
								</td>
								
							</tr>
							<?php
								
								require_once 'connection.php';
								$sql = "SELECT * FROM tblWineCategory";
								$catResult = mysql_query($sql,$db) or die(mysql_error($db));
								$priceList = "";
								$nameList = "";
								$tableRow = "";
								
								while($catRow = mysql_fetch_assoc($catResult)){
									$cat = $catRow['wineID'];
									$sql = "SELECT wineCategory, wineName, winePrice, winePicture FROM tblWines WHERE wineCategory = ".$cat;
									$result = mysql_query($sql, $db) or die(mysql_error($db));
									
									$tableRow = "<tr><td align ='left' width='200px' rowspan ='". ceil(mysql_num_rows($result)/3) ."' >
											<font color='#000000' name='Arial' size='5'><b>".$catRow['wineCategory']."</b></font>
											</td>";
								
									$newTd = 1;
									
									while($row = mysql_fetch_assoc($result)){
										if($newTd <= 3){
											$tableRow = $tableRow . "<td align ='left' width='100px' style='border-right:0px;'>";
											if(!empty($row['winePicture'])){
												$tableRow = $tableRow . "<img width='100px' height='150px' src='images/".$row['winePicture']."' alt='".$row['winenName']."' />
													";
												
											}
											$tableRow = $tableRow . "</td>";
											$tableRow = $tableRow . "<td align ='left'  style='border-left:0px;' >
														<font color='blue' name='Arial' size='4'>".$row['wineName']."</font><br />
														<font color='red' name='Arial' size='3'><strike>N</strike>".$row['winePrice']."</font><br />
														<select name ='".str_replace(" ","0",$row['wineName'])."Option' id='".str_replace(" ","0",$row['wineName'])."Option' ><option value=''>Select Number</option>
														<option value='1'>1</option><option value='2'>2</option>
														<option value='3'>3</option><option value='4'>4</option>
														<option value='5'>5</option><option value='6'>6</option>
														<option value='7'>7</option><option value='8'>8</option>
														<option value='9'>9</option><option value='10'>10</option>
														</select>
														<input type='hidden' name ='".str_replace(" ","0",$row['wineName'])."' id ='".str_replace(" ","0",$row['wineName'])."' value='".str_replace(" ","",$row['winePrice'])."' />
													</td>
											";
											$nameList = $nameList . str_replace(" ","0",$row['wineName']) . ",";
											$priceList = $priceList . str_replace(" ","",$row['winePrice']).",";
											$newTd += 1;
										}else{
											$newTd = 1;
											$tableRow = $tableRow . "</tr><tr><td align ='left' width='100px' style='border-right:0px;'>";
											if(!empty($row['winePicture'])){
												$tableRow = $tableRow . "<img width='100px' height='150px' src='images/".$row['winePicture']."' alt='".$row['winenName']."' />
													";
												
											}
											$tableRow = $tableRow . "</td>";
											$tableRow = $tableRow . "<td align ='left'  style='border-left:0px;'>
														<font color='blue' name='Arial' size='4'>".$row['wineName']."</font><br />
														<font color='red' name='Arial' size='3'><strike>N</strike>".$row['winePrice']."</font><br />
														<select name ='".str_replace(" ","0",$row['wineName'])."Option' id='".str_replace(" ","0",$row['wineName'])."Option' ><option value=''>Select Number</option>
														<option value='1'>1</option><option value='2'>2</option>
														<option value='3'>3</option><option value='4'>4</option>
														<option value='5'>5</option><option value='6'>6</option>
														<option value='7'>7</option><option value='8'>8</option>
														<option value='9'>9</option><option value='10'>10</option>
														</select>
														<input type='hidden' name ='".str_replace(" ","0",$row['wineName'])."' id ='".str_replace(" ","0",$row['wineName'])."' value='".str_replace(" ","",$row['winePrice'])."' />
													</td>
											";
											$nameList = $nameList . str_replace(" ","0",$row['wineName']) . ",";
											$priceList = $priceList . str_replace(" ","",$row['winePrice']).",";
										}
									}
									$tableRow = $tableRow . "</tr>";
									print($tableRow);
									
									
								}
								print("<input type='hidden' name='nameList' id='nameList' value='".$nameList."' />");
								print("<input type='hidden' name='priceList' id='priceList' value='".$priceList."' />");
							
							?>
							
							
							
							<tr height='25px'>
								<td>
							
								</td>
								<td>
							
								</td>
							
							</tr>	
							
							
							<tr>
								<td>
							
								</td>
								<td>
							
								</td>
								
								<td align ='right' >
									<font color="#000000" name="Arial" size="3"><b></b></font>
								</td>
								<td align ='left' colspan='2' id="alert_example">
									<img id='demo' onclick="Alert.fnConfirm( {'You\'ll Required To Provide Your Credit/Master - Card Details. <br />Do You Wish To Continue? <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />',fnCallbackOkay, fnCallbackCancel} );" style ="cursor:hand;padding: 3px;border: 1px solid;" src='images/submit.png' alt='Submit' />
								</td>
								
							</tr>	
						</table>
					
					</td>
				</tr>
				<tr>
					<td align='center' width='20%'>
					
					</td>
				</tr>
				
				<tr>
						<td class="footer-txt" align="center" height="50"><font color="#FFCC00" name="Arial" size="3"><b>Copyright (c) 2012 Hotel Seveteen Limited. All rights reserved.<br>
						  No. 6 Tafawa Balewa/Lafiya Road Kaduna. <strong>Tel.:</strong> 234 (0) 62-835 310, (0) 62 835 311, 08033110870<br>
					
						<strong>Web Address:</strong> www.hotel7teen.com, info@hotel7teen.com</b></font></td>
			  </tr>
			
			</table>
			
		</form>
		
		
		<script type="text/javascript">
			//The following script is for the group 2 navigation buttons.
			function switchAutoAdvance() {
				imageSlider.switchAuto();
				switchPlayPauseClass();
			}
			function switchPlayPauseClass() {
				var auto = document.getElementById('auto');
				var isAutoPlay = imageSlider.getAuto();
				auto.className = isAutoPlay ? "group2-Pause" : "group2-Play";
				auto.title = isAutoPlay ? "Pause" : "Play";
			}
			switchPlayPauseClass();
		</script>
		
	</body>

</html>
