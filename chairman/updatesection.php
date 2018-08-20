<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['userchairman'])) {
	header('location:../user/index.php');
		
	}

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High</title>

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
</head>
<body style="background: url('images/bgrough.jpg');  background-size: 30% 30%; background-repeat: repeat;">
   	

<?php include'navbar.php';?>
	
	<!--end of navbar-->

		<div class="container">
		<?php
		//include'letterhead.php';
		?>
		<br>	
		<div class="row" style="margin: 10px 0px 130px 0px;">
			<div class="col-md-3">
					<?php include'sectionsidebar.php';?>
			</div>
			<div class="col-md-9">
			<div class="panel panel-primary">	
				<div class="panel-heading">Advisory Section</div>
				<div class="panel-body">
				<form method="">
					<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				$section = $_GET['section'];
				$schoolyear = $_GET['schoolyear'];
				$con1 = mysqli_connect('localhost','root','','enrollment');
				$sql1 = "SELECT * FROM sectionlist WHERE sectionname ='$section' && schoolyear ='$schoolyear'";
				$result = mysqli_query($con1, $sql1);
						while($row = mysqli_fetch_array($result))
						{
							$adviser = $row['adviser'];
							$grade = $row['grade'];
						}
						$_SESSION['adviser'] = $adviser;
						$_SESSION['section'] = $section;
						$_SESSION['schoolyear'] = $schoolyear;
				?>
				<div class="row">
				<div class="col-md-3">
				<label class="control-label">&nbsp;Adviser:</label>
				<label class="form-control" readonly><center><?php echo $adviser;?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Section:</label>
				<label class="form-control" readonly><center><?php echo $section; ?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Grade:</label>
				<label class="form-control" readonly><center><?php echo $grade; ?></center></label>
				</div>
				<div class="col-md-3">
				<label class="control-label">&nbsp;Schoolyear:</label>
				<label class="form-control" readonly><center><?php echo$_GET['schoolyear']; ?></center></label>
				</div>
				</div>
				<hr>
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
				<div class="table-container table-responsive">
				<form method="POST">
				<table  class="table table-hover table-bordered table-condensed">
				<?php
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql2 = "SELECT * FROM enrollmentform WHERE section='$_GET[section]' && schoolyear='$_GET[schoolyear]' ORDER BY fname ASC";
					$result2 = mysqli_query($con, $sql2);
					$numrows2 = mysqli_num_rows($result2);
				?>
					<thead>
						<tr>
							<th width="20%"><center>Students Number</center></th>
							<th width="20%"><center>Name</center></th>
							<th width="20%"><center>Gender</center></th>
							<th width="20%"><center>Age</center></th>
							<th width="20%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>			
						<?php
								if($numrows2 != 0)	
										{

												while($row2 = mysqli_fetch_array($result2))
												{
													$dbstno = $row2['stno'];
													$dbname= $row2['fname'].' '.$row2['sname'];
													$dbgender = $row2['gender'];
													$dbage = $row2['age'];
										?>
												<tr>
												<td><center><?php echo $dbstno; ?></center></td>
												<td><center><?php echo $dbname; ?></center></td>
												<td><center><?php echo $dbgender; ?></center></td>
												<td><center><?php echo $dbage; ?></center></td>
												<td width="15%">
													<center>
													<a href="transferstudent.php?stno=<?php echo$dbstno;?>&gender=<?php echo$dbgender;?>" class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-move"></span> Transfer </a>
													</center>
												</td>
												</tr>

										<?php 
										}

										?>	
																					
										<?php
								}
								else
								{
									?>
										<tr>
												<td colspan="6"><center><b>" No Student's Found! "</b></center> </td>
										</tr>
									<?php
								}
										?>


				</tbody>
				</table>
				</form>
				<div class="row">
				<div class="col-md-1">
				</div>
				<div class="col-md-3">
				<a href="index.php" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-backward"></span> BACK </a>
				</div>
				</div>
			</div>
			</div>
		
			</div>
			</div>	
			</div>

			<?php include 'footer.php';?>
				
</body>
</html>
<script>  

