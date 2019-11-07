<?php
require_once('../connection.php');

if($conn){
	$department = $_POST['department'];
	
	$select_sql = "select count(*) from department where name = ?";
	$stmt = $conn->prepare($select_sql);
	$stmt->bind_param("s",$department);
	$stmt->execute();
	$stmt->bind_result($count);
	
	while($stmt->fetch()){
		$count = $count;
	}
	
	if ($count == 0){
		$insert_sql = "insert into department (name) values (?)";
		$stmt = $conn->prepare($insert_sql);
		$stmt->bind_param("s",$department);
		$stmt->execute();

		if($stmt){
			header("location:department_layout.php");
			$stmt->close();
			$conn->close();
		}
	}else {
		
			header("location:department_layout.php");
	}
	
}

?>