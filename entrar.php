<?php
require('conexao.php');

if (isset($_POST['email']) && isset($_POST['senha']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
  // RECEBER OS DADOS DO POST E LIMPAR
  $email = limparPost($_POST['email']);
  $senha = limparPost($_POST['senha']);
  $senha_cript = sha1($senha);

  // VERIFICAR SE EXISTE USUARIO
  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? AND senha=? LIMIT 1");
  $sql->execute(array($email, $senha_cript));
  $usuario = $sql->fetch(PDO::FETCH_ASSOC);
  if ($usuario) {

    // // SE EXISTE USUARIO - VERIFICAR SE CADASTRO FOI CONFIRMADO 
    // if ($usuario['status'] == "confirmado") {

      // EXISTE USUARIO - CRIAR TOKEN
      $token = sha1(uniqid() . date("d-m-Y-H-i-s"));

      // ATUALIZAR O TOKEN DO USUARIO NO BANCO
      $sql = $pdo->prepare("UPDATE usuarios SET token=? WHERE email=? AND senha=?");
      if ($sql->execute(array($token, $email, $senha_cript))) {
        // ARMAZENAR TOKEN NA SESSAO (SESSION)
        $_SESSION['TOKEN'] = $token;
        header('location: painel.php');
      }
    } else {
      $erroLogin = "Erro ao fazer cadastro";
    }
  } else {
    // USUARIO NAO EXISTE
    $erroLogin = "Usuário ou senha incorretos!";
  }
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <link rel="stylesheet" href="css/style.css">
  <title>Criança TEA</title>
</head>

<body>

<!-- Header -->
<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1 id="title"><a href="index.html">Criança TEA</a></h1>
							</div>

					</header>

  <form method="POST">
    <h1>Login</h1>

    <?php if (isset($_GET['result']) && ($_GET['result'] == "ok")) { ?>
      <div class="sucesso animate__animated animate__bounce">
        Cadastrado com sucesso!
      </div>
    <?php } ?>

    <?php if (isset($erroLogin)) { ?>
      <div style="text-align:center" class="erro-geral animate__animated animate__rubberBand">
        <?php echo $erroLogin; ?>
      </div>
    <?php } ?>

    <div class="input-group">
      <img class="input-icon" src="img/user-email.png" alt="">
      <input type="email" name="email" id="email" placeholder="Digite seu email" required>
    </div>

    <div class="input-group">
      <img class="input-icon" src="img/password.png" alt="">
      <input type="password" name="senha" id="senha" placeholder="Digite sua senha" required>
    </div>


    <button class="btn-blue" type="submit">Fazer Login</button>
    <a href="cadastro.php">Ainda não tenho cadastro</a>
  </form>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <?php if (isset($_GET['result']) && ($_GET['result'] == "ok")) { ?>
    <script>
      setTimeout(() => {
        $('.sucesso').hide();
      }, 3000);
    </script>
  <?php } ?>

</body>

</html>