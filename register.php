<?php

if (isset($_SESSION['uemail'])) {

  header("Location:index.php");

}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Register</title>
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <link href="css/bootstrap.min.css" rel="stylesheet">
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
      color: #36d010;
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

  <script type="text/javascript">
    $(document).ready(function(){

      $('#ureg').click(function(){

          var username = $('#uname').val();
          var useremail = $('#uemail').val();
          var userpass = $('#upass').val();
          var userpass1 = $('#upass1').val();
          var userpn = $('#upn').val();

          if (username.length == 0 || useremail.length == 0 || userpass.length == 0 ) {

            alert("All fields must be Filled");
            $('#uname').val("");
          }
          else if( !useremail.includes("@") ||  !( useremail.includes("yahoo.com") || useremail.includes("gmail.com") || useremail.includes("outlook.com") )){
            
              alert("Wrong Email!!");
              $('#uemail').val("");
          }
          else if(isNaN(userpn)){

              alert("Phone number must be numaric");
              $('#upn').val("");
          }
          else if(userpass.length < 6){

            alert("Password should be greater than 6 char");
            $('#upass').val("");
          }
          else if (userpass != userpass1) {
            alert("Two passwords should be Same");
            $('#upass').val("");
            $('#upass1').val("");

          }
          else{
            alert("Validated");
          }


      });


    });

  </script>
</head>
<body>
  
<?php   include_once('nav.php');?>





<center>  
<div class="myclass">
<form method="POST" action="server.php">

        <h1><span>TED</span> - REGISTER</h1>

        <span><?php include_once('errors.php') ?></span>

        <input type="text" name="uname" id="uname" placeholder="Username" required><br>
        <input type="email" name="uemail" id="uemail" placeholder="Email" required><br> 
        <input type="password" name="upass" id="upass" placeholder="Password" required><br> 
        <input type="password" name="upass1" id="upass1" placeholder="Confirm Password" required><br>
        <input type="text" name="upn" id="upn" placeholder="Phone" required><br>
        <input class="myclass" type="submit" value="Register" name="ureg" id="ureg">
</form>
</div>

</center>


</body>
</html>