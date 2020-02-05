<?php 
session_start();
include_once('conn.php') ;

$_SESSION['errors'] = array();

//------------------------------------------------------------------------------------------------------------------------

	if (isset($_GET['logout'])) {

		unset($_SESSION['uemail']);
		header('location: index.php');

	}

//------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['ureg'])) {


		$uname = $_POST['uname'];
		$upass = $_POST['upass'];
		$uemail = $_POST['uemail'];
		$upn = $_POST['upn'];


		$q = "SELECT * FROM users WHERE uemail = '$uemail' ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) > 0) {

				array_push($_SESSION['errors'],"User already in!!");
				header('Location:
					');
			}
			else{

				$q = "INSERT INTO users(uname,upass,uemail,upn) VALUES('$uname','$upass','$uemail','$upn')";
				$result = mysqli_query($db,$q);

				if ($result) {

						header('Location:index.php');
				}
				else{

					array_push($_SESSION['errors'],"Error!!");
					header('Location:register.php');
				}

			}
	
}

//--------------------------------------------------------------------------------------------------------------------------

	if (isset($_POST['ulog'])) {

		$upass = mysqli_real_escape_string($db, $_POST['upass']);
		$uemail = mysqli_real_escape_string($db, $_POST['uemail']);

		$q = "SELECT * FROM users WHERE uemail = '$uemail' AND upass = '$upass' ";
		$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result) == 1) {


				$_SESSION['uemail'] = $uemail;
				header('Location:index.php');

				
			}
			else{

				array_push($_SESSION['errors'],"Wrong UserEmail/Password!!");
				header('Location:login.php');

			}
	
}

//------------------------------------------------------------------------------------------------------------------------


	if (isset($_POST['booked'])) {

		if (isset($_SESSION['uemail'])) {

			$uemail = $_SESSION['uemail'];
			$q = "SELECT uid FROM users WHERE uemail = '$uemail' ";
			$result = mysqli_query($db,$q);
			$row = mysqli_fetch_row($result);
			$uid = $row[0];


			$year = $_POST['y'];
			$month = $_POST['m'];
			$date = $_POST['d'];
			$place = $_POST['p'];
			$cid = $_POST['c'];

			$q = "SELECT * FROM bookings WHERE (cid = $cid) AND (cyear = '$year') AND (cmonth = '$month') AND (cdate = '$date')";
			$result = mysqli_query($db,$q);

			if (mysqli_num_rows($result)>0) {

				echo "$date $month $year has already booked , Click SHOW BOOKINGS to see booked dates!!";
			}
			else{

				$q = "INSERT INTO bookings(uid,cid,cyear,cmonth,cdate,cplace) VALUES($uid,$cid,'$year','$month','$date','$place')";
				$result = mysqli_query($db,$q);
				if ($result) {
					
					echo "Booked Succesfully!!";
				}
				else{
					echo "Booking Error!! Try again";
				}
				
			}

			
		}
		else{
			echo "Log in First";
		}

	}



 ?>	
