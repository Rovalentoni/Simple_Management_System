<?php 

function login ($param) {
    $users = readUsers();
    
    foreach($users as $key => $value) {
        if ($_POST['email'] == $value['email'] && $_POST['password'] == $value['password']){
                $_SESSION['login'] = true;
                header('Location:/?f=showHome');
                $_SESSION['username'] = $value['username'];
            }
                else header('Location:/?f=loginForm&try=1'); die;
    
}}

function logout_User() {
    unset($_SESSION['login']);
    header('Location:/?f=loginForm');
}