<?php

  require('conexao.php');
  // print_r($_SESSION);

// VERIFICAÇAO DE AUTENTICAÇAO
$user = auth($_SESSION['TOKEN']);
if($user){
  // SE USUSARIO AUTENCIAR - ENTRA NO PAINEL
  echo "<h1> SEJA BEM VINDO(A) <b style='color:red'>". $user['nome']."!</b></h1>";
 
  }
else{
  // SE NAO AUTENTICAR - REDIRECIONA PARA LOGIN
  header('Location: index.php');
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
  <link rel="stylesheet" href="css/style_jogo_menu.css">
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

					</header>
				</div>

        <h1>Atividades</h1>
  <div>
    <ul id="ambientes">
      <li><a href="ambientes/quarto/quarto.html"><img src="img/Quarto.jpg" width="200px" height="160px"
            alt="Quarto"></a></li>
      <li><a href="ambientes/banheiro/banheiro.html"><img src="img/Banheiro.jpg" width="200px" height="160px"
            alt="Banheiro"></a></li>
      <li><a href="ambientes/cozinha/cozinha.html"><img src="img/Cozinha.jpg" width="200px" height="160px"
            alt="Cozinha"></a></li>
      <li><a href="ambientes/sala/sala.html"><img src="img/Sala.jpg" width="200px" height="160px" alt="Sala"></a></li>
      <li><a href="ambientes/quintal/quintal.html"><img src="img/Quintal.jpg" width="200px" height="160px"
            alt="Quintal"></a></li>
    </ul>    
  </div>
        </section>
       
      </body>

    </html>
<?php
 echo "<br> <br> <a style='background:green; text-decoration:none; color:white; padding:20px; border-radius:5px;' href='logout.php'>Sair do sistema</a>";

?>
