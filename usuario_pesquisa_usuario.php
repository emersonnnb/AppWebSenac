<?php
$page = 'buscar_usuario';
$nome = $_POST['nome'];;
$dados = $restrito->pesquisarPorNome($nome);
require('includes/header.php');
require('conexao/conexao.php');      
?>
<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h1>Resultado da Busca</h1>
            </div>
        </div>
        <section class="container table-responsive" style="background-color: white; width: 80%; padding: 2em; border-radius: 2em;  ">
            <h1>Pesquisa por: <?php echo $nome; ?></h1>
            <?php if (isset($dados)) { ?>
                <div class="col-md-10">
                    <div class="row">
                        <div class="col-md-10">
                            <div class="panel-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>NOME</th>
                                            <th>TELEFONE</th>
                                            <th>EMAIL</th>
                                            <th>LOGIN</th>
                                            <th>SENHA</th>
                                        </tr>
                                    </thead>
                                    <?php
                                    foreach ($dados as $dado => $coluna) {
                                        echo "<tr>";
                                        echo "<td>" . $coluna['id'] . "</td>";
                                        echo "<td>" . $coluna['nome'] . "</td>";
                                        echo "<td>" . $coluna['telefone'] . "</td>";
                                        echo "<td>" . $coluna['email'] . "</td>";
                                        echo "<td>" . $coluna['login'] . "</td>";
                                        echo "<td>" . $coluna['senha'] . "</td>";
                                        echo "</tr>";
                                    }
                                    ?>
                                <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<?php include "includes/footer.php" ?>