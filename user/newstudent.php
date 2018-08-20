<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita Highschool</title>
<?php
include'links.php';
 ?>
</head>
<body>
<?php
	include'navbar.php';
?>
<div class="container">
<div class="row">
	<?php
		include'admissionsidebar.php';
	?>
	<div class="col-md-8">
			<div class="panel panel-success">
			<div class="panel panel-heading"><center><b>Students Portal</b></center></div>
			<div class="panel panel-body" style="background-image:url('images/logoblur.png'); background-repeat: no-repeat; background-position: center; width: 100%; height: 300px; ">
					<div class="form-group" style="width: 30%; border-radius: 10px; background-color: white; margin-left: 250px; box-shadow: 10px 10px 5px #888888;">
						<label>Username:</label>
						<input type="text" name="username" class="form-control" placeholder="Enter Username...">
						<br>
						<label>Password:</label>
						<input type="text" name="username" class="form-control" placeholder="Enter Password...">

					</div>
			</div>
		</div>
	</div>
</div>
</div>
</body>
</html>