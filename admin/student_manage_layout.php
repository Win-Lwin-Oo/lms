<?php
	include('admin_nav.php');
	require_once('../connection.php');
?>
<html>
	<head>
		<meta name="theme-color" content="#01579b">
		
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
						Manage Student
					</li>
				</ol>
				
				<div class="row" style="background-color:lavenderblush;padding-bottom:10px;">
					<div class="col-sm-6" >
						<h2>Manage Student</h2>
						<p><small>There are <?php	
							$count_sql = "select count(*) from student";
							$stmt1 = $conn->prepare($count_sql);
							$stmt1->execute();
							$stmt1->bind_result($count);
							while($stmt1->fetch()){
								echo "$count";
							}
							$stmt1->close(); 
						?>  student/s in <strong>UCSMGY</strong></small></p>    
					</div>
					
					<div class="col-sm-6" >
						<form action="#" method="post" >
							
							<h3>Search Student</h3>
							
							<div class="input-group">
								
								<input  id="name" type="text" name="name" placeHolder="Enter student name" required class="form-control">
								<button type="submit" class="btn btn-info" style="float:right;width:70px;margin-left:2px;">Search</button>
							</div>
						</form>
					</div>
				</div>
				<div id="accordin" style="margin-bottom:20px;margin-top:20px;">
					<?php	
						$select_year = "select year_id,name from year";
						$stmt = $conn->prepare($select_year);
						$stmt->execute();
						$stmt->bind_result($year_id,$year_name);
						$yearArray = array();
						while($stmt->fetch()){
							array_push($yearArray, $year_name);
						}
						$stmt->close();
						foreach($yearArray as $year){
							
						?>
						
						<div class="card" style="margin-bottom:10px;">
							<div class="card-header">
								
								<a class="card-link" data-toggle="collapse" href="#<?php echo $year;?>">
									<h5 style="color:#000000"> <?php echo $year;?> </h5>
								</a>
							</div>
							<div id="<?php echo $year;?>" class="collapse" data-parent="#accordin">
								
								
								<!-- section -->
								<?php	
									$select_section = "select section.section_id,section.section from section,year where year.name = ? and section.year_id = year.year_id";
									$stmt = $conn->prepare($select_section);
									$stmt->bind_param("s",$year);
									$stmt->execute();
									$stmt->bind_result($section_id,$section);
									$sectionArray = array();
									while($stmt->fetch()){
										array_push($sectionArray, $section);
									}
									$stmt->close();
									foreach($sectionArray as $section){
										
									?>
									
									<h5>Section ( <?php echo $section; ?> )</h5>
									
									
									
									
									<div class="table-responsive">
										<table class="table table-bordered table-striped table-hover ">
											<thead>
												<tr>
													<th>Roll No.</th>
													<th>Name</th>
													<th>Year</th>
													<th>Section</th>
													<th>Major</th>
													<th>Phone</th>
													<th>Email</th>
													<th>Address</th>
													<th>Action</th>
												</tr>
											</thead>
											<tbody>
												<?php
													
													$select_student = "select student.student_id,student.roll_no,student.name,student.phone,student.email,student.address,section.section,major.name from student,year,major,section where student.year_id = year.year_id and student.major_id=major.major_id and student.section_id=section.section_id and section.section = '$section' and year.name = '$year' ORDER BY student_id DESC";
													$stmt = $conn->prepare($select_student);
													$stmt->execute();
													$stmt->bind_result($id,$roll,$name,$phone,$email,$address,$section,$major);
													
													while($stmt->fetch()){
														
													?>
													<tr>
														<td><?php  echo "$roll" ; ?> </td>
														<td><?php  echo "$name" ; ?> </td>
														<td><?php  echo "$year" ; ?> </td>
														<td><?php  echo "$section" ; ?> </td>
														<td><?php  echo "$major" ; ?> </td>
														<td><?php  echo "$phone" ; ?> </td>
														<td><?php  echo "$email" ; ?> </td>
														<td><?php  echo "$address" ; ?> </td>
														<td>
															<span data-toggle="modal" data-target="#editStudent<?php echo "$id" ?>" class="fa fa-edit btn btn-primary" ></span>
															<span data-toggle="modal" data-target="#deleteStudent<?php echo "$id" ?>" class="fa fa-trash btn btn-primary" ></span>
														</td>
													</tr>
													
													
													<!-- delete alert -->
													<div class="modal fade" id="deleteStudent<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
																	<a class="btn btn-primary" href="student_delete_process.php?id=<?php echo "$id" ?>">Delete</a>
																</div>
															</div>
														</div>
													</div>
													
													<!-- edit alert -->
													<div class="modal fade" id="editStudent<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
														<div class="modal-dialog" role="document">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="exampleModalLabel">Edit Studnt Information</h5>
																	<button class="close" type="button" data-dismiss="modal" aria-label="Close">
																		<span aria-hidden="true">×</span>
																	</button>
																</div>
																<div class="modal-body">
																	Select "Edit" if you want to edit.
																</div>
																<div class="modal-footer">
																	<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
																	<a class="btn btn-primary" href="student_edit_layout.php?id=<?php echo "$id" ?>&year=<?php echo "$year" ?>">Edit</a>
																</div>
															</div>
														</div>
													</div>
													
													<?php
													}
													$stmt->close();
												?>
											</tbody>
										</table>
									</div>
									<?php
									}
									//section
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