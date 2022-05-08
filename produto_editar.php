<?php
$page = 'listar_produto';
session_start();
require('includes/header.php');
include('conexao/conexao.php');

if(isset($_GET['id_cliente']) && !empty($_GET['id_cliente'])):
	    $id_cliente = $_REQUEST['cliente'];
		$sql = "select * from cliente where id_cliente=$id_cliente";
		$consulta = mysqli_query($conexao, $sql);
		$dados = mysqli_fetch_array($consulta);
endif;

if (isset($_GET['alterar'])) {
    // Recupera os dados dos campos
    $id_produto = $array['id_produto'];  
    $descricao = $array['descricao'];
      $categoria = $array['categoria'];
      $preco = $array['preco'];
      $imagem = $array['imagem'];
    // Se a foto estiver sido selecionada
if (!empty($imagem["name"])) {
    // Largura máxima em pixels
    $largura = 95000;
    // Altura máxima em pixels
    $altura = 980000;
    // Tamanho máximo do arquivo em bytes
    $tamanho = 1000000000;
    $error = array();
    // Verifica se o arquivo é uma imagem
    if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])){
        $error[1] = "Isso não é uma imagem válida.";
        } 
    // Pega as dimensões da imagem
    $dimensoes = getimagesize($imagem["tmp_name"]);
    // Verifica se a largura da imagem é maior que a largura permitida
    if($dimensoes[0] > $largura) {
        $error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
    }
    // Verifica se a altura da imagem é maior que a altura permitida
    if($dimensoes[1] > $altura) {
        $error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
    }	
    // Verifica se o tamanho da imagem é maior que o tamanho permitido
    if($imagem["size"] > $tamanho) {
            $error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
    }
    // Se não houver nenhum erro
    if (count($error) == 0) {
        // Pega extensão da imagem
        preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $imagem["name"], $ext);
        // Gera um nome único para a imagem
        $nome_imagem = md5(uniqid(time())) . "." . $ext[1];
        // Caminho de onde ficará a imagem
        $caminho_imagem = "fotoscliente/" . $nome_imagem;
        // Faz o upload da imagem para seu respectivo caminho
        move_uploaded_file($imagem["tmp_name"], $caminho_imagem);
        // Insere os dados no banco
$sql = "UPDATE cliente SET nome = '$nome',email = '$email', cpf = '$cpf',rg = '$rg', nascimento = '$nascimento',celular = '$celular',  senha = '$senha', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento', bairro = '$bairro', cidade = '$cidade',estado = '$estado', imagem = '$nome_imagem' WHERE id_cliente= $id_cliente'";


        $consulta = mysqli_query($conexao, $sql);
        // Se os dados forem inseridos com sucesso
        if ($sql){
                echo "
            <script type=\"text/javascript\">
                alert(\"Alterado com Sucesso.\");
            </script>
        ";
        }
    }
    // Se houver mensagens de erro, exibe-as
    if (count($error) != 0) {
        foreach ($error as $erro) {
            echo $erro . "<br />";
        }
    }
    }
}
?>

<div class="content p-1">
    <div class="list-group-item">
        <div class="d-flex">
            <div class="mr-auto p-2">
                <h2 class="display-4 titulo">Editar produto
                <a href="../admin/home.php" class="btn btn-info btn-lg bg-dark">Voltar</a>
                </h2>
                <hr>
            </div>
        </div>
  
<form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" enctype="multipart/form-data" name="alterar" >
<div class="form-group">
                <label for="descricao">Descrição:</label>
                <input type="text" class="form-control" id="descricao" placeholder="descricão" name="descricao">
            </div>
            <div class="form-group">
                <label for="categoria">Categoria:</label>
                <input type="text" class="form-control" id="categoria" placeholder="categoria" name="categoria">
            </div>
            <div class="form-group">
                <label for="preco">Preço:</label>
                <input type="text" class="form-control" id="preco" placeholder="preço" name="preco">
            </div>
            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" class="btn btn-primary" id="imagem" name="imagem">
            </div><br><br>
            <div class="col-sm-offset-2 col-sm-10">
            <input type="submit" name="alterar" class="btn btn-primary"value="Alterar"/>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </div>


</div>
<script src="js/cep.js" type="text/javascript"></script>
<?php require('includes/footer.php') ?>
