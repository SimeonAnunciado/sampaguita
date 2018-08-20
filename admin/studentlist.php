<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['user'])) {
	header('location:../user/index.php');
		
	}

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
    

<br><br>

	
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

		<div class="row" style="padding-top: 30px;">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div class="list-group">
				
					<a href="" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Admin</a>
					<a href="studentlist.php" class="list-group-item">All Student</a>
					<a href="calendar.php" class="list-group-item">Add Calendar</a>
					<a href="" class="list-group-item">List of User</a> <!-- registeruser.php-->
					<a href="" class="list-group-item">All Student</a>
				</div>
			</div>
			<div class="col-md-8">
			<div class="panel panel-primary">	
				<div class="panel-heading">List</div>
				<div class="panel-body">
				<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				?>
				<form>
				<div class="col-md-3">
				<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">
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

				<table  class="table table-hover-bordered">
					<thead>
						<tr>
							<th>No</th>
							<th>Surname</th>
							<th>Lastname</th>
							<th>Middlename</th>
							<th>Gender</th>
							<th width="550">Action</th>

						</tr>
					</thead>
					
				<?php
				$query = "SELECT * FROM `enrollmentform` ";
				$res = mysqli_query($db,$query);
				while($row = mysqli_fetch_array($res)){
					?>
					<tbody>
						<tr>
							<td><?php echo $row['id']; ?></td>
							<td><?php echo $row['sname']; ?></td>
							<td><?php echo $row['fname']; ?></td>
							<td><?php echo $row['mname']; ?></td>
							<td><?php echo $row['gender']; ?></td>
						

							
							<td>
								<a href="update.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['fname'];?>" class="btn btn-success btn-sm">View</a>
								<a onclick ="return confirm('Are You Sure ?');" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
							</td>
						</tr>
					</tbody>
					
					<?php
				}
				?>		
					
				</table>
				</div>
			</div>
			</div>
			
			</div>	
			</div>
</body>
</html>
