<?php
 require_once('../connection.php');
 date_default_timezone_set("Asia/Rangoon");
 $num = $_GET['num'];
 $schedule = (int) $_GET['schedule'];
 $tutorial_name = $_GET['name'];
 $allow_minute = $_GET['allow_minute'];
 $startDate = $_GET['start_date'];
 $endDate = $_GET['end_date'];
 
 
 $insert_sql = "insert into tutorial (tutorial_name, schedule_id, start_date, end_date, allow_time) values (?,?,?,?,?) ";
		$stmt = $conn->prepare($insert_sql);
		$stmt->bind_param("sisss",$tutorial_name, $schedule, $startDate, $endDate, $allow_minute);
		$stmt->execute();
		
if ($stmt){
	$stmt->close();
	
	$select_tuto_id = "select tutorial_id from tutorial where tutorial_name = ? and schedule_id = ? and start_date = ? and end_date = ? and allow_time = ? ";
			$stmt3 = $conn->prepare($select_tuto_id);
			$stmt3->bind_param("sisss",$tutorial_name, $schedule, $startDate, $endDate, $allow_minute);
			$stmt3->execute();
			$stmt3->bind_result($tutorial_id);
			
			while($stmt3->fetch()){
				$tutorial_id = $tutorial_id;
			}
}
		
		echo "$tutorial_id";
 header("location:create_question_media.php?num=$num&schedule=$schedule&tutorial_id=$tutorial_id");
		
		
?>