<?php
class UserService
{


    public $mysqli;

    function __construct()
    {
        include_once(INCLUDE_PATH . '/Core/connection.php');
        $this->mysqli = new Cnn([
            'host' => 'localhost',
            'username' => 'root',
            'password' => 3005,
            'database' => 'users',
            'port' => 3306
        ]);
    }


    //Funções de List:

    public function listUsers()
    {
        $query = 'SELECT * FROM users_table;';
        $infoList = $this->mysqli->givenQuery($query);
        return ($infoList);
    }

    // Funções do Usuário: 

    public function create_User($param)
    {
        if (empty($param['users_username']) || empty($param['users_password']) || empty($param['users_email'])) {
            header('Location:/?f=userCreatePage&blank=true');
        } else if (strlen($param['users_username']) < 4 || strlen($param['users_password']) < 4 || strlen($param['users_email']) < 4) {
            header('Location:/?f=usersCreatePage&strlen=true');
        } else {
            $createQuery = "INSERT INTO users.users_table (users_username, users_email, users_password) VALUES ( '" . $param['users_username'] . "','" . $param['users_email'] . "','" .  $param['users_password'] . "');";
            $this->mysqli->givenQuery($createQuery);
            header('Location:/?f=userHomePage&cadastro=1');
            // print_r($createQuery);
        }
    }
    //INSERT INTO users`.`users_table` (`users_id`, `users_username`, `users_email`, `users_password`) VALUES ('2', 'Beatriz', 'Beatriz@hotmail.com', 'soubeatriz');


    public function delete_User($param)
    {

        $currentUsers = $this->listUsers();
        $deleteQuery = 'DELETE FROM users_table WHERE (users_id =' . $param['userid'] . ' );';
        $this->mysqli->givenQuery($deleteQuery);
        return true;
    }



    public function edit_UserOLD($param)
    {

        $currentUsers = $this->listUsers();

        foreach ($currentUsers as $key => $value) {
            if ($value['id'] == $param['userid']) {
                if ($value['id'] == $_SESSION['id']) {
                    $_SESSION['username'] = $_POST['username'];
                } else if ($value['id'] == $_SESSION['id'] && $value['users_username'] != $_SESSION['username']) {
                    $_SESSION['username'] = $value['users_username'];
                }
            }
        }
        foreach ($currentUsers as $key => $value2) {
            if (
                $value2['id'] == $param['userid'] && !empty($_POST['username']) &&
                !empty($_POST['password']) && !empty($_POST['email'])
            ) {
                $value2['username'] = $_POST['username'];
                $value2['password'] = $_POST['password'];
                $value2['email'] = $_POST['email'];
                $currentUsers[$key] = $value2;
                file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
                header('Location:/?f=userHomePage&editdone=true');
                break;
            } else header('Location: /?f=userHomePage&blank=1');
        }
    }


    public function edit_User($param)
    {
        // $currentUsers = $this->listUsers();
        $editQuery = 'UPDATE users.users_table SET users_username = ' . $param['users_username'] . ', users_email = ' . $param['users_email'] . ', users_password = ' . $param['users_password'] . ' WHERE (users_id = ' . $param['userid'] . ');';

        // if (empty($param['users_username']) || empty($param['users_email']) || empty($param['users_password'])) {
        //     header('Location:/?f=userHomePage&blank=true');
        // } else
         $this->mysqli->givenQuery($editQuery);
        header('Location: /?f=userHomePage&editdone=true');
        // print_r($param);
        // print_r($editQuery);
        // return true;
    }
}

