<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['userlvl'])) {
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
    <link rel="stylesheet" href="CSS/animate.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body  style="background: url('images/bgrough.jpg');  background-size: 15% 15%; background-repeat: repeat;">
	
<?php
		include'navbar.php';
?>
	
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
				<?php 
		include'letterhead.php';

		?>
		<div class="row" style="padding-top: 30px;">
			<div class="col-md-3">
					<?php include'sectionsidebar.php' ?>
			</div>
			<div class="col-md-9">
			<div class="panel panel-primary">	
				<div class="panel-heading"><center><b>SECTION FORM</b></center></div>
				<?php
				$stno = $_SESSION['stno'];
				$name = $_SESSION['name'];
				$grade = $_SESSION['grade'];
				$avg = $_SESSION['average'];
				$schoolyear = $_SESSION['schoolyear'];
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
					</form>
					<hr>
				<?php
					$con1 = mysqli_connect('localhost','root','','enrollment');
					$sql = "SELECT * FROM sectionlist WHERE grade='$grade' && schoolyear = '$schoolyear'";
					$result = mysqli_query($con1, $sql);
					$numrows = mysqli_num_rows($result);
							?>
							<div class="table-responsive">
							<table  class="table table-hover table-bordered table-condensed">
							<thead>
									<tr>
										<td><center><b>Sections</b></center></td>
										<td><center><b>Adviser</b></center></td>
										<td><center><b>Number of Students</b></center></td>
										<td><center><b>Action</b></center></td>
									<tr>
							</thead>
							<tbody>
							 		<?php
							 		if($numrows != 0)
							 		{
									while($row = mysqli_fetch_array($result))
								{
									$sectionname = $row['sectionname'];
									$adviser = $row['adviser'];
										$sql2 ="SELECT count(id) FROM enrollmentform WHERE section ='$sectionname' && grade='$grade' && schoolyear ='$schoolyear'";
										$result2=mysqli_query($con1, $sql2);
											while($row1 = mysqli_fetch_array($result2))
											{
												$countstudents = $row1['0'];
								?>
									<tr>
										<td><center><?php echo"$sectionname";?></center></td>
										<td><center><?php echo"$adviser";?></center></td>
										<td><center><?php echo"$countstudents";?></center></td>
										<td><center><a href="sectionprocess.php?section=<?php echo"$sectionname";?>&adviser=<?php echo"$adviser";?>" class="btn btn-success btn-sm" name="enroll">Enroll Here</a>
										<a href="studentdelete.php?section=<?php echo"$sectionname";?>" class="btn btn-warning btn-sm" name="unenroll">Un-Enroll Here</a></center></td>
									</tr>
									<?php
											}	
									}
								}
									else{
										?>
										<tr>
											<td colspan="4"><center><b><i>No sections for <?php echo"$schoolyear";?> school year!!</i></b></center></td>
										</tr>
									<?php
									}
									?>
							</tbody>
							</table>
						</div>
						<a href="index.php" class="btn btn-success btn-lg" name="done">DONE</a>
						&nbsp;	
						<a href="printsection.php" class="btn btn-info btn-lg pull-right" name="print"><span class="glyphicon glyphicon-print"></span> PRINT</a>
				</div>
			</div>
		
			</div>	
			</div>
			</div>
</body>
</html>