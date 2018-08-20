<?php
include 'db.php';

	$id = $_GET['id'];

	$query = mysqli_query($db,"DELETE From calendar WHERE id = '$id' ");

	if ($query) {
		echo "<script>alert('Delete');location.href='calendar.php';</script>";
		header('location:calendar.php?ok');

	}
	else{
			header('location:calendar.php?x');
	}


?>