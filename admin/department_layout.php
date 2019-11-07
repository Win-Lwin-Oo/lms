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
			Department
		</li>
      </ol>

	  <div class="row">
	  <div class="col-sm-6" style="background-color:lavenderblush;padding-bottom:10px;">
	  
	  <h2>Departments</h2>
  <p><small>There are <?php
	
	
	$count_sql = "select count(*) from department";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->bind_result($count);
	while($stmt1->fetch()){
	echo "$count";
	}
	$stmt1->close();
	?>
	departments in <strong>UCSMGY</strong></small></p>    
	</div>

		<div class="col-sm-6" style="background-color:lavenderblush;padding-bottom:10px;">
		<form action="department_create_process.php" method="post" >
			<div class="form-group">
		<label for="name">Add Department</label><br>
		<input  id="name" type="text" name="department" placeHolder="Enter Department name" required class="form-control">
		</div>
		<button type="submit" class="btn btn-info" style="float:right;width:70px;">Add</button>
		</form>
		</div>
		
	  </div>
	  
	  

  <div class="table-responsive">	
  <table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Department Name</th>
        <th>Member</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php

		 
	$select_sql = "select * from department ORDER BY department_id DESC";
	$stmt = $conn->prepare($select_sql);
	$stmt->execute();
	$stmt->bind_result($dep_id,$department);
	$deptArray = array();
	while($stmt->fetch()){
		array_push($deptArray, $department);
		}
	$stmt->close();
	
	foreach($deptArray as $dept){
		
	$select_count = "select count(*) from Teacher,Department where Teacher.department_id = Department.department_id and Department.name = '$dept'";
	$stmt = $conn->prepare($select_count);
	$stmt->execute();
	$stmt->bind_result($count);
	
	while($stmt->fetch()){
		$count = $count;
	}
	$stmt->close();
	?>
	
	<tr>
        <td><?php  echo "$dept" ; ?> </td>
        <td>Members <span class="badge badge-info"><?php echo "$count"; ?></span></td>
        <td>
      <span data-toggle="modal" data-target="#editDepartment<?php echo "$dept" ?>" class="fa fa-edit btn btn-primary" ></span>
      <span data-toggle="modal" data-target="#deleteDepartment<?php echo "$dept" ?>" class="fa fa-trash btn btn-primary" ></span>
	</td>
      </tr>
	  
	  <!--dit alrt-->
	  <!-- delete alert -->
	  <div class="modal fade" id="editDepartment<?php echo "$dept" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit department</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  <form action="department_edit_process.php" method="post" >
			<div class="form-group">
		<input  id="name" type="text" name="department" value="<?php echo $dept ;?>" required class="form-control">
		<input type="hidden" name="dept" value="<?php echo $dept ;?>">
		</div>
		<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
		<button type="submit" class="btn btn-info" style="float:right;width:70px;">Edit</button>
		</form>
		  
		  </div>
        </div>
      </div>
    </div>
	  
	  <!-- delete alert -->
	  <div class="modal fade" id="deleteDepartment<?php echo "$dept" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="department_delete_process.php?id=<?php echo "$dept" ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<?php
	
	}
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