﻿<?php

session_start();
session_destroy();

?>

<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <title>Login</title>
    <link rel="stylesheet" href="../style.css" />
</head>

<body class="loginbody">
    <!--menu bar-->
    <nav>
        <div class="logo">
            <img src="../poze/icon.png" />
        </div>
        <ul class="nav-links">
            <li><img class="icon2" src="../poze\login.png" alt="login icon" style="width:25px; height:25px;" /><a href="/licenta/login"><?php echo isset($_SESSION['loggedin']) ? "Logout" : "Login"; ?></a>
            </li>
            <li><img class="icon2" src="../poze\home.png" alt="home icon" style="width:25px; height:25px;" /><a href="/licenta/">Home</a>
            </li>
            <li><img class="icon2" src="../poze\about.png" alt="about us icon" style="width:25px; height:25px;" /><a href="/licenta/about">About us</a>
            </li>
            <li><img class="icon2" src="../poze\camera.png" alt="services icon" style="width:25px; height:25px;" /><a href="/licenta/services">Services</a>
            </li>
            <li><img class="icon2" src="../poze\feedback.png" alt="feedback icon" style="width:25px; height:25px;" /><a href="/licenta/feedback">Feedback</a>
            </li>
            <li><img class="icon2" src="../poze\contact.png" alt="contact icon" style="width:25px; height:25px;" /><a href="/licenta/contact">Contact</a>
            </li>
            <li><img class="icon2" src="../poze\cart.png" alt="cart icon" style="width:25px; height:25px;" /><a href="/licenta/cart">Cosul meu</a>
            </li>
        </ul>
        <div class="burger">
            <!--aici se afla cele 3 liniute care apar pe marginea din dreapta la varianta mobile-->
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
    </nav>
    <script src="../navigation.js"></script>
    <!--login section-->
    <section class="loginsection">
        <div class="container1">
            <form action="Login.php" class="login active" method="post" autocomplete="off">
                <h2 class="titlu">Login with your account</h2>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" name="username" id="username" placeholder="Username" />
                        <i>
                            <img src="../poze/user-img.png" width="15px" /></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" pattern=".{8,}" id="password" placeholder="Your password" />
                        <i><img src="../poze/lock-img.png" width="15px" /></i>
                    </div>
                    <span class="help-text">At least 8 characters</span>
                </div>
                <input type="submit" class="btn-submit" />Login
                <a href="#" class="login-buttons">Forgot password?</a>
                <p>
                    I don't have an account.<a href="#" onclick="switchForm('register',event)" class="login-buttons">Register</a>
                </p>
            </form>

            <form action="Registration.php" class="register" method="post" autocomplete="off">
                <h2 class="titlu">Register your account</h2>
                <div class="form-group">
                    <label for="username">Username</label>
                    <div class="input-group">
                        <input type="text" id="username" name="username" placeholder="Username" />
                        <i><img src="../poze/user-img.png" width="15px" /></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Email adress" />
                        <i><img src="../poze/mail-icon.png" width="15px" /></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="input-group">
                        <input type="password" name="password" pattern=".{8,}" id="password" placeholder="Your password" />
                        <i><img src="../poze/lock-img.png" width="15px" /></i>
                    </div>
                    <span class="help-text">At least 8 characters</span>
                </div>
                <input type="submit" class="btn-submit" />Register
                <p>
                    I already have an account.<a class="login-buttons" href="#" onclick="switchForm('login',event)">Login</a>
                </p>
            </form>
        </div>
    </section>
    <script src="login.js"></script>
</body>

</html>