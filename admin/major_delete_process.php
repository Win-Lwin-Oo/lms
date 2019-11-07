<?php
	require_once('../connection.php');

	if($conn){
		$year = $_GET['year'];
		$major = $_GET['major'];
		
		$delete_sql = "delete from major where name = ? and year_id = (select year_id from year where year.name = ?)";
		$stmt = $conn->prepare($delete_sql);
		$stmt->bind_param("ss",$major,$year);
		$stmt->execute();

		if($stmt){
			header("location:majors_layout.php");
			$stmt->close();
			$conn->close();
		}
	
	}

?>