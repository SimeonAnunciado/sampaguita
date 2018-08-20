<?php
include '../function.php';
require '../db.php';
session_start();

	if (!isset($_SESSION['stduser'])) {
		header('location:../login.php');
		}


?>



<!DOCTYPE html>
<html>
<head>
	<title>	Super Admin</title>

      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="/css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  
	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">

    <script type="text/javascript">
    	$(document).ready(function(){
    		$("#modal").load(function(){
    			$(this).modal('hide');

    		})

    	});
    </script>
</head>
<body>
		<!-- navbar -->
			<nav class="navbar navbar-inverse navbar-fixed-top ">
			  <div class="container">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span> 
			      </button>
			    </div>
			    <div class="collapse navbar-collapse" id="myNavbar">
			      <ul class="nav navbar-nav">
			        <li><a href="../index.php">Home</a></li>
			     	<li><a href="../page/post.php">Post</a></li>
			        <li><a href="../page/chairman.php"">Chairman</a></li> 
			      </ul>
			      <ul class="nav navbar-nav navbar-right">
			    	  <li><a href="../../logout.php">
			    	  <?php 
			    	  $user = $_SESSION['stduser'];
			    	  $sql = mysqli_query($db,"SELECT * FROM chairman WHERE username = '$user' ");
			    	  if($row = mysqli_fetch_array($sql)){
			    	  echo $row['chairman'];
			    	  }
			    	  ?>


			          </a></li>

			        <li><a href="logout.php"><span class="glyphicon glyphicon-user"></span>
			         <?php echo $_SESSION['stduser'];?></a></li>

			        <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
			      </ul>
			    </div>
			  </div>
			</nav>
		<!-- navbar -->


	<div class="row" style="margin-top: 80px;">
		<div class="col-md-9 text-right"></div>
		<div class="col-md-1 ">
            
          </div>

	</div>
	<div class="row" style="margin-top: 50px;">
		<div class="col-md-1"></div>
		<div class="col-md-10" >
			<div class="panel panel-primary">
			  <div class="panel-heading">Chairman </div>
			  <div class="panel-body" style="margin-top: 20px;">

			  		<table class="table table-condensed table-responsive table-bordered table-condensed" style=" margin-bottom: 10px;" >
					<thead>
						<tr>
							<th class="text-center success" 
							hidden="<?php echo $row['id']; ?>">Id</th>
							<th class="text-center ">Surname</th>
							<th class="text-center " >First name</th>
							<th class="text-center ">User</th>
							<th class="text-center ">Password</th>
							<th class="text-center ">Grade</th>
							<th class="text-center "> Action</th>
							

						</tr>
					</thead>
					
				<?php

				$res = mysqli_query($db,"SELECT * FROM chairman ");
				while($row = mysqli_fetch_array($res)){
					  //$id  = $row['id'];
					?>
					<tbody>
						<tr>
							 <td class="text-center"><?php echo $row['id'];?></td>
						     <td class="text-center"><?php echo $row['sname'];?></td>
							 <td class="text-center"><?php echo $row['fname']; ?></td>
							 <td class="text-center"><?php echo $row['username']; ?></td>
							 <td class="text-center"><?php echo $row['chairman']; ?></td>

							
							<td class="text-center">
							<?php view(); ?>

								<a href="view.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm" >View <span class="glyphicon glyphicon-trash"></span></a> 


								<!-- <a href="../update.php?id=<?php echo $row['id']; ?>" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal">View <span class="glyphicon glyphicon-trash"></span></a> -->

								<a onclick ="return confirm('Are You Sure ?');" 
								href="../deletechairman.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm">Delete <span class="glyphicon glyphicon-trash"></span></a>

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



		 <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center">Add Post</h4>
	        </div>
	        <div class="modal-body">

			<div class="row">
			<div class="col-sm-4"></div>
			<div class="col-sm-4">
	         <img src="../../images/women.jpg" class="img img-responsive" alt="Cinque Terre" width="136" height="140" >
	         </div>
			<div class="col-sm-4"></div>

	         </div>


          <form class="form-horizontal" action="" method="post">

       	 <?php Addchairman(); ?>


          		<div class="form-group">
			    <label class="control-label col-sm-3" for="sname">Surnamee</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="fname">Firstname</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="user">Username</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="user" name="user" placeholder="Username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Password:</label>
			    <div class="col-sm-7"> 
			      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
			    </div>
			  </div>
			  <div class="form-group">
				  <label for="sel1" class="control-label col-sm-3">Chairman</label>
				  <div class="col-sm-4">
				  <select class="form-control" id="sel1" name="chair">
				  	<option disabled selected="">Chairman</option>
				    <option value="7">Grade 7</option>
				    <option value="8">Grade 8</option>
				    <option value="9">Grade 9</option>
				    <option value="10">Grade 10</option>
				  </select>
				  </div>
				</div>

			  <div class="form-group"> 
			    <div class="col-sm-offset-3 col-sm-7">
			      <button type="submit" name="chairmanbtn" class="btn btn-success">Update</button>
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
		</div>


        <!-- form -->



	<!-- end modal -->









  	    <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrapValidator.js"></script>

</body>
</html>