<?php
 include('student_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	
	
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
			Answer Tutorial
		</li>
      </ol>
	
	<div class="row">
	
	<?php 
	
		$select_sql = "select subject.subject_id,subject.code from student,year,subject where student.user_id = ? and student.year_id = year.year_id and year.year_id = subject.year_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$user_id);
		$stmt->execute();
		$stmt->bind_result($subject_id,$code);
		
		while($stmt->fetch()){
			
			
	?>

	<div class="col-md-6" style="margin-bottom:10px">
		<a href="question_layout.php?subject_id=<?php echo "$subject_id"; ?>">
		<div class="card  h-100"   data-toggle="collapse" data-target="#demo1">
           	<div class="card-body">
             
              <div class="mr-5"><?php echo "$code"; ?></div>
            </div>
            
          </div>
		  </a>
		  
	</div>
	
		
	<?php
		}
		
		$stmt->close();
	
	?>
	
	
	
	</div>

</div>

</div>

</body>
</html>