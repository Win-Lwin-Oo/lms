<?php

	require_once('../connection.php');
	
	$id = (int) $_GET['id'];
	$tutorial_id = (int) $_GET['tutorial_id'];
	
	if($conn){
		
		$delete_sql = "delete from question where question_id = ?";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		if($stmt){
			header("location:manage_tutorial_process.php?id=$tutorial_id");
			$stmt->close();
			$conn->close();
		}
	
	}

?>