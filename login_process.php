<?php
	require_once('connection.php');
	session_start();
	$user_name = $_POST['user_name'];
	$password = $_POST['password'];
	
	$select_sql = "select count(user_id),user_id,role from user where user_name=? and password=? ";
	$stmt1 = $conn->prepare($select_sql);
	$stmt1->bind_param("ss",$user_name,$password);
	$stmt1->execute();
	$stmt1->bind_result($count,$user_id,$role);
	
	while($stmt1->fetch()){
		$user_id=$user_id;
		$role=$role;
		$count=$count;
	}
	session_regenerate_id();
	$_SESSION['USER_ID'] = $user_id;
	$_SESSION['ROLE'] = $role;
	
	if($count == 0){
		header("location:login.php?error=error");
	}else{
			 if($role=="admin"){
				header("location:admin/admin_dashboard.php");
			}
			if($role=="teacher"){
				header("location:teacher/teacher_profile.php");
			}
			if($role=="student"){
				header("location:student/student_profile.php");
		} 
	}
	
	
?>