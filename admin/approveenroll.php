<?php
require 'db.php';
session_start();

   
 if (isset($_GET['name'])) {
   $name = $_GET['name'];
 }


$id = $_SESSION['id'];

if(isset($id)){
  $que = "SELECT * FROM enrollmentform WHERE id = '$id' limit 0,1";
  $res = mysqli_query($db,$que)or die(mysqli_error());
  $row = mysqli_fetch_array($res);


?>

<!DOCTYPE html>
<html>
<head>
  <title>Sampaguita High Schol</title>

      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="../js/sweetalert.min.js"></script>
    <!-- Latest compiled and minified CSS -->  

  <!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
       <script src="../js/bootstrap.min.js"></script>
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
    </div>
    <div class="navbar-body">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
           <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href=""><span class="glyphicon glyphicon-list"></span> Admission <span class="caret"></span></a>
             <ul class="dropdown-menu">
               <li><a href="index.php"><span class="glyphicon glyphicon-send"></span> Online Enrollment </span></a></li>
               <li><a href="subjects.php"><span class="glyphicon glyphicon-tasks"></span> Subjects</a></li>
               <li><a href="sections.php"><span class="glyphicon glyphicon-equalizer"></span> Manage Sections</a></li>
             </ul></li>
            <li><a href="calendar.php"><span class="glyphicon glyphicon-calendar"></span> Announcements</a></li>
            <li><a href="listofuser.php"><span class="glyphicon glyphicon-th-list"></span> Student Accounts</a></li>
            <li><a href="enrolleedashboard.php"><span class="glyphicon glyphicon-signal"></span> Graphs</a></li>
      </ul>

   

        <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
        if (isset($_SESSION['userlvl'])) {
          echo $_SESSION['userlvl'];
        }elseif (isset($_SESSION['userchairman'])){
          echo $_SESSION['userchairman'];
          
        }else{
          echo "Undefined Session";
        }
        ?>


        </a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>


      </ul>


      </div>
    </div>
   </div>
  </nav>
  <div class="container">
<div class="row" style="padding-top: 20px; margin-bottom: 80px;">
      <div class="col-md-1"></div>
      <div class="col-md-10">
      <!-- Panel -->
      <div class="panel panel-primary">
      <?php 
      

        if (isset($_POST['Update'])) {
        
        $surname = $_POST['sname'];
        $firstname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $birthplace = $_POST['place'];
        $gen = $_POST['gender'];
        $bday = $_POST['bday'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $father = $_POST['father'];
        $occupation = $_POST['fatheroccupation'];
        $fathercontact = $_POST['fathercontact'];
        $mother = $_POST['mother'];
        $motheroccupation = $_POST['motheroccupation'];
        $mothercontact = $_POST['mothercontact'];
        $address = $_POST['address'];
        $grad = $_POST['elementarygrad'];
        $average = $_POST['average'];
        $schoolyear = $_POST['schoolyear'];
        $requirements = $_POST['requirements'];
        //$b = implode(",",$requirements);
        $pass = $_POST['sname'];

      

        $sql1 = "SELECT * FROM enrollmentform WHERE id = '$id'";
        $result1 = mysqli_query($db, $sql1);
                while($row1 = mysqli_fetch_array($result1))
                {
                     $kindofuser=$row1['kindofuser'];
                     $usersection = $row1['section'];
                }

        if($kindofuser == 'new')
        {
         $stno = 'SHS'."".date('d')."".$id;
         $process='enrolled';  
        $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `stno` = '$stno', `schoolyear` = '$schoolyear', `requirements`='$requirements', `process`='$process', `username`='$stno', `password`='$pass', `kindofuser`='old'  WHERE `id` = '$id' ";

        $res = mysqli_query($db,$sql);

        if ($res) {  
                      $sqlinsert = "INSERT into studentdetails (stno, stname, age, gender, dateofbirth, address, mothername, mothercontact ,fathername, fathercontact, username, password,image)
                       VALUES('$stno','$pass','$age','$gen','$bday','$address','$mother', '$mothercontact', '$father',
                       '$fathercontact','$stno','$pass','default.png')";
                      $resultinsert = mysqli_query($db, $sqlinsert);
                              if($resultinsert)
                                    {
                                    
                                      echo'<script>swal("Successful!", "Completely Enrolled", "success");</script>';
                                      header('Refresh: 1; url=index.php'); 
                                      
                                    }         
                  }
         else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
              }
 
      }
        else
        {
          $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `schoolyear` = '$schoolyear', requirements='$requirements', `process`='enrolled' WHERE `id` = '$id' ";

        $res = mysqli_query($db,$sql);

        if ($res) {
          $dbstno = $_SESSION['dbstno'];
       
                 $sqlupdate ="UPDATE studentdetails set stno='$dbstno', stname='$pass', age ='$age', gender='$gen', dateofbirth='$bday', address='$address', mothername='$mother', fathername='$father' WHERE stno='$dbstno'";
                  $resultupdate = mysqli_query($db, $sqlupdate);
                           if($resultupdate)
                            {

                              echo'<script>swal("Successful!", "Completely Enrolled", "success");</script>';
                              header('Refresh: 1; url=index.php'); 
                              

                           }
        }else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
        }
        $_SESSION['requirements'] = $requirements;
        $_SESSION['schoolyear'] = $schoolyear;
        $_SESSION['grade'] = $grade;
        $_SESSION['surname'] = $surname;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['mname'] = $mname;
        $_SESSION['age'] = $age;
        $_SESSION['address'] = $address;
        $_SESSION['bday'] = $bday;
         $_SESSION['average'] = $average;
         $_SESSION['gender'] = $gen;
          $_SESSION['mother'] = $mother;
          $_SESSION['father'] = $father;
         $_SESSION['name'] = $_POST['fname'].' '.$_POST['sname'];
         $_SESSION['id'] = $id;
        }
       }


       ?>
                  
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> Student Information Form</h4></div>
        <div class="panel-body">


          
          <?php 
          $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE id ='$id' ");
          if ($row = mysqli_fetch_array($query)) {
              ?>


 <form class="form-horizontal" action="approveenroll.php" method="POST" 
         id="Form-validation" >

           <div class="form-group">
                <label class="control-label col-sm-3" for="sname">Surname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="sname"  name="sname" value="<?php echo $row['sname']; ?>" required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="fname">Firstname</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname'];?>" required>
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-3" for="mname">Middlename</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $row['mname'];?>" required>
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="place">Place of birth</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="place" name="place"  value="<?php echo $row['placeofbirth'];?>" required>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="email">Email</label>
                  <div class="col-sm-8"> 
                  <input type="email" class="form-control" id="email" name="email" 
                 value="<?php echo $row['email'];?>" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="gender">Gender</label>
                  <div class="col-sm-8"> 
                  <select class="form-control " name="gender" id="gender" placeholder="Choose Gender"   required>
                  <option><?php echo $row['gender'];?></option>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="bday">Birth Date</label>
                  <div class="col-sm-8"> 
                  <input type="date" class="form-control" id="bday" name="bday"
                   value="<?php echo $row['dateofbirth'];?>" required> 
                 
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="age">Age</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="age" name="age"
                   value="<?php echo $row['age'];?>" required> 
                 
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="grade">Grade</label>
                  <div class="col-sm-8"> 
                   <select class="form-control " name="grade" id="grade" value="<?php echo $row['age'];?>" >

                  <option><?php echo $row['grade']; ?></option>
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
                   value="<?php echo $row['father'];?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fatheroccupation">Father Occupation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fatheroccupation" name="fatheroccupation" value="<?php echo $row['fatheroccupation'];?>"  required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fathercontact">Father Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fathercontact" name="fathercontact"  value="<?php echo $row['fathercontact'];?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mother">Mother Name</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mother" name="mother" 
                  value="<?php echo $row['mother'];?>"  required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="motheroccupation">Mother Occupation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="motheroccupation" name="motheroccupation" value="<?php echo $row['motheroccupation'];?>" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mothercontact">Mother Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mothercontact" name="mothercontact" value="<?php echo $row['mothercontact'];?>" required>
                  </div>
              </div>

              <hr>
              <p class="text-center"> Background Information</p>
              <hr>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="address">Address</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="address" name="address" 
                  value="<?php echo $row['address'];?>"  required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="elementarygrad">Elementary Graduated</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="elementarygrad" name="elementarygrad" value="<?php echo $row['elementarygraduated'];?>" required>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="average">General Average</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="average" name="average" value="<?php echo $row['average']; ?>" required>
                  </div>
              </div>

              <hr>
              <p class="text-center">Other Information</p>
              <hr>


               <div class="form-group">
                  <label class="control-label col-sm-3" for="date">Date Registered</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="date" name="date" value="<?php echo $row['date']; ?>" required>
                  </div>
               </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="schoolyear">School Year</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="schoolyear" name="schoolyear" value="<?php echo $row['schoolyear']; ?>" required>
                  </div>
               </div>

               <hr>
               <p class="text-center">Student Requirements</p>
               <hr>

                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements"  value="FORM138/CARD">&nbsp;Form 138 / Card
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements" value="FORM138/CARD">&nbsp;Form 137
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements"  value="FORM138/CARD">&nbsp;Birth Certificate
                  
                </div>
               </div>
                <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements" value="FORM138/CARD">&nbsp;Good moral
                  
                </div>
               </div> 
               <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements"  required value="FORM138/CARD">&nbsp;Remarks No Requirements
                  
                </div>
               </div>

                  <div class="row" style="margin-top: 25px;">
              <div class="col-md-4 pull-left">
              <a class="btn btn-info btn-lg" href="index.php" name="back"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Back </a>
              </div>
                <div class="col-md-offset-4 pull-right" style="margin-right:40px; ">
                <button class="btn btn-success btn-lg" type="submit" name="Update" ><span class="glyphicon glyphicon-save" aria-hidden="true" ></span> Enroll </button>
                </div>
                </div>
               










            
         
            
          </form>
         <?php
          }
          ?>  
      


            

      <!-- End of Form -->
      <br>
      <br>
      <br>
      <hr>
      

      </div>
         
          
      
      
      </div>
      <!-- End ofPanel -->
      


        </div>
      </div> 


      </div>

  <!--end of navbar-->
  <!--
  <div class="container">
  <div class="row" style="padding-top: 20px;">
      <div class="col-md-2"></div>
      <div class="col-md-8">
      
      <div class="panel panel-primary">
      <?php 
      

        if (isset($_POST['update'])) {
        
        $surname = $_POST['sname'];
        $firstname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $birthplace = $_POST['place'];
        $gen = $_POST['gender'];
        $bday = $_POST['bday'];
        $age = $_POST['age'];
        $grade = $_POST['grade'];
        $father = $_POST['father'];
        $occupation = $_POST['fatheroccupation'];
        $fathercontact = $_POST['fathercontact'];
        $mother = $_POST['mother'];
        $motheroccupation = $_POST['motheroccupation'];
        $mothercontact = $_POST['mothercontact'];
        $address = $_POST['address'];
        $grad = $_POST['elementarygrad'];
        $average = $_POST['average'];
        $schoolyear = $_POST['schoolyear'];
        $requirements = $_POST['requirements'];
        $b = implode(",",$requirements);
        $pass = $_POST['fname']." ".$_POST['sname'];

        $sql1 = "SELECT * FROM enrollmentform WHERE id = '$id'";
        $result1 = mysqli_query($db, $sql1);
                while($row1 = mysqli_fetch_array($result1))
                {
                     $kindofuser=$row1['kindofuser'];
                     $usersection = $row1['section'];
                }

        if($kindofuser == 'new')
        {
         $stno = 'SHS'."".date('d')."".$id;
         $process='enrolled';  
        $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `stno` = '$stno', `schoolyear` = '$schoolyear', requirements='$b', `process`='$process', `username`='$stno', `password`='$pass', `kindofuser`='old'  WHERE `id` = '$id' ";

        $res = mysqli_query($db,$sql);

        if ($res) {  
                      $sqlinsert = "INSERT into studentdetails (stno, stname, age, gender, dateofbirth, address, mothername, fathername, username, password) VALUES('$stno','$pass','$age','$gen','$bday','$address','$mother','$father','$stno','$pass')";
                      $resultinsert = mysqli_query($db, $sqlinsert);
                              if($resultinsert)
                                    {
                                      echo'<script>swal("Successful!", "Completely Enrolled", "success");</script>';
                                      header('Refresh: 1; url=index.php'); 
                                    }         
                  }
         else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
              }
 
      }
        else
        {
          $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `schoolyear` = '$schoolyear', requirements='$b', `process`='enrolled' WHERE `id` = '$id' ";

        $res = mysqli_query($db,$sql);

        if ($res) {
          $dbstno = $_SESSION['dbstno'];
       
                 $sqlupdate ="UPDATE studentdetails set stno='$dbstno', stname='$pass', age ='$age', gender='$gen', dateofbirth='$bday', address='$address', mothername='$mother', fathername='$father' WHERE stno='$dbstno'";
                  $resultupdate = mysqli_query($db, $sqlupdate);
                           if($resultupdate)
                            {
                              echo'<script>swal("Successful!", "Completely Enrolled", "success");</script>';
                              header('Refresh: 1; url=index.php'); 
                           }
        }else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
        }
         $_SESSION['requirements'] = $b;
        $_SESSION['schoolyear'] = $schoolyear;
        $_SESSION['grade'] = $grade;
        $_SESSION['surname'] = $surname;
        $_SESSION['firstname'] = $firstname;
        $_SESSION['mname'] = $mname;
        $_SESSION['age'] = $age;
        $_SESSION['address'] = $address;
        $_SESSION['bday'] = $bday;
         $_SESSION['average'] = $average;
         $_SESSION['gender'] = $gen;
          $_SESSION['mother'] = $mother;
          $_SESSION['father'] = $father;
         $_SESSION['name'] = $_POST['fname'].' '.$_POST['sname'];
         $_SESSION['id'] = $id;
        }
       }


       ?>
                  
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> Enrollment Form</h4></div>
        <div class="panel-body">

         <form class="form-horizontal" action=""  method="POST" >
          
          <?php 
          $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE id ='$id' ");
          if ($row = mysqli_fetch_array($query)) {
              ?>



            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 25px;">STUDENT'S NAME</label>
            </div>
              <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                <label class="control-label">&nbsp;Surname :</label>
                  <input type="text" class="form-control input-lg" id="fname" name="sname"  placeholder="Surname" value="<?php echo $row['sname'];?>"
                  required>
                </div>
                <div class="col-md-4">
                <label class="control-label">&nbsp;Firstname :</label>
                  <input type="text" name="fname" class="form-control input-lg" placeholder="First name" value="<?php echo $row['fname'];?>" required >
                </div>
                 <div class="col-md-4">
                 <label class="control-label">&nbsp;Middlename :</label>
                  <input type="text" name="mname" class="form-control input-lg" placeholder="Middle name" value="<?php echo $row['mname'];?>" required >
                </div>
                </div>

                <div class="row" style="padding-top: 25px;">
                <div class="col-md-4" >
                  <label class="control-label">&nbsp;Place of Birth :</label>
                  <input type="text" class="form-control input-lg"  name="place"  placeholder="Place of Birth" 
                  value="<?php echo $row['placeofbirth'];?>"
                  required>
                </div>
                 <div class="col-md-4">
                 <label class="control-label">&nbsp;Email :</label>
                  <input type="email" class="form-control input-lg"  name="email"  placeholder="Email" value="<?php echo $row['email'];?>" required>
                </div>   

                 <div class="col-md-4">
                 <label class="control-label">&nbsp;Gender :</label>
                 <select class="form-control input-lg" name="gender" placeholder="Choose Gender" required>
                   <option><?php echo $row['gender'];?></option>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                </div>
                </div>


                <div class="row" style="padding-top: 25px;">
                <div class="col-md-4" >
                  <label class="control-label">&nbsp;Date of Birth :</label>
                  <input type="date" name="bday" class="form-control input-lg"   placeholder="Birth Date" value="<?php echo $row['dateofbirth'];?>" required>
                </div>


                 <div class="col-md-4" >
                 <label class="control-label">&nbsp;Age :</label>
                  <input type="text" name="age" class="form-control input-lg"   placeholder="Age" value="<?php echo $row['age'];?>" required ">
                </div>

                <div class="col-md-4" >
                <label class="control-label">&nbsp;Grade :</label>
                <select class="form-control input-lg" name="grade" required>
                  <option><?php echo $row['grade']; ?></option>
                    <option>Grade-7</option>
                    <option>Grade-8</option>
                    <option>Grade-9</option>
                    <option>Grade-10</option>
                </select>   
                </div>
                </div>
                <hr>               
                


            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 20px;">PARENTS / GUARDIAN INFO</label>
            </div>

            <div class="row" style="padding-top: 35px;">
              <div class="col-md-4">
              <label class="control-label">&nbsp;Father's Name :</label>
              <input type="text" name="father" class="form-control input-lg" placeholder="Father's Name" value="<?php echo $row['father'];?>" required="">
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Father's Occupation :</label>
              <input type="text" name="fatheroccupation" class="form-control input-lg" placeholder="Occupation" 
              value="<?php echo $row['fatheroccupation'];?>" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Father's Contact :</label>
              <input type="text" name="fathercontact" class="form-control input-lg" placeholder="Contact No." 
              value="<?php echo $row['fathercontact'];?>" required>
              </div>
            </div>


            <div class="row" style="padding-top: 25px;">
               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother's Name :</label>
              <input type="text"  name="mother" class="form-control input-lg" placeholder="Mother's Name" 
              value="<?php echo $row['mother'];?>" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother's Occupation :</label>
              <input type="text" name="motheroccupation" class="form-control input-lg" placeholder="Occupation" value="<?php echo $row['motheroccupation'];?>"
              required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother's Contact :</label>
              <input type="text" name="mothercontact" class="form-control input-lg" placeholder="Contact No." 
              value="<?php echo $row['mothercontact'];?>" required="">
              </div>
            </div>

            <hr>
              <div class="text-center">
             <label class="control-label-12 text-center" style="padding-top: 35px;">BACKGROUND INFO</label>
             </div>

              <div class="row" style="padding-top: 25px;">
              <div class="col-md-12">
              <label class="control-label">&nbsp;Address :</label>
              <input type="text" name="address" class="form-control input-lg" placeholder="Address" value="<?php echo $row['address'];?>" required>
              </div>
              </div>

              <div class="row" style="padding-top: 25px;">
               <div class="col-md-8"">
               <label class="control-label">&nbsp;Elementary Graduated :</label>
              <input type="text" name="elementarygrad" class="form-control input-lg" placeholder="Elementary School Graduated" value="<?php echo $row['elementarygraduated'];?>" required>
              </div>

              <div class="col-md-4">
              <label class="control-label">&nbsp;General Average :</label>
              <input type="text" name="average" class="form-control input-lg" placeholder="General Average" value="<?php echo $row['average']; ?>" required>
              </div>
              </div>

              <div class="row" style="padding-top: 25px;">
               <div class="col-md-8">
               <label class="control-label">&nbsp;Date Registered :</label>
              <input type="text" name="date" class="form-control input-lg" placeholder="Date Enrolled" value="<?php echo $row['date']; ?>" required>
              </div>

              </div>

              <div class="row" style="padding-top: 25px;">
              <div class="col-md-4">
              <label class="control-label">&nbsp;School Year :</label>
              <input type="text" name="schoolyear" class="form-control input-lg" placeholder="School Year" value="<?php echo $row['schoolyear']; ?>" required>
              </div>
              <br>
              </div>
              <hr>

              <div class="text-center">
             <label class="control-label-12 text-center" for="fname" style="padding-top: 45px;">FORMS/REQUIREMENTS SUBMITTED : (To be Checked by the Enrolling Teacher)</label>
             </div>

             <div class="row" style="padding-top: 25px;">
             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" name="requirements[]" value="FORM138/CARD">FORM138/CARD
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox"  name="requirements[]" value="FORM137">FORM137
            </label>
            </div>

             <div class="col-md-3">
             <label class="checkbox-inline">
              <input type="checkbox"  name="requirements[]"  value="BIRTH CERTIFICATE">BIRTH CERTIFICATE
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox"  name="requirements[]"  value="GOOD MORAL">GOOD MORAL
            </label>
            </div>

           <div class="col-md-3">
             <label class="checkbox-inline">
              <input type="checkbox"  name="requirements[]"  value="NO REQUIREMENTS">NO REQUIREMENTS
            </label>
            </div>
            </div>

              <div class="row" style="padding-top: 25px;">
              <div class="col-md-4 pull-left">
              <a class="btn btn-info btn-lg" href="index.php" name="back"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Back </a>
              </div>
                <div class="col-md-offset-4 pull-right" >
                <button class="btn btn-success btn-lg" type="submit" name="update"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Enroll </button>
                </div>
                </div>


          </form>
                         <?php
          }
          ?>  
      


            

      <!-- End of Form -->
      <br>
      <br>
      <br>
      <hr>
      

      </div>
         
          
      
      
      </div>
      <!-- End ofPanel -->
      


        </div>
      </div> 
      </div>
      -->

   <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
   </footer>

<script>
$(document).ready(function () {
    var usedNames = {};
    $("select > option").each(function () {
        if (usedNames[this.value]) {
            $(this).remove();
        } else {
            usedNames[this.value] = this.text;
        }
    });
});
 </script>
</body>
</html>
<?php
}else{
  echo "<Script>Location.href='index.php'</script>";
}
?>
