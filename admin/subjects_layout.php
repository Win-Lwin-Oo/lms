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
			Subjects
		</li>
      </ol>
	  
	 <div class="row">
		<div class="col-sm-4" style="background-color:lavenderblush;padding-bottom:10px;">
		<form action="subject_create_process.php" method="post" >
			<div class="form-group">
		<label for="name">Choose year</label><br>
		<select name="year" required class="form-control">
		<option value="" selected disabled hidden>Choose year.....</option>
		<?php
		
		$select_sql = "select year_id, name from year";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$stmt->bind_result($year_id,$year);
	
	while($stmt->fetch()){
		?>
		<option value="<?php echo "$year_id";?>"><?php echo "$year";?></option>
		<?php
			}
			$stmt->close();
		?>
		</select>
		</div>

		</div>
		
		<div class="col-sm-4" style="background-color:lavenderblush">

			<div class="form-group">
			<label for="subject_code">Add Subject Code</label><br>
					
			  <input type="text" class="form-control" placeholder="Enter Subject Code" name="subject_code" required>
			</div>
			
		</div>
		
		<div class="col-sm-4" style="background-color:lavenderblush">

			<div class="form-group">
			<label for="name">Add Subject Name </label><br>
					
			  <input type="text" class="form-control" placeholder="Enter Subject Name" name="subject_name" required>
			</div>
			<button type="submit" class="btn btn-info" style="float:right;width:70px;">Add</button>
		</form>
		</div>
</div>

  <h2>Subject</h2>
  <p><small>There are 
  <?php
	$count_sql = "select count(*) from subject";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->bind_result($count);
	while($stmt1->fetch()){
	echo "$count";
	}
	$stmt1->close(); 
	?> 
	subject/s in <strong>UCSMGY</strong></small></p> 
	
  <div id="accordin" style="margin-bottom:20px;margin-top:20px;">
	<?php
	$select_year = "select year.name from year";
	$stmt = $conn->prepare($select_year);
	$stmt->execute();
	$stmt->bind_result($year);
	$yearArray = array();
	while($stmt->fetch()){	
		array_push($yearArray, $year);
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
	
	<div class="table-responsive" >
	
  <table class="table table-bordered table-striped table-hover" style="margin-top:10px;">
    <thead>
      <tr>
        <th>Subject</th>
        <th>Code</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	<?php

	$select_subject = "select subject.subject_id,subject.code,subject.subject_name from subject,year where year.name = '$year' and year.year_id = subject.year_id";
	$stmt = $conn->prepare($select_subject);
	$stmt->execute();
	$stmt->bind_result($subject_id,$code,$subject_name);
	
	while($stmt->fetch()){
		
	?>
	<tr>
        <td><?php  echo "$subject_name" ; ?></td>
        <td><?php  echo "$code" ; ?> </td>
        <td>
      <span data-toggle="modal" data-target="#editSubject<?php echo $subject_id ?>" class="fa fa-edit btn btn-primary" ></span>
      <span data-toggle="modal" data-target="#deleteSubject<?php echo $subject_id ?>" class="fa fa-trash btn btn-primary" ></span>
	
	</td>
      </tr>
	  
	    <!-- delete alert -->
	  <div class="modal fade" id="deleteSubject<?php echo $subject_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="subject_delete_process.php?id=<?php echo "$subject_id" ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- edit alert -->
	  <div class="modal fade" id="editSubject<?php echo $subject_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Subject</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  <form action="subject_edit_process.php" method="post" >
			<div class="form-group">
				<label>Subject Code</label>
				<input  id="name" type="text" name="eCode" value="<?php echo $code ;?>" required class="form-control">
				<br>
				<label>Subject Name</label>
				<input  id="name" type="text" name="name" value="<?php echo $subject_name ;?>" required class="form-control">
				<input type="hidden" name="year" value="<?php echo $year ;?>">
				<input type="hidden" name="code" value="<?php echo $code ;?>">
				</div>
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
				<button type="submit" class="btn btn-info" style="float:right;width:70px;">Edit</button>
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