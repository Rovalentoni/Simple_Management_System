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
    $cars_Service = new cars_Service;
    $currentCars = $cars_Service->readCars();
    foreach ($currentCars as $key => $value) :
    ?> <tr> <?php if ($value['id'] == $_GET['carId']) { ?>
                <div class="divMiddle">
                    <form action="/?f=editCars&carId=<?php echo $value['id'] ?>&edit=true" method="POST">
                        <div class="middlecontroller">
                            <input type="text" class="inputListing" name="placa" value="<?php echo $value['placa'] ?>">
                            <input type="text" class="inputListing" name="marca" value="<?php echo $value['marca'] ?>">
                            <input type="text" class="inputListing" name="modelo" value="<?php echo $value['modelo'] ?>">
                            <input type="text" class="inputListing" name="tipo" value="<?php echo $value['tipo'] ?>">
                            <input type="text" class="inputListing" name="ano" value="<?php echo $value['ano'] ?>">
                            <input type="text" class="inputListing" name="cor" value="<?php echo $value['cor'] ?>">
                            <input class="buttonEntrar" type="submit" value="Salvar">
                    </form>
            <?php }
        endforeach ?>
</body>

</html>