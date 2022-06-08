<?php
include(dirname(__DIR__) . "\db\Conectare.php");
$error = '';
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: Login.html');
    exit;
}
$id_user = $_SESSION['id'];
if (isset($_POST['submit'])) {
    // preluam datele de pe formular
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $phone = htmlentities($_POST['phone'], ENT_QUOTES);
    $servicename = htmlentities($_POST['servicename'], ENT_QUOTES);
    $feedback = htmlentities($_POST['feedback'], ENT_QUOTES);

    // verificam daca sunt completate
    if ($name == '' || $email == '' || $phone == '' || $servicename == '' || $feedback == '') {

        $error = 'ERROR: Campuri goale!';
    } else {

        if ($stmt = $mysqli->prepare("INSERT into feedbacks (name, email, phone, servicename, feedback) VALUES (?, ?, ?, ?, ?)")) {
            $stmt->bind_param("sssss", $name, $email, $phone, $servicename, $feedback);
            $stmt->execute();
            $stmt->close();
        } else {
            echo "ERROR: Nu se poate executa insert.";
        }
    }
}

$mysqli->close();
?>
<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body>
    <!--menu bar-->
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
    <!--Feedback section-->
    <section class="feedback">
        <div class="containerfb">
            <div class="feedbackInfo">
                <div>
                    <h2>Did you enjoy our services?</h2>
                    <p class="pfeedback">
                        dmmsssssssssssmsddddd dddddadssssssssssss ssssssssssssssssv aaadfwefed<br />
                        dmmsssssssssssmsddddddddddd<br />
                        dmmsssssssssssmsddddddddddd<br />
                        dmmsssssssssssmsddddddddddd<br />
                        dmmsssssssssssmsddddddddddd<br />
                        dmmsssssssssssmsddddddddddd<br />
                        dmmsssssssssssmsddddddddddd<br />
                    </p>
                </div>
            </div>
            <div class="feedbackForm">
                <h2>Let us know</h2>
                <!--<form action="#" method="post">-->
                <form class="formBox" action="#" method="post">
                    <div class="inputBox w1">
                        <input type="text" name="name" required />
                        <span> Full Name</span>
                    </div>
                    <div class="inputBox w1">
                        <input type="email" name="email" required />
                        <span> Email address</span>
                    </div>
                    <div class="inputBox w1">
                        <input type="text" name="phone" required />
                        <span> Phone number</span>
                    </div>
                    <div class="inputBox w1">
                        <select class="select" name="servicename" id="#">
                            <option value="1">Portrait Photography</option>
                            <option value="2">Couple Photography</option>
                            <option value="3">Engagement Photography</option>
                            <option value="4">Wedding Photography</option>
                            <option value="5">Newborn Photography</option>
                            <option value="6">Family Photography</option>
                            <option value="7">Event Photography</option>
                            <option value="8">Product Photography</option>
                            <option value="8">Pet Photography</option>
                        </select>
                    </div>
                    <div class="inputBox w2">
                        <textarea name="feedback" required></textarea>
                        <span> Write your message here</span>
                    </div>
                    <div class="inputBox w2">
                        <input type="submit" name="submit" value="Send" />
                    </div>
                </form>
                <!--</form>-->
            </div>
        </div>
    </section>
</body>

</html>