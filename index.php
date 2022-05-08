<?php session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/estilo_login.css">
    <script src="https://kit.fontawesome.com/15b4b8b90e.js"></script>
</head>

<body>
    <div class="container tamanho-largura">
        <h2 class="text-center">ACESSO RESTRITO</h2>
        <div class="d-flex justify-content-center">
            <img src="img/restrito.png" width="125px" height="125px" alt="">
        </div>
        <form action="logar.php" method="POST">
            <div class="form-group">
                <strong><label> Login do Usuário</label></strong>
                <input class="form-control" type="text" name="usuario" placeholder="Digite o seu login"
                    autocomplete="off" required />
            </div>

            <div class="form-group">
                <strong><label>Senha</label></strong>
                <input class="form-control" type="password" name="senha" placeholder="Digite sua senha"
                    autocomplete="off" required />
            </div>
            <button type="submit" class="btn btn-primary btn-lg btn-block " style="background-color: red; border:none">Entrar</button>        
        </form><br>
        <a href="../index.php" class="btn btn-info btn-lg" style="background-color: black; border:none" role="button" aria-disabled="true">Home</a>

    </div>
</body>
</html>