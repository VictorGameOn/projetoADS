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
		<link rel="stylesheet" type="text/css" href="../css/estiloLoginAdm.css">
		<link rel="stylesheet" type="text/css" href="../BackEnd/verifica_login.php">
		<title>Login</title>
	</head>
	<body>
		<!--Inicio do Cabeçalho -->
		<header>
			<a href="index.html"><img src="../img/gatLogo.png"></a>
		</header>
		<!--Fim do Cabeçalho -->
		<!--Inicio da section-->
		<section>
			<!--Inicio do Conteiner -->
			<div class="conteinerLogin">
				<p><!--Titulo do Conteiner -->
					Faça o login
				</p>
				<!--Mensagem de ERROR -->
				<?php
                    if(isset($_SESSION['nao_autenticado'])):
                ?>
				<div class="errorLogin">
					<div class="closeX"><i class="fas fa-times-circle"></i></div>
					<div class="closeError">Erro!!!! Usuário ou Senha incorreto.</div>
				</div>
				<?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                ?>
				<!--Fomulario -->
				<form action="../BackEnd/login.php" method="POST">
					<input class="campoDigitar" type="text" name="login" placeholder="Usuário" required="">
					<input class="campoDigitar" type="password" name="senha" placeholder="Senha" required="">
					<button class="botaoSubmit" type="submit">Logar</button>
				</form><!--Fim do formulario -->
			</div><!--Fim do conteiner -->
		</section>
		<!--Fim da section -->
		<!--Inicio do footer -->
		<footer>
			<div>
				&copy;SoftwareMaker
			</div>
		</footer><!--Fim do footer-->
	</body>
</html>