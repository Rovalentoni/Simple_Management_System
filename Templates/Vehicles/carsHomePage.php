<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Veículos</title>
    <link rel="stylesheet" href="/styles.css">

    <style>
        body,
        html {
            height: 100%;
        }

        body {
            background-image: url("/Midia/backgroundClose.jpg");
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

<h3 class="headerUser">Gerenciamento de Veículos de: <?php echo $_SESSION['username'] ?></h3>

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
        <li class="sideLi"><a href="/?f=carsHomePage">Listar</a></li>
        <li class="sideLi"><a href="/?f=carsCreatePage">Criar</a></li>
    </ul>
    <!-- <img src="/Midia/closeV.jpg" alt="car closeup vertical" style="width: 100%;"> -->

</div>
<div>
    <table class="tableHome">
        <tr>
            <th>ID</th>
            <th>Placa</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Tipo</th>
            <th style="width:280px;">Ações</th>

        </tr>
        <?php
        $cars_Service = new cars_Service;
        $currentCars = $cars_Service->readCars();
        foreach ($currentCars as $key => $value) :
        ?> <tr>
                <td class="tdTable"><?php echo $value['id'] ?></td>
                <td class="tdTable"><?php echo $value['placa'] ?></td>
                <td class="tdTable"><?php echo $value['marca'] ?></td>
                <td class="tdTable"><?php echo $value['modelo'] ?></td>
                <td class="tdTable"><?php echo $value['tipo'] ?></td>
                <td class="tdTable">
                    <button class="smallerButton" onclick="window.location='/?f=carsEditPage&carId=<?php echo $value['id'] ?>'">Editar</button>
                    <button class="smallerRedButton" onclick="window.location='/?f=deleteCars&carId=<?php echo $value['id'] ?>'">Deletar</button>
                    <button class="detailsButton2" onclick="window.location='/?f=carsDetailsPage&carId=<?php echo $value['id'] ?>'">Ver Detalhes</button>

                </td>

            </tr>
        <?php endforeach ?>

    </table>
</div>