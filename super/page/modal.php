<!DOCTYPE html>
<html>
<head>
    <title></title>

 <link rel="stylesheet" type="text/css" href="/css/sweetalert.css" > 
      <script src="js/sweetalert.min.js"></script>
    <!-- Latest compiled and minified CSS -->  
    <!-- Latest compiled and minified CSS -->  
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- Optional theme -->
    <link rel="stylesheet" href="../../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="../../css/bootstrapValidator.css">

</head>
<body>

<?php

    $con = mysqli_connect('localhost','root','','enrollment');


    $result = mysqli_query($con,"SELECT * FROM wew ");
    $count = mysqli_num_rows($result);
    echo "<b><center><h3>Cars Reserved By Districts</h3></center></b><br><br>";

    while($row=mysqli_fetch_array($result)){
        $reservation_id = $row['reservation_id'];
    ?>

    <tr><td>
     <a data-toggle="modal" href="../../super/page/reservation_profile.php?id=<?php echo $reservation_id;?>" data-target="#myModal" class="btn btn-link">Reserver's Profile</a>
    </td></tr>

<?php
    //$reserver = $row['reservation_id']; //Don't Need this
    } //end of while loop
?>

//Bootstrap Modal
<div class="modal fade" id="myModal">
     <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <strong>Loading...</strong>
        </div>
    </div>
</div>


</body>
</html>