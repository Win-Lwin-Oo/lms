<?php

	require_once('../connection.php');

	if($conn){
		
		$major = $_POST['major'];
		$year_id = $_POST['year'];
		
		$yearId = (int) $year_id;
		
		$select_sql = "select count(*) from major where name  = ? and year_id = ?";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("si",$major,$yearId);
		$stmt->execute();
		$stmt->bind_result($count);
		
		while($stmt->fetch()){	
			$count = $count;
		}
		
		if( $count == 0){
	
			$insert_sql = "insert into major (name,year_id) values (?,?)";
			$stmt = $conn->prepare($insert_sql);
			$stmt->bind_param("si",$major,$yearId);
			$stmt->execute();

			if($stmt){
				header("location:majors_layout.php");
				$stmt->close();
				$conn->close();
			}
		}else {
			header("location:majors_layout.php");
		}
		
	}
?>