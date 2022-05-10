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
    $user_Service = new user_Service;
    $currentUsers = $user_Service->readUsers();
    foreach ($currentUsers as $key => $value) :
    ?> <tr> <?php if ($value['id'] == $_GET['userid']) { ?>
                <div class="divMiddle">
                    <form action="/?f=editUser&userid=<?php echo $value['id'] ?>&edit=true" method="POST">
                        <div class="middlecontroller">
                            <div><label>Nome do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="username" value="<?php echo $value['username'] ?>"></div>
                            <div><label>Email do usuário:</label></div>
                            <input type="text" class="inputListing" name="email" value="<?php echo $value['email'] ?>">
                            <div><label>Senha do usuário:</label></div>
                            <div><input type="text" class="inputListing" name="password" value="<?php echo $value['password'] ?>"></label></div>
                            <input class="buttonEntrar" type="submit" value="Salvar">
                    </form>
            <?php }
        endforeach ?>
</body>

</html>