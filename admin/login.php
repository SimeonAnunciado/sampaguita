<?php
require 'db.php';
session_start();

if (isset($_POST['login'])) {
					$user = $_POST['user'];
					$pass = $_POST['pass'];

					$query ="SELECT * FROM admin WHERE user='$user' AND pass='$pass' ";
					$result = mysqli_query($db,$query)or die(mysqli_error());

					if (mysqli_num_rows($result)>0) {
						$_SESSION['user'] = $user;
							header('location:index.php?ok');											
					}else{
							header('location:login.php?x');
						//echo "<script>alert('Error');location.href='admin.php';</script>";
					}
				}

	

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
						 <!-- SweetAlert-->
	
	<link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
 	<script src="js/sweetalert.min.js"></script>
					 <!-- SweetAlert-->
	      <!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">
    <link rel="stylesheet" type="text/css" href="style.css">



      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
	 	<div class="container">
	 		 	<div class="navbar-header">
	 		 
		 		
		 	</div>
		 	<ul class="nav navbar-nav navbar-right">
				
				<li class=""><a data-toggle="modal" data-target="#myModal"href=""><span class="glyphicon glyphicon-lock"></span> Login</a></li>
			</ul>
		</div>
	 </nav>
	 <br><br>
	 <br><br>
	 <br><br>
	


	<div class="container">
	<?php

	if (isset($_GET['ok'])) {
			  echo '<script language="javascript">';
			  echo 'swal("ok a message!")';  
			  echo '</script>';
	}
	if (isset($_GET['x'])) {
		      echo '<script language="javascript">';
			  echo 'sweetAlert("Oops...", "Username / Password Incorrect", "error");';  
			  echo '</script>';
	}
	if (isset($_GET['out'])) {
		      echo '<script language="javascript">';
			  echo 'swal("Good job!", "Success Logout", "success")';  
			  echo '</script>';
	}if (isset($_GET['login'])) {
		      echo '<script language="javascript">';
			  echo 'sweetAlert("Oops...", "Login Firt", "error");';   
			  echo '</script>';
	}


	?>
	</div>

	  <!-- Modal -->
  <div class="modal fade " id="myModal" role="dialog">
    <div class="modal-dialog modal-md col-sm-15">
      <div class="modal-content">
        <div class="modal-header ">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Login</h4>
        </div>
	        <div class="modal-body">
	          		<form class="form-horizontal" action="" method="POST" id="form">
	          			<div class="form-group">

	          			   	<label class="col-sm-3 control-label" for="user">User</label>
	          			   	    <div class="col-sm-8">
	          					 <input type="text" name="user" id="user" placeholder="Enter Username" class="form-control">
	          					</div>
	          			
	          			</div>
	          			<div class="form-group">
	          				<label class="col-sm-3 control-label" for="pass">Password</label>
	          				<div class="col-sm-8">
	          					 <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control">	
	          				</div>
	          			</div>
	          			<button type="submit" name="login" class="btn btn-success col-sm-offset-9 btm-md">Login</button>
	          		</form>
	        </div>	
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
	<!-- end modal -->
	 
	 
	 </div>


</body>
</html>