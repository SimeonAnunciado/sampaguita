<?php 
include 'db.php';
session_start();
  
  if(!isset($_SESSION['email'])){
    header('location:index.php?login');
  }

?>
<!DOCTYPE html>
<html>
<head>


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

<nav class="navbar navbar-default navbar-fixed-top " > 
  <div class="container">
    <div class="navbar-header">
        <a class="navbar-brand">S.H.S</a>
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Enrollment <span class="caret"></span></a>
        <ul class="dropdown-menu">
        	<li><a href="enrollment.php">Enroll Now</a></li>
        	<li><a href="">Enroll Date</a></li>
        </ul>
        </li> 
        <li><a href="#">About</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
   
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email'];?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="activitylog.php">My Account</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>

      </ul>
    </div>
  </div>
</nav>
<br><br>
<br><br>
<br><br>

 

	<div class="row">
		<div class="col-md-1"></div>
		<!-- <div class="col-md-2">
			<div class="list-group">
				<a class="list-group-item active" href=""><?php echo $_SESSION['email'];?></a>
				<a class="list-group-item " href="activitylog.php">Activity</a>
				<a class="list-group-item" href="">Info</a>      
				<a class="list-group-item" href="">Settng</a>

			</div>

		</div>
      -->
   
      
      <?php   
      if (isset($msg)) {
      echo $msg;
      } 
      ?>
    <div class="col-md-10">
      <br>
      <br>


      

        <!-- eto -->
          <h4><b>Schedule Announcement</b></h4>
        
          <br>
          <?php 
   

          $query = mysqli_query($db,"SELECT * FROM calendar");

          while ($row = mysqli_fetch_array($query)) {
           
            ?>

             <!-- Date Anounce and Formay -->
  
                  <div class="col-md-4"> 
                  <div class="well well-lg text-center" > 
                <h1><?php echo date("Y",strtotime($row['day'])) .'<br>'; ?></h1>
                 <h1><?php echo date("M",strtotime($row['day'])) .'<br>'; ?></h1>
                 <h1> <?php echo date("d", strtotime($row['day'])). '<br>'; ?></h1>
                <h3 style="color: red;"><?php echo $row['event'];?></h3>
                  </div>
              </div> 
          
              <div style="margin-left: 50px;"></div>
           
                       
            <?php
          }

          ?>




      
     
    </div>
	</div>


   <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>This is a small modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>


 
</body>
</html>