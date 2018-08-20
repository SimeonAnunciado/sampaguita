<?php
include 'db.php';
session_start();
  ## LINK SESSION

if (isset($_GET['msg'])) {
    $_SESSION['session'] = $_GET['msg'];

}
else{
  echo "Not Set session Year";
}




  if (isset($_POST['register'])) {
      $fname = $_POST['fname'];
      $lname = $_POST['lname'];
      $mname = $_POST['mname'];
      $grade = $_SESSION['session'];
      $email = $_POST['em'];
      $gen = $_POST['gen'];
      $ph = $_POST['ph'];
      $rel = $_POST['rel'];
      $add = $_POST['add'];
      $full = $_POST['full'];
      $relation= $_POST['relation'];
      $contact = $_POST['contact'];

      $query = "INSERT INTO `form` (`fname`, `lname`, `mname`,`grade`,`email`, `gender`, `phonenumber`, `religion`, `address`, `fullname`, `relation`, `contact`,`date`) VALUES ('$fname','$lname','$mname','$grade','$email','$gen','$ph','$rel','$add','$full','$relation','$contact',NOW()) ";
      $result = mysqli_query($db,$query) or die(mysqli_error());

        if($result){
          $_SESSION['fname'] = $fname;
          header('location:receipt.php?ok');
        }else{
          header('location:form.php?x');
        }
  }


?>

<!DOCTYPE html>
<html>
<head>
    <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
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
</head>
<body>
<br>
<br>
<div class="row">
  <div class="col-md-10 text-right">
    <a href="enroll.php" class="btn btn-primary ">Back</a>
    <br><br>
  </div>
</div>
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <div class="panel panel-primary">
      <div class="panel-heading">Register</div>
      <div class="panel-body">

     
      <!-- Form -->

      <?php 
        if (isset($_GET['x'])) {
                echo '<script language="javascript">';
              echo 'sweetAlert("Oops...", "Username / Password Incorrect", "error");';  
              echo '</script>';
        }
      ?>
       <form class="form-horizontal" action="form.php" method="POST" id="form">

      <?php 
      $emailsession = $_SESSION['email'];
      $wew = mysqli_query($db,"SELECT firstname, lastname, email FROM registereduser WHERE email = '$emailsession' ");
      if ($row = mysqli_fetch_array($wew)){
      ?>
              <div class="form-group">
                <label class="control-label col-sm-3" for="fname">Firstname</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['firstname'];?>"  required>
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="lname">Lastname</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lastname'];?>" required>
                </div>
                </div>
    
                <div class="form-group">
                  <label class="control-label col-sm-3" for="mname">Middle Name</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="mname" name="mname" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label class="control-label col-sm-3" for="grade">Grade</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="grade" name="grade" value="<?php echo $_SESSION['session'];?>" required>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="em">Email</label>
                  <div class="col-sm-8">
                    <input type="em" class="form-control" id="em" name="em" value="<?php echo $row['email'];?>" required>
                  </div>
                </div>
     <?php
      }
      ?>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="gen">Gender</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="gen" name="gen" required>
                  </div>

                  <div class="row" style="padding-top: 10px;">
                    <label class="col-md-8 control-label ">Begin With Region Code </label>
                  </div>

              </div>

                  

              <div class="form-group">
                  <label class="control-label col-sm-3" for="ph">Phone Number</label>
                  <div class="col-sm-8"> 
                  <input type="numbers" class="form-control" id="ph" name="ph" placeholder="639" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="rel">Religion</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="rel" name="rel" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-md-3" for="add">Address</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="add" name="add" required>
                  </div>

                  <div class="row" style="padding-top: 10px;">
                    <label class="col-md-10 control-label text-success"><h4>Guardian Information Please Do not Blank </h4></label>
                  </div>

              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="full">Full name </label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="full" name="full" required>
                  </div>
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="relation">Relation</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="relation" name="relation" required>
                   </div>
                    <div class="row" style="padding-top: 10px;">
                    <label class="col-md-8 control-label ">Begin With Region Code </label>
                  </div>
                  
              </div>
              <div class="form-group">
                  <label class="control-label col-sm-3" for="contact">Contact No.</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="contact" name="contact"  placeholder="639" required>
                  </div>
              </div>
            
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-success" name="register">Register</button>
                
              </div>
            </div>
        
          </form>

      <!-- End of Form -->

      </div>
      </div>
      <!-- End ofPanel -->
  </div>
  <div class="col-md-1"></div>
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

          }
        });
      });
    </script>

</body>
</html>