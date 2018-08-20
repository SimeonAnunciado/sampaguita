<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
		header('location:login.php?login');
	}
$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];
?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High Schol</title>

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
	

		</div>
		<div class="container">
	
		<br>
		<div class="row" style="padding-top: 15px; padding-bottom: 120px;">
			<div class="col-md-3">
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
			<div class="panel-heading">Announcements</div>
			<div class="panel-body">

				<!-- Calendar -->

				<?php
					if (isset($_GET['ok'])) {
							  echo '<script language="javascript">';
							  echo 'swal("ok a message!")';  
							  echo '</script>';
					}
					if (isset($_GET['x'])) {
						      echo '<script language="javascript">';
							  echo 'sweetAlert("Oops...", "Theres Something Error", "error");';  
							  echo '</script>';
					}
				 ?>
				<!-- Calendar -->


				</div>
				<div class="table-container">	
				<br>
				<table class="table table-bordered table-hover table-repsonsive" 
				style="margin: -40px 0px 10px 0px;">
				<br>
					<thead>
						<tr>
							<th width="100"><center>Date</center></th>
							<th><center>Event</center></th>
							<th width="100"><center>Action</center></th>
						</tr>
					</thead>

				<!-- Calendar -->
				<?php
				$query ='SELECT * FROM calendar';
				$result = mysqli_query($db,$query) ; 
				while ($row = mysqli_fetch_array($result)) {
					?>
					<tbody>
						<tr>
							<td><center><?php echo $row['day']; ?></center></td>
							<td><center><?php echo $row['event']; ?></center></td>
							<td>
								<center><a href="del.php?id=<?php echo $row['id']; ?>" onclick="return confirm();" class="btn-sm btn-danger"><span class="glyphicon glyphicon-trash"></span>&nbsp;Delete</a></center>
							</td>
							
						</tr>
								<?php
				}
				?>
						
					</tbody>
	
				<!-- Calendar -->
	
			
				</table>
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
