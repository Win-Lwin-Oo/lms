<?php
 require_once('../connection.php');
 $tuto_id = (int) $_POST['tutorial_id'];
 $schedule = $_POST['schedule'];
 $question = $_POST['question'];
 $option1 = $_POST['option1'];
 $option2 = $_POST['option2'];
 $option3 = $_POST['option3'];
 $option4 = $_POST['option4'];
 $correct_ans = $_POST['correct_ans'];
 $num = $_POST['num'];
 $count = $num-1;
 
switch($correct_ans){
	case "option1" :
			$correct_ans=$option1;
			break;
	
	case "option2" :
			$correct_ans=$option2;
			break;
			
	case "option3" :
			$correct_ans=$option3;
			break;
			
	case "option4" :
			$correct_ans=$option4;
			break;
}
 
 //echo "Question : $question, Option1 : $option1, Option1 : $option2, Option1 : $option3, Option1 : $option4, Correct ans : $correct_ans";

  $insert_sql = "insert into question (tutorial_id, description, ans1, ans2, ans3, ans4, correct_ans) values (?,?,?,?,?,?,?) ";
		$stmt = $conn->prepare($insert_sql);
		$stmt->bind_param("issssss",$tuto_id, $question, $option1, $option2, $option3, $option4, $correct_ans);
		$stmt->execute();
		
 header("location:create_question_media.php?num=$count&schedule=$schedule&tutorial_id=$tuto_id");
?>
