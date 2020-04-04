<?php
    include "../BackEnd/conexao.php";
    include "../BackEnd/verifica_login.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=width-device, initial-scale=1, shrink-to-fit=no">
		<link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../css/estiloRelatorioADMCliente.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<title>Relatorio Clientes</title>
	</head>
	<body class="body">
		<header>
			<nav class="nav">
				<div class="imagem">
					<img src="../img/gatLogo.png">
				</div>
				<div class="lista">
					<ul>
						<li class="adm">ADMINISTRADOR</li>
						<li>
							<a href="relatorio_servico.php">Serviços</a>
						</li>
						<li>
							<a href="relatorio_clientes.php">Clientes</a>
						</li>
						<li>
							<a href="../BackEnd/logout.php">Sair</a>
						</li>	
					</ul>
				</div>
			</nav>
		</header>	
		<section class="sectionBusca">
			<div class="conteinerFomulario">
				<form method="POST" action="../BackEnd/filtro_clientes.php">
					<input class="input inputText" type="text" name="nome_cliente" placeholder="Nome"><br>
					<input class="input inputBotao" type="submit" name="pesquisar" value="Consultar">
				</form>
				<div class="divButtonImprimir">
					<button class="button">Imprimir</button>
				</div>	
			</div>
		</section>	
		<section class="tabelaSeviçCliente">
			<div class="divTabelaServiço">
				<table class="table">
				    <thead>
				     	<th>Nome</th>
				     	<th>WhatsApp</th>
				     	<th>Telefone</th>
				     	<th>E-mail</th>
				    </thead>
				    <?php 
						$stmt = mysqli_query($conexao, $_SESSION['sql1']);
			    		while ($row = mysqli_fetch_array($stmt)){
    				?>
				    <tbody>
				     	<tr>
				     	  	<td data-label="Nome"><?php echo utf8_encode($row['nome_cliente'])," ", utf8_encode($row['sobrenome_cliente']);?></td>
				     	    <td data-label="WhatsApp"><?php echo $row['fone1_cliente'];?></td>
				     	    <td data-label="Telefone"><?php echo $row['fone2_cliente'];?></td>
				     	  	<td data-label="E-mail"><?php echo $row['email_cliente'];?></td>
				        </tr>
				    </tbody>
				    <?php }?>
				</table>
			</div>
		</section>
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
</html>