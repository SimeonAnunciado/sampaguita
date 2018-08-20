<?php
require'db.php';

$fname = $_GET['fname'];


if (isset($fname)) {

	$res1 = mysqli_query($db,"DELETE  FROM form WHERE fname = '$fname' ");

	if ($res1) {
		echo "<script>alert('Delete');location.href='jointable.php';</script>";
	}

}	else{
		echo "error";
	}
?>