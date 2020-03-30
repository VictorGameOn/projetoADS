<?php
    session_start();
    include "../BackEnd/conexao.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="../css/estiloLoginAdm.css">
		<link rel="stylesheet" type="text/css" href="../BackEnd/verifica_login.php">
		<title>Login</title>
	</head>
	<body>
		<!--Cabeçalho -->
		<header>
			<a href="index.html"><img src="../img/gatLogo.png"></a>
		</header>
		
			<table class="table table-hover table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-dark">
	                <tr>
	                    <th>Modelo</th>
	                    <th>Imei 1</th>
	                    <th>Imei 2</th>
	                    <th>Cor</th>
	                    <th>Defeito</th>
	                    <th>Statos</th>
	                    <th>Data & Hora</th>
	                    <th><a href="#"></a></th>
                    </tr>
                </thead>

				<?php 
					/*$sql = "SELECT s.cod_servico, s.modelo_servico, s.imei1_servico, s.imei2_servico, s.cor_servico, s.defeito_servico, s.statos_servico, s.data_time_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente";
					$stmt = mysqli_query($conexao, $sql);
		    		while ($row = mysqli_fetch_array($stmt)){*/
    			?>

	    		<tbody>
                    <tr>
                        <td><?php// echo $row['req_id'];?></td>
                	</tr>
                </tbody>
                <?php# }?>

		<footer>
			<div>
				&copy;SoftwareMaker
			</div>
		</footer><!--Fim do footer-->
	</body>
</html>