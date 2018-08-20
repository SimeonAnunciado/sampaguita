<?php 
include 'db.php';
session_start();

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
<body bgcolor="#45d9fd">

<nav class="navbar navbar-inverse navbar-fixed-top">
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
   
         <ul class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION['email'];?><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="enrollment.php">My Account</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
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
		<div class="col-md-2">
       <div class="panel "> 
         <div class="panel-heading text-center" style="background-color: #a3a1a1;"><h4 style="color:white;"> Menu </h4></div>
				<a class="list-group-item " href="activitylog.php">Activity</a>
				<a class="list-group-item" href="">Info</a>      
				<a class="list-group-item" href="changepass.php">Settng</a>
        </div>
       

		</div>
    <div class="col-md-8">
     

        
       <div class="panel ">  
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> My Activity </h4></div>
        <div class="panel-body">
        

        <table  class="table table-hover">
          <thead>
            <tr>

              <th class="text-center">Date</th>
              <th class="text-center">Grade</th>
              <th class="text-center">Activity</th>
            </tr>
          </thead>
          
        <?php
        $emailsession = $_SESSION['email'];
        
        $query = "SELECT * FROM enrollmentform WHERE email = '$emailsession' ORDER BY id desc limit 5 ";
        $res = mysqli_query($db,$query);
        while($row = mysqli_fetch_array($res)){
          ?>
          <tbody>
            <tr>
              <td class="text-center"><?php echo $row['date'];?></td>
              <td class="text-center"><?php echo $row['grade'];?></td>
              <td class="text-center"><a href="viewform.php?id=<?php echo $row['id'];?>" class="btn btn-primary">View</a></td>
              
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


</body>
</html>