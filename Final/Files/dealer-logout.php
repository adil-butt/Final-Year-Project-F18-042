<?php
session_start();

	unset($_SESSION['dealer-credentials']);
	session_destroy($_SESSION['dealer-credentials']);
	header("Location:..\dealer-login.php");

?>