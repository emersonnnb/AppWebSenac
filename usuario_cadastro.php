<?php
session_start();
$page = 'novo_usuario';
require('includes/header.php');
?>
<script type="text/javascript">
    $(document).ready(function() {

        $("#cpf").mask("000.000.000-00")
        $("#rg").mask("00.000.000-0")
        $("#celular").mask("(00)00000-0000")

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
                if (validacep.test(cep)) {

                    //Preenche os campos com "..." enquanto consulta webservice.
                    $("#rua").val("...");
                    $("#bairro").val("...");
                    $("#cidade").val("...");
                    $("#uf").val("...");
                    $("#ibge").val("...");

                    //Consulta o webservice viacep.com.br/
                    $.getJSON("https://viacep.com.br/ws/" + cep + "/json/?callback=?", function(dados) {

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

<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Cadastrar</h2>
                <hr>
            </div>
        </div>
        <form name="usuario" method="POST" action="usuario_cadastrar.php">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome completo</label>
                    <input type="text" class="form-control" id="nome" placeholder="Nome" name="nome" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" placeholder="E-mail" name="email" required>
                </div>
                <div class="form-group col-md-3">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" placeholder="Telefone " name="telefone" required>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" placeholder="Celular" name="celular" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="nome">Login de acesso</label>
                    <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="nivel">Tipo de Acesso</label>
                    <select id="nivel" class="form-control">
                        <option value="2">Administrador</option>
                        <option value="1" selected>Usuário</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-6 col-md-2">
                    <b><label for="cep">Buscador de Endereço</label></b>
                    <input type="text" class="form-control" id="cep" name="cep" value="" placeholder="Insira o CEP aqui!!">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3 col-12">
                    <label for="endereco">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" size="82" readonly>
                </div>
                <div class="form-group col-lg-1">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero da casa" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" placeholder="casa/apartamento/bloco" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" name="bairro" readonly>
                </div>
                <div class="form-group col-lg-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                </div>
                <div class="form-group col-lg-1">
                    <label for="uf">Estado/UF</label>
                    <input type="text" class="form-control" id="uf" name="uf" readonly>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md">
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
                    <button type="reset" class="btn btn-danger">Limpar</button>
                </div>
            </div>




        </form><br>
        <?php
        if (isset($_SESSION['usuario_existe'])) :
        ?>
            <div class="alert alert-danger">
                <p>O usuário já existe.
            </div>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
        <?php
        if (isset($_SESSION['status_cadastro'])) :
        ?>
            <div class="alert alert-success">
                <p>Cadastro com sucesso!!</p>
            </div>
        <?php
        endif;
        unset($_SESSION['status_cadastro']);
        ?>
    </div>
</div>


<?php
require('includes/footer.php');
?>