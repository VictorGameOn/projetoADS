<?php
#------------INICIANDO ARQUIVOS--------------
session_start();
include("conexao.php");
#---------RECEBENDO VALORES DIGITADOS---------
$modelo_servico = utf8_decode($_POST['modelo_servico']);
$imei1_servico = $_POST['imei1_servico'];
$imei2_servico = $_POST['imei2_servico'];
$cor_servico = utf8_decode($_POST['cor_servico']);
$defeito_servico = utf8_decode($_POST['defeito_servico']);
$id_cliente = $_SESSION['id'];
#--------GERADOR DE CÓDIGO HEXDECIMAL-------------
do{
$cod_servico = (bin2hex(random_bytes(4)));
$query = "SELECT cod_servico FROM servico WHERE cod_servico = '$cod_servico'";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);
}while ($row = 0);
#---------INSERINDO DADOS NO BD--------------
$query = "INSERT INTO servico (id_cliente, cod_servico, modelo_servico, imei1_servico, imei2_servico, cor_servico, defeito_servico, statos_servico, data_time_servico) VALUES ('$id_cliente', '$cod_servico', '$modelo_servico', '$imei1_servico', '$imei2_servico', '$cor_servico', '$defeito_servico', 'AGUARDANDO ORÇAMENTO', NOW());";
#---------EFETUANDO CADASTRO----------
if($conexao->query($query) === TRUE) {
	$_SESSION['status_cadastro'] = true;
	header('Location: ../FrontEnd/area_cliente.php');
	exit;
}
#---------FINALIZANDO CÓDIGO------------
$conexao->close();
?>