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

</body>

</html>

<h3 class="headerUser">Detalhamento de usuários <?php echo $_SESSION['username'] ?></h3>

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

< </tr>
    <?php
    
    foreach ($currentUsers as $key => $value) :
        if ($_GET['userid'] == $value['users_id']) {
    ?>
            <div class="detailsPage">
                <ul>
                    <li class="detailsInfo"><b>ID:</b><?php echo $value['users_id'] ?></li>
                    <li class="detailsInfo"><b>Nome:</b><?php echo $value['users_username'] ?></li>
                    <li class="detailsInfo"><b>Email:</b> <?php echo $value['users_email'] ?></li>
                    <li class="detailsInfo"><b>Senha: </b><?php echo $value['users_password'] ?></li>
                </ul>

        <?php }
    endforeach ?>
        <div> <button class="detailsButton" onclick="window.location='/?f=userHomePage'"> Voltar </button></div>
            </div>