<?php

require_once "DBController.php";

class Reservation extends DBController
{

    function getAllReservations()
    {
        $query = "SELECT * FROM reservations";

        return $this->getDBResult($query);
    }

    function addReservation($order_id, $name, $phoneNumber, $shootDate, $shootTime, $people, $location)
    {

        $query = "INSERT INTO reservations (order_id, name, phonenumb, shootdate, shoottime, people, location)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $params = array(
            array("param_type" => "i", "param_value" => $order_id),
            array("param_type" => "s", "param_value" => $name),
            array("param_type" => "s", "param_value" => $phoneNumber),
            array("param_type" => "s", "param_value" => $shootDate),
            array("param_type" => "s", "param_value" => $shootTime),
            array("param_type" => "i", "param_value" => $people),
            array("param_type" => "s", "param_value" => $location),
        );

        $this->updateDB($query, $params);
    }
}
