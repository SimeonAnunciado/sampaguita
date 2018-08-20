<?php
session_start();
if(isset($_GET['section']))
{
	$sectionname = $_GET['section'];
	$surname = $_SESSION['surname'];
	$firstname = $_SESSION['firstname'];
	$mname = $_SESSION['mname'];
	$age = $_SESSION['age'];
	$address = $_SESSION['address'];
	$stno = $_SESSION['stno'];
	$grade = $_SESSION['grade'];
	$schoolyear = $_SESSION['schoolyear'];
	$con = mysqli_connect('localhost','root','','enrollment');
	$sql= "UPDATE enrollmentform SET process='pending', section='', adviser ='' WHERE stno='$stno' && sname = '$surname' && fname = '$firstname' && mname = '$mname'";
	$result = mysqli_query($con, $sql);
	if($result)
	{
		header('location:sectioning.php');
	}
	else
	{
		echo"wrong result";
	}

}
else
{
	header('location:index.php');
}

?>