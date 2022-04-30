<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>


    <?php
    session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "metro_station";

        $conn = mysqli_connect($servername,$username,$password,$dbname);

        if ($_SERVER['REQUEST_METHOD'] == 'POST'){     

            $_SESSION['scid'] = $_POST["scid"];
            $_SESSION['password'] = $_POST["password"];
            
            $in_ch1 = mysqli_query($conn, "SELECT * FROM SMART_CARD WHERE SMART_CARD_ID='$scid' and PASSWORD='$password' ");
            
            $row = mysqli_fetch_array($in_ch1,MYSQLI_NUM);

        }
        ?>






</head>

<body>
    <header class="navbar">
        <img src="images/logo.png" alt="">
        <a href="home.html">
            <h1>MUMBAI&nbsp;METRO</h1>
        </a>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="">About Us</a></li>
            <li><a href="">Book Ticket</a></li>
            <li><a href="">Login</a></li>
        </ul>
    </header>
    <section class="main-content">
        <div class=banner>
            <img src="images/formbanner.jpg" alt="banner pic">
            <div class="info-form">
                <h2></h2>
                <form method="post" action="smart_card_booking.php">
                    <div class="container">

                        <label for="scid"><b>Smart Card ID</b></label>
                        <input type="text" placeholder="Enter Smart Card ID" name="scid" required>

                        <label for="password"><b>Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>
                        
                        <button type="submit">Continue</button>
                        
                    </div>

                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>