<?php
include 'db.php';

$id = $_GET['id'];

if (isset($id)) {
	$query = "DELETE FROM photos WHERE id='$id' ";

	$res = mysqli_query($db,$query) or die(mysqli_error());

	if ($res) {
		echo "<script>alert('Delete');location.href='page/post.php';</script>"; 

		
	}
	else{
		header('location:index.php');
	}
}
?>