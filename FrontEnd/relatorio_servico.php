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
		<link rel="stylesheet" type="text/css" href="../css/estiloRelatorioADM.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<title>Relatorio Serviços</title>
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
							<a href="relatorio_cliente.php">Clientes</a>
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
				<form>
					<input class="input inputText" type="text" name="data_time_servico" placeholder="Data"><br>
					<input class="input inputText" type="text" name="modelo_servico" placeholder="Modelo"><br>
					<input class="input inputText" type="text" name="cod_servico" placeholder="Cod"><br>
					<input class="input inputText" type="text" name="statos_servico" placeholder="Status"><br>
					<input class="input inputBotao" type="submit" name="pesquisar" value="Consultar">
				</form>
				<div class="divButtonImprimir">
					<button class="button"><a href="gerador_pdf.php">Imprimir</a></button>
				</div>	
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
				        <th>Mais Informações</th>
				    </thead>
				    <?php 
				    	$_SESSION['sql'] = "SELECT s.cod_servico, s.modelo_servico, s.imei1_servico, s.imei2_servico, s.cor_servico, s.defeito_servico, s.statos_servico, s.data_time_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente";
						$stmt = mysqli_query($conexao, $_SESSION['sql']);
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
			     	  	  <td data-label="Staus"><?php echo utf8_encode($row['statos_servico']);?></td>
				             <td data-label="Cliente"><button class="buttonDescrição" data-toggle="modal" data-target=".bd-example-modal-xl">Clique Aqui</button>
				            </td>
				        </tr>
				    </tbody>
				    <?php }?>
				</table>
			</div>
		</section>
		<!-- Inicio Modal -->
		<?php	    	
	    	$_SESSION['sql2'] = "SELECT s.cod_servico,s.defeito_servico, s.statos_servico, c.nome_cliente, c.sobrenome_cliente, c.fone1_cliente, c.fone2_cliente, c.email_cliente FROM servico s, cliente c WHERE s.id_cliente = c.id_cliente";
	    	$stmt = mysqli_query($conexao, $_SESSION['sql2']);

			while ($row = mysqli_fetch_array($stmt)){
			?>
		<div id="<?php echo $row['cod_servico'];?>" class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="false">
			<div class="modal-dialog modal-xl">
			    <div class="modal-content">
				      	<!-- Inicio do cabeçalho Modal -->
				      <div class="modalInformacoaCliente modal-header">
				        <h5 class="modal-title" id="TituloModalLongoExemplo">Mais Informações</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
				          <span class="xColor" aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <!-- Fim do cabeçalho Modal -->
				      <!-- Inicio do corpo0 Modal -->
				      <div class="modal-body">
							<div class="container-fluid">
							    <div class="row">
							      <div class="col-12">
		   							 <section class="tabelaSeviçCliente">
										<div class="divTabelaServiço">
											<table class="table">
											    <thead>
											     	<th>Nome</th>
											     	<th>WhatsApp</th>
											     	<th>Telefone 2</th>
											     	<th>E-mail</th>
											    </thead>
											    <tbody>
											     	<tr>
											     	    <td data-label="Nome"><?php echo utf8_encode($row['nome_cliente'])," ", utf8_encode($row['sobrenome_cliente']);?></td>
											     	    <td data-label="WhatsApp"><?php echo $row['fone1_cliente'];?></td>
											     	    <td data-label="Telefone"><?php echo $row['fone2_cliente'];?></td>
											     	  	<td data-label="E-mail"><?php echo $row['email_cliente'];?></td>
											        </tr>
											    </tbody>
											</table>
										</div>
									</section>
							      </div>
							    </div>

							    <div class="row">
							      <div class="col-12">
							      	<section class="tabelaSeviçCliente">
										<div class="divTabelaServiço">
											<table class="table">
											    <thead>
											     	<th>Status</th>
											    </thead>
											    <tbody>
											     	<tr>
											     	    <td data-label="Staus">
											     	    	<form>
											     	  			<select>
												     	  			<option>Aguardando Aparelho</option>
												     	  			<option>Em Andamento</option>
												     	  			<option>Finalizado</option>
												     	  			<option>Não foi Possivel Consertar</option>
											     	  			</select>
											     	  			<button class="salvarButton">Salvar</button>
											     	  		</form>
									     	  		    </td>
											        </tr>
											    </tbody>
											</table>
										</div>
									</section> 		
							      </div>
							    </div>
							    <div class="row">
							      <div class="col-12">
							      	<section class="tabelaSeviçCliente">
										<div class="divTabelaServiço">
											<table class="table">
											    <thead>
											     	<th>Descrição</th>
											    </thead>
											    <tbody>
											     	<tr>
											     	  <td data-label="Descrição"><?php echo $row['defeito_servico'];?></td>
											        </tr>
											    </tbody>
											    <?php }?>
											</table>
										</div>
									</section> 		
							      </div>
							    </div>
							</div>
			    		</div>
			    	<!-- Fim do corpo Modal -->
			</div>
		</div>
	</div>
		<!--Fim Modal -->
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
</html>