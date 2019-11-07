<?php
	require_once('../connection.php');
	
	$id = (int) $_POST['tuto_id'];
	$name = $_POST['name'];
	$start_date = $_POST['start_date'];
	$end_date = $_POST['end_date'];
	$allow_time = $_POST['allow_time'];
	
	$update_tutorial = "update tutorial set tutorial_name = ? , start_date = ? , end_date = ? , allow_time = ? where tutorial_id = ?";
		$stmt = $conn->prepare($update_tutorial);
		$stmt->bind_param("ssssi",$name, $start_date, $end_date, $allow_time, $id);
		$stmt->execute();
		
		
	$conn->close();
	header("location:manage_tutorial_process.php?id=$id");


?>