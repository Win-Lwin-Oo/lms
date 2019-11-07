<?php 
	include('student_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	$subject_id = (int) $_GET['subject_id'];
	
	?>

<html>
<head>
<meta name="theme-color" content="#01579b">
<link rel="stylesheet" href="../admin/css/create_student_form.css">

</head>
<body>

	<?php 
		$title_select = "select student.student_id,tutorial.tutorial_id,tutorial.tutorial_name,subject.code from subject,student,schedule,tutorial where student.user_id = ? and student.section_id = schedule.section_id and subject.subject_id = ? and subject.subject_id= schedule.subject_id and schedule.schedule_id = tutorial.schedule_id";
		$stmt1 = $conn->prepare($title_select);
		$stmt1->bind_param("ii",$user_id,$subject_id);
		$stmt1->execute();
		$stmt1->bind_result($student_id,$tutorial_id,$title,$code);
		
		while($stmt1->fetch()){
			$title = $title;
			$code = $code;
			$tutorial_id = $tutorial_id;
			$student_id = $student_id;
		}
		$stmt1->close();
			
	?>

 <div class="content-wrapper">

<div class="container-fluid">

 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          Student
        </li>
        <li class="breadcrumb-item active">
			Answer Tutorial
		</li>
		<li class="breadcrumb-item active">
			<?php echo "$code"; ?>
		</li>
      </ol>
	  
	  <div class="quest_form" style="margin-top:100px">	  
	  <form name="myForm" action="submit.php" method="post" class="student_register_form" style="margin-top:-70px;">
		<div style="text-align:center;">
			<i class="fa fa-question" style="font-size:50px;color:#868e96;"></i><br>
			<span style="font-size:25px"><?php echo $title ;?></span>
		</div><br>
		
		 <!--TIMER..-->
	<div class="progress" style="height:25px;">
		<div id= "progress" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="" aria-valuemin="0" aria-valuemax="60" style="font-size:20px;">
		</div>
	  </div><label id= "countdown"  style = "margin-left:3px;color:#ffffff;margin-top:-25px;position:absolute;"> </label>
		<br>	
	<?php 	
		$num = 0;
		$today_date = date("Y-m-d");
		$select_sql = "select tutorial.start_date, tutorial.end_date from student,schedule,tutorial where student.user_id = ? and student.section_id = schedule.section_id and schedule.subject_id = ? and schedule.schedule_id = tutorial.schedule_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("ii",$user_id,$subject_id);
		$stmt->execute();
		$stmt->bind_result($start_date,$end_date);
		while($stmt->fetch()){
			$start_date = $start_date;
			$end_date = $end_date;
		}
		
		if( $today_date >= $start_date && $today_date <= $end_date){
			//////////
			$select_sql = "select tutorial.tutorial_id from tutorial,schedule,student where student.user_id = ? and schedule.subject_id = ? and schedule.schedule_id = tutorial.schedule_id and student.section_id = schedule.section_id";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("ii",$user_id,$subject_id);
			$stmt->execute();
			$stmt->bind_result($tutorial_id);
			while($stmt->fetch()){
				$tutorial_id = $tutorial_id;
				
			}
			//////////
			$select_sql = "select count(*) from result,student where student.user_id = ? and student.student_id = result.student_id and result.tutorial_id =?";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("ii",$user_id,$tutorial_id);
			$stmt->execute();
			$stmt->bind_result($count);
			while($stmt->fetch()){
				$count = $count;
				
			}
			
			if ( $count == 0){
				
			$select_sql = "select tutorial.allow_time from tutorial where tutorial.tutorial_id = ?";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("i",$tutorial_id);
			$stmt->execute();
			$stmt->bind_result($allow_time);
			while($stmt->fetch()){
				$allow_time = $allow_time;
				
			}
				
			//select QUESTION VIEW
			$select_sql = "select question.question_id,question.description,question.ans1,question.ans2,question.ans3,question.ans4,question.correct_ans from question where question.tutorial_id = ? order by rand()";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("i",$tutorial_id);
			$stmt->execute();
			$stmt->bind_result($question_id,$description,$answer1,$answer2,$answer3,$answer4,$correct_ans);
			
			while($stmt->fetch()){
				
				$num = $num +1;
				$arr = array($answer1,$answer2,$answer3,$answer4);
				shuffle($arr);
				
				$ans1 = $arr[0];
				$ans2 = $arr[1];
				$ans3 = $arr[2];
				$ans4 = $arr[3];
			
	?>
  
		<div class="form-group"  style="margin-bottom:20px;">
		
			<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$description"; ?>  </label><br>	
					<input type="radio" name="<?php echo "q$num"; ?>" value="<?php echo "$ans1"; ?>"  style="width:20px;height:20px;margin-top:10px;margin-right:10px;" required><?php echo "$ans1"; ?> 
					<br>
					<input type="radio" name="<?php echo "q$num"; ?>" value="<?php echo "$ans2"; ?>"  style="width:20px;height:20px;margin-top:10px;margin-right:10px" required><?php echo "$ans2"; ?> 
					<br>
					<input type="radio" name="<?php echo "q$num"; ?>" value="<?php echo "$ans3"; ?>"  style="width:20px;height:20px;margin-top:10px;margin-right:10px" required><?php echo "$ans3"; ?> 
					<br>
					<input type="radio" name="<?php echo "q$num"; ?>" value="<?php echo "$ans4"; ?>"  style="width:20px;height:20px;margin-top:10px;margin-right:10px" required><?php echo "$ans4"; ?> 		
		
					<input type = "hidden" name="<?php echo "correctq$num" ?>" value ="<?php echo "$correct_ans" ?>" >
			<div style="background-color:#e9ecef;margin-top:20px;" class="col-sm-12"></div>
		</div>
	
		<?php
		}
		
		$stmt->close();
		
	?>
		<input type="hidden" name="total_ques" value="<?php echo "$num"; ?>">
		<input type="hidden" name="student_id" value="<?php echo "$student_id"; ?>">
		<input type="hidden" name="tutorial_id" value="<?php echo "$tutorial_id"; ?>">
		<input type="submit" value="Submit" class="btn btn-info btn-block col-sm-12">
		
		</form>
		
		<?php
		}else{
				?>
				<h1 class="alert alert-warning" style="text-align:center;">Already Answered !</h1>
				<a href="tutorial_result.php"><div class="btn btn-primary" style =" margin:auto;">Show Results</div></a>
				<?php
			}
		}//if tutorial time
		else{
			?>
			<h1 class="alert alert-warning" style="text-align:center;">No Tutorial Time !</h1>
			<?php
			//Absent......
			
			$select_sql = "select count(*) from result,tutorial,student,schedule where student.user_id = ? and student.section_id = schedule.section_id and schedule.subject_id = ? and schedule.schedule_id = tutorial.schedule_id and tutorial.tutorial_id = result.tutorial_id and student.student_id = result.student_id";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("ii",$user_id,$subject_id);
			$stmt->execute();
			$stmt->bind_result($count);
			while($stmt->fetch()){
				$count = $count;
			}
			
		if ( $count == 0){
			
			$select_sql = "select count(*)  from question,student,schedule,tutorial where student.user_id = ? and student.section_id = schedule.section_id and schedule.subject_id = ? and schedule.schedule_id = tutorial.schedule_id and tutorial.tutorial_id = question.tutorial_id";		
			$stmt = $conn->prepare($select_sql);
			$stmt->bind_param("ii",$user_id,$subject_id);
			$stmt->execute();
			$stmt->bind_result($count);
			
			while($stmt->fetch()){
				
				$count = $count;
			}
			
			$date = date("Y-m-d");
			$remark = "Absent";
			$score=0;
			$insert_result = "insert into result (tutorial_id,student_id,total_question,total_mark,result_date,remark) values (?,?,?,?,?,?)";
			$stmt2 = $conn->prepare($insert_result);
			$stmt2->bind_param("iiiiss",$tutorial_id, $student_id, $count, $score,$date,$remark);
			$stmt2->execute();
			}
			
		}
		?>
		
		</div>
		
		</div>
	</div>

</body>

<script>
var t = new Date().getTime() +<?php echo "$allow_time*1000 *60"; ?>;
var n = new Date().getTime();
var d = t- n;
// Update the count down every 1 second
var x = setInterval(function() {

    // Get todays date and time
    var now = new Date().getTime();
    
    // Find the distance between now and the count down date
    var distance = t - now +1;
    
    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	
	if(Math.floor(hours / 10) == 0)
		h = "0"+hours.toString();
	else
		h = hours.toString();
	
	if(Math.floor(minutes / 10) == 0 )
		m = "0"+minutes;
	else
		m = minutes;
	
	if(Math.floor(seconds / 10) == 0){
		s = "0"+seconds;
	}else{
		s = seconds.toString();
	}
    
	document.getElementById("countdown").innerHTML = h+":"+m+":"+ s;
	document.getElementById("progress").style.width = distance/d * 100+ "%";
    
    if (distance < 0) {
		document.getElementById("countdown").innerHTML = "00:00:00";
        clearInterval(x);
		document.forms["myForm"].submit();
        //document.getElementById("demo").innerHTML = "EXPIRED";
    }
}, 1000);
</script>

</html>