<?php
include('../authorise.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>LMS</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-nav fixed-top" id="mainNav">
    <a class="navbar-brand" style="color:#ffffff">LMS</a>
    <button  class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    
		<i style="color:white" class="fa fa-navicon"></i>
	
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive" >
      <ul class="navbar-nav navbar-style navbar-sidenav" id="exampleAccordion" style="overflow-y: auto;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="admin_dashboard.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-dashboard"></i>
            <span style="color:#ffffff;" class="nav-link-text" >Dashboard</span>
          </a>
        </li>
		
      			<li class="nav-item " data-toggle="tooltip" data-placement="right" title="admin">
          <a class="nav-link" href="admin_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Administrator</span>
          </a>
        </li>
		
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTeacher" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Teachers </span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseTeacher">
			<li>
              <a style="color:#ffffff;" href="teacher_create_layout.php">Create teachers</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="teacher_manage_layout.php">Manage teachers</a>
            </li>
		  </ul>
		</li>
		
	    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseStudent" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Students</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseStudent">
		    <li>
              <a style="color:#ffffff;" href="student_create_layout.php?name=a">Create students</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="student_manage_layout.php">Manage students</a>
            </li>
          </ul>
        </li>
		
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBook" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">IT Book</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBook">
            <li>
              <a style="color:#ffffff;" href="#">Upload IT Book</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="#">Manage IT Book</a>
            </li>
		  </ul>
		</li>
		
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePhoto" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Slide Photo</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapsePhoto">
            <li>
              <a style="color:#ffffff;" href="upload_photo_layout.php">Upload New Photo</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="managesubject.html">Edit Photo</a>
            </li>
		  </ul>
		</li>
		
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseEvent" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Event</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseEvent">
            <li>
              <a style="color:#ffffff;" href="#">Create Event</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="#">Manage Event</a>
            </li>
		  </ul>
		</li>
		
		 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseBlog" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Blog</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseBlog">
            <li>
              <a style="color:#ffffff;" href="#">Create Blog</a>
            </li>
            <li>
              <a style="color:#ffffff;" href="#">Manage Blog</a>
            </li>
		  </ul>
		</li>
		
<li class="nav-item" data-toggle="tooltip" data-placement="right" title="majorManagement">
          <a class="nav-link" href="department_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Departments</span>
          </a>
        </li>
      
		<li class="nav-item" data-toggle="tooltip" data-placement="right" title="majorManagement">
          <a class="nav-link" href="year_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Years</span>
          </a>
        </li>
		
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="majorManagement">
          <a class="nav-link" href="section_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Sections</span>
          </a>
        </li>
		
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="majorManagement">
          <a class="nav-link" href="majors_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Majors</span>
          </a>
        </li>
		
			<li class="nav-item" data-toggle="tooltip" data-placement="right" title="majorManagement">
          <a class="nav-link" href="subjects_layout.php">
            <i style="color:#ffffff;" class="fa fa-fw fa-wrench"></i>
            <span style="color:#ffffff;" class="nav-link-text">Subjects</span>
          </a>
        </li>
		
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i style="color:#ffffff;" class="fa fa-fw fa-file"></i>
            <span style="color:#ffffff;" class="nav-link-text">Tutorial</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a style="color:#ffffff;" href="Example.html">Create Tutorial</a>
            </li>
            <li>
               <a style="color:#ffffff;" href="Example.html">Edit Tutorial</a>
            </li>
          </ul>
        </li>
        
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i style="color:#ffffff;" class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">
	  
 
        <li class="nav-item">
          <a style="color:#ffffff;" class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  
      <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../login.php?error=e">Logout</a>
          </div>
        </div>
      </div>
    </div>
  
  <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>

</body>

</html>