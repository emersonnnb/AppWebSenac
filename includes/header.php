<?php
require('validacao.php');
// Item do menu ativo
$menu = (isset($page)) ? $page : 'index';
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>GAP</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/jquery.mask.min.js"></script>
    <script defer src="js/fontawesome-all.min.js"></script>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>
    <div class="d-flex">
        <nav class="sidebar">
            <ul class="list-unstyled">
                <li class="border-bottom"><a href="home.php"><i class="fas fa-home"></i> HOME</a></li>

                <li class="border-bottom "><a href="#submenu1" data-toggle="collapse"
                        <?php echo ($menu == 'novo_usuario' || $menu == 'listar_usuario' || $menu == 'buscar_usuario') ? 'aria-expanded="true"' : 'null'; ?>>
                        <i class="fas fa-user"></i>
                        Usuário </a>
                    <ul id="submenu1"
                        <?php echo ($menu == 'novo_usuario' || $menu == 'listar_usuario' || $menu == 'buscar_usuario') ? 'class="list-unstyled collapse show"' : 'class="list-unstyled collapse"'; ?>>

                        <li <?php echo ($menu == 'novo_usuario') ? 'class="active"' : null; ?>><a
                                href="usuario_cadastro.php"><i class="fas fa-user-plus"></i> Novo </a></li>
                        <li <?php echo ($menu == 'listar_usuario') ? 'class="active"' : null; ?>><a
                                href="usuario_list.php"><i class="fas fa-users" data-target="#submenu1"></i> Listar </a>
                        </li>
                        <li <?php echo ($menu == 'buscar_usuario') ? 'class="active"' : null; ?>><a
                                href="usuario_buscar.php"><i class="fas fa-search"></i> Buscar </a></li>
                    </ul>
                </li>
                <li class="border-bottom"><a href="#submenu2" data-toggle="collapse"
                        <?php echo ($menu == 'novo_cliente' || $menu == 'listar_cliente') ? 'aria-expanded="true"' : 'null'; ?>>
                        <i class="fas fa-user"></i>
                        Cliente </a>
                    <ul id="submenu2"
                        <?php echo ($menu == 'novo_cliente' || $menu == 'listar_cliente') ? 'class="list-unstyled collapse show"' : 'class="list-unstyled collapse"'; ?>>
                        <li <?php echo ($menu == 'novo_cliente') ? 'class="active"' : null; ?>><a
                                href="cliente_cadastro.php"><i class="fas fa-user-plus"></i> Novo </a></li>
                        <li <?php echo ($menu == 'listar_cliente') ? 'class="active"' : null; ?>><a
                                href="cliente_list.php"><i class="fas fa-users"></i> Listar </a></li>
                    </ul>
                </li>
                <li class="border-bottom"><a href="#submenu3" data-toggle="collapse"
                        <?php echo ($menu == 'novo_produto' || $menu == 'listar_produto') ? 'aria-expanded="true"' : 'null'; ?>><i
                            class="fas fa-list-ul"></i> Produto</a>
                    <ul id="submenu3"
                        <?php echo ($menu == 'novo_produto' || $menu == 'listar_produto') ? 'class="list-unstyled collapse show"' : 'class="list-unstyled collapse"'; ?>>
                        <li <?php echo ($menu == 'novo_produto') ? 'class="active"' : null; ?>><a
                                href="produto_cadastro.php"><i class="fas fa-tags"></i> Novo</a></li>
                        <li <?php echo ($menu == 'listar_produto') ? 'class="active"' : null; ?>><a
                                href="produto_list.php"><i class="fas fa-tags"></i> Listar</a></li>
                    </ul>
                </li>
                <li class="border-bottom"><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a>
                </li>
            </ul>
        </nav>