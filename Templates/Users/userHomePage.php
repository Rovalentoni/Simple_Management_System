<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="/styles.css">
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/Midia/backgroundWhite.png");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>



    <h3 class="headerUser">Gerenciamento de Usuários de: <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=userHomePage">Listar</a></li>
            <li class="sideLi"><a href="/?f=userCreatePage">Criar</a></li>
        </ul>
    </div>
    <div>
        <table class="tableHome">
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Senha</th>
                <th style="width:230px;">Ações</th>

            </tr>
            <?php
            
            foreach ($currentUsers as $key => $value) :
            ?> <tr>
                    <td class="tdTable"><?php echo $value['users_id']; ?></td>
                    <td class="tdTable"><?php echo $value['users_username']; ?></td>
                    <td class="tdTable"><?php echo $value['users_email']; ?></td>
                    <td class="tdTable"><?php echo $value['users_password']; ?></td>

                    <td class="tdTable">
                        <button class="smallerButton" onclick="window.location='/?f=userEditPage&userid=<?php echo $value['users_id'] ?>'">Editar</button>
                        <button class="smallerRedButton" onclick="window.location='/?f=deleteUser&userid=<?php echo $value['users_id'] ?>'">Deletar</button>
                        <button class="detailsButton2" onclick="window.location='/?f=userDetailsPage&userid=<?php echo $value['users_id'] ?>'">Ver Detalhes</button>

                    </td>

                </tr>
            <?php endforeach;?>

        </table>
    </div>

</body>

</html>