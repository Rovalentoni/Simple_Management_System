<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="/styles.css">

    <style>
        
        body, html {
  height: 100%;
}
body {
    background-image: url("/Midia/background.png");
            height: 90%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
}
    </style>
</head>

<body>

<div class="bg">
    <div class="center" style="color:white">
        <h1 style="color:white">Seja bem vindo. </h1>
        <h2> Favor efetuar o login para continuar.</h2>

        <form action="/?f=loginSession&try=1" method="POST" class="formlogin">
            <div class="loginInside">
                <div><label>Email:</div>
                <div><input class="inputOriginal" type="text" name="users_email"></label></div>
                <div><label>Senha: </div>
                <div><input class="inputOriginal" type="password" name="users_password"></label></div>
                <input type="hidden" name="try" value="1">
                <input type="submit" value="Entrar" class="buttonEntrar">
            </div>
        </form>
    </div>
    </div>


</body>

</html>