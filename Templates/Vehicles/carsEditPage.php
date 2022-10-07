<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edição</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>



    <h3 class="headerUser">Edição de veículos de: <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=carsHomePage">Voltar</a></li>

        </ul>
        <img src="/Midia/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>


    <?php

    foreach ($currentCars as $key => $value) :
    ?> <tr> <?php if ($value['cars_id'] == $_GET['carId']) { ?>
                <div class="divMiddle">
                    <form action="/?f=editCars&carId=<?php echo $value['cars_id'] ?>&edit=true" method="POST">
                        <div class="middlecontroller">
                            <b><div><label>Placa</label></div></b>
                            <input type="text" class="inputListing" name="placa" value="<?php echo $value['cars_plate'] ?>">
                            <b><div><label>Fabricante</label></div></b>
                            <input type="text" class="inputListing" name="marca" value="<?php echo $value['cars_manufacturer'] ?>">
                            <b><div><label>Modelo</label></div></b>
                            <input type="text" class="inputListing" name="modelo" value="<?php echo $value['cars_model'] ?>">
                            <b><div><label>Type</label></div></b>
                            <input type="text" class="inputListing" name="tipo" value="<?php echo $value['cars_type'] ?>">
                            <b> <div><label>Ano</label></div></b>
                            <input type="number" class="inputListing" name="ano" maxlength = "4" min="1900" max="2024" value="<?php echo $value['cars_year'] ?>">
                            <b><div><label>Cor</label></div></b>
                            <input type="text" class="inputListing" name="cor" value="<?php echo $value['cars_color'] ?>">
                            <input class="buttonEntrar" type="submit" value="Salvar">
                    </form>
            <?php }
        endforeach ?>
</body>

</html>