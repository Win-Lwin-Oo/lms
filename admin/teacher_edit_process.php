<?php
require_once('../connection.php');

if($conn){
	$id = (int)$_POST['id'];
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
	$stmt1->bind_result($deptId);
	while($stmt1->fetch()){
		$dep_id = (int)$deptId;
	}
	$stmt1->close();
	//echo $name."<br>".$phone."<br>".$email."<br>".$address."<br>".$department.$dep_id." dept<br>".$gender."<br>";

		$update_teacher = "update teacher set department_id = ? , name = ? , phone = ? , email = ? , address = ? , gender = ? where teacher_id = ?";
		$stmt2 = $conn->prepare($update_teacher);
		$stmt2->bind_param("isssssi",$dep_id,$name,$phone,$email,$address,$gender,$id);
		$stmt2->execute();
		$stmt2->close();
		

		header("location:teacher_manage_layout.php");
	
		$conn->close();

	  
} 

?>