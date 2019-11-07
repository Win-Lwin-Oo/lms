<?php 
	include('student_nav.php');
	require_once('../connection.php');
	
	$given_mark = $_GET['given_mark'];
	$score = $_GET['score'];
	
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

	<form class="student_register_form" action="tutorial_result.php">
		<h2> Your Result </h2>
		
		<label>Given Marks = <?php echo "$given_mark"; ?> </label><br>
		<label>Received Marks = <?php echo "$score"; ?> </label><br>
		
		<input class="btn btn-success" type="submit" value="OK">
	</form>
	
		</div>
	</div>
</body>
</html>