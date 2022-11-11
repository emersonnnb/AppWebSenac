
	<?php
	session_start();
	include "conexao/conexao.php";

	function limparDados($dado)
	{
		return preg_replace("/[^0-9]/", "", $dado);
	};

	if (isset($_POST['cadastrar'])) {
		// Recupera os dados dos campos
		$nome = $_POST['nome'];
		$nascimento = $_POST['nascimento'];
		$cpf = limparDados($_POST['cpf']);
		$rg = limparDados($_POST['rg']);
		$celular = limparDados($_POST['celular']);
		$email = $_POST['email'];
		$senha = $_POST['senha'];
		$cep = $_POST['cep'];
		$endereco = $_POST['rua'];
		$numero = $_POST['numero'];
		$complemento = $_POST['complemento'];
		$bairro = $_POST['bairro'];
		$cidade = $_POST['cidade'];
		$estado = $_POST['uf'];
		$nome_imagem = 'avatar'.$_POST['nome'];
		
		$sql = "INSERT INTO cliente VALUES(null,'". $nome ."','" . $cpf . "','" . $nascimento . "','" . $rg . "','" . $cep . "','" . $endereco . "','" . $numero . "','" . $complemento . "','" . $bairro . "','" . $cidade . "','" . $estado . "','" . $email . "','" . $senha . "','" . $celular . "','" . $nome_imagem . "')";
					print_r($sql);
				
					if ($conexao->query($sql)) {
					$_SESSION['status_cadastro'] = true;
					$conexao->close();
					header('Location: cliente_list.php');
				}
				else{
					echo "Inlcusão não realizada!!"; 
				}
			}	

	

	?>
    
                                            