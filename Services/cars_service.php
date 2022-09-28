<?php
class CarsService
{
    public $mysqli;

        function __construct()
        {
            include_once (INCLUDE_PATH . '/Core/connection.php');
            $this->mysqli = new Cnn ([
                'host' => 'localhost',
                'username' => 'root',
                'password' => 3005,
                'database' => 'test',
                'port' => 3306
            ]);
        }
    public function readCars()
    {
        return json_decode(file_get_contents(INCLUDE_PATH . '/Data/cars.json'), true);
    }



    public function create_Car($param)
    {

        $currentCars = $this->readCars();

        if (
            empty($param['placa']) || empty($param['marca']) || empty($param['modelo'])
            || empty($param['tipo']) || empty($param['ano']) || empty($param['cor'])
        ) {
            header('Location:/?f=carsCreatePage&blank=true');
        } else if (
            strlen($param['placa'])  < 4 || strlen($param['marca']) < 4 || strlen($param['modelo']) < 4
            || strlen($param['tipo'])  < 4 || strlen($param['ano']) < 4 || strlen($param['cor']) < 4
        ) {
            header('Location:/?f=carsCreatePage&strlen=true');
        } else {

            $currentCars = $this->readCars();
            $currentCars[] = $_POST;
            foreach ($currentCars as $key => $value) {
                $value['id'] = $key;
                $currentCars[$key] = $value;
            };
            file_put_contents(INCLUDE_PATH . '/Data/cars.json', json_encode($currentCars));
            header('Location:/?f=carsHomePage&cadastro=1');
        }
    }



    public function delete_Car($param)
    {

        $currentCars = $this->readCars();
        foreach ($currentCars as $key => $value) {
            if ($value['id'] == $param['carId']) {
                unset($currentCars[$key]);
                file_put_contents(INCLUDE_PATH . '/Data/cars.json', json_encode($currentCars));
                header('Location:/?f=carsHomePage&delete=true');
            }
        }
    }

    public function edit_Car($param_GET, $param_POST)
    {

        $currentCars = $this->readCars();
        foreach ($currentCars as $key => $value) {
            if (
                $param_GET['carId'] == $value['id'] && !empty($param_POST['placa'])  && !empty($param_POST['marca']) && !empty($param_POST['modelo'])
                && !empty($param_POST['tipo']) && !empty($param_POST['ano']) && !empty($param_POST['ano'])
            ) {
                $value['placa'] = $param_POST['placa'];
                $value['marca'] = $param_POST['marca'];
                $value['modelo'] = $param_POST['modelo'];
                $value['tipo'] = $param_POST['tipo'];
                $value['ano'] = $param_POST['ano'];
                $value['cor'] = $param_POST['cor'];
                $currentCars[$key] = $value;
                file_put_contents(INCLUDE_PATH . '/Data/cars.json', json_encode($currentCars));
                header('Location:/?f=carsHomePage&edit=true');
            } else {
                header('Location:/?f=carsHomePage&blank=true');
            }
        }
    }
}
