<?php 
	require_once "connection.php";

	$query = "SELECT room, price FROM tblRooms WHERE category ='". trim($_GET['category']) ."' AND floor ='" .trim($_GET['floor']). "' AND status = 0";
	$result = mysql_query($query,$db) or die("Could Not Be Executed tblRooms" . mysql_error($db));
	//print($query );
	while($row=mysql_fetch_array($result))
	{
		print($row['room'] . "|". $row['price'] . "|");
	}
	
?>
	