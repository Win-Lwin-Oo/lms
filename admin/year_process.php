<?php

	require_once('../connection.php');

	if($conn){
		
		$year = $_POST['year'];
		
		$select_sql = "select count(*) from year where name = ?";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("s",$year);
		$stmt->execute();
		$stmt->bind_result($count);
		
		while($stmt->fetch()){
			$count = $count;
		}
		
		if ( $count == 0 ){
			
		$insert_sql = "insert into year (name) values (?) ";
		$stmt = $conn->prepare($insert_sql);
		$stmt->bind_param("s",$year);
		$stmt->execute();

		if($stmt){
			header("location:year_layout.php");
			$stmt->close();
			$conn->close();
		}
		}else{
			
			header("location:year_layout.php");
		}
		
	}
?>