<?php
require 'db.php';
session_start();

if (isset($_GET['id'])) {
      $sid = $_GET['id'];
      $_SESSION['sessiongetid'] = $_GET['id'];

  }
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
<nav class="navbar navbar-default "> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li><a href="onlinereg.php"><span class="glyphicon glyphicon-pencil"></span> Online Enrollment</a></li>
          <li><a href="activitylog.php"><span class="glyphicon glyphicon-info-sign"></span>  Activity Log</a></li> 
        <li><a href="oldstudent.php"><span class="glyphicon glyphicon-user"></span> My Account </a></li> 
      </ul>
     
            <ul class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['usernameold'];?></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>

    </div>
  </div>
</nav>

<div class="container">
	<div class="row">
		    <div class="col-md-12">
         
       <div class="panel panel-primary" id="panel-panel" >
       <div class="panel-heading">Personal Information</div>
        <div class="panel-body">
       <?php

       $adviser = $_GET['adviser'];
       $year = $_GET['sy'];

        $usersession = $_SESSION['usernameold'];




        
        
  
          $query = "SELECT * FROM enrollmentform WHERE id = '$sid' 
          AND process = 'enrolled'  ORDER BY date  ";
        $res = mysqli_query($db,$query);
        while($row = mysqli_fetch_array($res))
              
          
      
              
          {

           

          ?>
          <div class="row">
          <div class="col-md-8"><strong>Name: </strong> <?php echo $row['sname'] .' ,'.$row['fname'] .' '.$row['mname'].'.';?></div>
        
          <div class="col-md-4 text-right"><strong>School Year :</strong>
          <?php  echo $year; ?></div>
          <div class="col-md-8" style="margin-top: 20px;"><strong>Section :</strong> <?php echo $row['section']; ?></div>
          <div class="col-md-4 text-right" style="margin-top: 20px;"><strong>Adviser :</strong><?php echo $adviser; ?></div>
          <div class="col-md-8" style="margin-top: 20px;"><strong>Grade : </strong><?php echo $row['grade'];?>

        </div>
        <div class="col-md-8" style="margin-top: 20px;"><strong>Date Enrolled : </strong><?php echo $row['date'];?>
          
        </div>

      
        </div>
         <div style="text-align: center;"><br><hr><b>Student's Form</b><hr><br></div>

         <div class="col-md-8"><strong>Surname :</strong> <?php echo $row['sname'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Firstname :</strong> <?php echo $row['fname'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Middlename :</strong> <?php echo $row['mname'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Email :</strong> <?php echo $row['email'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Place Of Birth :</strong> <?php echo $row['placeofbirth'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Gender :</strong> <?php echo $row['gender'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Date of Birth :</strong> <?php echo $row['dateofbirth'];?></div>
          <br><br>
         <div class="col-md-8"><strong>Age :</strong> <?php echo $row['age'];?></div>

         <div style="text-align: center;"><br><hr><b>Guardians</b><hr><br></div>

         <div class="col-md-8"><strong>Father :</strong> <?php echo $row['father'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Father Occupation :</strong> <?php echo $row['fatheroccupation'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Father Contact Num. :</strong> <?php echo $row['fathercontact'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Mother :</strong> <?php echo $row['mother'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Mother Contact Num.:</strong> <?php echo $row['motheroccupation'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Mother :</strong> <?php echo $row['mothercontact'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Mother :</strong> <?php echo $row['address'];?></div>
         <div style="text-align: center;"><br><hr><b>School Background</b><hr><br></div>
         <div class="col-md-8"><strong>Elementary Graduate</strong> <?php echo $row['elementarygraduated'];?></div>
         <br><br>
         <div class="col-md-8"><strong>Average:</strong> <?php echo $row['average'];?></div>

         <div class="col-md-5" style="padding-top: 30px;">
           <!-- <button class="btn btn-info text-center" onclick="window.print()">Print</button> 
            <a href="pdf.php" target="_blank" class="btn btn-info">Print</a> -->

            

         </div>

         <?php
        }
        ?> 

      
        


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: silver;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><center><b>Terms and Agreement</b></center></h4>
      </div>
      <div class="modal-body">
         <label style="font-size: 18px;"><b>For Parents / Guardian</b></label><br>
         <label style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;I hereby agree and submit my child to the school program, academic, disciplinary regulations and all other requirements instituted by this school and furthermore, I will abide myself to comply with the school fees implied by this institution.</label>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnaccept" class="btn btn-primary" onclick="">Accept</button>
      </div>
    </div>
  </div>
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
</body>
</html>