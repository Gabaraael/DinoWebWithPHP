<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $familia = array();
  // variavel global $_POST
  $familia['id'] = $_POST['id'];
  $familia['nome'] = $_POST['nome'];

  if ($familia['id'] == 0) {
    salvarFamilia($familia);
  } else {
    alterarFamilia($familia);
  }
  setcookie("mensagem", "{$familia['nome']} foi salva");
  
  header('location: familias.php');
 ?>
