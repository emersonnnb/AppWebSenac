<?php
// Sessão
session_start();
// Conexão
include('conexao/conexao.php');

if(isset($_POST['editar'])):
    $id = mysqli_escape_string($conexao, $_POST['id']);
    $nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
    $email = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
    $usuario = mysqli_real_escape_string($conexao, trim($_POST['login']));
    $senha = mysqli_real_escape_string($conexao, trim(sha1($_POST['senha'])));
    

	$sql = "UPDATE acesso_restrito SET nome = '$nome', email = '$email', telefone = '$telefone', senha = '$senha'  WHERE id_restrito = $id";

	if(mysqli_query($conexao, $sql)):
		$_SESSION['atualizacao_sucesso'] = true;
		header('Location: usuario_list.php');
	else:
		$_SESSION['erro_atualizacao'] = "Erro ao atualizar";
		header('Location: usuario_editar.php');
    endif;
endif;
?>

