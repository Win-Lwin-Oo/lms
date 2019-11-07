<?php
	require_once('../connection.php');
		$eYear = $_POST['eYear'];	
		$year = $_POST['year'];	
			
	
	$update_year = "update year set name = ? where name = ?";
		$stmt = $conn->prepare($update_year);
		$stmt->bind_param("ss",$eYear, $year);
		$stmt->execute();
		
		
	$conn->close();
	header("location:year_layout.php"); 
?>