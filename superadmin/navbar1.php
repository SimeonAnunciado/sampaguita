<style type="text/css">
  #logo{
  background-color: #7cffb3;
  padding: 30px;
  position: relative;
  padding: 10px 20px 10px 85px;
  opacity: 1.5;

}
#logo h1{
  float:right;
  position: relative;
  right:280px;
  font-family: Forte;
  color:gray;
}

          span:hover{
          animation-name: bounce;
          }

          span {  
        position: absolute;
      
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
        -webkit-animation-timing-function: ease-in-out;
        animation-timing-function: ease-in-out;
        animation-iteration-count: 2.3;
       -webkit-animation-iteration-count: infinite;
        
      }
      span:hover {
        cursor: pointer;
        animation-name: bounce;
        -moz-animation-name: bounce;
      }



</style>

<div id="logo"><img src="images/logo.png" class="animated fadeInDown"  width="120" height="100"><h1>Sampaguita High School</h1></div>

  <nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
     <a class="navbar-brand" href="index.php">S.H.S</a>
    </div>
    <div class="navbar-body">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

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

   

       <ul class="nav navbar-nav navbar-right">
           <li><a href="index.php"><span class="glyphicon glyphicon-user"></span> 
           <?php if(isset($_SESSION['userchairman'])){ 
            echo $_SESSION['userchairman'];}
            ?> </a></li>
            <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
          </ul>

      </ul>


      </div>
    </div>
   </div>
  </nav>