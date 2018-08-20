<?php
require'db.php';

$id = $_GET['id'];

if (isset($id)) {
	$query = "DELETE  FROM subjectlist WHERE id='$id' ";

	$res = mysqli_query($db,$query);

	if ($res) {
		echo "<script>alert('Delete');location.href='subjects.php';</script>";
	}
	else{
		header('location:index.php');
	}
}
?>