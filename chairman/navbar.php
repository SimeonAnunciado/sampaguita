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

ul li:hover{
  background-color: gray;
  color:white;
}
</style>

<div id="logo"><img src="images/logo.png" width="120" class="animated fadeInDown" height="100"><h1>Sampaguita High School</h1></div>
<nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="index.php">Home</a></li>
    </ul>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <ul class="nav navbar-nav">
        <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="caret"></span>
        <?php
        if (isset($_SESSION['user'])) {
          echo $_SESSION['user'];
        }elseif (isset($_SESSION['userchairman'])){
          echo $_SESSION['userchairman'];
          
        }else{
          echo "Undefined Session";
        }
        ?>


        </a>
        <ul class="dropdown-menu">
          <li><a href="logout.php">Logout</a></li>
        </ul>
        </li> 
      </ul>
      </ul>
    </div>
  </div>
</nav>