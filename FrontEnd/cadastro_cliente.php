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
		<link rel="stylesheet" type="text/css" href="../css/estiloCadastroCliente.css">
		<title>Cadastro de Cliente</title>
	</head>
	<body>
		<!--inicio do cabeçalho -->
		<header>
			<!--imagem com logo e um link para pagina inicial -->
			<a href="index.html"><img src="../img/gatLogo.png"></a>
		</header>
		<!--fim do cabeçalho -->
		<!--inicio do conteudo na section -->
		<section>
			<!--div que agrupa todo o conteudo -->
			<div class="conteinerLogin">
				<!--inicio da div com os avisos -->
				<div class="avisosFormulario">
					<span>Sejas bem-vindo</span>
					<p>
						Antes de começar a preencher os campos, fique atento as<br> especificações a seguir na lista.
						<ul>
							<li>O Nome de Usuário será utilizado para logar no sistema.</li>
							<li>Em um dos compos de telefone, coloque ao menos um que seja WhatsApp.</li>
							<li>Enviaremos o orçamento previo do serviço por WhatsApp.</li>
							<li>Em caso de não conserguir-mos entrar em contato pelo WhatsApp,<br> entraremos em contato por E-mail.</li>
							<li>Sua senha terá que conter ao menos 8 caracteres.</li>
						</ul> 
					</p>
				</div>
				<!--fim da div dos avisos -->
				<!--div para separar o formulario da div do aviso -->
				<div class="divFormulario">
					<!--Mensagem de Sucesso -->
					<?php
                    	if(isset($_SESSION['status_cadastro'])):
                	?>
					<div class="conteinerMensagemErrorSucesso">
						<div class="iconMensagemErrorSucesso sucCorMesnsagemV">
							<i class="far fa-check-circle"></i> Cadastro efetuado com Sucesso!!
						</div>
					</div>
					<?php
	                    endif;
	                    unset($_SESSION['status_cadastro']);
                	?>
					<!--fim mensagem Sucesso -->
					<!--Mensagem de ERROR -->
					<?php
                    	if(isset($_SESSION['erro'])):
                	?>
					<div class="conteinerMensagemErrorSucesso">
						<div class="iconMensagemErrorSucesso errorCorMesnsagemX">
							<i class="fas fa-exclamation-triangle"></i> Erro!!!! Nome de Usuário já existente.
						</div>
						
					</div>
					<?php
	                    endif;
	                    unset($_SESSION['erro']);
                	?>
					<!--fim mensagem Error -->
					<form action="../BackEnd/cadastrar_cliente.php" method="POST">
						<!--inputs com nome e sobrenome -->
						<input class="inputtextMenor" type="text" name="nome_cliente" placeholder="Nome" required="">
						<input class="inputtextMenor" type="text" name="sobrenome_cliente" placeholder="Sobrenome" required=""><br>
						<!--input com o nome de usuario -->
						<input class="inputtextoMaior" type="text" name="nickname_cliente" placeholder="Nome de Usuário" required=""><br>
						<!--input com os numeros de telefone -->
						<input class="inputtextMenor" type="tel" name="fone1_cliente" placeholder="Fone 1" required="">
						<input class="inputtextMenor" type="tel" name="fone2_cliente" placeholder="Fone 2"><br>
						<!--input com o e-mail -->
						<input class="inputtextoMaior" type="email" name="email_cliente" placeholder="E-mail" required=""><br>
						<!--input com a senha -->
						<input class="inputtextoMaior"type="password" name="senha_cliente" placeholder="Senha" required=""><br>
						<!--input do botao -->
						<input class="botaoSubmit" type="submit" name="logar" value="Cadastre-se">
					</form>
				</div>
				<!--fim da div do formulario -->
			</div>
			<!--fim do conteiner -->
		</section>	
		<!--fim da section -->
		<!--inicio do footer -->
		<footer>
			<div><!--conteiner para o copy do nome da empresa -->
				&copy;SoftwareMaker
			</div>
		</footer>
		<!--inicio do footer -->
		<script src="https://kit.fontawesome.com/c4cf45b7a7.js" crossorigin="anonymous"></script>
	</body>
</html>
