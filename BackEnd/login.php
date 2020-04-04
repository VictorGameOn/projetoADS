<?php
#------------INICIANDO ARQUIVOS--------------
session_start();
include("conexao.php");
#---------VERIFICANDO SE ALGO FOI DIGITADO---------
if (empty($_POST['login']) || empty($_POST['senha'])) {
	header('Location: ../FrontEnd/area_login.php');
	exit();
}
#--------RECEBENDO VALORES DIGITADOS---------
$login_ = $_POST['login'];
$senha_ = $_POST['senha'];
#--------BUSCANDO ADMIN OU CLIENTE---------
$query = "SELECT login_admin FROM admin WHERE login_admin = '{$login_}' AND senha_admin = md5('{$senha_}')";
$query2 = "SELECT id_cliente,nickname_cliente FROM cliente WHERE nickname_cliente = '{$login_}' AND senha_cliente = md5('{$senha_}')";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
$result2 = mysqli_query($conexao, $query2);
$row2 = mysqli_num_rows($result2);
$row3 = mysqli_fetch_array($result2);
#-------TESTANDO SE É ADMIN-----------
if($row == 1){
	$_SESSION['usuario'] = $login_;
	header('Location: ../FrontEnd/relatorio_servico.php');
	exit();
#----------TESTANDO SE É CLIENTE----------
}elseif($row2 == 1){
	$_SESSION['usuario'] = $login_;
	$_SESSION['id'] = $row3['id_cliente'];
	header('Location: ../FrontEnd/area_cliente.php');
	exit();
#----------USUARIO NÃO EXISTENTE-----------
}else{
	$_SESSION['nao_autenticado'] = true;
	header('Location: ../FrontEnd/area_login.php');
	exit();
}

?>