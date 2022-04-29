<?php

define('INCLUDE_PATH', __DIR__);
session_start();
ini_set('error_reporting', E_ALL);

if (!empty($_GET['f'])) {
    $router = $_GET['f'];
    $router();
} else loginForm();

// if (isset($_SESSION['login'])) {
//     header('Location:/?f=showHome');
// } else if (empty($_SESSION['login'])) {
//     loginForm();
// }


function loginForm()
{
    include_once INCLUDE_PATH . '/Services/user_service.php';
    originalUsers();
    if(isset($_SESSION['login'])) {
        header('Location:/?f=showHome');
    } else {
    include_once INCLUDE_PATH . '/Services/login.php';
    if (isset($_GET['try']) && $_GET['try'] == 1) {
        echo "<div class='center red'>Suas credenciais estão incorretas </div>";
    } else if(isset($_GET['try']) && $_GET['try'] == 2) {
        echo "<div class='center red'>Você precisa estar conectado para acessar as páginas. </div>";
    }
}}

function loginSession()
{
    include_once INCLUDE_PATH . '/Services/session_service.php';
    include_once INCLUDE_PATH . '/Services/user_service.php';
    login($_POST);
}

function showHome()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Templates/Users/home.php';
    } else {
        header('Location:/?f=loginForm&try=2');
    }
}

function logout () {
    include_once INCLUDE_PATH. '/Services/session_service.php';
    logout_User();
}
