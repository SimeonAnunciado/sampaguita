<?php 
include 'function.php';
include 'db.php';
session_start();
if(!isset($_SESSION['usersuper']))
{
  header('location:../user/studentportal.php');
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
  <div class="container">
    <div class="row" style="margin: -90px 0px 130px 0px;">
    <?php
    //include'letterhead.php';
    ?>
    <br>
         <div class="col-md-3">
        <?php 
          include'sidebar.php';
        ?>
        </div>
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="panel-title">Requirements</div>
          </div>
          <div class="panel-body">
            <div class="col-md-12">
              <div class="well">

                <?php
                if(isset($_POST['savebtn']))
                {
                  
                  $desc = $_POST['desc'];
                  $sql="UPDATE requirements SET description ='$desc', date=Now() WHERE id='2'";
                  $result = mysqli_query($db, $sql);
                    if($result)
                    {
                      $sqldate = "SELECT * FROM requirements";
                      $resultdate = mysqli_query($db, $sqldate);
                        while($rowdate = mysqli_fetch_array($resultdate))
                        {
                          $date = $rowdate['date'];
                        } 
                        echo'<script>swal("Successful!", "Completely Updated", "success");</script>';
                    }
                    else
                    {
                       echo'<script>sweetAlert("Error", "There Something Error!", "error");</script>';
                    }
                }
                else
                {
                $sql = "SELECT * FROM requirements";
                $result = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_array($result))
                  {
                    $desc=$row['description'];
                    $date = $row['date'];
                  } 
                }
                ?>
              <form method="POST" action="">
               <label id="date" class="pull-right" style="display:none;">Updated in : <?php echo$date; ?></label>
               <textarea class="form-control" name="desc" rows="30" id="requirements" style="font-style: italic;" disabled><?php echo$desc; ?> </textarea>
                <br>
                <button class="btn btn-warning" name="editbtn" id="editbtn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                <button class="btn btn-success pull-right" name="savebtn" id="savebtn" style="display:none"><span class="glyphicon glyphicon-save"></span> Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>

  <script type="text/javascript">
  $("#editbtn").click(function() {
  $("textarea:disabled").removeAttr("disabled");
  $("#editbtn").attr("disabled",true);
 $("#savebtn").toggle();
  $("#date").toggle();
});
</script>

   <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
  </footer>


 

</body>
</html>

