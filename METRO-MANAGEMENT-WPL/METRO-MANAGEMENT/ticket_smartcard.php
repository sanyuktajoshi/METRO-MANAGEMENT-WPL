<?php session_start();

		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "metro_station";

		$conn = mysqli_connect($servername,$username,$password,$dbname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 

			if(isset($_SESSION['session_scid'])){
				$scid2 = $_SESSION['session_scid'];
				$pd2 = $_SESSION['session_password'];
			}
			else{
				echo "not working";
			}
			

            $in_ch1 = mysqli_query($conn, "SELECT * FROM SMART_CARD WHERE SMART_CARD_ID='$scid2' and PASSWORD='$pd2' ");
            
            $row = mysqli_fetch_array($in_ch1,MYSQLI_NUM);
            $aadhar_num = $row[2];
            $f_name = $row[3];
            $l_name = $row[4];
            $age = $row[5];
            $gender = $row[6];
            $source = $_POST["source"];
            $destination = $_POST["destination"];

            $in_ch = mysqli_query($conn,"INSERT INTO `metro_station`.`general`(aadhar_no, f_name, l_name, age, gender) 
            VALUES('$aadhar_num','$f_name','$l_name','$age','$gender')");

            $in_ch1 = mysqli_query($conn, "SELECT METRO_ID FROM METRO WHERE SOURCE='$source' and destination='$destination' ");
            
            $row1 = mysqli_fetch_array($in_ch1,MYSQLI_NUM);

            $temp_id = $row1[0];


            $in_ch_ticketid = mysqli_query($conn, "SELECT MAX(TICKET_ID) FROM TRAVELS_IN");
            $row_ticket = mysqli_fetch_array($in_ch_ticketid,MYSQLI_NUM); 
			$temp_ticketid = $row_ticket[0];
            
            $in_ch2 = mysqli_query($conn,"INSERT INTO `metro_station`.`travels_in`(aadhar_no, metro_id) 
            VALUES('$aadhar_num','$temp_id')");

            $in_ch2 = mysqli_query($conn,"UPDATE SEATS SET AVAILABLE = AVAILABLE - 1 WHERE METRO_ID = $temp_id and AVAILABLE > 0");

            $in_ch2 = mysqli_query($conn,"UPDATE SMART_CARD SET JOURNIES_LEFT = JOURNIES_LEFT - 1 WHERE SMART_CARD_ID = $row[0] and JOURNIES_LEFT > 0");


        }
        ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="ticket.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    
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
					<span class="ticket-label middle-from">Source</span>
					<span class="ticket-label middle-valid">Ticket No.</span>
					<span class="ticket-label middle-price">Time</span>
				</div>
				<div class="middle-row middle-3-3">
					<span class="ticket-detail middle-from"><?php echo $source;?></span>
					<span class="ticket-detail middle-valid"><?php echo $temp_ticketid;?></span>
					<span class="ticket-detail middle-price">11:30 am</span>
				</div>
				<div class="middle-row middle-4">
					<span class="ticket-label middle-to">Destination</span>
					<span class="ticket-label middle-route">Name</span>
					<span class="ticket-label middle-validity">Gender</span>
				</div>
				<div class="middle-row middle-4-4">
					<span class="ticket-detail middle-to"><?php echo $destination;?></span>
					<span class="ticket-detail-small middle-route"><?php echo $f_name;?></span>
					<span class="ticket-detail-small middle-validity"><?php echo $gender;?></span>
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