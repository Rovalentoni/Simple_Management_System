<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" type="text/css" href="/styles.css">

</head>

<body>


    <div class="center">
        <h1>Seja bem vindo. </h1>
           <h2> Favor efetuar o login para continuar.</h2>

        <form action="/?f=loginSession&try=1" method="POST" class="formlogin">
            <div class="loginInside">
                <div><label>Email:</div> <div><input type="text" name="email"></label></div>
                <div><label>Senha: </div> <div><input type="password" name="password"></label></div>
                <input type="hidden" name="try" value="1">
                <input type="submit" value="Entrar" class="buttonEntrar">
            </div>
        </form>
    </div>



</body>

</html>