<?php 
if (isset($_GET['cid'])) {

	$cid = $_GET['cid'];
}
else{

	header("Location:index.php");
}


 ?>
<!DOCTYPE html>
<html>
<head>
	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Untitled Document</title>
    <!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>

	<link rel="stylesheet" type="text/css" href="css/ted.css">
  		
		<title>TDN-celebrity</title>
		
	<style type="text/css">
		img{
			border: 1px solid black;
		}
		*{
			margin: 0;
			padding: 0;
		}
		.bigbox{

			width: 1200px;
			margin: 0px auto;
			padding: 20px;
			background-color: #f8f9fa;
		}
		select
		{
			width: 150px;
			height: 40px;
			font-size: 25px;
			border-radius: 10px;

			
		}
		select option
		{
			background-color: brown;
			color: white;

		}

		div.oneline{
			display: inline-block;
		}
		.smallbox{

			background-color: #f8f9fb;
			width: 500px;
		}
		.clearfix
		{
			overflow: hidden;
		}
		table tr th{
			text-align: center;
			background-color: black;
			color: white;
		}
		table tr td.book
		{
			text-align: center;
			background-color: red;
			color: white;
		}
	</style>

	<script type="text/javascript">

		months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];

		var thisMonthInt =  new Date().getMonth();
		var thisMonthStr = months[thisMonthInt];
		var thisDate = new Date().getDate();
		var thisYear = new Date().getFullYear();

		$(document).ready(function(){

			$('#Booking').hide();

			$('#s1-1').val(thisMonthInt+1).text(thisMonthStr);
			$('#s2-1').val(thisDate).text(thisDate);

			$('#showBooking').click(function(){

				$('#Booking').slideToggle();
				if($('#SBTEXT').text()=='SHOW BOOKINGS'){
					$('#SBTEXT').html('<h1>HIDE BOOKINGS</h1>');
				}
				else{
					$('#SBTEXT').html('<h1>SHOW BOOKINGS</h1>');
				}
				
			});


			$('#booked').click(function(){	

				function daysInTheMonth(month,year) { 
					return new Date(year,month,0); 
				}			

				var month = $('#month').val();
				var date = $('#date').val();
				var place = $('#place').val();

				var cid = <?php echo $cid; ?> ;

				var daysInTheMonth = daysInTheMonth(month,thisYear).getDate();


				if (place.length == 0) {

					alert("Place must be filled");
				}
				else if( (month<thisMonthInt+1) || ((month==thisMonthInt+1)  && (date < thisDate)) ){

					alert(months[month-1] + " " + date +" is a past date.Try again !!!");
				}
				else if(daysInTheMonth<date){

					alert(months[month-1] + " has no " + date +" days !!!");
				}
				else{

					$.ajax({

						url:"server.php",
						type:"POST",
						data:{
							y:thisYear,
							m:month,
							d:date,
							p:place,
							c:cid,
							booked:"okay"
						},
						success:function(data){

							alert(data);
							location.reload();
						}

					});
				}
				
			});




		});

	</script>

</head>
<body>
	
<?php include_once('nav.php'); ?>

<?php 
$this_year = date("Y");
$this_month =  date("m");
$this_date = date("d");

$q = "SELECT * FROM celebrities WHERE cid = $cid ";
$result = mysqli_query($db,$q);
$cel = mysqli_fetch_row($result);

$q = "SELECT * FROM bookings WHERE cid = $cid AND (cyear >= $this_year) AND (cmonth >= $this_month) AND (cdate >= $this_date) ORDER BY  cyear , cmonth , cdate  ASC";
$result = mysqli_query($db,$q);


 ?>


<!--Details-->

<div align="center" class="bigbox clearfix" style="border-bottom:5px solid #36d010;">
	<div class="oneline smallbox clearfix" style="float: left; height: 200px;text-align: left;">
		<p>
			<br><br>
			Name&nbsp: <b><font size="5px"><?php echo $cel[1]; ?></font></b> <br>
			Age&nbsp&nbsp&nbsp&nbsp: <?php echo $cel[5]; ?> <br>
			Email : <?php echo $cel[3]; ?> <br>
			Number : <?php echo $cel[4]; ?>
			
		</p>
	</div>


	<div class="oneline smallbox clearfix" style="float: right;height:200px;width:200px"><p><img width="200px" height="200px" src="img/<?php echo $cel[0]?>.jpg"></p></div>

</div>

<div id="Booking">

<div align="center" class="bigbox clearfix">

	<table style="width: 50%;" border="1">
		<tr>
			<th class="">MONTH</th>
			<th class="">DATE</th>
		</tr>
		<?php 

		while( $row = mysqli_fetch_row($result)) {

			$month = date("F", mktime(0, 0, 0, $row[4] , 1 , $this_year)); ?>
		<tr>
			<td class="book"><?php echo $month; ?></td>
			<td class="book"><?php echo $row[5]; ?></td>
		</tr>
	<?php } ?>
	</table>

</div>

</div>

<!--Show Bookings-->
<div align="center" class="bigbox clearfix" id="showBooking" style="margin: 10px auto;border:2px dashed red;">
	<div class="clearfix" id="SBTEXT" style="margin: 10px auto;"><h1>SHOW BOOKINGS</h1></div>
</div>

<div align="center" class="bigbox clearfix" id="showBooking" style="margin: 10px auto;">
		<table>
			<tr>
				<td>&nbsp&nbsp&nbsp&nbsp <span style="color:brown; font-weight: bold;font-size: 25px;">Select Month</span> &nbsp&nbsp&nbsp&nbsp</td>
				<td>
					<select name="month" id="month" required="" class="mdb-select md-form colorful-select dropdown-primary" >

						<script type="text/javascript"> </script>
						<option value="0" id="s1-1">Month</option>
						<option value="1">January</option>
						<option value="2">February</option>
						<option value="3">March</option>
						<option value="4">April</option>
						<option value="5">May</option>
						<option value="6">June</option>
						<option value="7">July</option>
						<option value="8">August</option>
						<option value="9">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>

					</select>
				</td>
				<td>&nbsp&nbsp&nbsp&nbsp <span style="color:brown; font-weight: bold;font-size: 25px;">Select Date</span> &nbsp&nbsp&nbsp&nbsp</td>
				<td>
					<select name="date" id="date" required="" >
						<option value="0" id="s2-1">Date</option>
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
						<option value="13">13</option>
						<option value="14">14</option>
						<option value="15">15</option>
						<option value="16">16</option>
						<option value="17">17</option>
						<option value="18">18</option>
						<option value="19">19</option>
						<option value="20">20</option>
						<option value="21">21</option>
						<option value="22">22</option>
						<option value="23">23</option>
						<option value="24">24</option>
						<option value="25">25</option>
						<option value="26">26</option>
						<option value="27">27</option>
						<option value="28">28</option>
						<option value="29">29</option>
						<option value="30">30</option>
						<option value="31">31</option>
					</select>
				</td>
				<td>&nbsp&nbsp&nbsp&nbsp <span style="color:brown; font-weight: bold;font-size: 25px;">Place</span> &nbsp&nbsp&nbsp&nbsp</td>
				<td>
					<input type="tetx" name="place" id="place" style="width: 300px;height: 40px;border-radius: 10px" maxlength="50" required="">
				</td>
			</tr>
			<tr>
				<td colspan="6">
					<br>
					<span style="color:#051b2c; font-size:100px;" >Rs.<?php echo $cel[6]; ?></span> <center><button id="booked" type="submit" name="booked" value="Book" style="width: 50%;height: 50px;background-color: brown;font-size: 30px;"><span style="color: white;">BOOK NOW</span></button></center>
				</td>
			</tr>
		</table>
</div>


</body>
</html>