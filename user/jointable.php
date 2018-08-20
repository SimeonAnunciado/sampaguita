<!DOCTYPE html>
<html>
<head>
		<!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body>

<div class="container">
	<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>First name</th>
				<th>Last name</th>
				<th>Middle name</th>
				<th>Email</th>
				<th>Pass</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>


<?php include'db.php'; 
$sql = "SELECT form.id, registereduser.firstname, form.lname, form.mname, registereduser.email, registereduser.pass
		FROM form,registereduser 
		WHERE form.lname = registereduser.lastname
		";
$query  = mysqli_query($db,$sql);
if ($row = mysqli_fetch_array($query)) {
		?>
		<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['firstname']; ?></td>
				<td><?php echo $row['lname']; ?></td>
				<td><?php echo $row['mname']; ?></td>
				<td><?php echo $row['email']; ?></td>
				<td><?php echo $row['pass']; ?></td>
				<td><a onclick="return confirm('Are You Sure ?');" href="delete.php?fname=<?php echo $row['firstname'] ?>?lname=<?php echo $row['lname'];?>">Delete </a></td>
		</tr>


		<?php
		}

?>

			
		</tbody>
	</table>
</div>

</body>
</html>