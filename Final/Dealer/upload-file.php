<?php

include("../Files/config.php");

if (isset($_GET['id']) && isset($_GET['username'])){
	$id = $_GET['id'];
	$username = $_GET['username'];

	$abc="SELECT  * FROM dealeraccount where id = '$id' and username = '$username'";
			
	$result=mysqli_query($conn,$abc);

	$count = mysqli_num_rows($result);

	if($count == 0){
		$msg10 = "<div class='alert alert-danger' role='alert'>Dealer Not Found</div>";   //assign an error message
	}
}

else{
	$msg10 = "<div class='alert alert-warning' role='alert'>Oops! Page not found</div>";
}

?>


<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>
Upload File
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>


	<?php

	 
	session_start();
	if($_SESSION['dealer-credentials'])
	{	
	
	include("../files/dealer-header.php");
	
	?>
	
	<div class="container class-content">
	
		<?php
		if(!empty($msg10)){
			echo '<p class="display-4 text-center"><b>'.$msg10.'</b></p>';
		}
		else{?>
			
			<p class="display-4 text-center"><b>Upload File</b></p>
	
	<?php

	if(isset($_POST['submit'])) {    
		
		$file = $_FILES['file']['name']."-".rand(1000,100000)."-".date("d-m-Y");
		$file_loc = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$file_type = $_FILES['file']['type'];
		
		$folder="../Dealer/";
		
		if($file_type == 'text/plain'){
			
			move_uploaded_file($file_loc,$folder.$file);

			$linenumber = 1;
			$error = false;
			
			
			$file1 = fopen($file,'r'); // open file in read mode
			
			while(!feof($file1)) {	// performs etl operation and checks the error in file
				
				$content = fgets($file1);	// get the whole line of a file
				
				$count = substr_count($content,";"); //	count ; in a file	
				
				//echo "Iteration number".$a."<br>";
				//$a++;
				
				//echo $content."<br>";
				//echo $count."<br><br>";
				
				if($count == 6) {	// check the word in file
					
					$carry = explode(";",$content);	// separate a word with ; sign
					
					list($name,$number,$city,$address,$email,$type) = $carry;	// store each index into separate variable
					
					//echo $name." ".$number." ".$city." ".$address." ".$email." ".$type. "<br>";
					
					if(!preg_match('/^[a-zA-Z ]+$/',$name)) {?>
						<div class='form-group alert alert-warning' role='alert' style = 'text-align: center'>
						<?php	echo "Invalid format of name on line number ".$linenumber."<br>"; 	?>
						</div>
					<?php
						$error = true;
					}
					if(!preg_match('/^[0-9]+$/',$number)) {	?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid format of number on line number ".$linenumber."<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					elseif(strlen($number)!=11) { ?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid length of number on line number ".$linenumber."<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					if(!preg_match('/^[a-zA-Z ]+$/',$city)) {	?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid format of city on line number ".$linenumber."<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					if(!preg_match('/[^a-z_\-0-9]/i',$address)) {	?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid format of address on line number ".$linenumber."<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					if(!preg_match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',$email)) {	?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid format of email on line number ".$linenumber."<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					if($type != 'sale' && $type != "service") {	?>
						<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Invalid format of type on line number ".$linenumber."<br>Hint! Do not use capital letters in type field<br>";	?>
						</div>
					<?php
						$error = true;
					}
					
					
					/*if(preg_match('/^[a-zA-Z ]+$/',$name) && preg_match('/^[0-9]+$/',$number) && preg_match('/^[a-zA-Z ]+$/',$city) && preg_match('/[^a-z_\-0-9]/i',$address) && preg_match('^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^',$email)) {
						
						if(strlen($number)==11){	// check the length of phone number
					
							if($type4 == 'sale'){
								
							$sql="INSERT INTO salecustomerdata(name, phone, city, address, email) VALUES('$name', '$number', '$city', '$address', '$email')";
							
								if(mysqli_query($conn,$sql)) {
										
										//header("location: uploaded-successfully.php");
								}
								else {
										$msg = "<div class='alert alert-warning' role='alert'>Something Went Wrong</div>";
								}
							}
							elseif($type4 == 'service'){
								
							$sql="INSERT INTO servicecustomerdata(name, phone, city, address, email) VALUES('$name', '$number', '$city', '$address', '$email')";
							
								if(mysqli_query($conn,$sql)) {
										
										header("location: uploaded-successfully.php");
								}
								else {
										$msg = "<div class='alert alert-warning' role='alert'>Something Went Wrong</div>";
								}
							}
						
						}
						else {
							$msg2 = "<div class='alert alert-warning' role='alert'>Invalid Format of file<br>Please upload again with correct format</div>";   //assign an error message
						}
					}
					else {
						$msg2 = "<div class='alert alert-warning' role='alert'>Invalid Format of file<br>Please upload again with correct format</div>";   //assign an error message
					}
					*/
					
				}
				else { ?>
					<div class='form-group alert alert-warning' style = 'text-align: center'>
						<?php	echo "Missing semicolon or extra semi colon on line number ".$linenumber."<br>";	?>
					</div>
				<?php
					$error = true;
				}
				
				$linenumber++;
				
			}
			fclose($file1);
		}
		else{
			?>
				<div class='form-group alert alert-warning' style = 'text-align: center'>
					<?php	echo "Invalid file format <br>";	?>
				</div>
			<?php
			$error = true;
		}
		
		$error2 = false;
		
		if($error == true) { ?>
			<div class='form-group alert alert-secondary' style = 'text-align: center'>
					<?php	echo "Upload file again <br>";	?>
			</div>
		<?php
		}
		else{
			
			$dates = date("d/M/Y");
			
			$date = explode('/', $dates);
			
			$file1 = fopen($file,'r'); // open file in read mode
			
			while(!feof($file1)) {		//insert data into database
			
				$content = fgets($file1);	// get the whole line of a file
				
				$carry = explode(";",$content);	// separate a word with ; sign
				
				list($name,$number,$city,$address,$email,$type) = $carry;	// store each index into separate variable
				
				$sql="INSERT INTO customerdata(dealerid, dealername, name, phone, city, address, email, type, arrivingdate, arrivingday, arrivingmonth, arrivingyear,flag) VALUES('$id', '$username', '$name', '$number', '$city', '$address', '$email', '$type', '$dates', '$date[0]', '$date[1]', '$date[2]', 'false')";
						
				if(!mysqli_query($conn,$sql)) {
					$error2 = true;
					break;
				}
			}
			fclose($file1);
			if($error2 == true){
				$msg = "<div class='alert alert-warning' role='alert'>Something Went Wrong</div>";
			}
			else{
				header("location:uploaded-successfully.php?id=".$id."&username=".$username);
			}
		} 
		
				
	}
	?>

	
	<div class="form-group" style = "text-align: center">
		<?php if(!empty($msg)) echo $msg; ?>
	</div>
	
		<form method="POST" action="#" enctype="multipart/form-data">
			
			<div class="form-group">
				<label for="exampleFormControlFile1">Choose File:</label>
					
				
				<input type="file" class="form-control-file" name="file" id="exampleFormControlFile1" required>
			</div>	
			<div class="createaccountbutton">
				<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Upload</button>
			</div>

		</form>
			
		<?php
		}
		?>
	</div>
	<?php 
	}
	else
	{
		header("Location:../dealer-login.php");
	} ?>
	<?php include("../files/footer.php"); ?>
</body>
