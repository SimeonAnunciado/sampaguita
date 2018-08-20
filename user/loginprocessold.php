<?php
require 'db.php';
session_start();  
if(!empty($_POST['usernameold']))
{
 $output = '';
    $usernameold = mysqli_real_escape_string($db, $_POST["usernameold"]); 
    $passwordold = mysqli_real_escape_string($db, $_POST["passold"]);     
  
    $_SESSION['usernameold'] = $usernameold;  
     $_SESSION['passwordold'] = $passwordold;    
   
    $result3 = mysqli_query($db, "SELECT * FROM studentdetails WHERE username ='$usernameold' 
        AND password = '$passwordold' ") or die(mysqli_error());

    while($row3 = mysqli_fetch_array($result3))
    {
    	$dbid=$row3['id'];
    	$dbstno=$row3['stno'];
    }
    	$_SESSION['dbstno']=$dbstno;
    	$_SESSION['dbid'] = $dbid;
	echo $output;
}
?>
