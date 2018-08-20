<?php 
require 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High</title>

        
      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/animate.css"> 
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body style="background: url('images/bgrough.jpg');  background-size: 30% 30%; background-repeat: repeat;">

<?php
session_start();

	if (isset($_POST['submit'])) {
		$user = $_POST['user'];
		$pass = $_POST['password'];

		//$password = md5($pass);

		$query = "SELECT * FROM admin WHERE user = '$user' AND pass = '$pass' ";
		$sql = mysqli_query($db,$query) or die(mysqli_errno());

		$wew = mysqli_fetch_array($sql);
		$level = $wew['level'];



		if (mysqli_num_rows($sql) >0 ){
		   if ($level == 'admin') {
		   	   $_SESSION['stduser'] = $user;
		   		echo '<script>swal("Good job!", "Success Admin", "success");</script>';
		   		header('Refresh: 1; url=../admin/index.php');
		   }elseif ($level == 'super') {
		   	   $_SESSION['stduser'] = $user;
		   		echo '<script>swal("Good job!", "Success Super", "success");</script>';
		   		header('refresh: 1;url =../super/super.php');
		   		
		   }


           // echo '<script>swal("Good job!", "Success Login", "success");
           // header('location:../admin/index.php');
            	
		}else{
			echo '<script>sweetAlert("Oops...", "Username / Password Are Incorrect!", "error");</script>';
			
		}
	}



?>

   		<br><br><br>
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				
			 </div>
			
			<!-- Addmiin Add new file
			<div class="col-md-2 text-right">
				<a href="add.php" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-file"></span> Add Student</a>

			 -->

			</div>

	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="index.php">S.H.S</a>
    </div>
	  <div class="navbar-body">
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	         <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-list"></span> Admission <span class="caret"></span></a>
	           <ul class="dropdown-menu">
	             <li><a href="index.php"><span class="glyphicon glyphicon-send"></span> Online Enrollment </span></a></li>
	             <li><a href="subjects.php"><span class="glyphicon glyphicon-tasks"></span> Subjects</a></li>
	             <li><a href="sections.php"><span class="glyphicon glyphicon-equalizer"></span> Manage Sections</a></li>
	           </ul></li>
	          <li><a href="calendar.php"><span class="glyphicon glyphicon-calendar"></span> Announcements</a></li>
	          <li><a href="listofuser.php"><span class="glyphicon glyphicon-th-list"></span> Student Accounts</a></li>
	          <li><a href="enrolleedashboard.php"><span class="glyphicon glyphicon-signal"></span> Graphs</a></li>
	    </ul>

   

       <ul class="nav navbar-nav navbar-right">
          <!-- <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li> -->
          <ul>

      </ul>


	    </div>
	  </div>
	 </div>
	</nav>
	
	<!--end of navbar-->
	<div class="container">
	<div class="headerbg">
	<div class="row" >
	<div class="col-md-3">
	<center><img src="images/logo.png" style="width: 50%;" class="animated fadeInDown"></center>
	</div>
	<div class="col-md-9">
	<center><img src="images/lettering.png" style="width:90%; padding-top: 25px;" class="animated fadeIn"></center>
	</div>
	</div>
	</div>
	<br>
		<div class="row" style="padding-top:15px;">
			<div class="col-md-3">
			</div>
			<div class="col-md-5" style="margin-left: 20px;">
			<div class="panel panel-primary">	
				<div class="panel-heading text-center">Login Form</div>
				<div class="panel-body">

				 <form action="index.php"  method="post">
                  <div class="form-group">
                    <label>User</label>
                    <input type="text" class="form-control" name="user" placeholder="Enter User">
                  </div>
                  <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password">
                  </div>
                  <button type="submit" name="submit" class="btn btn-default btn-block col-md-2">Login</button>
              </form>
						
				
				</div>
				
				</tbody>
				</table>
				</form>
			</div>
			</div>
			</div>
			</div>	
			</div>

			
</body>
</html>
