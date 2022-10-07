<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de veículos</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>

</body>

</html>

<h3 class="headerUser">Cadastro de Veículos de: <?php echo $_SESSION['username'] ?></h3>

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
    <img src="/Midia/createCars.png" alt="car closeup vertical" style="width: 100%;">

</div>

<div class="divMiddle">
    <form action="/?f=createCars" method="POST">
        <div class="middlecontroller">
            <h2>Cadastro de novo Veículo:</h2>

            <div><label>Placa do novo veículo:</label></div>
            <div><input type="text" class="inputMiddle" name="placa"></div>

            <div><label>Marca do novo veículo:</label></div>
            <div><input type="text" class="inputMiddle" name="marca"></label></div>

            <div><label>Modelo do novo veículo:</label></div>
            <div><input type="text" class="inputMiddle" name="modelo"></label></div>

            <div><label>Tipo do novo veículo:</label></div>
            <div><input type="text" class="inputMiddle" name="tipo"></label></div>

            <div><label>Ano do novo veículo:</label></div>
            <div><input type="number" class="inputMiddle" name="ano" maxlength = "4" max = "2024" min = "1900"></label></div>

            <div><label>Cor do novo veículo:</label></div>
            <div><input type="text" class="inputMiddle" name="cor"></label></div>

            <div><input type="submit" class="buttonEntrar" value="Cadastrar"></div>
        </div>
    </form>
</div>