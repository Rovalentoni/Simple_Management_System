<?php 

function login ($param) {
    $users = readUsers();
    
    foreach($users as $key => $value) {
        if ($_POST['email'] == $value['email'] && $_POST['password'] == $value['password']){
                $_SESSION['login'] = true;
                header('Location:/?f=mainHome');
                $_SESSION['username'] = $value['username'];
                $_SESSION['id'] = $value['id'];
            }
            
    
}
include_once INCLUDE_PATH . '/Services/user_service.php';
include_once INCLUDE_PATH . '/Services/cars_service.php';
include_once INCLUDE_PATH . '/Services/drivers_service.php';
OriginalDrivers();
originalCars();
originalUsers();
header('Location:/?f=loginForm&try=1'); die;

}

function logout_User() {
    unset($_SESSION['login']);
    header('Location:/?f=loginForm');
}