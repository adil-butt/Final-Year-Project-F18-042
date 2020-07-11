<?php
session_start();
if($_SESSION['admin-credentials']) {	
	include("../files/config.php");
	if($_GET)
	{
		$id=$_GET['id'];
		$sql = "DELETE from saleform WHERE id='$id'";
		if(mysqli_query($conn,$sql)) {
			header("location:sale-form.php");
		}
		else {
			$msg = "<div class='alert alert-danger' role='alert'>".mysqli_error($conn)."</div>";   //assign an error message
			header("Location:sale-form.php?msg=".$msg);
		}
		//mysqli_close($conn);
	}
	else {
		$msg = "<div class='alert alert-danger' role='alert'>Question is not deleted successfully/div>";   //assign an error message
		header("Location:sale-form.php?msg=".$msg);
	}
}
else {
		header("Location:../home.php");
}
?>
