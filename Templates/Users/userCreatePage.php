<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>

</body>

</html>

<h3 class="headerUser">Cadastro de Usuários de: <?php echo $_SESSION['username'] ?></h3>

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
    <img src="/Midia/userCreate.png" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

</div>

<div class="divMiddle">
    <form action="/?f=createUser" method="POST">
        <div class="middlecontroller">
            <h2>Cadastro de novo usuário:</h2>

            <div><label>Novo usuário:</label></div>
            <div><input type="text" class="inputMiddle" name="users_username"></div>

            <div><label>Email do usuário:</label></div>
            <div><input type="text" class="inputMiddle" name="users_email"></label></div>

            <div><label>Senha do usuário:</label></div>
            <div><input type="password" class="inputMiddle" name="users_password"></label></div>

            <div><input type="submit" class="buttonEntrar" value="Cadastrar"></div>
        </div>
    </form>
</div>