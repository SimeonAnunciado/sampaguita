<?php


	function Addchairman(){
		GLOBAL $db;

		if(!isset($_SESSION['stduser'])){
			header('location:../super/index.php');
		}
		if(isset($_POST['chairmanbtn'])){
			$sname = $_POST['sname'];
			$fname = $_POST['fname'];
			$user = $_POST['user'];
			$pass = $_POST['pwd'];
			$password = md5($pass);
			$gender = $_POST['gender'];

			$chairman = $_POST['chair'];
			// Query 
			$query = mysqli_query($db,"SELECT * FROM chairman WHERE 
					sname = '$sname' AND fname = '$fname' AND  username = '$user'")
					or die(mysqli_error());

			if(mysqli_num_rows($query)>0){
					echo "
						<script>
						sweetAlert('Oops...', 'Some Data Already Exist!', 'error');
						</script>";	
			}else{
				$insert = mysqli_query($db,"INSERT INTO chairman 
					(sname,fname,username,password,gender,chairman) VALUES 
					('$sname','$fname','$user','$password','$gender','$chairman')" ) or die(mysqli_error());
				if($insert){
					?>
					<script>swal("Good job!", "Success Add", "success");</script>
					<?php
				}else{	
						echo "
						<script>
						sweetAlert('Oops...', 'Error!', 'error');
						</script>";	
				}
			}		
		}

	}

	function AddPhotos(){
		GLOBAL $db;

	if (isset($_POST['submit'])) {
		//$file = $_FILES['file'];
		//print_r($file);

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error']; 
		$fileType = $_FILES['file']['type']; 
		$text = $_POST['text'];

		$fileExt = explode('.',$fileName);
		$fileActualExt = strtolower(end($fileExt));
		$allowed = array('jpg','jpeg','png','JPG');

		if (in_array($fileActualExt, $allowed)) {
				if ($fileError === 0) {
					if ($fileSize<50000000) {

						$fileNameNew = uniqid('', true).".".$fileActualExt;
						$fileDestination = './upload/'.$fileNameNew;
						move_uploaded_file($fileTmpName,$fileDestination);

						$sql = mysqli_query($db,"INSERT INTO photos (`image`,`text`) VALUES ('$fileNameNew','$text')");
						if ($sql) {
							echo "
								<script>swal('Good job!', 'Success Post ', 'success');</script>";
								header('location:index.php');
            					  

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

		}
	}

	function calendar(){
		GLOBAL $db;

		if (isset($_POST['calendar'])) {
			$date = $_POST['date'];
			$event = $_POST['event'];

			$sql = "INSERT INTO calendar (day,event) VALUES ('$date','$event')";
			$query = mysqli_query($db,$sql);

			if($query){
				echo "<script>alert('Success Add Calendar');</script>";
			}else{
				echo "<script>alert('Error');</script>";
			}
		}
	}

	function Delete(){
		GLOBAL $db;

		$id = $_GET['id'];
		if (isset($id)) {
			$query = "DELETE  FROM post WHERE id='$id' ";

			$res = mysqli_query($db,$query) or die(mysqli_error());

			if ($res) {
				echo "<script>alert('Delete');location.href='index.php';</script>";
			}
			else{
				header('location:index.php');
			}
		}
	}

	function totalpost(){
		GLOBAL $db;

		$sql = mysqli_query($db,"SELECT count(id) AS total FROM photos");
		$wew = mysqli_fetch_array($sql);
		$post	= $wew['total'];
		echo $post;
	}

	function totalstudent(){
		GLOBAL $db;

		$sql = mysqli_query($db,"SELECT count(id) AS totalstud FROM enrollmentform ");
		$wewz = mysqli_fetch_array($sql);
		$student = $wewz['totalstud'];
		echo $student;
	}

	function chairman(){
		GLOBAL $db;

		$sql = mysqli_query($db,"SELECT count(id) AS chairman FROM chairman ");
		$wewx = mysqli_fetch_array($sql);
		$chairman = $wewx['chairman'];
		echo $chairman;
	}

	function view(){
		GLOBAL $db;

		if (isset($_GET['id'])) {
			$id = $_GET['id'];
			echo $id;
		}
		//$query = "SELECT * FROM chairman WHERE id = '' ";
	}

	function addtext(){
		GLOBAL $db;

		if (isset($_POST['wew'])) {
			$text = $_POST['text'];

			$sqlQuery = mysqli_query($db,"INSERT INTO anouncement (`text`) VALUES ('$text') ");
			if ($sqlQuery) {
				echo "<script>alert('Success Add Post / text');</script>";
			}else{
				echo "<script>alert('Error');</script>";

			}
		}
	}

		function totalanounce(){
		GLOBAL $db;

		$sql = mysqli_query($db,"SELECT count(id) AS totalanounce FROM anouncement");
		$wewzx = mysqli_fetch_array($sql);
		$anouncement = $wewzx['totalanounce'];
		echo $anouncement;
	}

	
		

?>