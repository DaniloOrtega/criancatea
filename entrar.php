<?php
include('conexao.php');

if(isset($_POST['email']) || isset($_POST['senha'])) {

  if(strlen($_POST['email']) == 0 ) {
    echo "Preencha seu email";
  } else if(strlen($_POST['senha']) == 0 ) {
    echo "Preencha sua senha";
  } else {
    
    $email = $mysqli->real_escape_string($_POST['email']);
    $senha = $mysqli->real_escape_string($_POST['senha']);

    $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $sql_query = $mysqli->query($sql_code) or die("Falha na autenticação" . $mysqli->error);

    $quantidade = $sql_query->num_rows;

    if($quantidade == 1){

      $usuario = $sql_query->fetch_assoc();

      if(!isset($_SESSION)) {
        session_start();
      }

      $_SESSION['id'] = $usuario['id'];
      $_SESSION['nome'] = $usuario['nome'];

      header("Location: painel.php");

    } else{
      echo "Falha ao logar, Email ou senha inválido.";
    }

  }

}
?>

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
  <link rel="stylesheet" href="assets/css/fontawesome-all.min.css">
  
</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href="index.html">Criança TEA</a></h1>
							</div>

						<!-- Nav -->
							<nav id="nav">
								<ul>
									<li class="current"><a href="index.html">Inicio</a></li>
								
									<li><a href="left-sidebar.html">História</a></li>
									<li><a href="right-sidebar.html">Contato</a></li>
									<li><a href="no-sidebar.html">Cadastre-se</a></li>
								</ul>
							</nav>

					</header>
				</div>

        <div class="login">
          <form action="painel.php" method="POST">

          <p>
            <label>Email:</label>
            <input type="email" name="email">
          </p>

          <p>
            <label>Senha:</label>
            <input type="password" name="senha">
          </p>

          <button type="submit">Entrar</button>
          </form>
          
        </div>



      <script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>