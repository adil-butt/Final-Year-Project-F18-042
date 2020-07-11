
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Admin Section
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	
	<?php include("../files/header1.php"); ?>
	<?php 
	session_start();
	if($_SESSION['admin-credentials'])
	{	?>
		<div class="container class-content">
		<p class="display-4 text-center"><b>Dashboard</b></p> 
		<div class="list-group">
		<a href="create-account.php" class="list list-group-item list-group-item-action list-group-item-secondary">Create Account</a>
		<a href="view-all-dealer.php" class="list list-group-item list-group-item-action list-group-item-secondary">View All Dealers</a>
		<a href="view-customer.php" class="list list-group-item list-group-item-action list-group-item-secondary">View All Customers</a>
		<!--<a href="create-form.php" class="list list-group-item list-group-item-action list-group-item-secondary">Create Form</a>-->
   		<a href="view-form.php" class="list list-group-item list-group-item-action list-group-item-secondary">View Forms</a>
		<a href="send-sale-mail.php" class="list list-group-item list-group-item-action list-group-item-secondary">Send Sale Form</a>
		<a href="send-service-mail.php" class="list list-group-item list-group-item-action list-group-item-secondary">Send Service Form</a>
     </div>

	</div>
	<?php 
	}
	else
	{
		header("Location:../home.php");
	} ?>
	<?php include("../files/footer.php"); ?>
</body>