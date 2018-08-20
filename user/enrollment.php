<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['email']))
{
  header('location:studentportal.php');
}



if (isset($_SESSION['email'])) {
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


   <nav class="navbar navbar-default" id="navbar">
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
	    	  <li><a href="#"><strong>Welcome</strong> Student</a></li>
	        </ul>
           <ul class="nav navbar-nav navbar-right">
            <ul class="nav navbar-nav">
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
              <?php
              if (isset($_SESSION['email'])) {
                  echo $_SESSION['email'];
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
  </nav>



<br><br>
<br><br>
<br><br>
  
  <div class="container-fluid">

  <div class="row">

    <div class="col-md-1"></div>
  


     
    <div class="col-md-10" >
  


         
       <div class="panel panel-primary" id="panel-panel" style="margin:-110px 0px 90px 0px; " >
       <?php
       $usernamesession = $_SESSION['email'];

        if (isset($_POST['wew'])) {
        $sql = "SELECT * FROM enrollmentform WHERE username = '$usernamesession' ";
        $result = mysqli_query($db, $sql);
        $numrows = mysqli_num_rows($result);
          if($numrows >0)
          {
          $surname = $_POST['sname'];
          $firstname = $_POST['fname'];
          $mname = $_POST['mname'];
          $email = $_POST['email'];
          $birthplace = $_POST['place'];
          $gen = $_POST['gender'];
          $bday = $_POST['bday'];
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
          $requirements = $_POST['requirements'];
          $b = implode(",", $requirements);
          $schoolyear = date('Y');
          $process = 'pending';
          $kindofuser = 'new';

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
                   $_SESSION['reg']=NOW();     
        }
        else
        {
          echo'<script>sweetAlert("Sorry", "You Are Already Enrolled!", "error");</script>';
          header('location:logout.php');
        }
      


       
     }
 else 
  {
          $query = mysqli_query($db,"SELECT * FROM enrollmentform WHERE username ='$usernamesession'");
          while($row = mysqli_fetch_array($query)) {
            $surname = $row['sname'];
            $firstname = $row['fname'];
            $mname = $row['mname'];
            $email = $row['email'];
            $birthplace = $row['placeofbirth'];
            $gender = $row['gender'];
            $bday = $row['dateofbirth'];
            $grade = $row['grade'];
            $father = $row['father'];
            $fatheroccupation = $row['fatheroccupation'];
            $fathercontact = $row['fathercontact'];
            $mother = $row['mother'];
            $motheroccupation = $row['motheroccupation'];
            $mothercontact = $row['mothercontact'];
            $address = $row['address'];
            $elementarygrad = $row['elementarygraduated'];
            $average = $row['average'];
          }
         
  }

       ?>
                  
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> Enrollment Form</h4></div>
        <div class="panel-body">





         <form class="form-horizontal" action="enrollment.php" method="POST" 
         id="Form-validation" >

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
                  value="<?php echo $usernamesession; ?>" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="gender">Gender</label>
                  <div class="col-sm-8"> 
                  <select class="form-control " name="gender" id="gender" placeholder="Choose Gender"   required>
                   <option disabled selected="">Select Gender</option>
                   <option>Male</option>
                   <option>Female</option>
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
                   value="<?php echo $father;?>" placeholder = "Full name" required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fatheroccupation">Father Occupation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fatheroccupation" name="fatheroccupation" value="<?php echo $fatheroccupation;?>"  required>
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
                  value="<?php echo $mother;?>" placeholder = "Full name" required>
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
                  <input type="text" class="form-control" id="elementarygrad" name="elementarygrad" value="<?php echo $elementarygrad;?>" required>
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
                  <input type="checkbox" name="requirements[]" value="FORM137/CARD">&nbsp;Form 137
                  
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
                  <input type="checkbox" name="requirements[]"  required value="NO REQUIREMENTS">&nbsp;Remarks No Requirements
                  
                </div>
               </div>






            
         
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-success" name="wew">Register</button>
              </div>
            </div>
            
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

    
  

   

    

</body>
</html>
<?php
}else{
  echo "Session Error";
}
?>