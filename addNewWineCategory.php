<?php 
	require_once 'connection.php';
	$sql ="INSERT INTO tblWines (wineCategory) VALUES('".trim($_GET['categoryName'])."')";
	mysql_query($sql, $db) or die(mysql_error($db));
	print("Successfully Inserted");
	
?>