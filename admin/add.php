<?php
include 'header.php';
?>

<br><br><br>
		<div class="row">
			<div class="col-md-8"></div>
			<div class="col-md-2 text-right">
				<a href="index.php" class="btn btn-primary">Back</a>
			</div>

		</div>

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
				$ad = $_POST['ad'];
				
				$que = "INSERT into user (fname,lname,mname,email,address) values ('$fname','$lname','$mname','$em','$ad')";

				$result = mysqli_query($db,$que)or die(mysqli_error());

				if ($result) {
					?>
					<div class="alert alert-success alert-dismissable">
					  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  <strong>Success!</strong> Success Register
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

			<div class="panel panel-success">
			<div class="panel-heading">Register</div>
			<div class="panel-body">
			<!-- Form -->

			
			 <form class="form-horizontal" action="add.php" method="POST">

            <div class="form-group">
              <label class="control-label col-sm-3" for="fname">Firstname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="fnamel" name="fname" required>
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
              <label class="control-label col-sm-3" for="email">Email</label>
              <div class="col-sm-8">
                <input type="email" class="form-control" id="email" name="email" required>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-3" for="ad">Address</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="ad" name="ad" required>
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
<?php
include 'footer.php';
?>