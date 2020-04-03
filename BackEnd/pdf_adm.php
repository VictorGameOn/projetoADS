<?php
session_start();
include('conexao.php');
require_once __DIR__ . '/mpdf/vendor/autoload.php';

$pdf ='
<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-6m3b{font-size:20px;background-color:#efefef;color:#000000;border-color:#4378ff;text-align:center;vertical-align:top}
.tg .tg-dpda{font-weight:bold;font-style:italic;font-size:20px;background-color:#212121;color:#4378ff;border-color:#4378ff;text-align:center;vertical-align:top}
h1{font-weight:bold;font-style:italic;font-size:28px;background-color:#212121;color:#4378ff;border-color:#3531ff;text-align:center;vertical-align:top;border-radius: 50px}
</style>
<h1>Relatório de Serviços</h1><hr>
<table class="tg">
  <tr>
    <th class="tg-dpda">Cod.</th>
    <th class="tg-dpda">IMEI 1</th>
    <th class="tg-dpda">IMEI 2</th>
    <th class="tg-dpda">Modelo</th>
    <th class="tg-dpda">Cor</th>
    <th class="tg-dpda">Data & Hora</th>
    <th class="tg-dpda">Status</th>
  </tr>';
	
	$stmt = mysqli_query($conexao, $_SESSION['sql']);
	while ($row = mysqli_fetch_array($stmt)){

$pdf .= '
  <tr>
    <td class="tg-6m3b">x</td>
    <td class="tg-6m3b">z</td>
    <td class="tg-6m3b">y</td>
    <td class="tg-6m3b">@</td>
    <td class="tg-6m3b">#</td>
    <td class="tg-6m3b">$</td>
    <td class="tg-6m3b">0</td>
  </tr>';
  }
$pdf .= '</table>';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML($pdf);
$mpdf->Output();

?>