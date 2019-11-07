<?php 
	include('teacher_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	$id = (int)  $_GET['id'];
	
	
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
			Manage Tutorial
		</li>
      </ol>
	  <?php
		$select_date = "select tutorial_name,start_date,end_date,allow_time from tutorial where tutorial.tutorial_id = ? ";
		$stmt = $conn->prepare($select_date);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($tutorial_name,$start_date,$end_date,$allow_time);
		while($stmt->fetch()){
			$start_date = $start_date;
			$end_date = $end_date;
			$allow_time = $allow_time;
			$tutorial_name = $tutorial_name;
			
		}
		$stmt->close();
		
		$today_date = date("Y-m-d");
		
		if(!( $today_date < $start_date)){
			?>
			<h1>No Available To Manage </h1>
			<?php
		}else {
			
		?>
	  <div class="row" style="margin-bottom:10px">
		<div class="col-sm-6">
			<span style="font-size:30px"><?php echo $tutorial_name; ?> </span>
			<span data-toggle="modal" data-target="#editTutorial<?php echo "$tutorial_name" ?>" class="fa fa-edit btn btn-primary" ></span>
		</div>
		<div class="col-sm-6">
			<div class="btn btn-primary" style="float:right;position:ablosute;">Add new question</div>
		</div>
	  </div>
	<div class="row">
		<div class="col-sm-12">
		<?php
		
		$select_question = "select question_id,description,ans1,ans2,ans3,ans4,correct_ans from question where question.tutorial_id = ?";
		$stmt = $conn->prepare($select_question);
		$stmt->bind_param("i",$id);
		$stmt->execute();
		$stmt->bind_result($ques_id,$ques,$ans1,$ans2,$ans3,$ans4,$correct);
		while($stmt->fetch()){
			
		?>
		 <div class="card" style="margin-bottom:10px;">
			  <div class="card-header"><?php echo $ques; ?></div>
				<div class="card-body">
					<ul>
						<li><?php echo $ans1; ?> </li>
						<li><?php echo $ans2; ?> </li>
						<li><?php echo $ans3; ?> </li>
						<li><?php echo $ans4; ?> </li>
					</ul>
					<div style="float:right">
						<span data-toggle="modal" data-target="#editQuestion<?php echo "$ques_id" ?>" class="fa fa-edit btn btn-primary" ></span>
						 <span data-toggle="modal" data-target="#deleteQuestion<?php echo "$ques_id" ?>" class="fa fa-trash btn btn-primary" ></span>
	
					</div>
				</div>
		  </div>
		  
	
		  <!--Delete Qustiion Alert-->
	<div class="modal fade" id="deleteQuestion<?php echo "$ques_id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Delete" if you want to delete.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="question_delete_process.php?id=<?php echo $ques_id; ?>&tutorial_id=<?php echo $id; ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<!--Edt Qustiion Alert-->
	<div class="modal fade" id="editQuestion<?php echo "$ques_id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit question and answer</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
		  
		  <br>
		  <br>
          <div class="modal-body">
		 
		  <form action="question_edit_process.php" method="post" class="student_register_form" style="margin-top:-70px;">
			<br>
			<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Question </label><br>
				<input type="text" name="question" value="<?php echo $ques; ?>" required="" class="form-control" style="border:none;border-bottom:1px solid red;">
			</div><br>
			
			<?php 
			
				$opt1=$opt2=$opt3=$opt4="";
				if($correct == $ans1){
					$opt1 = "checked";
				}else if ($correct == $ans2){
					$opt2 = "checked";
				}else if ($correct == $ans3){
					$opt3 = "checked";
				}else if ($correct == $ans4){
					$opt4 = "checked";
				}
				
			?>
			
			<label style="text-align:left;text-style:bold;font-size:20px;">Answers </label><br>
			Edit options and select correct option:
			
			<div class="input-group"  style="margin-bottom:20px;">
			
						<input type="text" name="option1" value="<?php echo $ans1; ?>" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
					
					
						<input type="radio" <?php echo $opt1; ?> name="correct_ans" value="option1"  style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
					
			
			</div>
			<div class="input-group"  style="margin-bottom:20px;">
				
						<input type="text" name="option2" value="<?php echo $ans2; ?>" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
				
						<input type="radio" <?php echo $opt2; ?> name="correct_ans" value="option2" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
					
			</div>
			
			<div class="input-group"  style="margin-bottom:20px;">
				
						<input type="text" name="option3" value="<?php echo $ans3; ?>" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
					
						<input type="radio" <?php echo $opt3; ?> name="correct_ans"  value="option3" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
					
			</div>
			
			<div class="input-group" style="margin-bottom:20px;">
				
						<input type="text" name="option4" value="<?php echo $ans4; ?>" required="" class="form-control " style="border:none;border-bottom:1px solid red;">
					
						<input type="radio" <?php echo $opt4; ?> name="correct_ans" value="option4" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required>
					
			</div>
			<input type="hidden" name="id" value="<?php echo $ques_id; ?> " >
			<input type="hidden" name="tuto_id" value="<?php echo $id; ?> " >
			<input type="hidden" name="tutorial_id" value="<?php echo $tuto_id; ?> " >
			<input style="float:right;margin-right:10px;" type="submit" value="Ok" class="btn btn-info">
			<a href="manage_tutorial_process.php?id=<?php echo $id; ?>"><div style="float:right;margin-right:10px;" class="btn btn-secondary">Cancel</div></a>
			
		</form>
		  
		  </div>
        </div>
      </div>
    </div>
		  
		  <?php
		
		}
		$stmt->close();
		}
		$conn->close();
		
		?>
	  
		</div>
		
			  <!--update tutorial Alert-->
	<div class="modal fade" id="editTutorial<?php echo "$tutorial_name" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Tutorial Name</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  <br><br><br>
		  <form action="tutorial_edit_process.php" method="post" class="student_register_form" style="margin-top:-70px;">
			
			<div class="form-group">
			<label style="text-align:left;text-style:bold;font-size:20px;">Tutorial Name </label><br>
			<input type="text" name="name" value="<?php echo $tutorial_name; ?>"  required class="form-control">
			</div>
			<div class="form-group">
			<label style="text-align:left;text-style:bold;font-size:20px;">Start Date </label><br>
			<input type="date" name="start_date" value="<?php echo $start_date; ?>"  required class="form-control">
			</div>
			
			<div class="form-group">
			<label style="text-align:left;text-style:bold;font-size:20px;">End Date </label><br>
			<input type="date" name="end_date" value="<?php echo $end_date; ?>"  required class="form-control">
			</div>
			
			<div class="form-group">
			<label style="text-align:left;text-style:bold;font-size:20px;">Allow Time (Minutes)</label><br>
			<input type="number" value="<?php echo $allow_time; ?>"  name="allow_time"  required class="form-control">
			</div>

			<input type="hidden" name="tuto_id" value="<?php echo $id; ?>" >
			
		  </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input type = "submit" class="btn btn-primary" value = "Ok" >
          </div>
		  </form>
        </div>
      </div>
    </div>
		
	 </div>
</div>
	  

</div>
</div>
</body>
</html>