<?php

//Funções de Read:

function readUsers()
{
    return json_decode(file_get_contents(INCLUDE_PATH . '/Data/users.json'), true);
}



//Funções de backup

function originalUsers()
{
    $currentUsers = readUsers();
    if (empty($currentUsers)) {
        $adminLogin = [
            ["username" => "Rodrigo", "email" => "Rodrigo@hotmail.com", "password" => "sourodrigo", "id" => "0"]
        ];
        file_put_contents('./Data/users.json', json_encode($adminLogin));
    }
    if (is_array($currentUsers)) {
        foreach ($currentUsers as $key => $value) {
            if (empty($value)) {
                $adminLogin = [
                    ["username" => "Rodrigo", "email" => "Rodrigo@hotmail.com", "password" => "sourodrigo", "id" => "0"]
                ];
                file_put_contents('./Data/users.json', json_encode($adminLogin));
            }
        }
    }
}
originalUsers();

// Funções do Usuário: 

function create_User($param)
{
    if (empty($param['username']) || empty($param['password']) || empty($param['email'])) {
        include_once INCLUDE_PATH . '/Templates/Users/userCreatePage.php';
        echo "<div class='warning'>Os campos não podem ficar em branco</div>";
    } else if (strlen($param['username']) < 4 || strlen($param['password']) < 4 || strlen($param['email']) < 4) {
        include_once INCLUDE_PATH . '/Templates/Users/userCreatePage.php';
        echo "<div class='warning'>Os campos devem ter mais de 4 caracteres.</div>";
    } else {
        $currentUsers = readUsers();
        $currentUsers[] = $_POST;
        foreach ($currentUsers as $key => $value) {
            $value['id'] = $key;
            $currentUsers[$key] = $value;
        };
        file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
        header('Location:/?f=userHomePage&cadastro=1');
    }
}

function delete_User($param)
{
    $currentUsers = readUsers();
    foreach ($currentUsers as $key => $value) {
        if ($value['id'] == $param['userid']) {
            unset($currentUsers[$key]);
            file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
            header('Location:/?f=userHomePage&delete=1');
        }
    }
}

function edit_User($param)
{
    $currentUsers = readUsers();

    foreach ($currentUsers as $key => $value) {
        if ($value['id'] == $param['userid']) {
            if ($value['id'] == $_SESSION['id']) {
                $_SESSION['username'] = $_POST['username'];
            } else if ($value['id'] == $_SESSION['id'] && $value['username'] != $_SESSION['username']) {
                $_SESSION['username'] = $value['username'];
            }
        }
    }
    foreach ($currentUsers as $key => $value2) {
            if ($value2['id'] == $param['userid'] && !empty($_POST['username']) &&
            !empty($_POST['password']) && !empty($_POST['email'])) {
            $value2['username'] = $_POST['username'];
            $value2['password'] = $_POST['password'];
            $value2['email'] = $_POST['email'];
            $currentUsers[$key] = $value2;
            file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
            header('Location:/?f=userHomePage&editdone=true');
        } else header('Location:/?f=userHomePage&blank=1');

    }

}



function fixName()
{
    $currentUsers = readUsers();
    foreach ($currentUsers as $key => $value) {
        if (isset($_SESSION['id'])){
        if ($value['id'] == $_SESSION['id'] && $value['username'] != $_SESSION['username']) {
            $_SESSION['username'] = $value['username'];
        }}
    }
}
fixName();
