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
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
    <!-- Latest compiled and minified CSS -->  

  <!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
       <link rel="stylesheet" href="css/style.css">
       <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
</head>
<body style="background-color: #f5f5f5">

<?php include 'navbar1.php'; ?>


<br><br>
<br><br>
<br><br>
  
  <style type="text/css">
    .well p{
      float: right;
    }
  </style>
 

  <div class="row">

    <div class="col-md-1"></div>
     <div class="well col-md-10" style="margin: -190px 0px 90px 0px; border-left: solid green 5px; border-right:solid green 5px;"><span class="glyphicon glyphicon-asterisk"></span>
     <strong>Welcome</strong> :
      New Enrolee / Transferee Page 
    </div>
    <div class="col-md-10">

         
       <div class="panel panel-primary" style="margin:-110px 0px 90px 0px; " >
       <?php
       $usernamesession = $_SESSION['email'];

        if (isset($_POST['submit'])) {
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





         <form class="form-horizontal" action="" method="POST" id="Form-validation" class="form-horizontal">
          
            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 25px;">STUDENT'S NAME</label>
            </div>
              <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                  <label>Lastname :</label>
                  <input type="text" class="form-control input-lg" id="fname" name="sname"  placeholder="Enter Lastname Here.." value="<?php echo $surname;?>"
                 required >
                </div>
                <div class="col-md-4">
                  <label>Firstname :</label>
                  <input type="text" name="fname" class="form-control input-lg" placeholder="Enter First name Here.." value="<?php echo $firstname;?>"  required >
                </div>
                 <div class="col-md-4">
                 <label>Middlename : </label>
                  <input type="text" name="mname" class="form-control input-lg" placeholder="Enter Middle name Here.." value="<?php echo $mname;?>"  required >
                </div>
              </div>


              <div class="row">
                <div class="col-md-4" style="padding-top: 25px;">
                  <label>Place of Birth :</label>
                  <input type="text" class="form-control input-lg"  name="place"  placeholder="Enter Place of Birth Here.." value="<?php echo $birthplace;?>"  required >
                </div>
                 <div class="col-md-4" style="padding-top: 25px;">
                 <label>Email :</label>
                  <input type="email" class="form-control input-lg"  name="email"  placeholder="Enter Email Here.." value="<?php echo $usernamesession; ?>" required  >
                </div>  

                 <div class="col-md-4" style="padding-top: 25px;">
                 <label>Gender :</label>
                 <select class="form-control input-lg" name="gender" placeholder="Choose Gender" value="<?php echo $gender;?>"  required>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                </div>
                </div>


                <div class="row">
                <div class="col-md-4" style="padding-top: 25px;">
                <label>Date of Birth :</label>
                  <input type="date" name="bday" class="form-control input-lg" value="<?php echo $bday;?>"   placeholder="Birth Date" required >
                </div>


                <div class="col-md-4" style="padding-top: 25px;"  required>
                <label>Grade : </label>
                <select class="form-control input-lg" name="grade" value="<?php echo $grade;?>" >         
                    <option value="Grade-7">Grade-7</option>
                    <option value="Grade-8">Grade-8</option>
                    <option value="Grade-9">Grade-9</option>
                    <option value="Grade-10">Grade-10</option>
                </select>
                </div>
                </div>


            <hr>
            <div class="text-center">
            <label class="control-label-12 text-center" for="fname" style="padding-top: 20px;">PARENTS / GUARDIAN INFO</label>
            </div>

            <div class="row" style="padding-top: 35px;"  >
              <div class="col-md-4">
              <label>Father's Name :</label>
              <input type="text" name="father" class="form-control input-lg" placeholder="Enter Father's Name Here.." value="<?php echo $father;?>"  required>
              </div>

               <div class="col-md-4">
               <label>Father's Occupation :</label>
              <input type="text" name="fatheroccupation" class="form-control input-lg" placeholder="Enter Father's Occupation Here.." value="<?php echo $fatheroccupation;?>"  required >
              </div>

               <div class="col-md-4">
               <label>Father's Contact :</label>
              <input type="text" name="fathercontact" class="form-control input-lg"  value="<?php echo $fathercontact;?>"  placeholder="Ex. 639123456789"  required>
              </div>

            </div>

            <div class="row" style="padding-top: 25px;">
              
               <div class="col-md-4">
               <label>Mother's Name :</label>
              <input type="text"  name="mother" class="form-control input-lg" placeholder="Enter Mother's Name Here.." value="<?php echo $mother;?>"  required >
              </div>

               <div class="col-md-4">
               <label>Mother's Occupation :</label>
              <input type="text"  name="motheroccupation" value="<?php echo $motheroccupation;?>"  class="form-control input-lg" placeholder="Enter Mother's Occupation Here.."    required >
              </div>

               <div class="col-md-4">
               <label>Mother's Contact :</label>
              <input type="text" name="mothercontact" value="<?php echo $mothercontact;?>"  class="form-control input-lg" placeholder="Ex. 639123456789"  required>
              </div>

            </div>

            <hr>
              <div class="text-center">
             <label class="control-label-12 text-center" style="padding-top: 35px;">BACKGROUND INFO</label>
             </div>

             <div class="row">
              <div class="col-md-12" style="padding-top: 35px;">
              <label>Address :</label>
              <input type="text" name="address" class="form-control input-lg" value="<?php echo $address;?>"  placeholder="Enter Address Here.."   required>
              </div>
            </div>

            <div class="row">
               <div class="col-md-8" style="padding-top: 25px;">
               <label>Elementary Graduated :</label>
              <input type="text" name="elementarygrad" class="form-control input-lg" value="<?php echo $elementarygrad;?>"  placeholder="Enter Elementary School Graduated Here.."  required>
              </div>

              <div class="col-md-4" style="padding-top: 25px;">
              <label>General Average:</label>
              <input type="text" name="average" class="form-control input-lg" value="" placeholder="Enter General Average Here.."  required >
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
            -->
         
            <div class="text pull-right">
             <label class="control-label-12" style="padding-top: 45px;"><button class=" btn btn-primary btn-lg" name="submit" ><span class="glyphicon glyphicon-forward"></span> NEXT </button></label>
             </div>
          </form>

        

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
  </div>
 <!-- 

   <script type="text/javascript">


      $(document).ready(function (){
        var validator = $('#Form-validation').bootstrapValidator({
        

          fields : {



            fathercontact: {
              validators :{
                notEmpty : {
                  message : "Required Guardian Contact Number"
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
             mothercontact: {
              validators :{
                notEmpty : {
                  message : "Required Guardian Contact Number"
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
              average: {
              validators :{
                notEmpty : {
                  message : "Required Average"
                },
                stringLength : {
                  min : 2,
                  max : 2,
                  message : "Invalid Input!"
                },
                integer : {
                  message : "Invalid It should be contain Number only!"
                }
              }
            },
            


          }



        });
      });
    </script>
         -->   


          <script type="text/javascript">
      $(document).ready(function (){
        var validator = $('#Form-validation').bootstrapValidator({
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
                  message : "Last name should be only 2-25 character"
                },
                regexp: {
                            regexp: /^[a-z\s]+$/i,
                            message: 'The full name can consist of alphabetical characters and spaces only'
                            }
              }
            },
            email : {
              validators :{
                notEmpty : {
                  message : "Required Lastname"
                },
                stringLength : {
                  max : 25,
                  message : "Too long Last name should be only 25 character"
                }
              }
            },

            pass2 : {
              validators : {
                notEmpty : {
                  message : "Password is required"
                },
                stringLength : {
                  min : 3,
                  max : 25,
                  message : "Password invalid! it must be 3-25 required"
                },
                identical : {
                  field : "pass1",
                  message : "The 2 Password are not the Same!"
                }
              }
            },
            


          }



        });
      });
    </script>
  


  
<?php
  include'footer.php';
?>


   

    

</body>
</html>
<?php
}else{
  echo "Session Error";
}
?>