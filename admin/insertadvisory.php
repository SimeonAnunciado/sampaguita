<?php
//insert.php
session_start();  
$connect = mysqli_connect("localhost", "root", "", "enrollment");
if(!empty($_POST['name2']))
{
 $output = '';
    $name = mysqli_real_escape_string($connect, $_POST["name2"]);
    $section = mysqli_real_escape_string($connect, $_POST['section2']);  
    $grade = mysqli_real_escape_string($connect, $_POST['year2']);  
    $schoolyear = mysqli_real_escape_string($connect, $_POST['schoolyear2']); 
     $gradecriteria = mysqli_real_escape_string($connect, $_POST['gradecriteria']);     
    $query = "
    INSERT INTO sectionlist(sectionname, adviser, schoolyear, grade, criteria)  
     VALUES('$section', '$name', '$schoolyear', '$grade', '$gradecriteria')";
    $result3 = mysqli_query($connect, $query);
    echo $output;
}
?>
