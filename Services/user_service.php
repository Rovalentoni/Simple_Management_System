<?php
class UserService
{
    //Funções de Read:

    public function readUsers()
    {
        return json_decode(file_get_contents(INCLUDE_PATH . '/Data/users.json'), true);
    }



    //Funções de backup

    public function originalUsers()
    {
        $currentUsers = $this->readUsers();
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

    // Funções do Usuário: 

    public function create_User($param)
    {
        if (empty($param['username']) || empty($param['password']) || empty($param['email'])) {
            header('Location:/?f=userCreatePage&blank=true');
        } else if (strlen($param['username']) < 4 || strlen($param['password']) < 4 || strlen($param['email']) < 4) {
            header('Location:/?f=userCreatePage&strlen=true');
        } else {
            $currentUsers = $this->readUsers();
            $currentUsers[] = $_POST;
            foreach ($currentUsers as $key => $value) {
                $value['id'] = $key;
                $currentUsers[$key] = $value;
            };
            file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
            header('Location:/?f=userHomePage&cadastro=1');
        }
    }

    public function delete_User($param)
    {


        $currentUsers = $this->readUsers();
        foreach ($currentUsers as $key => $value) {
            if ($value['id'] == $param['userid']) {
                unset($currentUsers[$key]);
                file_put_contents(INCLUDE_PATH . '/Data/users.json', json_encode($currentUsers));
                // header('Location:/?f=userHomePage&delete=1');
                return true;
            }
        }
    }

    public function edit_User($param)
    {

        $currentUsers = $this->readUsers();

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
            } else header('Location:/?f=userHomePage&blank=1');
        }
    }



    public function fixName()
    {

        $currentUsers = $this->readUsers();
        foreach ($currentUsers as $key => $value) {
            if (isset($_SESSION['id'])) {
                if ($value['id'] == $_SESSION['id'] && $value['username'] != $_SESSION['username']) {
                    $_SESSION['username'] = $value['username'];
                }
            }
        }
    }
}
