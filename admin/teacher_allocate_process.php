<?php
	require_once('../connection.php');

	if($conn){
		$teacher_id = (int) $_POST['teacher'];
		$section = (int) $_POST['section_selected'];
		$subject = (int) $_POST['subject'];
		$semester = $_POST['semester'];
		
		
		
		$select_sql = "select count(*) from schedule where teacher_id = ? and section_id = ? and subject_id = ? and semester = ? ";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("iiis",$teacher_id,$section,$subject,$semester);
		$stmt->execute();
		$stmt->bind_result($count);
		
		while($stmt->fetch()){	
			$count = $count;
		}
		//echo "$teacher_id,$section,$subject,$semester,$count";
		
		if( $count == 0){
	
			$insert_sql = "insert into schedule (teacher_id, section_id, subject_id, semester) values (?,?,?,?)";
			$stmt = $conn->prepare($insert_sql);
			$stmt->bind_param("iiis",$teacher_id,$section,$subject,$semester);
			$stmt->execute();

			if($stmt){
				header("location:teacher_allocate_layout.php?id=$teacher_id&ss=s&yy=y");
				$stmt->close();
				$conn->close();
			}
		}else {
			header("location:teacher_allocate_layout.php?id=$teacher_id&ss=s&yy=y");
		} 
		
	}
?>