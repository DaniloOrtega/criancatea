<?php

  if(!isset($_SESSION)) {
    session_start();
  }

  else if(!isset($_SESSION['id'])){
    die("Você não pode acessar esta página.<p><a href=\"entrar.php\">Entrar</a></p>");
  }

?>