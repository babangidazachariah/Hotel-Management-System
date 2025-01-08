<?php
SESSION_START();
	//if(isset()){
	require_once 'createStuffs.php';
	//}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hotel 7teen Home</title>
    <link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
	 
	
</head>
 
<body style="background-color: #000;background-image: url(images/bg-img.png;);background-repeat: repeat-x;">
    <div class="div1">
    </div>
	<table width='100%'>
		<tr>
			<td align='center' width='20%'>
			
			</td>
		</tr>
		<tr>
			

				<td align="center">
				<table style ="border-style: double; border-color: #FFCC00; border-width: 4;">
					<tr>
						
						<td width="200px">
							<a href='lodgingaccomodation.php' ><img width="200px" src="images/accomodation.jpg" alt="LODGING ACCOMODATIONS" /></a>
						</td>
					</tr>
					<tr>
						<!--
						<td width="200px">
							<a href='conferenceHalls.php' ><img width="200px" src="images/conference.jpg" alt="CONFERENCE HALLS" /></a>
						</td>

					</tr>
					<tr>
						<td width="200px">
							<a href='laundryServices.php' ><img width="200px" src="images/laundry.jpg" alt="LAUNDRY SERVICES" /></a>
						</td>

					</tr>
					<tr>
						-->
						<td width="200px">
							<a href='restaurant.php' ><img width="200px" height ='100px' src="images/caption1.jpg" alt="RESTAURANT: FOOD" /></a>
						</td>

					</tr>
					<tr>
						<td width="200px">
							<a href='purchaseReserveWine.php' ><img width="200px" height ='100px' src="images/caption2.jpg" alt="BAR SERVICES" /></a>
						</td>

					</tr>
					<tr>
						<td width="200px">
							<img width="200px" src="images/social-imgs.jpg" alt="SOCIAL MEDIA" />
						</td>

					</tr>
					
				</table>
			</td>
		
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
									<td width='70' align="center"><a href="aboutUs.php">About us</a></td>
									<td width='80' align="center"><a href="services.php">Services</a></td>
									<td width='80' align="center"><a href="gallery.php">Gallery</a></td>
									<td width='90' align="center"><a href="lodgingAccomodation.php">Reservation</a></td>
						
									<td width='90' align="center"><a href="contactUs.php">Contact us</a></td>
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
						<td colspan='2' class="footer-txt" align="center" height="50"><font color="#FFCC00" name="Arial" size="3"><b>Copyright (c) 2012 Hotel Seveteen Limited. All rights reserved.<br>
						  No. 6 Tafawa Balewa/Lafiya Road Kaduna. <strong>Tel.:</strong> 234 (0) 62-835 310, (0) 62 835 311, 08033110870<br>
					
						<strong>Web Address:</strong> www.hotel7teen.com, info@hotel7teen.com</b></font></td>
					</tr>
					
					<tr>
					
						<td>
						
						</td>
					</tr>
			 
				</table>
				
			</td>
		</tr>
		<tr>
			
			
			</td>
		</tr>
		<tr>
			<td align='center' width='20%'>
			
			</td>
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
</body>
</html>

