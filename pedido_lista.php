<?php
$page = 'pedidos';
include('includes/header.php');
?>
<!-- Listar usuarios -->
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Listar Pedidos
                <a href="../admin/home.php" class="btn btn-info btn-lg" style="background-color: black; border:none" role="button" aria-disabled="true">Voltar</a>
                </h2><hr>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-bordered ">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Nome cliente</th>
                        <th class="d-none d-lg-table-cell">Data da compra</th>
                        <th>Produto</th>
                        <th>Sub Total</th>
                        <th>Total</th>                        
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                <?php                   
                    include_once 'conexao/conexao.php';

                    $sql = "SELECT * FROM `pedido`";
                    $retorno = mysqli_query($conexao, $sql);

                    while ($array = mysqli_fetch_array($retorno, MYSQLI_ASSOC)) {
                        $id_pedido = $array['id_pedido'];
                        $qtd = $array['qtd'];
                        $sub = $array['sub'];
                        $total = $array['total'];
                        $id_cliente = $array['id_cliente'];
                        $id_produto = $array['id_produto'];
                        $datacompra = $array['datacompra'];
                    ?>
                    <tr>
                        <th><?= $id_pedido ?></th>
                        <td><?= $id_cliente ?> </td>
                        <td><?= $datacompra?> </td>
                        <td><?= $id_produto ?> </td>
                        <td><?= $sub ?> </td>
                        <td><?= $total ?></td>                        
                        <td class="text-center">
                            <span class="d-none d-md-block">
                                <a href="usuario_visualizar.php?id=<?= $id_usuario ?>" class="btn btn-outline-primary btn-sm" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                <a href="usuario_editar.php?id=<?= $id_usuario ?>" class="btn btn-outline-warning btn-sm">Editar</a>
                                <a href="usuario_apagar.php?id=<?= $id_usuario ?>" class="btn btn-outline-danger btn-sm" data-toggle="modal" data-target=" #apagarRegistro">Apagar</a>
                            </span>
                            <div class="dropdown d-block d-md-none">
                                <button class="btn btn-primary dropdown-toggle btn-sm" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Ações
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="acoesListar">
                                    <a class="dropdown-item" href="visualizar.php?id=<?= $id_usuario ?>" data-toggle="modal" data-target="#visualizarRegistro">Visualizar</a>
                                    <a class="dropdown-item" href="usuario_editar.php?id=<?= $id_usuario ?>">Editar</a>
                                    <a class="dropdown-item" href="usuario_apagar.html" data-toggle="modal" data-target="#apagarRegistro">Apagar</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal para confirmar a exclusÃÂ£o de um registro-->
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
                Tem certeza que deseja excluiir o item selecionado?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">NÃÂ£o</button>
                <a href="usuario_apagar.php?id="><button type="button" class="btn btn-danger">Sim</button></a>
            </div>
        </div>
    </div>
</div>

<?php
require('includes/footer.php');
?>