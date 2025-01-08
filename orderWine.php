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
						//get and compute the price of the selected items.cockfighterprice
						var price = 0;
						var listOfWines;
						try{
							var wines = document.getElementById("listOfWines").value;
							//alert(wines);
							var listOfWines = wines.split(",");
							for(var i = 0; i < listOfWines.length; i++)
							{
								
								try
								{
									var wine = document.getElementById(listOfWines[i]).value;
									if (wine != ""){
										//alert(listOfWines[i]);
										var winePrice = document.getElementById(listOfWines[i]+ "Price").value;
										//alert(winePrice);
										price += (wine * winePrice) ;
									}
								}catch (e){}
								
							}
						} catch(e) {} 
						
						Alert.fnConfirm("Please, You\'ll Need To Provide Your Master/Credit Card Details!!!<br /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' /><br />The Cost Of Your Reservation is <strike>N</strike>"+ price,
							fnCallbackOkay, fnCallbackCancel );
					}
				} );
				
				
				fnCallbackOkay = function () {
					//Alert.fnAlert( "The okay button was selected." );
					Alert.fnCustom({
								//var enableSubmit = false;
								'sTitle': 'Hotel 7teen - Card Details',
								'sMessage': '<img height=\'30\' width=\'400\' src=\'images/cardimg.gif\' /> \
									<center> \
										<table><tr><td align="right"><b>Card Issuer :</b></td><td align="left"><select name="bank" id="bank"><option value="">Select Bank</option><option value="Access">Access</option><option value="Eco">Eco Bank</option><option value="FirstCity">FCMB</option><option value="FirstBank">First Bank</option><option value="Keystone">Keystone</option><option value="Sterling">Sterling</option><option value="UBA">UBA</option><option value="Zenith">Zenith</option></td></tr><tr><td align="right"><b>Card Serial Number :</b></td><td align="left"><input type="password" name="ip1" id="ip1" /></select></td></tr> \
										<tr><td align="right"><b>  Expiry Date :</b></td><td align="left"><input type="text" name="ip2" id="ip2" />dd-mm-yyyy </td></tr></table><p /> \
									</center>',
								'sDisplay': 'abcd',
								'fnPreComplete': function() {
									if((document.getElementById('ip1').value == '') || (document.getElementById('ip2').value == '')) {
										document.getElementById('alert_header').innerHTML = 'Hotel 7teen - Card Details Please!!!';
										return false;
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
											Alert.fnCustom({'sTitle': 'Hotel 7teen','sMessage': 'Thank You For Transacting With Us. <br />We Hope To Improve Our Services In Fulfillment Of Our Commitment: YOUR COMFORT, OUR PRIORITY!!!! <p />Click "Okay" Button To Complete Transaction.','sDisplay': 'aaab','aoButtons': 
											[
												{	//when tis button is clicked, we then submit form.
													'sLabel': 'Okay',
													'sClass': 'selected',
													'cPosition': 'd',
													'fnSelect': function() {
														document.forms['purchasewine'].submit();
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
    <div class="div1" id="prices">
    </div>
	<form name="orderWine" id="orderWine" method="post" action="orderWine.php">
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
					<table border='1' width='80%' style ="border-style: double; border-color: #FFCC00; border-width: 4;" bgcolor="#CCCCCC" >
						<tr>
							
							<td align ='center' colspan="8" width="120px" bgcolor="#999999">
								<font color="blue" name="Arial" size="8"><b>Get Your Drinks Here!!!</b></font>
							</td>
							
						</tr>
						
						<?php
							
							$listOfWines ='';
							require_once 'connection.php';
							
							$sql = "SELECT DISTINCT wineCategory FROM tblWineCategory";
							
							$result = mysql_query($sql, $db) or die(mysql_error($db));
							
							while($row = mysql_fetch_assoc($result))
							{
								print("<tr><td colspan='8'><font color='yellow' name='Arial' size='6'><b>".$row['wineCategory']."</b></font></td></tr>");
								
								$query = "SELECT wineName, winePrice, winePicture FROM tblWines WHERE wineCategory = '".$row['wineCategory']."'";
								
								$newResult = mysql_query($query, $db) or die(mysql_error($db));
								
								$num = 0;
								print("<tr>");
								while($newRow = mysql_fetch_assoc($newResult))
								{
									
									if($num < 4){
										
										print("<td align ='right'><img width='100px' height='150px' src ='Images/".$newRow['winePicture']."' alt ='".$newRow['wineName']."' /></td>
												<td align ='left'><font color='blue' name='Arial' size='4'><b>".$newRow['wineName']."</b></font><br />
												<font color='red' name='Arial' size='4'><b><strike>N</strike>".$newRow['winePrice']."</b></font><br /><select name ='".$newRow['wineName']."' id='".$newRow['wineName']."' ><option value=''>Select Quantity</option>
												<option value='1'>1</option><option value='2'>2</option>
												<option value='3'>3</option><option value='4'>4</option>
												<option value='5'>5</option><option value='6'>6</option></select>
												<input type='hidden' id ='".$newRow['wineName']."Price' value='".$newRow['winePrice']."' /></td>");
												
										$listOfWines = $listOfWines .$newRow['wineName'].",";
												
									}else{
										$num = 0;
										print("</tr><tr>");
									}
									$num += 1;
								}
								print("</tr>");
							}
							
							print("<input type ='hidden' name= 'listOfWines' id ='listOfWines' value ='".$listOfWines."' />");
							
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
							<td align ='right' colspan='2' id="alert_example">
								<button id='demo' onclick="Alert.fnConfirm( {'You\'ll Required To Provide Your Credit/Master - Card Details. <br />Do You Wish To Continue? <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />',fnCallbackOkay, fnCallbackCancel} );" ><img src='images/order.png' alt='Order' /></button>
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

