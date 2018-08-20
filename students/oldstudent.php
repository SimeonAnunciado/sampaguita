<?php 
	session_start();	
	include'db.php';

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
<nav class="navbar navbar-default "> 
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
       <li><a href="onlinereg.php"><span class="glyphicon glyphicon-pencil"></span> Online Enrollment</a></li>
          <li><a href="activitylog.php"><span class="glyphicon glyphicon-info-sign"></span>  Activity Log</a></li> 
        <li><a href="oldstudent.php"><span class="glyphicon glyphicon-user"></span> My Account </a></li> 
      </ul>
     
            <ul class="nav navbar-nav navbar-right">
         <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['usernameold'];?></a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>

    </div>
  </div>
</nav>

<?php

	$username = $_SESSION['usernameold'];
	$password = $_SESSION['passwordold'];
	$stno = $_SESSION['dbstno'];
	$id = $_SESSION['dbid'];

	$QuerY = mysqli_query($db,"SELECT * FROM enrollmentform where id = '$id' AND process = 'enrolled' 
		AND kindofuser = 'old' ");

	if (mysqli_num_rows($QuerY)<0) {
		echo "<scirpt>alert('1 Notification Youre Form was Approve! Succesfully Enrolled');</script>";
	}else{
		// echo "true";

	}


	$result = mysqli_query($db, "SELECT * FROM studentdetails WHERE id='$id'");
	if($result){
		if(mysqli_num_rows($result)>0){
          //  $_SESSION['email'] = $email;

		}else{
           // $msg = '<script>sweetAlert("Invalid", "Username Or Password is Incorrect!", "error");</script>';        
				header('location:../user/studentportal.php?msg=Username Or Password is Incorrect!');
		}
	}else{
		echo"nope";
	}




	if(isset($_POST['btnsave']))
	{

		$stname=$_POST['stname'];
		$stgender=$_POST['stgender'];
		$stbday=$_POST['stbday'];
		$staddress=$_POST['staddress'];
		$stmother=$_POST['stmother'];
		$stmothercontact=$_POST['stmothercontact'];
		$stfather=$_POST['stfather'];
		$stfathercontact=$_POST['stfathercontact'];
     	$stusername=$_POST['stusername'];
		$stpassword=$_POST['stpassword'];
		$stage= (date('Y') - date('Y',strtotime($stbday)));

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error']; 
		$fileType = $_FILES['file']['type']; 

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg','jpeg','png','JPG');

		if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize<50000000) {

						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = './uploads/'.$fileNameNew;
						move_uploaded_file($fileTmpName,$fileDestination);



		$photo="UPDATE studentdetails SET image = '$fileNameNew' WHERE stno='$stno'";
		$photo = mysqli_query($db, $photo );




			

							//echo "<img src='upload/$fileNameNew' width='200' height='200'>";
							
						}else{
							echo "
								<script>
								sweetAlert('Oops...', 'Upload Error!', 'error');
								</script>";
						}
					}else{
						echo "
								<script>
								sweetAlert('Oops...', 'Youre File is too big!', 'error');
								</script>";
					}
				}else{
					echo "
								<script>
								sweetAlert('Oops...', 'There's Something Error', 'error');
								</script>";
				}	
			}/*else{
				echo "
						<script>
						sweetAlert('Oops...', 'You cannot Upload files of this type!', 'error');
						</script>";
				}*/



		



		if(!empty($stname) || !empty($stgender) || !empty($stbday)){

		$sqlsave="UPDATE studentdetails SET stname='$stname', gender='$stgender', dateofbirth='$stbday', age='$stage', address='$staddress', mothername='$stmother', fathername='$stfather', username='$stusername', password='$stpassword' WHERE stno='$stno'";

		$resultsave  =mysqli_query($db, $sqlsave  );




		if ($resultsave) {			
			              
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="alert alert-success alert-dismissable fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Success!</strong> Update Infomation!
						    </div>	
			   			</div>
					<div class="col-md-1"></div>
				</div>
				</div>
				<?php
			}elseif($photo){
				?>
				<div class="container">
					<div class="row">
						<div class="col-md-1"></div>
						<div class="col-md-10">
							<div class="alert alert-success alert-dismissable fade in">
						    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						    <strong>Success!</strong> Update Photo!
						    </div>
						</div>
					<div class="col-md-1"></div>
				</div>
				</div>
				<?php

			}
			

			

	
			
	}
	else
	{
		
		while($row = mysqli_fetch_array($result))
		{
			 //$image = $row['image'];
			 $stname = $row['stname'];
			 $stgender = $row['gender'];
			 $stbday = $row['dateofbirth'];
			 $stage = $row['age'];
			 $staddress = $row['address'];
			 $stmother = $row['mothername'];
			 $stmothercontact = $row['mothercontact'];
			 $stfather = $row['fathername'];
			 $stfathercontact = $row['fathercontact'];
			 $stusername= $row['username'];
			 $stpassword= $row['password'];
		}
	}


?>

<?php
 if(isset($msg)){
	echo $msg;
	}
	?>


<div class="container">
    <div class="row">
		<div class="col-md-1"></div>



		<div class="col-md-10">
		

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title"><center><b>Student Information </b></center></div>
			</div>
			<div class="panel-body">

			<?php 
			$sQl = mysqli_query($db,"SELECT * FROM studentdetails WHERE stno='$stno'");
			$row = mysqli_fetch_array($sQl);
			$img = $row['image'];
			?>


			<form class="form-horizontal" action="oldstudent.php" method="POST" id="Form-validation" enctype="multipart/form-data">

             <div class="form-group">
                <label class="control-label col-sm-5" for="sname"></label>
                <div class="col-sm-3 well"> <!-- <?php echo $img; ?> -->
                <?php 

                if ($img === 'default.png') {
                	?>
                <img src="./uploads/default.png " id="image" alt="image" class="img-responsive img-rounded" >
                	<?php 
                }else{
                	?>
                <img src="./uploads/<?php echo $img; ?>" id="image" alt="image" class="img-responsive img-rounded" >
                	<?php
                }
                ?>
     
                <br>
				<input type="file" name="file" id="fileToUpload" style="display: none">

                <div class="profile-user-title">
					<div class="profile-user-stno">	<?php echo$stname; ?></div>
					<div class="profile-user-name">	<?php echo$stno; ?> </div>
				</div>
				<div class="profile-user-button">
				<button class="btn btn-success btn-sm" id="editbtn"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
				</div>



                 
                </div>
              </div>

               <div class="form-group">
                <label class="control-label col-sm-3" for="sname">Student Number</label>
                <div class="col-sm-8">
                  <input type="text" name="stusername" class="form-control" id="text" disabled value="<?php echo$stno; ?>">
                </div>
              </div>

              <div class="form-group">
                <label class="control-label col-sm-3" for="fname">Student Name</label>
                <div class="col-sm-8"> 
			    	<input type="text" name="stname" class="form-control" id="text" disabled value="<?php echo$stname; ?>">
                </div>
                </div>

                <div class="form-group">
                <label class="control-label col-sm-3" for="age">Age</label>
                <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="age" name="age" disabled value="<?php echo$stage; ?>" required>
                </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-sm-3" for="place">Date Of birth</label>
                  <div class="col-sm-8">
					<input type="date" name="stbday" class="form-control" id="text" disabled value="<?php echo$stbday; ?>" required>
                  </div>
                </div>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="gender">Gender</label>
                  <div class="col-sm-8"> 
                  <select name="stgender" class="form-control" id="text" disabled>
					<option><?php echo$stgender; ?></option>	
					<option>Male</option>
					<option>Female</option>		
				  </select>
                  </div>
              </div>
               <div class="form-group">
                  <label class="control-label col-sm-3" for="bday">Address</label>
                  <div class="col-sm-8"> 
					<input type="text" name="staddress" class="form-control" id="text" disabled value="<?php echo$staddress; ?>">
                  </div>
              </div>
           

              <hr>
              <p class="text-center"> Guardian Information</p>
              <hr>

              <div class="form-group">
                  <label class="control-label col-sm-3" for="father">Father Name</label>
                  <div class="col-sm-8"> 
					<input type="text" name="stfather" class="form-control" id="texts" disabled value="<?php echo$stfather; ?>">
                  </div>
              </div>

       

               <div class="form-group">
                  <label class="control-label col-sm-3" for="fathercontact">Father Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="fathercontact" name="stfathercontact"  value="<?php echo $stfathercontact;?>"
                   placeholder="Plesae Begin Ex.639....." required>
                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mother">Mother Name</label>
                  <div class="col-sm-8"> 
					<input type="text" name="stmother" class="form-control" id="text" disabled value="<?php echo$stmother; ?>">
                  </div>
              </div>

     

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mothercontact">Mother Contact</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mothercontact" name="stmothercontact" value="<?php echo $stmothercontact;?>" 
                  placeholder="Plesae Begin Ex.639....." required>
                  </div>
              </div>

              <hr>
              <p class="text-center">User Account</p>
              <hr>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mothercontact">Student Number</label>
                  <div class="col-sm-8"> 
                  <input type="text" class="form-control" id="mothercontact" name="mothercontact" disabled value="<?php echo$stno; ?>" 
                  required>	

                  </div>
              </div>

               <div class="form-group">
                  <label class="control-label col-sm-3" for="mothercontact">Password</label>
                  <div class="col-sm-8"> 
                  <input type="password" class="form-control" id="mothercontact" name="stpassword" 
                  disabled value="<?php echo$stpassword; ?>"  required>
                  </div>
              </div>



            




            
         
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
               <button class="btn btn-warning" id="btnsave" name="btnsave" style="display:none; margin-bottom:10px;"><span class="glyphicon glyphicon-save"></span> SAVE</button>
              </div>
            </div>
            
          </form>


			</div>
		</div>
		</div>

		<!-- end of Panel -->

		<div class="col-md-1"></div>
	</div>
</div>

	
   <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
  </footer>

</body>
<script type="text/javascript">
	$("#editbtn").click(function() {
  $("input:disabled").removeAttr("disabled");
  $("select:disabled").removeAttr("disabled");
  $("input:disabled").removeAttr("disabled");
  $("#editbtn").attr("disabled",true);
 $("#btnsave").toggle();
 $("#fileToUpload").toggle();
});
</script>

</html>