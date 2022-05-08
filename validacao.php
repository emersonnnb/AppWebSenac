    <?php
    @session_start();
    include('conexao/conexao.php');

    if ($_SESSION["usuario"] == "" || $_SESSION["usuario"] == null) {
        header("Location: index.php");
    }
    $usuarioLogado = $_SESSION["usuario"];   
    $sql = "SELECT login FROM acesso_restrito WHERE id_restrito = $usuarioLogado ";
    $retorno = mysqli_query($conexao, $sql);
    $array = mysqli_fetch_array($retorno);
    //$nivel = $array['tipo_acesso'];
    $user = "SELECT nome FROM acesso_restrito WHERE id_restrito = $usuarioLogado";
    ?> 