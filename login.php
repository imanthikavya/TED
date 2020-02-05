<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="css/ted.css">

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
<?php 
if (isset($_SESSION['uemail'])) {

  header("Location:index.php");

}
 ?>


<center>	
<div class="myclass">
  <form action="server.php" method="POST">
      	<h1><span>TED</span> - LOGIN</h1>
        <span><?php include_once('errors.php') ?></span>
        <input type="email" name="uemail" placeholder="Email" id="uemail" required><br>	
        <input type="password" name="upass" id="upass" placeholder="Password" required><br>	
        <input class="myclass" type="submit" name="ulog" id="ulog" value="Login">
  </form>
</div>

</center>


</body>
</html>