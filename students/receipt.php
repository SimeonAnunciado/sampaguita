<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['section']))
{
  header('location:registerform.php');
}

?>
<!DOCTYPE html>
<html>
<head>
<title>Sampaguita High School</title>
      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
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


    <?php 
    if (isset($_GET['ok'])) {
        echo '<script language="javascript">';
        echo 'swal("Successfull!")';  
        echo '</script>';
      }
  ?>
     
  <div class="container">
  <div class="row">
    <div class="col-md-1"></div>
    
    <div class="col-md-10">
      

      <div class="panel panel-primary" >
        <div class="panel-heading" style="background-color: #a3a1a1;">
      <h4 style="color:white;"> Form </h4></div>
        <div class="panel-body">

        <div class="row">
          <div class="col-md-4"><b>Surname :</b><span> <?php echo $_SESSION['surname']; ?></span> </div>
          <div class="col-md-4"><b>Firstname :</b><span> <?php echo $_SESSION['firstname']; ?></span> </div>
          <div class="col-md-4"><b>Middlename :</b><span> <?php echo $_SESSION['middlename']; ?></span> </div>
        </div>
          
         <div class="row" >
          <div class="col-md-4 "><b>Section :<span><?php echo $_SESSION['section']; ?></span></b></div>
          <div class="col-md-4 "><b>Year :</b><span> <?php echo $_SESSION['dbgrade']?></span></div>
          <?php 
          $stno = $_SESSION['dbstno'];
           $grade = $_SESSION['dbgrade'];
          $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE stno='$stno' && grade ='$grade'");
          if ($date = mysqli_fetch_array($sql)) {
            ?>
          <div class="col-md-4"><b>Date Registered :</b><span><?php echo $date['date']; ?></span></div>

            <?php

          }
          ?>

        </div>


        <br><br><hr><br>
        <table class="table table-hover" ">
        <thead>
        <tr>
          <th>Subject</th>
        </tr>
        </thead>
        <tbody>
          <?php
            $grade = $_SESSION['grade'];

            if ($grade =='Grade-7') {
              $query = mysqli_query($db,"SELECT * FROM `subjectlist` WHERE grade = 'Grade-7'");
                while($res = mysqli_fetch_array($query))
                {
                  ?>
                  <tr>
                  <td><?php echo $res['subjecttitle'];?></td>
                  </tr>
                  <?php
                }

                  
            }
            elseif($grade=='Grade-8'){
                $query = mysqli_query($db,"SELECT * FROM `subjectlist` WHERE grade = 'Grade-8'");
                  while($res = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td><?php echo $res['subjecttitle'];?></td>
                    </tr>
                    <?php
                    }
            }
            elseif($grade =='Grade-9'){
                $query = mysqli_query($db,"SELECT * FROM `subjectlist` WHERE grade = 'Grade-9'");
                  while($res = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td><?php echo $res['subjecttitle'];?></td>
                    </tr>
                    <?php
                }
            }
            elseif($grade =='Grade-10'){
                $query = mysqli_query($db,"SELECT * FROM `subjectlist` WHERE grade = 'Grade-10'");
                  while($res = mysqli_fetch_array($query)){
                    ?>
                    <tr>
                    <td><?php echo $res['subjecttitle'];?></td>
                    </tr>
                    <?php
                }
            }
          

          ?>
          
        </tbody>
      </table>

        
    
        </div>
      </div>
      <div class="row text-right">
            <div class="col-md-12"> 
            <button class="btn-lg btn-info hidden-print" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Print</button>
             </div>
         </div>
         <br> <br>  


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
