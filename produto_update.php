<?php
// Sessão
session_start();
// Conexão
include('conexao/conexao.php');

if(isset($_POST['editar'])):
    $id_produto = $array['id_produto'];  
    $descricao = $array['descricao'];
      $categoria = $array['categoria'];
      $preco = $array['preco'];
      $imagem = $array['imagem'];
    

	$sql = "UPDATE produto SET descricao = '$descricao',categoria = '$categoria'preco = '$preco',imagem = '$imagem'  WHERE id_produto = $id";

	if(mysqli_query($conexao, $sql)):
		$_SESSION['atualizacao_sucesso'] = true;
		header('Location: produto_list.php');
	else:
		$_SESSION['erro_atualizacao'] = "Erro ao atualizar";
		header('Location: produto_editar.php');
    endif;
endif;
?>