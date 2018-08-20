<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['usersuper']))
{
  header('location:../user/studentportal.php');


}

$sql = mysqli_query($db,"SELECT COUNT(id) AS totaladmin FROM chairman");
$res = mysqli_fetch_array($sql);
$total = $res['totaladmin'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS user FROM studentdetails");
$res = mysqli_fetch_array($sql);
$user = $res['user'];



$sql = mysqli_query($db,"SELECT COUNT(id) AS student FROM studentdetails");
$res = mysqli_fetch_array($sql);
$student = $res['student'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS a FROM aboutus");
$res = mysqli_fetch_array($sql);
$mission = $res['a'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS g FROM guidelines");
$res = mysqli_fetch_array($sql);
$guidelines = $res['g'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS r FROM requirements");
$res = mysqli_fetch_array($sql);
$requirements = $res['r'];

$totalpost = $mission + $guidelines + $requirements;


$sql = mysqli_query($db,"SELECT COUNT(id) AS photo FROM photos");
$res = mysqli_fetch_array($sql);
$photos = $res['photo'];


$sql = mysqli_query($db,"SELECT COUNT(id) AS calendar FROM calendar");
$res = mysqli_fetch_array($sql);
$calendar = $res['calendar'];

$sql = mysqli_query($db,"SELECT COUNT(id) AS news FROM news");
$res = mysqli_fetch_array($sql);
$news = $res['news'];








 
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


<br><br>
<br><br>
  <div class="container">
    <div class="row" style="margin: -90px 0px 130px 0px;">
    <?php
    include 'function.php';
    
     if (isset($msg)) {
      echo $msg;
   }
    ?>
    <br>
        <div class="col-md-3" >
        <?php 
        ?>
        </div>

    <div class="col-md-10 text-right"></div>
    <div class="col-md-1 text-right" >
            <div class="dropdown create">
              <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Create Content &nbsp;
                <span class="caret"></span> 
              </button>

              <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
              
                <li><a a type="button" data-toggle="modal" data-target="#chairman">Add Chairman</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#Calendar">Add Calendar</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#Page">Add Photos</a></li>
                <li><a a type="button" data-toggle="modal" data-target="#text">Add News</a></li>
              
              
               
              </ul>
            </div>
      </div>







      <div class="col-md-12" id="panel-panel">
      <div class="panel panel-primary">
        <div class="panel-heading">Super Admin </div>
        <div class="panel-body"">

           <div class="col-md-4" >
                  <a href="requirements1.php" style="text-decoration: none; color:black;" ><div class="well dash-box text-center">
                    <div class="bounce"><h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>&nbsp;<?php echo $totalpost;?> </h2></div>
                    <h4>Post</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
                <a href="students.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class=" glyphicon glyphicon-education" aria-hidden="true">
                    </span>&nbsp;<?php echo $student; ?>
                    </h2>
                    <h4>Students</h4>
                  </div>
                 </a>
                </div>
                <div class="col-md-4 ">
                  <a href="admin.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;<?php echo $total;?>
                   </h2>
                    <h4>Chairman</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
                  <a href="photos.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-picture  Try it
                    " aria-hidden="true">&nbsp;</span><?php echo $photos?>
                   </h2>
                    <h4>Post / Image</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
                  <a href="viewcalendar.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-bookmark
                    " aria-hidden="true">&nbsp;</span><?php echo $calendar?>
                   </h2>
                    <h4>Calendar / Post</h4>
                  </div>
                  </a>
                </div>
                <div class="col-md-4 ">
                  <a href="text.php" style="text-decoration: none; color:black;">
                  <div class="well dash-box text-center">
                    <h2><span class="glyphicon glyphicon-pencil
                    " aria-hidden="true">&nbsp;</span><?php echo $news?>
                   </h2>
                    <h4>News</h4>
                  </div>
                  </a>
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
  

<!-- Modal For Chairman -->
  <div class="modal fade" id="chairman" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add Chairman</h4>
        </div>
        <div class="modal-body">
        <!-- form -->
         <?php Addchairman(); ?>

          <form class="form-horizontal" action="" method="post">
              <div class="form-group">
          <label class="control-label col-sm-3" for="sname">Surname</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="sname" name="sname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="fname">Firstname</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="fname" name="fname" placeholder="Firstname">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="mname">Middlename</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" id="mname" name="mname" placeholder="Username">
          </div>
        </div>
         <div class="form-group">
          <label class="control-label col-sm-3" for="user">Username</label>
          <div class="col-sm-8"> 
            <input type="text" class="form-control" id="user" name="user" placeholder="Enter password">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-3" for="pwd">Password:</label>
          <div class="col-sm-8"> 
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
          </div>
        </div>
        <div class="form-group">
          <label for="sel1" class="control-label col-sm-3">Gender</label>
          <div class="col-sm-4">
          <select class="form-control" id="sel1" name="gender">
            <option disabled selected="">Gender</option>
            <option value="female">Female</option>
            <option value="male">Male</option>
    
          </select>
          </div>
        </div>

        <div class="form-group">
          <label for="sel1" class="control-label col-sm-3">Chairman</label>
          <div class="col-sm-4">
          <select class="form-control" id="sel1" name="chair">
            <option disabled selected="">Chairman</option>
            <option value="Grade-7">Grade-7</option>
            <option value="Grade-8">Grade-8</option>
            <option value="Grade-9">Grade-9</option>
            <option value="Grade-10">Grade-10</option>
          </select>
          </div>
        </div>

        <div class="form-group"> 
          <div class="col-sm-offset-3 col-sm-8">
            <button type="submit" name="chairmanbtn" class="btn btn-default">Submit</button>
          </div>
        </div>
        

      </form>
        <!-- form -->


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- modal chairman -->



  <!-- Add Calendar -->

    <div class="modal fade" id="Calendar" role="dialog">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title text-center">Add Calendar</h4>
        </div>
        <div class="modal-body">

           <form class="form-horizontal" method="POST" action="">
           <?php calendar(); ?>
          <div class="form-group">
          <label class="col-md-3 control-label" for="date">Date</label>
            <div class="col-md-7"> 
            <input type="date" name="date" id="date" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
          <label class="col-md-3 control-label" for="event">Event</label>
            <div class="col-md-7"> 
            <textarea name="event" id="event" class="form-control"></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-md-offset-8 btn-md"> 
              <button type="submit" class="btn btn-primary" name="calendar" required>Add</button>
            
            </div>
          </div>
        </form>

         </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Add Calendar -->




  <!-- Add Post -->

    <div class="modal fade" id="Page" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Add Post</h4>
          </div>
          <div class="modal-body">

      
          <form action="" method="POST" enctype="multipart/form-data">
            <?php AddPhotos(); ?>
            <div class="form-group">
                  <label for="file">PHOTOS</label> 
              <input type="file" name="file" id="file" class="form-control" name="file" required>
            </div>
            
             

              <div class="form-group">
                <label for="comment">Post ( TEXT ):</label>
                <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
              </div>
             <button type="submit" name="submit" class="btn btn-info">Submit</button>
          </form>

            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>


  <!-- Add Post -->

  <!-- Add Post /text  -->
   <div class="modal fade" id="text" role="dialog">
      <div class="modal-dialog modal-md">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title text-center">Add News</h4>
          </div>
          <div class="modal-body">

      
          <form action="" method="POST">
      <?php addtext(); ?>
        <div class="form-group">
          <label for="comment">Description:</label>
          <textarea class="form-control" rows="5" id="comment" name="text" required></textarea>
        </div>
         <button type="submit" name="wew" class="btn btn-info">Submit</button>
      </form>

            </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- End Add Post /text  -->







  

</body>
</html>

