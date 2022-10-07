<?php
class Router
{
    //--------- Comandos Iniciais -------------//

    function __construct()
    {
        define('INCLUDE_PATH', __DIR__);
        session_start();
        ini_set('error_reporting', E_ALL);
        // $this->fixName();
        if (!empty($_GET['f'])) {
            $router = $_GET['f'];
            $this->$router();
        } else $this->loginForm();
    }

    //--------- Função de Ajustar o nome da Sessão -------------//

    public function fixName()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        $currentUsers = $user_Service->listUsers();
        foreach ($currentUsers as $key => $value) {
            if (isset($_SESSION['id'])) {
                if ($value['id'] == $_SESSION['id'] && $value['users_username'] != $_SESSION['username']) {
                    $_SESSION['username'] = $value['users_username'];
                }
            }
        }
    }

    //--------- Função do formulário de Login -------------//

    function loginForm()
    {
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $user_Service = new UserService;
        $users = $user_Service->listUsers();
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

    //--------- Função de Login -------------//

    function loginSession()
    {
        include_once INCLUDE_PATH . '/Services/session_service.php';
        include_once INCLUDE_PATH . '/Services/user_service.php';
        $session_Service = new SessionService;
        $user_Service = new UserService;
        $users = $user_Service->listUsers();
        if ($session_Service->login($_POST, $users) == true) {
            header('Location:/?f=mainHome');
        } else if ($session_Service->login($_POST, $users) == false) {
            header('Location:/?f=loginForm&try=1');
        };
    }
    //--------- Função de Logout -------------//

    function logout()
    {
        include_once INCLUDE_PATH . '/Services/session_service.php';
        $session_Service = new SessionService;
        $session_Service->logout_User();
    }



    //--------- Função de Home -------------//

    function mainHome()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Templates/Users/home.php';
        } else {
            header('Location:/?f=loginForm&try=2');
        }
    }



    //--------- Função da página Home de usuários -------------//

    function userHomePage()
    {
        if (isset($_SESSION['login'])) {

            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            $currentUsers = $user_Service->listUsers();
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

    //--------- Função da página de Create (User) -------------//


    function userCreatePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            include_once INCLUDE_PATH . '/Templates/Users/userCreatePage.php';
            if (isset($_GET['blank'])) {
                echo ("<div class='warningUp' 'position:relative; top:350px;'>Não é possível deixar nenhum dos campos em branco</div>");
            } else if (isset($_GET['strlen'])) {
                echo ("<div class='warningUp' 'position:relative; top:350px;'>Todos os campos precisam ter ao menos 4 digitos.</div>");
            }
        } else header('Location:/?f=loginForm&try=2');
    }
    //--------- Função da página de listagem (User) -------------//

    function userListPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            include_once INCLUDE_PATH . '/Templates/Users/userListPage.php';
            $user_Service = new UserService;
            $currentUsers = $user_Service->listUsers();
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Função da página de Edit (User) -------------//

    function userEditPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            $currentUsers = $user_Service->listUsers();
            include_once INCLUDE_PATH . '/Templates/Users/userEditPage.php';

            if (isset($_GET['blank'])) {
                echo ("<div class='warningUp' 'position:relative; top:350px;'>Não é possível deixar nenhum dos campos em branco</div>");
            } else if (isset($_GET['strlen'])) {
                echo ("<div class='warningUp' 'position:relative; top:350px;'>Todos os campos precisam ter ao menos 4 digitos.</div>");
            }
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Função da página de Details (User) -------------//

    function userDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            $currentUsers = $user_Service->listUsers();
            include_once INCLUDE_PATH . '/Templates/Users/userDetailsPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //--------- Chamadas das funções services (User) -------------//

    //--------- Função de Create (User) -------------//

    function createUser()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            if ($user_Service->create_User($_POST) == true) {
                header('Location:/?f=userHomePage&cadastro=1');
            };
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Função de Delete (User) -------------//


    function deleteUser()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            $user_Service->delete_User($_GET);
            if ($user_Service->delete_User($_GET) === true) {
                header('Location:/?f=userHomePage&delete=1');
            }
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Função de Edit (User) -------------//


    function editUser()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/user_service.php';
            $user_Service = new UserService;
            // print_r($_POST);
            if ($user_Service->edit_User($_POST) == true) {
                header('Location: /?f=userHomePage&editdone=true');
            } else if ($user_Service->edit_User($_POST) == false) {
                header('Location:/?f=userHomePage&blank=true');
            };
        } else header('Location:/?f=loginForm&try=2');
    }


    //--------- Funções para páginas de veículos -------------//

    //--------- Função de Home (Cars) -------------//

    function carsHomePage()
    {
        if (isset($_SESSION['login'])) {

            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            $currentCars = $cars_Service->readCars();
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

        //--------- Função da página de Create (Cars) -------------//

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

        //--------- Função da página de Details (Cars) -------------//

    function carsDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            $currentCars = $cars_Service->readcars();
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsDetailsPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Função da página de Edit (Cars) -------------//

    function carsEditPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            $currentCars = $cars_Service->readCars();
            include_once INCLUDE_PATH . '/Templates/Vehicles/carsEditPage.php';
            if (isset($_GET['blank'])) {
                echo "<div class='warning'><h4>Não é possível deixar nenhum campo em branco.</h4></div>";
            }
        } else header('Location:/?f=loginForm&try=2');
    }

        //--------- Chamada de funções da service (Cars) -------------//

    //--------- Função de Create (Cars) -------------//

    function createCars()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            if ($cars_Service->create_Car($_POST) == true) {
                header('Location:/?f=carsHomePage&create=1');
            } else {
                header('Location:/?f=carsHomePage&blank=1');
            }
        } else header('Location:/?f=loginForm&try=2');
    }
    //--------- Função de Delete (Cars) -------------//

    function deleteCars()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            if ($cars_Service->delete_Car($_GET) == true) {
                header('Location:/?f=carsHomePage&delete=true');
            };
        } else header('Location:/?f=loginForm&try=2');
    }

    function editCars()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/cars_service.php';
            $cars_Service = new CarsService;
            if ($cars_Service->edit_Car($_GET, $_POST) === true) {
                header('Location:/?f=carsHomePage&edit=true');
            } else if ($cars_Service->edit_Car($_GET, $_POST) === false) {
                header('Location:/?f=carsEditPage&blank=true&carId=' . $_GET['carId'] . '');
            };
        } else header('Location:/?f=loginForm&try=2');
    }



    //Páginas da listagem de Motoristas

    function driversHomePage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/drivers_service.php';
            $drivers_Service = new DriversService;
            $currentDrivers = $drivers_Service->readDrivers();
            include_once INCLUDE_PATH . '/Templates/Drivers/driversHomePage.php';

            if (isset($_GET['create'])) {
                echo "<div class='greenWarning'><h4>O cadastro do Motorista foi efetuado com sucesso!</h4></div>";
            } else if (isset($_GET['delete'])) {
                echo "<div class='greenWarning'><h4>O Motorista foi exlcuído com sucesso!</h4></div>";
            } else if (isset($_GET['edit'])) {
                echo "<div class='greenWarning'><h4>Os dados do Motorista foram editados com sucesso!</h4></div>";
            } else if (isset($_GET['blank'])) {
                echo "<div class='warning'><h4>Não é possível deixar os campos em branco.</h4></div>";
            }
        } else header('Location:/?f=loginForm&try=2');
    }

    function driversDetailsPage()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/drivers_service.php';
            $drivers_Service = new DriversService;
            $currentDrivers = $drivers_Service->readDrivers();
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
            $drivers_Service = new DriversService;
            $currentDrivers = $drivers_Service->readDrivers();
            include_once INCLUDE_PATH . '/Templates/Drivers/driversEditPage.php';
        } else header('Location:/?f=loginForm&try=2');
    }

    //Funções de Service de Motoristas

    function createDriver()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/drivers_service.php';
            $drivers_Service = new DriversService;
            if ($drivers_Service->create_Driver($_POST) === true) {
                header('Location:/?f=driversHomePage&create=true');
            } else header('Location:/?f=driversHomePage&blank=true');
        } else header('Location:/?f=loginForm&try=2');
    }

    function deleteDriver()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/drivers_service.php';
            $drivers_Service = new DriversService;
            if ($drivers_Service->delete_Driver($_GET) === true) {
                header('Location:/?f=driversHomePage&delete=true');
            };
        } else header('Location:/?f=loginForm&try=2');
    }

    function editDriver()
    {
        if (isset($_SESSION['login'])) {
            include_once INCLUDE_PATH . '/Services/drivers_service.php';
            $drivers_Service = new DriversService;
            if ($drivers_Service->edit_Driver($_POST, $_GET) === true) {
                header('Location:/?f=driversHomePage&edit=true');
            } else
                header('Location:/?f=driversHomePage&blank=true');
        } else header('Location:/?f=loginForm&try=2');
    }
}

new Router();
