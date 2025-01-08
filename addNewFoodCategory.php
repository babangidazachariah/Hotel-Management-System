<?php  
	require_once 'connection.php';
	$sql ="INSERT INTO tblFood (foodCategory) VALUES('".trim($_GET['categoryName'])."')";
	mysql_query($sql, $db) or die(mysql_error($db));
	print("Successfully Inserted");
	
?>