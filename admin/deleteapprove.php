<?php
require'db.php';

$id = $_GET['id'];

if (isset($id)) {
	$query = "DELETE  FROM enrollmentform WHERE id='$id' ";

	$res = mysqli_query($db,$query);

	if ($res) {
		echo "<script>alert('Delete');location.href='approve.php';</script>";
	}
	else{
		header('location:approve.php');
	}
}
?>