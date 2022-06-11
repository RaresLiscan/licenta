<?php

require_once "../db/Services.php";
require_once "../db/ShoppingCart.php";
require_once "../db/Reservations.php";

function get_service_by_id($services, $id)
{
    for ($i = 0; $i < count($services); $i++) {
        if ($services[$i]["id"] == $id) {
            return $services[$i];
        }
    }
    return null;
}


if (isset($_GET['date'])) {

    $services_db = new Services();
    $shopping_cart_db = new ShoppingCart();
    $reservations_db = new Reservation();

    $services = $services_db->get_all_services();

    $reservation_entries = $reservations_db->getAllReservations();

    $occupied_times = array();
    for ($i = 0; $i < count($reservation_entries); $i++) {
        if (strcmp($reservation_entries[$i]["shootdate"], $_GET['date']) == 0) {

            $shoot_time = $reservation_entries[$i]['shoottime'];
            $cart_item = $shopping_cart_db->getItemById((int)$reservation_entries[$i]['order_id']);
            if (isset($cart_item)) {
                $cart_item = $cart_item[0];
            } else {
                continue;
            }
            if (!isset($shoot_time) || !isset($cart_item)) {
                continue;
            }
            $service = get_service_by_id($services, $cart_item['service_id']);
            if (isset($service)) {
                $duration = (int) $service['timeph'] * (int) $cart_item['quantity'];

                $occupied_time = array("start_time" => $shoot_time);
                $hours = explode(':', $shoot_time)[0];
                $minutes = explode(':', $shoot_time)[1];

                $minutes += ($duration % 60);
                $hours += intdiv($minutes, 60);
                $minutes = intdiv($minutes, 60);
                $hours += intdiv($duration, 60);

                if ($hours >= 24) {
                    $minutes = '59';
                    $hours = '23';
                }

                $occupied_time += ["end_time" => ($hours . ":" . $minutes)];

                $occupied_times[] = $occupied_time;
            }
        }
    }

    echo json_encode($occupied_times);
}
