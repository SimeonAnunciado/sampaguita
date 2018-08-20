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
include'navbar.php';

?>

<br><br>
<br><br>
  <div class="container">
    <div class="row">
    <?php
    include'letterhead.php';
    ?>
    <br>
        <div class="col-md-3">
        <?php 
          include'sidebar.php';
        ?>
        </div>
      <div class="col-md-9">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <div class="panel-title">Guidelines</div>
          </div>
          <div class="panel-body">
            <div class="col-md-12">
                   <ul class="nav nav-tabs">
                    <li class="active"><a href="aboutus.php"><b>Mission</b></a></li>
                    <li><a href="aboutusvission.php"><b>Vission</b></a></li>
                  </ul>
                  <br>
              <div class="well">
                <?php
                if(isset($_POST['savebtn']))
                {
                  
                  $desc = $_POST['desc'];
                  $sql="UPDATE aboutus SET mission ='$desc', date=Now() WHERE id='1'";
                  $result = mysqli_query($db, $sql);
                    if($result)
                    {
                       $sqldate = "SELECT * FROM aboutus";
                      $resultdate = mysqli_query($db, $sqldate);
                        while($rowdate = mysqli_fetch_array($resultdate))
                        {
                          $date = $rowdate['date'];
                        } 
                        echo'<script>swal("Successful!", "Completely Updated", "success");</script>';
                    }
                    else
                    {
                       echo'<script>sweetAlert("Error", "There Something Error!", "error");</script>';
                    }
                }
                else
                {
                $sql = "SELECT * FROM aboutus";
                $result = mysqli_query($db, $sql);
                  while($row = mysqli_fetch_array($result))
                  {
                    $desc=$row['mission'];
                    $date = $row['date'];
                  } 
                }
                ?>
                <form method="POST" action="">
                <label id="date" class="pull-right" style="display:none;">Updated in : <?php echo$date; ?></label>
               <textarea class="form-control" name="desc" rows="30" id="requirements" style="font-style: italic;" disabled><?php echo$desc; ?> </textarea>
                <br>
                <button class="btn btn-warning" name="editbtn" id="editbtn"><span class="glyphicon glyphicon-pencil"></span> Edit</button>
                <button class="btn btn-success pull-right" name="savebtn" id="savebtn" style="display:none"><span class="glyphicon glyphicon-save"></span> Save</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  
<?php
  include'footer.php';
?>
</body>
</html>
<script type="text/javascript">
  $("#editbtn").click(function() {
  $("textarea:disabled").removeAttr("disabled");
  $("#editbtn").attr("disabled",true);
 $("#savebtn").toggle();
  $("#date").toggle();
});
</script>
<?php
}
?>