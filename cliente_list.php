<?php
session_start();
$page = 'listar_cliente';
require('includes/header.php');
?>
<script type="text/javascript" >

$(document).ready(function() {

    $("#cpf").mask("000.000.000-00")

</script>

<!-- Listar clientes -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Listar Clientes
                <a href="../admin/home.php" class="btn btn-info btn-lg" style="background-color: black; border:none" role="button" aria-disabled="true">Voltar</a>
                </h2>
                <hr>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered ">
                <thead>
                    <tr>                        
                        <th>Nome</th>
                        <th>CPF</th>
                        <th class="d-none d-lg-table-cell">E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    include_once 'conexao/conexao.php';
                    $sql = "SELECT id_cliente,nome,cpf,email FROM `cliente`";
                    $retorno = mysqli_query($conexao, $sql);

                    while ($array = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                        $id_cliente = $array['id_cliente'];
                        $nome = $array['nome'];                        
                        $cpf = preg_replace("/(\d{3}+)(\d{3}+)(\d{3}+)(\d{2}+)/", "$1.$2.$3-$4", $array['cpf']);
                        $email = $array['email'];

                    ?>
                        <tr>                            
                            <td><?= $nome ?></td>
                            <td><?= $cpf ?></td>
                            <td class="d-none d-lg-table-cell"><?= $email ?></td>
                            <td class="text-center">
                                <span class="d-none d-md-block">
                                    <a href="cliente_visualizar.php?id=<?= $id_cliente ?>" class="btn btn-outline-primary btn-sm">Visualizar</a>
                                    <a href="cliente_editar.php?id=<?= $id_cliente ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                    <a href="cliente_apagar.php?id=<?= $id_cliente ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target=" #apagarRegistro">Apagar</a>
                                </span>
                                <div class="dropdown d-block d-md-none">
                                    <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Ações
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                        <a class="dropdown-item" href="cliente_visualizar.php?id=<?= $id_cliente ?>">Visualizar</a>
                                        <a class="dropdown-item" href="cliente_editar.php?id=<?= $id_cliente ?>">Editar</a>
                                        <a class="dropdown-item" href="cliente_apagar.html" data-toggle="modal" data-target="#apagarRegistro">Apagar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table><br>
            <!--alert de atualizado com sucesso-->
            <?php
            if (isset($_SESSION['atualizacao_sucesso'])) :
            ?>
                <div class="alert alert-success col-lg-2">
                    <p>Atualizado com sucesso!!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['atualizacao_sucesso']);
            ?>
            <!--alert de erro ao atualizar-->
            
            <!--alert de apagado com sucesso-->
            <?php
            if (isset($_SESSION['apagado_sucesso'])) :
            ?>
                <div class="alert alert-success col-lg-2">
                    <p>Apagado com sucesso!!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['apagado_sucesso']);
            ?>
            <?php
            if (isset($_SESSION['status_cadastro'])) :
            ?>
                <div class="alert alert-success">
                    <p>Cliente cadastrado com sucesso!!</p>
                </div>
            <?php
            endif;
            unset($_SESSION['status_cadastro']);
            ?>

        </div>
    </div>
</div>
<!-- Modal para confirmar a exclusão de um registro-->
<div class="modal fade" id="apagarRegistro" tabindex="-1" role="dialog" aria-labelledby="apagarRegistro" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="exampleModalLabel">Excluir item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Tem certeza que deseja excluir o cliente selecionado?
            </div>
            <div class="modal-footer">
                <form action="cliente_apagar.php" method="POST">
                    <input type="hidden" name="id" value="<?= $id_cliente ?>">
                    <button type="submit" name="btn-deletar" class="btn btn-danger">Sim</button>
                    <a href="" class="modal-action modal-close waves-effect waves-green btn btn-success">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
require('includes/footer.php');
?>