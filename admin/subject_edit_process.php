<?php
	require_once('../connection.php');
		$eCode = $_POST['eCode'];	
		$code = $_POST['code'];	
		$name = $_POST['name'];	
		$year = $_POST['year'];	
			
	
	$update_subject = "update subject set code = ? , subject_name = ? where code = ? and year_id = (select year_id from year where year.name = ?)";
		$stmt = $conn->prepare($update_subject);
		$stmt->bind_param("ssss",$eCode, $name, $code , $year);
		$stmt->execute();
		
		
	$conn->close();
	header("location:subjects_layout.php"); 
?>