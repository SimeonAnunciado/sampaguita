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


     <style type="text/css">
      #image{
      height: 170px;
      width: 200px;
      }
      .well #image{
        padding: auto;
      }
      </style>



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


      



  <div class="container">
    <div class="row">
      <div class="col-sm-1"></div>
           
      <div class="col-md-10">

            <?php 
         $query = mysqli_query($db,"SELECT * FROM chairman WHERE id = '$id' ");
         while ($row= mysqli_fetch_array($query)) {
          $sname = $row['sname'];
          $fname = $row['fname'];
          $mname = $row['mname'];
          $user = $row['username'];
          $pass = $row['password'];
          $gender = $row['gender'];
          $userlevel = $row['userlvl'];
          $kindofuser = $row['kindofuser'];
          $image = $row['image'];
           
         }

         if(isset($_POST['btnsave'])){

          $sname = $_POST['sname'];
          $fname = $_POST['fname'];
          $mname = $_POST['mname'];
          $user = $_POST['user'];
          $pass = $_POST['pass'];
          $gender = $_POST['gender'];

          $userlevel = $_POST['userlvl'];
          $kindofuser = $_POST['kindofuser'];

          $fileName = $_FILES['file']['name'];
          $fileTmpName = $_FILES['file']['tmp_name'];
          $fileSize = $_FILES['file']['size'];
          $fileError = $_FILES['file']['error']; 
          $fileType = $_FILES['file']['type']; 

          $fileExt = explode('.',$fileName);
          $fileActualExt = strtolower(end($fileExt));
          $allowed = array('jpg','jpeg','png','JPG');

          if (in_array($fileActualExt, $allowed)) {
              if ($fileError === 0) {
                if ($fileSize<50000000) {

                  $fileNameNew = uniqid('', true).".".$fileActualExt;
                  $fileDestination = './upload/'.$fileNameNew;
                  move_uploaded_file($fileTmpName,$fileDestination);



                $photos="UPDATE chairman SET image = '$fileNameNew' WHERE id = '$id' ";
                $photo = mysqli_query($db, $photos ) or die(mysqli_error());

              //echo "<img src='upload/$fileNameNew' width='200' height='200'>";
              
            }else{
              echo "
                <script>
                sweetAlert('Oops...', 'Upload Error!', 'error');
                </script>";
            }
          }else{
            echo "
                <script>
                sweetAlert('Oops...', 'Youre File is too big!', 'error');
                </script>";
          }
        }else{
          echo "
                <script>
                sweetAlert('Oops...', 'There's Something Error', 'error');
                </script>";
        } 
      


         $update = mysqli_query($db,"UPDATE chairman SET sname = '$sname' , fname = '$fname' ,mname = '$mname' , username ='$user' ,
          password = '$pass', gender = '$gender', userlvl = '$userlevel', kindofuser = '$kindofuser' WHERE id = '$id' ") or die(mysqli_error());
         if ($update) {
            ?>
            <div class="alert alert-success alert-dismissable fade in">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Update
            </div>
            <?php
         }else{
          ?>  
          <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Failed!</strong> Updating theres something error
          </div>

          <?php
         }


         }


      ?>



        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="panel-title">Information</div>
          </div>
          <div class="panel-body">

          <form method="POST" action="" class="form-horizontal" enctype="multipart/form-data">
           <div class="form-group">
            <label class="control-label col-sm-4" for="email"></label>
            <div class="col-sm-3 well">
            <?php 

                if ($image === 'default.png') {
                  ?>
                <img src="./upload/default.png " id="image" alt="image" class="img-responsive img-rounded" >
                  <?php 
                }else{
                  ?>
                <img src="./upload/<?php echo $image; ?>" id="image" alt="image" class="img-responsive img-rounded" >
                  <?php
                }
            ?>
           <br>
            <input type="file" name="file" id="fileToUpload" style="display: none">

            <div class="profile-user-title">
            <div class="profile-user-stno"> <?php echo $sname; ?></div>
            </div>
            <div class="profile-user-button">
            <button class="btn btn-success btn-sm" id="editbtn"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
            </div>



            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="sname">Surname:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="sname" id="sname" 
              value="<?php echo $sname; ?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="fname">Firstname:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="fname" id="fname" 
              value="<?php echo $fname; ?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="mname">Middlename:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="mname" id="mname" 
              value="<?php echo $mname; ?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="gender">Gender:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="gender" id="gender" 
              value="<?php echo $gender?>" disabled>
            </div>
          </div>


          <div class="form-group">
            <label class="control-label col-sm-3" for="email">Username:</label>
            <div class="col-sm-7">
              <input type="text" class="form-control" name="user" id="email" placeholder="Enter email"
              value="<?php echo $user?>" disabled>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Password:</label>
            <div class="col-sm-7">          
             <input type="password" class="form-control" name="pass" id="pwd" placeholder="Enter password"
             value="<?php echo $pass?>" disabled>
            </div>
          </div>
             <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">Kind Of user:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="userlvl" id="pwd" placeholder="Enter password"
             value="<?php echo $userlevel?>" disabled>
            </div>
          </div>
          <div class="form-group">
            <label class="control-label col-sm-3" for="pwd">User level:</label>
            <div class="col-sm-7">          
             <input type="text" class="form-control" name="kindofuser" id="pwd" placeholder="Enter password"
             value="<?php echo $kindofuser; ?>" disabled>
            </div>
          </div>
        
          
            <!-- <div class="col-md-10" style="padding-top: 40px;">
            <button type="submit" class=" btn btn-success btn-lg" name="submit"><span class="glyphicon glyphicon-ok"></span> Update </button> 
            
            </div>-->
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
               <button class="btn btn-warning" id="btnsave" name="btnsave" style="display:none; margin-bottom:10px;"><span class="glyphicon glyphicon-save"></span> SAVE</button>
              </div>
            </div>
          </form>

          </div>
        </div>
      </div>
      <div class="col-sm-1"></div>

    </div>
    </div>




   <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
  </footer>



<script type="text/javascript">
  $("#editbtn").click(function() {
  $("input:disabled").removeAttr("disabled");
  $("select:disabled").removeAttr("disabled");
  $("input:disabled").removeAttr("disabled");
  $("#editbtn").attr("disabled",true);
 $("#btnsave").toggle();
 $("#fileToUpload").toggle();
});
</script>
</body>
</html>
    <?php
}else{
  echo "Errror";
}
?>

