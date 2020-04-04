<?php
#------------INICIANDO ARQUIVOS--------------
session_start();
include("conexao.php");
#---------RECEBENDO VALORES DIGITADOS---------
$nome_cliente = utf8_decode($_POST['nome_cliente']);
$sobrenome_cliente = utf8_decode($_POST['sobrenome_cliente']);
$nickname_cliente = utf8_decode($_POST['nickname_cliente']);
$fone1_cliente = $_POST['fone1_cliente'];
$fone2_cliente = $_POST['fone2_cliente'];
$email_cliente = utf8_decode($_POST['email_cliente']);
$senha_cliente = utf8_decode(md5($_POST['senha_cliente']));
#--------BUSCANDO NICKNAME NÃO USADO---------
$query = "SELECT count(*) as total  FROM cliente WHERE nickname_cliente = '$nickname_cliente'";
$result = mysqli_query($conexao, $query);
$row = mysqli_fetch_assoc($result);
#--------TESTANDO SE EXISTE NICKNAME-------
if($row['total'] == 1) {
	$_SESSION['erro'] = true;
	header('Location: ../FrontEnd/cadastro_cliente.php');
	exit;
}
#---------INSERINDO DADOS NO BD--------------
$query = "INSERT INTO cliente(nome_cliente, sobrenome_cliente, nickname_cliente, fone1_cliente, fone2_cliente, email_cliente, senha_cliente) VALUES ('$nome_cliente', '$sobrenome_cliente', '$nickname_cliente', '$fone1_cliente', '$fone2_cliente', '$email_cliente', '$senha_cliente')";
#---------TESTANDO SE NÃO EXISTE NICKNAME----------
if($conexao->query($query) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: ../FrontEnd/cadastro_cliente.php');
	exit;
}
#---------FINALIZANDO CÓDIGO------------
$conexao->close();
?>