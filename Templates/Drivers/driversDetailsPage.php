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
            background-image: url("/Midia/backgroundWhite.png");
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

<h3 class="headerUser">Detalhamento de Motoristas <?php echo $_SESSION['username'] ?></h3>

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
    <!-- <img src="/Midia/users.png" alt="car closeup vertical" style="width: 100%;"> -->

</div>

< </tr>
    <?php
    foreach ($currentDrivers as $key => $value) :
        if ($_GET['driverid'] == $value['id']) {
    ?>
            <div class="detailsPage">
                <ul>
                    <li class="detailsInfo"><b>ID:</b><?php echo $value['id'] ?></li>
                    <li class="detailsInfo"><b>Nome:</b><?php echo $value['users_username'] ?></li>
                    <li class="detailsInfo"><b>Idade:</b><?php echo $value['age'] ?></li>
                    <li class="detailsInfo"><b>Etnia:</b><?php echo $value['type'] ?></li>
                    <li class="detailsInfo"><b>CNH:</b><?php echo $value['cnh'] ?></li>
                    <li class="detailsInfo"><b>Sexo:</b><?php echo $value['sex'] ?></li>
                </ul>

        <?php }
    endforeach ?>
        <div> <button class="detailsButton3"  onclick="window.location='/?f=driversHomePage'"> Voltar </button></div>
            </div>