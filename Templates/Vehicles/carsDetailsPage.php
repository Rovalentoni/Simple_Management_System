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

<h3 class="headerUser">Detalhamento de Veículos <?php echo $_SESSION['username'] ?></h3>

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
    <!-- <img src="/Midia/users.png" alt="car closeup vertical" style="width: 100%;"> -->

</div>

< </tr>
    <?php
    $cars_Service = new cars_Service;
    $currentCars = $cars_Service->readcars();
    foreach ($currentCars as $key => $value) :
        if ($_GET['carId'] == $value['id']) {
    ?>
            <div class="detailsPage">
                <ul>
                   
                    <li class="detailsInfo"><b>ID:</b><?php echo $value['id'] ?></li>
                <li class="detailsInfo"><b>Placa:</b><?php echo $value['placa'] ?></li>
                <li class="detailsInfo"><b>Marca:</b><?php echo $value['marca'] ?></li>
                <li class="detailsInfo"><b>Modelo:</b><?php echo $value['modelo'] ?></li>
                <li class="detailsInfo"><b>Tipo:</b><?php echo $value['tipo'] ?></li>
                <li class="detailsInfo"><b>Ano:</b><?php echo $value['ano'] ?></li>
                <li class="detailsInfo"><b>Cor:</b><?php echo $value['cor'] ?></li>
                </ul>

        <?php }
    endforeach ?>
        <div> <button class="detailsButton2" onclick="window.location='/?f=carsHomePage'"> Voltar </button></div>
            </div>