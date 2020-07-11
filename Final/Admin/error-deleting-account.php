<?php
	if($_GET){
        $msg = $_GET['msg']; // print_r($_GET);       
    }else {
      $message = "<div class='alert alert-danger' role='alert'>Oops something went wrong!</div>";   //assign an error message
    }
?>


<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8">
<title>
Error Deleting Account
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
		<p class="display-4 text-center">
			<?php 
				if(!empty($msg)) {
					echo $msg;
				}
				elseif(!empty($message)) {
					echo $message;
				}
			?>
		</p>
		
		<div style="text-align: center">
			<form method="POST" action="#">
				<a href="view-all-dealer.php" class="btn btn-outline-primary">Return to View All Dealers</a>
				<a href="home.php" class="btn btn-outline-primary">Return to Dashboard</a>
			</form>
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

