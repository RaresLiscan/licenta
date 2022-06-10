<?php
include("Conectare.php");
$error = '';
if (isset($_POST['submit'])) {
    // preluam datele de pe formular
    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $email = htmlentities($_POST['email'], ENT_QUOTES);
    $phone = htmlentities($_POST['phone'], ENT_QUOTES);
    $message = htmlentities($_POST['message'], ENT_QUOTES);

    // verificam daca sunt completate
    if ($name == '' || $email == '' || $phone == '' || $message == '') {

        $error = 'ERROR: Campuri goale!';
    } else {

        if ($stmt = $mysqli->prepare("INSERT into messages (name, email, phone, message) VALUES (?, ?, ?, ?)")) {
            $stmt->bind_param("ssss", $name, $email, $phone, $message);
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
    <title>Contact</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="poze/icon.png" />
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="Login.html">Login</a></li>
            <li><img class="icon2" src="poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="Licenta.html">Home</a></li>
            <li><img class="icon2" src="poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="AboutUs.php">About us</a></li>
            <li><img class="icon2" src="poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="Services.php">Services</a>
            <li><img class="icon2" src="poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="Feedback.php">Feedback</a></li>
            <li><img class="icon2" src="poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="Contact.php">Contact</a></li>
            <li><img class="icon2" src="poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="Cos.php">Cosul meu</a></li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="navigation.js"></script>

    <!--Contact-->
    <div class="contact">
        <span class="big-circle"></span>
        <div class="form">
            <div class="contact-info">
                <h3 class="title">Let's get in touch</h3>
                <p class="text">
                    GHgdhwwhfnchmnsdaamgotfiksejmalihfjkn
                    ackjiwhhdenvhvdhvfzfgsehijdkjdda ,asdjdaf
                </p>
                <div class="info">
                    <div class="information">
                        <img src="poze/map-icon.png" class="icon-contactpage" alt="contact icon" />
                        <p>Bul. Muncii, Cluj Napoca</p>
                    </div>
                    <div class="information">
                        <img src="poze/mail-icon.png" class="icon-contactpage" alt="contact icon" />
                        <p>zoomin@gmail.com</p>
                    </div>
                    <div class="information">
                        <img src="poze/phone-icon.png" class="icon-contactpage" alt="contact icon" />
                        <p>+40714 837 290</p>
                    </div>
                </div>
                <p>Connect with us</p>
                <div class="social-media">

                    <div class="social-icons">

                        <a href="#" class="social-links">
                            <img src="poze/facebook-icon.png" class="socials-contactpage" alt="contact icon" width="35px" />

                        </a>
                        <a href="#" class="social-links">
                            <img src="poze/instagram-icon.png" class="socials-contactpage" alt="contact icon" width="35px" />

                        </a>
                        <a href="#" class="social-links">
                            <img src="poze/twitter-icon.png" class="socials-contactpage" alt="contact icon" width="40px" />

                        </a>
                        <a href="#" class="social-links">
                            <img src="poze/linked-icon.png" class="socials-contactpage" alt="contact icon" width="70px" />

                        </a>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <span class="circle one"></span>
                <span class="circle two"></span>
                <form action="#" method="post">
                    <h3 class="title">Contact us</h3>
                    <div class="input-contact">
                        <input type="text" name="name" class="input" />
                        <label for="">Username</label>
                        <span>Username</span>
                    </div>
                    <div class="input-contact">
                        <input type="email" name="email" class="input" />
                        <label for="">Email</label>
                        <span>Email</span>
                    </div>
                    <div class="input-contact">
                        <input type="tel" name="phone" class="input" />
                        <label for="">Phone</label>
                        <span>Phone</span>
                    </div>
                    <div class="input-contact textarea focus">
                        <textarea name="message" class="input"></textarea>
                        <label for="">Message</label>
                        <span>Message</span>
                    </div>
                    <input type="submit" name="submit" value="Send" class="btn" />
                </form>
            </div>
        </div>
    </div>
    <script src="app.js"></script>
</body>

</html>