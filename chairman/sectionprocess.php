<?php
session_start();
if(isset($_GET['section']))
{
	$sectionname = $_GET['section'];
	$adviser = $_GET['adviser'];
	$surname = $_SESSION['surname'];
	$firstname = $_SESSION['firstname'];
	$mname = $_SESSION['mname'];
	$stno = $_SESSION['stno'];
	$grade = $_SESSION['grade'];
	$schoolyear = $_SESSION['schoolyear'];
	$b = $_SESSION['requirements'];
	$name = $_SESSION['firstname']." ".$_SESSION['surname'];
	$gender = $_SESSION['gender'];
	$age = $_SESSION['age'];
	$bday = $_SESSION['bday'];
	$address = $_SESSION['address'];
	$mother = $_SESSION['mother'];
	$father = $_SESSION['father'];
	$id = $_SESSION['id'];
	$process ='enrolled';
	$con = mysqli_connect('localhost','root','','enrollment');
	$sql1 = "SELECT * FROM enrollmentform WHERE stno='$stno' && surname = '$surname' && firstname = '$firstname' && middlename = '$mname'";
	$result1 = mysqli_query($con, $sql1);
	$numrows = mysqli_num_rows($result1);
	if ($numrows == 0) 
	{
			$sql= "UPDATE enrollmentform SET process='$process', section='$sectionname', adviser ='$adviser', kindofuser ='old' WHERE id = '$id'";
			$result = mysqli_query($con, $sql);
			if($result)
			{
				$sql2 ="SELECT * FROM studentdetails where stno ='$stno'";
				$result2 = mysqli_query($con, $sql2);
				$numrows2 = mysqli_num_rows($result2);
					if($numrows2 == 0)
					{
							$sql1 = "INSERT INTO studentdetails (stno, stname, age, gender, dateofbirth, address, mothername, fathername, username, password) VALUES ('$stno', '$name', '$age', '$gender','$bday','$address','$mother','$father', '$stno', '$name')";
							$result1 = mysqli_query($con, $sql1);

							if($result1)
							{
								header('location:sectioning.php');
								$_SESSION['section'] = $sectionname;
								$_SESSION['adviser'] = $adviser;
							}
							else
							{
								echo"sad";
							}
					}
					else
					{
						$sql1 = "UPDATE studentdetails SET stno='$stno',stname='$name', age='$age', gender='$gender', dateofbirth='$bday', address='$address', mothername='$mother', fathername='$father' WHERE stno='$stno'";
							$result1 = mysqli_query($con, $sql1);
								if($result1)
							{
								header('location:sectioning.php');
								$_SESSION['section'] = $sectionname;
								$_SESSION['adviser'] = $adviser;
							}
							else
							{
								echo"sad";
							}

					}
			}

			else
			{
				echo"wrong result";
			}
	}
	else
	{	
			while ($row = mysqli_fetch_array($result1))
			{
					$section = $row['section'];
					$adviser = $row['adviser'];
			}
			$_SESSION['section'] = $section;
			$_SESSION['adviser'] = $adviser;
			if($sectionname != $section)
			{
			echo" You're Enrolled Already in $section";
			}
			else 
			{
			 echo"You're Enrolled Already Here!";
			}
	}

}
else
{
	header('location:index.php');
}











?>