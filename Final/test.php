<?php
global $fname2;
if(isset($_POST['firstname'])){
	$fname=$_POST['firstname'];
	$fname2=$_POST['firstname2'];
}
else{
	$fname2 = "";
}
//if(isset($fname)){
//	$fname2=$fname;
//}
	
	//echo $fname;
	echo $fname2;
	
?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
TEST
</title>


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">					
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
	
	<div class="container class-content">
		<p class="display-4 text-center"><b>Sample Test</b></p>
		<form method="POST" action="#" enctype="multipart/form-data">
			
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="firstname" placeholder="Enter First Name" required>
				</div>
			</div>
			<?php	
			if(isset($_POST['firstname']))
			{
			?>
				
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">First Name</label>
				<div class="col-sm-10">
					<input type="text" class="form-control" name="firstname2" placeholder="Enter First Name" required>
				</div>
			</div>

			<?php
			}
			?>
				
				
		</form>
	
	</div>
</body>
