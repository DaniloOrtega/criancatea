<?php

require('conexao.php');
// print_r($_SESSION);

// VERIFICAÇAO DE AUTENTICAÇAO
$user = auth($_SESSION['TOKEN']);
if ($user) {
  // SE USUSARIO AUTENCIAR - ENTRA NO PAINEL
  echo "<h1> SEJA BEM VINDO(A) <b style='color:red'>" . $user['nome'] . "!</b></h1>";
} else {
  // SE NAO AUTENTICAR - REDIRECIONA PARA LOGIN
  header('Location: entrar.php');
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
          <h1><a href="index.php">Criança TEA</a></h1>
        </div>

      </header>
    </div>

    <h1>Atividades</h1>
    <!-- <div>
    <ul id="ambientes">
      <li><a href="ambientes/quarto/quarto.php"><img src="img/Quarto.jpg" width="200px" height="160px"
            alt="Quarto"></a></li>
      <li><a href="ambientes/banheiro/banheiro.php"><img src="img/Banheiro.jpg" width="200px" height="160px"
            alt="Banheiro"></a></li>
      <li><a href="ambientes/cozinha/cozinha.php"><img src="img/Cozinha.jpg" width="200px" height="160px"
            alt="Cozinha"></a></li>
      <li><a href="ambientes/sala/sala.php"><img src="img/Sala.jpg" width="200px" height="160px" alt="Sala"></a></li>
      <li><a href="ambientes/quintal/quintal.php"><img src="img/Quintal.jpg" width="200px" height="160px"
            alt="Quintal"></a></li>
    </ul>    
  </div> -->

    <!-- Features -->
    <div id="features-wrapper">
      <div class="container">
        <div class="row">

          <div class="col-4 col-12-medium">
            <!-- Box -->
            <section style="height:50%;" >
              <a href="ambientes/quarto/quarto.php" ><img src="img/Quarto.jpg"  width="260px" height="180px" alt="Quarto"></a>
              <div class="inner">
                <header>
                  <a href="ambientes/quarto/quarto.php">
                    <h2>Quarto</h2>
                  </a>
                </header>
                </p>
              </div>
            </section>
          </div>

          <div class="col-4 col-12-medium">
            <!-- Box -->
            <section style="height:50%;" >
              <a href="ambientes/banheiro/banheiro.php" ><img src="img/Banheiro.jpg" width="260px" height="180px" alt="Banheiro"></a>
              <div class="inner">
                <header>
                  <a href="ambientes/banheiro/banheiro.php">
                    <h2>Banheiro</h2>
                  </a>
                </header>
                </p>
              </div>
            </section>
          </div>

          <div class="col-4 col-12-medium">
            <!-- Box -->
            <section style="height:50%;" >
              <a href="ambientes/cozinha/cozinha.php" ><img src="img/Cozinha.jpg" width="260px" height="180px" alt="Cozinha"/></a>
              <div class="inner">
                <header>
                  <a href="ambientes/cozinha/cozinha.php">
                    <h2>Cozinha</h2>
                  </a>
                </header>
                </p>
              </div>
            </section>
          </div>

          <div class="col-4 col-12-medium">
            <!-- Box -->
            <section style="height:50%;" >
              <a href="ambientes/sala/sala.php" ><img src="img/Sala.jpg"  width="260px" height="180px" alt="Sala"></a>
              <div class="inner">
                <header>
                  <a href="ambientes/sala/sala.php">
                    <h2>Sala</h2>
                  </a>
                </header>
                </p>
              </div>
            </section>
          </div>

          <div class="col-4 col-12-medium">
            <!-- Box -->
            <section style="height:50%;" >
              <a href="ambientes/quintal/quintal.php" ><img src="img/Quintal.jpg"  width="260px" height="180px" alt="Quintal" /></a>
              <div class="inner">
                <header>
                  <a href="ambientes/quintal/quintal.php">
                    <h2>Quintal</h2>
                  </a>
                </header>
                </p>
              </div>
            </section>
          </div>

        </div>
      </div>
    </div>

</body>

</html>
<?php
echo "<br> <br> <a style='background:green; text-decoration:none; color:white; padding:20px; border-radius:5px;' href='logout.php'>Sair do sistema</a>";

?>
<html>
<br><br>

</html>