<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
	header('location:../user/index.php');
		
	}

	//$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	//$total = mysqli_fetch_array($res);    
	//	$total  =$total['total'];


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
				<div class="panel-heading">Advisory Section</div>
				<div class="panel-body">
				<form method="">
					<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				$section = $_GET['section'];
				$schoolyear = $_GET['schoolyear'];
				$con1 = mysqli_connect('localhost','root','','enrollment');
				$sql1 = "SELECT * FROM sectionlist WHERE sectionname ='$section' && schoolyear ='$schoolyear'";
				$result = mysqli_query($con1, $sql1);
						while($row = mysqli_fetch_array($result))
						{
							$adviser = $row['adviser'];
							$grade = $row['grade'];
							$section = $row['sectionname'];
						}
						$_SESSION['adviser'] = $adviser;
						$_SESSION['section'] = $section;
						$_SESSION['schoolyear'] = $schoolyear;
				?>
				<div class="row">
				<div class="col-md-4">
				<label class="control-label">&nbsp;Adviser</label>
				<label class="form-control" readonly><center><?php echo $adviser;?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Section</label>
				<label class="form-control" readonly><center><?php echo $section; ?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Grade:</label>
				<label class="form-control" readonly><center><?php echo $grade; ?></center></label>
				</div>
				<div class="col-md-2">
				<label class="control-label">&nbsp;Schoolyear</label>
				<label class="form-control" readonly><center><?php echo$_GET['schoolyear']; ?></center></label>
				</div>
				</div>
				<hr>
				<div class="row">
				<div class="col-md-3 pull-right">
				<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">
				</div>
				</div>
				<div id="result"></div>

			</form>
	

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
				</div>
				<form method="POST">
				<table  class="table table-hover table-bordered table-condensed table-responsive ">
				<?php
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql2 = "SELECT * FROM enrollmentform WHERE section='$_GET[section]' && schoolyear='$_GET[schoolyear]' ORDER BY fname ASC";
					$result2 = mysqli_query($con, $sql2);
					$numrows2 = mysqli_num_rows($result2);
				?>
					<thead>
						<tr>
							<th width="20%"><center>Students Number</center></th>
							<th width="20%"><center>Name</center></th>
							<th width="20%"><center>Gender</center></th>
							<th width="20%"><center>Age</center></th>
							<th width="20%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>			
						<?php
								if($numrows2 != 0)	
										{

												while($row2 = mysqli_fetch_array($result2))
												{
													$dbstno = $row2['stno'];
													$dbname= $row2['fname'].' '.$row2['sname'];
													$dbgender = $row2['gender'];
													$dbage = $row2['age'];
										?>
												<tr>
												<td><center><?php echo $dbstno; ?></center></td>
												<td><center><?php echo $dbname; ?></center></td>
												<td><center><?php echo $dbgender; ?></center></td>
												<td><center><?php echo $dbage; ?></center></td>
												<td width="15%">
													<center>
													<a href="transferstudent.php?stno=<?php echo$dbstno;?>&gender=<?php echo$dbgender;?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-move"></span> Transfer </a>
													</center>
												</td>
												</tr>

										<?php 
										}

										?>	
																					
										<?php
								}
								else
								{
									?>
										<tr>
												<td colspan="6"><center><b>" No Student's Found! "</b></center> </td>
										</tr>
									<?php
								}
										?>


				</tbody>
				</table>
				</form>
				<div style="padding-bottom: 10px;">
				&nbsp;&nbsp;
				<a href="sections.php" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-backward" ></span> BACK </a>
				<a href="pdfsection.php?section=<?php echo $section; ?>&adviser=<?php echo $adviser; ?>&grade=<?php echo $grade; ?>" target="_blank" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-print" ></span> Print </a>
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

