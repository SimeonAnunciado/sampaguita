<?php
include 'header.php';

 //$sessionfname = $_SESSION['fname'];
 //$sessionlname = $_SESSION['lname'];
   




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
  

  <?php 
  include'navbar.php';
  	if(isset($_POST['save']))
  	{
      $grade=$_SESSION['userlvl'];
  		 $surname = $_POST['sname'];
        $firstname = $_POST['fname'];
        $mname = $_POST['mname'];
        $email = $_POST['email'];
        $birthplace = $_POST['place'];
        $gen = $_POST['gender'];
        $bday = $_POST['bday'];
        $age= (date('Y') - date('Y',strtotime($bday)));
        $father = $_POST['father'];
        $occupation = $_POST['fatheroccupation'];
        $fathercontact = $_POST['fathercontact'];
        $mother = $_POST['mother'];
        $motheroccupation = $_POST['motheroccupation'];
        $mothercontact = $_POST['mothercontact'];
        $address = $_POST['address'];
        $grad = $_POST['elementarygrad'];
        $average= $_POST['average'];
        $schoolyear = date('Y');
        $requirements = $_POST['requirements'];
        $process = 'pending';
        $b = implode(",",$requirements);

                  		$sql= "INSERT INTO enrollmentform (sname, fname, mname, email, placeofbirth, gender, dateofbirth, age, grade, father, fatheroccupation, fathercontact, mother, motheroccupation, mothercontact, address, elementarygraduated, average, requirements, date, process, stno, schoolyear,kindofuser) VALUES ('$surname','$firstname','$mname','$email','$birthplace','$gen','$bday','$age','$grade','$father','$occupation','$fathercontact','$mother','$motheroccupation','$mothercontact','$address','$grad','$average','$b', NOW(),'$process', '$stno', '$schoolyear','new')";
                  		$res = mysqli_query($db, $sql);
                  		if($res)
                  		{
                  			header('location:index.php');
                  		}
                  		else
                  		{
                  			echo"sad";
                  		}
                  $_SESSION['average'] = $average	;	
          		$_SESSION['requirements'] = $b;
                  $_SESSION['schoolyear'] = $schoolyear;
                  $_SESSION['stno'] = $stno;
                  $_SESSION['grade'] = $grade;
                  $_SESSION['surname'] = $surname;
                  $_SESSION['firstname'] = $firstname;
                  $_SESSION['mname'] = $mname;
                  $_SESSION['age'] = $age;
                  $_SESSION['address'] = $address;
                   $_SESSION['name'] = $_POST['fname'].' '.$_POST['sname'];
          
        
  	}
  ?>

    <div class="container">

		</div>

		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"></div>
			<div class="col-md-9">
			<!-- Panel -->
      <div class="panel panel-primary">
        
         <div class="panel-heading" style="background-color: #a3a1a1;"><h4 style="color:white;"> Enrollment Form</h4></div>
        <div class="panel-body">

         <form class="form-horizontal" action=""  method="POST"  class="form-horizontal">
          

            <div class="text-center">
            <label class="text-center" for="fname" style="padding-top: 25px;">STUDENT'S NAME</label>
            </div>
              <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                  <label class="control-label">&nbsp;Surname :</label>
                  <input type="text" class="form-control input-lg" id="fname" name="sname"  placeholder="Surname" required>
                </div>
                <div class="col-md-4">
                  <label class="control-label" >&nbsp;Firstname :</label>
                  <input type="text" name="fname" class="form-control input-lg" placeholder="First name" required >
                </div>
                 <div class="col-md-4">
                 <label class="control-label" >&nbsp;Middlename :</label>
                  <input type="text" name="mname" class="form-control input-lg" placeholder="Middle name" required >
                </div>
                </div>

                <div class="row" style="padding-top: 25px;">
                <div class="col-md-4" >
                <label class="control-label">&nbsp;Place of Birth :</label>
                  <input type="text" class="form-control input-lg"  name="place"  placeholder="Place of Birth" required>
                </div>
                 <div class="col-md-4">
                 <label class="control-label">&nbsp;Email:</label>
                  <input type="email" class="form-control input-lg"  name="email"  placeholder="Email" required>
                </div>
 

                 <div class="col-md-4">
                 <label class="control-label">&nbsp;Gender :</label>
                 <select class="form-control input-lg" name="gender" placeholder="Choose Gender" required>
                   <option>Male</option>
                   <option>Female</option>
                 </select>
                </div>
                </div>
                <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
                <label class="control-label">&nbsp;Birthday :</label>
                  <input type="date" name="bday" class="form-control input-lg"   placeholder="Birth Date" required>
                </div>  
                </div>
                <hr>
            <div class="text-center">
            <label class="text-center" for="fname" style="padding-top: 20px;">PARENTS / GUARDIAN INFO</label>
            </div>

            <div class="row" style="padding-top: 35px;">
              <div class="col-md-4">
              <label class="control-label">&nbsp;Father Name :</label>
              <input type="text" name="father" class="form-control input-lg" placeholder="Father's Name" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Occupation :</label>
              <input type="text" name="fatheroccupation" class="form-control input-lg" placeholder="Occupation" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Father's Contact #:</label>
              <input type="text" name="fathercontact" class="form-control input-lg" placeholder="Contact No." required>
              </div>

            </div>

            <div class="row" style="padding-top: 25px;">
              
               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother Name :</label>
              <input type="text"  name="mother" class="form-control input-lg" placeholder="Mother's Name" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother Occupation :</label>
              <input type="text" name="motheroccupation" class="form-control input-lg" placeholder="Occupation" required>
              </div>

               <div class="col-md-4">
               <label class="control-label">&nbsp;Mother Contact # :</label>
              <input type="text" name="mothercontact" class="form-control input-lg" placeholder="Contact No." required>
              </div>
              </div>

              <hr>
              <div class="text-center">
             <label class="control-label-12 text-center" style="padding-top: 35px;">BACKGROUND INFO</label>
             </div>

              <div class="row" style="padding-top: 35px;">
              <div class="col-md-12">
              <label class="control-label">&nbsp;Address :</label>
              <input type="text" name="address" class="form-control input-lg" placeholder="Address" required>
              </div>
              </div>

              <div class="row" style="padding-top: 25px;">
               <div class="col-md-12">
               <label class="control-label">&nbsp;Elementary School Graduated :</label>
              <input type="text" name="elementarygrad" class="form-control input-lg" placeholder="Elementary School Graduated" required>
              </div>
              </div>

              <div class="row" style="padding-top: 25px;">
                 <div class="col-md-4 ">
              <label class="control-label">&nbsp;General Average:</label>
              <input type="text" name="average" class="form-control input-lg" placeholder="Average"  required>
              </div>
              </div>

              <div class="row" style="padding-top: 45px;">
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
              <br>

        
          <div class="row" style="padding-top: 25px;">
                <div class="col-md-4">
               <a href="index.php" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-backward" aria-hidden="true"></span> Back</a>
                </div>

                <div class="col-md-4" style="left: 430px;">
                <button class="btn btn-success btn-lg" type="submit" name="save"><span class="glyphicon glyphicon-save" aria-hidden="true"></span> Save </button>
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
			</div>
			<!-- End ofPanel -->
      


        </div>
      </div> 

			</div>
		</div>	
    </div>
    <!-- script -->
    



    <!-- script -->


<?php



include 'footer.php';
?>