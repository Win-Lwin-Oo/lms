<?php
 include('admin_nav.php');
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
			Create Teacher
		</li>
      </ol>

<form action="create_teacher_process.php" method="post" class="student_register_form" >

		<div style="text-align:center;">
			<i class="fa fa-user" style="font-size:50px;color:#868e96;"></i><br>
			<span style="font-size:25px">Teacher Registration Form</span>
		</div><br>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Name </label><br>
		<input type="text" name="name" placeHolder="Enter teacher name" required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Phone </label><br>
		<input type="number" name="phone" placeHolder="Enter phone number" required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Email </label><br>
		<input type="email" name="email" placeHolder="Enter email address" required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Current Address </label><br>
		<input type="text" name="address" placeHolder="Enter current address" required class="form-control">
		</div>
		
		<div class="form-group">
		<label style="text-align:left;text-style:bold;font-size:20px;">Department </label><br>
		<select name="department" required class="form-control">
		<option value="" selected disabled hidden>Choose Department.....</option>
		<?php
		require_once('../connection.php');
		
		$select_sql = "select name from department";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$stmt->bind_result($department);
	
	while($stmt->fetch()){
		?>
		<option value="<?php echo "$department";?>"><?php echo "$department";?></option>
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
		
		<input type="submit" value="Register"  class="btn btn-primary btn-block">
	
	
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