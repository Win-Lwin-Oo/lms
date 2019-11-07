<?php
require_once('../connection.php');
include_once('generate_name_password.php');

	if($conn){
		$name = $_POST['name'];
		$roll = $_POST['roll'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$address = $_POST['address'];
		$year = $_POST['year_selected'];
		$section = (int)$_POST['section'];
		$major = (int)$_POST['major'];
		$gender = $_POST['gender'];	
		$userId = 0;
		$date = date('Y/m/d');
	
		$password = randomPassword();
		$userName = userName($name);
		$userName = $userName.$phone;
		$role = "student";
		
		//echo "$userName,$password";
		$insert_user = "insert into user (user_name,password,role,date) values (?,?,?,?)";
		$stmt1 = $conn->prepare($insert_user);
		$stmt1->bind_param("ssss",$userName, $password, $role, $date );
		$stmt1->execute();
		
	if($stmt1){
		$stmt1->close();
	
		$select_user_id = "select user_id from user where user_name = ? ";
		$stmt2 = $conn->prepare($select_user_id);
		$stmt2->bind_param("s",$userName);
		$stmt2->execute();
		$stmt2->bind_result($user_id);
		while($stmt2->fetch()){
			$userId = $user_id;
		}
	}
	
	if($stmt2){
		$stmt2->close();
	
		$select_user_id = "select year_id from year where name = ? ";
		$stmt = $conn->prepare($select_user_id);
		$stmt->bind_param("s",$year);
		$stmt->execute();
		$stmt->bind_result($year_id);
		while($stmt->fetch()){
			$year_id = $year_id;
		}
	}
	
	if($stmt){
		$stmt->close();
		$insert_student = "insert into student (name, roll_no, phone, email, address, gender, user_id, year_id, section_id, major_id) values (?,?,?,?,?,?,?,?,?,?)";
		$stmt3 = $conn->prepare($insert_student);
		$stmt3->bind_param("ssssssiiii",$name, $roll, $phone, $email, $address, $gender, $userId, $year_id, $section, $major);
		$stmt3->execute();
		

	}	
	
	if($stmt3){
				header("location:student_create_layout.php?name=a");
				$stmt3->close();
				$conn->close();
	}	
		
	}
?>