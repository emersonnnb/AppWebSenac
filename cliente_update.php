
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
		$imagem = $_FILES["imagem"];
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
			if (!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $imagem["type"])) {
				$error[1] = "Isso não é uma imagem válida.";
			}
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($imagem["tmp_name"]);
			// Verifica se a largura da imagem é maior que a largura permitida
			if ($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não deve ultrapassar " . $largura . " pixels";
			}
			// Verifica se a altura da imagem é maior que a altura permitida
			if ($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar " . $altura . " pixels";
			}
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if ($imagem["size"] > $tamanho) {
				$error[4] = "A imagem deve ter no máximo " . $tamanho . " bytes";
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
				//$sql = "insert into cliente values(null,'" . $nome . "','" . $cpf . "','" . $nascimento . "','" . $rg . "','" . $cep . "','" . $endereco . "','" . $numero . "','" . $complemento . "','" . $bairro . "','" . $cidade . "','" . $estado . "','" . $email . "','" . $senha . "','" . $celular . "','" . $nome_imagem . "')";

				$sql = "UPDATE cliente SET nome = '$nome', cpf = '$cpf', dtnasc = '$nascimento', identidade = '$rg', cep = '$cep', endereco = '$endereco', numero = '$numero', complemento = '$complemento',bairro = '$bairro', cidade = '$cidade', estado = '$estado', email = '$email', senha = '$senha', celular = '$celular',imagem = '$nome_imagem'  WHERE id_cliente = $id";

				if ($conexao->query($sql) === TRUE) {
					$_SESSION['atualizacao_sucesso'] = true;
				}
			}
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