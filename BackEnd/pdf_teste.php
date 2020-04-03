<?php
session_start();
include('conexao.php');
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$pdf ='
<style type="text/css">
table{width: 80%;border-collapse: collapse;}
table td,table th{padding:12px 15px;border:1px solid #ddd;border-radius: 5px;text-align: center;font-size:16px;}
table th{background-color: #212121;color:#4378ff;font-style:italic;}
table td{color:#000;}
h1{font-weight:bold;font-style:italic;font-size:24px;background-color:#212121;color:#4378ff;border-color:#3531ff;text-align:center;font-family:Arial, sans-serif;vertical-align:top;border-radius: 50px}
</style>
<html>
      <body>
<h1>Relatório de Serviços</h1>

  <table>
     <tr>
       <th>Cod.</th>
       <th>IMEI 1</th>
       <th>IMEI 2</th>
       <th>Modelo</th>
       <th>Cor</th>
       <th>Data</th>
       <th>Status</th>
     </tr>';
	$stmt = mysqli_query($conexao, $_SESSION['sql']);
	while ($row = mysqli_fetch_array($stmt)){ 
$cod = $row["cod_servico"];
$imei1 = $row["imei1_servico"];
$imei2 = $row["imei2_servico"];
$modelo = $row["modelo_servico"];
$cor = $row["cor_servico"];
$data_time = $row["data_time_servico"];
$status = $row["statos_servico"];

$pdf .= '
  <tr>
    <td data-label="Cod">$cod;</td>
    <td data-label="IMEI 1"><?php echo $imei1;?></td>
    <td data-label="IMEI 2"><?php echo $imei2;?></td>
    <td data-label="Modelo"><?php echo $modelo;?></td>
    <td data-label="Cor"><?php echo $cor;?></td>
    <td data-label="Data & Hora"><?php echo $data_time;?></td>
    <td data-label="Staus"><?php echo $status;?></td>
  </tr>';
  }
$pdf .= '</table>
      </body>
    </html>';
echo $cod;
$arquivo = "RelatórioDeServiços.pdf";
$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($pdf);
$mpdf->Output($arquivo, 'I');

?>