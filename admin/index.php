<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
	header('location:../user/index.php');
		
	}



	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform" );
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];

	$start=0;
	$limit=4;

	$t=mysqli_query($db,"select * from enrollmentform where process ='pending'  ");
	$total=mysqli_num_rows($t);

	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
	}else{
		$id=1;
	}
	$page=ceil($total/$limit);

	$query=mysqli_query($db,"select * from enrollmentform  where process ='pending' limit $start,$limit ");


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
    <link rel="stylesheet" href="../css/style.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
     <link rel="stylesheet" href="../css/animate.css">
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
	<div class="container">

		<div class="row" style="padding-top:15px; padding-bottom: 70px;">
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
				<div class="panel-heading">Enrollment Forms 
				<?php 
				if (isset($_GET['id'])) {
					echo $_GET['id'];
				} 
				
				?></div>
				<div class="panel-body">
						<ul class="nav nav-tabs">
						  <li class="active"><a href="index.php">Pending Students</a></li> 
						  <li><a href="approve.php">Enrolled Students</a></li>
						</ul>
						<br>
				<form method="POST">
				<div class="row">
				<div class="col-md-3">
				<select class="form-control" name="gradefilter">
				<option value="Grade-7">Grade-7</option>
				<option value="Grade-8">Grade-8</option>
				<option value="Grade-9">Grade-9</option>
				<option value="Grade-10">Grade-10</option>
				</select>
				</div>
				<div class="col-md-3">
				<select class="form-control" name="secfilter">
				<option value="No Sections">No Sections</option>
				<option value="Have Sections">Have Sections</option>
				</select>
				</div>
				<div class="col-md-3">
				<button class="btn btn-success" name="btnfilter"><span class="glyphicon glyphicon-search"></span> Filter</button>
				</div>
				</div>
					<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				?>
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
				<?php
				if (isset($_POST['btnfilter']))
				{
					$gradefilter = $_POST['gradefilter'];	
					if($_POST['secfilter'] == 'No Sections')
					{
						$secfilter = '';
						$query = "SELECT * FROM enrollmentform where process = 'pending' && grade = '$gradefilter' && section ='$secfilter' limit $start,$limit";
					}	
					else
					{
						$query = "SELECT * FROM enrollmentform where process = 'pending' && grade = '$gradefilter' limit $start,$limit";
					}		
				$res = mysqli_query($db,$query);
				$numrows = mysqli_num_rows($res);
				}
				else
				{
				$query = "SELECT * FROM enrollmentform where process = 'pending' limit $start,$limit";
				$res = mysqli_query($db,$query);
				$numrows = mysqli_num_rows($res);
				}
				?>
				<div class="table-container table-responsive">
				<form method="GET">
				<table  class="table table-hover table-bordered table-condensed table-responsive">

					<thead>
						<tr>
							<th width="10%"><center>No</center></th>
							<th width="10%"><center>Surname</center></th>
							<th width="10%"><center>Lastname</center></th>
							<th width="10%"><center>Middlename</center></th>
							<th width="10%"><center>Year</center></th>
							<th width="10%"><center>Process</center></th>
							<th width="10%"><center>Section</center></th>
							<th width="30%"><center>Action</center></th>

						</tr>
					</thead>
					<tbody>
					
				<?php
				if($numrows !=0)
				{
				while($row = mysqli_fetch_array($res)){
					?>
						<tr>
							<td width="10%"><center><?php echo $row['id']; ?></center></td>
							<td width="10%"><center><?php echo $row['sname']; ?></center></td>
							<td width="10%"><center><?php echo $row['fname']; ?></center></td>
							<td width="10%"><center><?php echo $row['mname']; ?></center></td>
							<td width="10%"><center><?php echo $row['grade']; ?></center></td>
							<td width="10%"><center><?php echo $row['process']; ?></center></td>
							<td width="10%"><center><?php echo $row['section']; ?></center></td>
							<td width="20%">
							<center>
								<a href="updateprocess.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['fname'];?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-info-sign"></span> View</a>

								<!-- <a onclick ="return confirm('Are You Sure ?');" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-warning-sign"></span> Delete</a>
								-->
							</center>
							</td>
						</tr>
					
					<?php
						}
					?>
					<tr>
							<td colspan="8">		
								<center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></center>
							</td>
						</tr>

					<?php
				}
				else
				{
					?>
						<tr>
							<td colspan="8"><center><b><i>No Pending of Enrollee.<i></b></center></td>
						</tr>
						<tr>
							<td colspan="8">		
								<center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></center>
							</td>
						</tr>
					<?php
				}
				?>		
				</tbody>
				</table>
				</form>

				<!--pagination -->

					<center>
					 <ul class="pagination">
						 <?php if($id > 1) {
						 	?> <li class="active"><a  href="?id=<?php echo ($id-1) ?>">Previous</a></li><?php 
						 	}?>
						 <?php
						 for($i=1;$i <= $page;$i++){
						 ?>
							<li><a href="?id=<?php echo $i ?>"><?php echo $i;?></a></li>
						  <?php
						 }
						  ?>
						<?php if($id!=$page)
						//3!=4
						{
							?> 
						  <li><a href="?id=<?php echo ($id+1); ?>">Next</a></li>
						<?php 
					}
						?>
					 </ul>
				</center>
				<!--pagination -->



			</div>
			</div>
			</div>
			</div>	
			</div>


			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel"><center>Enrolee Students</center></h4>
				      </div>
				      <div class="modal-body">
				      		<div class="form-group">
							       	<div class="radio">
							  			<label><input type="radio" name="optradio" onclick="window.location='addstudent.php';"><b>New / Transfer Students</b></label>
									</div>
									<div class="radio">
							 			 <label><input type="radio" name="optradio" class="btn btn-success btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#myModal1"><b>Old Students</b></label>
									</div>
							</div>
						</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>
<!--modal oldstudent search-->
			<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				        <h4 class="modal-title" id="myModalLabel"><center>Old Students</center></h4>
				      </div>
				      <div class="modal-body">
				      	<form method="POST" id="searchform">
				      		<div class="form-group">
				      				<label> Student No. </label>
				      				<input type="text" class="form-control" name="searchstno" id="searchstno" placeholder="Enter Here Student Number..">
				      			<br>
				      			<div class="row">
				      				<div class="col-md-3">
				      				<input type="submit" name="glyphicon-info-signert" id="insert" value="Search" class="btn btn-success" />  
				      				</div>	
				      			</div>
				      		</div>
				      	</form>
						</div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				      </div>
				    </div>
				  </div>
				</div>

<script type="text/javascript">
$(document).ready(function(){
	$('#searchform').on("submit",function(event){
		event.preventDefault();
		  if($('#searchstno').val() == '')
			  {  
			   alert("Student Number is Required");  
			  }
		  else  
			  {  
			   $.ajax({  
			    url:"searchstno.php",  
			    method:"POST", 
			    data:$('#searchform').serialize(),  
			    beforeSend:function(){  
			     $('#insert').val("Searching");  
			    },  
			    success:function(data){ 
			 	window.location='addoldstudent.php'; 
			    }  
			   });  
			  } 
	});

});	
</script>

 <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
    
  </footer>
</body>
</html>
