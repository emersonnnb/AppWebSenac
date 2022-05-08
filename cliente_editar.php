<?php
session_start();
$page = 'listar_cliente';
require('includes/header.php'); 
include('conexao/conexao.php');
if(isset($_GET['id'])):
	$id = mysqli_escape_string($conexao, $_GET['id']);
	$sql = "SELECT * FROM cliente WHERE id_cliente = '$id'";
	$resultado = mysqli_query($conexao, $sql);
	$dados = mysqli_fetch_array($resultado);
endif;
?>

    <!-- Adicionando JQuery -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <!-- Adicionando Javascript -->
<script type="text/javascript" >

$(document).ready(function() {

    function limpa_formulário_cep() {
        // Limpa valores do formulário de cep.
        $("#rua").val("");
        $("#bairro").val("");
        $("#cidade").val("");
        $("#uf").val("");
        $("#ibge").val("");
    }
    
    //Quando o campo cep perde o foco.
    $("#cep").blur(function() {

        //Nova variável "cep" somente com dígitos.
        var cep = $(this).val().replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                $("#rua").val("...");
                $("#bairro").val("...");
                $("#cidade").val("...");
                $("#uf").val("...");
                $("#ibge").val("...");

                //Consulta o webservice viacep.com.br/
                $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                    if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#rua").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#cidade").val(dados.localidade);
                        $("#uf").val(dados.uf);
                        $("#ibge").val(dados.ibge);
                    } //end if.
                    else {
                        //CEP pesquisado não foi encontrado.
                        limpa_formulário_cep();
                        alert("CEP não encontrado.");
                    }
                });
            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    });
});
</script>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar cliente</h2>
                <hr>
            </div>
        </div>
        <h5><u>Dados Pessoais</u></h5><br>
        <form action="cliente_update.php" method="POST" enctype="multipart/form-data"  name="cadastro">
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" name="nome" value="<?php echo $dados['nome'];?>" required>
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="nascimento">Data de nascimento</label>
                    <input type="date" class="form-control" id="nascimento" name="nascimento" value="<?php echo $dados['dtnasc'];?>">
                </div>
                <div class="form-group col-12 col-md-2">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" value="<?php echo preg_replace("/(\d{3}+)(\d{3}+)(\d{3}+)(\d{2}+)/", "$1.$2.$3-$4",$dados['cpf']);?>" required>
                </div>
                <div class="form-group col-12 col-md-2">
                    <label for="rg">RG</label>
                    <input type="text" class="form-control" id="rg" name="rg"value="<?php echo preg_replace("/(\d{2}+)(\d{3}+)(\d{3}+)(\d{1}+)/", "$1.$2.$3-$4",$dados['identidade']);?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-12 col-md-3">
                    <label for="senha">Celular</label>
                    <input type="text" class="form-control" id="celular" name="celular" value="<?php echo preg_replace("/(\d{2}+)(\d{5}+)(\d{4}+)/", "($1) $2-$3",$dados['celular']);?>" required>
                </div>
                <div class="form-group col-12 col-md-4">
                    <label for="email">E-mail / Login</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $dados['email'];?>" required>
                </div>
                <div class="form-group col-12 col-md-3">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" name="senha"  value="<?php echo $dados['senha'];?>" required>
                </div>
            </div>
            <h5><u>Endereço</u></h5>
            <HR class="">
            <div class="row">
                <div class="form-group col-3 col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="<?php echo preg_replace("/(\d{5}+)(\d{3}+)/", "$1-$2",$dados['cep']);?>">
                </div>               
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-12">
                    <label for="endereco">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" size="82" readonly value="<?php echo $dados['endereco'];?>">
                </div>
                <div class="form-group col-lg-1">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" value="<?php echo $dados['numero'];?>" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento"  value="<?php echo $dados['complemento'];?>" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" value="<?php echo $dados['bairro'];?>" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly value="<?php echo $dados['cidade'];?>" >
                </div>
                <div class="form-group col-lg-1">
                    <label for="uf">Estado/UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" readonly value="<?php echo $dados['estado'];?>">
                </div>
                <div class="form-group col-lg-3">
                    <label for="imagem">Imagem:</label>
                    <input type="file" class="form-control" id="imagem" placeholder="Imagem" name="imagem"  value="<?php echo $dados['imagem'];?>">
                </div>
            </div>

            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" name="cadastrar" class="btn btn-success" value="Atualizar" />                
            </div>
        </form>        
    </div>   
</div>

<?php require('includes/footer.php') ?>