<?php
		session_start();
		
		$_SESSION['customer-credentials']='customer';
		header("location:sale-response.php");
		exit();
			
?>