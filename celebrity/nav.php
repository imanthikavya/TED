<?php 
include_once('../conn.php');
?>
<?php if (isset($_SESSION['cemail'])) { ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#"><font color="#36D010" font size="+5"><b>TED-Celebrity Dashboard</b></font></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    

      


    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="login.php">Welcome <?php echo $_SESSION['cemail']; ?> </a>
      </li>
     <li class="nav-item active">
        <a class="nav-link" href="server.php?logout=1">Logout</a>
      </li>
    </ul>



    
  </div>
</nav>
<?php } ?>

