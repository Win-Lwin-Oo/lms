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
			Year
		</li>
      </ol>
	  
	  <div class="row" style="background-color:lavenderblush;padding-bottom:10px;">
	  <div class="col-sm-6" >
	  <h2>Year</h2>
 <p><small>There are <?php	
	$count_sql = "select count(*) from year";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->bind_result($count);
	while($stmt1->fetch()){
	echo "$count";
	}
	$stmt1->close(); 
	?>  year/s in <strong>UCSMGY</strong></small></p>            
  </div>
  
  <div class="col-sm-6" >
  <form action="year_process.php" method="post" >
  
  <h3>Add year</h3>
  
			<div class="input-group">
		
		<input  id="name" type="text" name="year" placeHolder="Enter Year" required class="form-control">
		<button type="submit" class="btn btn-info" style="float:right;width:70px;margin-left:2px;">Add</button>
		</div>
		</form>
		</div>
		</div>
  <div class="table-responsive">
  <table class="table table-bordered table-striped table-hover" style="margin-top:10px;">
    <thead>
      <tr>
        <th>Year</th>
        <th>Section</th>
        <th>Action</th>
      </tr>
    </thead>
	
    <tbody>
	<?php

	$select_sql = "SELECT year.year_id,year.name from year";
	$stmt = $conn->prepare($select_sql);
	$stmt->execute();
	$stmt->bind_result($id,$year);
	$yearArray = array();
	while($stmt->fetch()){
		array_push($yearArray, $year);
	}
	$stmt->close();
	
	foreach($yearArray as $yearName){
		
	$select_count = "select count(*) from section,year where year.year_id = section.year_id and year.name = '$yearName'";
	$stmt = $conn->prepare($select_count);
	$stmt->execute();
	$stmt->bind_result($count);
	
	while($stmt->fetch()){
		$count = $count;
	}
	$stmt->close();
	?>
      <tr>
        <td><?php  echo "$yearName" ; ?> </td>
        <td>Sections <span class="badge badge-info"><?php  echo "$count" ; ?> </span></td>
        <td>
      <span data-toggle="modal" data-target="#editYear<?php echo "$yearName" ?>" class="fa fa-edit btn btn-primary" ></span>
      <span data-toggle="modal" data-target="#deleteYear<?php echo "$yearName" ?>" class="fa fa-trash btn btn-primary" ></span>
	</td>
      </tr>
	  
	   <!-- delete alert -->
	  <div class="modal fade" id="deleteYear<?php echo "$yearName" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="year_delete.php?year=<?php echo "$yearName"; ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- edit alert -->
	  <div class="modal fade" id="editYear<?php echo "$yearName" ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit year</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  <form action="year_edit_process.php" method="post" >
			<div class="form-group">
		<input  id="name" type="text" name="eYear" value="<?php echo $yearName ;?>" required class="form-control">
		<input type="hidden" name="year" value="<?php echo $yearName ;?>">
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