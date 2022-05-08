<?php
session_start();
include('conexao/conexao.php');
include('password.php');

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
	exit();
}
$usuario = trim($_POST['usuario']);
$password = trim($_POST['senha']);

$sql = "SELECT login, senha, id_restrito FROM acesso_restrito WHERE login = '$usuario' ";
$retornoUsuario = mysqli_query($conexao,$sql);
$totalRetornado = mysqli_num_rows($retornoUsuario);

if($totalRetornado == 0){  
    header("Location: index.php?semCadastro=".$usuario);     
}
if($totalRetornado >= 2){
    header("Location: index.php?UsuarioCadastrado=".$usuario); 
}
if($totalRetornado == 1){
    while($array = mysqli_fetch_array($retornoUsuario,MYSQLI_ASSOC)){
        $senhaCadastrada = $array['senha'];
        $senhaDecodificada = sha1($password);
        if($senhaDecodificada == $senhaCadastrada){
            $_SESSION['usuario'] = $array["id_restrito"];
            header("Location: home.php"); 
        } else{
            header("Location: index.php?dadosInvalidos=1"); 
        }
    }
}
/*
if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "select user from usuario where user = '{$usuario}' and senha = md5('{$senha}')";
 
$result = mysqli_query($conn, $query); 
$row = mysqli_num_rows($result);

if($row == 1) {
	$_SESSION['usuario'] = $usuario;
	header('Location: menu.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('Location: index.php');
	exit();
}
*/
?>