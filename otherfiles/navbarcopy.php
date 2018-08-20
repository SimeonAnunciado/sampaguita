
 <header class="container text-center animated fadeInDown" id="header-logo" > 
 <div class="col-md-2 ">
    <img src="images/logo.png" height="120"> 
  </div> 
  <h1 style="font-style: forte;">SAMPAGUITA HIGH SCHOOL</h1>

</header>


  <nav class="navbar navbar-default" id="navbar">
    <div class="container-fluid">
      <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
       </button>
      </div>

      <?php 

      if (isset($_SESSION['usernameold'])) {
         $studentnumber = $_SESSION['usernameold'];
         $SqLQ = mysqli_query($db,"SELECT * FROM studentdetails WHERE stno = '$studentnumber' ") 
         or die(mysqli_error());
         $row = mysqli_fetch_array($SqLQ);
         $studentname = $row['stname'];


      }
      

       


       if(isset($_SESSION['email'])){
        ?>


        <?php
       }elseif(isset($_SESSION['userchairman'])){
        ?>


        <?php
      
       }elseif(isset($_SESSION['usersuper'])){
        ?>
       <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
                 <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="requirements.php"><span class="glyphicon glyphicon-pencil"></span> Posts <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                     <li><a href="requirements1.php"><span class="glyphicon glyphicon-tag"></span> Requirements</span></a></li>
                     <li><a href="guidelines1.php"><span class="glyphicon glyphicon-tasks"></span> Guidelines</a></li>
                    <li><a href="aboutus1.php"><span class="glyphicon glyphicon-th-list"></span> About Us Post</a></li>

                   </ul></li>
                  <li><a href="students.php"><span class="glyphicon glyphicon-signal"></span> Students</a></li>
            <li><a href="photos.php"><span class="glyphicon glyphicon-picture"></span> Photos</a></li>
            <li><a href="admin.php"><span class="glyphicon glyphicon-briefcase"></span> Chairman / Admin</a></li>
          </ul>

        <?php
    
       }else{
        ?>
       <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav" id="navbar-nav">
          <li><a href="home.php"><span class="glyphicon glyphicon-home"></span> Home</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="admission.html"><span class="glyphicon glyphicon-list"></span> Admission
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="requirements.php">Requirements</a></li>
              <li><a href="guidelines.php">Guidelines</a></li>
              <li><a href="studentportal.php">Student Portal</a></li>
            </ul>
          </li>
          <li><a href="aboutus.php"><span class="glyphicon glyphicon-info-sign"></span>  About</a></li>
        </ul>

          <?php
       }
      ?>

        <?php 
          if(isset($_SESSION['emailstudent'])){
            ?>          
            <ul class="nav navbar-nav navbar-right">
             <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['email'];?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li> 
             </ul>
            </ul>


           <?php
          }elseif(isset($_SESSION['userchairman'])){
            ?>
             <ul class="nav navbar-nav navbar-right">
             <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['userchairman'];?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li> 
             </ul>
            </ul>
            <?php
          }elseif(isset($_SESSION['usersuper'])){
            ?>
             <ul class="nav navbar-nav navbar-right">
             <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['usersuper'];?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li> 
             </ul>
            </ul>
            <?php
            }elseif(isset($_SESSION['usernameold'])){
            ?>
             <ul class="nav navbar-nav navbar-right">
             <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $studentname; ?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li> 
             </ul>
            </ul>
            <?php
            }else{
            ?>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome Guess</a></li>
            </ul>
            <?php
          }
        ?>

       
      </div>
    </div>
  </nav>