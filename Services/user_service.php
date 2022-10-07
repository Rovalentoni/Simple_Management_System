<?php
class UserService

//--------- Conexão ao Banco de Dados -------------//

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


    //--------- Função de Read -------------//

    public function listUsers()
    {
        $query = 'SELECT * FROM users_table;';
        $infoList = $this->mysqli->givenQuery($query);
        return ($infoList);
    }

    //--------- Função de Create -------------//

    public function create_User($param)
    {
        if (empty($param['users_username']) || empty($param['users_password']) || empty($param['users_email'])) {
            header('Location:/?f=userCreatePage&blank=true');
        } else if (strlen($param['users_username']) < 4 || strlen($param['users_password']) < 4 || strlen($param['users_email']) < 4) {
            header('Location:/?f=usersCreatePage&strlen=true');
        } else {
            $createQuery = "INSERT INTO users.users_table (users_username, users_email, users_password) VALUES ( '" . $param['users_username'] . "','" . $param['users_email'] . "','" .  $param['users_password'] . "');";
            $this->mysqli->givenQuery($createQuery);
            return true;
        }
    }

    //--------- Função de Delete -------------//

    public function delete_User($param)
    {
        $deleteQuery = 'DELETE FROM users_table WHERE (users_id =' . $param['userid'] . ' );';
        $this->mysqli->givenQuery($deleteQuery);
        return true;
    }


    //--------- Função de Edit -------------//

    public function edit_User($param)
    {
        $editQuery = "UPDATE users.users_table SET users_username = '" . $param['users_username'] . "', users_email = '" . $param['users_email'] . "', users_password = '" . $param['users_password'] . "' WHERE (users_id = '"  . $param['userid'] . "');";

        if (empty($param['users_username']) || empty($param['users_email']) || empty($param['users_password'])) {
            return false;
        }
        $this->mysqli->givenQuery($editQuery);
        return true;
    }
}
