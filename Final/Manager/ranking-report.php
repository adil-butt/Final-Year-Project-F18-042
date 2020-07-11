<?php

	ob_start();

	include("../Files/config.php");

	if (!isset($_GET['id'])){
		$msg = "<div class='alert alert-danger' role='alert'>Page Not Found</div>";   //assign an error message
	}
	else{
		$dealerid = $_GET['id'];

		$sql="SELECT  * FROM dealeraccount where `id`='$dealerid'";
							
		$result=mysqli_query($conn,$sql);

		$count = mysqli_num_rows($result);

		if($count == 0){
			$msg = "<div class='alert alert-danger' role='alert'>Dealer Not Found</div>";   //assign an error message
		}
	}

?>

<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Ranking Report
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
    google.charts.setOnLoadCallback(dealerSaleChart);

	google.charts.setOnLoadCallback(dealerServiceChart);
      
    function dealerSaleChart() {
		var data = google.visualization.arrayToDataTable([
			['Dealer','Rating'],
			<?php		
						$count1 = 0;
						$count2 = 0;
						$count3 = 0;
						$count4 = 0;
						
						$total1 = 0;
						$total2 = 0;
						$total3 = 0;
						$total4 = 0;

						$sql2="SELECT  id FROM customerdata where `dealerid`='$dealerid'";
		
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

							$counts = 0;

							while($row3=mysqli_fetch_array($result3)){
								$counts++;
								if($counts >= 1 && $counts <=4){
									$count1 = $count1 + $row3['answer'];
									$total1++;
								}
								elseif($counts ==5){
									$count2 = $count2 + $row3['answer'];
									$total2++;
								}
								elseif($counts >= 6 && $counts <=7){
									$count3 = $count3 + $row3['answer'];
									$total3++;
								}
								else{
									$count4 = $count4 + $row3['answer'];
									$total4++;	
								}
							}
						}
						$mean1 = $count1/$total1;
						$mean2 = $count2/$total2;
						$mean3 = $count3/$total3;
						$mean4 = $count4/$total4;

						echo "['"."Dealer Performance"."',".$mean1."],";
						echo "['"."Company Staff"."',".$mean2."],";
						echo "['"."Organization Culture"."',".$mean3."],";
						echo "['"."Customer Satisfaction"."',".$mean4."],";
			?>
		]);

		var options = {
			title: 'Sale Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('salechartdiv'));
		chart.draw(data, options);
	}

	function dealerServiceChart() {
		var data = google.visualization.arrayToDataTable([
			['Dealer','Rating'],
			<?php		
						$count1 = 0;
						$count2 = 0;
						$count3 = 0;
						$count4 = 0;
						
						$total1 = 0;
						$total2 = 0;
						$total3 = 0;
						$total4 = 0;

						$sql2="SELECT  id FROM customerdata where `dealerid`='$dealerid'";
		
						$result2=mysqli_query($conn,$sql2);

						if(!$result2){
							$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
						}

						while($row2=mysqli_fetch_array($result2)){
							$sql3="SELECT  * FROM serviceresponse where `customerid`='$row2[id]'";
		
							$result3=mysqli_query($conn,$sql3);

							if(!$result3){
								$msg = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
							}

							$row3=mysqli_fetch_array($result3);

							
							$count1 = $count4 + $row3['answer1'] + $row3['answer2'] + $row3['answer3'];

							$total1 = $total1 + 3;

							$count2 = $count4 + $row3['answer4'] + $row3['answer5'];

							$total2 = $total2 + 2;

							$count3 = $count4 + $row3['answer6'] + $row3['answer7'];

							$total3 = $total3 + 2;

							$count4 = $count4 + $row3['answer8']+ $row3['answer9']+ $row3['answer10'];
								
							$total4 = $total4 +3;
							
						}
						$mean1 = $count1/$total1;
						$mean2 = $count2/$total2;
						$mean3 = $count3/$total3;
						$mean4 = $count4/$total4;

						echo "['"."Dealer Performance"."',".$mean1."],";
						echo "['"."Support Staff"."',".$mean2."],";
						echo "['"."Organization Culture"."',".$mean3."],";
						echo "['"."Customer Satisfaction"."',".$mean4."],";
			?>
		]);
		var options = {
			title: 'Service Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('servicechartdiv'));
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
	<p class="display-4 text-center"><b>Dealer Report</b></p>

	<?php
		if(!empty($msg)){
			echo '<p class="display-4 text-center"><b>'.$msg.'</b></p>';
		}

		else{?>

			<?php
				$sql="SELECT  username FROM dealeraccount where `id`='$dealerid'";
							
				$result=mysqli_query($conn,$sql);

				$row=mysqli_fetch_array($result);
			?>

			<p class="display-4 text-center"><b>User Name: <?php echo $row['username']; ?></b></p>

			<table class="columns">
      			<tr>
        			<td><div id="salechartdiv" style="border: 1px solid #ccc"></div></td>
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