
  <!-- As a link -->
<nav class="navbar navbar-dark bg-dark">
  <?php
    if (isset($_GET['id']) && isset($_GET['username'])){

      $abc="SELECT  * FROM dealeraccount where id = '$id' and username = '$username'";
			
		  $result=mysqli_query($conn,$abc);

		  $count = mysqli_num_rows($result);

      if($count == 0){
        echo  '<a class="button navbar-brand" href="#">Dashboard</a>';
        echo  '<a class="button navbar-brand" href="#">Logout</a>';
      }
      else{
        echo  '<a class="button navbar-brand" href="../dealer/home.php?id='.$id.'&username='.$username.'">Dashboard</a>';
        echo  '<a class="button navbar-brand" href="../files/dealer-logout.php">Logout</a>';
      }
    }

    else{
      echo  '<a class="button navbar-brand" href="#">Dashboard</a>';
      echo  '<a class="button navbar-brand" href="#">Logout</a>';
    }
  ?>

</nav>