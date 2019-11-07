<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/login_design.css">
</head>
<body>
<?php
include_once('nav.php');
$error = $_GET['error'];

session_start();
unset($_SESSION['USER_ID']);
unset($_SESSION['ROLE']);
?>
<script>
	document.getElementById("login").className+=" active";
</script>

<form action="login_process.php" method="post">
			<h1>User Login </h1>
			<p style="font-style:bold;color:#d50000;margin:auto;text-align:center;<?php if($error == "error") {?>display:block;<?php }else{?>display:none;<?php } ?>">Incorrect User Name and Password  !!!</p> 
			<input type="text" name="user_name" placeholder="Username"  required>
			<input type="password" name="password" placeholder="Password"  required>
			<button type="submit">Login</button>
		</form>

<?php
include_once('footer.php');

?>

</body>
</html>