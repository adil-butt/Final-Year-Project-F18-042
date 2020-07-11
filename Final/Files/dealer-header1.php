
   <!-- As a link -->
<nav class="navbar navbar-dark bg-dark">
<?php
  if (isset($_GET['id']) && isset($_GET['username'])){

    $abc="SELECT  * FROM dealeraccount where id = '$id' and username = '$username'";
			
		$result=mysqli_query($conn,$abc);

		$count = mysqli_num_rows($result);

		if($count == 0){
			echo  '<a class="button navbar-brand" href="#" style="margin-left:1408.2px;">Logout</a>';
    }
    else{
      echo  '<a class="button navbar-brand" href="../files/dealer-logout.php" style="margin-left:1408.2px;">Logout</a>';
    }
  }
  else{
    echo  '<a class="button navbar-brand" href="#" style="margin-left:1408.2px;">Logout</a>';
  }
?>

</nav>
