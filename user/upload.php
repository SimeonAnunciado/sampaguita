<?php  

if (isset($_GET['success'])) {
	echo $_GET['success'];
	# code...
}
	if (isset($_POST['submit'])) {
		$file = $_FILES['file'];

		$fileName = $_FILES['file']['name'];
		$fileTmpName = $_FILES['file']['tmp_name'];
		$fileSize = $_FILES['file']['size'];
		$fileError = $_FILES['file']['error'];
		$fileType = $_FILES['file']['type'];

		$fileExt = explode('.', $fileName);
		$fileActualExt = strtolower(end($fileExt));

		$allowed =array('jpg','jpeg','png','pdf');

		if (in_array($fileActualExt, $allowed)) {
			
			if ($fileError ===0) {



				if ($fileSize < 50000 ) {
					$fileNameNew = rand(0,999).".".$fileActualExt;
					$fileDestination = 'uploads/'.$fileNameNew;

					move_uploaded_file($fileTmpName, $fileDestination);
					header('location:upload.php?success');
				}else{
					echo "Your file was too big!";
				}
			}else{
			echo "There Was an error uploading your file ";
			}
		}else{
			echo "You Cannot Upload this Type of Files ";
		}





	





	}

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
	<input type="file" name="file">
	<button type="submit" name="submit">Upload</button>
		
	</form>

</body>
</html>