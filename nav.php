<?php 
session_start();

include_once('conn.php');

?>

<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/ted.css">

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><font color="#36D010" font size="+5"><b>TED</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="abtus.php">About us</a>
      </li>
       <li class="nav-item active">
        <a class="nav-link" href="index.php">Home</a>
      </li> <li class="nav-item active">
        <a class="nav-link" href="shedule.php">Shedule</a>
      </li> <li class="nav-item active">
        <a class="nav-link" href="contact.php">Contact us</a>
      </li> 

      <?php if(isset($_SESSION['uemail'])) {  ?>


      <li class="nav-item active">
        <a class="nav-link" href="index.php">Welcome <?php echo $_SESSION['uemail']; ?></a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="server.php?logout=abc">Logout</a>
      </li>

    <?php } else{ ?>

      <li class="nav-item active">
        <a class="nav-link" href="login.php">Login</a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="register.php">Register</a>
      </li>

    <?php } ?>


    </ul>
    <form class="form-inline my-2 my-lg-0" method="POST" action="shedule.php">
      <input class="form-control mr-sm-2" name="key" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" name="search" value="1" type="submit">Search</button>
    </form>
  </div>
</nav>

