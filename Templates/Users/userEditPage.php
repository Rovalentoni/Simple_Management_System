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



    <h3 class="headerUser">Edição de Usuários de: <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=userHomePage">Voltar</a></li>

        </ul>
        <img src="/Midia/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>


    <?php

    foreach ($currentUsers as $key => $value) :
    ?> <tr> <?php if ($value['users_id'] == $_GET['userid']) { ?>
                <div class="divMiddle">
                    <form action="/?f=editUser" method="POST">
                        <div class="middlecontroller">
                            <div><label>Nome do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="users_username" value="<?php echo $value['users_username'] ?>"></div>
                            <div><label>Email do usuário:</label></div>
                            <input type="text" class="inputListing" name="users_email" value="<?php echo $value['users_email'] ?>">
                            <div><label>Senha do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="users_password" value="<?php echo $value['users_password'] ?>"></label></div>
                            <input type="hidden" name="userid" value ="<?php echo $value['users_id'] ?>">
                            <input class="buttonEntrar" type="submit" value="Salvar">
                    </form>
            <?php }
        endforeach ?>
</body>

</html>