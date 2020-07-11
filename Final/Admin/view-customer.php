<?php
	include("../files/config.php");

	if (isset($_GET['id'])){
		
		$id = $_GET['id'];

		$qq="SELECT id,dealername,name,phone,email,type FROM customerdata where dealerid = '".$id."'";
	}
	else{
		$qq="SELECT id,dealername,name,phone,email,type FROM customerdata";
	}

	$result=mysqli_query($conn,$qq);
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>

<title>
View Customer
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
		<p class="display-4 text-center"><b>View Customers</b></p>
		
		<div>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">ID</th>
						<th scope="col">Dealer Name</th>
						<th scope="col">Customer Name</th>
						<th scope="col">Phone</th>
						<th scope="col">Email</th>
						<th scope="col">Type</th>
						<th scope="col"></th>
					</tr>
				</thead>
				
				<?php	
								
								if($result) {
									while($row=mysqli_fetch_array($result)) {
									?>
										<tbody>
										<tr>
											<td><?php echo $row['id'];?></td>
											<td><?php echo $row['dealername'];?></td>
											<td><?php echo $row['name'];?></td>
											<td><?php echo $row['phone'];?></td>
											<td><?php echo $row['email'];?></td>
											<td><?php echo $row['type'];?></td>
											<td>
											<?php 
												echo '<a href="customer-detail.php?id='.$row["id"].'"><button class="btn btn-outline-primary" >View Detail</button></a>'; 
											
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

