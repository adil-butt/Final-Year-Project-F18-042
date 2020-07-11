<?php
session_start();
if($_SESSION['admin-credentials'])
{
	include("../files/config.php");
	if($_GET) {
		$id=$_GET['id'];
		$sql = "DELETE from dealeraccount WHERE id='$id'";
		$result=mysqli_query($conn,$sql);
		
		if($result) {
			header("location:account-deleted.php");
		}
		else {
			$msg = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
			header("Location:error-deleting-account.php?msg=".$msg);
			exit();
		}
		mysqli_close($conn);
	}
	else {
		$msg = "<div class='alert alert-danger' role='alert'>Oops something went wrong!</div>";   //assign an error message
		header("Location:error-deleting-account.php?msg=".$msg);
		exit();
	}
}
else {
		header("Location:../home.php");
}
?>
