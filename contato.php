<!DOCTYPE html>
<html lang="pt-br">
<head>
  <!-- Tags Meta -->
  <meta charset="UTF-8">
  <meta name="author" content="José Danilo Ortega">
  <meta name="keywords" content="Crianca TEA, TEA, Autismo ">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- Configuração do favicon -->
  <link rel="icon" type="image/x-icon" href="images/icon.ico">
  <!-- Título na guia do navegador -->
  <title>Criança TEA</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@800&family=Oswald&family=PT+Serif:wght@700&display=swap" rel="stylesheet">
  <!-- Conexão da folha de estilos -->
  <link rel="stylesheet" href="assets/css/main.css">
</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.php">Criança TEA</a></h1>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.php">Inicio</a></li>
								
									<li><a href="historia.php">História</a></li>
									<li><a href="contato.php">Contato</a></li>
									<li><a href="cadastro.php">Cadastre-se</a></li>
								</ul>
							</nav>

					</header>
				</div>

				<br>
				<div id="email_message">
					<!-- <center>Para mais informaçoes, dúvidas e sugestões, entre em contato:</center> <br><br>

					<center>E-mail :<a href="criancatea@gmail.com">Send email</a></center> -->

				<form action="https://formsubmit.co/criancatea@outlook.com" method="POST">
					<label  style="width:80%; text-align:center; margin-left:10%" for="email">E-mail</label>
					<input placeholder="digite seu e-mail" style="width:80%; text-align:center; margin-left:10%" type="email" name="email" id="email" required>

					<br>
					<label style="width:80%; text-align:center; margin-left:10%" for="message">Mensagem</label>
					<input placeholder="digite sua mensagem" style="width:80%; height:120px; text-align:center; margin-left:10%" type="text" name="text" id="text" required>

					<br>
					<center><button type="submit">Enviar</button></center>

					<input type="hidden" name="_captcha" value="false">
					<input type="hidden" name="_template" value="table">
					<input type="hidden" name="_next" value="https://criancatea.herokuapp.com/obrigado.html">
					<input type="hidden" name="_autoresponse" value="Obrigado pela mensagem, responderemos em breve.">

					<br>
				</form>
				</div>

      </body>
      </html>