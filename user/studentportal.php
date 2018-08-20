<?php 
include 'db.php';
session_start();
  
  
  if(isset($_SESSION['email'])){
    echo "<script>alert('Please Log out First!');location.href='enrollment.php';</script>";
  }

  if(isset($_SESSION['userchairman'])){
    echo "<script>alert('Please Log out First!');location.href='../chairman/index.php';</script>";
  }
  
  if(isset($_SESSION['useradmin'])){
    echo "<script>alert('Please Log out First!');location.href='../admin/index.php';</script>";
  }

  if(isset($_SESSION['usersuper'])){
    echo "<script>alert('Please Log out First!');location.href='../superadmin/index.php';</script>";
  } 
 
?>
<!DOCTYPE html>
<html>
<title>Sampaguita High School</title>
<head>

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


<?php 
include'../otherfiles/navbar.php';
?>
<?php 
 if (isset($_POST['login'])) {
     $email = $_POST['em'];
     $pass = $_POST['pass'];

     $query ="SELECT * FROM enrollmentform WHERE username = '$email' AND password = '$pass' ";
     $result = mysqli_query($db,$query) or die(mysqli_error());

        if (mysqli_num_rows($result) >0 ) { 

              $row = mysqli_fetch_array($result);
                $process=$row['process'];
              
                if($process=='pending'){
                      $_SESSION['email'] = $email;
                      $msg='<script>swal("Successful!", "Completely Login", "success");</script>';
                      header('Refresh: 1; url=enrollment.php');
                    }elseif($process ==''){
                      $_SESSION['email'] = $email;
                      $msg='<script>swal("Successful!", "Completely Login", "success");</script>';
                      header('Refresh: 1; url=enrollment.php');
                    }else{
                      $msg = '<script>sweetAlert("Sorry", "Your Account Has Been Enrolled!", "error");</script>';
                    }
              
              

          }else{

            $sqladmin = "SELECT * FROM chairman WHERE username = '$email' AND password = '$pass'";
            $resultadmin = mysqli_query($db, $sqladmin);

                      if(mysqli_num_rows($resultadmin) > 0) {

                              $rows = mysqli_fetch_array($resultadmin);
                              $dbkindofuser = $rows['kindofuser'];
                              $dbuserlvl = $rows['userlvl'];

                              ///////////////////////////////////////////////////////// nkakalito :D ///////////////////////
                            
                             if($dbkindofuser =='Chairman'){

                                  $_SESSION['userchairman'] = $dbkindofuser;
                                  $_SESSION['userlvl'] = $dbuserlvl;
                                  $msg='<script>swal("Successful!", "Completely Login", "success");</script>';
                                  header('Refresh: 1; url=../chairman/index.php');

                                }elseif($dbkindofuser == 'Super Admin') {
                                  $_SESSION['usersuper'] = $dbkindofuser;
                                  $_SESSION['userlvl'] = $dbuserlvl;
                                  $msg='<script>swal("Successful!", "Completely Login", "success");</script>';
                                  header('Refresh: 1; url=../superadmin/index.php');


                                }else{

                                  $_SESSION['useradmin'] = $dbkindofuser;
                                  $_SESSION['userlvl'] = $dbuserlvl;
                                  
                                  $msg = '<script>swal("Successful!", "Completely Login", "success"); </script>';
                                  header ('Refresh: 1; url=../admin/index.php');

                                }
                              
                              /*  if($dbkindofuser == 'admin'){

                                  $_SESSION['useradmin'] = $dbkindofuser;
                                  $msg = '<script>swal("Successful!", "Completely Login", "success"); </script>';
                                  header ('Refresh: 1; url=../admin/index.php');

                                }else  

                                  ////////  dawan! orayt :)
                                }elseif($dbkindofuser == 'admin'){
                                  $_SESSION['useradmin'] = $dbkindofuser;
                                  $_SESSION['userlvl'] = $dbuserlvl;
                                   $msg = '<script>swal("Successful!", "Completely Login", "success"); </script>';
                                  header ('Refresh: 1; url=../admin/index.php');


                                  */


                      }else{
                        $msg = '<script>sweetAlert("Invalid", "Username Or Password is Incorrect!", "error");</script>';         
                      }


              //if($email =='admin' AND $pass =='admin') {
              //$user = 'admin';
                //$_SESSION['user'] = $user;
                 //$msg='<script>swal("Successful!", "Completely Login", "success");</script>';
                 //header('Refresh: 1; url=../admin/index.php');
                //}else{
                  //$msg = '<script>sweetAlert("Oops...", "Something went wrong!", "error");</script>';


//echo "<script>alert('Username Password Incorrectwewew');
                 //      </script>";
                        
         }  
    }
  if(isset($msg)){
    echo$msg;
  }




?>




 

  <div class="container text-justify" id="container-body">
    <div class="row">
        <div class="col-md-2"></div>

       <div class="col-md-8">
       <?php   
       if(isset($_GET['msg'])) {
         ?>
          <div class="alert alert-danger alert-dismissable fade in">
          <a href="#" class="close " data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Failed!</strong> <?php echo $_GET['msg']; ?>
          </div>
       <?php
        }
        ?>
          <div class="panel panel-primary" id="panel-panel" ">
              <div class="panel panel-heading"><center><b>Students Portal</b></center></div>
              <div class="panel panel-body" id="panel-body-body">
              <br>
              <br>
             
                  <div class="text-center" >
                    <div class="radio">
                      <label><input type="radio" class="rdio" name="optradio" data-toggle="modal" data-target="#myModal" ><b>New / Transferee Students</b></label>
                    </div>
                    <br>
                    <div class="radio">
                      <label><input type="radio" class="rdio" name="optradio" id="radios"  data-toggle="#modal2" data-target="#myModal2"><b>Old Students</b></label>
                    </div>
                  </div>
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


  <!--Modal-->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header" style="background-color: silver; border-radius: 5px;">
       
        <h4 class="modal-title" id="myModalLabel"><center><b>Old Students</b></center></h4>
      </div>
      
      <div class="modal-body">
      <form class="form-horizontal" method="POST" id="loginform" action="studentportal.php">
                <div class="form-group">
                <label class="col-sm-3 text-right" for="em">Username :</label>
                    <div class="col-sm-8">
                       <input type="text" name="usernameold" id="usernameold" placeholder="Enter Username" class="form-control input-lg">  
                    </div>
                </div>
               <div class="form-group">
                <label class="col-sm-3 text-right" for="em">Password:</label>
                    <div class="col-sm-8">
                       <input type="password" name="passold" id="passold" placeholder="Enter Password" class="form-control input-lg">  
                    </div>
                </div>
      </div>
      <div class="modal-footer">
                <div class="form-group">
                   <div class="col-md-offset-9">
                      <button class="btn btn-success" id="login" type="submit" name="loginold">LOGIN</button>
                      <br><br>
                   </div>
              </div>
      </div>
        </form>
    </div>
  </div>
</div>
</div>


<!--Modal-->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header" style="background-color: silver; border-radius: 5px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><b><center>Login Account</center></b></h4>
        </div>

        <div class="modal-body">
       
        <form class="form-horizontal" action="studentportal.php" method="POST" id="form">
                  <div class="form-group">

                      <label class="col-sm-3 control-label" for="em">Username :</span></label>
                          <div class="col-sm-8">
                       <input type="text" name="em" id="em" placeholder="Enter Username" class="form-control input-lg">
                      </div>
                  
                  </div>
                  <div class="form-group">
                    <label class="col-sm-3 control-label " for="pass">Password :</label>
                    <div class="col-sm-8">
                       <input type="password" name="pass" id="pass" placeholder="Enter Password" class="form-control input-lg">  
                    </div>
                  </div>
                  <div class="form-group">
                    <center>
                    <i><b><a href="register.php"> Do you want to register ?</a></b></i>
                    </center>
                  </div>
                  <hr>
                  <div class="form-group">
                    <div class="col-md-offset-9">
                      <button class="btn btn-success btn-sm" type="submit" name="login">LOGIN</button>
                  </div>
                  </div>
                  </form>

        </div>
        
      </div>
    </div>
  </div>




<script type="text/javascript">
  $(document).ready(function() {
    $('#radios').click(function() {
        $('#myModal').modal('hide');
    });
    $('#radios').click(function() {
        $('#myModal2').modal('show');
    });

});
</script>
<script type="text/javascript">
$(document).ready(function(){
  $('#loginform').on("submit",function(event){
    event.preventDefault();
      if($('#usernameold').val() == ''){  
         alert("Student Number is Required");  
      }else if($('#passold').val()==''){
          alert("Password is Required");
       }
      else  
        {  
         $.ajax({  
          url:"loginprocessold.php",  
          method:"POST", 
          data:$('#loginform').serialize(),  
          beforeSend:function(){  
           $('#login').val("Logging In");  
          },  
          success:function(data){ 
          window.location='../students/oldstudent.php'; 
          }  
         });  
        } 
  });

}); 
</script>
  




 
</body>
</html>


