<?php 
class SessionService {


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

public function login ($param,$users) {
   
    
    foreach($users as $key => $value) {
        if ($param['users_email'] == $value['users_email'] && $param['users_password'] == $value['users_password']){
                $_SESSION['login'] = true;
                header('Location:/?f=mainHome');
                $_SESSION['username'] = $value['users_username'];
                $_SESSION['id'] = $value['users_id'];
            }
            
}

header('Location:/?f=loginForm&try=1'); die;

}

public function logout_User() {
    unset($_SESSION['login']);
    header('Location:/?f=loginForm');
}

}