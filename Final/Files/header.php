
<nav class="navbar navbar-dark bg-dark">
	<?php if(strpos(getcwd(), 'Admin') !== false || strpos(getcwd(), 'admin') !== false) {
			echo '<a class="button navbar-brand" href="../admin/home.php">Dashboard</a>' ;
	}
	else if(strpos(getcwd(), 'Manager') !== false || strpos(getcwd(), 'manager') !== false) {
		echo '<a class="button navbar-brand" href="../manager/home.php">Dashboard</a>' ;
	}
	else {
		echo '<a class="button navbar-brand" href="#">Dashboard</a>' ;
	}?>
	
	<?php if(strpos(getcwd(), 'Admin') !== false || strpos(getcwd(), 'admin') !== false) {
			echo '<a class="button navbar-brand" href="../files/admin-logout.php">Logout</a>' ;
	}
	else if(strpos(getcwd(), 'Manager') !== false || strpos(getcwd(), 'manager') !== false) {
		echo '<a class="button navbar-brand" href="../files/manager-logout.php">Logout</a>' ;
	}
	else {
		echo '<a class="button navbar-brand" href="../files/logout.php">Logout</a>' ;
	}?>
	
</nav>

  


