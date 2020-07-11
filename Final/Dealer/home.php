
<?php
	
	include("../Files/config.php");

	if (isset($_GET['id']) && isset($_GET['username'])){
		$id = $_GET['id'];
		$username = $_GET['username'];

		$abc="SELECT  * FROM dealeraccount where id = '$id' and username = '$username'";
			
		$result=mysqli_query($conn,$abc);

		$count = mysqli_num_rows($result);

		if($count == 0){
			$msg = "<div class='alert alert-danger' role='alert'>Dealer Not Found</div>";   //assign an error message
		}
	}
	else{
		$msg = "<div class='alert alert-warning' role='alert'>Oops! Page not found</div>";
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Dealer
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php include("../files/dealer-header1.php"); ?>
	<?php 
	session_start();
	if($_SESSION['dealer-credentials']){	
	?>
	<div class="container class-content">
	
	<?php
		if(!empty($msg)){
			echo '<p class="display-4 text-center"><b>'.$msg.'</b></p>';
		} 
		else{?>
			<p class="display-4 text-center"><b>Dashboard</b></p> 
			<div class="list-group">
				<?php
				echo '<a href="upload-file.php?id='.$id.'&username='.$username.'" class="list list-group-item list-group-item-action list-group-item-secondary">Upload File</a>';
				echo '<a href="ranking-report.php?id='.$id.'&username='.$username.'" class="list list-group-item list-group-item-action list-group-item-secondary">View Report</a>';
				?>
			</div>
		<?php
		}
	?>

  </div>
  <?php 
	}
	else
	{
		header("Location:../dealer-login.php");
	} ?>
  <?php include("../files/footer.php"); ?>
</body>