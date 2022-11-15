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
    <link rel="stylesheet" href="css/fonts.css">
    <title>GAP</title>
    <script src="https://kit.fontawesome.com/15b4b8b90e.js"></script>
</head>

<body>
    <div class="main-login">
        <div class="container tamanho-largura">
            <h2 class="text-center text-titulo-login">ACESSO RESTRITO</h2>
            <div class="d-flex justify-content-center">
                <img src="img/imgTelaLogin.png" width="300px" height="208px" alt="">
            </div>
            <form action="logar.php" method="POST" class="log-form">
                <div class="form-group">
                    <label class="log-user"> Login do Usuário</label>
                    <input class="form-control log-user" type="text" name="usuario" placeholder="Digite o seu login" autocomplete="off" required />
                </div>

                <div class="form-group">
                    <label class="log-pass">Senha</label>
                    <input class="form-control log-pass" type="password" name="senha" placeholder="Digite sua senha" autocomplete="off" required />
                </div>
                <button type="submit" class="log-btn-entrar">Entrar</button>
            </form><br>


        </div>
    </div>
</body>

</html>