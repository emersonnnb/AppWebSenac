<?php
include('includes/header.php');
include('conexao/conexao.php');
$page = 'home';

//contador de Usuarios
$user = "SELECT COUNT(id_restrito) AS TOTAL FROM acesso_restrito";
$result_user = mysqli_query($conexao, $user);
$row_user = mysqli_fetch_assoc($result_user);
$saldo_user = $row_user['TOTAL'];
// contador de cliente
$cliente = "SELECT COUNT(id_cliente) AS TOTAL FROM cliente";
$result_cliente = mysqli_query($conexao, $cliente);
$row_cliente = mysqli_fetch_assoc($result_cliente);
$saldo_cliente = $row_cliente['TOTAL'];
// contador de produto
$produto = "SELECT COUNT(id_produto) AS TOTAL FROM produto";
$result_produto = mysqli_query($conexao, $produto);
$row_produto = mysqli_fetch_assoc($result_produto);
$saldo_produto = $row_produto['TOTAL'];
// contador de cliente
$pedido = "SELECT COUNT(id_pedido) AS TOTAL FROM pedido";
$result_pedido = mysqli_query($conexao, $pedido);
$row_pedido = mysqli_fetch_assoc($result_pedido);
$saldo_pedido = $row_pedido['TOTAL'];

?>

<div class="content p-1">
    <div class="list-group-item ">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Bem Vindo, ao Dashboard!</h2>
            </div>
        </div>
        <div class="row mb-3 d-flex justify-content-between">
            <div class="col-lg-4 col-sm-6 ">
                <a href="./usuario_listas.php" style="text-decoration:none">
                    <div class="card text-white" style="background-color:#B22222">
                        <div class="card-body">
                            <i class="fas fa-users fa-3x"></i>
                            <h6 class="card-title">Usuários</h6>
                            <h2 class="lead"><?php echo  $saldo_user ?></h2>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-lg-4 col-sm-6">
                <a href="./cliente_list.php" style="text-decoration:none">
                    <div class="card text-white" style="background-color:#4F4F4F">
                        <div class="card-body">
                            <i class="fas fa-shopping-bag fa-3x"></i>
                            <h6 class="card-title">Clientes</h6>
                            <h2 class="lead"><?php echo  $saldo_cliente ?></h2>
                        </div>
                    </div>
            </div>

            <div class="col-lg-4 col-sm-6">
                <a href="./produto_list.php" style="text-decoration:none">
                    <div class="card text-white" style="background-color:#A52A2A">
                        <div class="card-body">
                            <i class="fas fa-list-ul fa-3x"></i>
                            <h6 class="card-title ">Produtos</h6>
                            <h2 class="lead"><?php echo  $saldo_produto ?></h2>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include('includes/footer.php');
?>