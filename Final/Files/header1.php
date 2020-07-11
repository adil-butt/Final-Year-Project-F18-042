
   <!-- As a link -->
<nav class="navbar navbar-dark bg-dark">
	<?php if(strpos(getcwd(), 'Admin') !== false || strpos(getcwd(), 'admin') !== false) {
			echo '<a class="button navbar-brand" style="margin-left:1408.2px;" href="../files/admin-logout.php">Logout</a>' ;
	}
	else if(strpos(getcwd(), 'Manager') !== false || strpos(getcwd(), 'manager') !== false) {
		echo '<a class="button navbar-brand" style="margin-left:1408.2px;" href="../files/manager-logout.php">Logout</a>' ;
	}
	else {
		echo '<a class="button navbar-brand" style="margin-left:1408.2px;" href="../files/logout.php">Logout</a>' ;
	}?>
	
</nav>
