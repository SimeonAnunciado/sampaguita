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
<body>

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
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['email'];?></a>
        <ul class="dropdown-menu">
          <li><a href="activitylog.php">My Account</a></li>
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>
    </div>
  </div>
</nav>
<br><br>
<br><br>
<br><br>

 

  <div class="row">
    <div class="col-md-1"></div>
    <!-- <div class="col-md-2">
      <div class="list-group">
        <a class="list-group-item active" href=""><?php echo $_SESSION['email'];?></a>
        <a class="list-group-item " href="activitylog.php">Activity</a>
        <a class="list-group-item" href="">Info</a>      
        <a class="list-group-item" href="">Settng</a>
       

      </div>
    </div> -->
    <div class="col-md-10">
         
       <div class="panel" >
       <?php

        if (isset($_POST['submit'])) {
        
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
        $process = 'pending';


       
      
    


       $query = "INSERT INTO `enrollmentform`( sname, fname, mname,email, placeofbirth, gender, dateofbirth, age, grade,father,fatheroccupation, fathercontact, mother, motheroccupation, mothercontact, address, elementarygraduated, average,process,date) 
        VALUES 
        ('$surname','$firstname','$mname','$email','$birthplace','$gen','$bday','$age','$grade','$father','$occupation','$fathercontact','$mother','$motheroccupation','$mothercontact','$address','$grad','$average','$process',NOW() ) ";

       $res = mysqli_query($db,$query);

           if ($res) {
              $_SESSION['surname']= $surname;
              $_SESSION['firstname']= $firstname;
              $_SESSION['middlename']= $mname;
               $_SESSION['grade'] = $grade; 
              echo 
            '<div class="alert alert-success alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Success!</strong> Indicates a successful or positive action.
            </div>';

            header('location:receipt.php');




              if ($average > 90) {
                  echo 
                    '<div class="alert alert-primary alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Section 1
                    </div>';
              }elseif ($average > 80) {
                  echo 
                    '<div class="alert alert-primary alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Section 2
                    </div>';
              }elseif ($average <80) {
                  echo 
                    '<div class="alert alert-primary alert-dismissable">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>Success!</strong> Last Section
                    </div>';
              }else{
                echo "errror";
              }

            
           }else{
             echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
          }


       }       
       ?>
                  
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> Enrollment Form</h4></div>
        <div class="panel-body">

         <form class="form-horizontal" action="" method="POST"  class="form-horizontal">
          
          <?php 
          $emailsession = $_SESSION['email'];
          $query = mysqli_query($db,"SELECT * FROM registereduser WHERE email ='$emailsession' ");
          if ($row = mysqli_fetch_array($query)) {
              ?>



            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 25px;">STUDENT'S NAME</label>
            </div>
              <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                  <input type="text" class="form-control input-lg" id="fname" name="sname"  placeholder="Surname" value="<?php echo $row['lastname'];?>"
                  required>
                </div>
                <div class="col-md-4">
                  <input type="text" name="fname" class="form-control input-lg" placeholder="First name" value="<?php echo $row['firstname'];?>" required >
                </div>
                 <div class="col-md-4">
                  <input type="text" name="mname" class="form-control input-lg" placeholder="Middle name" value="<?php echo $row['middlename'];?>" required >
                </div>



                <div class="col-md-4" style="padding-top: 25px;">
                  <input type="text" class="form-control input-lg"  name="place"  placeholder="Place of Birth" required>
                </div>
                 <div class="col-md-4" style="padding-top: 25px;">
                  <input type="email" class="form-control input-lg"  name="email"  placeholder="Email" value="<?php echo $row['email'];?>" required>
                </div>
                     <?php
          }
          ?>     

                 <div class="col-md-4" style="padding-top: 25px;">
                 <select class="form-control input-lg" name="gender" placeholder="Choose Gender" required>
                 <option placeholder="Choose Gender"></option>
                   <option  disabled selected>Choose Gender</option>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                </div>

                <div class="col-md-4" style="padding-top: 25px;">
                  <input type="date" name="bday" class="form-control input-lg"   placeholder="Birth Date" required>
                </div>


                 <div class="col-md-4" style="padding-top: 25px;">
                  <input type="text" name="age" class="form-control input-lg"   placeholder="Age" required ">
                </div>

                <div class="col-md-4" style="padding-top: 25px;">
                <select class="form-control input-lg" name="grade" required>
                  <option disabled selected>Choose Grade</option>
                    <option value="grade7">Grade 7</option>
                    <option value="grade8">Grade 8</option>
                    <option value="grade9">Grade 9</option>
                    <option value="grade10">Grade 10</option>
                </select>
                </div>

               
                
              </div>

            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 20px;">PARENTS / GUARDIAN INFO</label>
            </div>

            <div class="row" style="padding-top: 35px;">
              <div class="col-md-4">
              <input type="text" name="father" class="form-control input-lg" placeholder="Father's Name" required="">
              </div>

               <div class="col-md-4">
              <input type="text" name="fatheroccupation" class="form-control input-lg" placeholder="Occupation" required>
              </div>

               <div class="col-md-4">
              <input type="text" name="fathercontact" class="form-control input-lg" placeholder="Contact No.">
              </div>

            </div>

            <div class="row" style="padding-top: 25px;">
              
               <div class="col-md-4">
              <input type="text"  name="mother" class="form-control input-lg" placeholder="Mother's Name" required>
              </div>

               <div class="col-md-4">
              <input type="text" name="motheroccupation" class="form-control input-lg" placeholder="Occupation" required>
              </div>

               <div class="col-md-4">
              <input type="text" name="mothercontact" class="form-control input-lg" placeholder="Contact No.">
              </div>

              <div class="text-center">
             <label class="control-label-12 text-center" style="padding-top: 35px;">BACKGROUND INFO</label>
             </div>

              <div class="col-md-12" style="padding-top: 35px;">
              <input type="text" name="address" class="form-control input-lg" placeholder="Address">
              </div>

               <div class="col-md-8" style="padding-top: 25px;">
              <input type="text" name="elementarygrad" class="form-control input-lg" placeholder="Elementary School Graduated">
              </div>

              <div class="col-md-4" style="padding-top: 25px;">
              <input type="text" name="average" class="form-control input-lg" placeholder="General Average" required>
              </div>

              <div class="text-center">
             <label class="control-label-12 text-center" for="fname" style="padding-top: 45px;">FORMS/REQUIREMENTS SUBMITTED : (To be Checked by the Enrolling Teacher)</label>
             </div>

             <div class="container" style="padding-top: 45px;">

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">FORM138/CARD
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">FORM137
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">BIRTH CERTIFICATE
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">GOOD MORAL
            </label>
            </div>

             <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">PSA COPY
            </label>
            </div>

            <div class="col-md-2">
             <label class="checkbox-inline">
              <input type="checkbox" value="">LOCAL CIVIL REGISTER COPY
            </label>
            </div>

            </div>

            <div style="padding-top: 45px;">
            <button class=" btn btn-success btn-lg" name="submit"> Submit</button>
            </div>


          </form>
      
        
          </form>
        
        </div>
      </div>
  
    </div>
  </div>

      <script type="text/javascript">
      $(document).ready(function (){
        var validator = $('#form').bootstrapValidator({
            feedbackIcons : {
                    valid : "glyphicon glyphicon-ok",
                    invalid : "glyphicon glyphicon-remove",
                    validating : "glyphicon glyphicon-refresh",

                },

          fields : {
            fname : {
              validators :{
                notEmpty : {
                  message : "Required Firstname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "First name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            lname : {
              validators :{
                notEmpty : {
                  message : "Required Lastname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Last name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            mname : {
              validators :{
                notEmpty : {
                  message : "Required Middlename"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Middle name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The full name can consist of alphabetical characters and spaces only'
                  },
              }
            },
            gen : {
              validators :{
                notEmpty : {
                  message : "Required Gender"
                },
                stringLength : {
                  min : 4,
                  max : 6,
                  message : "Invalid Required Gender!"
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            ph : {
              validators :{
                notEmpty : {
                  message : "Required Phone Number"
                },
                stringLength : {
                  min : 11,
                  max : 12,
                  message : "Invalid Number!"
                },
                integer:{
                  message:"Error It must be Number only!"
                }
              
              }
            },
             rel : {
              validators :{
                notEmpty : {
                  message : "Required Religion"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid religion!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            add : {
              validators :{
                notEmpty : {
                  message : "Required Address"
                },
                stringLength : {
                  min : 5,
                  max : 50,
                  message : "Invalid Address!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
            full : {
              validators :{
                notEmpty : {
                  message : "Required Name of Guardian"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid Name!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
             relation : {
              validators :{
                notEmpty : {
                  message : "Required Name of relation"
                },
                stringLength : {
                  min : 5,
                  max : 20,
                  message : "Invalid output!"
                },
                 regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'Invalid! Letters Only!'
                  },
              }
            },
             contact: {
              validators :{
                notEmpty : {
                  message : "Required Guardian Contact Number"
                },
                stringLength : {
                  min : 11,
                  max : 13,
                  message : "Invalid Number!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
            grade : {
              validators :{
                notEmpty : {
                  message : "Please Select Year!"
                },
              }
            }, 
             method : {
              validators :{
                notEmpty : {
                  message : "Please Select Method!"
                },
              }
            },    

          }
        });
      });
    </script>

    


  

</body>
</html>