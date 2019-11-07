<?php
 $num = $_GET['num'];
 require_once('../connection.php');
 $schedule = (int) $_GET['schedule'];
 $tuto_id = (int) $_GET['tutorial_id'];
		
  $select_sql = "select subject.code from subject,schedule where schedule.schedule_id = ? and schedule.subject_id = subject.subject_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$schedule);
		$stmt->execute();
		$stmt->bind_result($code);
		
		while($stmt->fetch()){
			$code = $code;
		}
		
		$stmt->close();
		
		
		
		
 if($num == 0){
	 header("location:create_question_layout.php?schedule=$schedule");
 }

 include_once('teacher_nav.php');

?>
<html>
<head>
<meta name="theme-color" content="#01579b">
<link rel="stylesheet" href="../admin/css/create_student_form.css">

</head>
<body>

 <div class="content-wrapper">

<div class="container-fluid">

 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          Teacher
        </li>
        <li class="breadcrumb-item active">
			Create Tutorial
		</li>
		<li class="breadcrumb-item active">
			<?php echo "$code"; ?>
		</li>
      </ol>
	  
	  	  
	  <div class="quest_form" style="margin-top:100px">
	  <form action="create_question_process.php" method="post" class="student_register_form" style="margin-top:-70px;">

		<div style="text-align:center;">
			<i class="fa fa-question" style="font-size:50px;color:#868e96;"></i><br>
			<span style="font-size:25px">Enter question and answers</span>
		</div><br>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Question </label><br>
		<input type="text" name="question" placeholder="Enter your question" required="" class="form-control" style="border:none;border-bottom:1px solid red;">
		</div><br><br>
		<label style="text-align:left;text-style:bold;font-size:20px;">Answers </label><br>
		Enter options and select correct option:
		
		<div class="input-group"  style="margin-bottom:20px;">
		
					<input type="text" name="option1" placeholder="Enter option 1" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
				
				
					<input type="radio" name="correct_ans" value="option1"  style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
				
		
		</div>
		<div class="input-group"  style="margin-bottom:20px;">
			
					<input type="text" name="option2" placeholder="Enter option 2" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
			
					<input type="radio" name="correct_ans" value="option2" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
				
		</div>
		
		<div class="input-group"  style="margin-bottom:20px;">
			
					<input type="text" name="option3" placeholder="Enter option 3" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
				
					<input type="radio" name="correct_ans"  value="option3" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
				
		</div>
		
		<div class="input-group" style="margin-bottom:20px;">
			
					<input type="text" name="option4" placeholder="Enter option 4" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
				
					<input type="radio" name="correct_ans" value="option4" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
				
		</div>
		<input type="hidden" name="num" value="<?php echo $num; ?> " >
		<input type="hidden" name="schedule" value="<?php echo $schedule; ?> " >
		<input type="hidden" name="tutorial_id" value="<?php echo $tuto_id; ?> " >
		<input type="submit" value="Next >>" class="btn btn-info btn-block col-sm-12">
	
	
</form>

</div>

</div>

</div>

</body>
</html>