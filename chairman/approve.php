<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['userchairman'])) {
	header('location:../user/index.php');
		
	}

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
	$total  =$total['total'];


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

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
        $query = mysqli_query($db,"SELECT * FROM chairman where kindofuser = '$_SESSION[userchairman]' AND userlvl = '$_SESSION[userlvl]' ");
         $row = mysqli_fetch_array($query);
         $row['sname'];

        if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        }elseif (isset($_SESSION['userchairman'])){
          //echo $_SESSION['userchairman'];e
        	echo $row['sname'];;
          
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
</nav>

	
	<!--end of navbar-->

		<div class="container">
		
		<div class="row" >
        <div class="col-md-3" id="panel-panel">
        		<?php include'sectionsidebar.php';?>
        </div>
			<div class="col-md-9">
			<div class="panel panel-primary" id="panel-panel">	
				<div class="panel-heading">Enrollment Forms</div>
				<div class="panel-body">
						<ul class="nav nav-tabs">
						  <li ><a href="index.php">Pending Students</a></li>
						  <li class="active"><a href="approve.php">Enrolled Students</a></li>
						</ul>
						<br>
				<form method="POST">
				<div class="row">
	
					<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				?>
				<div class="col-md-3 pull-right">
				<!--<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">-->
				</div>
				<div id="result"></div>

			</form>
	

				</div>
				<?php
				if(isset($_POST['btnfilter']))
				{
				$yearfilter = $_POST['yearfilter'];
				$gradefilter = $_POST['gradefilter'];					
				$query = "SELECT * FROM enrollmentform where process='enrolled' && schoolyear='$yearfilter' && grade = '$gradefilter'";
				$res = mysqli_query($db,$query);
				$numrows = mysqli_num_rows($res);
				}
				else
				{
				$userlvl=$_SESSION['userlvl'];	
				$date = date('Y');
				$query = "SELECT * FROM enrollmentform WHERE process='enrolled' && grade='$userlvl' && schoolyear='$date'";
				$res = mysqli_query($db,$query);
				$numrows = mysqli_num_rows($res);
				}
				?>
				<div class="table-container table-responsive">
				<form method="GET">
				<table  class="table table-hover table-bordered table-condensed">
					<thead>
						<tr>
							<th width="15%"><center>Student No.</center></th>
							<th width="10%"><center>Surname</center></th>
							<th width="10%"><center>Lastname</center></th>
							<th width="10%"><center>Section</center></th>
							<th width="10%"><center>Year</center></th>
							<th width="20%"><center>Process</center></th>
							<th width="30%"><center>Action</center></th>

						</tr>
					</thead>
					<tbody>
					
				<?php
				if($numrows !=0)
				{
				while($row = mysqli_fetch_array($res)){
					$process='enrolled';
					?>
						<tr>
							<td width="10%"><center><?php echo $row['stno']; ?></center></td>
							<td width="10%"><center><?php echo $row['sname']; ?></center></td>
							<td width="10%"><center><?php echo $row['fname']; ?></center></td>
							<td width="10%"><center><?php echo $row['section']; ?></center></td>
							<td width="10%"><center><?php echo $row['grade']; ?></center></td>
							<td width="10%"><center><?php echo $process?></center></td>
						

								
							
							<td width="15%">
							<center>
								<a href="updateapprove.php?stno=<?php echo $row['stno']; ?>&grade=<?php echo $row['grade']; ?>&section=<?php echo $row['section']; ?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-info-sign"></span> View</a>

								<!--
								<a onclick ="return confirm('Are You Sure ?');" href="deleteapprove.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-warning-sign"></span> Delete</a>
								-->
							</center>
							</td>
						</tr>
					
					<?php
						}
				}
				else
				{
					?>
						<tr>
							<td colspan="7"><center><b><i>No Enrollee.<i></b></center></td>
						</tr>
					<?php
				}
				?>		
				</tbody>	
				</table>
			</form>
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


	<script type="text/javascript">
		$("#search").on("input",function(){
			$search = $("#search").val();
			if($search.length>0){
				$.get("res.php",{"search":$search},function($data){
					$("#result").html($data);
				})
			}
		})
	</script>
</body>
</html>
