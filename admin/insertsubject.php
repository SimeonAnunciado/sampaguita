<?php
//insert.php
session_start();  
$connect = mysqli_connect("localhost", "root", "", "enrollment");
if(!empty($_POST['grade']))
{
 $output = '';
    $subject = mysqli_real_escape_string($connect, $_POST['subject']);  
    $grade = mysqli_real_escape_string($connect, $_POST['grade']);    
    $query = "
    INSERT INTO subjectlist(grade, subjecttitle)  
     VALUES('$grade', '$subject')";
    $result3 = mysqli_query($connect, $query);
    echo $output;
}
?>
