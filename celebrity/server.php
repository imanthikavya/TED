<?php 
session_start();
include_once('../conn.php') ;

$_SESSION['invalid'] = array();



//------------------------------------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {

		unset($_SESSION['cemail']);
		header('location: login.php');

	}

//--------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['clog'])) {

		$cpass = mysqli_real_escape_string($db, $_POST['cpass']);
		$cemail = mysqli_real_escape_string($db, $_POST['cemail']);

		$q = "SELECT * FROM celebrities WHERE cemail = '$cemail' AND cpass = '$cpass' ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) == 1) {


				$_SESSION['cemail'] = $cemail;
				header('Location:index.php');

				
			}
			else{

				print_r($result);
				array_push($_SESSION['invalid'],"Wrong UserEmail/Password!!");
				header('Location:login.php');
			}
	
}

//--------------------------------------------------------------------------------------------------------------------------






 ?>	
