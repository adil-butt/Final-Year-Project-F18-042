<?php
	include("../Files/config.php");
	if(isset($_POST['question']))
	{
		$question =$_POST['question'];
		$choice1 =$_POST['q1c1'];
		$choice2 =$_POST['q1c2'];
		$choice3 =$_POST['q1c3'];
		$choice4 =$_POST['q1c4'];
		
		//$type =$_POST['formtype'];
			$p="INSERT INTO serviceform (question,option1,option2, option3, option4)values
			('".$question."','".$choice1."','".$choice2."','".$choice3."','".$choice4."')";
		
			if(mysqli_query($conn,$p))
			{
				$msg = "<div class='alert alert-success' role='alert'>Sucessfully Added New Question In Service Form</div>";
			}
			else
			{
				$msg = "<div class='alert alert-success' role='alert'>".mysqli_error($conn)."</div>";
            }
		
	}
	else {
		$msg = "<div class='alert alert-success' role='alert'>Oops Something went wrong!</div>";
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Add Question
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
	<p class="display-4 text-center"><b>Add Question in Form</b></p>
	<form method="POST" action="#" enctype="multipart/form-data">
	
				<div class="form-group row">
						<label class="col-sm-2 col-form-label">Question</label>
						<div class="col-sm-10">
							<input type="text" name="question" class="form-control" placeholder="Enter Question" name="q1" required>
						</div>
				</div>
					
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Choices</label>
					<div class="col-sm-10">
						<input type="text"  name="q1c1" placeholder="1st choice" required>
						<input type="text"  name="q1c2" placeholder="2nd choice" required>
						<input type="text"  name="q1c3" placeholder="3rd choice" required>
						<input type="text"  name="q1c4" placeholder="4th choice" required>
					</div>
				</div>
				<div class="form-group" style = "text-align: center">
						<?php if(!empty($msg)) echo $msg; ?>
					</div>
				
				
				<div class="createaccountbutton">
                <button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Add</button>
				</div>
				
			</form>
</div>
<?php 
	}
	else
	{
		header("Location:../home.php");
	} ?>
<?php include("../files/footer.php"); ?>
</body>

