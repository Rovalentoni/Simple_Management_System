<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bem vindo!</title>
    <link rel="stylesheet" href="/styles.css">
</head>

<body>

    <h1 class="header">Bem vindo, <?php echo $_SESSION['username'] ?></h1>

    <div class="navigationMenu">
        <ul>
            <li><a href="/?f=showHome">Home</a></li>
            <li><a href="/?f=userList">Usuários</a></li>
            <li><a href="/?f=carList">Veículos</a></li>
            <li><a href="/?f=driverList">Motoristas</a></li>
            <li><a href="/?f=logout">Logout</a></li>
        </ul>
    </div>
</body>

</html>