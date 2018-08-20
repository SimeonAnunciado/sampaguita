<!DOCTYPE html>
<html>
<head>
	<!--Sweet Alert -->
      <link rel="stylesheet" type="text/css" href="css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
  	<!-- Latest compiled and minified CSS -->  

	<!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/bootstrapValidator.css">
   <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

      <!-- javascript files at the bottom page -->
        <script src="js/jquery.min.js"></script>
        <!-- minified files at the bottom page -->
         <script src="js/bootstrap.min.js"></script>

         <script src="js/bootstrapValidator.js"></script>
 </head>
<body>


			<form>
				
				<div class="col-md-2">
				<input type="text" name="search" id="search" class="form-control" placeholder="Search Here..">
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

</body>
</html>