<?php
class CarsService

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
            'database' => 'cars',
            'port' => 3306
        ]);
    }

    //--------- Read -------------//

    public function readCars()
    {
        $listCars = "SELECT * FROM cars_table;";
        $infoCars = $this->mysqli->givenQuery($listCars);
        return $infoCars;
    }

    //--------- Create -------------//

    public function create_Car($param)
    {

        if (
            empty($param['placa']) || empty($param['marca']) || empty($param['modelo'])
            || empty($param['tipo']) || empty($param['ano']) || empty($param['cor'])
        ) {
            return false;
        } else {
            $createCars = "INSERT INTO cars.cars_table (cars_plate, cars_manufacturer, cars_model, cars_type, cars_year, cars_color)
             VALUES ( '" . $param['placa'] . "','" . $param['marca'] . "', '" . $param['modelo'] . "','" . $param['tipo'] . "','" . $param['ano'] . "','" . $param['cor'] . "');";
            $this->mysqli->givenQuery($createCars);
            return true;
        }
    }

    //--------- Delete -------------//

    public function delete_Car($param)
    {
        $deleteQuery = "DELETE FROM cars.cars_table WHERE (cars_id = " . $param['carId'] . ");";
        print_r($deleteQuery);
        $this->mysqli->givenQuery($deleteQuery);
        return true;
    }


    //--------- Edit -------------//

    public function edit_Car($param_GET, $param_POST)
    {
        $editQuery = "UPDATE cars.cars_table SET cars_plate = '" . $param_POST['placa'] . "', cars_manufacturer = '" . $param_POST['marca'] . "', cars_model = '" . $param_POST['modelo'] .
            "', cars_type = '" . $param_POST['tipo'] . "', cars_year = '" . $param_POST['ano'] . "', cars_color = '" . $param_POST['cor'] . "' WHERE ( cars_id = '" . $param_GET['carId'] . "')";

        foreach ($param_POST as $key => $value) {
            if (empty($value)) {
                $condition = false;
            }
        }
        if (isset($condition)) {
            return false;
        } else
            $this->mysqli->givenQuery($editQuery);
        return true;
    }
}
