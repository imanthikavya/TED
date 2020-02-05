<?php 
session_start();
include_once('../conn.php') ;

$_SESSION['wrong'] = array();



//------------------------------------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {

		unset($_SESSION['aemail']);
		header('location: login.php');

	}

//------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['cadd'])) {


		$cname = mysqli_real_escape_string($db, $_POST['cname']);
		$cpass = mysqli_real_escape_string($db, $_POST['cpass']);
		$cemail = mysqli_real_escape_string($db, $_POST['cemail']);
		$cpn = mysqli_real_escape_string($db, $_POST['cpn']);
		$cage = mysqli_real_escape_string($db, $_POST['cage']);
		$cprice = mysqli_real_escape_string($db, $_POST['cprice']);


		$aemail = $_SESSION['aemail'];
		$q = "SELECT aid FROM admins WHERE aemail = '$aemail' ";
		$result = mysqli_query($db,$q);
		$row = mysqli_fetch_row($result);
		$aid = $row[0];


		$q = "SELECT * FROM celebrities WHERE cemail = '$cemail' ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) > 0) {

				array_push($_SESSION['wrong'],"celebrity already in!!");
				header('Location:index.php');
			}
			else{

				$q = "INSERT INTO celebrities (cname,cpass,cemail,cpn,cage,cprice,aid) VALUES('$cname','$cpass','$cemail','$cpn','$cage','$cprice',$aid)";
				$result = mysqli_query($db,$q);

				if ($result) {
						array_push($_SESSION['wrong'],"Celebrity added successfully!!");
						header('Location:index.php');
				}
				else{

					array_push($_SESSION['wrong'],"Error!!");
					header('Location:index.php');
				}

			}
	
}

//--------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['alog'])) {

		$apass = mysqli_real_escape_string($db, $_POST['apass']);
		$aemail = mysqli_real_escape_string($db, $_POST['aemail']);

		$q = "SELECT * FROM admins WHERE aemail = '$aemail' AND apass = '$apass' ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) == 1) {


				$_SESSION['aemail'] = $aemail;
				header('Location:index.php');

				
			}
			else{

				array_push($_SESSION['wrong'],"Wrong UserEmail/Password!!");
				header('Location:login.php');
				
				

			}
	
}

//--------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['cdel'])) {

		$cid = mysqli_real_escape_string($db, $_POST['cid']);

		$q = "SELECT * FROM celebrities WHERE cid = $cid ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) == 0) {

				array_push($_SESSION['wrong'],"No celebrity in!!");
				header('Location:index.php');
			}
			else{
				$q = "DELETE FROM celebrities WHERE cid = '$cid'";
				$result = mysqli_query($db,$q);
				array_push($_SESSION['wrong'],"Celebrity Deleted!!");
				header('Location:index.php');
			}	
	
}





 ?>	
