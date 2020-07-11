<?php

	ob_start();

	include("../Files/config.php");

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Dashboard Report
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
    
    // Load the Visualization API and the piechart package.
    google.charts.load('current', {'packages':['corechart']});
      
    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawSaleChart);

	google.charts.setOnLoadCallback(drawServiceChart);
      
    function drawSaleChart() {
		var data = google.visualization.arrayToDataTable([
			['Dealer','Rating'],
			<?php

					$check = 0;

					if(isset($_POST['citysubmit'])){
						
							$city = $_POST['citysubmit'];

							$sql="SELECT  id,username FROM dealeraccount WHERE city = '".$city."'";
									
							$result=mysqli_query($conn,$sql);

							$counts = mysqli_num_rows($result);

							if($counts == 0){
								$check = 1;
							}

					}

					elseif(isset($_POST['areasubmit'])){
						$area = $_POST['areasubmit'];

						$sql="SELECT  id,username FROM dealeraccount WHERE area = '".$area."'";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}

						if(!$result){
							$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
						}
					}

					elseif(isset($_POST['clearcity'])){
						$sql="SELECT  id,username FROM dealeraccount";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}
					}

					else{
						$sql="SELECT  id,username FROM dealeraccount";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}
					}

					if(!$result){
						$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
					}

					if($check == 1){
						echo "[No Dealer,-1],";
					}
					else{
						while($row=mysqli_fetch_array($result)){

							$check = 0;
	
							$count = 0;
							
							$total = 0;
	
							$sql2="SELECT  * FROM customerdata where `dealerid`='$row[id]'";
			
							$result2=mysqli_query($conn,$sql2);

							if(!$result2){
								$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
							}
	
							$countss = mysqli_num_rows($result2);
	
							if($countss == 0){
								$check = 1;
							}
							else{
								while($row2=mysqli_fetch_array($result2)){
									$sql3="SELECT  * FROM saleresponse where `customerid`='$row2[id]'";
				
									$result3=mysqli_query($conn,$sql3);
		
									if(!$result3){
										$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
									}
		
									while($row3=mysqli_fetch_array($result3)){
										$count = $count + $row3['answer'];
										$total++;
									}
								}
								$mean = $count/$total;	
							}
	
							if($check == 1){
								echo "['".$row["username"]."',-1],";
							}
							else{
								echo "['".$row["username"]."',".$mean."],";
							}
	
						}
					}
			?>
		]);
		var options = {
			title: 'Sale Report',
			width:1100,
            height:500
		};
		var chart = new google.visualization.BarChart(document.getElementById('salechartdiv'));
		chart.draw(data, options);
	}

	function drawServiceChart() {
		var data = google.visualization.arrayToDataTable([
			['Dealer','Rating'],
			<?php

					$check = 0;

					$city;

					if(isset($_POST['submit'])){
							$city = $_POST['citysubmit'];

							$sql="SELECT  id,username FROM dealeraccount WHERE city = '".$city."'";
									
							$result=mysqli_query($conn,$sql);

							$counts = mysqli_num_rows($result);

							if($counts == 0){
								$check = 1;
							}
					}

					elseif(isset($_POST['submit'])){
						$area = $_POST['areasubmit'];

						$sql="SELECT  id,username FROM dealeraccount WHERE area = '".$area."'";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}

						if(!$result){
							$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
						}
					}

					elseif(isset($_POST['clearcity'])){
						$sql="SELECT  id,username FROM dealeraccount";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}
					}

					else{
						$sql="SELECT  id,username FROM dealeraccount";
								
						$result=mysqli_query($conn,$sql);

						$counts = mysqli_num_rows($result);

						if($counts == 0){
							$check = 1;
						}
					}

					if(!$result){
						$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
					}

					if($check == 1){
						echo "[No Dealer,-1],";
					}
					else{
						while($row=mysqli_fetch_array($result)){

							$check = 0;
	
							$count = 0;
							
							$total = 0;
	
							$sql2="SELECT  id FROM customerdata where `dealerid`='$row[id]'";
			
							$result2=mysqli_query($conn,$sql2);
	
							if(!$result2){
								$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
							}

							$countss = mysqli_num_rows($result2);
	
							if($countss == 0){
								$check = 1;
							}
							else{
								while($row2=mysqli_fetch_array($result2)){
									$sql3="SELECT  * FROM serviceresponse where `customerid`='$row2[id]'";
				
									$result3=mysqli_query($conn,$sql3);
		
									if(!$result3){
										$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
									}
		
									while($row3=mysqli_fetch_array($result3)){
										$count = $count + $row3['answer1'] + $row3['answer2'] + $row3['answer3'] + $row3['answer4'] + $row3['answer5'] + $row3['answer6'] + $row3['answer7'] + $row3['answer8'] + $row3['answer9'] + $row3['answer10'];
										$total+=10;
									}
								}
								$mean = $count/$total;
							}
	
							if($check == 1){
								echo "['".$row["username"]."',-1],";
							}
							else{
								echo "['".$row["username"]."',".$mean."],";
							}
						}
					}
			?>
		]);
		var options = {
			title: 'Service Report',
			width:1100,
            height:500
		};
		var chart = new google.visualization.BarChart(document.getElementById('servicechartdiv'));
		chart.draw(data, options);
	}

    </script>

</head>

<body>

	<?php include("../files/header.php"); ?>

	<?php
	session_start();
	if($_SESSION['manager-credentials'])
	{	?>
	<div class="container class-content">
	<p class="display-4 text-center"><b>Dashboard Report</b></p>

	<?php
		if(!empty($msg)){
			echo '<p class="display-4 text-center"><b>'.$msg.'</b></p>';
		}

		else{?>

			<div>
			<p>Select City to Drill Down:</p>
			<?php
				$sql="SELECT DISTINCT city FROM dealeraccount";
							
				$result=mysqli_query($conn,$sql);
				?>

				<form method="POST" action="#" enctype="multipart/form-data">				
				<?php
				while($row=mysqli_fetch_array($result)){ 
				?>
					<button type="submit" name="citysubmit" value=<?php echo $row['city']; ?> class="button btn-outline-primary"><?php echo $row['city']; ?></button>
				<?php
				}
				?>
				<button type="submit" name="clearcity" value="submit" class="button btn-outline-primary">Clear</button>
				</form>
				
				<?php
				if(isset($_POST['citysubmit'])){

						$city = $_POST['citysubmit'];
						?>
						<p>Select Area to Drill Down:</p>
						<?php
						$sql2="SELECT DISTINCT area FROM dealeraccount WHERE city = '".$city."'";
									
						$result2=mysqli_query($conn,$sql2);
						?>	
	
						<form method="POST" action="#" enctype="multipart/form-data">		
						<?php
						while($row2=mysqli_fetch_array($result2)){ 
						?>
							<button type="submit" name="areasubmit" value=<?php echo $row2['area']; ?> class="button btn-outline-primary"><?php echo $row2['area']; ?></button>
						<?php
						}
						?>
						</form>
					<?php
				}
				?>
			</div>


			<table class="columns">
      			<tr>
        			<td><div id="salechartdiv" style="border: 1px solid #ccc"></div></td>
        		</tr>
				<tr>
        			<td><div id="servicechartdiv" style="border: 1px solid #ccc"></div></td>
      			</tr>
    		</table>
			
		<?php
		}
	?>
		
	</div>
	<?php
	}
	else
	{
		header("Location:../home.php");
	} ?>
	<?php include("../files/footer.php"); ?>
</body>