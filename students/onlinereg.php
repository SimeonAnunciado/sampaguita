<?php
require 'db.php';
session_start();


if (isset($_SESSION['usernameold'])) {




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

<?php
	if(isset($_POST['searchbtn']))
	{
		$stno = $_SESSION['dbstno'];
		$grade=$_POST['grade'];
		$sql="SELECT * FROM enrollmentform WHERE stno = '$stno' && grade='$grade' && process='enrolled'";
		$result=mysqli_query($db, $sql);
		$numrows = mysqli_num_rows($result);
			if($numrows == 0)
				{
					$_SESSION['dbgrade'] = $_POST['grade'];
					$schoolyear = date('Y');
					$sqlinsert="INSERT into enrollmentform (stno, schoolyear, grade) VALUES ('$stno', '$schoolyear', '$grade')";
					$resultinsert = mysqli_query($db, $sqlinsert);
					if($resultinsert)
					{
						$sqlfilter ="SELECT * FROM enrollmentform WHERE stno='$stno' && grade='$grade'";
						$resultfilter = mysqli_query($db, $sqlfilter);
							while($row = mysqli_fetch_array($resultfilter))
							{
								$dbid=$row['id'];
							}
								$_SESSION['id']=$dbid;
								header('location:registerform.php');
						
					}
					else
					{
						echo"bad";
					}
				}
			else
				{
					echo'<script>sweetAlert("Sorry", "Your Enrolled Already this Grade!", "error");</script>';
				}	
	}


 ?>
<div class="container">
	
	<div class="row">
	<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="panel panel-primary" id="panel-panel">
				<div class="panel panel-heading">
					<div class="panel-title"><center><b>Online Enrollment</b></center></div>
				</div>
				<div class="panel-body">
			
				<form method="POST" action="onlinereg.php">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-4">
							</div>
							<div class="col-md-4">
							<center><label>Search Here For Grade: </label></center>
							<select name="grade" class="form-control">
							<option>Grade-7</option>
							<option>Grade-8</option>
							<option>Grade-9</option>
							<option>Grade-10</option>
							</select>
							</div>
							<div class="col-md-4">
							<button class="btn btn-success" name="searchbtn" style="margin-top: 25px;"><span class="glyphicon glyphicon-search"></span> Search</button>
							</div>
							<div class="col-md-4">
							</div>
						</div>
					</div>
				</form>
				</div>
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
	 <?php
		 	 }else{
		  		  echo "Can't isset Session";
		 	 }
		 	 ?>
		 	 