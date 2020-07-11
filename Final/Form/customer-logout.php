<?php
session_start();

	unset($_SESSION['customer-credentials']);
	session_destroy($_SESSION['customer-credentials']);
	header("Location:successfully-submit-response.php");

?>