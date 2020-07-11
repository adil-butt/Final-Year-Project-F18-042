<?php
	include("../files/config.php");
	$qq="SELECT id,firstname,lastname,email FROM dealeraccount";
	
	$result=mysqli_query($conn,$qq);
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
View Dealer
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

	<?php include("../files/header.php"); ?>
	<?php 
	session_start();
	if($_SESSION['admin-credentials']) {	
	?>
	<div class="container class-content">
		<p class="display-4 text-center"><b>View All Dealers</b></p>
		
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">First Name</th>
						<th scope="col">Last Name</th>
						<th scope="col">Email</th>
						<th scope="col"></th>
					</tr>
				</thead>
				
				<?php	
								
								if($result) {
									while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
									?>
										<tbody>
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['firstname'];?></td>
											<td><?php echo $row['lastname'];?></td>
											<td><?php echo $row['email'];?></td>
											<td>
											<?php 
												echo '<a href="dealer-detail.php?id='.$row["id"].'"><button class="btn btn-outline-primary" >View Detail</button></a>'; 
											?></td>
											<td>
											<?php 
												echo '<a href="view-customer.php?id='.$row["id"].'"><button class="btn btn-outline-primary" >View Customer</button></a>';
											?></td>
										</tr>
										</tbody>
									<?php
									}
								//} 
							
								}
								else {
									?>
									<tbody>
										<tr>
											<td><?php echo mysqli_error($conn); ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td>
											<?php 
												echo '<a href="dealer-detail.php?id='.$row["id"].'"><button class="btn btn-outline-primary" >View Detail</button></a>'; 
											
											?></td>
										</tr>
										</tbody>
								<?php
								}
								?>
			</table>
		</div>
		
	</div>
	<?php 
	}
	else {
		header("Location:../home.php");
	} ?>
	<?php include("../files/footer.php"); ?>
</body>

