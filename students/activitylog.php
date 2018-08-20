<?php
require 'db.php';
session_start();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High School</title>
	    <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="../js/sweetalert.min.js"></script>
    <!-- Latest compiled and minified CSS -->  

  <!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Optional theme -->
       <link rel="stylesheet" href="../css/style.css">
       <link rel="stylesheet" href="../css/animate.css">
       <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
       <link rel="stylesheet" href="../css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="../js/bootstrap.min.js"></script>

         <script src="../js/bootstrapValidator.js"></script>
	
	
</head>
<body>
<header class="container text-center animated fadeInDown" id="header-logo" > 
 <div class="col-md-2 ">
    <img src="images/logo.png" height="120"> 
  </div> 
  <h1 style="font-style: forte;">SAMPAGUITA HIGH SCHOOL</h1>

</header>
<nav class="navbar navbar-default "> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li><a href="onlinereg.php"><span class="glyphicon glyphicon-pencil"></span> Online Enrollment</a></li>
          <li><a href="activitylog.php"><span class="glyphicon glyphicon-info-sign"></span>  Activity Log</a></li> 
        <li><a href="oldstudent.php"><span class="glyphicon glyphicon-user"></span> My Account </a></li> 
      </ul>
     
            <ul class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['usernameold'];?></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>

    </div>
  </div>
</nav>

<div class="container">

	
	<div class="row">
		<div class="col-md-1"></div>
			<div class="col-md-10">
					<div class="panel panel-primary" id="panel-panel">
						<div class="panel panel-heading">
							<div class="panel-title"><center><b>Activity Log</b></center></div>
						</div>
						<div class="panel-body">
						</div>
						<?php 
						$stno = $_SESSION['dbstno'];
						$sql = "SELECT * FROM enrollmentform WHERE stno = '$stno' && process='enrolled'";
						$result = mysqli_query($db, $sql);
						?>
						<form method="GET">
							<div class="row">
								<div class="col-md-12">
									<div class="col-md-1">
									</div>
									<div class="col-md-10">
									<div class="table-container">
										<table class="table table-hover table-condensed table-bordered">
											<thead>
												<td width="20%"><b><center>Grade</center></b></td>
												<td width="20%"><b><center>School Year</center></b></td>
												<td width="20%"><b><center>Section</center></b></td>
												<td width="20%"><b><center>Adviser</center></b></td>
												<td width="20%"><b><center>Date Enrolled</center></b></td>
												<td width="20%"><b><center>Action</center></b></td>
											</thead>
											<tbody>
												<tr>
												<?php
												while($row = mysqli_fetch_array($result))
											{
												$grade=$row['grade'];
												$section = $row['section'];
												$schoolyear= $row['schoolyear'];
												$adviser = $row['adviser'];
												$date = $row['date'];
												$id = $row['id'];
												?>
													<td><center><?php echo$grade; ?></center></td>
													<td><center><?php echo$schoolyear;?></center></td>
													<td><center><?php echo$section;?></center></td>
													<td><center><?php echo$adviser;?></center></td>
													<td><center><?php echo$date;?></center></td>

													<td><center><a href="pdf.php?id=<?php echo$id;?>&adviser=<?php echo$adviser;?>&sy=<?php echo $schoolyear; ?>" class="btn btn-success" target="_blank"><span class="glyphicon glyphicon-information"></span> View</a>
													</center></td>
												</tr>
												<?php
											}
											?>
											</tbody>
										</table>
									</div>
									</div>
									<div class="col-md-1">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
		<div class="col-md-1"></div>
	</div>
</div>

<footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
 </footer>

</body>
</html>
