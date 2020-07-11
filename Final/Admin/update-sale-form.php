<?php

include("../files/config.php");
if (isset($_GET['id'])) {
	$id=$_GET['id'];
	
	$qq="SELECT * FROM saleform where id='".$id."'";
	$result=mysqli_query($conn,$qq);
	$count=mysqli_num_rows($result);
	if($count > 0) 
	{
		while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
		{
			$q1=$row['question'];
			$op1=$row['option1'];
			$op2=$row['option2'];
			$op3=$row['option3'];
			$op4=$row['option4'];
			$op5=$row['option5'];
		}
	}

	if($_POST)
	{
		$question=$_POST['question'];
		$option1=$_POST['q1c1'];
		$option2=$_POST['q1c2'];
		$option3=$_POST['q1c3'];
		$option4=$_POST['q1c4'];
		$option5=$_POST['q1c5'];	
	
		$s1 = "UPDATE saleform SET question='".$question."',option1='".$option1."',option2='".$option2."',option3='".$option3."',
		option4='".$option4."',option5='".$option5."' where id='".$id."'";
	
		if (mysqli_query($conn, $s1))
		{
			header("location:sale-form.php");
		} 
		else 
		{
			$msg = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
		}
	}
}
else {
	$q1='';
	$op1='';
	$op2='';
	$op3='';
	$op4='';
	$op5='';
}
								

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>
Update Form
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
		<p class="display-4 text-center"><b>Update Form</b></p>
		<form method="POST" action="#" enctype="multipart/form-data">
			
				<div class="form-group row">
					<?php if(!empty($msg)) echo $msg; ?>
				</div>

				<div class="form-group row">
						<label class="col-sm-2 col-form-label">Question </label>
						<div class="col-sm-10">
							<input type="text" class="form-control" placeholder="Enter Question" name="question" value = "<?php echo $q1 ?>" required>
						</div>
				</div>
					
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Choices</label>
					<div class="col-sm-10">
						<input type="text"  name="q1c1" placeholder="1st choice" value = "<?php echo $op1 ?>" required>
						<input type="text"  name="q1c2" placeholder="2nd choice" value = "<?php echo $op2 ?>" required>
						<input type="text"  name="q1c3" placeholder="3rd choice" value = "<?php echo $op3 ?>" required>
						<input type="text"  name="q1c4" placeholder="4th choice" value = "<?php echo $op4 ?>" required>
						<input type="text"  name="q1c5" placeholder="5th choice" value = "<?php echo $op5 ?>" required>
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
