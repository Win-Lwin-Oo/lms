<?php
require_once('../connection.php');

	if($conn){
		$year_id = $_POST['year'];
		$section = $_POST['section'];
		
		$year = (int) $year_id;
		
		//echo $year;
	
	$select_sql = "select count(*) from section where section = ? && year_id = ? ";
	$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("si",$section, $year);
	$stmt->execute();
	$stmt->bind_result($count);
	
	while($stmt->fetch()){
		$count =$count;
	}
		
		if($count == 0){
			$insert_sql = "insert into section (section,year_id) values (?,?)";
			$stmt = $conn->prepare($insert_sql);
			$stmt->bind_param("si",$section,$year);
			$stmt->execute();

			if($stmt){
				header("location:section_layout.php");
				$stmt->close();
				$conn->close();
			}
		} else {
			header("location:section_layout.php");
		}
		
	}
?>