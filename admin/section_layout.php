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
			Section
		</li>
      </ol>
	  
<div class="row">
		<div class="col-sm-6" style="background-color:lavenderblush;padding-bottom:10px;">
		<form action="section_process.php" method="post" >
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
		
		<div class="col-sm-6" style="background-color:lavenderblush">

			<div class="form-group">
			<label for="name">Add Section </label><br>
      <input type="text" class="form-control" placeholder="Enter Section Name" name="section" required>
    </div>
	<button type="submit" class="btn btn-info" style="float:right;width:70px;">Add</button>
		</form>
		</div>
</div>
	  
  <h2>Section</h2>
  <p><small>There are 
  <?php
	$count_sql = "select count(*) from section";
	$stmt1 = $conn->prepare($count_sql);
	$stmt1->execute();
	$stmt1->bind_result($count);
	while($stmt1->fetch()){
	echo "$count";
	}
	$stmt1->close(); 
	?> 
	sections in <strong>UCSMGY</strong></small></p> 
	<div id="accordin" style="margin-bottom:20px;">
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
	
	<div class="table-responsive">
	<table class="table table-bordered table-striped table-hover">
    <thead>
      <tr>
        <th>Section</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
	
	<?php 
	$select_section = "select section.section_id, section.section from section,year where year.name = '$year' and section.year_id = year.year_id";
	$stmt = $conn->prepare($select_section);
	$stmt->execute();
	$stmt->bind_result($section_id,$section_name);
	while($stmt->fetch()){
	?>
      <tr>
		
        <td><?php echo "$section_name" ; ?> </td>
        <td>
		<span data-toggle="modal" data-target="#deleteSection<?php echo $section_id ?>" class="fa fa-trash btn btn-primary" ></span>
	</td>
      </tr>
	  
	   <!-- delete alert -->
	  <div class="modal fade" id="deleteSection<?php echo $section_id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
            <a class="btn btn-primary" href="section_delete.php?id=<?php echo "$section_id" ?>" >Delete</a>
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