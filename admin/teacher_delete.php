<?php
	require_once('../connection.php');

	if($conn){
		$id = $_GET['id'];
		
		$delete_sql = "delete from teacher where teacher_id = ?";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		if($stmt){
			header("location:teacher_manage_layout.php");
			$stmt->close();
			$conn->close();
		}
	
	}
?>