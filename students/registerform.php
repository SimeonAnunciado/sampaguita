<?php
require 'db.php';
session_start();


 if(isset($_SESSION['usernameold'])) {
  $sessionusername = $_SESSION['usernameold'];

  

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
<nav class="navbar navbar-default "> 
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
       <li><a href="onlinereg.php"><span class="glyphicon glyphicon-pencil"></span> Online Enrollment</a></li>
          <li><a href="activitylog.php"><span class="glyphicon glyphicon-info-sign"></span>  Activity Log</a></li> 
        <li><a href="oldstudent.php"><span class="glyphicon glyphicon-user"></span> My Account </a></li> 
      </ul>
     
            <ul class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['usernameold'];?></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>

    </div>
  </div>
</nav>

<div class="container">
	<div class="row">
    <div class="col-md-1"></div>
		    <div class="col-md-10" id="panel-panel">
         
       <div class="panel panel-primary" >
       <?php

       $stno=$_SESSION['dbstno'];
       $grade = $_SESSION['dbgrade'];
       $id = $_SESSION['id'];


        if (isset($_POST['submit'])) {
        $surname = $_POST['sname'];
        $firstname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $birthplace = $_POST['place'];
        $gen = $_POST['gender'];
        $bday = $_POST['bday'];
        $father = $_POST['father'];
        $occupation = $_POST['fatheroccupation'];
        $fathercontact = $_POST['fathercontact'];
        $mother = $_POST['mother'];
        $motheroccupation = $_POST['motheroccupation'];
        $mothercontact = $_POST['mothercontact'];
        $address = $_POST['address'];
        $grad = $_POST['elementarygrad'];
        $average = $_POST['average'];
        $requirements = $_POST['requirements'];
        $b = implode(",",$requirements);
        $schoolyear = date('Y');
        $process = 'pending';
        $kindofuser = 'old';
        $age= (date('Y') - date('Y',strtotime($bday)));

            //Automatic Sectioning
                
                     if($average >= '92')
                    {
                      include'automatic sectioning/firstsection.php';
                    }
                    else if($average >='87')
                    {
                     include'automatic sectioning/secondsection.php';
                    }
                    else if($average >='84')
                    {
                      include'automatic sectioning/fourthsection.php';
                    }
                    else if($average >='80')
                    {
                     include'automatic sectioning/sixthsection.php';
                    }
                    else if($average >='75')
                    {
                     include'automatic sectioning/tenthsection.php';
                    }
                    else
                    {
                      echo'<script>sweetAlert("Sorry", "You Cant Register Now!", "error");</script>';
                    }
        
                   $_SESSION['date']=$schoolyear; 

                   /* $sql = mysqli_query($db,"INSERT into enrollmentform (requirements) values ('$b') "); */

                   //
                       
           
       
     }
     /*else {
          $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE username ='$sessionusername' ");
          while($row = mysqli_fetch_array($query)) {
            $surname = $row['sname'];
            $firstname = $row['fname'];
            $mname = $row['mname'];
            $email = $row['email'];
            $birthplace = $row['placeofbirth'];
            $gender = $row['gender'];
            $bday = $row['dateofbirth'];
            $father = $row['father'];
            $fatheroccupation = $row['fatheroccupation'];
            $fathercontact = $row['fathercontact'];
            $mother = $row['mother'];
            $motheroccupation = $row['motheroccupation'];
            $mothercontact = $row['mothercontact'];
            $address = $row['address'];
            $grad = $row['elementarygraduated']; 
            $requirements = $row['requirements'];
          }
         
  } */


       ?>
                  

         <div class="panel-heading"><h4> Enrollment Form  </h4></div>
        <div class="panel-body">

        <form class="form-horizontal" action="registerform.php" method="POST" 
         id="Form-validation" >

         <?php 
         $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE username ='$sessionusername' ");
          while($row = mysqli_fetch_array($query)) {
              $surname = $row['sname'];
              $firstname = $row['fname'];
              $mname = $row['mname'];
              $email = $row['email'];
              $birthplace = $row['placeofbirth'];
              $gender = $row['gender'];
              $bday = $row['dateofbirth'];
              $father = $row['father'];
              $fatheroccupation = $row['fatheroccupation'];
              $fathercontact = $row['fathercontact'];
              $mother = $row['mother'];
              $motheroccupation = $row['motheroccupation'];
              $mothercontact = $row['mothercontact'];
              $address = $row['address'];
              $grad = $row['elementarygraduated']; 
             // $requirements = $row['requirements'];

         ?>


           <div class="form-group">
                <label class="control-label col-sm-3" for="sname">Surname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="sname"  name="sname" value="<?php echo $surname;?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="fname">Firstname</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $firstname;?>" required>
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-3" for="mname">Middlename</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $mname;?>" required>
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="place">Place of birth</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="place" name="place"  value="<?php echo $birthplace;?>" required>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Email</label>
                  <div class="col-sm-8"> 
                  <input type="email" class="form-control" id="email" name="email" 
                  value="<?php echo $email;?>"  required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="gender">Gender</label>
                  <div class="col-sm-8"> 
                  <select class="form-control " name="gender" id="gender" placeholder="Choose Gender" 
                  value="<?php echo $gender;?>" required>
                  required>
                   <option value="<?php echo $gender;?>" ><?php echo $gender;?></option>
                   <option disabled>Male</option>
                   <option disabled>Female</option>
                 </select>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="bday">Birth Date</label>
                  <div class="col-sm-8"> 
                  <input type="date" class="form-control" id="bday" name="bday"
                   value="<?php echo $bday;?>" required> 
                 
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="grade">Grade</label>
                  <div class="col-sm-8"> 
                   <select class="form-control " name="grade" id="grade" value="<?php echo $grade;?>" >
                   <option value="<?php echo $grade;?>"><?php echo $grade;?></option>
                    <option value="Grade-7">Grade-7</option>
                    <option value="Grade-8">Grade-8</option>
                    <option value="Grade-9">Grade-9</option>
                    <option value="Grade-10">Grade-10</option>
                   </select>
                 
                  </div>
              </div>

              <hr>
              <p class="text-center"> Guardian Information</p>
              <hr>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="father">Father Name</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="father" name="father" 
                   value="<?php echo $father;?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fatheroccupation">Father Occupation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fatheroccupation" name="fatheroccupation" value="<?php echo $fatheroccupation;?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fathercontact">Father Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fathercontact" name="fathercontact"  value="<?php echo $fathercontact;?>"
                   placeholder="Plesae Begin Ex.639....." required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mother">Mother Name</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mother" name="mother" 
                  value="<?php echo $mother;?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="motheroccupation">Mother Occupation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="motheroccupation" name="motheroccupation" value="<?php echo $motheroccupation;?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mothercontact">Mother Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mothercontact" name="mothercontact" value="<?php echo $mothercontact;?>" 
                  placeholder="Plesae Begin Ex.639....." required>
                  </div>
              </div>

              <hr>
              <p class="text-center"> Background Information</p>
              <hr>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="address">Address</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="address" name="address" 
                  value="<?php echo $address;?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="elementarygrad">Elementary Graduated</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="elementarygrad" name="elementarygrad"  
                  value="<?php echo $grad;?>" required>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="average">General Average</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="average" name="average" required>
                  </div>
              </div>

               <hr>
               <p class="text-center">Student Requirements</p>
               <hr> 
               
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]"  value="FORM138/CARD">&nbsp;Form 138 / Card
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]" value="FORM137">&nbsp;Form 137
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]"  value="BIRTH CERTIFICATE">&nbsp;Birth Certificate
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]" value="GOOD MORAL">&nbsp;Good moral
                  
                </div>
               </div> 
               <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]"   value="NO REQUIREMENTS">&nbsp;Remarks No Requirements
                  
                </div>
               </div>
               
               
               <!--
                <div class="form-group">
                <div class="col-md-12">
                  <label class="checkbox-inline"></label>
                   <input type="text" readonly="readonly" name="requirementslist" class="form-control" value="<?php echo $requirements; ?>" required>
                  
                </div>
               </div>
               -->


             <div class="text pull-right">
             <label class="control-label-12" for="fname" style="padding-top: 45px;"><button class=" btn btn-primary " name="submit" ><span class="glyphicon glyphicon-forward"></span> NEXT </button></label>
             </div>





            
         
            
            
          </form>
            <?php
       }
       ?>



        <!--
         <form class="form-horizontal" action="" method="POST"  class="form-horizontal" >
          
            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" >STUDENT'S NAME</label>
            </div>
              <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                  <label>Lastname :</label>
                  <input type="text" class="form-control input-lg" id="fname" name="sname"  placeholder="Enter Lastname Here.." value="<?php echo $surname;?>"
                  required>
                </div>
                <div class="col-md-4">
                  <label>Firstname :</label>
                  <input type="text" name="fname" class="form-control input-lg" placeholder="Enter First name Here.." value="<?php echo $firstname;?>" required >
                </div>
                 <div class="col-md-4">
                 <label>Middlename : </label>
                  <input type="text" name="mname" class="form-control input-lg" placeholder="Enter Middle name Here.." value="<?php echo $mname;?>" required >
                </div>
              </div>


              <div class="row">
                <div class="col-md-4" style="padding-top: 25px;">
                  <label>Place of Birth :</label>
                  <input type="text" class="form-control input-lg"  name="place"  placeholder="Enter Place of Birth Here.." value="<?php echo $birthplace;?>"  required>
                </div>
                 <div class="col-md-4" style="padding-top: 25px;">
                 <label>Email :</label>
                  <input type="email" class="form-control input-lg"  name="email"  placeholder="Enter Email Here.." value="<?php echo $email;?>"  required>
                </div>  

                 <div class="col-md-4" style="padding-top: 25px;">
                 <label>Gender :</label>
                 <select class="form-control input-lg" name="gender" placeholder="Choose Gender" value="<?php echo $gender;?>" required>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                </div>
                </div>


                <div class="row">
                <div class="col-md-4" style="padding-top: 25px;">
                <label>Date of Birth :</label>
                  <input type="date" name="bday" class="form-control input-lg" value="<?php echo $bday;?>"   placeholder="Birth Date" required>
                </div>


                <div class="col-md-4" style="padding-top: 25px;">
                <label>Grade : </label>
                <label class="form-control input-lg"><?php echo $grade;?></label>
                </div>
                </div>


            <hr>
            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 20px;">PARENTS / GUARDIAN INFO</label>
            </div>

            <div class="row" style="padding-top: 35px;">
              <div class="col-md-4">
              <label>Father's Name :</label>
              <input type="text" name="father" class="form-control input-lg" placeholder="Enter Father's Name Here.." value="<?php echo $father;?>" required="">
              </div>

               <div class="col-md-4">
               <label>Father's Occupation :</label>
              <input type="text" name="fatheroccupation" class="form-control input-lg" placeholder="Enter Father's Occupation Here.." value="<?php echo $fatheroccupation;?>"  required>
              </div>

               <div class="col-md-4">
               <label>Father's Contact :</label>
              <input type="text" name="fathercontact" class="form-control input-lg"  value="<?php echo $fathercontact;?>"  placeholder="Enter Contact No. Here">
              </div>

            </div>

            <div class="row" style="padding-top: 25px;">
              
               <div class="col-md-4">
               <label>Mother's Name :</label>
              <input type="text"  name="mother" class="form-control input-lg" placeholder="Enter Mother's Name Here.." value="<?php echo $mother;?>"  required>
              </div>

               <div class="col-md-4">
               <label>Mother's Occupation :</label>
              <input type="text" name="motheroccupation" value="<?php echo $motheroccupation;?>"  class="form-control input-lg" placeholder="Enter Mother's Occupation Here.."   required>
              </div>

               <div class="col-md-4">
               <label>Mother's Contact :</label>
              <input type="text" name="mothercontact" value="<?php echo $mothercontact;?>"  class="form-control input-lg" placeholder="Enter Contact No. Here.." required>
              </div>

            </div>

            <hr>
              <div class="text-center">
             <label class="control-label-12 text-center" style="padding-top: 35px;">BACKGROUND INFO</label>
             </div>

             <div class="row">
              <div class="col-md-12" style="padding-top: 35px;">
              <label>Address :</label>
              <input type="text" name="address" class="form-control input-lg" value="<?php echo $address;?>"  placeholder="Enter Address Here.."  required>
              </div>
            </div>

            <div class="row">
               <div class="col-md-8" style="padding-top: 25px;">
               <label>Elementary Graduated :</label>
              <input type="text" name="elementarygrad" class="form-control input-lg" value="<?php echo $grad;?>"  placeholder="Enter Address Here.."  required>
              </div>

              <div class="col-md-4" style="padding-top: 25px;">
              <label>General Average:</label>
              <input type="text" name="average" class="form-control input-lg" placeholder="Enter General Average Here.."  required>
              </div>
            </div>
             <br>
             <br>
             <br>
            <!--Terms and agreement
            <div class="row"  style="padding-top: 25px;">
              <center>
              <div class="col-md-12">
                <div class="borderagreement" style="background-color: none; width: 40%; border-radius: 10px; border">
                <a class="btn btn-success" data-toggle="modal" data-target="#myModal" style="font-size: 18px;"><b><i><u>Read Terms and Agreement</u></i></b></a>
                </div>
              </div>
              </center>
            </div>
            <br>
            <br>
           
            <div class="text pull-right">
             <label class="control-label-12" for="fname" style="padding-top: 45px;"><button class=" btn btn-primary " name="submit" ><span class="glyphicon glyphicon-forward"></span> NEXT </button></label>
             </div>
          </form>
           -->
      
        


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color: silver;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><center><b>Terms and Agreement</b></center></h4>
      </div>
      <div class="modal-body">
         <label style="font-size: 18px;"><b>For Parents / Guardian</b></label><br>
         <label style="padding-left: 20px;">&nbsp;&nbsp;&nbsp;&nbsp;I hereby agree and submit my child to the school program, academic, disciplinary regulations and all other requirements instituted by this school and furthermore, I will abide myself to comply with the school fees implied by this institution.</label>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" id="btnaccept" class="btn btn-primary" onclick="">Accept</button>
      </div>
    </div>
  </div>
</div>
        
        </div>
      </div>
  
    </div>
    <div class="col-md-1"></div>
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
        echo "There Something Error In Getting Session ";
       }
      

      ?>