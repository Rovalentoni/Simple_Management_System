<?php
function readDrivers()
{
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/drivers.json'), true);
}

function originalDrivers()
{
    $currentDrivers = readDrivers();
    if (empty($currentDrivers)) {
        $backup = [
            ["id" => "0", "username" => "Cleitin do guincho", "age" => "33", "type" => "white", "cnh" => "45738324", "sex" => "Masculino"]
        ];
        file_put_contents(INCLUDE_PATH . '/Data/drivers.json', json_encode($backup));
    }
}

function create_Driver($param)
{
    foreach ($param as $key => $value) {
        if (empty($value)) {
            header('Location:/?f=driversCreatePage&blank=true');
        } else if (strlen($value) < 3) {
            header('Location:/?f=driversCreatePage&strlen=true');
        } else {
            $currentDrivers = readDrivers();
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

function delete_Driver($param)
{
    $currentDrivers = readDrivers();
        foreach($currentDrivers as $key => $value) {
            if ($value['id'] == $param['userid']) {
                unset($currentDrivers[$key]);
                    file_put_contents(INCLUDE_PATH . '/Data/drivers.json', json_encode($currentDrivers));
                    header('Location:/?f=driversHomePage&delete=true');
            }
        }
}

function edit_Driver($param)
{
    $currentDrivers = readDrivers();
        foreach($currentDrivers as $key => $value){
            if ($value['id'] == $param['userid'] && !empty($_POST['username']) && !empty($_POST['age']) && !empty($_POST['type'])
            && !empty($_POST['cnh']) && !empty($_POST['sex'])) {
                $value['username'] = $_POST['username'];
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
