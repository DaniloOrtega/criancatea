<?php
session_start();

  /* COLOQUE AQUI A URL DO SEU SITE - DAÍ NÃO PRECISA ALTERAR NOS LUGARES DE ENVIO DE EMAIL */
  $site = ""; // <--- troque pro seu site (não tire a barra final);

  // DOIS MODOS POSSIVEIS -> lOCAL E PRODUÇÃO
  $modo = 'local';

  //CREDENCIAIS LOCAL (LARAGON)
  if($modo == 'local'){
    $servidor = 'localhost';
    $usuario = 'root';
    $senha = '1234';
    $banco = 'sistema-de-login';
  }

  //CREDENCIAIS PRODUÇÃO
  if($modo == 'producao'){
    $servidor = 'sql205.epizy.com';
    $usuario = 'epiz_31980331';
    $senha = 'o6yHRm6dJNO';
    $banco = 'epiz_31980331_login';
  }

  //CONEXÃO COM BANCO DE DADOS
try{
  $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$usuario,$senha);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //  echo "Conectado ao Banco com sucesso!";

}
catch(PDOException $erro){
  echo "Falha ao se conectar com o banco!" . $erro->getMessage();
}

//FUNÇÃO PARA LIMPAR O POST
function limparPost($dados){
  $dados = trim($dados);
  $dados = stripslashes($dados);
  $dados = htmlspecialchars($dados);
  return $dados;
}

//FUNÇÃO PARA AUTENTICAÇÃO
  function auth($tokenSessao){
  global $pdo;
  
  //VERIFICAR SE TEM AUTORIZAÇÃO
  $sql = $pdo->prepare("SELECT * FROM usuarios WHERE token=? LIMIT 1");
  $sql->execute(array($tokenSessao));
  $usuario = $sql->fetch(PDO::FETCH_ASSOC);

  //SE NÃO ENCONTRAR O USUÁRIO
  if(!$usuario){
      return false;
  }else{
     return $usuario;
  }

}

?>