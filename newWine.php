<?php
SESSION_START();
	if(isset($_POST['save'])){
			//print("entered successfully");
			$isError = "False";
			$name ='';
			$category = '';
			$price ='';
			
			if(!empty($_POST['wineCategory'])){
				$category = $_POST['wineCategory'];
			}else{
				$isError = "True";
			}
			
			if(!empty($_POST['wineName'])){
				$name = $_POST['wineName'];
			}else{
				$isError = "True";
			}
			
			if(!empty($_POST['winePrice'])){
				$price = $_POST['winePrice'];
			}else{
				$isError = "True";
			}
			
			if(!empty($_FILES['uploadfile'])){
				require_once'connection.php';
				
				//change this path to match your images directory
				$dir ="C:/wamp/www/Hotel/Images";
				//make sure the uploaded file transfer was successful
				if ($_FILES['uploadfile']['error'] != UPLOAD_ERR_OK) {
				
					switch ($_FILES['uploadfile']['error']) {
						case UPLOAD_ERR_INI_SIZE:
							$passportError = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
							die();
							break;
						case UPLOAD_ERR_FORM_SIZE:
							$passportError = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
							die();
							break;
						
						case UPLOAD_ERR_PARTIAL:
							$passportError = 'The uploaded file was only partially uploaded.';
							die();
							
							break;
						case UPLOAD_ERR_NO_FILE:
							$passportError = 'No file was uploaded.';
							die();
							break;
						case UPLOAD_ERR_NO_TMP_DIR:
							$passportError ='The server is missing a temporary folder.';
							die();
							break;
						case UPLOAD_ERR_CANT_WRITE:
							$passportError = 'The server failed to write the uploaded file to disk.';
							die();
							break;
						case UPLOAD_ERR_EXTENSION:
							$passportError = 'File upload stopped by extension.';
							die();
							break;
					}
				}
				//get info about the image being uploaded
				//$password = $_POST['password'];
				//$userName = $_POST['username'];
				$imageDate = date('Y-m-d');
				list($width, $height, $type, $attr) = getimagesize($_FILES['uploadfile']['tmp_name']);
				// make sure the uploaded file is really a supported image
				switch ($type) {
					case IMAGETYPE_GIF:
						try{
							$image = imagecreatefromgif($_FILES['uploadfile']['tmp_name']);
							$ext = '.gif';
						}catch(Exception $e) {
							//echo $e->getMessage();
							//echo 'Sorry, could not upload file';
							$passportError = 'The file you uploaded was not a supported filetype.';
							die();
						}
						break;
					case IMAGETYPE_JPEG:
						try{
							$image = imagecreatefromjpeg($_FILES['uploadfile']['tmp_name']);
							//print($image);
							$ext = '.jpg';
						}catch(Exception $e) {
							//echo $e->getMessage();
							//echo 'Sorry, could not upload file';
							$passportError = 'The file you uploaded was not a supported filetype.';
							die();
						}
						break;
					case IMAGETYPE_PNG:
						try{
							$image = imagecreatefrompng($_FILES['uploadfile']['tmp_name']);
							$ext = '.png';
						}catch(Exception $e) {
							//echo $e->getMessage();
							//echo 'Sorry, could not upload file';
							$passportError = 'The file you uploaded was not a supported filetype.';
							die();
						}
						break;
					default:
						$passportError = 'The file you uploaded was not a supported filetype.';
						die();
				}
				//insert information into image table
				$query = "INSERT INTO tblWines (wineCategory, wineName, winePrice) VALUES ('" . $category. "','" . $name . "','" . $price ."')";
				$result = mysql_query($query, $db) or die (mysql_error($db));
				//print("inserted successfully");
				//retrieve the image_id that MySQL generated automatically when we inserted
				//the new record
				$last_id = mysql_insert_id();
				//because the id is unique, we can use it as the image name as well to make
				//sure we don't overwrite another image that already exists
				$imagename = $last_id . $ext;
				// update the image table now that the final filename is known.
				$query = "UPDATE tblWines SET winePicture = '" . $imagename . "'	WHERE wineID = " . $last_id;
				$result = mysql_query($query, $db) or die (mysql_error($db));
				//print("updated successfully");
				//save the image to its final destination
				switch ($type) {
					case IMAGETYPE_GIF:
						imagegif($image, $dir . '/' . $imagename);
						break;
					case IMAGETYPE_JPEG:
						imagejpeg($image, $dir . '/' . $imagename, 100);
						break;
					case IMAGETYPE_PNG:
						imagepng($image, $dir . '/' . $imagename);
						break;
				}
				
				imagedestroy($image);
				$passportError = "Added Successfully!!!";
				//header("location:newWine.php");
			}else{
				$passportError ="Select/Browse Passport First!!!";
				//header("location:uploadPassport.php");
			}
			
		}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Hotel 7teen Add New Wine</title>
    <link href="themes/4/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="themes/4/js-image-slider.js" type="text/javascript"></script>
    <link href="generic.css" rel="stylesheet" type="text/css" />
	 
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		

	<!--!<link rel="stylesheet" type="text/css" href="media/css/demos.css" />-->
	<link rel="stylesheet" type="text/css" href="media/css/alert.css" />

	<script type="text/javascript" src="media/js/js-core.js"></script>
	<script type="text/javascript" src="media/js/alert.js"></script>
	<script>
		<!--
			function NewCategory(){
				if(document.getElementById("theNewCategory") == ""){
					document.getElementById("theNewCategory") ="<table><tr><td colspan='2'><font color='yellow' name='Arial' size='8'><b>Add New Category</b></font></td></tr><tr><td><font color='red' name='Arial' size='4'>Category Name :</font></td><td><input id = 'newCategory' name ='newCategry' type ='text' /></td></tr><tr><td></td><td><input type ='submit' onclick ='JavaScript:SubmitNew()' /></td></tr></table>";
					
				}else{
					document.getElementById("theNewCategory") = "";
				}
			
			}
			
			function SetImg(){
				document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', 'Images/wine.jpg',
								'" title="', escape("Images/wine.jpg"), '"/>'].join('');
			
			}
			
			
		-->
	</script>
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
 <!--onload='SetImg()'-->
<body  style="background-color: #000;background-image: url(images/bg-img.png;);background-repeat: repeat-x;">
    <div class="div1">
    </div>
	<form action="newWine.php" method="POST" enctype="multipart/form-data">
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
				<td align="justify" id = 'theNewCategory'>
					<table align='center' border='2'> <!-- body table-->
						<tr>
							<td colspan='3' align='center'>
								<font color="yellow" name="Arial" size="8"><b>Add New Wine</b></font>
								
							</td>
							

						</tr>
						
						<tr>
							<td colspan ="3" bgcolor="green" > <!-- body table First Column-->
								<font color="red" name="Arial" size="8"><?php print($passportError); ?><!-- display success or error message--></font>
							</td>
						</tr>
										
						<tr>
							<td colspan ="3" bgcolor="green" align="right" ><!-- body table First Column-->
								<!-- an empty row here!!!-->
							</td>
						</tr>
						
						
						
						<tr>
							<td id="passport" border="2" colspan="3"  align="center"><br /><p />
								
							</td>
						</tr>
						<!--<tr>
			
							<td colspan="3" height="20px" align="center">
								<font color="red"><b>Must be 2MB or less</b></font>
							</td>
						</tr>
						-->
						<tr>
							<td align ='right'>
								<font color="red" name="Arial" size="4"><b>Wine's Picture :</b></font>
							</td>
							<td align="center" colspan="3" >
								<input type="file" id="uploadfile" name="uploadfile" />
								<!--<button onclick="abortRead();">Cancel read</button>-->
								<div id="progress_bar"><font class="percent" color="red" name="Arial" size="4"><b>0%</b></font></div>

								<script>
								  var reader;
								  var progress = document.querySelector('.percent');

								  function abortRead() {
									reader.abort();
								  }

								  function errorHandler(evt) {
									switch(evt.target.error.code) {
									  case evt.target.error.NOT_FOUND_ERR:
										alert('File Not Found!');
										break;
									  case evt.target.error.NOT_READABLE_ERR:
										alert('File is not readable');
										break;
									  case evt.target.error.ABORT_ERR:
										break; // noop
									  default:
										alert('An error occurred reading this file.');
									};
								  }

								  function updateProgress(evt) {
									// evt is an ProgressEvent.
									if (evt.lengthComputable) {
									  var percentLoaded = Math.round((evt.loaded / evt.total) * 100);
									  // Increase the progress bar length.
									  if (percentLoaded < 100) {
										progress.style.width = percentLoaded + '%';
										progress.textContent = percentLoaded + '%';
										
									  }
									}
								  }

								  function handleFileSelect(evt) {
									
									// Reset progress indicator on new file selection.
									progress.style.width = '0%';
									progress.textContent = '0%';

									reader = new FileReader();
									reader.onerror = errorHandler;
									reader.onprogress = updateProgress;
									reader.onabort = function(e) {
									  alert('File read cancelled');
									};
									reader.onloadstart = function(e) {
									  document.getElementById('progress_bar').className = 'loading';
									};
										reader.onload = function(e) {
											  // Ensure that the progress bar displays 100% at the end.
											  progress.style.width = '100%';
											  progress.textContent = '100%';
											  setTimeout("document.getElementById('progress_bar').className='';", 2000);
										};
										// Read in the image file as a binary string.
										reader.readAsBinaryString(evt.target.files[0]);
										// Loop through the FileList and render image files as thumbnails.
										var files = evt.target.files; // FileList object
										for (var i = 0, f; f = files[i]; i++) {
											//alert("Here");
										  // Only process image files.
											 if (!f.type.match('image.*')) {
												continue;
											 }

											var readerImage = new FileReader();

											  // Closure to capture the file information.
											 readerImage.onload = (function(theFile) {
												return function(e) {
												  // Render thumbnail.
												  document.getElementById("passport").innerHTML = ['<img height="150px" width="200px" class="thumb" src="', e.target.result,
													'" title="', escape(theFile.name), '"/>'].join('');
												
												};
											})(f);

											  // Read in the image file as a data URL.
											 readerImage.readAsDataURL(f);
										}
									
								  }

								  document.getElementById('uploadfile').addEventListener('change', handleFileSelect, false);
								</script>
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							
							<td align ='right' width='200px' >
								<font color="red" name="Arial" size="4"><b>Wine Category  :</b></font>
							</td>
							
							<td align ='left' >
								
								<select name ='wineCategory' id='wineCategory' ><option value=''>Select Number</option>
									<?php 
										
											/*
											$sql ="SELECT wineName, winePrice, winePicture  FROM tblWines WHERE wineCategory ='".$row['wineCategory']."'";
										
											$newResult = mysql_query($sql, $db) or print(mysql_error($db));
											while($newRow = mysql_fetch_assoc($newResult))
											{
												print("<option value = '".trim($newRow['wineName'])."' > ".trim($newRow['wineName'])."' </option>");
												print();
											
											}
										
										
										*/
										require_once 'connection.php';
										$sql ="SELECT DISTINCT wineCategory FROM tblWines";
										
										$result = mysql_query($sql, $db) or print(mysql_error($db));
										
										while($row = mysql_fetch_assoc($result))
										{
											print("<option value = '".trim($row['wineCategory'])."' > ".trim($row['wineCategory'])." </option>");
										
										}
									
									?>
								</select>
								<input type='hidden' id ='bonedryredprice' value='5000' />
							</td>
							<td>
							
							</td>
						</tr>
						<tr>
							<td  align="right" width='300' ><!-- body table First Column-->
									<font color="red" name="Arial" size="4" ><b>Name : </b></font>
								</td>
								<td align="left">
								<input type='text'  name ='wineName' id ='wineName' />
									
								</td>
								<td>
									<!-- institution error-->
								</td>
							
						</tr>
						<tr>
							<td  align="right" width='300' ><!-- body table First Column-->
									<font color="red" name="Arial" size="4" ><b>Price (<strike>N</strike>) : </b></font>
								</td>
								<td align="left">
								<input type='text'  name ='winePrice' id ='winePrice' />
									
								</td>
								<td>
									<!-- institution error-->
								</td>
							
						</tr>
						<tr>
							<td  align="right" width='300' ><!-- body table First Column-->
									<font color="black" name="Arial" size="4" ><b></b></font>
								</td>
								<td>
								<button type='submit'  width='6000' id="cancel" name = 'cancel' height='5000' > <img src="Images/cancel.png" alt ="CANCEL" /></button>
								<button type='submit'  width='6000' id="save" name = 'save' height='5000' > <img src="Images/save.png" alt ="SAVE" /></button>
									
								</td>
								<td>
									<!-- institution error-->
								</td>
							
						</tr>
						<tr>
							<td colspan='3' align='center' id="alert_example" >
								<!--<font color="yellow" name="Arial" size="5"  id='demo' onclick="Alert.fnConfirm( {'You\'ll Required To Provide Your Credit/Master - Card Details. <br />Do You Wish To Continue? <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />',fnCallbackOkay, fnCallbackCancel} );" style ="cursor:hand;"><b>Add New Category</b></font>
								-->
								<button id='demo' onclick="Alert.fnConfirm( {'You\'ll Required To Provide Your Credit/Master - Card Details. <br />Do You Wish To Continue? <p /><img height=\'50\' width=\'400\' src=\'images/cardimg.gif\' />',fnCallbackOkay, fnCallbackCancel} );" >Click</button>
							</td>
							

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

