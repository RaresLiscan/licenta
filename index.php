<?php

session_start();

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="./poze/icon.png" />
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="login/"><?php echo isset($_SESSION['loggedin']) ? "Logout" : "Login"; ?></a>
            </li>
            <li><img class="icon2" src="poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="">Home</a>
            </li>
            <li><img class="icon2" src="poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="about">About us</a>
            </li>
            <li><img class="icon2" src="poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="services">Services</a>
            </li>
            <li><img class="icon2" src="poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="feedback">Feedback</a>
            </li>
            <li><img class="icon2" src="poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="contact">Contact</a>
            </li>
            <li><img class="icon2" src="poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="cart">Cosul meu</a>
            </li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="navigation.js"></script>
    <!--home section-->
    <div class="split left">
        <div class="centered">
            <h1>SAY CHEESE!</h1><img class="smilephoto" src="poze\smile1.png" alt="smile image" />
            <img class="cameraphoto" src="poze\cameraph.png" alt="camera image" />
        </div>
    </div>
    <div class="split right">
        <div class="centered">
            <h1 class="big-title"></br>Welcome to our photography page!<br />
                We hope you enjoy it!</h1>
            <h4 class="texthome">Ești pentru prima dată aici?
                <br />Dacă da, dă-ne voie să ne prezentăm.<br />Ne numin ZOOMIN și suntem aici pentru a surprinde cele mai importante momente din viața ta!
                <br />Da..știm, sunt atâtea alte firme care îți promit asta.<br />Cu ce suntem noi mai deosebiți?
                <br />Te lăsăm să te convingi singur!
            </h4>
            <div class="homelogin">
                <input type="button" value="Login" class="butonhome" onclick="location.href='/licenta/login';" />
            </div>
        </div>
</body>

</html>
</div>
</body>

</html>