<?php  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
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
	<script language='Javascript'>
	
		function CheckPurchases(){
		
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
					
					/*alert(xmlhttp.responseText);
					var purchasedItems = xmlhttp.responseText; 
					var row = purchasedItems.split(";");
					for(var i = 0; i < (row.length - 1); i++){
					
						var itemDetails = row[i];
						var eachDetail = itemDetails.split(",");
						for(var j = 0; i < eachDetail.length; j++){
						
							
						}
					}
					*/
					
					if(xmlhttp.responseText == 1){
					
						document.getElementById("purchaseNotification").innerHTML = "<td align='center' ><marquee direction='left' scrollamount='2' loop='true' width ='300' bgcolor='green'  onmouseover='javascript:this.stop(); 'onmouseout='javascript:this.start();' style='cursor:hand;'> <font size='15' color ='white' > <blink>New Purchases/Order Available</blink></font></marquee>";
					
					}else{
						document.getElementById("purchaseNotification").innerHTML = "<td align='center'><marquee direction='left' scrollamount='2' loop='true' width ='300' bgcolor='green'> <font size='15' color ='white' > <blink>No New Order </blink></font></marquee>";
					}
				}
			}
			//alert(routine);
			xmlhttp.open("GET", "getNewPurchasedItems.php",true);
			xmlhttp.send();
		}
	</script>
<script type="text/javascript">
			
			window.onload = function() { 
				
				/*
				document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', 'Images/wine.jpg',
								'" title="', escape("Images/wine.jpg"), '"/>'].join('');
			
				 * You'll probably want to replace this with $('#demo').click( fn ); or whatever the
				 * JS library you are using uses. If none then this will do nicly!
				 */
				jsCore.addListener( {
					"mElement":  "demo",
					"sType":     "click",
					'sTitle': 'Hotel 7teen',
					"fnCallback": function() {
						
						Alert.fnConfirm("<img height=\'80\' width=\'400\' src=\'images/wines_top_photo.jpg\' /><br /><font color=\'black\' name=\'Arial\' size=\'4\'><b>Please, You\'ll Need To Provide The Category Name!!!</b></font>",
							fnCallbackOkay, fnCallbackCancel );
					}
				} );
				
				fnCallbackOkay = function () {
					//Alert.fnAlert( "The okay button was selected." );
					Alert.fnCustom({
								//var enableSubmit = false;
								'sTitle': 'Hotel 7teen - New Wine Category!!!',
								'sMessage': '<img height=\'80\' width=\'400\' src=\'images/wines_top_photo.jpg\' /> \
									<center> \
										<table><tr><td align="right"><b>Category Name :</b></td><td align="left"><input type="text" name="category" id="category" /></select></td></tr> \
										</table><p /> \
									</center>',
								'sDisplay': 'abcd',
								'fnPreComplete': function() {
									if((document.getElementById('category').value == '') ) {
										document.getElementById('alert_header').innerHTML = 'Hotel 7teen - New Category!!!';
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
											
											var categoryName = document.getElementById('category').value;
											
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
													document.forms['addNewWine'].submit();
												}
											}
											//alert(routine);
											xmlhttp.open("GET", "addNewWineCategory.php?categoryName="+categoryName,true);
											xmlhttp.send();
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
					Alert.fnCustom({'sTitle': 'Hotel 7teen','sMessage': 'Thank You For Using This System.','sDisplay': 'aaab','aoButtons': 
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
 
<body onload ="CheckPurchases()"style="background-color: #000;background-image: url(images/bg-img.png;);background-repeat: repeat-x;">
    <div class="div1" id="prices">
    </div>
	<form name="notifyPurchases" id="notifyPurchases" method="post" action="notifyPurchases.php" enctype="multipart/form-data">
		<table width='100%' >
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
				<td align="justify" >
					<table align='center' border='2' bgcolor="#CCCCCC"> <!-- body table-->
						<tr>
							<td colspan='3' align='center'>
								<font color="yellow" name="Arial" size="8"><b>Purchase Notification</b></font>
								
							</td>
							

						</tr>
						
						<tr id='purchaseNotification'>
							
						</tr>
						
						
					</table>
				</td>
			
			
				
			</tr>
		</table>
					
		
	<table>
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
	</form>
	
</body>
</html>

