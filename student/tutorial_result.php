<?php 
	include('student_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	$tuto_id = (int) $_GET['tuto_id'];
	
	
?>

<html>
<head>
<meta name="theme-color" content="#01579b">

</head>
<body>

 <div class="content-wrapper">

<div class="container-fluid">

 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          Student
        </li>
		<li class="breadcrumb-item active">
			Tutorial Result
		</li>
      </ol>

<div class="table-responsive">	
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Subject</th>		
        <th>Date</th>
        <th>Tutorial</th>
        <th>Given Mark</th>
        <th>Received Mark</th>
        <th>Examiner</th>
        <th>Remark</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
		 $select_sql = "select subject.code,result.result_date,tutorial.tutorial_name,result.total_question,result.total_mark,teacher.name,result.remark from subject,tutorial,result,schedule,teacher,student where tutorial.tutorial_id = ? and student.user_id = ? and result.student_id = student.student_id and  result.tutorial_id = tutorial.tutorial_id and tutorial.schedule_id = schedule.schedule_id and schedule.subject_id = subject.subject_id and schedule.teacher_id = teacher.teacher_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("ii",$tuto_id,$user_id);
		$stmt->execute();
		$stmt->bind_result($subject,$date,$tutorial,$given_mark,$received_mark,$examiner,$remark);
		
		while($stmt->fetch()){
			
	?>
	 <tr>
        <td><?php echo "$subject"; ?></td>
        <td><?php echo "$date"; ?></td>
        <td><?php echo "$tutorial"; ?></td>
        <td><?php echo "$given_mark"; ?></td>
        <td><?php echo "$received_mark"; ?></td>
        <td><?php echo "$examiner"; ?></td>
        <td><?php echo "$remark"; ?></td>
        <td><span class="fa fa-download btn btn-primary" style="font-size:20px;"></span></td>
      </tr>
	<?php
		
		}
		
		$stmt->close();
		
	?>
	
	  
	</tbody>
	</table>
</div>
</div>
</div>

</body>

</html>