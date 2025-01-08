<?php
SESSION_START();
	//if(isset()){
	
	//}
?>
<!DOCTYPE html>
<html>
<head>
   <title>Hotel 7teen Home</title> 
	 <link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
	 
		
<script language="JavaScript">
//<!--
		
	function GetStuffs()
	{
			//alert("HERE!!");
			var floorSelected = document.getElementById("preferredFloor").value;
			var singleDouble = document.getElementById("singleDouble").value;
			//alert(institutionSelect);
			//var requirement =document.getElementById(""+tabl""+);
			if(floorSelected =="")
			{
				document.lodgingAccomodation.rooms.options.length = 0;
				document.lodgingAccomodation.rooms.options[document.lodgingAccomodation.rooms.options.length] = new Option( "Select Room", "");
				document.getElementById(""+errorFloor+"").innerHTML =" No Value Selected";
				return;
			}
			if(singleDouble =="")
			{
				
				document.getElementById(""+errorSingleDouble+"").innerHTML =" No Value Selected";
				return;
			}
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
					
					//alert(xmlhttp.responseText);
					
						var selectOption = xmlhttp.responseText;
						
						var selectOptions = selectOption.split("|");
						var i= 0;
						var valuee ="";
						var txt ="";
						
						document.lodgingAccomodation.rooms.options.length = 0;
						document.lodgingAccomodation.rooms.options[document.lodgingAccomodation.rooms.options.length] = new Option( "Select Room", "");
						
						while(i < (selectOptions.length - 1)){
							valuee = selectOptions[i];

							txt = selectOptions[i];
							i += 1;
							//alert(valuee);
							//alert(txt);
							
							document.lodgingAccomodation.rooms.options[document.lodgingAccomodation.rooms.options.length] = new Option( txt, valuee);
							
						}
					
				}
			}

				//var courseSelect = document.getElementById(""+ subControl+"").value;
				//alert(floorSelected);
				//alert(singleDouble);
				xmlhttp.open("GET", "GetRooms.php?floor=" + floorSelected + "&singleDouble=" + singleDouble, true);
				xmlhttp.send();
				
			
	}
		
//-->
</script>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		

	<!--!<link rel="stylesheet" type="text/css" href="media/css/demos.css" />-->
	<link rel="stylesheet" type="text/css" href="media/css/alert.css" />

	<script type="text/javascript" src="media/js/js-core.js"></script>
	<script type="text/javascript" src="media/js/alert.js"></script>
<script type="text/javascript">
			
			window.onload = function() {
				/*
				 * You'll probably want to replace this with $('#demo').click( fn ); or whatever the
				 * JS library you are using uses. If none then this will do nicly!
				 */
				jsCore.addListener( {
					"mElement":  "demo",
					"sType":     "click",
					'sTitle': 'Hotel 7teen',
					"fnCallback": function() {
						//get and compute the price of the selected items.
						
						Alert.fnConfirm(" Please, You\'ll Be Required To Supply Your Master/Credit Card Details!!! <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />",
							fnCallbackOkay, fnCallbackCancel );
					}
				} );
				
				fnCallbackOkay = function () {
					//Alert.fnAlert( "The okay button was selected." );
					Alert.fnCustom({
								'sTitle': 'Hotel 7teen',
								'sMessage': 'Please Supply Your Credit Card Details!!! <br /><img height=\'30\' width=\'400\' src=\'images/cardimg.gif\' /> \
									<center> \
										<table><tr><td align="right"><b>Card PIN :</b></td><td align="left"><input type="password" name="ip1" id="ip1" /></td></tr> \
										<tr><td align="right"><b>  Password :</b></td><td align="left"><input type="password" name="ip2" id="ip2" /> </td></tr></table><p /> \
									</center>',
								'sDisplay': 'aaab',
								'fnPreComplete': function() {
									if((document.getElementById('ip1').value == '') || (document.getElementById('ip2').value == '')) {
										document.getElementById('alert_header').innerHTML = 'Hotel 7teen';
										return false;
									}else{
										//when the card details are supplied.
										
									
									}
									return true;
								},
								'aoButtons': [
									{
										'sLabel': 'Submit',
										'sClass': 'selected',
										'cPosition': 'd',
										'fnSelect': function() {
											var sName = document.getElementById('ip1').value;
											Alert.fnCustom({'sTitle': 'Hotel 7teen','sMessage': 'Thank You For Transacting With Us. <br />We Hope To Improve Our Services In Fulfillment Of Our Commitment: YOUR COMFORT, OUR PRIORITY!!!!','sDisplay': 'aaab','aoButtons': 
											[
												{
													'sLabel': 'Okay',
													'sClass': 'selected',
													'cPosition': 'd'
												
												}
											]});
										}
									}
									
								]
							} );
				}
	
				fnCallbackCancel = function () {
					Alert.fnCustom({'sTitle': 'Hotel 7teen','sMessage': 'Thank You For Using Our System. <br />We Hope To Improve Our Services In Fulfillment Of Our Commitment: YOUR COMFORT, OUR PRIORITY!!!','sDisplay': 'aaab','aoButtons': 
						[
							{
								'sLabel': 'Okay',
								'sClass': 'selected',
								'cPosition': 'd'
							
							}
						]});
				}
			}

		
		</script>
	

</head>
 
<body style="background-color: #000;background-image: url(images/bg-img.png;);background-repeat: repeat-x;">
    <div class="div1"><input type='hidden' name ='alert' id='alert' />
    </div>
	<form name="lodgingAccomodation" id="lodgingAccomodation" method="post" action="lodgingAccomodation.php">
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
										<td width='60'><a href="http://hotel7teen.com/index.html">Home</a></td>
										<td width='70' align="center"><a href="http://hotel7teen.com/about-us.html">About us</a></td>
										<td width='80' align="center"><a href="http://hotel7teen.com/services.html">Services</a></td>
										<td width='80' align="center"><a href="http://hotel7teen.com/gallery.html">Gallery</a></td>
										<td width='90' align="center"><a href="http://hotel7teen.com/reservation.html">Reservation</a></td>
							
										<td width='90' align="center"><a href="http://hotel7teen.com/contact-us.php">Contact us</a></td>
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
							<td align='center' colspan="2" >
								
								<div id="sliderFrame">
									<div id="slider">
										<img src="images/slider-1.jpg" alt="#htmlcaption1" /> 
										<img src="images/slider-2.jpg" alt="#htmlcaption2" />
										<img src="images/slider-3.jpg" alt="#htmlcaption3" />
										<img src="images/slider-4.jpg" alt="#htmlcaption4" />
										<img src="images/slider-5.jpg" alt="#htmlcaption1" /> 
										<img src="images/slider-6.jpg" alt="#htmlcaption2" />
										<img src="images/slider-7.jpg" alt="#htmlcaption3" />
										<img src="images/slider-8.jpg" alt="#htmlcaption4" />
										<img src="images/slider-9.jpg" alt="#htmlcaption4" />
									</div>
									<!--Custom navigation buttons on both sides-->
									<div class="group1-Wrapper">
										<a onClick="imageSlider.previous()" class="group1-Prev"></a>
										<a onClick="imageSlider.next()" class="group1-Next"></a>
									</div>
									<!--thumbnails-->
									<div id="thumbs">
										<!-- navigation buttons in the thumbnails bar -->
										<a onClick="imageSlider.previous()" class="group2-Prev"></a>
										<a id='auto' onClick="switchAutoAdvance()"></a>
										<a onClick="imageSlider.next()" class="group2-Next" style="margin-right:30px;"></a>
										<!--Each thumb
										<div class="thumb"><img src="images/thumb-1.gif" /></div>
										<div class="thumb"><img src="images/thumb-2.gif" /></div>
										<div class="thumb"><img src="images/thumb-3.gif" /></div>
										<div class="thumb"><img src="images/thumb-4.gif" /></div>
										<div class="thumb"><img src="images/thumb-5.gif" /></div>
										<div class="thumb"><img src="images/thumb-6.gif" /></div>
										<div class="thumb"><img src="images/thumb-7.gif" /></div>
										<div class="thumb"><img src="images/thumb-8.gif" /></div>
										<div class="thumb"><img src="images/thumb-9.gif" /></div>
										-->
									</div>
									<div id="htmlcaption1" style="display: none;">
										<div style="width:190px;height:200px;display:inline-block;background:transparent url(images/caption1.jpg) no-repeat 0 0;border-radius:4px;"></div>
									</div>
									<div id="htmlcaption2" style="display: none;">
										<div style="width:190px;height:100px;display:inline-block;background:transparent url(images/caption2.jpg) no-repeat 0 0;border-radius:4px;"></div>
									</div>
									<div id="htmlcaption3" style="display: none;">
										<div style="width:190px;height:200px;display:inline-block;background:transparent url(images/caption3.jpg) no-repeat 0 0;border-radius:4px;"></div>
									</div>
									<div id="htmlcaption4" style="display: none;">
										<div style="width:190px;height:200px;display:inline-block;background:transparent url(images/caption4.jpg) no-repeat 0 0;border-radius:4px;"></div>
									</div>
								</div>
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
					<table border='1' width='73%' style ="border-style: double; border-color: #FFCC00; border-width: 4;" bgcolor="#CCCCCC" >
						<tr>
							
							<td align ='center' colspan="3" width="120px" bgcolor="#999999">
								<font color="blue" name="Arial" size="6"><b>Make Your Reservation Here!!!</b></font>
							</td>
							
						</tr>
						
						<tr>
							
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Arrival Date :</b></font>
							</td>
							<td align ='left' >
								<input type='text' name="arrivalDate" id="arrivalDate"/><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						<tr>
							
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Number of Nights :</b></font>
							</td>
							<td align ='left' >
								<input type='text' name="numberOfNights" id="numberOfNights"/><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right'>
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						
						<tr>
						<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Number of Adults :</b></font>
							</td>
							<td align ='left' >
								<input type='text' name="adults" id="adults"/><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						
						
						<tr>
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Number of Children :</b></font>
							</td>
							<td align ='left' >
								<input type='text' name="children" id="children"/><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						
						<tr>
							
							<td align ='right' width="120px">
								<font color="#000000" name="Arial" size="3"><b>Nature of Room :</b></font>
							</td>
							<td align ='left' width="120px">
								<input type="radio" name="singleDouble"  id="singleDouble" value="Single"><font color="black" name="Arial" size="3"><b>Single</b></font>
								<input type="radio" name="singleDouble"  id="singleDouble" value="Double"> <font color="black" name="Arial" size="3"><b>Double</b></font><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' width="120px">
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						<tr>
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Room Category :</b></font>
							</td>
							<td align ='left' >
								<Select  name="categoryOfRoom" id="categoryOfRoom"><option value="" >Select Room Type</option>
								<?php
									require_once'connection.php';
									$sql = "SELECT DISTINCT category FROM tblRooms";
	
									$result = mysql_query($sql,$db) or print("Could Not Be Executed 37 tblAccount SELECT  ". mysql_error($db));
									while($row = mysql_fetch_array($result))
									{
										print('<option value="'.$row['category'].'">'.$row['category'].'</option>');
										
									}
								?>
								</Select><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						<tr>
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Preferred Floor :</b></font>
							</td>
							<td align ='left' >
								<Select  name="preferredFloor" id="preferredFloor"  onChange="GetStuffs()"><option value="" >Select Floor</option>
								<?php
									require_once'connection.php';
									$sql = "SELECT DISTINCT floor FROM tblRooms";
	
									$result = mysql_query($sql,$db) or print("Could Not Be Executed 37 tblAccount SELECT  ". mysql_error($db));
									while($row = mysql_fetch_array($result))
									{
										print('<option value="'.$row['floor'].'">'.$row['floor'].' Floor</option>');
										
									}
								?>
								</Select><font color="red" name="Arial" size="3"><b>*</b></font>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						
						<tr>
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b>Preferred Room :</b></font>
							</td>
							<td align ='left' id='room' >
								<select name="rooms" id="rooms" ><option value="">Select Room</option>
								<!--The rooms here!!!!-->
								
								</select>
							</td>
							<td align ='right' >
								<font color="red" name="Arial" size="3"><b><?php     ?></b></font>
							</td>
						</tr>
						
						
						
						
						<tr>
							<td align ='right' >
								<font color="#000000" name="Arial" size="3"><b></b></font>
							</td>
							<td align ='left' colspan='2' id="alert_example">
								<button id='demo' onclick="Alert.fnConfirm( {'You\'ll Required To Provide Your Credit/Master - Card Details. <br />Do You Wish To Continue? <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />',fnCallbackOkay, fnCallbackCancel} );" ><img src='images/submit.png' alt='Submit' /></button>
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

