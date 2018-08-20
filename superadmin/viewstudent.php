<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['usersuper']))
{
  header('location:../user/studentportal.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
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

<br>
  <div class="container" >
    <div class="row">
    <?php
    
    ?>
    <br>

        
        </div>
      <div class="col-md-12" >
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="panel-title">Information</div>
          </div>
          <div class="panel-body">
          <?php 
         $query = mysqli_query($db,"SELECT * FROM studentdetails WHERE id = '$id' ");
         while ($row= mysqli_fetch_array($query)) {

          $std = $row['stno'];
          $stname = $row['stname'];
          $age = $row['age'];
          $gender = $row['gender'];
          $dateofbirth = $row['dateofbirth'];
          $address = $row['address'];
          $mothername = $row['mothername'];
          $fathername = $row['fathername'];
          $username = $row['username'];
          $password = $row['password'];
          $img = $row['image'];
           
         }

         if(isset($_POST['submit'])){
          $user = $_POST['user'];
          $pass = $_POST['pass'];
          $userlevel = $_POST['userlvl'];
          $kindofuser = $_POST['kindofuser'];

         $update = mysqli_query($db,"UPDATE admin SET user ='$user' , pass = '$pass', userlvl = '$userlevel', kindofuser = '$kindofuser' WHERE id = '$id' ");
         if ($update) {
            ?>
            <div class="alert alert-success col-md-12 text-center">
            <strong>Success!</strong> Success Update!
          </div>
            <?php
         }else{
          ?>  
          <div class="alert alert-warning col-md-10 text-center">
          <strong>Success!</strong> Error Update failed!
        </div>

          <?php
         }


         }


          ?>

          <form method="POST" action="" class="form-horizontal">

            <div class="form-group" >
                <label class="control-label col-sm-3" for="pwd">Image :</label>
                <div class="col-sm-7">          
                 
                 <img src=".././students/uploads/<?php echo $img; ?>" width="250" id="student-picture">
                  

                </div>
              </div>


           <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="email">Student Number:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="user" id="email" placeholder="Enter email"
              value="<?php echo $std; ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="pwd">Student Name:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="pass" id="pwd" placeholder="Enter password"
             value="<?php echo $stname; ?>">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="pwd">Age:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="userlvl" id="pwd" placeholder="Enter password"
             value="<?php echo $age; ?>">
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="pwd" >Gender:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
             value="<?php echo $gender; ?>">
            </div>
          </div>
            <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="pwd">Date of birth:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
             value="<?php echo $dateofbirth; ?>">
            </div>
          </div>

      <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Address:</label>
                <div class="col-sm-7">          
                 <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
                 value="<?php echo $address; ?>">
                </div>
              </div>

      <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Mother name:</label>
                <div class="col-sm-7">          
                 <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
                 value="<?php echo $mothername; ?>">
                </div>
              </div>

      <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Father name:</label>
                <div class="col-sm-7">          
                 <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
                 value="<?php echo $fathername; ?>">
                </div>
              </div>

      <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Username:</label>
                <div class="col-sm-7">          
                 <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
                 value="<?php echo $username; ?>">
                </div>
              </div>

      <div class="form-group">
                <label class="control-label col-sm-3" for="pwd">Password:</label>
                <div class="col-sm-7">          
                 <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
                 value="<?php echo $password; ?>">
                </div>
              </div>

            
            <!--
            <div class="col-md-10" style="padding-top: 40px;">
            <button type="submit" class=" btn btn-success btn-lg" name="submit"><span class="glyphicon glyphicon-ok"></span> Update </button>
            
            </div>
            -->
          
            

          </form>

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
}else{
  echo "Errror";
}
?>

