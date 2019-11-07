<?php
	include('teacher_nav.php');
	require_once('../connection.php');
	
	$user_id = (int) $_SESSION['USER_ID'];
	
	$select_sql = "select teacher.name,teacher.phone,teacher.email,teacher.address,department.name from teacher,department where teacher.user_id = ? and teacher.department_id = department.department_id";
	$stmt = $conn->prepare($select_sql);
	$stmt->bind_param("i",$user_id);
	$stmt->execute();
	$stmt->bind_result($name,$phone,$email,$address,$department);
	
	while($stmt->fetch()){
		$name = $name;
		$phone = $phone;
		$email = $email;
		$address = $address;
		$department = $department;
	}
	
	$stmt->close();
?>
<html>
	<head>
		<meta name="theme-color" content="#01579b">
		<link rel="stylesheet" href="../admin/css/create_student_form.css">
		<link rel="stylesheet" href="css/teacher_job.css">
	</head>
	<body>
		<div class="content-wrapper">
			
			<div class="container-fluid">
				
				<!-- Breadcrumbs-->
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						Teacher
					</li>
					<li class="breadcrumb-item">
						Profile
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
									<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$name"; ?></label>
								</div>
								
								<div class="form-group">
									<i class="fa fa-phone" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
									<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$phone"; ?></label>
								</div>
								
								<div class="form-group">
									<i class="fa fa-envelope" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
									<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$email"; ?></label>
								</div>
								
								<div class="form-group">
									<i class="fa fa-map-marker" style="font-size:30px;color:#868e96;margin-right:10px;"></i>
									<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$address"; ?></label>
								</div>
								
								<div class="form-group">
									<i class="fa fa-users" style="font-size:25px;color:#868e96;margin-right:10px;"></i>
									<label style="text-align:left;text-style:bold;font-size:20px;"><?php echo "$department"; ?></label>
								</div>	
							</form>
							</div>
							
							<div class="col-sm-6">
								<form class="student_register_form">
									<i class="fa fa-paper-plane-o" title="Feedback your comment" style="font-size:20px;color:#868e96;float:right;"></i>
									<h3>My Job<h3>
										<div style="width:auto;height:2px;background-color:#868e96;margin-bottom:20px;"></div>
										<div class="table-responsive">	
											<table class="table table-bordered table-striped table-hover">
												<thead>
													<tr>
													<th>Year</i></th>
												<th>Section</i></th>
											<th>Subject</i></th>
										<th>Time</i></th>
									</tr>
									</thead>
									<tbody>
										<tr>
										<td>Fourth year</i></td>
									<td>A</i></td>
								<td>406</i></td>
							<td>Time</i></td>
						</tr>
					</tbody>
				</table>
			</form>
		</div>
	</div>
	
</div>
</div>

</body>
</html>