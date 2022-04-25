<!DOCTYPE html>
<html lang="en">

<head>
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
                <form method="post">
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
                       
                        <div class="source" label ="source">
                            <label for="source"> <b>Source</b></label>
                            <select name="source">
                                <option value="thane">thane</option>
                                <option value="PANVEL">panvel</option>
                                <option value="VIDYAVIHAR">vidyavihar</option>
                                <option value="cst">cst</option>
                                <option value="mulund">mulund</option>
                                <option value="kalyan">kalyan</option>
                                <option value="vashi">vashi</option>
                                <option value="powai">powai</option>

                            </select>
                        </div>

                        <div class="destination" label ="destination">
                            <label for="destination"> <b>Destination</b></label>
                            <select name="destination">
                            
                                <option value="panvel">panvel</option>
                                <option value="thane">thane</option>
                                <option value="vidyavihar">vidyavihar</option>
                                <option value="cst">cst</option>
                                <option value="mulund">mulund</option>
                                <option value="kalyan">kalyan</option>
                                <option value="vashi">vashi</option>
                                <option value="powai">powai</option>

                            </select>
                        </div>

                        <button type="submit">Book Ticket</button>
                        
                    </div>

                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>