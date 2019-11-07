<?php
 include_once('teacher_nav.php');
 require_once('../connection.php');
 $schedule = (int) $_GET['schedule'];
 
  $select_sql = "select subject.code from subject,schedule where schedule.schedule_id = ? and schedule.subject_id = subject.subject_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$schedule);
		$stmt->execute();
		$stmt->bind_result($code);
		
		while($stmt->fetch()){
			$code = $code;
		}
		
		$stmt->close();
 
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
	  
	<form action="insert_tutorial_process.php" method="get"  class="student_register_form col-sm-5"> 
	
	<div style="text-align:center;">
			<i class="fa fa-question" style="font-size:50px;color:#868e96;"></i><br>
			<span style="font-size:25px">Create Tutorial</span>
		</div><br>
	
	<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Number Of Questions </label>
      <input name="num" class="form-control" type="number" min="1" max="100"  placeholder="Enter number of questions" required>
      </div>
	  
	  <div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Tutorial Name </label><br>
		<input type="text" name="name" placeHolder="Enter tutorial name" required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Start Date </label><br>
		<input type="date" name="start_date"  required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">End Date </label><br>
		<input type="date" name="end_date"  required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Allow Time (Minutes)</label><br>
		<input type="number" placeHolder="Enter minutes for allow time"  name="allow_minute"  required class="form-control">
		</div>
	  
	  <input type= "hidden" name="schedule" value= "<?php echo "$schedule"; ?>">
        <button type="submit" class="btn btn-info" style="margin-left:2px;">Add</button>
	</form>

</div>
</div>
</body>
</html>