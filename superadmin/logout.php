<?php
session_start();
session_destroy();
session_unset($_SESSION['userchairman']);
	header('location:../user/index.php');

?>