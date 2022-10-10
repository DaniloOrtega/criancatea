<?php

  require('conexao.php');


  // VERIFICAR SE A POSTAGEM EXISTE DE ACORDO COM OS CAMPOS 
  if(isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha']) && isset($_POST['senha-repeat'])){
    // VERIFICAR SE TODOS OS CAMPOS FORAM PREENCHIDOS
    if(empty($_POST['nome']) or empty($_POST['senha']) or empty($_POST['senha']) or empty($_POST['senha-repeat']) or empty($_POST['termos'])){
      $erro_geral = "Todos os campos são obrigatórios";
    }else{
      // RECEBER VALORES VINDOS DO POST E LIMPAR
      $nome = limparPost($_POST['nome']);
      $email = limparPost($_POST['email']);
      $senha = limparPost($_POST['senha']);
      $senha_cript = sha1($senha);
      $repete_senha = limparPost($_POST['senha-repeat']);
      $checkbox = limparPost($_POST['termos']);

      // VERIFICAR SE NOME É APENAS LETRAS E ESPAÇOS
      if (!preg_match("/^[a-zA-Z-' ]*$/",$nome)) {
        $erroNome = "Somente permitido letras e espaços";
      }

      // VERIFICAR SE EMAIL É VALIDO
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erroEmail = "Formato de email inválido";
      }

      // VERIFICAR SE SENHA TEM MAIS DE 6 DÍGITOS
      if(strlen($senha) < 6){
        $erroSenha = "Senha deve ter 6 caracteres ou mais";
      }

      // VERIFICAR SE AS DUAS SENHAS SAO IGUAIS
      if($senha !== $repete_senha){
        $erroRepeteSenha = "As senhas digitadas são diferentes";
      }

      // VERIFICAR SE CHECKBOX FOI MARCADO
      if($checkbox !== "ok"){
        $erroCheckBox = "Desativado";
      }

      if(!isset($erro_geral) && !isset($erroNome) && !isset($erroEmail) && !isset($erroSenha) && !isset($erroRepeteSenha) && !isset($erroCheckBox)){
        // VERIFICA SE EMAIL DE USUARIO JÁ ESTÁ CADASTRADO NO BANCO
        $sql = $pdo->prepare("SELECT * FROM usuarios WHERE email=? LIMIT 1");
        $sql->execute(array($email));
        $usuario = $sql->fetch();

        // SE NÃO EXISTIR O USUARIO - ADICIONAR NO BANCO
        if(!$usuario) {
          $recupera_senha = "";
          $token = "";
          $data_cadastro = date('d/m/Y');
          $sql = $pdo->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?)");
          if($sql->execute(array($nome,$email,$senha_cript,$recupera_senha,$token,$data_cadastro))){

            // SE O MODO FOR LOCAL
            if($modo == "local"){
              header('Location: entrar.php?result=ok');
            }
            
          }
        }else{
          // JÁ EXISTE USUARIO APRESENTAR ERRO
          $erro_geral = "Usuário já cadastrado";
        }
      }
    }

  }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
  <title>Criança TEA</title>
</head>
<body>

<!-- Header -->
<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1 id="title"><a href="index.php">Criança TEA</a></h1>
							</div>

					</header>

  <form method="POST">
    <h1>Cadastrar</h1>

    <?php if(isset($erro_geral)){ ?>
      <div class="erro-geral animate__animated animate__rubberBand">
      <?php echo $erro_geral; ?>
    </div>
    <?php } ?>
   

    <div class="input-group">
      <img class="input-icon" src="img/nome.png" alt="">
      <input <?php if(isset($erro_geral) or isset($erroNome)){echo 'class="erro-input"';}?> type="text" name="nome" id="nome" placeholder="Digite seu Nome Completo" <?php if(isset($_POST['nome'])){ echo "value='".$_POST['nome']."'";}?> required>
      <?php if(isset($erroNome)){ ?>
      <div class="erro"><?php echo $erroNome; ?></div>
      <?php } ?>
    </div>

    <div class="input-group">
      <img class="input-icon" src="img/user-email.png" alt="">
      <input <?php if(isset($erro_geral) or isset($erroEmail)){echo 'class="erro-input"';}?> type="email" name="email" id="email" placeholder="Digite um email" <?php if(isset($_POST['email'])){ echo "value='".$_POST['email']."'";}?> required>
      <?php if(isset($erroEmail)){ ?>
      <div class="erro"><?php echo $erroEmail; ?></div>
      <?php } ?>
    </div>

    <div class="input-group">
      <img class="input-icon" src="img/password.png" alt="">
      <input <?php if(isset($erro_geral) or isset($erroSenha)){echo 'class="erro-input"';}?> type="password" name="senha" id="senha" placeholder="Senha mínimo 6 Digitos" <?php if(isset($_POST['senha'])){ echo "value='".$_POST['senha']."'";}?> required>
      <?php if(isset($erroSenha)){ ?>
      <div class="erro"><?php echo $erroSenha; ?></div>
      <?php } ?>
    </div>

    <div class="input-group">
      <img class="input-icon" src="img/repeat-password.png" alt="">
      <input <?php if(isset($erro_geral) or isset($erroRepeteSenha)){echo 'class="erro-input"';}?> type="password" name="senha-repeat" id="senha-repeat" placeholder="Digite a senha novamente" <?php if(isset($_POST['senha-repeat'])){ echo "value='".$_POST['senha-repeat']."'";}?> required>
      <?php if(isset($erroRepeteSenha)){ ?>
      <div class="erro"><?php echo $erroRepeteSenha; ?></div>
      <?php } ?>
    </div>

    <div <?php if(isset($erro_geral) or isset($erroCheckBox)){echo 'class="input-group erro-input"';}else{echo 'class="input-group"';}?>>
     <input type="checkbox" name="termos" id="termos" value="ok" required>
     <label for="termos">Ao se cadastrar você concorda com a nossa <a class="link" href="politica-privacidade.html">Política de Privacidade</a> e os <a class="link" href="termos-de-uso.html">Termos de uso.</a></label>
    </div>
   
    
    <button class="btn-blue" type="submit">Cadastrar</button>
    <a href="entrar.php">Já tenho uma conta</a>
  </form>
  
</body>
</html>