<?php
#------------INICIANDO ARQUIVOS--------------
session_start();
include("conexao.php");
#---------RECEBENDO VALORES DIGITADOS---------
$nome_cliente = utf8_decode($_POST['nome_cliente']);
#---------REALIZANDO CONSULTA---------------
$_SESSION['sql1'] = "SELECT nome_cliente, sobrenome_cliente, fone1_cliente, fone2_cliente, email_cliente FROM cliente WHERE nome_cliente LIKE '$nome_cliente%'";
#---------RECAREGANDO PAGINA----------------
header('Location: ../FrontEnd/relatorio_cliente.php');
?>