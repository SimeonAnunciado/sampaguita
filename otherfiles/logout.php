<?php 
include 'db.php';
session_start();
session_destroy();
session_unset($_SESSION['email']);
session_unset($_SESSION['session']);
session_unset($_SESSION['id']);
session_unset($_SESSION['surname']);
session_unset($_SESSION['firstname']);
session_unset($_SESSION['middlname']);
session_unset($grade);
session_unset($_SESSION['usersuper']);
session_unset($_SESSION['userchairman']);
session_unset($_SESSION['useradmin']);
session_unset($_SESSION['usernameold']);
header('location:../user/index.php');




?>