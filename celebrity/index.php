<?php 
session_start();

if (!isset($_SESSION['cemail'])) {

  header("Location:login.php");

}


 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Events</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	
  </head>
  <body>
	   <?php  include_once('nav.php');
	   include_once('../conn.php') ;

	   $date = date('d');
	   $month = date('m');
	   $year = date('Y');

	   $cemail  = $_SESSION['cemail'];

	   $q = "SELECT * FROM bookings JOIN celebrities JOIN users WHERE cemail = '$cemail' AND bookings.cid = celebrities.cid AND bookings.uid = users.uid";
	   $result = mysqli_query($db,$q);
	   
	   if ($result) {
	   	echo "Okay";
	   }

	    ?>
	  
	  <h1 align="center"><b><font face="century gothic">YOUR SCHEDULED PROGRAMMS</font></b></h1><hr size="20"><br>
	  <table width="950s" align="center">

	  	<?php while($row = mysqli_fetch_assoc($result)) { ?>
		 <tr style="margin-bottom: 20px;border:1px solid black;background-color:#EBEBEB">
			 <td width="400" height="200" align="center"><h2><?php echo $row['cdate']; ?>.<?php echo $row['cmonth']; ?>.<?php echo $row['cyear']; ?></h2></td>
			 <td>
			 	<ul type="disc">

				  <li>Venue</li>
				  <li>Contact</li>
				  <li>Customer Name</li>
				  <li>Customer Email</li>

				</ul>
			
			</td>
			<td>
				<ul style="list-style: none;">
				  <li>: <?php echo $row['cplace']; ?> </li>
				  <li>: <?php echo $row['upn']; ?></li>
				  <li>: <?php echo $row['uname']; ?> </li>
				  <li>: <?php echo $row['uemail']; ?> </li>

				</ul>	
			</td>
		</tr>
		<?php } ?>
</table>
  	 
  </body>
</html>