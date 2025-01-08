												Alert.fnCustom({'sTitle': 'Hotel 7teen - Room Details',
																'sMessage': '<img height=\'13\' width=\'400\' src=\'images/cardimg.gif\' /> To Cancel, Click your Browser\'s Refresh Button.<center><table><tr><td align="right"><b>Room Category :</b></td><td align="left"><select name="roomCategory" id="roomCategory"><option value="">Select Room Category</option><option value="presidential">Presidential Suites</option><option value="prestigious">Prestigious Suites</option><option value="Royal">Royal Suites</option><option value="Regular">Regular Suites</option></select></td></tr><tr><td align="right"><b>First Floor :</b></td><td align="left"><select name="floor" id="floor"><option value=\'\'>Select Floor</option><option value=\'first\'>First Floor</option><option value=\'second\'>Second Floor</option></select></td></tr><tr><td align="right"><b>  Room :</b></td><td align="left"><input type="text" name="room" id="room" /> </td></tr></table><p /></center>',
																'sDisplay': 'aaab',
																'fnPreComplete': function() { 
																	if((document.getElementById('roomCategory').value == '') || (document.getElementById('floor').value == '') || (document.getElementById('room').value == '')) {
																		document.getElementById('alert_header').innerHTML = 'Hotel 7teen - Room Details Please!!!';
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
																				var parameter = "wines=" + selectedItems + "&cardSerialNumber=" + cardSerialNumber + "&experyDate=" + experyDate + "&bank=" + bank + "&roomCategory=" + roomCategory + "&floor=" + floor + "&room=" + room + "&totalPrice=" + totalPrice;
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
																						/*if(response == "0"){
																							Alert.fnAlert( "SORRY!!! Unable to complete transaction due to internal server error.<br /><b>Try Again!!!</b>" );
																						}else if(response == "1"){
																							Alert.fnAlert( "Transaction Completed Successfully; Your Package will soon be brought to your room.<br /><b>Thank You!!!</b>" );
																						}else if(response == "2"){
																							Alert.fnAlert( "SORRY!!! Unable to complete transaction due to Insufficient Funds/Balance in your account.<br /><b>Thank You!!!</b>" );
																						}else if(response == "3"){
																							Alert.fnAlert( "Invalid Account Details.<br /><b>Try Again!!!</b>" );
																						}
																						*/
																						Alert.fnAlert( xmlhttp.responseText  );
																					}
																				}
																				xmlhttp.open("GET", "transactWinePurchase.php?"+parameter, true);
																				xmlhttp.send();
																				
																				
																			}
																		}
																		
																		
																	]});