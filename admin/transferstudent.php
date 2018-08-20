<?php
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
	header('location:../user/index.php');
		
	}

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High</title>

     <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="../js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="../js/bootstrap.min.js"></script>

         <script src="../js/bootstrapValidator.js"></script>

<script>
$(document).ready(function () {
    var usedNames = {};
    $("select > option").each(function () {
        if (usedNames[this.value]) {
            $(this).remove();
        } else {
            usedNames[this.value] = this.text;
        }
    });
});
 </script>
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
	<!--end of navbar-->
	
	<!--end of navbar-->

		<div class="container">
		
		<br>
		<div class="row" style="padding-top: 15px;">
			<div class="col-md-3 hidden-print">
				<div class="list-group">
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
				<div class="panel-heading">Advisory Section</div>
				<div class="panel-body">
				<form method="POST">
				<?php 
				$con = mysqli_connect('localhost','root','','enrollment');
				$sql = "SELECT * FROM enrollmentform WHERE stno = '$_GET[stno]' && gender = '$_GET[gender]'";
				$result = mysqli_query($con, $sql);
					while($row = mysqli_fetch_array($result))
					{
						$dbname= $row['fname'].' '.$row['sname'];

					}
											$section = $_SESSION['section'];
											$schoolyear = $_SESSION['schoolyear'];
											if(isset($_POST['btntransfer']))
												{
													$con1 = mysqli_connect('localhost','root','','enrollment');
													$sql1 = "SELECT * FROM sectionlist WHERE sectionname = '$_POST[section]'";
													$result1 = mysqli_query($con1, $sql1);
																while($row1 = mysqli_fetch_array($result1))
															{
																$dbsection = $row1['sectionname'];
																$grade = $row1['grade'];
																$adviser = $row1['adviser'];
															}												
													if($result1)
													{	
														?>
														<script>
														swal("Successfully!", "The Student Has Been Transferred!", "success")
														     <?php 											     
															$sql4 = "UPDATE enrollmentform SET section ='$_POST[section]', adviser = '$adviser' WHERE stno = '$_GET[stno]' && gender = '$_GET[gender]'";
																$result4 = mysqli_query($con1, $sql4);					    	
														    ?>
														</script>
														<?php

														}
												}	
											else
												{
													$con1 = mysqli_connect('localhost','root','','enrollment');
													$sql1 = "SELECT * FROM enrollmentform WHERE stno = '$_GET[stno]' && gender = '$_GET[gender]'";
													$result1 = mysqli_query($con1, $sql1);
												}
															while($row1 = mysqli_fetch_array($result1))
															{
																$dbsection = $row1['section'];
																$adviser = $row1['adviser'];
																$grade = $row1['grade'];
															}

				?>
				<div class="row">
				<div class="col-md-4">
				<label class="control-label">&nbsp;Name:</label>
				<label class="form-control" readonly><center><?php echo $dbname; ?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Student Number:</label>
				<label class="form-control" readonly><center><?php echo $_GET['stno']; ?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Grade:</label>
				<label class="form-control" readonly><center><?php echo $grade; ?></center></label>
				</div>
				<div class="col-md-2">
				<label class="control-label">&nbsp;Schoolyear:</label>
				<label class="form-control" readonly><center><?php echo$_SESSION['schoolyear']; ?></center></label>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-md-3">
				<label class="control-label">&nbsp;Section:</label>
				<?php 
				$con2 = mysqli_connect('localhost','root','','enrollment');
				$sql2 = "SELECT * FROM sectionlist where grade='$grade' && schoolyear='$schoolyear'";
				$result2 =mysqli_query($con2, $sql2);
				?>
				<select class="form-control" name="section" >
				<?php while($row2 = mysqli_fetch_array($result2)) 
				{
					$row2['sectionname'];
					?>
				<option><?php echo$dbsection; ?></option>
				<option><?php echo$row2['sectionname'];?></option>
				<?php
				}
				?>
				</select>
				</div>
				<div class="col-md-3 pull-right">
				<label class="control-label">&nbsp;Adviser:</label>
				<input type="text" class="form-control" value="<?php echo$adviser;?>" name="adviser">
				</div>
				</div>	
				<hr>

				<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-3">
				<a href="updatesection.php?section=<?php echo$section ;?>&schoolyear=<?php echo$schoolyear;?>" class="btn btn-info btn-sm hidden-print"><span class="glyphicon glyphicon-check"></span> DONE </a>
				</div>
				<div class="col-md-3 pull-right">
				<button class="btn btn-warning btn-sm hidden-print" name="btntransfer"><span class="glyphicon glyphicon-move"></span> TRANSFER</button>
				<button class="btn btn-success btn-sm hidden-print" name="print" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> PRINT</button>
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
</html>
<script>  




