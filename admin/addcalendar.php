<?php 
require 'db.php';

	if (isset($_POST['submit'])) {
		$date = $_POST['date'];
		$event = $_POST['event'];

		$sql = "INSERT INTO calendar (day,event) VALUES ('$date','$event')";
		$query = mysqli_query($db,$sql);

		if($query){
			header('location:calendar.php?ok');
		}else{
			header('location:calendar.php?x');	
			
		}
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
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body style="background: url('images/bgrough.jpg');  background-size: 30% 30%; background-repeat: repeat;">
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
     <img src="images/logo.png" style="width:50px;">
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
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>

      </ul>


	    </div>
	  </div>
	 </div>
	</nav>
	
	<!--end of navbar-->

		<div class="container">
		<div class="row">
		<?php include'letterhead.php';?>
		</div>
		<div class="row" style="padding-top: 30px;">
			<div class="col-md-3">
				<div class="list-group">
					<a href="" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Admin</a>
					<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-send"></span> Online Enrollment<span class="badge"><?php echo $total;?></span> </a>
					<a href="subjects.php" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Subjects</a>
					<a href="sections.php" class="list-group-item"><span class="glyphicon glyphicon-equalizer"></span> Manage Sections</a> 
					<a href="calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Announcements </a>
					<a href="listofuser.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Student Account's List</a>
					<a href="enrolleedashboard.php" class="list-group-item"><span class="glyphicon glyphicon-signal"></span> Graphs</a> <!-- registeruser.php-->
				</div>
			</div>
	<div class="col-md-9">
			<div class="panel panel-primary">	
				<div class="panel-heading">Calendar</div>
				<div class="panel-body">

			
				<!-- Calendar-->

				<form class="form-horizontal" method="post" action="">
					<div class="form-group">
					<label class="col-md-2 control-label" for="date">Date</label>
						<div class="col-md-4"> 
						<input type="date" name="date" id="date" class="form-control" required>
						</div>
					</div>
					<div class="form-group">
					<label class="col-md-2 control-label" for="event">Event</label>
						<div class="col-md-4"> 
						<textarea name="event" id="event" class="form-control"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-offset-5 btn-md"> 
							<button type="submit" class="btn btn-primary" name="submit" required>Add</button>
						
						</div>
					</div>
				</form>
				</div>
			</div>
			</div>
	</div>


</body>
</html>

	<!-- Calendar -->
				<!--<?php /*
				$query ='SELECT * FROM calendar';
				$result = mysqli_query($db,$query) ; 
				while ($row = mysqli_fetch_array($reuslt)) {
					?>

					<?php
				
				?>*/