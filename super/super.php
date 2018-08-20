<?php 
require 'function.php';
require 'db.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High</title>

        
      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/animate.css"> 
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>


         <style type="text/css">
         	span:hover{
         	animation-name: bounce;
         	}

         	span {  
			  position: absolute;
			
			  -webkit-animation-duration: 1s;
			  animation-duration: 1s;
			  -webkit-animation-fill-mode: both;
			  animation-fill-mode: both;
			  -webkit-animation-timing-function: ease-in-out;
			  animation-timing-function: ease-in-out;
			  animation-iteration-count: 2.3;
			 -webkit-animation-iteration-count: infinite;
			  
			}
			span:hover {
			  cursor: pointer;
			  animation-name: bounce;
			  -moz-animation-name: bounce;
			}

         </style>

         
</head>
<body style="background: url('images/bgrough.jpg');  background-size: 30% 30%; background-repeat: repeat;">

<?php
session_start();

	if (!isset($_SESSION['stduser'])) {
		header('location:../super/index.php');
	}


?>

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

	
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container">
	      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="index.php">S.H.S</a>
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
          <li><a href=""><span class="glyphicon glyphicon-user"></span> <?php echo $_SESSION['stduser'];?></a></li> 
          <li><a href="../admin/logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li> 
          <ul>

      </ul>


	    </div>
	  </div>
	 </div>
	</nav>
	
	<!--end of navbar-->
	<div class="container">
	<div class="headerbg">
	<div class="row" >
	<div class="col-md-3">
	<center><img src="images/logo.png" style="width: 50%;" class="animated fadeInDown"></center>
	</div>
	<div class="col-md-9">
	<center><img src="images/lettering.png" style="width:90%; padding-top: 25px;" class="animated fadeIn"></center>
	</div>
	</div>
	</div>	

	<div class="row" style="margin-top: 10px;">
		<div class="col-md-10 text-right"></div>
		<div class="col-md-1 ">
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Create Content &nbsp;
                <span class="caret"></span> 
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                <li><a type="button" data-toggle="modal" data-target="#myModal">Add Chairman</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#Calendar">Add Calendar</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#Page">Add Photos</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#text">Add Post / Text</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#Page">Add Photos (Slideshow) </a></li>
              </ul>
            </div>
          </div>
	</div>


			<div class="row" style="margin-top: 20px;">
		<div class="col-md-1"></div>
		<div class="col-md-12" >
			<div class="panel panel-primary">
			  <div class="panel-heading">Super Admin </div>
			  <div class="panel-body" style="margin-top: 20px;">

			  	 <div class="col-md-4" >
                  <a href="" style="text-decoration: none; color:black;" ><div class="well dash-box text-center">
                    <div class="bounce"><h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php totalstudent(); ?> </h2></div>
                    <h4>Total Student</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
                <a href="./page/chairman.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true">
                    </span>
                    <?php chairman();?></h2>
                    <h4>Chairman</h4>
                  </div>
                 </a>
                </div>
                <div class="col-md-4 ">
              	  <a href="./page/post.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <?php totalpost();?></h2>
                    <h4>Photos</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
              	  <a href="./page/anounce.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    <?php totalanounce();?></h2>
                    <h4>Post / Text</h4>
                  </div>
                  </a>
                </div>
                
			  	
			  

			  </div>
			</div>
		</div>
	</div>
	</div>


	 <!-- Modal For Chairman -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add Chairman</h4>
        </div>
        <div class="modal-body">
        <!-- form -->
       	 <?php Addchairman(); ?>

          <form class="form-horizontal" action="" method="post">
          		<div class="form-group">
			    <label class="control-label col-sm-3" for="sname">Surname</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="fname">Firstname</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="user">Username</label>
			    <div class="col-sm-8">
			      <input type="text" class="form-control" id="user" name="user" placeholder="Username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Password:</label>
			    <div class="col-sm-8"> 
			      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
			    </div>
			  </div>
			  <div class="form-group">
				  <label for="sel1" class="control-label col-sm-3">Gender</label>
				  <div class="col-sm-4">
				  <select class="form-control" id="sel1" name="gender">
				  	<option disabled selected="">Gender</option>
				    <option value="female">Female</option>
				    <option value="male">Male</option>
		
				  </select>
				  </div>
				</div>

			  <div class="form-group">
				  <label for="sel1" class="control-label col-sm-3">Chairman</label>
				  <div class="col-sm-4">
				  <select class="form-control" id="sel1" name="chair">
				  	<option disabled selected="">Chairman</option>
				    <option value="grade7">Grade 7</option>
				    <option value="grade8">Grade 8</option>
				    <option value="grade9">Grade 9</option>
				    <option value="grade10">Grade 10</option>
				  </select>
				  </div>
				</div>

			  <div class="form-group"> 
			    <div class="col-sm-offset-3 col-sm-8">
			      <button type="submit" name="chairmanbtn" class="btn btn-default">Submit</button>
			    </div>
			  </div>
        

			</form>
        <!-- form -->


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>

	<!-- modal chairman -->



	<!-- Add Calendar -->

	  <div class="modal fade" id="Calendar" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add Calendar</h4>
        </div>
        <div class="modal-body">

       		 <form class="form-horizontal" method="POST" action="">
       		 <?php calendar(); ?>
					<div class="form-group">
					<label class="col-md-3 control-label" for="date">Date</label>
						<div class="col-md-7"> 
						<input type="date" name="date" id="date" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-3 control-label" for="event">Event</label>
						<div class="col-md-7"> 
						<textarea name="event" id="event" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-8 btn-md"> 
							<button type="submit" class="btn btn-primary" name="calendar" required>Add</button>
						
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

	<!-- Add Calendar -->




	<!-- Add Post -->

	  <div class="modal fade" id="Page" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center">Add Post</h4>
	        </div>
	        <div class="modal-body">

			
	        <form action="" method="POST" enctype="multipart/form-data">
	        <?php AddPhotos(); ?>
			<div class="form-group">
		        <label for="file"></label> 
				<input type="file" name="file" id="file" class="form-control" name="file" required>
			</div>

		    <div class="form-group">
		      <label for="comment">Comment:</label>
		      <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
		    </div>
		     <button type="submit" name="submit" class="btn btn-info">Submit</button>
		  </form>

	          </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>


	<!-- Add Post -->

	<!-- Add Post /text  -->
	 <div class="modal fade" id="text" role="dialog">
	    <div class="modal-dialog modal-md">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <h4 class="modal-title text-center">Add Anounce</h4>
	        </div>
	        <div class="modal-body">

			
	        <form action="" method="POST">
			<?php addtext(); ?>
		    <div class="form-group">
		      <label for="comment">Comment:</label>
		      <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
		    </div>
		     <button type="submit" name="wew" class="btn btn-info">Submit</button>
		  </form>

	          </div>
	        <div class="modal-footer">
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		      </div>
		    </div>
		  </div>
		</div>
	<!-- End Add Post /text  -->





			
</body>
</html>
