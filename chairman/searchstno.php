<?php
//insert.php
session_start();  
$connect = mysqli_connect("localhost", "root", "", "enrollment");
if(!empty($_POST['searchstno']))
{
 $output = '';
    $stno = mysqli_real_escape_string($connect, $_POST["searchstno"]);   
    $query = "
    SELECT * FROM studentdetails WHERE stno = '$stno'";
    $_SESSION['stno'] = $stno;   
    $result3 = mysqli_query($connect, $query);
	echo $output;
}
?>
