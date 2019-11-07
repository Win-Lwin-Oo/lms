<?php 
	include('student_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	
	 $select_sql = "select student.roll_no, student.name,student.phone,student.email,student.address,year.name from student,year where student.user_id = ? and student.year_id = year.year_id";
		$stmt = $conn->prepare($select_sql);
		$stmt->bind_param("i",$user_id);
		$stmt->execute();
		$stmt->bind_result($roll,$name,$phone,$email,$address,$year);
		
		while($stmt->fetch()){
			$roll = $roll;
			$name = $name;
			$phone = $phone;
			$email = $email;
			$address = $address;
			$year = $year;
		}
		
		$stmt->close();
	
?>

<html>
<head>
<meta name="theme-color" content="#01579b">
<link rel="stylesheet" href="../admin/css/create_student_form.css">
<link rel="stylesheet" href="css/student_result.css">

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
			<?php echo $name ;?>
		</li>
      </ol>
	  
			  <div class="row">
	 <div class="col-sm-6">
	<form class="student_register_form">
		<i class="fa fa-lock" title="Change password" style="font-size:20px;color:#868e96;float:right;"></i>
	<h3>My Info<h3>
	<div style="width:auto;height:2px;background-color:#868e96;margin-bottom:20px;"></div>
		<div class="form-group">
		<i class="fa fa-user" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
		<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$name" ?></label>
		</div>
		
		<div class="form-group">
		<i class="fa fa-phone" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
		<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$phone" ?></label>
		</div>
		
		<div class="form-group">
		<i class="fa fa-envelope" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
		<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$email" ?></label>
		</div>
		
		<div class="form-group">
		<i class="fa fa-map-marker" style="font-size:30px;color:#868e96;margin-right:10px;"></i>
		<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$address" ?></label>
		</div>
		
		<div class="form-group">
		<i class="fa fa-users" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
		<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$year" ?></label>
		</div>	
	</form>
	</div>
	
		<div class="col-sm-6">
	<form class="student_register_form">
	<i class="fa fa-paper-plane-o" title="Feedback your comment" style="font-size:20px;color:#868e96;float:right;"></i>
	<h3>Comming soon<h3>
	<div style="width:auto;height:2px;background-color:#868e96;margin-bottom:20px;"></div>	
	<h2 style="color:#868e96">New Version</h2>
  </form>
	</div>
	
	</div>
		
		</div>
	</div>
</body>
</html>