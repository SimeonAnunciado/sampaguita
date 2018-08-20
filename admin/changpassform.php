<?php include 'db.php'; 
?> 

      <!-- change pass Form -->
      <div class="panel panel-info">
        <div class="panel-heading">Update</div>
        <div class="panel-body">

           
          <form class="form-horizontal" action="update.php" method="POST" id="formpass">
          <?php
          $sessionfname = $_SESSION['fname'];
          $res = mysqli_query($db,"SELECT * FROM registereduser WHERE firstname= '$name' ");
          if($row = mysqli_fetch_array($res)) {
            ?>
             <div class="form-group">
              <label class="control-label col-sm-3" for="fname">Firstname</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $row['firstname']; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="lname">Lastname</label>
              <div class="col-sm-8"> 
                <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $row['lastname']; ?>" required>
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-sm-3" for="em">Email</label>
              <div class="col-sm-8"> 
                <input type="email" class="form-control" id="em" name="lname" value="<?php echo $row['email']; ?>" required>
              </div>
            </div>
             
            <div class="form-group">
              <label class="control-label col-sm-3" for="pass">Password</label>
              <div class="col-sm-8"> 
                <input type="text" class="form-control" id="pass" name="pass" required>
              </div>
            </div>
             <div class="form-group">
              <label class="control-label col-sm-3" for="pass1">Confirm Password</label>
              <div class="col-sm-8"> 
                <input type="text" class="form-control" id="pass1" name="pass1"  required>
              </div>
            </div>
            
            
            <div class="form-group"> 
              <div class="col-sm-offset-3 col-sm-10">
                <button type="submit" class="btn btn-success" name="submit">Update Info</button>
                
              </div>
            </div>

            <?php
            # code...
          }
          ?>
          
            

           
          </form>
            </div>
          </div>
      <!-- End change pass Form -->