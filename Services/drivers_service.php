<?php

class DriversService {

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


public function readDrivers()
{  
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/drivers.json'), true);
}


public function create_Driver($param)
{   
    
    foreach ($param as $key => $value) {
        if (empty($value)) {
            header('Location:/?f=driversCreatePage&blank=true');
        } else if (strlen($value) < 3) {
            header('Location:/?f=driversCreatePage&strlen=true');
        } else {
            $currentDrivers = $this->readDrivers();
            $currentDrivers[] = $_POST;
            foreach ($currentDrivers as $key => $value) {
                $value['id'] = $key;
                $currentDrivers[$key] = $value;
            }
        }
    }
    file_put_contents(INCLUDE_PATH . '/Data/drivers.json', json_encode($currentDrivers));
    header('Location:/?f=driversHomePage&create=true');
}

public function delete_Driver($param)
{   
    $currentDrivers = $this->readDrivers();
        foreach($currentDrivers as $key => $value) {
            if ($value['id'] == $param['driverid']) {
                unset($currentDrivers[$key]);
                    file_put_contents(INCLUDE_PATH . '/Data/drivers.json', json_encode($currentDrivers));
                    header('Location:/?f=driversHomePage&delete=true');
            }
        }
}

public function edit_Driver($param)
{   
    $currentDrivers = $this->readDrivers();
        foreach($currentDrivers as $key => $value){
            if ($value['id'] == $param['driverid'] && !empty($_POST['username']) && !empty($_POST['age']) && !empty($_POST['type'])
            && !empty($_POST['cnh']) && !empty($_POST['sex'])) {
                $value['users_username'] = $_POST['username'];
                $value['age'] = $_POST['age'];
                $value['type'] = $_POST['type'];
                $value['cnh'] = $_POST['cnh'];
                $value['sex'] = $_POST['sex'];
                    $currentDrivers[$key] = $value;
                        file_put_contents(INCLUDE_PATH . '/Data/drivers.json', json_encode($currentDrivers));
                            header('Location:/?f=driversHomePage&edit=true');
            } else {
                header('Location:/?f=driversHomePage&blank=true');
            }
        }
}

}