<?php 
class SessionService {

public function login ($param) {
    $user_Service = new UserService;
    $users = $user_Service->readUsers();
    
    foreach($users as $key => $value) {
        if ($param['email'] == $value['email'] && $param['password'] == $value['password']){
                $_SESSION['login'] = true;
                header('Location:/?f=mainHome');
                $_SESSION['username'] = $value['username'];
                $_SESSION['id'] = $value['id'];
            }
            
    
}

header('Location:/?f=loginForm&try=1'); die;

}

public function logout_User() {
    unset($_SESSION['login']);
    header('Location:/?f=loginForm');
}

}