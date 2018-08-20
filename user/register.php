<?php 
include 'db.php';
session_start();
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

<!-- End Header -->	

<?php
include'../otherfiles/navbar.php';
?>
		

		<div class="row" style="padding-top: 20px;">
			<div class="col-md-2"></div>
			<div class="col-md-8">
			<!-- Panel -->

			<?php 
			if (isset($_POST['register'])) {
				$fname = $_POST['fname'];
				$lname = $_POST['lname'];
				$mname = $_POST['mname'];
				$em = $_POST['email'];
				$pass = $_POST['pass1'];
				$sql = "SELECT * FROM enrollmentform WHERE username='$em'";
				$resultuser=mysqli_query($db, $sql);
				$numrows = mysqli_num_rows($resultuser);
					if($numrows == 0)
					{
				
				$que = "INSERT into enrollmentform (fname,sname,mname,username,password) values ('$fname','$lname','$mname',
				'$em','$pass')";

				$result = mysqli_query($db,$que)or die(mysqli_error());

				if ($result) {
					 
					?>
					<div class="alert alert-success alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> Register <a href="studentportal.php">Click Here to continue</a>
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
				else
				{
					echo'<div class="alert alert-warning alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Try Again!</strong> Existing Username 
					</div>';

				}
			}

			?>

			<div class="panel panel-primary" id="panel-panel">
			<div class="panel-heading">Register Form</div>
			<div class="panel-body">
			<!-- Form -->

			
			 <form class="form-horizontal" action="register.php" method="POST" id="form">

	            <div class="form-group">
	              <label class="control-label col-sm-3" for="fname">Firstname</label>
	              <div class="col-sm-8">
	                <input type="text" class="form-control" id="fname" name="fname" required>
	              </div>
	            </div>

	            <div class="form-group">
	              <label class="control-label col-sm-3" for="lname">Lastname</label>
	              <div class="col-sm-8"> 
	                <input type="text" class="form-control" id="lname" name="lname" required>
	              </div>
	              </div>

	              <div class="form-group">
	              <label class="control-label col-sm-3" for="mname">Middlename</label>
	              <div class="col-sm-8"> 
	                <input type="text" class="form-control" id="mname" name="mname" required>
	              </div>
	              </div>

	              <div class="form-group">
		              <label class="control-label col-sm-3" for="email">Username</label>
		              <div class="col-sm-8">
		                <input type="email" class="form-control" id="email" name="email" required>
		              </div>
		            </div>

		          <div class="form-group">
		              <label class="control-label col-sm-3" for="pass1">Password</label>
		              <div class="col-sm-8"> 
	         	      <input type="password" class="form-control" id="pass1" name="pass1" required>
	            	  </div>
		          </div>
		          <div class="form-group">
		              <label class="control-label col-sm-3" for="pass2">Confirm-Password</label>
		              <div class="col-sm-8"> 
	         	      <input type="password" class="form-control" id="pass2" name="pass2" required>
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
									message : "Last name should be only 2-25 character"
								},
								regexp: {
		                        regexp: /^[a-z\s]+$/i,
		                        message: 'The full name can consist of alphabetical characters and spaces only'
		                  		  }
							}
						},
						mname : {
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


 <footer id="footer">
    <p>Sampaguita High School Copyright &copy; All Right Reserved 2017 </p>
    <p><span class="glyphicon glyphicon-map-marker"></span> Sampaguita, Camarin, Paraiso St, Caloocan, Bulacan</p>
    <p><span class="glyphicon glyphicon-phone-alt"></span>  0949 331 1601</p>
    
  </footer>
  


</body>
</html>