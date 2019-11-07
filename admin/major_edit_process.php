<?php
	require_once('../connection.php');
		$eMajor = $_POST['eMajor'];	
		$major = $_POST['major'];	
		$year = $_POST['year'];	
			
	
	$update_major = "update major set name = ? where name = ? and year_id = (select year_id from year where year.name = ?)";
		$stmt = $conn->prepare($update_major);
		$stmt->bind_param("sss",$eMajor, $major, $year);
		$stmt->execute();
		
		
	$conn->close();
	header("location:majors_layout.php"); 
?>