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
			Manage Teacher
		</li>
      </ol>
	  
	  <div class="row" style="background-color:lavenderblush;padding-bottom:10px;">
	  <div class="col-sm-6" >
	  <h2>Manage Teacher</h2>
   <p><small>There are <?php	
	$count_sql = "select count(*) from teacher";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->bind_result($count);
	while($stmt1->fetch()){
	echo "$count";
	}
	$stmt1->close(); 
	?>  teacher/s in <strong>UCSMGY</strong></small></p>  
  </div>
  
  <div class="col-sm-6" >
  <form action="#" method="post" >
  
  <h3>Search Teacher</h3>
  
			<div class="input-group">
		
		<input  id="name" type="text" name="name" placeHolder="Enter Teacher name" required class="form-control">
		<button type="submit" class="btn btn-info" style="float:right;width:70px;margin-left:2px;">Search</button>
		</div>
		</form>
		</div>
		</div>
  <br>
  <div id="accordin" style="margin-bottom:20px;margin-top:20px;">
  
  <?php
	$select_department = "select department.name from department";
	$stmt = $conn->prepare($select_department);
	$stmt->execute();
	$stmt->bind_result($dept);
	$deptArray = array();
	while($stmt->fetch()){	
		array_push($deptArray, $dept);
	}
	$stmt->close();
	
	foreach($deptArray as $dept){
		
	?>
	<div class="card" style="margin-bottom:10px;">
	<div class="card-header">
	
	  <a class="card-link" data-toggle="collapse" href="#<?php echo $dept;?>">
		<h5 style="color:#000000"> <?php echo $dept;?> </h5>
		</a>
	</div>
	<div id="<?php echo $dept;?>" class="collapse" data-parent="#accordin">
	
	<div class="table-responsive" >
  <table class="table table-bordered table-striped table-hover ">
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Duty</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php
	$select_teacher = "select teacher.teacher_id,teacher.name,teacher.phone,teacher.email,teacher.address,teacher.gender from teacher,department where  teacher.department_id = department.department_id and department.name = '$dept' ORDER BY teacher_id DESC";
	$stmt = $conn->prepare($select_teacher);
	$stmt->execute();
	$stmt->bind_result($id,$name,$phone,$email,$address,$gender);
	
	while($stmt->fetch()){
		
	?>
      <tr>
        <td><?php  echo "$name" ; ?> </td>
        <td><?php  echo "$phone" ; ?> </td>
        <td><?php  echo "$email" ; ?> </td>
        <td><?php  echo "$address" ; ?> </td>
        <td><a href="teacher_allocate_layout.php?id=<?php echo "$id" ?>&ss=s&yy=y">Duty</a></td>
        <td>
      <span  data-toggle="modal" data-target="#editTeacher<?php echo "$id" ?>" class="fa fa-edit btn btn-primary" ></span>
      <span data-toggle="modal" data-target="#deleteTeacher<?php echo "$id" ?>" class="fa fa-trash btn btn-primary" ></span>
	</td>
      </tr>
	  
	  <!-- delete alert -->
	  <div class="modal fade" id="deleteTeacher<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="teacher_delete.php?id=<?php echo "$id" ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- edit alert -->
	<div class="modal fade" id="editTeacher<?php echo "$id" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Teacher Information</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
			  <form action="teacher_edit_process.php" method="post" class="student_register_form" >

				<br>
			
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Name </label><br>
				<input type="text" name="name" value="<?php echo $name; ?>" required class="form-control">
				</div>
				
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Phone </label><br>
				<input type="number" name="phone" value="<?php echo $phone; ?>" required class="form-control">
				</div>
				
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Email </label><br>
				<input type="email" name="email" value="<?php echo $email; ?>" required class="form-control">
				</div>
				
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Current Address </label><br>
				<input type="text" name="address" value="<?php echo $address; ?>" required class="form-control">
				</div>
				
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Department </label><br>
				<select name="department" required class="form-control">
				<option value="" selected disabled hidden>Choose Department.....</option>
				<?php
				
				
					foreach($deptArray as $dept1){
				?>
				<option <?php if($dept == $dept1){ echo "selected"; }?> value="<?php echo "$dept1";?>"><?php echo "$dept1";?></option>
				<?php
						}
				?>
				</select>
				</div> 
				
				<div class="form-group">
				<label style="text-align:left;text-style:bold;font-size:20px;">Gender </label><br>
				<input type="radio" <?php if ($gender == "Male") echo "checked"; ?> name="gender" value="Male" style="width:20px;height:20px;margin-top:10px;" required ><label style="font-size:20px;margin-left:10px">Male</label>
				<input type="radio" <?php if ($gender == "Female") echo "checked"; ?> name="gender" value="Female" style="width:20px;height:20px;margin-top:10px;margin-left:20px" required><label style="font-size:20px;margin-left:10px">Female</label>
				
				</div>
				<input type="hidden" name="id" value = "<?php echo $id; ?>" >
				<input type="submit" value="OK"  class="btn btn-primary">
			<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            
			
			</form>
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
</div>
</div>

<?php
		}
		$conn->close();
	  ?>
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