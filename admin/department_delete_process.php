<?php
	require_once('../connection.php');

	if($conn){
		$id = $_GET['id'];
		
		$delete_sql = "delete from department where name = ?";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("s",$id);
		$stmt->execute();

		if($stmt){
			header("location:department_layout.php");
			$stmt->close();
			$conn->close();
		}
	
	}
?>