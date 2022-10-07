<?php 
session_start();
session_unset();
session_destroy();

// PAGINA QUE DESEJA REDIRECIONAR QUANDO SAIR DO PAINEL
header('location: index.html');

?>