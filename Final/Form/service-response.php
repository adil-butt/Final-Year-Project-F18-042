<?php
	
	ob_start();
	
	include("../Files/config.php");
	
	if (isset($_GET['id'])){
		
		$id = $_GET['id'];
		
		$customerexist = "SELECT * FROM customerdata where id = '".$id."'";
		
		$customerexistresult = mysqli_query($conn,$customerexist);
		
		$customerexistcount = mysqli_num_rows($customerexistresult);
		
		if($customerexistcount > 0){
			
			$checktype=mysqli_fetch_array($customerexistresult);
			
			if($checktype['type'] == 'service'){
				
				$check = "SELECT * FROM serviceresponse where customerid = '".$id."'";
		
				$checkresult = mysqli_query($conn,$check);
				
				$countresult = mysqli_num_rows($checkresult);
				
				$qq="SELECT * FROM serviceform";
			
				$result = mysqli_query($conn,$qq);
				
				if(!$result) {
					$msg2 = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
				}
			}
			else{
				$msg = "<div class='alert alert-warning' role='alert'>Sorry! you do not have the permission to fill the service form</div>";
			}
		
		}
		else{
			$msg = "<div class='alert alert-warning' role='alert'>Customer not exist</div>";
		}
		
	}
	else{
		$msg = "<div class='alert alert-warning' role='alert'>Oops! Page not found</div>";
	}
	

?>
<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Customer Response
</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	
	
	<div class="container class-content" style="margin-top: 100px">
	<?php
	
	if(!empty($msg)){
		echo '<p class="display-4 text-center"><b>'.$msg.'</b></p>';
	}
	else{
	?>
		<p class="display-4 text-center" style="margin-bottom: 100px"><b>Customer Response</b></p>
		
		<div class="form-group" style = "text-align: center">
			<?php if(!empty($msg2)) echo $msg2; ?>
		</div>
				<form method="POST" action="#" enctype="multipart/form-data" style = "margin-bottom: 100px;	">
						
						<?php
						$i = 0;
						while($row=mysqli_fetch_array($result)){
						$i++;
						$q[$i] = $row['question'];
						?>
							<div class="form-group">
					
								<label class="col-form-label"><?php echo $row['question'] ?></label>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="<?php echo $i ?>" value="100" required>
										<?php echo $row['option1'] ?>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="<?php echo $i ?>" value= "75">
										<?php echo $row['option2'] ?>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="<?php echo $i ?>" value="50">
										<?php echo $row['option3'] ?>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="<?php echo $i ?>" value="25">
										<?php echo $row['option4'] ?>
									</label>
								</div>
								<div class="form-check">
									<label class="form-check-label">
										<input class="form-check-input" type="radio" name="<?php echo $i ?>" value="0">
										<?php echo $row['option5'] ?>
									</label>
								</div>
							</div>
						<?php
						}
						?>
						<div class="createaccountbutton">
							<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Submit</button>
						</div>
					
				</form>
				
				<?php
					if(isset($_POST['submit'])) {
						
						if($countresult == 0){
							for($j = 1; $j <= $i; $j++){
								$answer[$j] = $_POST[$j];							
			
							}
							$p="INSERT INTO serviceresponse (customerid,answer1,answer2,answer3,answer4,answer5,answer6,answer7,answer8,answer9,answer10) values ('".$id."','".$answer[1]."','".$answer[2]."','".$answer[3]."','".$answer[4]."','".$answer[5]."','".$answer[6]."','".$answer[7]."','".$answer[8]."','".$answer[9]."','".$answer[10]."')";
							if(mysqli_query($conn,$p)){
								$pqr="UPDATE customerdata SET flag = 'true' where `id`='$id'";
										
								$results = mysqli_query($conn,$pqr);

								if(!results){
									$b = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
									echo $b;
								}
								header("Location:successfully-submit-response.php");
								//ob_end_flush();
							}
							else{
								$a = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
								echo $a;
							}
						}
						else{
							header("Location: already-submit-response.php");
						}
						
					}
	}
	?>
	</div>
	
</body>