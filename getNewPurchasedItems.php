<?php 
	
	$output = "";
	require_once 'connection.php';
	$sql = "SELECT purchaseID, cardNumber, purchasedItems, roomCategory, floor, room FROM tblPurchasedItems WHERE status = 0";
	$result = mysql_query($sql,$db) or die("Error");
	if(mysql_num_rows($result) >0){
		/*
		while($row = mysql_fetch_assoc($result)){
			$sql = "SELECT cardName FROM tblIntegratedAccounts WHERE cardNumber ='". $row['cardNumber']."'";
			mysql_query($sql,$db);
			while($newRow = mysql_fetch_assoc($newResult)){
				$output = $output. $row['purchaseId']. "," $newRow['cardName']."," . $row['purchasedItems']. "," . $row['roomCategory']. "," . $row['floor']. "," . $row['room']. ";";
			}
		}
		*/
		print("1");
	}else{
		print("0");
	}
	//print($output);
?>