<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
Customer Detail
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

	<?php	
		include("../files/config.php");
		
		if (isset($_GET['id'])){
		
			$id = $_GET['id'];
			$qq="SELECT  * FROM customerdata WHERE `id`='$id'";
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
		<p class="display-4 text-center">Customer Detail</p>
		
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
				  <label><b>Customer Name:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['name'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>Dealer ID:</b></label>
		
				  <li class="list-group-item"><?php echo $row['dealerid'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>Dealer Name:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['dealername'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>Phone#:</b></label>
		
				  <li class="list-group-item"><?php echo $row['phone'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>Email:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['email'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
				  <label><b>City:</b></label>
		
				  <li class="list-group-item"><?php echo $row['city'];?></li>
				  
				</div>
				
				<div class="form-group col-md-6">
				  <label><b>Address:</b></label>
				  
				  <li class="list-group-item"><?php echo $row['address'];?></li>
				  
				</div>
			</div>
			
			<div class="form-row">
				<div class="form-group col-md-6">
					<label><b>Type:</b></label>
					
					<li class="list-group-item"><?php echo $row['type'];?></li>
				
				</div>
				
				<div class="form-group col-md-6">
					<label><b>Arriving Date:</b></label>
					
					<li class="list-group-item"><?php echo $row['arrivingdate'];?></</li>
				
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

