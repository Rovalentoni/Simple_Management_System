<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Motoristas</title>
    <link rel="stylesheet" href="/styles.css">
    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/Midia/backgroundRain.jpg");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body>

</body>

</html>

<h3 class="headerUser">Gerenciamento de Motoristas de: <?php echo $_SESSION['username'] ?></h3>

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
        <li class="sideLi"><a href="/?f=driversHomePage">Listar</a></li>
        <li class="sideLi"><a href="/?f=driversCreatePage">Criar</a></li>

    </ul>
</div>
<div>
    <table class="tableHome">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Idade</th>
            <th>Etnia</th>
            <th>CNH</th>
            <th>Sexo</th>
            <th style="width:280px;">Ações</th>

        </tr>
        <?php

        foreach ($currentDrivers as $key => $value) :
        ?> <tr>
                <td class="tdTable"><?php echo $value['drivers_id'] ?></td>
                <td class="tdTable"><?php echo $value['drivers_username'] ?></td>
                <td class="tdTable"><?php echo $value['drivers_age'] ?></td>
                <td class="tdTable"><?php echo $value['drivers_type'] ?></td>
                <td class="tdTable"><?php echo $value['drivers_cnh'] ?></td>
                <td class="tdTable"><?php echo $value['drivers_sex'] ?></td>

                <td class="tdTable">
                    <button class="smallerButton" onclick="window.location='/?f=driversEditPage&driverid=<?php echo $value['drivers_id'] ?>'">Editar</button>
                    <button class="smallerRedButton" onclick="window.location='/?f=deleteDriver&driverid=<?php echo $value['drivers_id'] ?>'">Deletar</button>
                    <button class="detailsButton2" onclick="window.location='/?f=driversDetailsPage&driverid=<?php echo $value['drivers_id'] ?>'">Ver Detalhes</button>
                </td>

            </tr>
        <?php endforeach; ?>

    </table>
</div>