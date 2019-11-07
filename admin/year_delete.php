<?php
	require_once('../connection.php');

	if($conn){
		$year = $_GET['year'];
		
		$delete_sql = "delete from year where name = ?";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("s",$year);
		$stmt->execute();

		if($stmt){
			header("location:year_layout.php");
			$stmt->close();
			$conn->close();
		}else {
		}
	
	}
?>