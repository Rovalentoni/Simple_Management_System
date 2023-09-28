<?php

class DriversService

//--------- DB Connection -------------//

{

    public $mysqli;

    function __construct()
    {
        include_once(INCLUDE_PATH . '/Core/connection.php');
        $this->mysqli = new Cnn([
            'host' => 'localhost',
            'username' => 'root',
            'password' => 3005,
            'database' => 'test',
            'port' => 3306
        ]);
    }


    //--------- Read -------------//

    public function readDrivers()
    {
        $readQuery = "SELECT * FROM drivers.drivers_table";
        return $this->mysqli->givenQuery($readQuery);
    }

    //--------- Create -------------//

    public function create_Driver($param)
    {
        $createQuery = "INSERT INTO drivers.drivers_table (drivers_username, drivers_age, drivers_type, drivers_cnh, drivers_sex) VALUES ('" . $param['drivers_username'] . "','" .
            $param['drivers_age'] . "','" . $param['drivers_type'] . "','" . $param['drivers_cnh'] . "','" . $param['drivers_sex'] . "')";
        if (empty($param['drivers_username']) || empty($param['drivers_age']) || empty($param['drivers_type']) || empty($param['drivers_cnh']) || empty($param['drivers_sex'])) {
            return false;
        } else
            $this->mysqli->givenQuery($createQuery);
        return true;
    }

    //--------- Delete -------------//


    public function delete_Driver($param)
    {
        $deleteQuery = "DELETE FROM drivers.drivers_table WHERE (drivers_id = '" . $param['driverid'] . "');";
        $this->mysqli->givenQuery($deleteQuery);
        return true;
    }

    //--------- Edit -------------//


    public function edit_Driver($param, $paramGet)
    {

        $editQuery = "UPDATE drivers.drivers_table SET drivers_username = '" . $param['drivers_username'] . "', drivers_age = '" . $param['drivers_age'] . "', drivers_type = '" .
            $param['drivers_type'] . "', drivers_cnh = '" . $param['drivers_cnh'] . "', drivers_sex = '" . $param['drivers_sex'] . "' WHERE ( drivers_id = '" . $paramGet['driverid'] . "');";

        if (empty($param['drivers_username']) || empty($param['drivers_age']) || empty($param['drivers_type']) || empty($param['drivers_cnh']) || empty($param['drivers_sex'])) {

            return false;
        } else
            $this->mysqli->givenQuery($editQuery);
                 return true;
    }
}