<?php 

	require_once 'connection.php';
	$cardSerialNumber = $_GET['cardSerialNumber'];
	$experyDate = $_GET['experyDate'];
	$bank = $_GET['bank'];
	$cardType = $_GET['cardType'];
	$cardName = $_GET['cardName'];
	$cardSsn = $_GET['cardSsn'];
	
	$wines = str_replace("0"," ",$_GET['wines']);
	$purchasedWines = explode(",",$wines);
	
	$roomCategory = $_GET['roomCategory'];
	$floor = $_GET['floor'];
	$room = $_GET['room'];
	
	$totalPrice = $_GET['totalPrice'];
	//validate bank details
	
	$sql = "SELECT balance FROM tblIntegratedAccounts WHERE cardNumber ='". $cardSerialNumber . "' AND bank ='". $bank . "' AND experyDate ='". $experyDate ."' AND cardType='". $cardType ."' AND cardName='".$cardName ."' AND cardSsn='".$cardSsn ."'";
	$result = mysql_query($sql, $db) or die("0" . mysql_error());//where 0 means unsuccessfull transaction
	if(mysql_num_rows($result) > 0){
	
		while($row = mysql_fetch_array($result)){
		
			$balance = $row['balance'];
		}
		
		if($balance > $totalPrice){
			
			$balance = $balance - $totalPrice;
			//update buyers account.
			$sql = "UPDATE tblIntegratedAccounts SET balance =".$balance ." WHERE cardNumber ='". $cardSerialNumber . "' AND bank ='". $bank . "' AND experyDate ='". $experyDate ."'";
			$result = mysql_query($sql, $db) or die("0");//where 0 means unsuccessfull transaction
			
			//store buyer's order details.
			$sql = "INSERT INTO tblPurchasedItems (cardNumber, purchasedItems, roomCategory, floor, room, status) VALUES ('". $cardSerialNumber ."','". mysql_real_escape_string($wines) ."','". $roomCategory."','". $floor ."','". $room ."', 0)";
			$result = mysql_query($sql, $db) or die("0");//where 0 means unsuccessfull transaction
			print("1");//where 1 means successfull transaction.
		}else{
		
			//Insufficient Funds/Balance in account
			print("2");//where 2 means Insufficient Funds/Balance in account
		}
		
	}else{
		//Invalid Account Details
		print("3");
	}
	

?>