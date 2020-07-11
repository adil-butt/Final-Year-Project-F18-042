<?php
	include("../Files/config.php");
	if(isset($_POST['firstname']))
	{
		$fname=$_POST['firstname'];
		$lname=$_POST['lastname'];
		$number=$_POST['number'];
		$cnic=$_POST['cnic'];
		$cityname=$_POST['cityname'];
		$area=$_POST['area'];
		$username=$_POST['username'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$p="INSERT INTO dealeraccount (username,firstname,lastname, phone, cnic, city, area, email, password)values
		('".$username."','".$fname."','".$lname."','".$number."','".$cnic."','".$cityname."','".$area."','".$email."','".$password."')";
		
		$result=mysqli_query($conn,$p);
		
		if($result) {
			header("location: account-created.php");
		}
		/*elseif(mysqli_errno($conn) === 1062) {
			$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div><div class='alert alert-secondary' role='alert'>Enter record again</div>";   //assign an error message
			//$msg.= mysqli_error($conn);
			//echo 'adilislambutt';
			//echo "Error". $p . "<br>" . mysqli_error($conn);
		}*/
		else {
			//$msg2 = "<div class='alert alert-danger' role='alert'>Oops something went wrong!</div>";   //assign an error message
			$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";  //assign an error message
		}
	}
	
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Create Account
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
		<p class="display-4 text-center"><b>Create Account</b></p>
		<form method="POST" action="#" enctype="multipart/form-data">
			
			
			<div class="form-group" style = "text-align: center">
					<?php if(!empty($msg)) echo $msg;
							elseif(!empty($msg2)) echo $msg2;?>
			</div>
		
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone#</label>
				<div class="col-sm-10">
					<input type="number" min="99999999999" max="999999999999" class="form-control" name="number" placeholder="Format: +923123456789" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">CNIC#</label>
				<div class="col-sm-10">
					<input type="number" min="999999999999" max="9999999999999" class="form-control" name="cnic" placeholder="Without Dashes" required>
				</div>
			</div>
				
			<div class="form-group row">
				
				<label class="col-sm-2 col-form-label">City</label>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Lahore" required>
						Lahore
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Rawalpindi">
						Rawalpindi
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Multan">
						Multan
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Faisalabad">
						Faisalabad
					</label>
				</div>
				
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="area" placeholder="Enter Area" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">User Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" placeholder="Enter User Name" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter Email">
				</div>
			</div>
    
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" pattern=".{5,12}" class="form-control" id="inputPassword" placeholder="Min Length: 5	Max Length: 12">
				</div>
			</div>
			
				
			<div class="createaccountbutton">
				<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Create</button>
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
