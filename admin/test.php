<!DOCTYPE html>
<html>
<head>
	<title>try</title>
</head>
<body>
<?php
	$con = mysqli_connect('localhost','root','','enrollment');
	if(isset($_POST['enroll']))
	{
		echo "Today is " . date("Y/m/d") . "<br>";
		$average= $_POST['average'];
		$grade= $_POST['grade'];
		$lastname= $_POST['lastname'];
		echo"$average";
		echo"$grade";
		echo"$lastname";
		$criteria1 = '90';
		$criteria2 = '88';
		$namecriteria = substr($lastname, 0, 1); 
		if($criteria2 <= $average)
		{
				$sql = "SELECT * FROM sectionlist WHERE criteria ='$criteria1' && grade = '$grade'";
				$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_array($result))
					{
						$dbsection = $row['sectionname'];
						$dbadviser = $row['adviser'];
						$dbschoolyear = $row['schoolyear'];
						echo"$dbsection";
						echo"$dbadviser";
						echo"$dbschoolyear";
						echo"<br>";
					}
				$res = mysqli_query($con,"SELECT count(id) AS total FROM trysectioning WHERE section = '$dbsection' && grade = '$grade' && schoolyear='$dbschoolyear'");
				$total = mysqli_fetch_array($res);    
				$total  =$total['total'];
				echo$total;
				$number = '50';
						if($total <= $number)
						{
							$sql = "SELECT * FROM sectionlist WHERE criteria ='$criteria1' && grade = '$grade'";
										$result = mysqli_query($con, $sql);
											while($row = mysqli_fetch_array($result))
											{
												$dbsection = $row['sectionname'];
												$dbadviser = $row['adviser'];
												$dbschoolyear = $row['schoolyear'];
													echo"$dbsection";
												echo"$dbadviser";
												echo"$dbschoolyear";
											}
							$sql1 = "INSERT INTO trysectioning (lastname,average,grade,section,adviser,schoolyear) VALUES ('$lastname','$average','$grade','$dbsection','$dbadviser','$dbschoolyear')";
							$result1 = mysqli_query($con, $sql1);
						}
						else
						{
									$sql2 = "SELECT * FROM sectionlist WHERE criteria ='$criteria2' && grade = '$grade'";
									$result2 = mysqli_query($con, $sql2);
												while($row2 = mysqli_fetch_array($result2))
															{
																$dbsection2 = $row2['sectionname'];
																$dbadviser2 = $row2['adviser'];
																$dbschoolyear2 = $row2['schoolyear'];
																echo"$dbsection2";
																echo"$dbadviser2";
																echo"$dbschoolyear2";
															}
							$sql3 = mysqli_query($con,"SELECT count(id) AS count FROM trysectioning WHERE section = '$dbsection2' && grade = '$grade' && schoolyear='$dbschoolyear2'");
											$count = mysqli_fetch_array($sql3);    
											$count  =$count['count'];
											echo$count;
	
									if($count <= $number)
									{
										$sql1 = "INSERT INTO trysectioning (lastname,average,grade,section,adviser,schoolyear) VALUES ('$lastname','$average','$grade','$dbsection2','$dbadviser2','$dbschoolyear2')";
										$result1 = mysqli_query($con, $sql1);
									}
									else
									{
											echo"Pilot Sections are Full!";
									}
						}
		}
		else 
		{
			$dbcriteria = array("a", "b", "c", "d", "e");
			if(in_array($namecriteria, $dbcriteria, TRUE))
			{
				switch ($namecriteria) {
					case $dbcriteria[3]:
							echo"sad";
									$sql2 = "SELECT * FROM sectionlist WHERE criteria ='$namecriteria' && grade = '$grade'";
									$result2 = mysqli_query($con, $sql2);
												while($row2 = mysqli_fetch_array($result2))
															{
																$dbsection2 = $row2['sectionname'];
																$dbadviser2 = $row2['adviser'];
																$dbschoolyear2 = $row2['schoolyear'];
																echo"$dbsection2";
																echo"$dbadviser2";
																echo"$dbschoolyear2";
															}	
									$sql1 = "INSERT INTO trysectioning (lastname,average,grade,section,adviser,schoolyear) VALUES ('$lastname','$average','$grade','$dbsection2','$dbadviser2','$dbschoolyear2')";
										$result1 = mysqli_query($con, $sql1);
						break;
					
					default:
						# code...
						break;
				}

			}
			else
			{
				echo"You are not qualified in criteria of section!";	
			}

		}
	}

?>
<form method="POST">
<input type="text" name="average" placeholder="grade">
<input type="text" name="lastname" placeholder="lastname">
<select name="grade">
<option>Grade-7</option>
<option>Grade-8</option>
<option>Grade-9</option>
<option>Grade-10</option>
</select>
<input type="submit" name="enroll" value="ENROLL">
</form>
</body>
</html> 