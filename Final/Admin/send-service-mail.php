

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8">

<title>
Send Form
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
		<p class="display-4 text-center"><b>Form Send Successfully</b></p>
	
	
	<?php
		include("../Files/config.php");
	
		$qq="SELECT id,email FROM customerdata where type = 'service' and flag = 'false'";

		$result=mysqli_query($conn,$qq);

		if($result) {
			while($row=mysqli_fetch_array($result)) {
				$id = $row['id'];
				$id2 = "?id=".$row['id'];
				//the subject
				$sub = "HELLO Check Mail";
				//the message
				$msg = "http://localhost/final/form/service-response.php".$id2;
				//recipient email here
				$rec = $row['email'];
				//send email
				mail($rec,$sub,$msg);
			
			}
		//session_start();
				
		//$_SESSION['customer-credentials']='customer';

		}
	}
	else
	{
		header("Location:../home.php");
	} ?>
	
	</div>
	<?php include("../files/footer.php"); ?>
	
</body>
