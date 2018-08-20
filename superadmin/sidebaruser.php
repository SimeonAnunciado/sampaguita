<?php
include 'db.php';

$sql = mysqli_query($db,"SELECT COUNT(id) AS totaladmin FROM admin");
$res = mysqli_fetch_array($sql);
$total = $res['totaladmin'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS user FROM studentdetails");
$res = mysqli_fetch_array($sql);
$user = $res['user'];


?>


				<div class="list-group">
					<a href="users.php" class="list-group-item active"><span class="glyphicon glyphicon-user "></span> USERS</a>
					<a href="admin.php" class="list-group-item">
					<span class="glyphicon glyphicon-tag "></span> Admin/Chairman<span class="badge"><?php echo $total;?></span>
					</a>
					<a href="students.php" class="list-group-item"><span class="glyphicon glyphicon-education"></span> Students<span class="badge"><?php echo $user;?></span></a>

				</div>
