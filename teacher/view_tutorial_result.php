<?php 
	include('teacher_nav.php');
	require_once('../connection.php');
	
	/* $user_id = (int) $_SESSION['USER_ID'];
	
	$schedule_id = (int) $_GET['schedule'];
	$subject_id = (int) $_GET['code'];
	$section_id = (int) $_GET['section']; */
	
	$id = (int) $_GET['id'];
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
          Teacher
        </li>
		<li class="breadcrumb-item active">
			Tutorial Result
		</li>
      </ol>

<div class="table-responsive">	
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Roll No</th>		
        <th>Name</th>
        <th>Tutorial</th>
        <th>Given Mark</th>
        <th>Received Mark</th>
        <th>Date</th>
        <th>Remark</th>
        <th>Download</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
		 $select_sql = "select student.roll_no,student.name,tutorial.tutorial_name,result.total_question,result.total_mark,result.result_date,result.remark from student,tutorial,result 
		 where result.tutorial_id = ? and tutorial.tutorial_id =result.tutorial_id and result.student_id = student.student_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($roll_no,$name,$tutorial_name,$given_mark,$received_mark,$result_date,$remark);
		
		while($stmt->fetch()){
			
	?>
	 <tr>
        <td><?php echo "$roll_no"; ?></td>
        <td><?php echo "$name"; ?></td>
        <td><?php echo "$tutorial_name"; ?></td>
        <td><?php echo "$given_mark"; ?></td>
        <td><?php echo "$received_mark"; ?></td>
        <td><?php echo "$result_date"; ?></td>
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