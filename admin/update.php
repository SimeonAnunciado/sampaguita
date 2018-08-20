<?php
include 'header.php';


 //$sessionfname = $_SESSION['fname'];
 //$sessionlname = $_SESSION['lname'];
   
 if (isset($_GET['name'])) {
   $name = $_GET['name'];
 }


$id = $_SESSION['id'];

if(isset($id)){
	$que = "SELECT * FROM enrollmentform WHERE id = '$id' limit 0,1";
	$res = mysqli_query($db,$que)or die(mysqli_error());
	$row = mysqli_fetch_array($res);


?>
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
  <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <img src="images/logo.png" style="width:50px;">
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
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>

      </ul>


      </div>
    </div>
   </div>
  </nav>

<br><br>
		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<!-- Panel -->
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
            $sql2 = "SELECT * FROM enrollmentform WHERE stno = '$stno'";
            $result2 = mysqli_query($db, $sql2);
            $numrows2 = mysqli_num_rows($result2);
              if($numrows2 == 0)
              {
        $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `stno` = '$stno', `schoolyear` = '$schoolyear', `requirements`='$b', `username`='$stno', `password`='$pass', `kindofuser`='old' WHERE `id` = '$id'";

        $res = mysqli_query($db,$sql);

        if ($res) {

              header('location:sectioning.php');
        }else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
        }
        $_SESSION['requirements'] = $b;
        $_SESSION['schoolyear'] = $schoolyear;
        $_SESSION['stno'] = $stno;
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
        else
        {
         echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Existing Student Number!</strong> Error
            </div>';
       }
      }
        else
        {
          $stno=$_SESSION['dbstno'];
                  $sql = "UPDATE `enrollmentform` SET  `sname`='$surname', `fname`='$firstname' ,`mname`='$mname' ,`email`='$email',
        `placeofbirth`='$birthplace',
        `gender`='$gen', `dateofbirth`='$bday' ,`age`='$age' ,`grade`='$grade' ,`father`='$father', `fatheroccupation`='$occupation' ,`fathercontact`='$fathercontact' ,
        `mother`= '$mother',`motheroccupation`='$motheroccupation',`mothercontact`='$mothercontact', `address`='$address', `elementarygraduated`='$grad' ,`average`= '$average', `schoolyear` = '$schoolyear', `requirements`='$b'  WHERE `id` = '$id' ";

        $res = mysqli_query($db,$sql);

        if ($res) {
              header('location:sectioning.php');
        }else{
           echo 
            '<div class="alert alert-danger alert-dismissable">
              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <strong>Error!</strong> Error
            </div>';
        }
         $_SESSION['requirements'] = $b;
        $_SESSION['schoolyear'] = $schoolyear;
        $_SESSION['stno'] = $stno;
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
                     <?php
          }
          ?>     

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
               <label class="control-label">&nbsp;Date Enrolled :</label>
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
                <button class="btn btn-success btn-lg" type="submit" name="update"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Approve </button>
                </div>
                </div>


          </form>
      


            

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
		</div>	

    <!-- script -->
    



    <!-- script -->


<?php
}else{
	echo "<Script>Location.href='index.php'</script>";
}



include 'footer.php';
?>
<script src="js/bootstrap.min.js"></script>