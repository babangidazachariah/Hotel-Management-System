<?php 
SESSION_START();
	require_once "connection.php";
	
	$query = "SELECT experyDate, balance FROM IntegratedAccounts WHERE bank ='". $_GET['bank']."' AND cardNumber ='". $_GET['cardNumber'] ."'";//AND experyDate = DATE_FORMAT(" . $_GET['experyDate'] .",'%y-%m-%d')";// . "'";

	//print($query);
	$result = mysql_query($query,$db) or print("1");//Card Details Could not Be Verified.
	//print($result);
	$_SESSION['roomDetails']  = "";
		while($row=mysql_fetch_array($result))
		{
			if($row['experyDate'] >= date('Y-m-d'))
			{
				//print("Here Has Executed and condition satisfied");
				$pos = strpos($_GET['price'], ' ');
				$price = substr($_GET['price'], 0,$pos);
				$_SESSION['roomDetails']  = substr($_GET['price'],$pos);
				$bal = $row['balance'] - $price;
				if($bal >= 0)
				{	
					$query = "UPDATE IntegratedAccounts SET balance =". $bal." WHERE bank ='". $_GET['bank']."' AND cardNumber ='". $_GET['cardNumber'] ."'";
					$result = mysql_query($query,$db) or print("Could Not Be Executed tblRooms");// . mysql_error($db));
					$_SESSION['transactionStatus'] = "Successful";
					
					print('2'); //transaction was successfull.
					$_SESSION['cardNumber'] ="";
					$ch = 0;
					for($i= (strlen($_GET['cardNumber']) - 1) ;$i >= 0; $i--)
					{
						
						if($ch < 5)
						{
							$_SESSION['cardNumber']  = substr($_GET['cardNumber'], $i,1) . $_SESSION['cardNumber'] ;
						}else{
							$_SESSION['cardNumber']  = "*" . $_SESSION['cardNumber'] ;
						}
						$ch += 1;
						
					}
					
				}else{
					$_SESSION['transactionStatus'] = "Unsuccessful";
					print('3'); //transaction was unsuccessfull.
				}
				//print("Here Has Executed");
			}
			
		}
		


?>