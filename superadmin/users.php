<?php 
include 'db.php';
session_start();
if(!isset($_SESSION['userchairman']))
{
  header('location:../user/studentportal.php');
}
else
{
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Sampaguita High School</title>
<?php
  include'links.php';
?>
</head>
<body style="background: url('images/bgrough.jpg');  background-size: 20% 20%; background-repeat: repeat;">
<?php
include'navbar1.php';

?>

<br><br>
<br><br>
  <div class="container" style="position: relative;top: -60px; margin-bottom: 190px;">
    <div class="row">
   </div>
    <br>
         <div class="col-md-3">
        
        </div> 

        
      
    </div>
  </div>



  
<?php
  include'footer.php';
?>
</body>
</html>

<?php
}
?>