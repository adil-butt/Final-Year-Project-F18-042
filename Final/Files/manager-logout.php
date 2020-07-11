<?php
session_start();

	unset($_SESSION['manager-credentials']);
	session_destroy($_SESSION['manager-credentials']);
	header("Location:..\home.php");

?>
