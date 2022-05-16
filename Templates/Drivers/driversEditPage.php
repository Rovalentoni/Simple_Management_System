
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



    <h3 class="headerUser">Edição de Motoristas de: <?php echo $_SESSION['username'] ?></h3>

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
            <li class="sideLi"><a href="/?f=driversHomePage">Voltar</a></li>

        </ul>
        <img src="/Midia/editLogo.jpg" alt="car closeup vertical" style="width: 100%; margin-top:20px; height:auto; position:relative;">

    </div>


    <?php
    $drivers_Service = new DriversService;
    $currentDrivers = $drivers_Service->readDrivers();
    foreach ($currentDrivers as $key => $value) :
    ?> <tr> <?php if ($value['id'] == $_GET['driverid']) { ?>
    <div class="divMiddle">
                    <form action="/?f=editDriver&driverid=<?php echo $value['id'] ?>&edit=true" method="POST">
                    <div class="middlecontroller">
                    <label><b>Nome:</b></label><input type="text" class="inputListing" name="username" value="<?php echo $value['username'] ?>">
                    <label><b>Idade:</b></label><input type="text" class="inputListing" name="age" value="<?php echo $value['age'] ?>">
                    <label><b>Etnia:</b></label><input type="text" class="inputListing" name="type" value="<?php echo $value['type'] ?>">
                    <label><b>CNH:</b></label><input type="text" class="inputListing" name="cnh" value="<?php echo $value['cnh'] ?>">
                    <label><b>Sexo:</b></label><input type="text" class="inputListing" name="sex" value="<?php echo $value['sex'] ?>">
                   <input class="buttonEntrar" type="submit" value="Salvar">
                </form>
        <?php }
        endforeach ?>
</body>

</html>