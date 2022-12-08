<?php
  include_once "funcao.php";
  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

// variavel global que contem informacoes do método GET
  $id = $_GET['id'];
  $familia = getFamilia($id);
  excluirFamilia($id);
  setcookie("mensagem", "Família {$familia['nome']} foi excluída");

  header('location: familias.php');
 ?>
