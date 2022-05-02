<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="form.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <script src="animation.js"></script>
    <header class="navbar">
        <img src="images/logo.png" alt="">
        <a href="home.html">
            <h1>MUMBAI&nbsp;METRO</h1>
        </a>
        <ul>
            <li><a href="homepage.html">Home</a></li>
            <li><a href="selection.html">Book Ticket</a></li>
            <li><a href="">Contact Us</a></li>
            <li><a href="">About Us</a></li>
        </ul>
    </header>
    <section class="main-content">
        <div class=banner>
            <img src="images/formbanner.jpg" alt="banner pic">
            <div class="info-form">
                <h2>SMART CARD TICKET BOOKING</h2>
                <form method="post" action="ticket_smartcard.php">
                    <div class="container">
                        <p>First Name</p>
                        <span class="ticket-detail middle-from">Sanyukta</span>
                        <p>Last Name</p>
                        <span class="ticket-detail middle-from">Joshi</span>
                        <p>Journies left</p>
                        <span class="ticket-detail middle-from"><?php echo $row[8];?></span>
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
                        
                        <button type="submit">Book ticket!</button>
                        
                    </div>

                    </div>
                </form>
            </div>
        </div>

    </section>
</body>

</html>