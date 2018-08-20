<?php 
include 'db.php';
session_start();

$emailsession = $_SESSION['email'];
if(isset($emailsession)){
	$que = "SELECT * FROM registereduser WHERE email = '$emailsession' limit 0,1";
	$res = mysqli_query($db,$que)or die(mysqli_error());
	$row = mysqli_fetch_array($res); 


?>







<!DOCTYPE html>
<html>
<head>
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
<body>

<!-- End Header -->	

	<br><br><br>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-2 text-right">
				<a href="activitylog.php" class="btn btn-primary">Back</a>
			</div>

		</div>

		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<!-- Panel -->

			<?php 
			if (isset($_POST['update'])) {
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$em = $_POST['email'];
				$pass = $_POST['pass1'];
				
				$que = "UPDATE registereduser SET pass = '$pass' WHERE email = '$emailsession' ";

				$result = mysqli_query($db,$que)or die(mysqli_error());

				if ($result) {					
					?>
					<div class="alert alert-success alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> Change Password
					</div>
					<?php
				}else{
					?>
					<div class="alert alert-danger">
					    <strong>Danger!</strong> You should <a href="#" class="alert-link">Error</a>.
					  </div>

					<?php
				}
			}

			?>

			<div class="panel panel-primary">
			<div class="panel-heading">Update Information *Password</div>
			<div class="panel-body">
			<!-- Form -->
			
			 <form class="form-horizontal" action="" method="POST" id="form">
					 <?php 
					$query = mysqli_query($db,"SELECT * FROM registereduser WHERE email = '$emailsession' ");
					if($row = mysqli_fetch_array($query)){
						?>
						<div class="form-group">
	              <label class="control-label col-sm-3" for="fname">Firstname</label>
	              <div class="col-sm-8">
	                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['firstname'];?>">
	              </div>
	            </div>

	            <div class="form-group">
	              <label class="control-label col-sm-3" for="lname">Lastname</label>
	              <div class="col-sm-8"> 
	                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lastname'];?>">
	              </div>
	              </div>

	              <div class="form-group">
		              <label class="control-label col-sm-3" for="email">Email</label>
		              <div class="col-sm-8">
		                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['email'];?>">
		              </div>
		            </div>

		         

						<?php
					}
					?>
					 <div class="form-group">
		              <label class="control-label col-sm-3" for="pass1">Password</label>
		              <div class="col-sm-8"> 
	         	      <input type="text" class="form-control" id="pass1" name="pass1" required>
	            	  </div>
		          </div>
		          <div class="form-group">
		              <label class="control-label col-sm-3" for="pass2">Confirm-Password</label>
		              <div class="col-sm-8"> 
	         	      <input type="text" class="form-control" id="pass2" name="pass2" required>
	            	  </div>
		          </div>
            
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-success" name="update">Update</button>
                
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

 
<?php
}
else{
	echo "error";
}
?> 
</body>
</html>