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

$qUery = mysqli_query($db,"SELECT * FROM aboutus");
$res = mysqli_fetch_array($qUery);
      $mission = $res['mission'];
      $vision = $res['vission'];

 ?>



 
<div id="showcase-about-us">
  
</div>

  <div class="container text-justify" id="container-body">
    <div class="row">

         <div class="col-md-12 text-left">

          <h3 class="page-header text-center">About us</h3>



          <div class="text-justify">
            <p>School History
              Sampaguta High School was established in July of 1997. Its former name was Bagumbong High School Sampaguta Annex since it was an annex of Bagumbong High School which is located at 11 Paraiso St. Sampaguita Subdivision, Camarin Caloocan City. It housed only a meager 163 students managed by four teachers; Ms. Milagros Manalo, Mrs. Lilimay C. Dela Cruz, Ms. Carmencita Servo and Mr. Gerardo Bartolome. The principal then was Mr. Estaquio G. Gagara. At that time, Sampaguita High School was just a six-classroom building.
              </p>
              <p>
              In  2004, the new OIC of Sampaguita High, Mr. Tolentino Aquino, who was then the Education Supervisor I in English worked for the constsruction of the covered court from the funds of the local government under Mayor Reynaldo Malonzo.
              From July 2004 to May 2010, major transformations were seen under the leadership of Dr. Marissa B. Feliciano who started as an OIC until she became Principal 2 in 2010. Bulletin boards were made,  organizational charts were visible. The cleanliness of the campus and the classrooms were strictly monitored.
              Under the supervision of Dr. Feliciano, the teachers became used to demo teaching using the collaborative approach. The teachers were kept up-to-date with the latest teaching strategies and innovations through serious In-Service Trainings not to mention the sending of many teachers to seminars and trainings. 
              </p>
              <p>
              By the end of 2007, the teacher population increased to 38 and the students to 1,701.
              Since then, Sampaguita High became a performing school with division, national and regional winnings in different competitions. 
              Also in 2007, Sampaguita High School was granted  its independence and it was resolved through Dr. Teresita Domalanta, DepEd NCR Director IV. This was also made possible through the help of Dr. Marissa Feliciano and the then Division Superintendent Elizabeth Manalo.
              </p>
          </div>

          <!-- End of  Requirements -->

          <h3 class="page-header text-center">Mission</h3>
            <div class="text-justify"> 
               <textarea rows="13" cols="115" readonly=""><?php echo $mission; ?></textarea>
            </div>
          
          <br>

          <h3 class="page-header text-center">Vision</h3>
            <div class="text-justify"> 
               <textarea rows="10" cols="115" readonly=""><?php echo $vision; ?></textarea>
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


