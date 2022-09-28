<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Veículos</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>
    <h2>Listagem de Veículos</h2>
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
            <li class="sideLi"><a href="/?f=carsCreatePage">Criar</a></li>

        </ul>
        <img src="/Midia/closeV.jpg" alt="car closeup vertical" style="width: 100%;">

        <div>

            <table class="tableHome">
                <tr>
                    <th>ID</th>
                    <th>Placa</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Tipo</th>
                    <th>Ano</th>
                    <th>Cor</th>
                    <th style="width:280px;">Ações</th>

                </tr>
                <?php

                foreach ($currentCars as $key => $value) :
                ?> <tr>
                        <td class="tdTable"><?php echo $value['id'] ?></td>
                        <td class="tdTable"><?php echo $value['placa'] ?></td>
                        <td class="tdTable"><?php echo $value['marca'] ?></td>
                        <td class="tdTable"><?php echo $value['modelo'] ?></td>
                        <td class="tdTable"><?php echo $value['tipo'] ?></td>
                        <td class="tdTable"><?php echo $value['ano'] ?></td>
                        <td class="tdTable"><?php echo $value['cor'] ?></td>
                    </tr>
                <?php endforeach ?>

            </table>
        </div>

</body>

</html>