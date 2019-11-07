<?php
	require_once('../connection.php');
		$department = $_POST['department'];	
		$dept = $_POST['dept'];	
			
	
	$update_dept = "update department set name = ? where name = ?";
		$stmt = $conn->prepare($update_dept);
		$stmt->bind_param("ss",$department, $dept);
		$stmt->execute();
		
		
	$conn->close();
	header("location:department_layout.php"); 
?>