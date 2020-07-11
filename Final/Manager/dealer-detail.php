<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
Dealer Detail
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
	<?php include("../files/header.php"); ?>
<?php 
	session_start();
	if($_SESSION['manager-credentials']){
	?>

	<?php	
		include("../files/config.php");
		
		if (isset($_GET['id'])){
		
			$id = $_GET['id'];
			$qq="SELECT  * FROM dealeraccount WHERE `id`='$id'";
			$result=mysqli_query($conn,$qq);
			if($result) {
				$row=mysqli_fetch_array($result);
			}
			else {
				$message = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
				$row = 0;
			}
				
		}
		else {
			$row = 0;
		}
		
		
									
	?>
	
	<div class="container class-content">
		<p class="display-4 text-center">Dealer Detail</p>
		
		<div class="form-group" style = "text-align: center">
				<?php if(!empty($message)) echo $message;
				?>
		</div>

		<form>	
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>ID:</b></label>
		
				  <li class="list-group-item"><?php echo $row['id'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>User Name:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['username'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>First Name:</b></label>
		
				  <li class="list-group-item"><?php echo $row['firstname'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>Last Name:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['lastname'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>Phone#:</b></label>
		
				  <li class="list-group-item"><?php echo $row['phone'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>CNIC#:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['cnic'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>City:</b></label>
		
				  <li class="list-group-item"><?php echo $row['city'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>Area:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['area'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
					<label><b>Email:</b></label>
					
					<li class="list-group-item"><?php echo $row['email'];?></li>
				
				</div>
				
				<div class="form-group col-md-6">
					<label><b>Password:</b></label>
					
					<li class="list-group-item"><?php echo $row['password'];?></</li>
				
				</div>
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

