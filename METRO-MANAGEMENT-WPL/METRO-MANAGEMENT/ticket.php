<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="ticket.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <?php

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "metro_station";

        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){     

            $aadhar_num = $_POST["aadhar"];
            $f_name = $_POST["fname"];
            $l_name = $_POST["lname"];
            $age = $_POST["age"];
            $gender = $_POST["gender"];
            $source = $_POST["source"];
            $destination = $_POST["destination"];

            $in_ch = mysqli_query($conn,"INSERT INTO `metro_station`.`general`(aadhar_no, f_name, l_name, age, gender) 
            VALUES('$aadhar_num','$f_name','$l_name','$age','$gender')");

            $in_ch1 = mysqli_query($conn, "SELECT METRO_ID FROM METRO WHERE SOURCE='$source' and destination='$destination' ");
            
            $row = mysqli_fetch_array($in_ch1,MYSQLI_NUM);

            $temp_id = $row[0];
            $in_ch2 = mysqli_query($conn,"INSERT INTO `metro_station`.`travels_in`(aadhar_no, metro_id) 
            VALUES('$aadhar_num','$temp_id')");

            $in_ch2 = mysqli_query($conn,"UPDATE SEATS SET AVAILABLE = AVAILABLE - 1 WHERE METRO_ID = $temp_id and AVAILABLE > 0");

        }
        ?>
</head>
<body>

	<div id="main">
		<div class="ticket-main">
			<div class="ticket-top">
				<h1>MUMBAI METRO<h1>
			</div>

			<div class="ticket-middle">

				<div class="middle-row middle-1">
					<span class="ticket-label 
				</div>
					<div class="middle-row middle-1-1">
					<span class="ticket-detail-
				</div>
				<div class="middle-row middle-2">
					<span class="middle-railcard-spacer"></span>
				</div>
				<div class="middle-row middle-2-2">
				</div>
				<div class="middle-row middle-3">
					<span class="ticket-label middle-from">From</span>
					<span class="ticket-label middle-valid">Ticket No.</span>
					<span class="ticket-label middle-price">Price</span>
				</div>
				<div class="middle-row middle-3-3">
					<span class="ticket-detail middle-from">Tamworth *</span>
					<span class="ticket-detail middle-valid">23&middot;MCH&middot;16</span>
					<span class="ticket-detail middle-price">£5.30X</span>
				</div>
				<div class="middle-row middle-4">
					<span class="ticket-label middle-to">To</span>
					<span class="ticket-label middle-route">Name</span>
					<span class="ticket-label middle-validity">Gender</span>
				</div>
				<div class="middle-row middle-4-4">
					<span class="ticket-detail middle-to">Birmingham Stns</span>
					<span class="ticket-detail-small middle-route">Any Permitted</span>
					<span class="ticket-detail-small middle-validity">On Date Shown</span>
				</div>
			</div>

			<div class="ticket-bottom">
				<div class="ticket-logo-2-container">
					<div class="ticket-logo"></div>
				</div>
			</div>
		</div>
	</div>

</body>
</html>