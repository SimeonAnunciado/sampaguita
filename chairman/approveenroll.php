<?php
include'db.php';
session_start();

 //$sessionfname = $_SESSION['fname'];
 //$sessionlname = $_SESSION['lname'];
   
 if (isset($_GET['name'])) {
     $name = $_GET['name'];
 }

//$id = $_SESSION['id'];

if(isset($_SESSION['id'])){
  $id = $_SESSION['id'];
  $que = "SELECT * FROM enrollmentform WHERE id = '$id' limit 0,1";
  $res = mysqli_query($db,$que)or die(mysqli_error());
  $row = mysqli_fetch_array($res);


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
        <script src="../js/bootstrap.min.js"></script>

</head>
<body>
<header class="container text-center animated fadeInDown" id="header-logo" > 
 <div class="col-md-2 ">
    <img src="images/logo.png" height="120"> 
  </div> 
  <h1 style="font-style: forte;">SAMPAGUITA HIGH SCHOOL</h1>
</header>
<body>

<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
       $query = mysqli_query($db,"SELECT * FROM chairman where kindofuser = '$_SESSION[userchairman]' AND userlvl = '$_SESSION[userlvl]' ");
         $row = mysqli_fetch_array($query);
         $row['sname'];

        if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        }elseif (isset($_SESSION['userchairman'])){
          echo $row['sname'];          
        }else{
          echo "Undefined Session";
        }

         
          


        ?>

        </a>
        <ul class="dropdown-menu">
          <li><a href="../otherfiles/logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
<div class="row" style="padding-top: 20px; margin-bottom: 80px;">
      <div class="col-md-1"></div>
      <div class="col-md-10">
      <?php 
       $query = mysqli_query($db,"SELECT * FROM chairman where kindofuser = '$_SESSION[userchairman]' AND userlvl = '$_SESSION[userlvl]' ");
        $row = mysqli_fetch_array($query);
          $fullname = $_SESSION['userchairman'] .' : '. $row['sname'] .', '. $row['fname'] .' '. $row['mname'];
         // echo $fullname;


      ?>
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
        $requirements = $_POST['requirementslist'];
        //$b = implode(",",$requirementslist);
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
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `stno` = '$stno', `schoolyear` = '$schoolyear', `requirements`='$requirements', `process`='$process', `username`='$stno', `password`='$pass', `kindofuser`='old' ,assesedby = '$fullname' WHERE `id` = '$id' ";

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
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `schoolyear` = '$schoolyear', requirements='$requirements', `process`='enrolled' ,assesedby = '$fullname' WHERE `id` = '$id' ";

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

          
         


 <form class="form-horizontal" action="approveenroll.php" method="POST" 
         id="Form-validation" >

          <?php 
          $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE id ='$id' ");
          if ($row = mysqli_fetch_array($query)) {
              ?>

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
                  <input type="text" name="gender" class="form-control" id="gender" 
                  value="<?php echo $row['gender'];?>">
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
                  <input type="text" class="form-control" id="motheroccupation" name="motheroccupation" 
                  value="<?php echo $row['motheroccupation'];?>" required>
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
               <!--
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
                  <input type="checkbox" name="requirements[]" value="GOOD MORAL>&nbsp;Good moral
                  
                </div>
               </div> 
               <div class="form-group">
                <div class="col-md-5">
                  <label class="checkbox-inline"></label>
                  <input type="checkbox" name="requirements[]"  required value="NO REQUIREMENTS">&nbsp;Remarks No Requirements
                  
                </div>
               </div>
               
                -->

                <div class="form-group">
                <div class="col-md-12">
                  <label class="checkbox-inline"></label>
                   <input type="text" readonly="readonly" name="requirementslist" class="form-control" value="<?php echo $row['requirements']; ?>" required>
                  
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
      <div class="col-md-1"></div>

        <footer id="footer">
          <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
          <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
          <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
        </footer>

    </div>  

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
  <!-- script -->

    <script type="text/javascript">
      $(document).ready(function (){
        var validator = $('#Form-validation').bootstrapValidator({
            feedbackIcons : {
                    valid : "glyphicon glyphicon-ok",
                    invalid : "glyphicon glyphicon-remove",
                    validating : "glyphicon glyphicon-refresh",

                },

          fields : {
            sname : {
              validators :{
                notEmpty : {
                  message : "Required Surname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "First name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field can consist of alphabetical characters and spaces only'
                  },
              }
            },
            fname : {
              validators :{
                notEmpty : {
                  message : "Required Firstname"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Last name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field can consist of alphabetical characters and spaces only'
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
                  message: 'The input field  can consist of alphabetical characters and spaces only'
                  },
              }
            },

              place : {
              validators :{
                notEmpty : {
                  message : "Required Place Of Birth"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Middle name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field  can consist of alphabetical characters and spaces only'
                  },
              }
            },



            bday : {
              validators:{
                notEmpty:{
                  message: "Required Birth Date"
                }
              }
            },

             email : {
              validators :{
                notEmpty : {
                  message : "Required Email"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Middle name should be only 2-25 character "
                },
            
                  emialAddress:{
                    message : "Email Address was Invalid"
                  }
              }
            },



            grade : {
              validators :{
                notEmpty : {
                  message : "Required Grade"
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

             father : {
              validators :{
                notEmpty : {
                  message : "Required Father name"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Father name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field can consist of alphabetical characters and spaces only'
                  },
              }
            },
            fatheroccupation : {
              validators :{
                notEmpty : {
                  message : "Required Father Occupation"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Father Occupation  should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field  can consist of alphabetical characters and spaces only'
                  },
              }
            },
            fathercontact: {
              validators :{
                notEmpty : {
                  message : "Required Father Contact Number"
                },
                stringLength : {
                  min : 12,
                  max : 12,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },


             mother : {
              validators :{
                notEmpty : {
                  message : "Required Mother name"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Mother name should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field  can consist of alphabetical characters and spaces only'
                  },
              }
            },
            motheroccupation : {
              validators :{
                notEmpty : {
                  message : "Required Mother Occupation"
                },
                stringLength : {
                  min : 2,
                  max : 25,
                  message : "Mother Occupation  should be only 2-25 character "
                },
                regexp: {
                  regexp: /^[a-z\s]+$/i,
                  message: 'The input field  can consist of alphabetical characters and spaces only'
                  },
              }
            },
            mothercontact: {
              validators :{
                notEmpty : {
                  message : "Required Mother Contact Number"
                },
                stringLength : {
                  min : 11,
                  max : 13,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
             address: {
              validators :{
                notEmpty : {
                  message : "Required Address"
                },
                stringLength : {
                  min : 5,
                  max : 100,
                  message : "Invalid Address!"
                },
                 
              }
            },
             elementarygrad : {
              validators :{
                notEmpty : {
                  message : "Required Elementary Graduate"
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



              average: {
              validators :{
                notEmpty : {
                  message : "Required Average"
                },
                stringLength : {
                  min : 2,
                  max : 2,
                  message : "Invalid Input it should be 2 nubers only!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            }
           
             

          }
        });
      });
    </script>


    



    <!-- script -->

</body>
</html>
<?php
}else{
  echo "<Script>Location.href='index.php'</script>";
}





