<?php 
require 'db.php';
session_start();

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
	


?>
<!DOCTYPE html>
<title>Sampaguita High School</title>
<head>
    
      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="../js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
     <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">
   					 <!-- Morris -->
	<link rel="stylesheet" href="morris/morris.css">


      <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="../js/bootstrap.min.js"></script>

         <script src="../js/bootstrapValidator.js"></script>

         <!-- morris  javascript-->
         <script src="js/jquery.min.js"></script>
		 <script src="morris/raphael.js"></script>
		 <script src="morris/morris.min.js"></script>
         <!-- morris  javascript-->

</head>

<body>

<header class="container text-center animated fadeInDown" id="header-logo" > 
 <div class="col-md-2 ">
    <img src="images/logo.png" height="120"> 
  </div> 
  <h1 style="font-style: forte;">SAMPAGUITA HIGH SCHOOL</h1>

</header>

<nav class="navbar navbar-default">
	  <div class="container-fluid">
	      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
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
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
        if (isset($_SESSION['userlvl'])) {
          echo $_SESSION['userlvl'];
        }elseif (isset($_SESSION['userchairman'])){
          echo $_SESSION['userchairman'];
          
        }else{
          echo "Undefined Session";
        }
        ?>


        </a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>


      </ul>


	    </div>
	  </div>
	 </div>
	</nav>
	
<div class="container">

	<br>
	<div class="row" style="padding-top: 15px; padding-bottom: 70px;">
			<div class="col-md-3">
				<div class="list-group hidden-print">
				
					<a href="" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Admin</a>
					<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-send"></span> Online Enrollment<span class="badge"></span> </a>
					<a href="subjects.php" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Subjects</a>
					<a href="sections.php" class="list-group-item"><span class="glyphicon glyphicon-equalizer"></span> Manage Sections</a> 
					<a href="calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Announcements </a>
					<a href="listofuser.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Student Account's List</a>
					<a href="enrolleedashboard.php" class="list-group-item"><span class="glyphicon glyphicon-signal"></span> Graphs</a> <!-- registeruser.php-->
				</div>
			</div>
		<div class="col-md-9">
			<div class="panel panel-primary">
			<div class="panel-heading">Graph of Total Enrollee in a Year</div>
			<div class="panel-body">
					<ul class="nav nav-tabs hidden-print">
						  <li><a href="enrolleedashboard.php">Enrollee Per Grade</a></li>
						  <li class="active"><a href="enrolleeperyear.php">Total Enrollee Per Year</a></li>
						   <li ><a href="genderenrollee.php">Male & Female </a></li>
						</ul>
				<div id="line-example">
				</div>
			<div class="row">
			<div class="col-md-3 pull-right">
			<!-- <button class="btn btn-success btn-sm hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> PRINT</button> -->
			</div>	
			</div>	
			</div>
			</div>
		</div>
	</div>
</div>

<footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
    
 </footer>

 </body>
<html>
<script>
Morris.Line({
  element: 'line-example',
  data: [
  <?php
  	$result = mysqli_query($db, "SELECT * FROM enrollmentform where process='enrolled' ");
  		while($row = mysqli_fetch_array($result))
  		{
  			$dbschoolyear = $row['schoolyear'];
  			$result1 =mysqli_query($db, "SELECT count(*) as totalenrolled FROM enrollmentform where schoolyear='$dbschoolyear' AND process='enrolled' " );
  				while($row1 = mysqli_fetch_array($result1))
  				{
  					$dbcount = $row1['totalenrolled'];
  				}

   	echo" { y: '$dbschoolyear', a:'$dbcount'},";
		}
   ?>
  ],
  xkey: 'y',
  xLabels: "year",
  hideHover:true,
  labels: ['Total Students'],
  ykeys: ['a'],
});
</script>
