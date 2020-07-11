<?php
	ob_start();
	include("../Files/config.php");
	if(isset($_POST['dealer1']) && isset($_POST['dealer2'])){
		$dealer1 = $_POST['dealer1'];
		$dealer2 = $_POST['dealer2'];

		$sql="SELECT  * FROM dealeraccount where `id`='$dealer1'";
		//$sql2="SELECT  * FROM dealeraccount where `username`='$dealer1'";
		$sql3="SELECT  * FROM dealeraccount where `id`='$dealer2'";
		//$sql4="SELECT  * FROM dealeraccount where `username`='$dealer2'";
							
		$result=mysqli_query($conn,$sql);
		//$result2=mysqli_query($conn,$sql2);
		$result3=mysqli_query($conn,$sql3);
		//$result4=mysqli_query($conn,$sql4);

		if($result){
			$count = mysqli_num_rows($result);
		}
		else{
			$message = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
		}

		/*if($result2){
			$count2 = mysqli_num_rows($result2);
		}
		else{
			$message = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
		}*/

		if($result3){
			$count3 = mysqli_num_rows($result3);
		}
		else{
			$message = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
		}

		/*if($result4){
			$count4 = mysqli_num_rows($result4);
		}
		else{
			$message = "<div class='alert alert-warning' role='alert'>".mysqli_error($conn)."</div>";
		}*/


		if($count == 0 && /*$count2 == 0 &&*/ $count3 == 0/* && $count4 == 0*/){
			$message = "<div class='alert alert-warning' role='alert'>Both Dealers not found</div>";   //assign an error message
		}
		else{
			if($count == 0 /*&& $count2 == 0*/){
				$message = "<div class='alert alert-warning' role='alert'>Dealer 1 not found</div>";   //assign an error message
			}
			/*else{
				if($count == 1){
					$id_username = "id";
				}
				elseif($count2 == 1){
					$id_username = "username";
				}
			}*/
	
			if($count3 == 0 /*&& $count4 == 0*/){
				$message = "<div class='alert alert-warning' role='alert'>Dealer 2 not found</div>";   //assign an error message
			}
			/*else{
				if($count3 == 1){
					$id_username2 = "id";
				}
				elseif($count4 == 1){
					$id_username2 = "username";
				}
			}*/
		}

	}
?>


<!DOCTYPE html>
<html lang="en"/>
<head>
<meta charset="utf-8"/>
<title>
Benchmark Report
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
    google.charts.setOnLoadCallback(dealer1SaleChart);

	google.charts.setOnLoadCallback(dealer2SaleChart);

	google.charts.setOnLoadCallback(dealer1ServiceChart);

	google.charts.setOnLoadCallback(dealer2ServiceChart);
      
    function dealer1SaleChart() {
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

						$sql2="SELECT  id FROM customerdata where dealerid='".$dealer1."'";

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
			title: 'Dealer 1 Sale Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('dealer1salechartdiv'));
		chart.draw(data, options);
	}

	function dealer2SaleChart() {
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

						$sql2="SELECT  id FROM customerdata where dealerid='".$dealer2."'";

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
			title: 'Dealer 2 Sale Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('dealer2salechartdiv'));
		chart.draw(data, options);
	}

	function dealer1ServiceChart() {
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

						$sql2="SELECT  id FROM customerdata where `dealerid`='$dealer1'";
		
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
			title: 'Dealer 1 Service Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('dealer1servicechartdiv'));
		chart.draw(data, options);
	}

	function dealer2ServiceChart() {
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

						$sql2="SELECT  id FROM customerdata where `dealerid`='$dealer2'";
		
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
			title: 'Dealer 2 Service Details',
			width:600,
            height:500
		};
		var chart = new google.visualization.PieChart(document.getElementById('dealer2servicechartdiv'));
		chart.draw(data, options);
	}

    </script>

</head>

<body>
	<?php include("../files/header.php"); ?>
	<?php 
	session_start();
	if($_SESSION['manager-credentials'])
	{	
	?>
		<div class="container class-content">
			<p class="display-4 text-center"><b>Benchmark Report</b></p> 
			
			<form method="POST" action="#" enctype="multipart/form-data">
				<div class="form-row">
					<div class="form-group col-md-6">
					<label>Dealer 1</label>
					<input type="number" class="form-control" name="dealer1" placeholder="Enter First Dealer ID" required>
					</div>

					<div class="form-group col-md-6">
					<label>Dealer 2</label>
					<input type="number" class="form-control" name="dealer2" placeholder="Enter Second Dealer ID" required>
					</div>
				</div>
				<div class="createaccountbutton">
					<button type="submit" name="submit" value="submit" class="button btn-outline-primary btn btn-primary btn-lg btn-block">Generate Reports</button>
				</div>
			</form>

			<?php 
			if(!empty($message)){
				echo $message;
			}

			else{
				if(!empty($msg)){
					echo $msg;
				}	
				else{
				?>
				<table class="columns">
					<tr>
						<td><div id="dealer1salechartdiv"></div></td>
						<td><div id="dealer2salechartdiv"></div></td>
					</tr>
					<tr>
						<td><div id="dealer1servicechartdiv"></div></td>
						<td><div id="dealer2servicechartdiv"></div></td>
					</tr>
    			</table>
				<?php
				}
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
