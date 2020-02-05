<?php 
session_start();

if (!isset($_SESSION['aemail'])) {

  header("Location:login.php");

}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>ADMIN-Panel</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="../js/jquery.min.js"></script>
	<style type="text/css">
		form.my{
			width: 500px;
			margin: 0 auto;
			border: 1px solid black;
			padding: 50px;
			border-radius: 10px;
			background-color: #f8f9fa;
			display: inline-block;
		}
		label , div {
			width: 100%;
		}
		legend
		{
			margin:20px auto;
			width: auto;
		}
		button.my{
			width: 100%;
		}
		div{
			text-align: center;
		}
		table
		{
			width:300px;
			margin: 0 auto;
			text-align: left;
		}
		table tr th{
			text-align: center;
			background-color: black;
			color: white;
		}
		table tr td
		{
			background-color: red;
			color: white;
			border: 1px solid black;
		}
	</style>
</head>
<body>

<?php include_once('nav.php'); ?>

<?php if(isset($_SESSION['wrong']))
  {
    foreach ($_SESSION['wrong'] as $wrong){

      echo "<script>alert('".$wrong."')</script>";

    }
    unset($_SESSION['wrong']);
  } 
 ?>

<div>
<form class="form-horizontal my" action="server.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend>TED(ADMIN-Panel)-ADD</legend>

  <input id="cname" name="cname" type="text" placeholder="Celebrity Name" class="form-control input-md" required=""><br>
  <input id="cpass" name="cpass" type="text" placeholder="Celebrity Password" class="form-control input-md" required=""><br>
  <input id="cemail" name="cemail" type="email" placeholder="Celebrity Email" class="form-control input-md" required=""><br>
  <input id="cpn" name="cpn" type="text" placeholder="Celebrity Phone No" class="form-control input-md" required=""><br>
  <input id="cage" name="cage" type="text" placeholder="Celebrity Age" class="form-control input-md" required=""><br>
  <input id="cprice" name="cprice" type="text" placeholder="Celebrity Price" class="form-control input-md" required=""><br>
  <button id="cadd" name="cadd" class="btn btn-success my">ADD Celebrity </button>

    
</fieldset>
</form>
<form class="form-horizontal my" action="server.php" method="POST">
<fieldset>

<!-- Form Name -->
<legend>TED(ADMIN-Panel)-Remove</legend>

  <input id="cid" name="cid" type="text" placeholder="Celebrity ID" class="form-control input-md" required=""><br>
  <button id="cdel" name="cdel" class="btn btn-success my">Remove Celebrity </button>

    
</fieldset>
</form>
</div>
<div>
	<h1> Celebrity Details</h1>
<table >
	<tr>
		<th>ID</th>
		<th>NAME</th>
	</tr>

<?php 

	$q = "SELECT cid,cname FROM celebrities";
	$result = mysqli_query($db,$q);

	while ($row = mysqli_fetch_row($result)) { ?>

	<tr>
		<td><?php echo $row[0] ?></td>
		<td><?php echo $row[1] ?></td>
	</tr>
 

<?php  } ?>

</table>
</div>
</body>
</html>