<?php
include('conexao/conexao.php');

//$conecta = mysql_connect("localhost", "root", "")or die("Erro ao conectar!");
//$banco = mysql_select_db("aula")or die("Erro ao selecionar BD!");
//fim da conexão com o banco de dados

$palavra = $_POST['palavra'];

$sql = "SELECT * FROM acesso_restrito WHERE nome LIKE '%$palavra%'";
$query = mysqli_query($conexao, $sql);
$qtd = mysqli_num_rows($query);
?>

<?php
if ($qtd > 0) {
?>
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <th> Id</th>
                <th> Nome</th>
                <th> Celular</th>
                <th> E-mail</th>
                <th> Login</th>
            </tr>
            <?php
            while ($linha = mysqli_fetch_assoc($query)) {
            ?>
                <tr>
                    <td><?= $linha['id_restrito']; ?></td>
                    <td><?= $linha['nome']; ?></td>
                    <td><?= $linha['telefone']; ?></td>
                    <td><?= $linha['email']; ?></td>
                    <td><?= $linha['login']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
<?php } else { ?>
    <h4>Nao foram encontrados registros com esta palavra.</h4>
<?php } ?>