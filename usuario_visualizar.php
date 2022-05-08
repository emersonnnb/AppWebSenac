<?php
session_start();
$page = 'listar_usuario';
require('includes/header.php');
include('conexao/conexao.php');
if (isset($_GET['id'])) :
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM acesso_restrito WHERE id_restrito = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Dados do cadastro</h2>
                <hr>
            </div>
        </div>
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $dados['nome'];?>">
        </div>
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $dados['email'];?>">
        </div>
        <div class="form-group">
            <label for="celular">Telefone:</label>
            <input type="text" class="form-control" id="telefone" placeholder="Celular " name="telefone" value="<?php echo $dados['telefone'];?>">
        </div>
        <div class="form-group">
            <label for="nome">Login:</label>
            <input type="text" class="form-control" id="login" placeholder="login" name="login" value="<?php echo $dados['login'];?>">
        </div>        
    </div>
</div>


<?php
require('includes/footer.php');
?>