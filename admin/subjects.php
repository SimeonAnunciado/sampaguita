<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
	header('location:../user/index.php');
		
	}

	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];

		/// pagination


	$start=0;
	$limit=8;

	$t=mysqli_query($db,"select * from subjectlist ");
	$total=mysqli_num_rows($t);

	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
	}else{
		$id=1;
	}
	$page=ceil($total/$limit);

	$query=mysqli_query($db,"select * from subjectlist LIMIT $start,$limit ");


?>
<!DOCTYPE html>
<html>
<head>
	<title>Sampaguita High</title>

      
      <!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="../css/sweetalert.css" > 
      <script src="../js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/style.css">
      <!-- Optional theme -->
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
	  <div class="container-fluid">
	      <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
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
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
        if (isset($_SESSION['userlvl'])) {
          echo $_SESSION['userlvl'];
        }elseif (isset($_SESSION['userchairman'])){
          echo $_SESSION['userchairman'];
          
        }else{
          echo "Undefined Session";
        }
        ?>


        </a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>


      </ul>


	    </div>
	  </div>
	 </div>
	</nav>

	<!--end of navbar-->

		<div class="container">
		
		<br>
		<div class="row" style="padding-top: 15px;">
			<div class="col-md-3">
				<div class="list-group">
					<a href="" class="list-group-item active"><span class="glyphicon glyphicon-user"></span> Admin</a>
					<a href="index.php" class="list-group-item"><span class="glyphicon glyphicon-send"></span> Online Enrollment<span class="badge"></span> </a>
					<a href="subjects.php" class="list-group-item"><span class="glyphicon glyphicon-tasks"></span> Subjects</a>
					<a href="sections.php" class="list-group-item"><span class="glyphicon glyphicon-equalizer"></span> Manage Sections</a> 
					<a href="calendar.php" class="list-group-item"><span class="glyphicon glyphicon-calendar"></span> Announcements </a>
					<a href="listofuser.php" class="list-group-item"><span class="glyphicon glyphicon-th-list"></span> Student Account's List</a>
					<a href="enrolleedashboard.php" class="list-group-item"><span class="glyphicon glyphicon-signal"></span> Graphs</a> <!-- registeruser.php-->
				</div>
			</div>
			<div class="col-md-9">
			<div class="panel panel-primary">	
				<div class="panel-heading">Subjects</div>
				<div class="panel-body">
				<form method="POST">
				<div class="row">
				<div class="col-md-3">
				<select class="form-control" name="gradefilter">
				<option value="Grade-7">Grade-7</option>
				<option value="Grade-8">Grade-8</option>
				<option value="Grade-9">Grade-9</option>
				<option value="Grade-10">Grade-10</option>
				</select>
				</div>
				<div class="col-md-3">
				<button class="btn btn-success" name="btnfilter"><span class="glyphicon glyphicon-search"></span> Filter</button>
				</div>
				</div>
					<?php 
				if(isset($_GET['list'])){
				include 'listofuser.php';
				}
				?>
				<div class="row">
				<div class="col-md-3 pull-right">
				<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">
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
				if(isset($_POST['btnfilter']))
				{
				$gradefilter = $_POST['gradefilter']; 
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql = "SELECT * FROM subjectlist WHERE grade='$gradefilter'  LIMIT $start,$limit";
					$result = mysqli_query($con, $sql);
					$numrows = mysqli_num_rows($result);
				}
				else 
				{
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql = "SELECT * FROM subjectlist ORDER BY grade DESC  LIMIT $start,$limit";
					$result = mysqli_query($con, $sql);
					$numrows = mysqli_num_rows($result);
				}
				?>
					<thead>
						<tr>
							<th width="10%"><center>Grade</center></th>
							<th width="15%"><center>Subject</center></th>
							<th width="20%"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
		


					
						<?php
								if($numrows != 0)
								{
									while($row = mysqli_fetch_array($result))
									{
										$dbtitle = $row['grade'];
										$dbsubject = $row['subjecttitle'];

										?>
												<tr>
												<td><center><?php echo"$dbtitle";?></center></td>
												<td><center><?php echo"$dbsubject";?></center></td>
												<td width="15%">
													<center>
													<a onclick ="return confirm('Are You Sure ?');" href="deletesubject.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-warning-sign"></span> Delete</a>
													</center>
												</td>
												</tr>
										<?php 
									}
										?>		
														
												<tr>
												<td colspan="6">		
												<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_data_Modal"><span class="glyphicon glyphicon-plus-sign"></span> Add Subject</button></center>
												</td>
											
										<?php
								}
								else
								{
									?>
										<tr>
												<td colspan="6"><center><b>" No Results Found! "</b></center> </td>
										</tr>
										<tr>
												<td colspan="6">		
													<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_data_Modal"><span class="glyphicon glyphicon-plus-sign"></span> Add Section</button></center>
												</td>
										</tr>
									<?php
								}
										?>
				</tbody>
				</table>
				</form>

					<!--pagination -->
					<center>
					 <ul class="pagination">
						 <?php if($id > 1) {
						 	?> <li class="active"><a  href="?id=<?php echo ($id-1) ?>">Previous</a></li><?php 
						 	}?>
						 <?php
						 for($i=1;$i <= $page;$i++){
						 ?>
							<li><a href="?id=<?php echo $i ?>"><?php echo $i;?></a></li>
						  <?php
						 }
						  ?>
						<?php if($id!=$page)
						//3!=4
						{
							?> 
						  <li><a href="?id=<?php echo ($id+1); ?>">Next</a></li>
						<?php 
					}
						?>
					 </ul>
				</center>
				<!--pagination -->


				 <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><b>ADD SUBJECT HERE<b></center></h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
     <label>Enter Grade: </label>
     <input type="text" name="grade" id="grade" class="form-control" >
     <br /> 
     <label>Enter Subject:</label>
     <input type="text" name="subject" id="subject" class="form-control">   
     <br/>
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />

    </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
			</div>
			</div>
		
			</div>
			</div>	
			</div>
			 <script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#grade').val() == '')
 	 {  
   alert("Grade is required")
	}
	else  if($('#subject').val() == '')
 	 {  
   alert("Subject is required")
	}
  else  
  {  
   $.ajax({  
    url:"insertsubject.php",  
    method:"POST", 
    data:$('#insert_form').serialize(),  
    beforeSend:function(){  
     $('#insert').val("Inserting");  
    },  
    success:function(data){ 
    alert("Succesfully Insert!!")
 	location.reload(); 
     $('#insert_form')[0].reset();
     $('#add_data_Modal').modal('toggle');
    }  
   });  
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
