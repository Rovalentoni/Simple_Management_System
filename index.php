<?php

//Comandos iniciais 

define('INCLUDE_PATH', __DIR__);
session_start();
ini_set('error_reporting', E_ALL);

if (!empty($_GET['f'])) {
    $router = $_GET['f'];
    $router();
} else loginForm();


function start()
{
    include_once INCLUDE_PATH . '/Services/user_service.php';
    include_once INCLUDE_PATH . '/Services/cars_service.php';
    include_once INCLUDE_PATH . '/Services/drivers_service.php';
    originalCars();
    originalDrivers();
    originalUsers();
    fixName();
}
start();





//Funções de login

function loginForm()
{
    include_once INCLUDE_PATH . '/Services/user_service.php';
    originalUsers();
    if (isset($_SESSION['login'])) {
        header('Location:/?f=mainHome');
    } else {
        include_once INCLUDE_PATH . '/Services/login.php';
        if (isset($_GET['try']) && $_GET['try'] == 1) {
            echo "<div class='center red'>Suas credenciais estão incorretas </div>";
        } else if (isset($_GET['try']) && $_GET['try'] == 2) {
            echo "<div class='center red'>Você precisa estar conectado para acessar as páginas. </div>";
        }
    }
}

function loginSession()
{
    include_once INCLUDE_PATH . '/Services/session_service.php';
    include_once INCLUDE_PATH . '/Services/user_service.php';
    login($_POST);
}

function logout()
{
    include_once INCLUDE_PATH . '/Services/session_service.php';
    logout_User();
}



//Função Home:

function mainHome()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Templates/Users/home.php';
    } else {
        header('Location:/?f=loginForm&try=2');
    }
}



// Páginas da listagem de usuários:

function userHomePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        include_once INCLUDE_PATH . '/Templates/Users/userHomePage.php';
        if (isset($_GET['cadastro'])) {
            echo "<div class='greenWarning'><h4>O cadastro foi efetuado com sucesso!</h4></div>";
        } else if (isset($_GET['delete'])) {
            echo "<div class='greenWarning'><h4>O usuário foi deletado com sucesso!</h4></div>";
        } else if (isset($_GET['editdone'])) {
            echo "<div class='greenWarning' style='position:relative; top:350px;'><h4>O usuário foi Editado com sucesso!</h4></div>";
        } else if (isset($_GET['blank'])) {
            echo "<div class='warning' style='position:relative; top:350px;'><h4>Os campos não podem estar em branco.</h4></div>";
        } else if (isset($_GET['editfail'])) {
            echo "<div class='warning' style='position:relative; top:350px;'><h4>Os campos não podem ser alterados se os mesmos permanecem iguais.</h4></div>";
        }
    } else header('Location:/?f=loginForm&try=2');
}

function userCreatePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        include_once INCLUDE_PATH . '/Templates/Users/userCreatePage.php';
        if (isset($_GET['blank'])) {
            echo ("<div class='warningUp' 'position:relative; top:350px;'>Não é possível deixar nenhum dos campos em branco</div>");
        } else if (isset($_GET['strlen'])) {
            echo ("<div class='warningUp' 'position:relative; top:350px;'>Todos os campos precisam ter ao menos 4 digitos.</div>");
        }
    } else header('Location:/?f=loginForm&try=2');
}

function userListPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        include_once INCLUDE_PATH . '/Templates/Users/userListPage.php';
    } else header('Location:/?f=loginForm&try=2');
}
function userEditPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        include_once INCLUDE_PATH . '/Templates/Users/userEditPage.php';
        if (isset($_GET['blank'])) {
            echo ("<div class='warningUp' 'position:relative; top:350px;'>Não é possível deixar nenhum dos campos em branco</div>");
        } else if (isset($_GET['strlen'])) {
            echo ("<div class='warningUp' 'position:relative; top:350px;'>Todos os campos precisam ter ao menos 4 digitos.</div>");
        }
    } else header('Location:/?f=loginForm&try=2');
}


//Chamada de funções Service de usuários

function createUser()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        create_User($_POST);
    } else header('Location:/?f=loginForm&try=2');
}

function deleteUser()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        delete_User($_GET);
    } else header('Location:/?f=loginForm&try=2');
}

function editUser()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        edit_User($_GET);
    } else header('Location:/?f=loginForm&try=2');
}

function userDetailsPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        include_once INCLUDE_PATH . '/Templates/Users/userDetailsPage.php';
    } else header('Location:/?f=loginForm&try=2');
}

//Páginas da listagem de veículos:

function carsHomePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        include_once INCLUDE_PATH . '/Templates/Vehicles/carsHomePage.php';
        if (isset($_GET['create'])) {
            echo "<div class='greenWarning'><h4>O cadastro do veículo foi efetuado com sucesso!</h4></div>";
        } else if (isset($_GET['delete'])) {
            echo "<div class='greenWarning'><h4>O veículo foi deletado com sucesso!</h4></div>";
        } else if (isset($_GET['edit'])) {
            echo "<div class='greenWarning'><h4>O veículo foi editado e salvo com sucesso!</h4></div>";
        } else if (isset($_GET['blank'])) {
            echo "<div class='warning'><h4>Não é possível deixar nenhum campo em branco.</h4></div>";
        }
    } else header('Location:/?f=loginForm&try=2');
}

function carsCreatePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        include_once INCLUDE_PATH . '/Templates/Vehicles/carsCreatePage.php';
        if (isset($_GET['blank'])) {
            echo ("<div class='warningUp'>Não é possível deixar nenhum dos campos em branco</div>");
        } else if (isset($_GET['strlen'])) {
            echo ("<div class='warningUp'>Os campos não podem ter menos de 3 caracteres.</div>");
        }
    } else header('Location:/?f=loginForm&try=2');
}

function carsDetailsPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        include_once INCLUDE_PATH . '/Templates/Vehicles/carsDetailsPage.php';
    } else header('Location:/?f=loginForm&try=2');
}
function carsEditPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        include_once INCLUDE_PATH . '/Templates/Vehicles/carsEditPage.php';
    } else header('Location:/?f=loginForm&try=2');
}

//Chamada de funções do Service de vehicles

function createCars()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        create_Car($_POST);
    } else header('Location:/?f=loginForm&try=2');
}

function deleteCars()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        delete_Car($_GET);
    } else header('Location:/?f=loginForm&try=2');
}

function editCars()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/cars_service.php';
        edit_Car($_GET, $_POST);
    } else header('Location:/?f=loginForm&try=2');
}



//Páginas da listagem de Motoristas

function driversHomePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        include_once INCLUDE_PATH . '/Templates/Drivers/driversHomePage.php';
        if (isset($_GET['create'])) {
            echo "<div class='greenWarning'><h4>O cadastro do Motorista foi efetuado com sucesso!</h4></div>";
        } else if (isset($_GET['delete'])) {
            echo "<div class='greenWarning'><h4>O Motorista foi exlcuído com sucesso!</h4></div>";
        } else if (isset($_GET['edit'])) {
            echo "<div class='greenWarning'><h4>Os dados do Motorista foram editados com sucesso!</h4></div>";
        } else if (isset($_GET['blank'])) {
            echo "<div class='warning'><h4>Não é possível deixar campos em branco na edição.</h4></div>";
        }
    } else header('Location:/?f=loginForm&try=2');
}

function driversDetailsPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        include_once INCLUDE_PATH . '/Templates/Drivers/driversDetailsPage.php';
    } else header('Location:/?f=loginForm&try=2');
}

function driversCreatePage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        include_once INCLUDE_PATH . '/Templates/Drivers/driversCreatePage.php';
        if (isset($_GET['blank'])) {
            echo "<div class='warning' style='bottom:55px'><h4>Nenhum campo pode ficar em branco</h4></div>";
        } else if (isset($_GET['strlen'])) {
            echo "<div class='warning' style='bottom:55px'><h4>Nenhum campo pode ter menos que 2 caractéres</h4></div>";
        }
    } else header('Location:/?f=loginForm&try=2');
}

function driversEditPage()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        include_once INCLUDE_PATH . '/Templates/Drivers/driversEditPage.php';
    } else header('Location:/?f=loginForm&try=2');
}

//Funções de Service de Motoristas

function createDriver()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        create_Driver($_POST);
    } else header('Location:/?f=loginForm&try=2');
}

function deleteDriver()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        delete_Driver($_GET);
    } else header('Location:/?f=loginForm&try=2');
}

function editDriver()
{
    if (isset($_SESSION['login'])) {
        include_once INCLUDE_PATH . '/Services/drivers_service.php';
        edit_Driver($_GET);
    } else header('Location:/?f=loginForm&try=2');
}
