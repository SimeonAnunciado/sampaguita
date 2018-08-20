<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['usersuper']))
{
  header('location:../user/studentportal.php');
}
else
{
 
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

 <nav class="navbar navbar-default">
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
      <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="requirements.php"><span class="glyphicon glyphicon-pencil"></span> Posts <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a href="requirements1.php"><span class="glyphicon glyphicon-tag"></span> Requirements</span></a></li>
               <li><a href="guidelines1.php"><span class="glyphicon glyphicon-tasks"></span> Guidelines</a></li>
              <li><a href="aboutus1.php"><span class="glyphicon glyphicon-th-list"></span> About Us Post</a></li>

             </ul></li>
            <li><a href="students.php"><span class="glyphicon glyphicon-signal"></span> Students</a></li>
      <li><a href="photos.php"><span class="glyphicon glyphicon-picture"></span> Photos</a></li>
      <li><a href="admin.php"><span class="glyphicon glyphicon-briefcase"></span> Chairman / Admin</a></li>




      </ul>

   

       <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> 
           <?php if(isset($_SESSION['usersuper'])){ 
            echo $_SESSION['usersuper'];}
            ?> </a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>

      </ul>


      </div>
    </div>
   </div>
  </nav>

<br><br>
<br><br>
  <div class="container" style="position: relative; top: -60px; margin-bottom: 190px;">
    <div class="row">
    <?php
    
    ?>
    <br>
        
        </div>
      <div class="col-md-12">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="panel-title">Photos</div>
          </div>

          <style type="text/css">
            td img{
              border-radius: 10px;

            }
          </style>
          <div class="panel-body">
          <table class="table table-striped table-responsive table-condensed table-bordered">
          <thead>
            <tr>
              <th width="200" class="text-center">Photos</th>
              <th class="text-center">Text</th>
              <th class="text-center" width="200">Action</th>
            </tr>
            </thead>

          <?php 
          $photo = mysqli_query($db,"SELECT * FROM photos");
          while($row = mysqli_fetch_array($photo)){
            $rowid = $row['id'];
            ?>
            <tbody>
              <tr>
            <td><img src="upload/<?php echo $row['image'];?>" width=190 height=130></td>
            <td class="text-center"><?php echo $row['text'];?></td>
         
            <td class="text-center" style="padding-top:30px;"><a href="" class="btn btn-primary">View</a>
            <a href="delete.php?id=<?php echo $rowid;?>" class="btn btn-danger">Delete</a></td>
            <?php
            


          }

        

          ?>
          </tr>
            </tbody>
          </table>
          
         
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

<?php
}
?>