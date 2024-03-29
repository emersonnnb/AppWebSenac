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
        $("#telefone").mask("(00)0000-0000")

        function limpa_formulário_cep() {
            // Limpa valores do formulário de cep.
            $("#rua").val("");
            $("#bairro").val("");
            $("#cidade").val("");
            $("#uf").val("");
            $("#ibge").val("");
        }
    });
</script>

<!-- Formulario de cadastro  -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h1 class="display-4 titulo"><b>Cadastrar Usuário</b></h1>
                <hr>
            </div>
        </div>
        <div class="bg-white text-center">
            <h3 class="display-4 titulo">
                <h5>Dados Pessoais</h5>
            </h3>
            <hr>
        </div>
        <style type="text/css">
            hr {
                background-color: #ddd;
                height: 1px;
            }
        </style>

        <form name="usuario" method="POST" action="usuario_cadastrar.php">
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="nome">Nome Completo</label>
                    <input type="text" class="form-control" id="nome" placeholder="Insira seu nome" name="nome" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control" id="email" style="width:340px; height:40px;" placeholder="email@example.com" name="email" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" id="telefone" style="width:145px; height:40px;" placeholder="(XX) XXXX-XXXX " name="telefone" required>
                </div>

            </div>
            <div class="row">
                <div class="form-group col-md-2">
                    <label for="celular">Celular</label>
                    <input type="text" class="form-control" id="celular" placeholder="(XX) XXXX-XXXX" name="celular" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="nome">Login</label>
                    <input type="text" class="form-control" id="login" placeholder="login" name="login" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="senha">Senha</label>
                    <input type="password" class="form-control" id="senha" placeholder="Senha" name="senha" required>
                </div>
                <div class="form-group col-md-2">

                </div>
                <div class="form-group col-md-2">
                    <label for="tipo">Tipo</label>
                    <select name="tipo" class="form-control" id="tipo" placeholder="*Selecione*" name="tipo" required>
                        <option value="" selected="selected">*Selecione*</option>
                        <option value="1">Usuário</option>
                        <option value="2">Administrador</option>
                    </select>
                </div>
            </div>


            <!-- <div class="bg-white text-center">
                <br>
                <h5>Endereço</h5>
                </h4>
            </div>
            <hr>
            <style type="text/css">
            h4 {
                height: 90px;
                width: 150px;
            }
            </style>

            <div class="row">
                <div class="form-group col-3 col-md-3">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" value="" placeholder="Insira o CEP">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-lg-3 col-12">
                    <label for="endereco">Rua</label>
                    <input type="text" class="form-control" id="rua" name="rua" size="82" readonly>
                </div>
                <div class="form-group col-lg-1">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Numero" required>
                </div>
                <div class="form-group col-lg-3">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" style="width:225px;height:40px;" id="complemento"
                        name="complemento" placeholder="casa/apartamento/bloco" required>
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

            </div> -->
            <div class="row mt-4">
                <div class="form-group col-md">
                    <input type="submit" name="cadastrar" class="btn btn-primary" value="Cadastrar" />
                    <button type="reset" class="btn btn-danger">Limpar</button>
                </div>
            </div>

        </form>
        <br>
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