<?php
require_once('../connection.php');
include_once('generate_name_password.php');

if($conn){
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$department = $_POST['department'];
	$gender = $_POST['gender'];
	$dep_id=0;
	$userId = 0;
	$date = date('Y/m/d');
	
	//echo $name."<br>".$phone."<br>".$email."<br>".$address."<br>".$department." dept<br>".$gender."<br>";
	 //department table
	$select_dep = "select department_id from department where name = ? ";
	$stmt1 = $conn->prepare($select_dep);
	$stmt1->bind_param("s",$department);
	$stmt1->execute();
	$stmt1->bind_result($id);
	while($stmt1->fetch()){
		$dep_id = $id;
	}
	
	//echo $dep_id;
	
	if($stmt1){
		$stmt1->close();
			// user table
		$password = randomPassword();
		$userName = userName($name);
		$userName = $userName.$phone;
		$role = "teacher";
		$insert_user = "insert into user (user_name,password,role,date) values (?,?,?,?)";
		$stmt2 = $conn->prepare($insert_user);
		$stmt2->bind_param("ssss",$userName, $password, $role, $date );
		$stmt2->execute();
	}

	
	if($stmt2){
		$stmt2->close();
	
		$select_user_id = "select user_id from user where user_name = ? ";
		$stmt3 = $conn->prepare($select_user_id);
		$stmt3->bind_param("s",$userName);
		$stmt3->execute();
		$stmt3->bind_result($user_id);
		while($stmt3->fetch()){
			$userId = $user_id;
		}
	}

	if($stmt3){
		$stmt3->close();
		$insert_teacher = "insert into teacher (user_id, department_id, name, phone, email, address, gender) values (?,?,?,?,?,?,?)";
		$stmt4 = $conn->prepare($insert_teacher);
		$stmt4->bind_param("iisssss",$userId, $dep_id, $name, $phone, $email, $address, $gender);
		$stmt4->execute();
		$stmt4->close();
	}	

if($stmt4){
	header("location:teacher_create_layout.php");
	$stmt4->close();
	$conn->close();
}
	  
} 

?>