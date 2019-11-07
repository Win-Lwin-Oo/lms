<?php
	require_once('../connection.php');
	
	$id = (int) $_POST['tuto_id'];
	$ques_id = (int) $_POST['id'];
	$question = $_POST['question'];
	$ans1 = $_POST['option1'];
	$ans2 = $_POST['option2'];
	$ans3 = $_POST['option3'];
	$ans4 = $_POST['option4'];
	
	$correct_ans = $_POST['correct_ans'];
	$correct = "";
	
	switch($correct_ans){
		case 'option1': $correct = $ans1;
						break;
		case 'option2': $correct = $ans2;
						break;
		case 'option3': $correct = $ans3;
						break;
		case 'option4': $correct = $ans4;
						break;
					
	}
	
	$update_question = "update question set description = ? , ans1 = ? , ans2 = ? , ans3 = ? , ans4 = ? , correct_ans = ? where question_id = ?";
		$stmt = $conn->prepare($update_question);
		$stmt->bind_param("ssssssi",$question, $ans1, $ans2, $ans3, $ans4, $correct, $ques_id);
		$stmt->execute();
		
	header("location:manage_tutorial_process.php?id=$id");

?>