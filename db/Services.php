<?php

require_once "DBController.php";

class Services extends DBController
{

    function get_all_services()
    {
        $query = "SELECT * FROM services";

        return $this->getDBResult($query);
    }

    function get_service_by_id($id)
    {
        $query = "SELECT * FROM services WHERE id=?";

        $params = array(
            array("param_type" => "i", "param_value" => $id),
        );
        return $this->getDBResult($query, $params);
    }
}
