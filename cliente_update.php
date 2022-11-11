
	<?php
	session_start();
	include "conexao/conexao.php";

	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
		$nascimento = $_POST['nascimento'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$celular = $_POST['celular'];
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cep = $_POST['cep'];
		$endereco = $_POST['rua'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['uf'];
		$nome_imagem = "avatar" . $_POST['nome'];
		$id= $_POST['id'];

		$sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', dtnasc = '$nascimento', identidade = '$rg', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento',bairro = '$bairro', cidade = '$cidade', estado = '$estado', email = '$email', senha = '$senha', celular = '$celular',imagem = '$nome_imagem'  WHERE id_cliente = $id";
		print_r($sql);
		if ($conexao->query($sql)) {
			$_SESSION['atualizacao_sucesso'] = true;
		}
	}


	$conexao->close();
	header('Location: cliente_list.php');
	exit;

	?>
    
                                            






<?php
/*
// Sessão
session_start();
// Conexão
include('conexao/conexao.php');

if(isset($_POST['editar'])):
		$id = mysqli_escape_string($conexao, $_POST['id']);
		$nome = $_POST['nome'];
		$email = $_POST['email'];
		$cpf = $_POST['cpf'];
		$rg = $_POST['rg'];
		$nascimento = $_POST['nascimento'];
		$celular = $_POST['celular'];
		$senha = $_POST['senha'];
		$cep = $_POST['cep'];
		$endereco = $_POST['endereco'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['estado'];
		$imagem = $_FILES["imagem"];
    

	$sql = "UPDATE cliente SET nome = '$nome',cpf = '$cpf'dtnasc = '$dtnasc',cep = '$cep',endereco = '$endereco',numero = '$numero',complemento = '$complemento',bairro = '$bairro',cidade = '$cidade',estado = '$estado',celular = '$celular' email = '$email',  senha = '$senha'imagem = '$imagem'  WHERE id_cliente = $id";

	if(mysqli_query($conexao, $sql)):
		$_SESSION['atualizacao_sucesso'] = true;
		header('Location: cliente_list.php');
	else:
		$_SESSION['erro_atualizacao'] = "Erro ao atualizar";
		header('Location: cliente_editar.php');
    endif;
endif;
*/
?>