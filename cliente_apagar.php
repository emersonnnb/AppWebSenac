<?php
// Sessão
session_start();
// Conexão
require_once 'conexao/conexao.php';

if(isset($_POST['btn-deletar'])):
	
	$id = mysqli_escape_string($conexao, $_POST['id']);

	$sql = "DELETE FROM cliente WHERE id_cliente = '$id'";

	if(mysqli_query($conexao, $sql)):
		$_SESSION['apagado_sucesso'] = true;
		header('Location: cliente_list.php');
	else:
		$_SESSION['erro'] = "Erro ao atualizar";
		header('Location: cliente_editar.php');
    endif;
endif;
?>
