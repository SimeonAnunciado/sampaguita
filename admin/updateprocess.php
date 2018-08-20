<?php
	session_start();
	$id = $_GET['id'];
	$_SESSION['id'] = $id;
	include'db.php';
	$sql = "SELECT * FROM enrollmentform WHERE id = $id";
	$result = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($result))
		{
			$dbsection=$row['section'];
			$dbstno = $row['stno'];
		}
		$_SESSION['dbstno'] = $dbstno;
		if($dbsection =='')
		{
			header('location:update.php');
		}
		else
		{
			header('location:approveenroll.php');
		}
	
?>