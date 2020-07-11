
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Manager
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php include("../files/header1.php"); ?>
	<?php 
	session_start();
	if($_SESSION['manager-credentials'])
	{	?>
	<div class="container class-content">
		<p class="display-4 text-center"><b>Dashboard</b></p> 
		<div class="list-group">

			<a href="dashboard-report.php" class="list list-group-item list-group-item-action list-group-item-secondary">Dashboard Report</a>
			<a href="view-all-dealer.php" class="list list-group-item list-group-item-action list-group-item-secondary">View All Dealers</a>
			<a href="trend-report.php" class="list list-group-item list-group-item-action list-group-item-secondary">Trend Report</a>
			<a href="benchmark-report.php" class="list list-group-item list-group-item-action list-group-item-secondary">Benchmark Comparison Report</a>
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
