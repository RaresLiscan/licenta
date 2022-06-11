<?php
session_start();
require_once "../db/DBController.php";
require_once "../db/ShoppingCart.php";

$name_error = "";
$phone_error = "";
$date_error = "";
$time_error = "";
$user_id = $_SESSION['id'];
$cart_id = $_POST['cart_id'];
$form_valid = true;

function get_field_value_if_set($field)
{
    if (isset($_POST[$field]) && strlen($_POST[$field]) > 0)
        return 'value="' . $_POST[$field] . '"';
}

function check_select_default_value($field, $fieldValue)
{
    if (isset($_POST[$field]) && $fieldValue == $_POST[$field])
        return 'selected="selected"';
}

if (!isset($cart_id) || !isset($user_id)) {
    header("Location: /licenta/cart");
} else if (isset($_POST['reservation_submitted'])) {
    if (!isset($_POST['name']) || strlen($_POST['name']) == 0) {
        $name_error = "You have to complete this field!";
        $form_valid = false;
    }
    if (!isset($_POST['phonenumb']) || strlen($_POST['phonenumb']) == 0 || !preg_match('/^[0-9]{10}+$/', $_POST['phonenumb'])) {
        $phone_error = "You have to enter a valid phone number!";
        $form_valid = false;
    }
    if (!isset($_POST['shootdate']) || strlen($_POST['shootdate']) == 0) {
        $date_error = "You have to enter a valid date!";
        $form_valid = false;
    }
    if (!isset($_POST['shoottime']) || strlen($_POST['shoottime']) == 0) {
        $time_error = "You have to enter a valid time!";
        $form_valid = false;
    }

    if ($form_valid) {
        require_once "./submit_reservation.php";
        submit_reservation($_POST);
    }
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
            <img src="../poze/icon.png" />
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

    <section class="booking">

        <div class="containerbooking1">
            <form action="#" class="bookform" method="post" id="reservationForm">
                <h2 class="headingbook headingbook-yellow">Reservation Online</h2>

                <div class="form-field">
                    <p>Your name</p>
                    <div>
                        <input type="text" name="name" placeholder="Your name" <?php echo get_field_value_if_set("name") ?> />
                        <?php echo '<p class="error">' . $name_error . '</p>' ?>
                    </div>

                </div>
                <div class="form-field">
                    <p>Phone number</p>
                    <div>
                        <input type="text" name="phonenumb" placeholder="Phone number" <?php echo get_field_value_if_set("phonenumb") ?> />
                        <?php echo '<p class="error">' . $phone_error . '</p>' ?>
                    </div>
                </div>
                <div class="form-field">
                    <p>Date</p>
                    <div>
                        <input name="shootdate" type="date" min="<?= date('Y-m-d') ?>" <?php echo get_field_value_if_set("shootdate") ?> />
                        <?php echo '<p class="error">' . $date_error . '</p>' ?>
                    </div>
                </div>
                <div class="form-field">
                    <p>Time</p>
                    <div>
                        <input name="shoottime" type="time" <?php echo get_field_value_if_set("shoottime") ?> />
                        <?php echo '<p class="error">' . $date_error . '</p>' ?>
                    </div>
                </div>
                <div class="form-field">
                    <p>How many people?</p>
                    <select name="people" id="#">
                        <option value="1" <?php echo check_select_default_value("people", "1"); ?>>1 person</option>
                        <option value="2" <?php echo check_select_default_value("people", "2"); ?>>2 people</option>
                        <option value="3" <?php echo check_select_default_value("people", "3"); ?>>3 people</option>
                        <option value="4" <?php echo check_select_default_value("people", "4"); ?>>4 people</option>
                    </select>
                </div>
                <div class="form-field">
                    <p>Pick your favourite location</p>
                    <select name="location" id="#" selected=<?php echo get_field_value_if_set("location") ?>>
                        <option value="Parcul central Cluj-Napoca" <?php echo check_select_default_value("location", "Parcul central Cluj-Napoca"); ?>>
                            Parcul central Cluj-Napoca
                        </option>
                        <option value="Parc Iulius Cluj-Napoca" <?php echo check_select_default_value("location", "Parc Iulius Cluj-Napoca"); ?>>
                            Parc Iulius Cluj-Napoca
                        </option>
                        <option value="Gradina Botanica Cluj-Napoca" <?php echo check_select_default_value("location", "Gradina Botanica Cluj-Napoca"); ?>>
                            Gradina Botanica Cluj-Napoca
                        </option>
                        <option value="Castel Bontida" <?php echo check_select_default_value("location", "Castel Bontida"); ?>>
                            Castel Bontida
                        </option>
                    </select>
                </div>
                <input type="hidden" name="cart_id" value="<?php echo isset($_POST['cart_id']) ? $_POST['cart_id'] : ""; ?>">
                <input type="hidden" name="reservation_submitted" value="submitted">
                <input type="submit" name="submit" value="Send" />
            </form>
        </div>
    </section>
</body>

</html>