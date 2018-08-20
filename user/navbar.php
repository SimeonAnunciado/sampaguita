
 <header class="container text-center animated fadeInDown" id="header-logo" > 
 <div class="col-md-2 ">
    <img src="images/logo.png" height="120"> 
  </div> 
  <h1>SAMPAGUITA HIGH SCHOOL</h1>

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
       if(isset($_SESSION['email'])){
        ?>
     

        <?php
       }elseif(isset($_SESSION['userchairman'])){
        ?>


        <?php
       }elseif(isset($_SESSION['usernameold'])){
        ?>
        <div class="collapse navbar-collapse" id="myNavbar">
         <ul class="nav navbar-nav">
         <li><a href="onlinereg.php"><span class="glyphicon glyphicon-pencil"></span> Online Enrollment</a></li>
            <li><a href="activitylog.php"><span class="glyphicon glyphicon-info-sign"></span>  Activity Log</a></li> 
          <li><a href="oldstudent.php"><span class="glyphicon glyphicon-user"></span> My Account </a></li> 
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
          if(isset($_SESSION['email'])){
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
          }elseif(isset($_SESSION['useradmin'])){
            ?>
             <ul class="nav navbar-nav navbar-right">
             <ul class="nav navbar-nav">
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>  <?php echo $_SESSION['useradmin'];?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li> 
             </ul>
            </ul>
            <?php
          }elseif(isset($_SESSION['usernameold'])){


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