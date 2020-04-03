<?php
session_start();
include('conexao.php');
require_once __DIR__ . '/mpdf/vendor/autoload.php';
	
	$result_usuario = "SELECT s.cod_servico, s.modelo_servico, s.imei1_servico, s.imei2_servico, s.cor_servico, s.defeito_servico, s.statos_servico, s.data_time_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente ";
	$resultado_usuario = mysqli_query($conexao, $result_usuario);	
	$row_usuario = mysqli_fetch_assoc($resultado_usuario);	
	
	
	$pagina = 
		"<html>
			<body>
				<h1>Informações do Usuário</h1>
				Id: ".echo $row_usuario['id']."<br>
				Nome: ".echo $row_usuario['nome']."<br>
				E-mail: ".echo $row_usuario['email']."<br>
				Senha: ".echo $row_usuario['senha']."<br>
				<h4>http://www.celke.com.br</h4>
			</body>
		</html>
		";

$arquivo = "RelatórioDeServiços.pdf";
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($pagina);
$mpdf->Output($arquivo, 'I');

// I - Abre no navegador
// F - Salva o arquivo no servido
// D - Salva o arquivo no computador do usuário
?>
