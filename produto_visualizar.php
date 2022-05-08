<?php
session_start();
$page = 'listar_produto';
require('includes/header.php');
include('conexao/conexao.php');

if (isset($_GET['id'])) :
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM produto WHERE id_produto = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>


<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Dados do Produto</h2>
                <hr>
            </div>
        </div>
        <form >
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
            
            
        </form>
      
    </div>
    </div>

    <?php require('includes/footer.php') ?>