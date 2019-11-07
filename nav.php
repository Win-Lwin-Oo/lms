<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/nav-style.css"/>
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css"/>
</head>
<body>

<div class="header">
	<table>
			<tr>
				<td><img src="img/ucsmgy_logo.png" width="150px" height="165px"/></td>
				<td><p class="lms-header">University Of Computer Studies Magway<br>
				<span style="font-size:16px;"> Learning Management System</span></p>
				 </td>
			<tr>
	</table>
  
</div>

<div class="sticky">
<div class="topnav" id="myTopnav">
	<span class="nav-title" id="nav-title">Learning Management System</span>
  <a id="home" href="index.php">Home</a>
<a id="notice_board" href="notice_board.php">Notice Board</a>
  <a id="calendar" href="academic.php">Acemadic Calendar</a>
  <a id="event" href="event.php">Event</a>
  <a id="blog" href="blog.php">Blog</a>
 
  <a id="login" href="login.php?error=e" class="float-right">Login</a>
  <a id="about" href="about.php" class="float-right">About</a>
  
  <a href="javascript:void(0);" class="icon" onclick="myFunction()" style="color:white;z-index:25;">
    <i class="fa fa-bars" ></i>
  </a>
</div>
</div>
<script>
function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
        x.className += " responsive";
		x.className += " click-nav";
		document.getElementById("nav-title").style.display="none";
		
    } else {
        x.className = "topnav";
		document.getElementById("nav-title").style.display="block";
		document.getElementById("nav-title").style.padding="14px";
		
    }
	
}
</script>

</body>
</html>

