<?php 
require 'db.php';
session_start();


if (!isset($_SESSION['useradmin'])) {
	header('location:../user/index.php');
		
	}

	$start=0;
	$limit=12;

	$t=mysqli_query($db,"select * from sectionlist ORDER BY grade ASC");
	$total=mysqli_num_rows($t);

	if(isset($_GET['id'])){
	$id=$_GET['id'];
	$start=($id-1)*$limit;
	}else{
		$id=1;
	}
	$page=ceil($total/$limit);

	$query=mysqli_query($db,"select * from sectionlist ORDER BY grade ASC limit $start,$limit ");



	///'/////////////////////////'



	$res = mysqli_query($db,"SELECT count(id) AS total FROM enrollmentform");
	$total = mysqli_fetch_array($res);    
		$total  =$total['total'];


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

		<div class="container-fluid">
		
		
		<div class="color">
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
				<div class="panel-heading">Manage Sections</div>
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
				<table  class="table table-hover table-bordered table-condensed table-responsive">
				<?php
				if(isset($_POST['btnfilter']))
				{
				$gradefilter = $_POST['gradefilter']; 
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql = "SELECT * FROM sectionlist WHERE grade='$gradefilter' ORDER BY schoolyear DESC LIMIT $start,$limit";
					$result = mysqli_query($con, $sql);
					$numrows = mysqli_num_rows($result);
				}
				else 
				{
					$con = mysqli_connect('localhost','root','','enrollment');
					$sql = "SELECT * FROM sectionlist ORDER BY grade ASC, schoolyear LIMIT $start,$limit";
					$result = mysqli_query($con, $sql);
					$numrows = mysqli_num_rows($result);
				}
				?>
					<thead>
						<tr>
							<th width="95"><center>Grade</center></th>
							<th width="5"><center>Section</center></th>
							<th width="10"><center>Adviser</center></th>
							 <th width="10"><center>S.Y.</center></th> 
							<th width="10"><center>Male</center></th>
							<th width="10"><center>Female</center></th>
							<th width="10"><center>Total Students</center></th>
							<th width="400"><center>Action</center></th>
						</tr>
					</thead>
					<tbody>
		


					
						<?php
								if($numrows != 0)
								{
									while($row = mysqli_fetch_array($result))
									{
										$dbsection = $row['sectionname'];
										$dbadviser = $row['adviser'];
										$dbschoolyear = $row['schoolyear'];
										$dbgrade = $row['grade'];
											$sql2 = "SELECT count(id) FROM enrollmentform WHERE process ='enrolled' && grade='$dbgrade' && schoolyear ='$dbschoolyear' && section ='$dbsection' && gender='male'";
											$result2 = mysqli_query($con, $sql2);
													while($row2 = mysqli_fetch_array($result2))
													{
														$countmale = $row2['0'];
													}
											$sql3 = "SELECT count(id) FROM enrollmentform WHERE process ='enrolled' && grade='$dbgrade' && schoolyear ='$dbschoolyear' && section ='$dbsection' && gender='female'";
											$result3 = mysqli_query($con, $sql3);
													while($row3 = mysqli_fetch_array($result3))
													{
														$countfemale = $row3['0'];
													}													
											$sql1 ="SELECT count(id) FROM enrollmentform WHERE process ='enrolled' && grade='$dbgrade' && schoolyear ='$dbschoolyear' && section ='$dbsection'";
											$result1 = mysqli_query($con, $sql1);
												while($row1 = mysqli_fetch_array($result1))
												{
													$count=$row1['0'];
												}

										?>
												<tr>
												<td><center><?php echo"$dbgrade";?></center></td>
												<td><center><?php echo"$dbsection";?></center></td>
												<td><center><?php echo"$dbadviser";?></center></td>
												<td><center><?php echo"$dbschoolyear";?></center></td> 
												<td><center><?php echo"$countmale";?></center></td>
												<td><center><?php echo"$countfemale";?></center></td>
												<td><center><?php echo"$count";?></center></td>
												<td width="15%">
													<center>
													<a href="updatesection.php?section=<?php echo $dbsection;?>&schoolyear=<?php echo$dbschoolyear; ?>" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-eye-close"></span> View</a>
													<!-- <a onclick ="return confirm('Are You Sure ?');" href="deletesection.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm"> <span class="glyphicon glyphicon-warning-sign"></span> Delete</a> -->
													</center>
												</td>
												</tr>
										<?php 
									}
										?>		
														
												<tr>
												<td colspan="8">		
												<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_data_Modal"><span class="glyphicon glyphicon-plus-sign"></span> Add Section</button>
												 <!--<button type="button" class="btn btn-success btn-sm" ><span class="glyphicon glyphicon-print"></span> Print</button> -->
												 <!--<a href="printpdf.php?grade=<?php echo"$dbgrade"; ?> &schoolyear=<?php echo$dbschoolyear; ?>&section=<?php echo $dbsection?>"
												 target = "_blank" class ="btn btn-success btn-sm glyphicon glyphicon-print"> Print</a>-->

												 </center>
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
													<center><button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add_data_Modal"><span class="glyphicon glyphicon-plus-sign"></span> Add Section</button> </center>
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
 <div class="modal-dialog modal-lg">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><center><b>ADD SECTION HERE<b></center></h4>
   </div>
   <div class="modal-body">
    <form method="post" id="insert_form">
    <div class="row">
    <div class="col-md-4" style="border-style: solid; margin-left: 10px; border-radius: 5px;">
    		<label style="color:red;"><b><i>Note for Automatic Sectioning:</i></b></label><br>
    		<label style="color:red;"><b><i>For Section#1 Criteria: Enter "<label style="color:blue;">97</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#2 Criteria: Enter "<label style="color:blue;">87</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#3 Criteria: Enter "<label style="color:blue;">87a</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#4 Criteria: Enter "<label style="color:blue;">84</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#5 Criteria: Enter "<label style="color:blue;">84a</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#6 Criteria: Enter "<label style="color:blue;">80</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#7 Criteria: Enter "<label style="color:blue;">80a</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#8 Criteria: Enter "<label style="color:blue;">80b</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#9 Criteria: Enter "<label style="color:blue;">80c</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#10 Criteria: Enter "<label style="color:blue;">75</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#11 Criteria: Enter "<label style="color:blue;">75a</label>" </i></b></label><br>
    		<label style="color:red;"><b><i>For Section#12 Criteria: Enter "<label style="color:blue;">75b</label>" </i></b></label><br>
    		<label style="color:red; font-size: 12px;"><b><i><center>(Only 12 Sections Have Automatic Sectioning)</center></i></b></label>
    </div>
    <div class="col-md-8" style="margin-left: -10px;">
     <label>Enter Grade: </label>
     <input type="text" name="year2" id="year" class="form-control" >
     <br /> 
     <label>Enter Teacher Name</label>
     <input type="text" name="name2" id="name2" class="form-control" />
     <br/>
     <label>Enter Section:</label>
     <input type="text" name="section2" id="section" class="form-control">
     <br/>
     <label>Enter School Year:</label>
     <input type="text" name="schoolyear2" id="schoolyear" class="form-control">   
     <br/>
     <label>Enter Criteria:</label>
     <input type="text" name="gradecriteria" id="gradecriteria" class="form-control">   
     <br/>
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />
     </div>
     </div>
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
			</div>




  <script>  
$(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
  if($('#name2').val() == '')
  {  
   alert("Teacher Name is required");  
  }
  else  if($('#section').val() == '')
 	 {  
   alert("Section is required")
	}
	else  if($('#schoolyear').val() == '')
 	 {  
   alert("Schoolyear is required")
	}
	else  if($('#year').val() == '')
 	 {  
   alert("Year is required")
	}
	else  if($('#gradecriteria').val() == '')
 	 {  
   alert("Criteria is required")
	}
  else  
  {  
   $.ajax({  
    url:"insertadvisory.php",  
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


