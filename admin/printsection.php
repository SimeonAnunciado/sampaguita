<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['user'])) {
	header('location:../user/index.php');
		
	}

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];


?>
<!DOCTYPE html>
<html>
<head>
	<title></title>

        
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
	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	  <div class="navbar-body">
	    <ul class="nav navbar-nav">
	         <li><a href="">Home</a></li>
	         
	         <li class="dropdown">
	          <a class="dropdown-toggle" data-toggle="dropdown" href="">Enrollment <span class="caret"></span></a>
	           <ul class="dropdown-menu">
	             <li><a href="">Enrollment Online</a></li>
	             <li><a href="">Admission</a></li>
	             <li><a href="">Requirements</a></li>
	           </ul></li>
	         <li class="dropdown"> 
	          <a class="dropdown-toggle" data-toggle="dropdown" href="">About <span class="caret"></span></a>
	           <ul class="dropdown-menu">
	             <li><a href="">History</a></li>
	             <li><a href="">Mission</a></li>
	             <li><a href="">Vission</a></li>
	         </ul></li>
	    </ul>
       <ul class="nav navbar-nav navbar-right">
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>

      </ul>


	    
	  </div>
	 </div>
	</nav>
	
	<!--end of navbar-->
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

		</div>
		<div class="container">
		<div class="row" style="padding-top: 30px;">
			<div class="col-md-12">
			<div class="panel panel-primary">	
				<div class="panel-heading"><center><b>PRINT FORM</b></center></div>
				<?php
				$stno = $_SESSION['stno'];
				$name = $_SESSION['name'];
				$grade = $_SESSION['grade'];
				$avg = $_SESSION['average'];
				$schoolyear = $_SESSION['schoolyear'];
				$section = $_SESSION['section'];
				$adviser = $_SESSION['adviser'];
				?>
				<div class="panel-body">
				<form method="POST">
					<div class="row">
						<div class="col-md-3">
						<label>&nbsp;Student Number:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$stno"; ?></label>
						</div>
						<div class="col-md-3">
						<label>&nbsp;Student Name:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$name"; ?></label>
						</div>
						<div class="col-md-3">
						<label>&nbsp;Student Year:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$grade"; ?></label>
						</div>
						<div class="col-md-3">
						<label>&nbsp;General Average:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$avg"; ?></label>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-md-3">
						<label>&nbsp;SECTION:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$section"; ?></label>
						</div>
						<div class="col-md-3">
						<label>&nbsp;Guardian Signature:</label>	
						<input type="text" class="form-control"> 
						</div>
						<div class="col-md-3 pull-right">
						<label>&nbsp;ADVISER:</label>	
						<label class="form-control" readonly="readonly"><?php echo"$adviser"; ?></label>
						</div>

					</div>
					</form>
					<hr>
						<a href="printsection.php" class="btn btn-info btn-lg pull-right" onclick="window.print()" name="print"><span class="glyphicon glyphicon-print"></span> PRINT</a>
							
				</div>
			</div>
		
			</div>	
			</div>
			</div>
</body>
</html>
