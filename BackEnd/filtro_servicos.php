<?php
#------------INICIANDO ARQUIVOS--------------
session_start();
include("conexao.php");
#---------RECEBENDO VALORES DIGITADOS---------
$modelo_servico = utf8_decode($_POST['modelo_servico']);
#---------REALIZANDO CONSULTA---------------
$_SESSION['sql'] = "SELECT s.cod_servico, s.modelo_servico, s.imei1_servico, s.imei2_servico, s.cor_servico, s.defeito_servico, s.statos_servico, s.data_time_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente";
#---------RECAREGANDO PAGINA----------------
header('Location: ../FrontEnd/relatorio_servico.php');
?>