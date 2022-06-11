<?php
require_once "../db/ShoppingCart.php";
require_once "../db/Conectare.php";
require_once "../db/Reservations.php";

session_start();

if (isset($_POST['cart_id'])) {

    // preluam datele de pe formular

    $name = htmlentities($_POST['name'], ENT_QUOTES);
    $phonenumb = htmlentities($_POST['phonenumb'], ENT_QUOTES);
    $shootdate = date(htmlentities($_POST['shootdate'], ENT_QUOTES));
    $shoottime = date(htmlentities($_POST['shoottime'], ENT_QUOTES));
    $people = htmlentities($_POST['people'], ENT_QUOTES);
    $location = htmlentities($_POST['location'], ENT_QUOTES);
    $cart_id = $_POST['cart_id'];

    // // verificam daca sunt completate
    if ($name == '' || $phonenumb == '' || $shootdate == '' || $shoottime == '' || $people == '' || $location == '') {

        $error = 'ERROR: Campuri goale!';
    } else {

        $reservationsDb = new Reservation();

        $reservationsDb->addReservation($cart_id, $name, $phonenumb, $shootdate, $shoottime, $people, $location);

        $shoppingCart = new ShoppingCart();
        $shoppingCart->deleteCartItem($cart_id);

        $mysqli->close();
        header("Location: /licenta");
    }
} else {
    header("Location: /licenta");
}
