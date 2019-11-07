<?php
	require_once('../connection.php');

	if($conn){
		$id = $_GET['id'];
		$teacher_id = $_GET['teacher'];
		
		$delete_sql = "delete from schedule where schedule.schedule_id = ?";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();

		if($stmt){
			header("location:teacher_allocate_layout.php?id=$teacher_id&ss=s&yy=y");
			$stmt->close();
			$conn->close();
		}
	
	}
?>