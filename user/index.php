<?php 
include 'db.php';
session_start();
 

 /* if(isset($_SESSION['email'])){
    
     echo"Please Log out your session";

  }else if(isset($_SESSION['usersuper'])){

     echo "<script>alert('Youre in Current Session. Please Logout first!');
     location.href='../superadmin/index.php'; </script>";

    }elseif(isset($_SESSION['userchairman'])){

    echo "<script>alert('Youre in Current Session. Please Logout first!');
    location.href='../chairman/index.php'; </script>";


  }elseif (isset($_SESSION['useradmin'])){

    echo "<script>alert('Youre in Current Session. Please Logout first!');
    location.href='../admin/index.php'; </script>";
    
  }/*elseif (isset($_SESSION['usernameold'])){

    echo "<script>alert('Youre in Current Session. Please Logout first!');
    location.href='../students/oldstudent.php'; </script>";

  }*/
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

<header id="showcase">
  
</header>

  



 

  <div class="container">

    <div class="row">
      <div class="col-md-9 content" >

       <h3 class="page-header news">News</h3>
        
            <?php 

            $news = mysqli_query($db,"SELECT * FROM news ORDER by id desc");
            while ($rows = mysqli_fetch_array($news)) {
             ?>
             <p>
             <!--<p><?php echo $rows['date'];?></p>-->
             <?php echo $rows['news'];?>
             </p>
             <?php
            }


            ?>



        <h3 class="page-header">Sampaguitarians</h3>

          

        <div class="panel-group">
          <div class="panel panel-default">
            <div class="panel-heading">
              <h4 class="panel-title">
                <a data-toggle="collapse" href="#collapse1" style="text-decoration: none;"><span class="glyphicon glyphicon-plus"></span> Show more </a>
              </h4>
            </div>
              <div class="panel-body">
           

              <?php 
                  $Sql = mysqli_query($db,"SELECT * FROM photos order by id asc");
                  while($rows = mysqli_fetch_array($Sql)){
                    ?>

                <div class="panel-collapse collapse " id="collapse1">

                  <div class="row">
                    <div class="col-md-5">
                      <img src="../superadmin/upload/<?php echo $rows['image']; ?>" class="img img-responsive thumbnail" id="img" >
                    </div>
                    <div class="col-md-7">
                    <p> <?php echo $rows['text'];?><p>
                    </div>
                  </div>
                  </div>
                <br>

                <?php
              }
              ?>







              </div>
              <div class="panel-footer text-right">Sampaguita High School</div>
          </div>
        </div>





      </div>


      <!-- calendar --->

      <div class="col-md-3 content text-center">
        <h3 class="page-header ">Calendar</h3>
       
      <?php 
        $que = mysqli_query($db,"SELECT * FROM calendar order by id desc ");
        while($row = mysqli_fetch_array($que) ) {
          ?>


          <div class="calendar">
           <h4 class="text-center"><strong><?php echo date("Y",strtotime($row['day'])) .'-'. date("M",strtotime($row['day'])).'-'. date("d", strtotime($row['day'])) ; ?></strong></h4>
           
           <h5 class="text-justify" style="text-align: "><?php echo $row['event'];?></h5> 
           </div>
           <br>

         
        
          <?php

        }

        ?>




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


