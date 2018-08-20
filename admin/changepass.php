
        <?php 
        include 'db.php';
      if (isset($_POST['submit'])) {
          //$firstname = $_POST['fname'];
          $pass = $_POST['pass'];
         
         //UPDATE `registereduser` SET `pass`='cinco' WHERE firstname ='wew'

          $sql = "UPDATE `registereduser` SET pass = '$pass' WHERE firstname = '$firstname' ";
          $result = mysqli_query($db,$sql) or die(mysqli_error());


        if ($result) {
          echo "ok";
         
        }else{
        
          echo "x";

          
        }
      }

      ?>