<?php
 include('admin_nav.php');
  require_once('../connection.php');
 
 $teacher_id = $_GET['id'];
 $ss = (int) $_GET['ss'];
 $yy = $_GET['yy'];
 $id = (int) $teacher_id;
?>

<html>
<head>
<meta name="theme-color" content="#01579b">
<link rel="stylesheet" href="css/create_student_form.css">

</head>
<body>
 <div class="content-wrapper">
 <div class="container-fluid" style="margin-left:5px;">
 <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="teacher_manage_layout.php">Manage Teacher</a>
        </li>
        <li class="breadcrumb-item active">
			<?php	
	$select_sql = "select name from teacher where teacher_id = ?";
	$stmt1 = $conn->prepare($select_sql);
		$stmt1->bind_param("i",$id);
	$stmt1->execute();
	$stmt1->bind_result($teacher_name);
	while($stmt1->fetch()){
	echo "$teacher_name";
	}
	$stmt1->close(); 
	?> 
		</li>
      </ol>
	  
	<div class="row">
		<div class="col-sm-5" style="background-color:lavenderblush;padding-bottom:10px;">
		<form action="teacher_allocate_process.php" method="post" >
			<div class="form-group">
		<label for="name">Choose section</label><br>
		<select name="section" onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);" class="form-control" required>
		<option value="" selected disabled hidden>Choose section.....</option>
		<?php
		$sss=null;
		$select_sql = "select section.section_id,section.section,year.name from year,section where section.year_id = year.year_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$stmt->bind_result($section_id,$section,$year);
	
	while($stmt->fetch()){
		?>
		<option value="teacher_allocate_layout.php?ss=<?php echo "$section_id";?>&yy=<?php echo "$year";?>&id=<?php echo "$teacher_id";?>" <?php if($section_id == $ss){  $sss = $section_id ;?> selected="selected" <?php } ?>><?php echo "$section($year)";?></option>
		<?php
			}
			$stmt->close();
		?>
		</select>
		<input type="hidden" value="<?php echo "$sss";?>" name="section_selected">
		<input type="hidden" value="<?php echo "$teacher_id";?>" name="teacher">
		</div>

		</div>
		
		<div class="col-sm-5" style="background-color:lavenderblush">

			<div class="form-group">
			<label for="name">Add Subject </label><br>
			<select name="subject" required class="form-control">
		<option value="" selected disabled hidden>Choose subject.....</option>
		<?php
		
		$select_sql = "select subject.subject_id,subject.code from subject,year,section where section.section_id= ? and section.year_id=year.year_id and year.name= ? and year.year_id=subject.year_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("is",$ss,$yy);
		$stmt->execute();
		$stmt->bind_result($sub_id,$code);
	
	while($stmt->fetch()){
		?>
		<option value="<?php echo "$sub_id";?>"><?php echo "$code";?></option>
		<?php
			}
			$stmt->close();
		?>
		</select>
	  </div>
	
		</div>
		
		<div class="col-sm-2" style="background-color:lavenderblush">
		<div class="form-group">
			<label for="semester">Add semester </label><br>
			<select name="semester" required class="form-control">
			<option value="" selected disabled hidden>Choose semester.....</option>
			<option value="first">First Semester</option>
			<option value="second">Second Semester</option>
			</select>
			</div>
			<button type="submit" class="btn btn-info" style="float:right;width:70px;margin-bottom:5px;">Add</button>
		</form>
		</div>
</div><br>
	  
	    <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>Suject</th>
        <th>Section</th>
        <th>Year</th>
        <th>Semester</th>
        <th>Action</th>
      </tr>
    </thead>
	
    <tbody>
	<?php

	$select_sql = "select schedule.schedule_id,subject.code, section.section, year.name, schedule.semester from subject,section,year,schedule where schedule.section_id=section.section_id and schedule.subject_id=subject.subject_id and section.year_id=year.year_id and schedule.teacher_id=? ";
	$stmt = $conn->prepare($select_sql);
	$stmt->bind_param("i",$id);
	$stmt->execute();
	$stmt->bind_result($schedule_id,$subject,$section,$year,$semester);
	
	while($stmt->fetch()){
		
	?>
	
	 <tr>
        <td><?php  echo "$subject" ; ?> </td>
        <td><?php  echo "$section" ; ?> </td>
        <td><?php  echo "$year" ; ?> </td>
        <td><?php  echo "$semester" ; ?> </td>
        <td>
      <span class="fa fa-edit btn btn-primary" ></span>
      <a href="teacher_allocate_delete.php?id=<?php echo "$schedule_id" ?>&teacher=<?php echo "$id" ?>"><span class="fa fa-trash btn btn-primary" ></span></a>
	</td>
      </tr>
	  
	  <?php
		}
		$stmt->close();
		$conn->close();
	  ?>
    </tbody>
  </table>
</div>

	  
 </div>
</div>
<!--footer-->
<footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Learning Management System 2018</small>
        </div>
      </div>
    </footer>
</body>
</html>