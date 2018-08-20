<?php 
include'db.php';
$query = "SELECT firstname FROM registereduser WHERE firstname LIKE '$_GET[search]%' ";
$result = mysqli_query($db,$query);
while ($res = mysqli_fetch_array($result)) {
		echo "$res[firstname]<br>";
	# code...
}

?>