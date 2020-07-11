<?php
session_start();

// check if user login previously
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: Admin/admin.php");
    exit;
}
*/

include("Files/config.php");


if(isset($_POST['username/email']))
{	
	$username_email = $_POST['username/email'];	
	$password = $_POST['password'];
		
	
	$sql = "select `id`, `username`, `password` FROM `dealeraccount` where username = '".$username_email."' and password = '".$password."'";	// for username
	$sql2 = "select `id`, `username`, `email`, `password` FROM `dealeraccount` where email = '".$username_email."' and password = '".$password."'";		// for email
	
	$result = mysqli_query($conn,$sql);		// for username
	$result2 = mysqli_query($conn,$sql2);	// for email
	
	
	$count = mysqli_num_rows($result);
	$count2 = mysqli_num_rows($result2);
	
	if($count == 1 || $count2 == 1){
		if($count == 1){
			$row=mysqli_fetch_array($result);
			$id = $row['id'];
			$username = $row['username'];
		}
		else{
			$row=mysqli_fetch_array($result2);
			$id = $row['id'];
			$username = $row['username'];
		}
		
		$_SESSION['dealer-credentials']= $username_email;	
		header("location:dealer/home.php?id=".$id."&username=".$username);
	}
	else {
		$msg = "<div class='alert alert-warning' role='alert'>Invalid Login Credentials</div>";   //assign an error message
		//echo "<script>alert('Invalid login details');</script>";
	}
	
	
}

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>Login</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
        <div class="container class-content-login">
			<p class="display-4 text-center"><b>Welcome to Login</b></p> 
			<div class="login-form">
       
				<form action="#" method="post">
					<h2 class="text-center">Log in</h2>       
					<div class="form-group">
						<input type="text" name="username/email" class="form-control" placeholder="User Name or Email" required="required">
					</div>
					<div class="form-group">
						<input type="password" name="password" class="form-control" placeholder="Password" required="required">
					</div>
					<div class="form-group" style = "text-align: center">
						<?php if(!empty($msg)) echo $msg; ?>
					</div>
					<div class="form-group">
						<button type="submit" name="yes" value="yes" class="btn btn-outline-primary btn-primary btn-block">Log in</button>
					</div>
				</form>
			</div>
		</div>
</body>
                                		                            