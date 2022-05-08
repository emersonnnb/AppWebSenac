<?php
session_start();
$page = 'novo_produto';
require('includes/header.php');
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Cadastrar Produto</h2>
                <hr>
            </div>
        </div>
        <form class="form-horizontal" action="produto_cadastrar.php" method="POST" enctype="multipart/form-data" name="cadastro">
            <div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" placeholder="descricão" name="descricao">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" placeholder="categoria" name="categoria">
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" class="form-control" id="preco" placeholder="preço" name="preco">
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" class="btn btn-primary" id="imagem" name="imagem">
            </div><br><br>
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>
        </form>
        <?php
        if (isset($_SESSION['produto_existe'])) :
        ?>
            <div class="alert alert-danger">
                <p>O produto já existe.
            </div>
        <?php
        endif;
        unset($_SESSION['produto_existe']);
        ?>
        <?php
        if (isset($_SESSION['status_cadastro'])) :
        ?>
            <div class="alert alert-success">
                <p>Produto cadastrado com sucesso!!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    </div>
    </div>

    <?php require('includes/footer.php') ?>