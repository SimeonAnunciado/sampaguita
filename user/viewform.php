<?php 
include 'db.php';
session_start();

?>
<!DOCTYPE html>
<html>
<head>


      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body bgcolor="#45d9fd">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="home.php">Home</a></li>
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Enrollment <span class="caret"></span></a>
        <ul class="dropdown-menu">
        	<li><a href="enrollment.php">Enroll Now</a></li>
        	<li><a href="">Enroll Date</a></li>
        </ul>
        </li> 
        <li><a href="#">About</a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
   
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<br><br>
<br>

  <div class="row">
  <div class="col-md-11 text-right"><a href="activitylog.php" class="btn btn-info">Back</a></div>
  </div>
 <br>

	<div class="row">
		<div class="col-md-1"></div>
	
    <div class="col-md-10">
     

        
       <div class="panel panel-primary">  
        <div class="panel-heading">My Activity</div>
        <div class="panel-body">

        <?php if(isset($_GET['id'])){
            $_SESSION['id'] = $_GET['id'];
            $sessionid = $_SESSION['id'];
          }else{
            echo "errorr GET";
          } 
        ?>
        

          
        <?php
        $emailsession = $_SESSION['email'];
        
        $query = "SELECT * FROM enrollmentform WHERE email = '$emailsession' AND id ='$sessionid' ORDER BY date  ";
        $res = mysqli_query($db,$query);
        while($row = mysqli_fetch_array($res)){
          ?>
          <div style="text-align: center;"><br><hr><b>Personal Information</b><hr><br></div>

          <form >


            <div class="row">
                <div class="col-md-4 text-center">

                <input type="text" name="qwe" id="fname" class="form-control text-center" 
                value="<?php echo $row['fname'];?>" >
                <label> Firstname</label>
                </div>
 
                <div class="col-md-4 text-center"  >
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                 value="<?php echo $row['sname']; ?>">
                <label> Lastname</label>
                </div>

                <div class="col-md-4 text-center">
                <input type="text" name="qwe" id="fname" class="form-control text-center" 
                value="<?php echo $row['mname']; ?>">
                <label> Middle name</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['grade']; ?>">
                <label> Grade</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['email']; ?>">
                <label> Email</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['gender']; ?>">
                <label>Gender</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['phonenumber']; ?>">
                <label> Phone Number</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['religion']; ?>">
                <label> Religion</label>
                </div>

                <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['address']; ?>">
                <label> Address</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['method']; ?>">
                <label> Method</label>
                </div>






            </div>

            
          </form>

           <div style="text-align: center"><br><hr> <b>Guardian Info</b>  <hr><br></div>

           <form>
             <div class="row">
             <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['fullname']; ?>">
                <label> Full name</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['relation']; ?>">
                <label>Relation</label>
                </div>

                <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['contact']; ?>">
                <label>Contact</label>
                </div>

                 <div class="col-md-4 text-center" style="padding-top: 10px;">
                <input type="text" name="qwe" id="fname" class="form-control text-center"
                value="<?php echo $row['date']; ?>">
                <label> Date Enrolled</label>
                </div>
               
             </div>
           </form>


         <?php
        }
        ?>    

         
       

         <div style="text-align: center;"><br><hr><b>Subject List</b><hr><br></div>

          

         
          
        </div>
      </div>
        <button onclick="window.print()">Print</button>
      
    </div>
	</div>


  
  
</body>
</html>