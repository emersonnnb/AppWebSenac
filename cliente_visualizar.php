<?php
session_start();
$page = 'listar_cliente';
require('includes/header.php');
include('conexao/conexao.php');

if (isset($_GET['id'])) :
    $id = mysqli_escape_string($conexao, $_GET['id']);
    $sql = "SELECT * FROM cliente WHERE id_cliente = '$id'";
    $resultado = mysqli_query($conexao, $sql);
    $dados = mysqli_fetch_array($resultado);
endif;
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Dados do cliente</h2>
                <hr>
            </div>
        </div>
        <form class="form-horizontal" action="cliente_cadastrar.php" method="POST" enctype="multipart/form-data" name="cadastro">
            <div class="row">
                <div class="form-group col-12 col-md-6">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" maxlength="10" readonly value="<?php echo $dados['nome'];?>" >
                </div>
                <div class="form-group col-12 col-md-6">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" name="email" readonly value="<?php echo $dados['email'];?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" readonly value="<?php echo preg_replace("/(\d{3}+)(\d{3}+)(\d{3}+)(\d{2}+)/", "$1.$2.$3-$4",$dados['cpf']);?>">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg" readonly value="<?php echo preg_replace("/(\d{2}+)(\d{3}+)(\d{3}+)(\d{1}+)/", "$1.$2.$3-$4",$dados['identidade']);?>">
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento" readonly value="<?php echo $dados['dtnasc'];?>" >
                </div>           
                <div class="form-group col-12 col-md-3">
                    <label for="senha">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" readonly value="<?php echo preg_replace("/(\d{2}+)(\d{5}+)(\d{4}+)/", "($1) $2-$3",$dados['celular']);?>">
                </div>                
            </div>
            <br>
            <h5>Endereço</h5>
            <HR>
            <div class="row">
                <div class="form-group col-lg-6 col-6">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep"readonly value="<?php echo preg_replace("/(\d{5}+)(\d{3}+)/", "$1-$2",$dados['cep']);?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-4 col-12">
                    <label for="endereco">Endereço</label>
                    <input type="text" class="form-control" id="endereco" name="endereco" size="82" readonly value="<?php echo $dados['nome'];?>"endereco>
                </div>
                <div class="form-group col-lg-4">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" readonly value="<?php echo $dados['numero'];?>">
                </div>
                <div class="form-group col-lg-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" readonly value="<?php echo $dados['complemento'];?>">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" readonly value="<?php echo $dados['bairro'];?>">
                </div>
                <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly value="<?php echo $dados['cidade'];?>">
                </div>
                <div class="form-group col-md-1">
                    <label for="uf">Estado/UF</label>
                    <input type="text" class="form-control" id="uf" name="estado" readonly value="<?php echo $dados['estado'];?>">
                </div>               
            </div>
        </form>
    </div>
</div>
<?php require('includes/footer.php') ?>