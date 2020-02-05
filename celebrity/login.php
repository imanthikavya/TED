<?php 
session_start(); 

if (isset($_SESSION['cemail'])) {

  header("Location:index.php");

}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>

	<link href="../css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../css/ted.css">

 <style type="text/css">
       input{

      width: 100%;
      border-radius: 5px;
    }
    input.myclass{
      margin-top: 10px;
      border-radius: 15px;
    }
    span{
      color: green;
    }
    h1
    {
      text-align: center;
    }
    div.myclass
    {
      padding: 50px; 
      border:2px solid #36d010; 
      width: 500px;
      background-color: #f8f9fa;
      color: black ;
      border-top-left-radius: 50px;
      border-bottom-right-radius: 50px;
      margin: 100px;
    }
 </style>

</head>
<body>

	<?php include_once('nav.php');?>

<center>	
<div class="myclass">
  <form action="server.php" method="POST">
      	<h1><span>TED</span> - ADMIN</h1>
        <span><?php include_once('invalid.php') ?></span>
        <input type="email" name="cemail" placeholder="Email" id="cemail" required><br>	
        <input type="password" name="cpass" id="cpass" placeholder="Password" required><br>	
        <input class="myclass" type="submit" name="clog" id="clog" value="Login">
  </form>
</div>

</center>


</body>
</html>