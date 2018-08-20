<?php
include '../function.php';
require '../db.php';
session_start();

	if (!isset($_SESSION['stduser'])) {
		header('location:../login.php');
		}


?>



<!DOCTYPE html>
<html>
<head>
	<title>	Super Admin</title>

      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="/css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  
	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">

</head>
<body>
		<!-- navbar -->
			<nav class="navbar navbar-inverse navbar-fixed-top ">
			  <div class="container">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			      </button>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li><a href="../index.php">Home</a></li>
			     	<li><a href="../page/post.php">Post</a></li>
			        <li><a href="../page/chairman.php"">Chairman</a></li> 
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			    	  <li><a href="../../logout.php">
			    	  <?php 
			    	  $user = $_SESSION['stduser'];
			    	  $sql = mysqli_query($db,"SELECT * FROM chairman WHERE username = '$user' ");
			    	  if($row = mysqli_fetch_array($sql)){
			    	  echo $row['chairman'];
			    	  }
			    	  ?>


			          </a></li>

			        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>
			         <?php echo $_SESSION['stduser'];?></a></li>

			        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		<!-- navbar -->


	<div class="row" style="margin-top: 80px;">
		<div class="col-md-9 text-right"></div>
		<div class="col-md-1 ">
            
          </div>

	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-1"></div>
		<div class="col-md-10" >
			<div class="panel panel-primary">
			  <div class="panel-heading">Post / Event </div>
			  <div class="panel-body" style="margin-top: 20px;">

			  		<table class="table table-condensed table-responsive table-bordered table-condensed" style=" margin-bottom: 10px;" >
					<thead>
						<tr>
							<th width="50" class="text-center">Image</th>
							<th width="50" class="text-center" >Text</th>
							<th width="100" class="text-center">Action</th>
							

						</tr>
					</thead>
					
				<?php

				$res = mysqli_query($db,"SELECT * FROM photos ");
				while($row = mysqli_fetch_array($res)){
					?>
					<tbody>
						<tr>
						
						     <td class="text-center">
						     <img src="../upload/<?php echo $row['image'];?>" width=100 height=90>
						     </td>
							 <td class="text-center"><?php echo $row['text']; ?></td>

							
							<td class="text-center">
								<a href="../update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm">View <span class="glyphicon glyphicon-trash"></span></a>

								<a onclick ="return confirm('Are You Sure ?');" 
								href="../delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete <span class="glyphicon glyphicon-trash"></span></a>

							</td>
						</tr>
					</tbody>
					
					<?php
				}
				?>		
					
				</table>
			  	
			  </div>
			</div>
		</div>
	</div>
	</div>





	<!-- Add Post -->











  	    <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrapValidator.js"></script>

</body>
</html>