<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <h2>Listagem de Usuários</h2>
    <div class="navigationMenu">
        <ul class="ulNavigation">
            <li class="liNavigation"><a href="/?f=mainHome">Home</a></li>
            <li class="liNavigation"><a href="/?f=userHomePage">Usuários</a></li>
            <li class="liNavigation"><a href="/?f=carsHomePage">Veículos</a></li>
            <li class="liNavigation"><a href="/?f=driversHomePage">Motoristas</a></li>
            <li class="liNavigation"><a href="/?f=logout">Logout</a></li>
        </ul>
    </div>
    <div class="sideBar">
        <ul class="sideUl">
            <li class="sideLi"><a href="/?f=userCreatePage">Criar</a></li>
            <li class="sideLi"><a href="/?f=userDelete">Excluir</a></li>
        </ul>
        <img src="/Midia/users.png" alt="car closeup vertical" style="width: 100%;">

        <div>

            <table class="tableHome">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Senha</th>
                </tr>
                <?php

                foreach ($currentUsers as $key => $value) :
                ?> <tr>
                        <td class="tdTable"><?php echo $value['id'] ?></td>
                        <td class="tdTable"><?php echo $value['users_username'] ?></td>
                        <td class="tdTable"><?php echo $value['users_email'] ?></td>
                        <td class="tdTable"><?php echo $value['users_password'] ?></td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>

</body>

</html>