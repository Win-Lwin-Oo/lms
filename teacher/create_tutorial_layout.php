<?php
  include('teacher_nav.php');
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
          Teacher
        </li>
        <li class="breadcrumb-item active">
			Create Tutorial
		</li>
      </ol>
	
	<div class="row">
	<?php
		$select_sql = "select schedule.schedule_id,subject.code,section.section,year.name from schedule,subject,teacher,section,year where teacher.user_id = ? and teacher.teacher_id = schedule.teacher_id and schedule.subject_id = subject.subject_id and schedule.section_id = section.section_id and section.year_id = year.year_id ";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$user_id);
		$stmt->execute();
		$stmt->bind_result($schedule_id,$code,$section,$year);
		
		while($stmt->fetch()){
		
	?>
	<div class="col-md-6" style="margin-bottom:10px">
		<a href="create_question_layout.php?schedule=<?php echo "$schedule_id" ?>">
		<div class="card text-white bg-primary o-hidden h-100"   data-toggle="collapse" data-target="#demo1">
           	<div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-users"></i>
              </div>
              <div class="mr-5"><?php echo "$code , Section ($section) , $year"; ?></div>
            </div>
            
          </div>
		  </a>
		  
	</div>
	
	 <?php
		}
		$stmt->close();
		$conn->close();
	  ?>
	
	</div>
	
	</div>

</div>

</div>

</body>
</html>