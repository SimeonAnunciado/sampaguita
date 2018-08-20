<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['userchairman']))
{
  header('location:../user/studentportal.php');
}


 
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
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    
    <div class="collapse navbar-collapse" id="myNavbar">
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
    </ul>
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
          echo $row['sname'];//$_SESSION['userchairman'];
          
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


  <div class="container">
    <div class="row">
    <?php
   // include'letterhead.php';
    ?>
        <div class="col-md-3" id="panel-panel">
        <?php 
          include'sectionsidebar.php';
        ?>
        </div>
      <div class="col-md-9" id="panel-panel" >
      <div class="panel panel-primary" > 
        <div class="panel-heading">Enrollment Forms</div>
        <div class="panel-body">
            <ul class="nav nav-tabs">
              <li class="active"><a href="index.php">Pending Students</a></li>
              <li><a href="approve.php">Enrolled Students</a></li>
            </ul>
            <br>
        <form method="POST">

          <?php 
        if(isset($_GET['list'])){
        include 'listofuser.php';
        }
        ?>
        <div class="row">
        <div class="col-md-3 pull-right">
        <!--<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">-->
        </div>
        </div>
        <div id="result"></div>

      </form>
  

  <script type="text/javascript">
    $("#search").on("input",function(){
      $search = $("#search").val();
      if($search.length>0){
        $.get("res.php",{"search":$search},function($data){
          $("#result").html($data);
        })
      }
    })
  </script>
        </div>
        <?php
        $userlvl=$_SESSION['userlvl'];
        $date = date('Y');
        $query = "SELECT * FROM enrollmentform where process = 'pending' && grade='$userlvl' && schoolyear='$date'";
        $res = mysqli_query($db,$query);
        //$row = mysqli_fetch_array($res);

        $numrows = mysqli_num_rows($res);
        ?>


         <?php if($row['process'] === 'pending' ){
        $msg = "Pending";
        }else{
        $msg = "Echo Enrolled";
        }
        ?> 


        <div class="table-container table-responsive">
        <form method="GET">
        <table  class="table table-hover table-bordered table-condensed">

          <thead>
            <tr>
              <th width="10%"><center>No</center></th>
              <th width="10%"><center>Surname</center></th>
              <th width="10%"><center>Lastname</center></th>
              <th width="10%"><center>Middlename</center></th>
              <th width="10%"><center>Year</center></th>
              <th width="10%"><center>Process</center></th>
              <th width="10%"><center>Section</center></th>
              <th width="30%"><center>Action</center></th>


            </tr>
          </thead>
          <tbody>
          
        <?php
        if($numrows !=0)
        {
        while($row = mysqli_fetch_array($res)){
          ?>
            <tr>
              <td width="10%"><center><?php echo $row['id']; ?></center></td>
              <td width="10%"><center><?php echo $row['sname']; ?></center></td>
              <td width="10%"><center><?php echo $row['fname']; ?></center></td>
              <td width="10%"><center><?php echo $row['mname']; ?></center></td>
              <td width="10%"><center><?php echo $row['grade']; ?></center></td>
              <td width="10%"><center><?php echo $row['process']; ?></center></td>
              <td width="10%"><center><?php echo $row['section']; ?></center></td>
              <td width="20%">
              <center>
               <!-- <?php echo $msg;?> -->
                <a href="updateprocess.php?id=<?php echo $row['id']; ?>&name=<?php echo $row['fname'];?>" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-info-sign"></span> View</a>
                <!--
                <a onclick ="return confirm('Are You Sure ?');" href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-warning-sign"></span> Delete</a>
                -->
              </center>
              </td>
            </tr>
          
          <?php
            }
          ?>
          <tr>
              <td colspan="8">    
                <center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></center>
              </td>
            </tr>

          <?php
        }
        else
        {
          ?>
            <tr>
              <td colspan="8"><center><b><i>No Pending of Enrollee.<i></b></center></td>
            </tr>
            <tr>
              <td colspan="8">    
                <center><button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#myModal"> <span class="glyphicon glyphicon-plus-sign"></span> Add Student</button></center>
              </td>
            </tr>
          <?php
        }
        ?>    
        </tbody>
        </table>
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


  <!--Modal-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><center>Enrolee Students</center></h4>
      </div>
      <div class="modal-body">
          <div class="form-group">
              <div class="radio">
              <label><input type="radio" name="optradio" onclick="window.location='addstudent.php';"><b>New / Transfer Students</b></label>
          </div>
          <div class="radio">
             <label><input type="radio" name="optradio" class="btn btn-success btn-sm" data-dismiss="modal" data-toggle="modal" data-target="#myModal1"><b>Old Students</b></label>
          </div>
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!--modal oldstudent search-->
      <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><center>Old Students</center></h4>
      </div>
      <div class="modal-body">
        <form method="POST" id="searchform">
          <div class="form-group">
              <label> Student No. </label>
              <input type="text" class="form-control" name="searchstno" id="searchstno" placeholder="Enter Here Student Number..">
            <br>
            <div class="row">
              <div class="col-md-3">
              <input type="submit" name="glyphicon-info-signert" id="insert" value="Search" class="btn btn-success" />  
              </div>  
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

<script type="text/javascript">
$(document).ready(function(){
  $('#searchform').on("submit",function(event){
    event.preventDefault();
      if($('#searchstno').val() == '')
        {  
         alert("Student Number is Required");  
        }
      else  
        {  
         $.ajax({  
          url:"searchstno.php",  
          method:"POST", 
          data:$('#searchform').serialize(),  
          beforeSend:function(){  
           $('#insert').val("Searching");  
          },  
          success:function(data){ 
        window.location='addoldstudent.php'; 
          }  
         });  
        } 
  });

}); 

</script>


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
