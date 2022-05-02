<!DOCTYPE html>
<html lang="en">

<head>
<script src="animation.js"></script>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="form.css">
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
            $password = $_POST["password"];

            $in_ch = mysqli_query($conn,"INSERT INTO `metro_station`.`smart_card`
            (`Password`, `AADHAR_NO`, `F_NAME`, `L_NAME`, `AGE`, `GENDER`, `JOURNIES_LEFT`) 
            VALUES ('$password', '$aadhar_num', '$f_name', '$l_name', '$age', '$gender', 30)");

            
        }
    ?>




</head>

<body>
    <header class="navbar">
        <img src="images/logo.png" alt="">
        <a href="homepage.php">
            <h1>MUMBAI&nbsp;METRO</h1>
        </a>
        <ul>
            <li><a href="homepage.php">Home</a></li>
            <li><a href="selection.html">Book Ticket</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">About Us</a></li>
        </ul>
    </header>
    <section class="main-content">
        <div class=banner>
            <img src="images/formbanner.jpg" alt="banner pic">
            <div class="info-form">
                <h2></h2>
                <form method="post" action="selection.html">
                    <div class="container">

                        <label for="aadhar"><b>Aadhar No.</b></label>
                        <input type="text" placeholder="Enter valid Aadhar Num" name="aadhar" required>

                        <label for="fname"><b>First Name</b></label>
                        <input type="text" placeholder="Enter First Name" name="fname" required>

                        <label for="lname"><b>Last Name</b></label>
                        <input type="text" placeholder="Enter Last Name" name="lname" required>

                        <label for="age"><b>Age</b></label>
                        <input type="number" placeholder="Age" name="age" id="age" required>

                        <div class="gender" label ="gender">
                            <label for="gender"> <b>Gender</b></label>
                            <select name="gender">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">other</option>
                            </select>
                        </div>
                        
                        <label for="password"><b>Set Password</b></label>
                        <input type="password" placeholder="Enter Password" name="password" required>

                        <button type="submit">Register</button>
                        
                    </div>

                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>