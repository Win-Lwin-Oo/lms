<?php
 include('admin_nav.php');
require_once('../connection.php');
	
$yy =$_GET['name'];
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
          <a href="admin_dashboard.php">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">
			Create Student
		</li>
      </ol>
<form action="student_create_process.php" method="post" class="student_register_form" >

		<div style="text-align:center;">
			<i class="fa fa-graduation-cap" style="font-size:50px;color:#868e96;"></i><br>
			<span style="font-size:25px">Student Registration Form</span>
		</div><br>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Year </label><br>
		<select onchange="this.options[this.selectedIndex].value && (window.location=this.options[this.selectedIndex].value);" id="year" class="form-control"  name="year" required  >
		<option value="" selected disabled hidden>Choose Year.....</option>
		
		<?php
		$yyy=null;
		$select_sql = "select year_id,name from year";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$stmt->bind_result($year_id, $year);
	
		while($stmt->fetch()){
		?>
			<option id="section" value="student_create_layout.php?name=<?php echo "$year";?>"  <?php if($year == $yy){  $yyy = $year ;?> selected="selected" <?php } ?> ><?php echo "$year";?> </option>
			
		<?php
				
				}
		?>
		</select>
		<input type="hidden" value="<?php echo "$yyy";?>" name="year_selected">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Name </label><br>
		<input  type="text" class="form-control" name="name" placeHolder="Enter student name" required >
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Roll No. </label><br>
		<input class="form-control"  type="text" name="roll" placeHolder="Enter student roll number" required >
		</div>
				
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Phone </label><br>
		<input class="form-control"  type="number" name="phone" placeHolder="Enter phone number" required >
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Email </label><br>
		<input class="form-control"  type="email" name="email" placeHolder="Enter email address" required >
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Current Address </label><br>
		<input class="form-control"  type="text" name="address" placeHolder="Enter current address" required >
		</div>
		
		
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Section </label><br>
		<select class="form-control"  name="section" required>
		<option  value="" selected disabled hidden>Choose Section.....</option>
		
		<?php
		$stmt->close();
		
		$select_sql = "select section.section_id,section.section from section,year where year.name = ? && year.year_id = section.year_id Group By section";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("s",$yy);
		$stmt->execute();
		$stmt->bind_result($section_id, $section);
	
		while($stmt->fetch()){
		?>
			<option value="<?php echo "$section_id";?>"> <?php echo "$section";?> </option>
		<?php
				}
		?>
		</select>
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Major </label><br>
		<select class="form-control"  name="major" required >
		<option  value="" selected disabled hidden>Choose Major.....</option>
	
	<?php
		$stmt->close();
		
		$select_sql = "select major.major_id, major.name from major,year where year.name = ? && year.year_id = major.year_id Group By name";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("s",$yy);
		$stmt->execute();
		$stmt->bind_result($major_id, $major);
	
		while($stmt->fetch()){
		?>
			<option value="<?php echo "$major_id";?>"> <?php echo "$major";?> </option>
		<?php
				}
		?>
		</select>
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Gender </label><br>
		
		<input type="radio" name="gender" value="Male" checked style="width:20px;height:20px;margin-top:10px;" required ><label style="font-size:20px;margin-left:10px">Male</label>
		<input type="radio" name="gender" value="Female" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required><label style="font-size:20px;margin-left:10px">Female</label>
		
		</div>
		
		<input  type="submit" value="Register"  class="btn btn-primary btn-block">
	
	
</form>
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