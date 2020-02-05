<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link href="css/bootstrap-4.3.1.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/ted.css">
	<title>Shedule</title>
	<style type="text/css">
		div.bigbox{

			width: 1200px;
			margin: 0px auto 10px;
			background-color: #051b2c;
		}
		div.smallbox{
			display: inline-block;
			margin-left: 40px;
			margin-top: 20px;
		}
	</style>
</head>
<body>

<?php include_once('nav.php'); ?>

<div class="bigbox">
	<h1 align="center" style="color: white;">SELECT YOUR CELEBRITIES</h1>
<?php

if(isset($_POST['search']))
{
	$key = $_POST['key'];
	$q = "SELECT * FROM celebrities WHERE cname LIKE '%$key%' ";
}
else{
	
	$q = "SELECT * FROM celebrities";
}

$result = mysqli_query($db,$q);


while ($row = mysqli_fetch_row($result)) {  ?>

	<div class="smallbox">
		<div class="card" style="width: 250px;">
  			<img src="img/<?php echo $row[0] ?>.jpg" class="card-img-top" alt="1">
  			<div class="card-body">
    			<h5 class="card-title"><?php echo $row[1] ?></h5>
    			<h5 class="card-title">Rs.<?php echo $row[6] ?></h5>
    			<a href="booking.php?cid=<?php echo $row[0] ?>" class="btn btn-primary">Book</a>
			</div>
		</div>
	</div>

<?php } ?>

</div>

	  <div class="card text-center">
  <div class="card-header">
	  <font face="century gothic" font size="+1">Contact TED.lk by +94714458762  </font></div>
  <div class="card-body">
    <h5 class="card-title"><font face="century gothic" font size="+1">We update you all with our all new shedules.STAY TUNNED</font></h5>
    <p class="card-text"><table width="1000" cellspacing="200" cellpadding="20">
  <tbody>
	  <tr>
    <td align="left"><font face="century gothic" font size="+1">
		<ul>
     About Us<br>
     Contact Us<br>
			FAQ</ul></font>
    </td>
	  <td align="left"><ul><font face="century gothic" font size="+1">
		  Privacy Policy<br>
          Terms & conditions<br>
		  Sitemap </font></ul>
	  </td>
	  <td align="left"><font face="century gothic" font size="+1"><ul>
      TED.lk<br>
      33/23/1/1,<br>
      Albert Place,<br>
      Meda Welikada Road,<br>
		  Rajagiriya , Sri Lanka</ul></font>
	  </td>
		  <td align="left"><font face="century gothic" font size="+1">
		    email <input type="text"> <input type="submit">
			  </font> </td>
	  </tr>
  </tbody>
</table>
</p>
  </div>
  <div class="card-footer text-muted">
	  <font face="century gothic" font size="+1">Copyright 2019 © TED.lk All Rights Reserved.</font>
  </div>
</div>
  	
	<script src="../js/jquery-3.3.1.min.js"></script>
	<script src="../js/popper.min.js"></script> 
	<script src="../js/bootstrap-4.3.1.js"></script>


</body>
</html>