<?php	
#-----------INICIALIZANDO ARQUIVOS---------------------
	session_start();
	include_once("../BackEnd/conexao.php");

#-----------CRIANDO HTML & CSS DENTRO DO PDF-----------

	$html = '
	<style>
	th{
		padding:10px 5px;
		border-style:solid;
		border-width:1px;
		overflow:hidden;
		word-break:normal;
		border-color:black;
		font-weight:bold;
		font-style:italic;
		font-size:20px;
		background-color:#212121;
		color:#4378ff;
		border-color:#4378ff;
		text-align:center;
		vertical-align:top;
		width: 100%;
		height: 100%;
	}
	td{
		font-size:14px;
		padding:10px 5px;
		border-style:solid;
		border-width:1px;
		overflow:hidden;
		word-break:normal;
		background-color:#efefef;
		color:#000000;
		border-color:#4378ff;
		text-align:center;
		vertical-align:top;
		font-weight:bold;
		width: 100%;
		height: 100%;
	}
	h1{
		font-weight:bold;
		font-style:italic;
		font-size:28px;
		background-color:#212121;
		color:#4378ff;
		border-color:#3531ff;
		text-align:center;
		border-radius: 50px;
	}
	</style';

	$html .= '<table style = "border-collapse:collapse;border-spacing:0;" ';	
	$html .= '<thead>';
	$html .= '<tr>';
	$html .= '<th>Código</th>';
	$html .= '<th>IMEI 1</th>';
	$html .= '<th>IMEI 2</th>';
	$html .= '<th>Modelo</th>';
	$html .= '<th>Cor</th>';
	$html .= '<th>Data & Hora</th>';
	$html .= '<th>Status</th>';
	$html .= '</tr>';
	$html .= '</thead>';
	$html .= '<tbody>';

#-------------CONSULTA COM LAÇO DE REPETIÇÃO------------	

	#$result_transacoes = "SELECT * FROM admin";
	$resultado_trasacoes = mysqli_query($conexao, $_SESSION['sql']);
	while($row_transacoes = mysqli_fetch_assoc($resultado_trasacoes)){
		$html .= '<tr><td>'.$row_transacoes['cod_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['imei1_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['imei2_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['modelo_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['cor_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['data_time_servico'] . "</td>";
		$html .= '<td>'.$row_transacoes['statos_servico'] . "</td></tr>";		
	}
	
	$html .= '</tbody>';
	$html .= '</table';

	
	//referenciar o DomPDF com namespace
	use Dompdf\Dompdf;

	// include autoloader
	require_once("dompdf/autoload.inc.php");

	//Criando a Instancia
	$dompdf = new DOMPDF();
	
	// Carrega seu HTML
	$dompdf->load_html('
			<h1>Relatório de Serviços</h1><hr>
			'. $html .'
		');

	//Renderizar o html
	$dompdf->render();

	//Exibibir a página
	$dompdf->stream(
		"relatório", 
		array(
			"Attachment" => false //Para realizar o download somente alterar para true
		)
	);
?>