<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Usuários</title>
    <link rel="stylesheet" href="/styles.css">

    <style>
        
        body,html {
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
            <th>Ano</th>
            <th>Cor</th>
            <th style="width:280px;">Ações</th>

        </tr>
        <?php
        $currentCars = readCars();
        foreach ($currentCars as $key => $value) :
        ?> <tr> <?php if ($value['id'] == $_GET['carId']) { ?>
                    <form action="/?f=editCars&carId=<?php echo $value['id'] ?>&edit=true" method="POST">
                    <td class="tdTable"><?php echo $value['id'] ?></td>
                    <td class="tdTable"><input class="inputListing" type="text" name="placa" value="<?php echo $value['placa'] ?>"></td>
                    <td class="tdTable"><input type="text" class="inputListing" name="marca" value="<?php echo $value['marca'] ?>"></td>
                    <td class="tdTable"><input type="text" class="inputListing" name="modelo" value="<?php echo $value['modelo'] ?>"></td>
                    <td class="tdTable"><input type="text" class="inputListing" name="tipo" value="<?php echo $value['tipo'] ?>"></td>
                    <td class="tdTable"><input type="text" class="inputListing" name="ano" value="<?php echo $value['ano'] ?>"></td>
                    <td class="tdTable"><input type="text" class="inputListing" name="cor" value="<?php echo $value['cor'] ?>"></td>
                    <td class="tdTable">
                        <input class="smallerGreenButton" type="submit" value="Salvar">
                        </form>
                            <button class="smallerButton" onclick="window.location='/?f=carsHomePage'">Voltar</button></td>
                <?php } else { ?>
                    <td class="tdTable"><?php echo $value['id'] ?></td>
                    <td class="tdTable"><?php echo $value['placa'] ?></td>
                    <td class="tdTable"><?php echo $value['marca'] ?></td>
                    <td class="tdTable"><?php echo $value['modelo'] ?></td>
                    <td class="tdTable"><?php echo $value['tipo'] ?></td>
                    <td class="tdTable"><?php echo $value['ano'] ?></td>
                    <td class="tdTable"><?php echo $value['cor'] ?></td>
                    <td class="tdTable">
                        <button class="smallerButton" onclick="window.location='/?f=carsEditPage&carId=<?php echo $value['id'] ?>'">Editar</button>
                        <button class="smallerRedButton" onclick="window.location='/?f=deleteCars&carId=<?php echo $value['id'] ?>'">Deletar</button>
                        <button class="smallerRedButton" onclick="window.location='/?f=carsDetailsPage&carId=<?php echo $value['id'] ?>'">Ver Detalhes</button>

                    </td>

                <?php } ?>



            </tr>
        <?php endforeach ?>

    </table>
</div>