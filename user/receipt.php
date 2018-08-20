<?php 
require 'db.php';
session_start();
if(!isset($_SESSION['section']))
{
  header('location:enrollment.php');
}
if (!isset($_SESSION['email'])) {
   header('location:enrollment.php');
  
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


   <nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
       </button>
      </div>
      <ul class="nav navbar-nav">
      <li ><a href="index.php"><strong>Welcome</strong> Student</a></li>
      </ul>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
              <?php
              if (isset($_SESSION['email'])) {
                  echo $_SESSION['email'];
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
      

      <div class="panel panel-primary">
        <div class="panel-heading" style="background-color: #a3a1a1;">
      <h4 style="color:white;"> Form Receipt</h4></div>
        <div class="panel-body">

        <div class="row">
          <div class="col-md-4"><b>Surname :</b><span> <?php echo $_SESSION['surname']; ?></span> </div>
          <div class="col-md-4"><b>Firstname :</b><span> <?php echo $_SESSION['firstname']; ?></span> </div>
          <div class="col-md-4"><b>Middlename :</b><span> <?php echo $_SESSION['middlename']; ?></span> </div>
        </div>
          
         <div class="row" >
          <div class="col-md-4 "><b>Section :<span><?php echo $_SESSION['section']; ?></span></b></div>
          <div class="col-md-4 "><b>Year :</b><span> <?php echo $_SESSION['grade']?></span></div>
          <?php 
          $emailsession = $_SESSION['email'];
          $sql = mysqli_query($db,"SELECT * FROM enrollmentform WHERE email = '$emailsession' ");
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

      <?php 

      ?>

     <a href="pdf.php" class="btn btn-info">Print</a>




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
