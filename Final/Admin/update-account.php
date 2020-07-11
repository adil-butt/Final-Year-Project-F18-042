<?php


	include("../files/config.php");

	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		
		$qq="SELECT * FROM dealeraccount where id='".$id."'";
		$result=mysqli_query($conn,$qq);
		$count=mysqli_num_rows($result);

		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$name1=$row['username'];
			$fname1=$row['firstname'];
			$lname1=$row['lastname'];
			$phone1=$row['phone'];
			$cnic1=$row['cnic'];
			$city1=$row['city'];
			$area1=$row['area'];
			$email1=$row['email'];
			$password1=$row['password'];
		}

		if($_POST)
		{
			$username=$_POST['username'];
			$fname=$_POST['firstname'];
			$lname=$_POST['lastname'];
			$number=$_POST['number'];
			$cnic=$_POST['cnic'];
			$cityname=$_POST['cityname'];
			$area=$_POST['area'];
			$email=$_POST['email'];
			$password=$_POST['password'];	
		
			$s1 = "UPDATE dealeraccount SET username='".$username."',firstname='".$fname."',lastname='".$lname."',phone='".$number."',cnic='".$cnic."',
			city='".$cityname."',area='".$area."',email='".$email."',password='".$password."'where id='".$id."'";
			
			$result=mysqli_query($conn,$s1);
			
			if ($result)
			{
				header("location:account-updated.php");
			} 
			else 
			{
				$msg = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
			}
		}	
		
	}
	else {
		$name1='';
		$fname1='';
		$lname1='';
		$phone1='';
		$cnic1='';
		$city1='';
		$area1='';
		$email1='';
		$password1='';
	}

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Update Account
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
		<p class="display-4 text-center"><b>Update Account</b></p>
		<form method="POST" action="#">
		
			<div class="form-group" style = "text-align: center">
					<?php if(!empty($msg)) echo $msg; ?>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">User Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="username" placeholder="Enter User Name" value="<?php echo $name1;?>" required>
				</div>
			</div>
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" value="<?php echo $fname1;?>" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Last Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="lastname" placeholder="Enter Last Name" value="<?php echo $lname1;?>" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Phone#</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" name="number" placeholder="Enter Phone Number" value="<?php echo $phone1;?>" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">CNIC#</label>
				<div class="col-sm-10">
					<input type="tel" class="form-control" name="cnic" placeholder="Enter CNIC Number" value="<?php echo $cnic1;?>" required>
				</div>
			</div>
				
			<div class="form-group row">
				
				<label class="col-sm-2 col-form-label">City</label>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Lahore" <?php if($city1=='Lahore'){echo 'checked';}?>>
						Lahore
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Rawalpindi" <?php if($city1=='Rawalpindi'){echo 'checked';}?>>
						Rawalpindi
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Multan" <?php if($city1=='Multan'){echo 'checked';}?>>
						Multan
					</label>
				</div>
				
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="cityname" value="Faisalabad" <?php if($city1=='Faisalabad'){echo 'checked';}?>>
						Faisalabad
					</label>
				</div>
				
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Area</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="area" placeholder="Enter Address" value="<?php echo $area1;?>" required>
				</div>
			</div>
				
			<div class="form-group row">
				<label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
				<div class="col-sm-10">
					<input type="email" name="email" class="form-control" id="inputEmail" placeholder="Enter Email" value="<?php echo $email1;?>" >
				</div>
			</div>
    
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
				<div class="col-sm-10">
					<input type="password" name="password" class="form-control" id="inputPassword" placeholder="Enter Password" value="<?php echo $password1;?>" >
				</div>
			</div>
				
			<div class="createaccountbutton">
				<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Update</button>
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
