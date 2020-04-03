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
	<link rel="stylesheet" type="text/css" href="../css/estiloAreaCliente.css">
	<title>Area Cliente</title>
</head>
<body>
	<head>
		<nav>
			<div>
				<img src="../img/gatLogo.png">
			</div>
			<div class="lista">
				<ul>
					<li>Olá, <?php echo $_SESSION['usuario'];?></li>
					<li>
						<a href="">Meus Serviços</a>
					</li>
					<li>
						<a href="../BackEnd/logout.php">Sair	</a>
					</li>	
				</ul>
			</div>
		</nav>
		<section>
				<div class="conteinerLogin">
				<!--inicio da div com os avisos -->
				<div class="avisosFormulario">
					<span>Sejas bem-vindo</span>
					<p>
						Antes de começar a preencher os campos, fique atento as<br> especificações a seguir na lista.
						<ul>
							<li>O nome de usuário será utilizado para logar no sistem.</li>
							<li>Em um dos compas de telefone, coloque ao menos um que seja WhatsApp.</li>
							<li>Enviaremos o orçamento previo do serviço por WhatsApp.</li>
							<li>Em caso de não conserguir-mos entrar em contato pelo WhatsApp,<br> entraremos em contato por E-mail.</li>
							<li>Sua senha tem que ter ao menos 8 caracteres.</li>
						</ul> 
					</p>
				</div>
			<div class="divTabelaServiço">
				<form method="POST" action="../BackEnd/cadastrar_servico.php">
					<input class="inputtextMenor" type="text" name="modelo_servico" placeholder="Modelo" required="">
					<!--input com os numeros de telefone -->
					<input class="inputtextMenor" type="text" name="imei1_servico" placeholder="IMEI 1" required="">
					<input class="inputtextMenor" type="text" name="imei2_servico" placeholder="IMEI 2" required=""><br>
					<!--input com o e-mail -->
					<input class="inputtextMenor" type="text" name="cor_servico" placeholder="Cor" required=""><br>
					<!--input com a senha -->
					<textarea name="defeito_servico" placeholder="Descrição do Defeito"></textarea>
					<input class="botaoSubmit" type="submit" name="logar" value="Concluir">
				</form>
			</div>
		</section>
</body>
</html>