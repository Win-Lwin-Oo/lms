<?php
session_start();
	if(!isset($_SESSION['USER_ID']) || (trim($_SESSION['USER_ID']) == '')) {
		header("location:../");
		exit();
	}
?>