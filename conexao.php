<?php

  $usuario = 'root';
  $senha = 'lord';
  $database = 'login';
  $host = 'localhost';

  $mysqli = new mysqli($host, $usuario, $senha, $database);

  // if($mysqli->error){
  //   echo "Falha ao conectar ao banco de dados";
  // } else {
  //   echo "Conexão efetuada com sucesso";
  // }

?>