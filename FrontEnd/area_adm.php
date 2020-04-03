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
		<link rel="stylesheet" type="text/css" href="../css/estiloAdmArea.css">
		<link rel="stylesheet" type="text/css" href="../css/estiloRelatorioADM.css">
		<title>ADM</title>
	</head>
<body>

	<section>
<head>
		<nav class="nav">
			<div>
				<img class="img" src="../img/gatLogo.png">
			</div>
			<div class="lista">
				<ul>
					<li>Olá, <?php echo $_SESSION['usuario'];?></li>
					<li>
						<a href="../BackEnd/logout.php">Sair	</a>
					</li>	
				</ul>
			</div>
		</nav>
	
	</section>	
	<!--
	<section class="sectionBusca">
		<div class="conteinerFomulario">
			<form>
				<input class="inputText" type="text" name="consulta" placeholder="Consulte Serviço" >
				<input class="inputBotao" type="submit" name="pesquisar" value="Consultar">
				<button>Imprimir</button>
			</form>
		</div>
	</section>	
	<section class="tabelaSeviçCliente">
		<div class="divTabelaServiço">
			<table class="table">
			     <thead>
			     	 <th>Cod.</th>
			     	 <th>IMEI 1</th>
			     	 <th>IMEI 2</th>
			     	 <th>Modelo</th>
			     	 <th>Cor</th>
			     	 <th>Data</th>
			     	 <th>Status</th>
			         <th>Descrição</th>
			     </thead>

			     <?php 
					$sql = "SELECT s.cod_servico, s.modelo_servico, s.imei1_servico, s.imei2_servico, s.cor_servico, s.defeito_servico, s.statos_servico, s.data_time_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente";
					$stmt = mysqli_query($conexao, $sql);
		    		while ($row = mysqli_fetch_array($stmt)){
    			?>

			     <tbody>
			     	  <tr>
			     	  	  <td data-label="Cod"><?php echo $row['cod_servico'];?></td>
			     	  	  <td data-label="IMEI 1"><?php echo $row['imei1_servico'];?></td>
			     	  	  <td data-label="IMEI 2"><?php echo $row['imei2_servico'];?></td>
			     	  	  <td data-label="Modelo"><?php echo $row['modelo_servico'];?></td>
			     	  	  <td data-label="Cor"><?php echo $row['cor_servico'];?></td>
			     	  	  <td data-label="Data & Hora"><?php echo $row['data_time_servico'];?></td>
			     	  	  <td data-label="Staus"><?php echo $row['statos_servico'];?></td>
			              <td data-label="Descrição"><button>Clique Aqui</button></td>
			     	  </tr>
			     </tbody>
				<?php }?>
			   </table>
		</div>
	-->
	</section>


	<div class="icon">
		<input type="checkbox" id="idInputCheckbox">
		<label id="inconeToogle" for="idInputCheckbox"><img src="../img/menuToogle.png"></label>
		<div class="barra">
			<nav>

				<div>
					<img src="../img/user.png" width="100" height="100"><br>
					<span>Admin</span>
				</div>
				<a href=""><div class="link">Cadastrar Serviço</div></a>	
				<a href=""><div class="link">Progresso de Serviço</div></a>
				<a href="../BackEnd/logout.php"><div class="link">Sair</div></a>
			</nav>

		</div>
	</div>


	</head>
	</section>
	
</body>
</html>