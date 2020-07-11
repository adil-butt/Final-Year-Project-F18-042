<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8">

<title>
Sale Form
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
		<p class="display-4 text-center"><b>Sale Form</b></p>
			
		<?php 
		
		if (isset($_GET['msg'])) {
			$msg=$_GET['msg'];
		?>
		<div class="form-group" style = "text-align: center">
					<?php echo $msg;
						?>
		</div>		
		<?php
		}
			
		?>
		
		<div class="row">
		<?php	
		include("../files/config.php");
		$qq="SELECT * FROM saleform order by id";
		$result=mysqli_query($conn,$qq);
		$count=mysqli_num_rows($result);
		if($count > 0) 
		{
			while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
				{
		?>
			<div class="col" style="margin-top:20px;">
			
				<div class="card" style="width: 30rem;">
			
					<div class="card-body">
						
						<b><p class="card-text"><?php echo $row['question'];?></p></b>
					</div>
					<ul class="list-group list-group-flush">
						<li class="list-group-item"><?php echo $row['option1'];?></li>
						<li class="list-group-item"><?php echo $row['option2'];?></li>
						<li class="list-group-item"><?php echo $row['option3'];?></li>
						<li class="list-group-item"><?php echo $row['option4'];?></li>
						<li class="list-group-item"><?php echo $row['option5'];?></li>
						<li class="list-group-item"><?php 
												echo '<a href="update-sale-form.php?id='.$row["id"].'"><button class="btn btn-outline-primary">Update</button></a>'; 
												//echo '<a href="delete-sale-question.php?id='.$row["id"].'"><button class="btn btn-outline-danger" style="margin-left:10px;">Delete</button></a>'; 
											?></td>
										</tr></li>
						</ul>
				</div>
			</div>
		<?php
			}
		} 
		?>
		</div>
		<!--<div class="alert alert-info"role="alert"style="margin-top:20px;text-align:center;">
		 Do you want to add another question? Click below
		</div>
		<a href="add-sale-question.php" ><button class="btn btn-outline-primary" style="width:200px;margin-left:450px;">Add Question</button></a>-->
	</div>	
	<?php 
	}
	else
	{
		header("Location:../home.php");
	} ?>
	<?php include("../files/footer.php"); ?>
	
</body>