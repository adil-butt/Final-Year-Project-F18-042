<?php
//session_start();

// check if user login previously
/*
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true)
{
    header("location: Admin/admin.php");
    exit;
}
*/

include("Files/config.php");


if(isset($_POST['submit']))
{	
	$username_email = $_POST['username/email'];	
	$password = $_POST['password'];
	$type = $_POST['optradio'];
	$_SESSION['username/email']=$username_email;
	
	$sql = "select * from accountlogin where username = '".$username_email."' and password = '".$password."' and type = '".$type."'";	// for username
	$sql2 = "select * from accountlogin where email = '".$username_email."' and password = '".$password."' and type = '".$type."'";		// for email
	
	$result = mysqli_query($conn,$sql);		// for username
	$result2 = mysqli_query($conn,$sql2);	// for email
	
	$count = mysqli_num_rows($result);
	$count2 = mysqli_num_rows($result2);
	
	if($count >= 1 || $count2 >= 1){
		
       if($type=="admin"){
		   
			session_start();
			
		    $_SESSION['admin-credentials']=$username_email;
			header("location:Admin/home.php");
			exit();
		}
		else if($type=="manager"){
			
			session_start();
			
			$_SESSION['manager-credentials']=$username_email;
			header("location:manager/home.php");
			exit();
		}
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
					<h2 class="text-center">Login</h2>       
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
						<button type="submit" name="submit" value="yes" class="btn btn-outline-primary btn-primary btn-block">Log in</button>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="optradio" value="admin" required/>
							Admin
						</label>
					</div>
					
					<div class="form-check form-check-inline">
						<label class="form-check-label">
							<input class="form-check-input" type="radio" name="optradio" value="manager">
							Manager
						</label>
					</div>
				</form>
			</div>
		</div>
</body>
                                		                            