<?php
require'db.php';

$id = $_GET['id'];

if (isset($id)) {
	$query = "DELETE  FROM sectionlist WHERE id='$id' ";

	$res = mysqli_query($db,$query);

	if ($res) {
		echo "<script>alert('Delete');location.href='sections.php';</script>";
	}
	else{
		header('location:index.php');
	}
}
?>