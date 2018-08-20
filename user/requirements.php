<?php 
include 'db.php';
session_start();

  
  if(isset($_SESSION['email'])){
    echo "<script>alert('Please Log out First!');location.href='enrollment.php';</script>";
  }

  if(isset($_SESSION['userchairman'])){
    echo "<script>alert('Please Log out First!');location.href='../chairman/index.php';</script>";
  }
  
  if(isset($_SESSION['useradmin'])){
    echo "<script>alert('Please Log out First!');location.href='../admin/index.php';</script>";
  }
  if(isset($_SESSION['usersuper'])){
    echo "<script>alert('Please Log out First!');location.href='../superadmin/index.php';</script>";
  }
 

 

  
?>
<!DOCTYPE html>
<html>
<title>Sampaguita High School</title>
<head>

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
 <?php
  if (isset($msg)) {
      echo $msg;
  }
  ?>

<?php 
include'../otherfiles/navbar.php';
 ?>



 

  <div class="container" id="container-body">
    <div class="row">

        <div class="container" id="Boxes">
        <h3 class="page-header">Step to Enroll thru Online</h3>


        <div class="col-md-3 justify-text ">
        <h3>1st Step</h3>
          <h4>Just Register and fill up the form regsiter as New Student, <br><br>
          <b>Note</b> That youre account is tempotary if youre new student or transferee</h4>

         </div>

        
        <div class="col-md-3 justify-text">
        <h3>2nd Step</h3>
           <h4>After registration as new student Login again as new and fill the Complete form for your Personal information </h4>
           <br><br>
         </div>

        
        <div class="col-md-3 justify-text">
        <h3>3rd Step</h3>
          <h4>After fill up the complete form wait until the chairman approve youre form or you can Print after that proof that youre already send a form thru online</h4>
         </div>

        </div>




        <div class="col-md-12 text-left">

          <h3 class="page-header">Requirements</h3>
          <?php 
          $sql = mysqli_query($db,"SELECT * FROM requirements");
          $row = mysqli_fetch_array($sql);
              $requirements = $row['description'];
          ?>

          <div class="text-left">
            <textarea readonly rows="30" cols="115"><?php echo $requirements; ?></textarea>
          </div>

          

          <!-- End of  Newssssss -->


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


