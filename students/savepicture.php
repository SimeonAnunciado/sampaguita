<?php 
	session_start();	
	include'db.php';

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

<style>
	.profile{
		margin:20px 0 ;
	}
	.profile-sidebar{
		padding:20px 0 10px 0;
	}
	.profile-user-pic{
		float:none;
		margin:auto;
		width:50%;
		height:50%;
	}
	.profile-user-title{
		text-align: center;
		margin-top: 20px;
	}
	.profile-user-stno{
		text-transform: uppercase;
		color: black;
		font-weight: bold;
		font-size: 18px;
		margin-bottom: 5px;
	}
	.profile-user-name{
		text-transform: uppercase;
		color:#5babd1;
	}
	.profile-user-button{
		text-align: center;
		margin-top:10px;
	}

</style>

</head>
<body>
<?php include'navbar.php'; ?>
<div class="container" style="position: relative;top: -75px;">
	<br>

	<div class="row">
	<?php 

	$username = $_SESSION['usernameold'];
	$password = $_SESSION['passwordold'];
	$stno = $_SESSION['dbstno'];
	$id = $_SESSION['dbid'];
	$sql = "SELECT * FROM studentdetails WHERE id='$id'";
	$result = mysqli_query($db, $sql);
	$numrows = mysqli_num_rows($result);
	if($result)
	{
		if($numrows == 0)
		{
			echo"<script>alert('Error in Login ');location.href='../user/studentportal.php';</script>";
		}
		else
		{
			
		}
	}
	else
	{
		echo"nope";
	}



	if(!isset($_SESSION['usernameold']))
{
	header('location:../user/studentportal.php');
}

	if(isset($_POST['btnsave']))
	{

		$stname=$_POST['stname'];
		$stgender=$_POST['stgender'];
		$stbday=$_POST['stbday'];
		$staddress=$_POST['staddress'];
		$stmother=$_POST['stmother'];
		$stfather=$_POST['stfather'];
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



		$sqlsave="UPDATE studentdetails SET stname='$stname', gender='$stgender', dateofbirth='$stbday', age='$stage', address='$staddress', mothername='$stmother', fathername='$stfather', username='$stusername', password='$stpassword', image = '$fileNameNew' WHERE stno='$stno'";

		$resultsave=mysqli_query($db, $sqlsave);

		if ($sql) {
							
			              
				?>
				<div class="alert alert-success alert-dismissable fade in">
			    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			    <strong>Success!</strong> Update Infomation!
			    </div>	
				<?php
			

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
			}else{
				echo "
						<script>
						sweetAlert('Oops...', 'You cannot Upload files of this type!', 'error');
						</script>";
				}

		

		///////// add photos codes




		//////////// add photos codes





			
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
			 $stfather = $row['fathername'];
			 $stusername= $row['username'];
			 $stpassword= $row['password'];
		}
	}

	?>

		<div class="panel panel-primary">
			<div class="panel-heading">
				<div class="panel-title"><center><b>Student Information</b></center></div>
			</div>
			<div class="panel-body">
				<div class="row" >
					
					<div class="col-md-7" style="margin-left:15px;">
								<form method="POST" action="oldstudent.php" enctype="multipart/form-data">
									<div class="row">

									<div class="col-md-4" style="background-color:silver; margin-left: 10px;">
						<div class="profile-sidebar">
						<?php 

						$sQl = mysqli_query($db,"SELECT * FROM studentdetails WHERE stno='$stno'");
						$row = mysqli_fetch_array($sQl);
						$img = $row['image'];


						?>
						<style type="text/css">
							#image{
								height: 190px;
								width: 500px;
							}
						</style>


							<div class="profile-user-pic">
								<img src="./uploads/<?php echo $img; ?>" id="image" alt="image" class="img-responsive img-rounded" >
								<br>
								<input type="file" name="file" id="fileToUpload" style="display: none">
							</div>
							<div class="profile-user-title">
								<div class="profile-user-stno">
									<?php echo$stname; ?>
								</div>
								<div class="profile-user-name">
									<?php echo$stno; ?>
								</div>
							</div>
							<div class="profile-user-button">
								<button class="btn btn-success btn-sm" id="editbtn"><span class="glyphicon glyphicon-pencil"></span> EDIT</button>
							</div>
						</div>
					</div>


										<center>
										<label style="font-size:15px;">Basic Information</label>
										</center>
									</div>
									<div class="row" style="padding-top:10px;">
										<div class="col-md-6">
										<label>Student Number :</label>
										<input type="text" name="stusername" 
										class="form-control" id="text" disabled value="<?php echo$stno; ?>">

										</div>
										<div class="col-md-6">
										<label>Student Name :</label>
										<input type="text" name="stname" class="form-control" id="text" disabled value="<?php echo$stname; ?>">
										</div>
									</div>
									<div class="row" style="padding-top:10px;">
										<div class="col-md-4">
										<label>Age:</label>
										<label class="form-control" disabled> <?php echo$stage; ?> </label>
										</div>
										<div class="col-md-4">
										<label>Date of Birth:</label>
										<input type="date" name="stbday" class="form-control" id="text" disabled value="<?php echo$stbday; ?>" required>
										</div>
										<div class="col-md-4">
										<label>Gender:</label>
										<select name="stgender" class="form-control" id="text" disabled>
											<option><?php echo$stgender; ?></option>	
											<option>Male</option>
											<option>Female</option>		
										</select>
										</div>
									</div>
									<div class="row" style="padding-top:10px">
										<div class="col-md-12">
										<label>Address :</label>
										<input type="text" name="staddress" class="form-control" id="text" disabled value="<?php echo$staddress; ?>">
										</div>
									</div>
									<div class="row" style="padding-top: 10px">
										<div class="col-md-6">
										<label>Mother's Name :</label>
										<input type="text" name="stmother" class="form-control" id="text" disabled value="<?php echo$stmother; ?>">
										</div>
										<div class="col-md-6">
										<label>Father's Name :</label>
										<input type="text" name="stfather" class="form-control" id="texts" disabled value="<?php echo$stfather; ?>">
										</div>
									</div>
									<hr>
									<div class="row" style="padding-top: 10px">
										<div class="col-md-12">
											<center><label style="font-size:15px;">User Account</label></center>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<label>Username:</label>
											
											<label class="form-control" disabled><?php echo$stno; ?></label>
										</div>
										<div class="col-md-6">
											<label>Password:</label>
											<input type="password" name="stpassword" class="form-control"  disabled value="<?php echo$stpassword; ?>"> 
										</div>
									</div>
									<div class="row pull-right" style="padding-top: 10px;">
										<div class="col-md-4">
											<button class="btn btn-warning" id="btnsave" name="btnsave" style="display:none; margin-bottom:10px;"><span class="glyphicon glyphicon-save"></span> SAVE</button>
										</div>
									</div>
								</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

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

<?php
include 'footer.php';
?>
</html>