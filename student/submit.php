<?php 
require_once('../connection.php');
$total_ques = (int)$_POST['total_ques'];
$tutorial_id = (int)$_POST['tutorial_id'];
$student_id = (int)$_POST['student_id'];

$score = 0;
$q = '$q';
 for ($i = 1; $i <= $total_ques ; $i++){
	$ss = "q$i";
	$correct = "correctq$i";
	${'q'."$i"} = $_POST[$ss];
	${'correctq'."$i"} = $_POST[$correct];
	$ans = ${'q'."$i"};
	$cor = ${'correctq'."$i"};
	if($ans == $cor){
		$score++;
	}
}
$date = date("Y-m-d");
$remark = "Present";
		$insert_result = "insert into result (tutorial_id,student_id,total_question,total_mark,result_date,remark) values (?,?,?,?,?,?)";
		$stmt2 = $conn->prepare($insert_result);
		$stmt2->bind_param("iiiiss",$tutorial_id, $student_id, $total_ques, $score,$date,$remark);
		$stmt2->execute();
		
		header("location:view_result.php?given_mark=$total_ques&score=$score");

?>