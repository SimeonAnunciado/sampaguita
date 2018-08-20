<?php
//Include database connection here
    include '../db.php';


   $getid = $_GET['id'];
   $query = "SELECT * FROM chairman WHERE id = '$getid' ";
   $sql = mysqli_query($db,$query);

   if ($sql) {
   	?>
  

<!DOCTYPE html>
<html>
<head>
	<title></title>

	 <!--Sweet Alert -->
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css" > 
     <script src="../js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  
	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../css/bootstrapValidator.css">

</head>
<body>

		<div class="row" style="margin-top: 40px;">
		<div class="col-md-1"></div>
		<div class="col-md-10">

		<div class="panel panel-default">
		  <div class="panel-heading">Information</div>
		  <div class="panel-body">


			<form class="form-horizontal" action="" method="post">
          		<div class="form-group">
			    <label class="control-label col-sm-3" for="sname">Surname</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $row['sname'];?>" placeholder="Surname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="fname">Firstname</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['fname'];?>" placeholder="Firstname">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="user">Username</label>
			    <div class="col-sm-7">
			      <input type="text" class="form-control" id="user" name="user" value="<?php echo $row['username'];?>" placeholder="Username">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-3" for="pwd">Password:</label>
			    <div class="col-sm-7"> 
			      <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Enter password">
			    </div>
			  </div>
			  <div class="form-group">
				  <label for="sel1" class="control-label col-sm-3">Chairman</label>
				  <div class="col-sm-4">
				  <select class="form-control" id="sel1" name="chair">
				  	<option disabled selected=""><?php echo $row['chairman'];?></option>
				    <option value="7">Grade 7</option>
				    <option value="8">Grade 8</option>
				    <option value="9">Grade 9</option>
				    <option value="10">Grade 10</option>
				  </select>
				  </div>
				</div>

			  <div class="form-group"> 
			    <div class="col-sm-offset-3 col-sm-7">
			      <button type="submit" name="chairmanbtn" class="btn btn-success">Update</button>
			    </div>
			  </div>
			</form>

			</div>
		</div>
		</div>
		</div>


	    <!-- javascript files at the bottom page -->
        <script src="../js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/bootstrapValidator.js"></script>
    	


 	<?php
   }else{
   	echo "Error";
   }

	
?>
</body>
</html>