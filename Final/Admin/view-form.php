
<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
View Form
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php include("../files/header.php"); ?>
	<?php 
	session_start();
	if($_SESSION['admin-credentials'])
	{	?>	
	<div class="container class-content">
		<p class="display-4 text-center"><b>Choose Form Type</b></p> 
		<div class="list-group">

			<a href="sale-form.php" class="list list-group-item list-group-item-action list-group-item-secondary">Sale</a>
			<a href="service-form.php" class="list list-group-item list-group-item-action list-group-item-secondary">Service</a>
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

