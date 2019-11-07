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
			Tutorial result
		</li>
      </ol>
	  
	  <div id="accordin" style="margin-bottom:20px;margin-top:20px;">
	
	<?php
		$select_sql = "select schedule.schedule_id,subject.subject_id,subject.code,section.section_id,section.section,year.name from schedule,subject,teacher,section,year where teacher.user_id = ? and teacher.teacher_id = schedule.teacher_id and schedule.subject_id = subject.subject_id and schedule.section_id = section.section_id and section.year_id = year.year_id ";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$user_id);
		$stmt->execute();
		$stmt->bind_result($schedule_id,$subject_id,$code,$section_id,$section,$year);
		$tutorialArray = array();
		while($stmt->fetch()){
			array_push($tutorialArray, array($schedule_id,$subject_id,$code,$section_id,$section,$year));
		}
		$stmt->close();
		
		foreach($tutorialArray as $arr){
			
			$href_id = $arr[2].$arr[4].$arr[5];
	?>
	<div class="card" style="margin-bottom:10px;">
	 <a class="card-link" data-toggle="collapse" href="#<?php echo $href_id;?>">
		 
	<div class="card-header">
		<!--<a href="manage_tutorial_process.php?schedule=<?php echo "$schedule_id" ?>&code=<?php echo "$subject_id"; ?>&section=<?php echo "$section_id"; ?>"> -->
        <div class="mr-5"><?php echo "$arr[2] , Section ($arr[4]) , $arr[5]"; ?></div>
				 
		<!--</a>-->
	</div></a>
	<div style="padding:10px;" id="<?php echo $href_id;?>" class="collapse" data-parent="#accordin">
	  <?php
		$select_tuto = "select tutorial.tutorial_id,tutorial.tutorial_name, tutorial.start_date, tutorial.end_date, tutorial.allow_time from tutorial where tutorial.schedule_id = ?";
		$stmt = $conn->prepare($select_tuto);
		$stmt->bind_param("i",$arr[0]);
		$stmt->execute();
		$stmt->bind_result($tutorial_id,$tutorial_name,$start_date,$end_date,$allow_time);
		while($stmt->fetch()){
			
	  ?>
	  <div class="card" style="margin-bottom:10px;margin-top:10px;">
	  <a href ="view_tutorial_result.php?id=<?php echo "$tutorial_id" ?>">
	  <div class="card-header"><?php echo $tutorial_name; ?> </div>
	  </a>
	  </div>
	  
	 <?php
		}
		$stmt->close();
		
		?>
	</div>
	
	
	</div>
	 <?php
		}
		$conn->close();
	  ?>
	</div>

</div>

</div>

</body>
</html>