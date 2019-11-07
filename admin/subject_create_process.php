<?php
	require_once('../connection.php');

	if($conn){
		
		$subject_code = $_POST['subject_code'];
		$subject_name = $_POST['subject_name'];
		$year = $_POST['year'];
		
		$year_id = (int) $year;
		
		$select_sql = "select count(*) from subject where code  = ? and year_id = ?";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("si",$subject,$year_id);
		$stmt->execute();
		$stmt->bind_result($count);
		
		while($stmt->fetch()){	
			$count = $count;
		}
		
		if( $count == 0){
	
			$insert_sql = "insert into subject (code,subject_name,year_id) values (?,?,?)";
			$stmt = $conn->prepare($insert_sql);
			$stmt->bind_param("ssi",$subject_code,$subject_name,$year_id);
			$stmt->execute();

			if($stmt){
				header("location:subjects_layout.php");
				$stmt->close();
				$conn->close();
			}
		}else {
			header("location:subjects_layout.php");
		}
		
	}
?>