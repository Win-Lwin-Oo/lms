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
			Majors
		</li>
      </ol>
	  
<div class="row" style="background-color:lavenderblush;padding-bottom:10px;">
		<div class="col-sm-6" >
		<form action="major_process.php" method="post" >
			<div class="form-group">
		<label for="name">Choose Year</label><br>
		<select name="year" required class="form-control">
		<option value="" selected disabled hidden>Choose year.....</option>
		<?php
		
		$select_sql = "select year_id,name from year";
		$stmt = $conn->prepare($select_sql);
		$stmt->execute();
		$stmt->bind_result($year_id,$name);
	
	while($stmt->fetch()){
		?>
		<option value="<?php echo "$year_id";?>"><?php echo "$name";?></option>
		<?php
			}
			$stmt->close();
		?>
		</select>
		</div>
		</div>

		<div class="col-sm-6" >
		<div class="form-group">
		<label for="name">Add Major </label><br>
		<input   type="text" name="major" class="form-control" placeHolder="Enter major name" required >
		</div>
		<button type="submit" class="btn btn-info" style="float:right;width:70px;margin-left:2px;">Add</button>
		</form>
		</div>
</div>

<h2>Majors</h2>
  <p><small>There are <?php	
	$count_sql = "select count(name) from major Group by name";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->store_result();
	$count = $stmt1->num_rows;
	
	echo $count ;
	$stmt1->close();
	?>  in <strong>UCSMGY</strong></small></p>
	
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
	
    <div class="table-responsive" style="box-shadow: 2px 2px 5px 1px rgba(0,0,0,0.2);padding:20px;margin-bottom:20px;">
	<h3> <?php echo $year; ?> </h3>
  <table class="table table-bordered table-striped table-hover" style="margin-top:10px;">
    <thead>
      <tr>
        <th>Major</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	
	<?php
	$select_major = "select major.name from major,year where year.name = '$year' and year.year_id = major.year_id";
	$stmt = $conn->prepare($select_major);
	$stmt->execute();
	$stmt->bind_result($major);
	while($stmt->fetch()){	
	
	?>
      <tr>
        <td><?php  echo "$major" ; ?> </td>
        <td>
		<span data-toggle="modal" data-target="#editMajor<?php echo $year.$major ?>" class="fa fa-edit btn btn-primary" ></span> 
		<span data-toggle="modal" data-target="#deleteMajor<?php echo $year.$major ?>" class="fa fa-trash btn btn-primary" ></span>
	</td>
      </tr>
	  
	   <!-- delete alert -->
	  <div class="modal fade" id="deleteMajor<?php echo $year.$major ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="major_delete_process.php?year=<?php echo $year; ?>&major=<?php echo $major; ?>">Delete</a>
          </div>
        </div>
      </div>
    </div>
	
	<!-- edit alert -->
	  <div class="modal fade" id="editMajor<?php echo $year.$major ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Major</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
		  
		  <form action="major_edit_process.php" method="post" >
			<div class="form-group">
				<input  id="name" type="text" name="eMajor" value="<?php echo $major ;?>" required class="form-control">
				<input type="hidden" name="major" value="<?php echo $major ;?>">
				<input type="hidden" name="year" value="<?php echo $year ;?>">
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
  
  <?php
		}
		$conn->close();
	 ?>

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