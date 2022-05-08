<?php
$page = 'listar_usuario';
session_start();
require('includes/header.php');
include('conexao/conexao.php');
if(isset($_GET['id'])):
	$id = mysqli_escape_string($conexao, $_GET['id']);
	$sql = "SELECT * FROM acesso_restrito WHERE id_restrito = '$id'";
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>


<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar Usuário</h2>
                <hr>
            </div>
        </div>
        <form name="usuario" method="POST" action="usuario_update.php">
                <input type="hidden" name="id" value="<?php echo $dados['id_restrito'];?>">
                <div class="form-group ">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" value="<?php echo $dados['nome'];?>" required>
                </div>

                <div class="form-group">
                    <label for="email">E-mail:</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo $dados['email'];?>" required>
                </div>
                <div class="form-group">
                    <label for="telefone">Telefone:</label>
                    <input type="text" class="form-control" id="telefone" placeholder="telefone " name="telefone" value="<?php echo $dados['telefone'];?>" required>
                </div>
                <div class="form-group">
                    <label for="nome">Login:</label>
                    <input type="text" class="form-control" id="login" placeholder="login" name="login" value="<?php echo $dados['login'];?>" required >
                </div>
                <div class="form-group">
                    <label for="senha">Senha:</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha">
                </div>
                <input type="submit" name="editar" class="btn btn-success" value="Atualizar">
                <a class="btn btn-primary" href="usuario_list.php" role="button">Voltar</a>
            </form>
    </div>
</div>

<?php
require('includes/footer.php');
?>