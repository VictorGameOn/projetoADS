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
		<link rel="stylesheet" type="text/css" href="../css/estiloAreaCliente.css">
		<link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
		<title>Area Cliente</title>
	</head>
	<body class="body">
		<!-- -----------------------Inicio cabeçalho------------------------ -->
		<header >
			<nav class="nav">
				<div>
					<img src="../img/gatLogo.png">
				</div>
				<!-- -----------------Menu----------------------- -->
				<div class="lista">
					<ul>
						<li>Olá, <?php echo $_SESSION['usuario'];?></li>
						<li><!-- Link para abrir o modal -->
							<a href="#" data-toggle="modal" data-target=".bd-example-modal-xl">Meus Serviços</a>
						</li>
						<li>
							<a href="../BackEnd/logout.php">Sair</a>
						</li>	
					</ul>
				</div>
			</nav>
		</header>
		<!-- ------------------------------------------------------------- -->
		<!-- -----------------------Inicio Conteúdo----------------------- -->	
		<section class="section">
			<div class="conteiner">
				<!-- ---------------inicio da div com os avisos---------------- -->
				<div class="avisosFormulario">
					<span>Seja bem-vindo</span>
					<p>
						<ul>
						    - Em caso de não saber acessar o IMEI de seu SmartPhone.<br>
							 Atente-se as especificação a seguir:
							<li>
							Primeiro acesse o teclado numerico de seu smartphone,<br>
							logo em seguida digite o código *#06#, irá aparecer duas<br> numerações
							contendo 15 digitos em cada, corespondendo<br> ao IMEI 1 e IMEI 2.  	
							</li>
							- Caso já tenha algum serviço registrado e queira acamponhar<br>
							o progresso é clicar em <b>Meus Serviços</b>. 
						</ul> 
					</p>
				</div>
			</div>
			<!-- ------------------------------------------------------------- -->
			<!-- -------------------Area do Formulario------------------------ -->	
			<div class="divTabelaServiço">
				<!-- -----------------Mensagem de Sucesso--------------------- -->
				<?php
                    if(isset($_SESSION['status_cadastro'])):
                ?>
				<div class="conteinerMensagemErrorSucesso">
					<div class="iconMensagemErrorSucesso sucCorMesnsagemV">
						<i class="far fa-check-circle"></i>  Serviço efetuado com Sucesso!!
					</div>
				</div>
				<?php
                    endif;
                    unset($_SESSION['status_cadastro']);
                ?>
				<!-- --------------------------------------------------------- -->			
				<form method="POST" action="../BackEnd/cadastrar_servico.php">
					<input class="input inputtextMenor" type="text" name="modelo_servico" placeholder="Modelo" required=""><br>
					<!-- ------------Input com os numeros de IMEI--- -->
					<input class="input inputtextMenor" type="text" name="imei1_servico" placeholder="IMEI 1" required=""><br>
					<input class="input inputtextMenor" type="text" name="imei2_servico" placeholder="IMEI 2" required=""><br>
					<!-- ------------Input com o Cor---------------- -->
					<input class="input inputtextMenor" type="text" name="cor_servico" placeholder="Cor" required=""><br>
					<!-- ------------Area de Descrição-------------- -->	
					<textarea name="defeito_servico" placeholder="Descrição do Defeito"></textarea><br>
					<!-- ------------Input com a Botão-------------- -->
					<input class="input botaoSubmit" type="submit" name="logar" value="Concluir">
				</form>
			</div>
		</section>
			<!-- Inicio Modal -->
			<div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
			  <div class="modal-dialog modal-xl">
			    <div class="modal-content">
			      	<!-- Inicio do cabeçalho Modal -->
			      <div class="modalMeusServicos modal-header">
			        <h5 class="modal-title" id="TituloModalLongoExemplo">Meus Serviços</h5>
			        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
			          <span class="xColor" aria-hidden="true">&times;</span>
			        </button>
			      </div>
			      <!-- Fim do cabeçalho Modal -->
			      <!-- Inicio do corpo0 Modal -->
			      <div class="modal-body">
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
									</thead>
									<?php 
										$id = $_SESSION['id'];
										$sql = "SELECT cod_servico, modelo_servico, imei1_servico, imei2_servico, cor_servico, defeito_servico, statos_servico, data_time_servico FROM servico WHERE id_cliente = $id";
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
							     	  	  <td data-label="Staus"><?php echo utf8_encode($row['statos_servico']);?></td>
										</tr>
									</tbody>
									<?php }?>
								</table>
					      </div>
					  </section>
					</div>
			       <!-- Fim do corpo Modal -->
			    </div>
			  </div>
			</div>
			      <!--Fim Modal -->
		<!-- -----------------------Fim Conteúdo----------------------- -->
		<!-- ---------Script de Icones de ERROr e Sucesso-------------- -->
		<script src="https://kit.fontawesome.com/c4cf45b7a7.js" crossorigin="anonymous"></script>
		<!-- ----------------------Script Bootstrap-------------------- -->
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
	</body>
</html>