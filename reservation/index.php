<?php
session_start();
require_once "../db/ShoppingCart.php";

$user_id = $_SESSION['id'];
$cart_id = $_POST['cart_id'];
if (!isset($cart_id) || !isset($user_id)) {
    header("Location: /licenta/cart");
}

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <title></title>

    <link href="../style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <nav>
        <div class="logo">
            <h4>ZOOMIN</h4>
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="../poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="/licenta/login">Login</a></li>
            <li><img class="icon2" src="../poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="/licenta/">Home</a></li>
            <li><img class="icon2" src="../poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="/licenta/about">About us</a></li>
            <li><img class="icon2" src="../poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="/licenta/services">Services</a>
            <li><img class="icon2" src="../poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="/licenta/feedback">Feedback</a></li>
            <li><img class="icon2" src="../poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="/licenta/contact">Contact</a></li>
            <li><img class="icon2" src="../poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="/licenta/cart">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="../navigation.js"></script>



    <!--<section class="checkout">-->
    <section class="booking">

        <div class="containerbooking1">
            <form action="./submit_reservation.php" class="bookform" method="post">
                <h2 class="headingbook headingbook-yellow">Reservation Online</h2>

                <div class="form-field">
                    <p>Your name</p>
                    <input type="text" name="name" placeholder="Your name" />
                </div>
                <div class="form-field">
                    <p>Phone number</p>
                    <input type="text" name="phonenumb" placeholder="Phone number" />
                </div>
                <div class="form-field">
                    <p>Date</p>
                    <input name="shootdate" type="date" min="<?= date('Y-m-d') ?>" />
                </div>
                <div class="form-field">
                    <p>Time</p>
                    <input name="shoottime" type="time" />
                </div>
                <div class="form-field">
                    <p>How many people?</p>
                    <select name="people" id="#">
                        <option value="1">1 person</option>
                        <option value="2">2 people</option>
                        <option value="3">3 people</option>
                        <option value="4">4 people</option>
                    </select>
                </div>
                <div class="form-field">
                    <p>Pick your favourite location</p>
                    <select name="location" id="#">
                        <option value="Parcul central Cluj-Napoca">Parcul central Cluj-Napoca</option>
                        <option value="Parc Iulius Cluj-Napoca">Parc Iulius Cluj-Napoca</option>
                        <option value="Gradina Botanica Cluj-Napoca">Gradina Botanica Cluj-Napoca</option>
                        <option value="Castel Bontida">Castel Bontida</option>
                    </select>
                </div>
                <input type="hidden" name="cart_id" value="<?php echo $_POST['cart_id']; ?>">

                <!-- <button class="btnbook" name="submit">Submit</button>-->
                <input type="submit" name="submit" value="Send" />
            </form>
            <!--</button>
            </section>-->
        </div>
    </section>
</body>

</html>