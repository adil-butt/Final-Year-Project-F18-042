<?php

	ob_start();

	include("../Files/config.php");

?>


<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Trend Report
</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../styles.css">			
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        	['Date','Performance'],

			<?php

					$type = $_POST['optradio'];

					
						$count = 0;
						
						$total = 0;

						if($type == "monthwise"){
							$sql2="SELECT  * FROM customerdata ORDER BY arrivingmonth ASC";
						}
						else{
							$sql2="SELECT  * FROM customerdata WHERE arrivingyear = '2019'";
						}
		
						$result2=mysqli_query($conn,$sql2);

						if(!$result2){
							$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
						}
						
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
							$mean = $count/$total;
							if($type == "monthwise"){
								echo "['".$row2['arrivingmonth']."',".$mean."],";	
							}
							else{
								echo "['".$row2['arrivingyear']."',".$mean."],";
								//echo "[".$y2.",".$mean."],";

							}
						}
						$y = "2019";
						$y2 = "2020";
					
			?>
			
        ]);

        var options = {
          title: "Company's Performance",
          curveType: 'function',
          legend: { position: 'bottom' }
        };

        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

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
		<p class="display-4 text-center"><b>Trend Report</b></p> 

		<form method="POST" action="#" enctype="multipart/form-data">
			<div class="text-center">
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="optradio" value="monthwise" required/>
						Month Wise
					</label>
				</div>
					
				<div class="form-check form-check-inline">
					<label class="form-check-label">
						<input class="form-check-input" type="radio" name="optradio" value="yearwise">
						Year Wise
					</label>
				</div>
			</div>
			<div class="createaccountbutton">
				<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">View Trend</button>
			</div>
		</form>

		<?php

		if(isset($_POST['submit'])){
		?>
			<div id="curve_chart" style="width: 900px; height: 500px"></div>
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
