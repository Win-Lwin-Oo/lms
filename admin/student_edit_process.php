<?php
	require_once('../connection.php');
		$id = (int) $_POST['id'];	
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$year = (int) $_POST['year_selected'];
		$section = (int)$_POST['section'];
		$major = (int)$_POST['major'];
		$gender = $_POST['gender'];	
	
	
	
	//echo $id.",". $name.",".$roll.",".$phone.",".$email.",".$address.",".$year.",".$section.",".$major.",".$gender;
	$update_student = "update student set name = ? , roll_no = ? , phone = ? , email = ? , address = ? , gender = ? , year_id = ? , section_id = ? , major_id = ? where student_id = ?";
		$stmt = $conn->prepare($update_student);
		$stmt->bind_param("ssssssiiii",$name, $roll, $phone, $email, $address, $gender, $year, $section, $major, $id);
		$stmt->execute();
		
		
	$conn->close();
	header("location:student_manage_layout.php"); 


?>