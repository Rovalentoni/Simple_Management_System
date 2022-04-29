<?php

function readUsers()
{
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/users.json'), true);
}
function readDrivers()
{
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/drivers.json'), true);
}
function readVehicles()
{
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/vehicles.json'), true);
}
function originalUsers()
{

    $currentUsers = readUsers();
    if (empty($currentUsers)) {
        $adminLogin = [
            ["username" => "Rodrigo", "email" => "Rodrigo@hotmail.com", "password" => "sourodrigo"]
        ];
        file_put_contents('./Data/users.json', json_encode($adminLogin));
    }
}
