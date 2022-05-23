<?php
session_start();
include("conexao/conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$celular = mysqli_real_escape_string($conexao, trim($_POST['celular']));
$usuario = mysqli_real_escape_string($conexao, trim($_POST['login']));
$senha = mysqli_real_escape_string($conexao, trim(sha1($_POST['senha'])));
$tipo = mysqli_real_escape_string($conexao, trim(sha1($_POST['tipo'])));


$sql = "select count(*) as total from acesso_restrito where login = '$usuario'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1) {
	$_SESSION['usuario_existe'] = true;
	header('Location: usuario_cadastro.php');
	exit;
}

$sql = "INSERT INTO acesso_restrito (nome, email, telefone,celular,login,senha,tipo) VALUES ('$nome', '$email', '$telefone', '$celular', '$usuario','$senha', '$tipo' )";

if ($conexao->query($sql) === TRUE) {
	$_SESSION['status_cadastro'] = true;
}

$conexao->close();
header('Location: usuario_cadastro.php');
exit;
?>